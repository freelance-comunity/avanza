<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;
use Toastr;

class ProductController extends AppBaseController
{

	/**
	 * Display a listing of the Post.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$query = Product::query();
        $columns = Schema::getColumnListing('$TABLE_NAME$');
        $attributes = array();

        foreach($columns as $attribute){
            if($request[$attribute] == true)
            {
                $query->where($attribute, $request[$attribute]);
                $attributes[$attribute] =  $request[$attribute];
            }else{
                $attributes[$attribute] =  null;
            }
        };

        $products = $query->get();

        return view('products.index')
            ->with('products', $products)
            ->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Product.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('products.create');
	}

	/**
	 * Store a newly created Product in storage.
	 *
	 * @param CreateProductRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateProductRequest $request)
	{
        $input = $request->all();

		$product = Product::create($input);

		Toastr::success('Producto creado exitosamente.', 'Productos', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

		return redirect(route('products.index'));
	}

	/**
	 * Display the specified Product.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$product = Product::find($id);

		if(empty($product))
		{
			Flash::error('Product not found');
			return redirect(route('products.index'));
		}

		return view('products.show')->with('product', $product);
	}

	/**
	 * Show the form for editing the specified Product.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$product = Product::find($id);

		if(empty($product))
		{
			Flash::error('Product not found');
			return redirect(route('products.index'));
		}

		return view('products.edit')->with('product', $product);
	}

	/**
	 * Update the specified Product in storage.
	 *
	 * @param  int    $id
	 * @param CreateProductRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateProductRequest $request)
	{
		/** @var Product $product */
		$product = Product::find($id);

		if(empty($product))
		{
			Flash::error('Product not found');
			return redirect(route('products.index'));
		}

		$product->fill($request->all());
		$product->save();

		Toastr::success('Producto editado exitosamente.', 'Productos', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

		return redirect(route('products.index'));
	}

	/**
	 * Remove the specified Product from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Product $product */
		$product = Product::find($id);

		if(empty($product))
		{
			Flash::error('Product not found');
			return redirect(route('products.index'));
		}

		$product->delete();

		Toastr::success('Producto eliminado exitosamente.', 'Productos', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);

		return redirect(route('products.index'));
	}
}
