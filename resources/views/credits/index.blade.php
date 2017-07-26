@extends('layouts.app')

@section('main-content')

<div class="container">

	@include('flash::message')

	<div class="row">
		<h1 class="pull-left">Credits</h1>
		<a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('credits.create') !!}">Add New</a>
	</div>

	<div class="row">
		@if($credits->isEmpty())
		<div class="well text-center">No Credits found.</div>
		@else
		<div class="table-responsive">
			<table class="table"  id="example">
				<thead>
					<th>Adviser</th>
					<th>Date</th>
					<th>Folio</th>
					<th>Ammount</th>
					<th>Interest Rate</th>
					<th>Dues</th>
					<th>Branch</th>
					<th>Periodicity</th>
					<th>Warranty Type</th>
					<th>Firts Name</th>
					<th>Last Name</th>
					<th>Mothers Last Name</th>
					<th>Curp</th>
					<th>Ine</th>
					<th>Civil Status</th>
					<th>Scholarship</th>
					<th>Street</th>
					<th>Number</th>
					<th>Colony</th>
					<th>Municipality</th>
					<th>State</th>
					<th>Postal Code</th>
					<th>Phone</th>
					<th>Dependents</th>
					<th>No Familys</th>
					<th>Type Of Housing</th>
					<th>References</th>
					<th>Street Company</th>
					<th>Number Company</th>
					<th>Colony Company</th>
					<th>Municipality Company</th>
					<th>State Company</th>
					<th>Postal Code Company</th>
					<th>Phone Company</th>
					<th>Name Company</th>
					<th>Inventory</th>
					<th>Maq Equi</th>
					<th>Vehicles</th>
					<th>Property</th>
					<th>Box Benck</th>
					<th>Accounts</th>
					<th>Suppliers</th>
					<th>Credits</th>
					<th>Payments</th>
					<th>Specify</th>
					<th>Weekday</th>
					<th>Weekend</th>
					<th>Utility</th>
					<th>Other Income</th>
					<th>Rent</th>
					<th>Salary</th>
					<th>Others</th>
					<th>Name Aval</th>
					<th>Last Name Aval</th>
					<th>Mothers Name Aval</th>
					<th>Birthdate Aval</th>
					<th>Curp Aval</th>
					<th>Phone Aval</th>
					<th>Civil Status Aval</th>
					<th>Scholarship Aval</th>
					<th>Street Aval</th>
					<th>Number Aval</th>
					<th>Colony Aval</th>
					<th>Municipality Aval</th>
					<th>State Aval</th>
					<th>Postal Code Aval</th>
					<th>Firts Name Reference</th>
					<th>Last Name Reference</th>
					<th>Mothers Last Name Reference</th>
					<th>Phone Reference</th>
					<th>Firm</th>
					<th width="50px">Action</th>
				</thead>
				<tbody>

					@foreach($credits as $credit)
					<tr>
						<td>{!! $credit->adviser !!}</td>
						<td>{!! $credit->date !!}</td>
						<td>{!! $credit->folio !!}</td>
						<td>{!! $credit->ammount !!}</td>
						<td>{!! $credit->interest_rate !!}</td>
						<td>{!! $credit->dues !!}</td>
						<td>{!! $credit->branch !!}</td>
						<td>{!! $credit->periodicity !!}</td>
						<td>{!! $credit->warranty_type !!}</td>
						<td>{!! $credit->firts_name !!}</td>
						<td>{!! $credit->last_name !!}</td>
						<td>{!! $credit->mothers_last_name !!}</td>
						<td>{!! $credit->curp !!}</td>
						<td>{!! $credit->ine !!}</td>
						<td>{!! $credit->civil_status !!}</td>
						<td>{!! $credit->scholarship !!}</td>
						<td>{!! $credit->street !!}</td>
						<td>{!! $credit->number !!}</td>
						<td>{!! $credit->colony !!}</td>
						<td>{!! $credit->municipality !!}</td>
						<td>{!! $credit->state !!}</td>
						<td>{!! $credit->postal_code !!}</td>
						<td>{!! $credit->phone !!}</td>
						<td>{!! $credit->dependents !!}</td>
						<td>{!! $credit->no_familys !!}</td>
						<td>{!! $credit->type_of_housing !!}</td>
						<td>{!! $credit->references !!}</td>
						<td>{!! $credit->street_company !!}</td>
						<td>{!! $credit->number_company !!}</td>
						<td>{!! $credit->colony_company !!}</td>
						<td>{!! $credit->municipality_company !!}</td>
						<td>{!! $credit->state_company !!}</td>
						<td>{!! $credit->postal_code_company !!}</td>
						<td>{!! $credit->phone_company !!}</td>
						<td>{!! $credit->name_company !!}</td>
						<td>{!! $credit->inventory !!}</td>
						<td>{!! $credit->maq_equi !!}</td>
						<td>{!! $credit->vehicles !!}</td>
						<td>{!! $credit->property !!}</td>
						<td>{!! $credit->box_benck !!}</td>
						<td>{!! $credit->accounts !!}</td>
						<td>{!! $credit->suppliers !!}</td>
						<td>{!! $credit->credits !!}</td>
						<td>{!! $credit->payments !!}</td>
						<td>{!! $credit->specify !!}</td>
						<td>{!! $credit->weekday !!}</td>
						<td>{!! $credit->weekend !!}</td>
						<td>{!! $credit->utility !!}</td>
						<td>{!! $credit->other_income !!}</td>
						<td>{!! $credit->rent !!}</td>
						<td>{!! $credit->salary !!}</td>
						<td>{!! $credit->others !!}</td>
						<td>{!! $credit->name_aval !!}</td>
						<td>{!! $credit->last_name_aval !!}</td>
						<td>{!! $credit->mothers_name_aval !!}</td>
						<td>{!! $credit->birthdate_aval !!}</td>
						<td>{!! $credit->curp_aval !!}</td>
						<td>{!! $credit->phone_aval !!}</td>
						<td>{!! $credit->civil_status_aval !!}</td>
						<td>{!! $credit->scholarship_aval !!}</td>
						<td>{!! $credit->street_aval !!}</td>
						<td>{!! $credit->number_aval !!}</td>
						<td>{!! $credit->colony_aval !!}</td>
						<td>{!! $credit->municipality_aval !!}</td>
						<td>{!! $credit->state_aval !!}</td>
						<td>{!! $credit->postal_code_aval !!}</td>
						<td>{!! $credit->firts_name_reference !!}</td>
						<td>{!! $credit->last_name_reference !!}</td>
						<td>{!! $credit->mothers_last_name_reference !!}</td>
						<td>{!! $credit->phone_reference !!}</td>
						<td>{!! $credit->firm !!}</td>
						<td>
							<a href="{!! route('credits.edit', [$credit->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
							<a href="{!! route('credits.delete', [$credit->id]) !!}" onclick="return confirm('Are you sure wants to delete this Credit?')"><i class="glyphicon glyphicon-remove"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			</div>
			@endif
		</div>
	</div>
	@endsection