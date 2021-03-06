<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Role;
use App\Models\Vault;
use App\Models\Region;
use App\Models\Income;
use App\Models\Expenditure;
use App\Models\ExpenditureCredit;
use App\Models\Credit;
use App\Models\Client;
use App\Models\PurseAccess;
use Toastr;
use Validator;
use Auth;
use Image;
use Carbon\Carbon;
use Jenssegers\Date\Date;
use App\Models\Payment;
use App\Models\LatePayments;
use App\Models\Close;
use App\Models\IncomePayment;
use App\Models\BoxCut;
use App\Models\Roster;
use App\Models\Active;
use DB;
use Yajra\DataTables\DataTables;
use App\Models\Finals;


class GeneralController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('login_mid');
    }

    public function getPromoter()
    {
        if (Auth::user()->hasRole(['administrador', 'director-general'])) {
            $users = User::all();
            // $users = User::where('id', '!=', Auth::id())->get();
            // $users = User::all();
            return view('executives.index')
            ->with('employees', $users);
        } elseif (Auth::user()->hasRole('coordinador-regional')) {
            $user_allocation = Auth::user();
            $region_allocation = $user_allocation->region;
            $filtered = User::where('id', '!=', Auth::id())->get();
            //$filtered = User::all();
            $users = $filtered->where('region_id', $region_allocation->id);

            return view('executives.index')
            ->with('employees', $users);
        } elseif (Auth::user()->hasRole('coordinador-sucursal')) {
            $user_allocation = Auth::user();
            $branch_allocation = $user_allocation->branch;
            $collection = Role::all();
            $role = $collection->where('name', 'ejecutivo-de-credito')->first();
            //$filtered = User::all();
            $filtered = User::where('id', '!=', Auth::id())->get();
            $users = $filtered->where('branch_id', $branch_allocation->id);
            return view('executives.index')
            ->with('employees', $users);
        } elseif (Auth::user()->hasRole('ejecutivo-de-credito')) {
            $user = Auth::user();

            return view('executives.index')
            ->with('user', $user);
        }
    }


    public function showVault($id)
    {
        $current = Carbon::today()->toDateString();
        $user = User::find($id);
        $vault = $user->vault;
        $incomes = $vault->incomes->where('date', $current);
        $actives = $vault->actives->where('date', $current);
        $si = $incomes->where('concept', 'Saldo Inicial')->where('date', $current);
        $af = $incomes->where('concept', 'Asignación de efectivo')->where('date', $current);

        $incomePayment = $vault->incomePayment->where('date', $current);
        $rc = $incomePayment->where('concept', 'Recuperación')->where('date', $current);

        $expenditures = $vault->expenditures->where('date', $current);
        $g = $expenditures->where('concept', 'Gasto')->where('date', $current);

        $expendituresCredit = $vault->expendituresCredit->where('date', $current);
        $c = $expendituresCredit->where('concept', 'Colocación')->where('date', $current);

        $purseAccess = $vault->purseAccess->where('date', $current);
        $ra = $purseAccess->where('concept', 'Recuperación Access')->where('date', $current);

        return view('executives.showVault')
        ->with('user', $user)
        ->with('vault', $vault)
        ->with('incomes', $incomes)
        ->with('incomePayment', $incomePayment)
        ->with('si', $si)
        ->with('rc', $rc)
        ->with('af', $af)
        ->with('expenditures', $expenditures)
        ->with('expendituresCredit', $expendituresCredit)
        ->with('c', $c)
        ->with('g', $g)
        ->with('purseAccess', $purseAccess)
        ->with('ra', $ra)
        ->with('actives', $actives);
    }

    public function addVault(Request $request)
    {
        $current = Carbon::today();

        $validator = Validator::make($request->all(), [
            'ammount' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            Toastr::error('Favor de introducir cantidad valida.', 'BOVÉDA', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

            return redirect()->back();
        }

        $user_collector  = Auth::user();
        $vault_collector = $user_collector->vault;
        $ammount_add     = $request->input('ammount');

        if ($vault_collector->ammount < $ammount_add) {
            Toastr::error('No cuentas con el dinero suficiente para otorgar $'.number_format($request->input('ammount')).' de saldo inicial.', 'BOVÉDA', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

            return redirect()->back();
        } 
        elseif ($ammount_add < 0) {
         Toastr::error('Favor de introducir cantidad valida.', 'BOVÉDA', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

         return redirect()->back();
     }else {
        $user = User::find($request->input('user_id'));
        $vault = $user->vault;

        $data_income['ammount'] = $request->input('ammount');
        $data_income['concept'] = 'Saldo Inicial';
        $data_income['date'] = $current;
        $data_income['emisor'] = $request->input('emisor');
        $data_income['vault_id'] = $vault->id;
        $data_income['branch_id'] = $user->branch_id;
        $data_income['region_id'] = $user->region_id;
        $income = Income::create($data_income);

        $vault->ammount = $vault->ammount + $income->ammount;
        $vault->save();


        $vault_collector->ammount = $vault_collector->ammount - $ammount_add;
        $vault_collector->save();

        Toastr::success('Saldo inicial agregado exitosamente.', 'BOVÉDA', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

        return redirect()->back();
    }
}

public function addCash(Request $request)
{
    $current = Carbon::today();

    $validator = Validator::make($request->all(), [
        'ammount' => 'required|numeric'
    ]);

    $user_collector = Auth::user();
    $vault_collector = $user_collector->vault;
    $ammount_add     = $request->input('ammount');

    if ($validator->fails()) {
        Toastr::error('Favor de introducir cantidad valida.', 'BOVÉDA', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

        return redirect()->back();
    } elseif ($vault_collector->ammount < $ammount_add) {
        Toastr::error('No cuentas con el dinero suficiente para otorgar $'.number_format($request->input('ammount')).' de saldo inicial.', 'BOVÉDA', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

        return redirect()->back();
    }

    $user = User::find($request->input('user_id'));
    $vault = $user->vault;

    $data_income['ammount'] = $request->input('ammount');
    $data_income['concept'] = 'Asignación de efectivo';
    $data_income['date']    = $current;
    $data_income['vault_id'] = $vault->id;
    $data_income['branch_id'] = $user->branch_id;
    $data_income['region_id'] = $user->region_id;

    $income = Income::create($data_income);

    $vault->ammount = $vault->ammount + $income->ammount;
    $vault->save();

    $vault_collector->ammount = $vault_collector->ammount - $ammount_add;
    $vault_collector->save();


    Toastr::success('Asignación de efectivo exitoso.', 'BOVÉDA', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

    return redirect()->back();
}

public function recordExpense(Request $request)
{
    $user = Auth::user();
    $vault = $user->vault;
    if ($vault->ammount == 0) {
        Toastr::error('No puedes registrar un gasto, ya que no cuentas con efectivo.', 'CRÉDITO', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
        return redirect()->back();
    } else {
        $validator = Validator::make($request->all(), [
            'ammount' => 'required|numeric',
                // 'voucher' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        if ($validator->fails()) {
            Toastr::error('Favor de introducir cantidad valida ó la imagen correctamente.', 'BOVÉDA', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

            return redirect()->back();
        }

            // if ($request->hasFile('voucher')) {
            //     $voucher = $request->file('voucher');
            //     $filename = time() . '.' . $voucher->getClientOriginalExtension();
            //     Image::make($voucher)->resize(400, 400)->save(public_path('/uploads/voucher' . $filename));
            // }

        $current = Carbon::today();
        $ammount = $request->input('ammount');
        $concept = $request->input('concept');
        $user = Auth::user();
        $vault = $user->vault;
        $data_expenditure['ammount'] = $ammount;
        $data_expenditure['concept'] = 'Gasto';
            // $data_expenditure['voucher'] = $filename;
        $data_expenditure['date']    = $current;
        $data_expenditure['description']= $request->input('description');
        $data_expenditure['type']= $request->input('type');
        if ($request->input('type') == 'Accesorios Celulares' ) {
            $data_expenditure['category']= 'Activo';
        }
        $data_expenditure['employee']=$request->input('employee');
        $data_expenditure['vault_id'] = $vault->id;
        $data_expenditure['branch_id'] = Auth::user()->branch_id;
        $data_expenditure['region_id'] = Auth::user()->region_id;

            // dd($data_expenditure);
        $expenditure = Expenditure::create($data_expenditure);

        $vault->ammount = $vault->ammount - $expenditure->ammount;
        $vault->save();

        Toastr::success('Gasto agregado exitosamente.', 'BOVÉDA', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

        return redirect()->back();
    }
}

public function recordActive(Request $request)
{
    $user = Auth::user();
    $vault = $user->vault;
    if ($vault->ammount == 0) {
        Toastr::error('No puedes registrar un gasto, ya que no cuentas con efectivo.', 'CRÉDITO', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
        return redirect()->back();
    } else {
        $validator = Validator::make($request->all(), [
            'ammount' => 'required|numeric',
            'voucher' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        if ($validator->fails()) {
            Toastr::error('Favor de introducir cantidad valida ó la imagen correctamente.', 'BOVÉDA', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

            return redirect()->back();
        }

        if ($request->hasFile('voucher')) {
            $voucher = $request->file('voucher');
            $filename = time() . '.' . $voucher->getClientOriginalExtension();
            Image::make($voucher)->resize(400, 400)->save(public_path('/uploads/voucher' . $filename));
        }

        $current = Carbon::today();
        $ammount = $request->input('ammount');
        $concept = $request->input('concept');
        $user = Auth::user();
        $vault = $user->vault;
        $data_active['ammount'] = $ammount;
        $data_active['concept'] = 'Inversión en Activos';
        $data_active['voucher'] = $filename;
        $data_active['date']    = $current;
        $data_active['description']= $request->input('description');
        $data_active['type']= $request->input('type');
        $data_active['vault_id'] = $vault->id;
        $data_active['branch_id'] = $user->branch_id;
        $data_active['region_id'] = $user->region_id;

            // dd($data_active);
        $active = Active::create($data_active);

        $vault->ammount = $vault->ammount - $active->ammount;
        $vault->save();

        Toastr::success('Inversión en activo agregada exitosamente.', 'BOVÉDA', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

        return redirect()->back();
    }
}

public function purseAccess(Request $request)
{
    $validator = Validator::make($request->all(), [
        'ammount' => 'required|numeric',
            // 'voucher' => 'required|image|mimes:jpeg,png,jpg',
    ]);

    if ($validator->fails()) {
        Toastr::error('Favor de introducir cantidad valida', 'CARTERA ACCESS', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

        return redirect()->back();
    }
    if ($request->hasFile('voucher')) {
        $voucher = $request->file('voucher');
        $filename = time() . '.' . $voucher->getClientOriginalExtension();
        Image::make($voucher)->resize(400, 400)->save(public_path('/uploads/voucher' . $filename));
    }
    $current = Carbon::today();
    $user = User::find($request->input('user_id'));
    $vault = $user->vault;

    $data_purseAccess['ammount'] = $request->input('ammount');
    $data_purseAccess['concept']= 'Recuperación Access';
        // $data_purseAccess['voucher'] = $filename;
    $data_purseAccess['date']    = $current;
    $data_purseAccess['vault_id'] = $vault->id;
    $data_purseAccess['user_id'] = $user->id;
    $data_purseAccess['branch_id'] = $user->branch_id;
    $data_purseAccess['region_id'] = $user->region_id;
    $purseAccess = PurseAccess::create($data_purseAccess);

    $vault->ammount = $vault->ammount + $purseAccess->ammount;
    $vault->save();
    Toastr::success('Monto agregado exitosamente.', 'CARTERA ACCESS', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

    return redirect()->back();
}

public function lockPayments()
{
        //return "Hello, world!";

    $date_now = Carbon::now()->toDateString();
        //$hour_now = Carbon::now()->toTimeString();
    $payments = Payment::where('date', $date_now)->where('status', 'Pendiente')->get();

    foreach ($payments as $key => $value) {
            //echo "Estamos listos para bloquear";
        $payment = Payment::find($value->id);
        $payment->status = 'Vencido';
        $payment->moratorium = 20;
        $payment->total = $payment->ammount + $payment->moratorium;
        $payment->balance = $payment->balance + 20;
        $payment->save();

        $debt = $payment->debt;
        $debt->ammount = $debt->ammount + 20;
        $debt->save();

        if ($payment->status == 'Vencido') {
            $latePayments = new LatePayments;
            $latePayments->late_number = $payment->number;
            $latePayments->late_ammount = $payment->total;
            $latePayments->late_payment = $payment->payment;
            $latePayments->payment_id = $payment->id;
            $latePayments->debt_id    = $debt->id;
            $latePayments->save();
        }
    }

    $user_close = Auth::user();
    $close_data['name_user'] = $user_close->name;
    $close_data['user_id']   = $user_close->id;
    $close = Close::create($close_data);

    Toastr::info('La operación se ha cerrado exitosamente.', 'INFO', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
    return redirect()->back();
}

public function transferProcess(Request $request)
{
    $transmitter = User::find($request->input('transmitter'));

    $receiver = User::find($request->input('receiver'));

    $clients  = $transmitter->clients;

        // echo $transmitter->name;
        // echo "<br>";
        // echo $receiver->name;
    $credits  = $transmitter->credits;

    $payments = $transmitter->payments;

    foreach ($clients as $client) {
        $client->user_id = $receiver->id;
        $client->save();
    }

    foreach ($credits as $credit) {
        $credit->user_id = $receiver->id;
        $credit->save();
    }

    foreach ($payments as $payment) {
        $payment->user_id = $receiver->id;
        $payment->save();
    }

    Toastr::success('Se ha realizado la transferencia de cartera exitosamente.', 'TRANSFERENCIA', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
    return redirect()->back();
}

public function movements()
{
    $user_allocation = Auth::user();
    $region_allocation = $user_allocation->region;
    $branch_allocation = $user_allocation->branch;
    $collection = Role::all();
    $role = $collection->where('name', 'ejecutivo-de-credito')->first();

    $empleados = $region_allocation->users;

    $vaults = Vault::all()->sortByDesc('updated_at');
    ;
    $starts_collection = Income::all();
    $starts = $starts_collection->where('concept', 'Saldo Inicial')->sortByDesc('created_at');
    $assignments = $starts_collection->where('concept', 'Asignación de efectivo')->sortByDesc('created_at');
    $recoverys = IncomePayment::all()->sortByDesc('created_at');
    $accesses  = PurseAccess::all()->sortByDesc('created_at');
    $credits   = ExpenditureCredit::all()->sortByDesc('created_at');
    $expenses  = Expenditure::all()->sortByDesc('created_at');
    $cuts      = BoxCut::all()->sortByDesc('created_at');
    $rosters   = Roster::all()->sortByDesc('created_at');
        // $rosters   = $vault_allocation->rosters;

    return view('partials.movements')
    ->with('region_allocation', $region_allocation)
    ->with('vaults', $vaults)
    ->with('starts_collection', $starts_collection)
    ->with('starts', $starts)
    ->with('assignments', $assignments)
    ->with('recoverys', $recoverys)
    ->with('credits', $credits)
    ->with('accesses', $accesses)
    ->with('expenses', $expenses)
    ->with('cuts', $cuts)
    ->with('rosters', $rosters)
    ->with('empleados', $empleados);
}

public function movementsBalance()
{
    if (Auth::user()->hasRole(['administrador', 'director-general'])) {
        $user_allocation = Auth::user();
        $region_allocation = $user_allocation->region;
        $branch_allocation = $user_allocation->branch;
        $collection = Role::all();
        $role = $collection->where('name', 'ejecutivo-de-credito')->first();

        $empleados = User::all();

        $vaults = Vault::all()->sortByDesc('updated_at');

            // $rosters   = $vault_allocation->rosters;

        return view('movements.movementsBalance')
        ->with('region_allocation', $region_allocation)
        ->with('vaults', $vaults)
        ->with('empleados', $empleados);
    } elseif (Auth::user()->hasRole('coordinador-regional')) {
        $user_allocation = Auth::user();
        $region_allocation = $user_allocation->region;
        $branch_allocation = $user_allocation->branch;
        $collection = Role::all();
        $role = $collection->where('name', 'ejecutivo-de-credito')->first();

        $empleados = $region_allocation->users;

        $vaults = Vault::all()->sortByDesc('updated_at');

            // $rosters   = $vault_allocation->rosters;

        return view('movements.movementsBalance')
        ->with('region_allocation', $region_allocation)
        ->with('vaults', $vaults)
        ->with('empleados', $empleados);
    }
}
public function movementsBeginning()
{


    if (Auth::user()->hasRole(['administrador', 'director-general'])) {
        $user_allocation = Auth::user();
        $region_allocation = $user_allocation->region;
        $branch_allocation = $user_allocation->branch;
        $collection = Role::all();
        $role = $collection->where('name', 'ejecutivo-de-credito')->first();

        $empleados = $region_allocation->users;

        $starts_collection = Income::all();
        $starts = $starts_collection->where('concept', 'Saldo Inicial')->sortByDesc('created_at');
        return view('movements.movementsBeginning')
        ->with('region_allocation', $region_allocation)
        ->with('starts_collection', $starts_collection)
        ->with('starts', $starts)
        ->with('empleados', $empleados);
    } elseif (Auth::user()->hasRole('coordinador-regional')) {
        $user_allocation = Auth::user();
        $region_allocation = $user_allocation->region;
        $branch_allocation = $user_allocation->branch;
        $collection = Role::all();
        $role = $collection->where('name', 'ejecutivo-de-credito')->first();

        $empleados = $region_allocation->users;
        $region = $user_allocation->region->id;
        $starts_collection = Income::all();
        $starts = $starts_collection->where('concept', 'Saldo Inicial')->where('region_id', $region)->sortByDesc('created_at');
        return view('movements.movementsBeginning')
        ->with('region_allocation', $region_allocation)
        ->with('starts_collection', $starts_collection)
        ->with('starts', $starts)
        ->with('empleados', $empleados);
    }
}
public function movementsEffective()
{
    if (Auth::user()->hasRole(['administrador', 'director-general'])) {
        $user_allocation = Auth::user();
        $region_allocation = $user_allocation->region;
        $branch_allocation = $user_allocation->branch;
        $collection = Role::all();
        $role = $collection->where('name', 'ejecutivo-de-credito')->first();

        $empleados = $region_allocation->users;

        $starts_collection = Income::all();

        $assignments = $starts_collection->where('concept', 'Asignación de efectivo')->sortByDesc('created_at');
        return view('movements.movementsEffective')
        ->with('region_allocation', $region_allocation)
        ->with('starts_collection', $starts_collection)
        ->with('assignments', $assignments)
        ->with('empleados', $empleados);
    } elseif (Auth::user()->hasRole('coordinador-regional')) {
        $user_allocation = Auth::user();
        $region_allocation = $user_allocation->region;
        $branch_allocation = $user_allocation->branch;
        $collection = Role::all();
        $role = $collection->where('name', 'ejecutivo-de-credito')->first();

        $empleados = $region_allocation->users;
        $region = $user_allocation->region->id;
        $starts_collection = Income::all()->where('region_id', $region);

        $assignments = $starts_collection->where('concept', 'Asignación de efectivo')->sortByDesc('created_at');

        return view('movements.movementsEffective')
        ->with('region_allocation', $region_allocation)
        ->with('starts_collection', $starts_collection)
        ->with('assignments', $assignments)
        ->with('empleados', $empleados);
    }
}
public function movementsRecovery()
{
    if (Auth::user()->hasRole(['administrador', 'director-general'])) {
        $current = Carbon::today()->toDateString();
        $user_allocation = Auth::user();
        $region_allocation = $user_allocation->region;
        $branch_allocation = $user_allocation->branch;
        $collection = Role::all();
        $role = $collection->where('name', 'ejecutivo-de-credito')->first();

        $empleados = $region_allocation->users;
        $region = $user_allocation->region->id;
        $recoverys = IncomePayment::all()->sortByDesc('created_at');
        return view('movements.movementsRecovery')
        ->with('recoverys', $recoverys);
    } elseif (Auth::user()->hasRole('coordinador-regional')) {
        $current = Carbon::today()->toDateString();
        $user_allocation = Auth::user();
        $region_allocation = $user_allocation->region;
        $branch_allocation = $user_allocation->branch;
        $collection = Role::all();
        $role = $collection->where('name', 'ejecutivo-de-credito')->first();

        $empleados = $region_allocation->users;
        $region = $user_allocation->region->id;
        $recoverys = IncomePayment::all()->where('region_id', $region)->sortByDesc('created_at');
        return view('movements.movementsRecovery')
        ->with('recoverys', $recoverys);
    }
}
public function movementsRecoveryAccess()
{
    if (Auth::user()->hasRole(['administrador', 'director-general'])) {
        $user_allocation = Auth::user();
        $region_allocation = $user_allocation->region;
        $branch_allocation = $user_allocation->branch;
        $collection = Role::all();
        $role = $collection->where('name', 'ejecutivo-de-credito')->first();

        $empleados = $region_allocation->users;

        $accesses  = PurseAccess::all()->sortByDesc('created_at');
        return view('movements.movementsRecoveryAccess')
        ->with('accesses', $accesses);
    } elseif (Auth::user()->hasRole('coordinador-regional')) {
        $user_allocation = Auth::user();
        $region_allocation = $user_allocation->region;
        $branch_allocation = $user_allocation->branch;
        $collection = Role::all();
        $role = $collection->where('name', 'ejecutivo-de-credito')->first();

        $empleados = $region_allocation->users;
        $region = $user_allocation->region->id;
        $accesses  = PurseAccess::all()->where('region_id', $region)->sortByDesc('created_at');
        return view('movements.movementsRecoveryAccess')
        ->with('accesses', $accesses);
    }
}
public function movementsPlacement()
{
    if (Auth::user()->hasRole(['administrador', 'director-general'])) {
        $user_allocation = Auth::user();
        $region_allocation = $user_allocation->region;
        $branch_allocation = $user_allocation->branch;
        $collection = Role::all();
        $role = $collection->where('name', 'ejecutivo-de-credito')->first();

        $empleados = $region_allocation->users;

        $credits = ExpenditureCredit::all()->sortByDesc('created_at');
        return view('movements.movementsPlacement')
        ->with('credits', $credits);
    } elseif (Auth::user()->hasRole('coordinador-regional')) {
        $user_allocation = Auth::user();
        $region_allocation = $user_allocation->region;
        $branch_allocation = $user_allocation->branch;
        $collection = Role::all();
        $role = $collection->where('name', 'ejecutivo-de-credito')->first();

        $empleados = $region_allocation->users;
        $region = $user_allocation->region->id;
        $credits = ExpenditureCredit::all()->where('region_id', $region)->sortByDesc('created_at');
        return view('movements.movementsPlacement')
        ->with('credits', $credits);
    }
}
public function movementsExpenses()
{
    if (Auth::user()->hasRole(['administrador', 'director-general'])) {
        $user_allocation = Auth::user();
        $region_allocation = $user_allocation->region;
        $branch_allocation = $user_allocation->branch;
        $collection = Role::all();
        $role = $collection->where('name', 'ejecutivo-de-credito')->first();

        $empleados = $region_allocation->users;

        $expenses  = Expenditure::all()->sortByDesc('created_at');
        return view('movements.movementsExpenses')
        ->with('expenses', $expenses);
    } elseif (Auth::user()->hasRole('coordinador-regional')) {
        $user_allocation = Auth::user();
        $region_allocation = $user_allocation->region;
        $branch_allocation = $user_allocation->branch;
        $collection = Role::all();
        $role = $collection->where('name', 'ejecutivo-de-credito')->first();

        $empleados = $region_allocation->users;
        $region = $user_allocation->region->id;
        $expenses  = Expenditure::all()->where('region_id', $region)->sortByDesc('created_at');
        return view('movements.movementsExpenses')
        ->with('expenses', $expenses);
    }
}
public function movementsSalaries()
{
    if (Auth::user()->hasRole(['administrador', 'director-general'])) {
        $user_allocation = Auth::user();
        $region_allocation = $user_allocation->region;
        $branch_allocation = $user_allocation->branch;
        $collection = Role::all();
        $role = $collection->where('name', 'ejecutivo-de-credito')->first();

        $empleados = $region_allocation->users;

        $rosters   = Roster::all()->sortByDesc('created_at');
        return view('movements.movementsSalaries')
        ->with('rosters', $rosters);
    } elseif (Auth::user()->hasRole('coordinador-regional')) {
        $user_allocation = Auth::user();
        $region_allocation = $user_allocation->region;
        $branch_allocation = $user_allocation->branch;
        $collection = Role::all();
        $role = $collection->where('name', 'ejecutivo-de-credito')->first();

        $empleados = $region_allocation->users;
        $region = $user_allocation->region->id;
        $rosters   = Roster::all()->where('region_id', $region)->sortByDesc('created_at');
        return view('movements.movementsSalaries')
        ->with('rosters', $rosters);
    }
}
public function movementsCut()
{
    if (Auth::user()->hasRole(['administrador', 'director-general'])) {
        $user_allocation = Auth::user();
        $region_allocation = $user_allocation->region;
        $branch_allocation = $user_allocation->branch;
        $collection = Role::all();
        $role = $collection->where('name', 'ejecutivo-de-credito')->first();

        $empleados = $region_allocation->users;

        $cuts = BoxCut::all()->sortByDesc('created_at');
        return view('movements.movementsCut')
        ->with('cuts', $cuts);
    } elseif (Auth::user()->hasRole('coordinador-regional')) {
        $user_allocation = Auth::user();
        $region_allocation = $user_allocation->region;
        $branch_allocation = $user_allocation->branch;
        $collection = Role::all();
        $role = $collection->where('name', 'ejecutivo-de-credito')->first();

        $empleados = $region_allocation->users;
        $region = $user_allocation->region->id;
        $cuts = BoxCut::all()->where('region_id', $region)->sortByDesc('created_at');
        return view('movements.movementsCut')
        ->with('cuts', $cuts);
    }
}

public function movementsActives()
{
    if (Auth::user()->hasRole(['administrador', 'director-general'])) {
        $user_allocation = Auth::user();
        $region_allocation = $user_allocation->region;
        $branch_allocation = $user_allocation->branch;
        $collection = Role::all();
        $role = $collection->where('name', 'ejecutivo-de-credito')->first();

        $empleados = $region_allocation->users;

        $actives = Active::all()->sortByDesc('created_at');
        return view('movements.movementsActives')
        ->with('actives', $actives);
    } elseif (Auth::user()->hasRole('coordinador-regional')) {
        $user_allocation = Auth::user();
        $region_allocation = $user_allocation->region;
        $branch_allocation = $user_allocation->branch;
        $collection = Role::all();
        $role = $collection->where('name', 'ejecutivo-de-credito')->first();

        $empleados = $region_allocation->users;
        $region = $user_allocation->region->id;
        $actives = Active::all()->where('region_id', $region)->sortByDesc('created_at');
        return view('movements.movementsActives')
        ->with('actives', $actives);
    }
}

public function walletExpired()
{
    $credits = Credit::all();
    return view('credits.wallet_expired')
    ->with('credits', $credits);
}

public function reportPayment()
{
    $recoverys = IncomePayment::all()->sortByDesc('created_at');
    return view('partials.reportPayment')
    ->with('recoverys', $recoverys);
}
public function reportPaymentAltos()
{
    $payments = Payment::all()->where('region_id',3)->sortByDesc('created_at');
    return view('partials.reportPaymentAltos')
    ->with('payments',$payments);
}
public function reportPaymentNorte()
{
    $payments = Payment::all()->where('region_id',1)->sortByDesc('created_at');
    return view('partials.reportPaymentNorte')
    ->with('payments',$payments);

}
public function reportPaymentCentro()
{
    $payments = Payment::all()->where('region_id',2)->sortByDesc('created_at');
    return view('partials.reportPaymentCentro')
    ->with('payments',$payments);
}
public function reportPaymentTeran()
{
    $payments = Payment::all()->where('branch_id',12)->sortByDesc('created_at');
    return view('partials.reportPaymentTeran')
    ->with('payments',$payments);
}
public function reportPayment24()
{
    $payments = Payment::all()->where('branch_id',3)->sortByDesc('created_at');
    return view('partials.reportPayment24')
    ->with('payments',$payments);
}
public function reportPaymentMezcalapa()
{

    $payments = Payment::all()->where('region_id',4)->sortByDesc('created_at');
    return view('partials.reportPaymentMezcalapa')
    ->with('payments',$payments);
        // $recoverys = IncomePayment::all()->where('region_id',4)->sortByDesc('created_at');
        // return view('partials.reportPayment')
        // ->with('recoverys', $recoverys);
}

public function totalVault()
{
    $vault = Vault::all();
    return view('reports.totalVault')
    ->with('vault', $vault);
}
public function currentCredits()
{
    $credits = Credit::all();
    return view('reports.currentCredits')
    ->with('credits', $credits);
}

public function consolidate(Request $request)
{
        //echo "Hello World!";
    $input = $request->all();
    $global_capital = 0;
    $global_interest = 0;
    $global_moratorium = 0;

    foreach ($input['rows'] as $row) {
        $id_credit = $row['id'];
        $credit = Credit::find($id_credit);
        $client = Client::find($id_credit);
        $debt = $credit->debt;
        $client = $credit->client;
        $late_capital = DB::table('payments')->where([
            ['debt_id', '=', $debt->id],
            ['status', '!=', 'Pagado'],
        ])->sum('capital');
        $late_interest = DB::table('payments')->where([
            ['debt_id', '=', $debt->id],
            ['status', '!=', 'Pagado'],
        ])->sum('interest');
        $late_moratorium = DB::table('payments')->where([
            ['debt_id', '=', $debt->id],
            ['status', '!=', 'Pagado'],
        ])->sum('moratorium');
        $late_total = $late_interest + $late_capital + $late_moratorium;

        $global_capital = $global_capital + $late_capital;
        $global_interest = $global_interest + $late_interest;
        $global_moratorium = $global_moratorium + $late_moratorium;
    }

    return view('restructures.process')
    ->with('global_capital', $global_capital)
    ->with('global_interest', $global_interest)
    ->with('global_moratorium', $global_moratorium)
    ->with('credit',$credit)
    ->with('client',$client);
}

public function reverse($id)
{
    $credit = Credit::find($id);
    $debt = $credit->debt;
    $expenditure = $credit->expendituresCredit;
    $promoter = $credit->user;
    $vault = $promoter->vault;

    $amount_credit = $credit->ammount;
    $interest_credit = $credit->interest_rate/100;
    $plus = $amount_credit * $interest_credit;
    $total = ceil($amount_credit + $plus);
    if ($credit->periodicity == 'SEMANAL') {
        if ($debt->ammount == $total) {
            $credit->delete();
            $expenditure->delete();
            Toastr::success('Crédito revertido exitosamente.', '', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
            return redirect()->back();
        } else {
            Toastr::error('Este crédito ya cuenta con cuotas pagadas por lo que no es posible revertir.', '', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
            return redirect()->back();
        }
    } elseif ($credit->periodicity == 'TRADICIONAL') {
        if ($debt->ammount == $total) {
            $credit->delete();
            $expenditure->delete();
            Toastr::success('Crédito revertido exitosamente.', '', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
            return redirect()->back();
        } else {
            Toastr::error('Este crédito ya cuenta con cuotas pagadas por lo que no es posible revertir.', '', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
            return redirect()->back();
        }
    } elseif ($credit->periodicity == 'DIARIO25') {
        if ($debt->ammount == $total) {
            $credit->delete();
            $expenditure->delete();
            Toastr::success('Crédito revertido exitosamente.', '', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
            return redirect()->back();
        } else {
            Toastr::error('Este crédito ya cuenta con cuotas pagadas por lo que no es posible revertir.', '', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
            return redirect()->back();
        }
    } elseif ($credit->periodicity == 'DIARIO4') {
        if ($debt->ammount == $total) {
            $credit->delete();
            $expenditure->delete();
            Toastr::success('Crédito revertido exitosamente.', '', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
            return redirect()->back();
        } else {
            Toastr::error('Este crédito ya cuenta con cuotas pagadas por lo que no es posible revertir.', '', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
            return redirect()->back();
        }
    } else {
        if ($debt->ammount == $total) {
            $credit->delete();
            $expenditure->delete();
            $vault->ammount = $vault->ammount + $amount_credit;
            $vault->save();
            Toastr::success('Crédito revertido exitosamente.', '', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
            return redirect()->back();
        } else {
            Toastr::error('Este crédito ya cuenta con cuotas pagadas por lo que no es posible revertir.', '', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
            return redirect()->back();
        }
    }
}
public function moveClient(Request $request)
{
   $clients= Client::all();
   $id_user = $request->input('user_id');
   $user = User::find($id_user);
   return view('partials.moveClients')
   ->with('clients',$clients)
   ->with('user',$user);
}
public function moveClientAll(Request $request)
{
   $id_user = $request->input('user_id');
   $user = User::find($id_user);
   $input = $request->all();

   foreach ($input['rows'] as $row) 
   {
    $id_client = $row['id'];
    $client = Client::find($id_client);
    $client->branch_id = $user->branch_id;
    $client->user_id = $user->id;
    $client->region_id = $user->region_id;
    $client->save();
    $credits = $client->credits;
    foreach ($credits as $key => $credit) {
     $credit->adviser = $user->name.' '.$user->father_last_name.' '.$user->mother_last_name;
     $credit->user_id = $user->id;
     $credit->branch_id = $user->branch_id;
     $credit->region_id = $user->region_id;
     $credit->save();

     $debt = $credit->debt;
     $debt->branch_id = $user->branch_id;
     $debt->region_id = $user->region_id;
     $debt->save();

     $payments = $debt->payments;
     foreach ($payments as $key => $payment) {
         $payment->user_id = $user->id;
         $payment->branch_id = $user->branch_id;
         $payment->region_id = $user->region_id;
         $payment->save();
     }
 }

}

Toastr::success('Cliente o Clientes Transferido Exitosamente.', 'Transferencia de Cliente', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
return view('home');
}

public function finalDay(Request $request){

    foreach ($request->input() as $key => $date) {
       $data_final[$key]['date'] = $date;
   }
    // $data_final['date']= $request->input('date');
    // $data_final['region']= $request->input('region');
    // $data_final['branch']= $request->input('branch');
    // $data_final['name']= $request->input('name');
    // $data_final['vault']= $request->input('vault');
    // $data_final['incomes']= $request->input('incomes');
    // $data_final['incomePayment']= $request->input('incomePayment');
    // $data_final['access']= $request->input('access');
    // $data_final['credit']= $request->input('credit');
    // $data_final['expenditures']= $request->input('expenditures');
    // $data_final['actives']= $request->input('actives');

     // dd($data_final);
   $final = Finals::create($data_final);



   Toastr::success('Cierre de Día Exitosamente.', 'Cierre Día', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
   return redirect()->back();
}

public function paymentsDueToday()
{
    if (Auth::user()->hasRole(['administrador', 'director-general'])) {
        $payments = Payment::all();
            // $users = User::where('id', '!=', Auth::id())->get();
            // $users = User::all();
        return view('payments.paymentsDueToday')
        ->with('payments', $payments);
    } elseif (Auth::user()->hasRole('coordinador-regional')) {
       
        $user_allocation = Auth::user();
        $region_allocation = $user_allocation->region;
        $branch_allocation = $user_allocation->branch;
        

        
        $region = $user_allocation->region->id;
        $payments = Payment::all()->where('region_id', $region);

        return view('payments.paymentsDueToday')
        ->with('payments', $payments);
    } 
}

}
