@extends('layouts.app')

@section('content')

@if($errors->any())

<div class="alert alert-danger">
	<ul>
	@foreach($errors->all() as $error)

		<li>{{ $error }}</li>

	@endforeach
	</ul>
</div>

@endif

<div class="card">
	<div class="card-header">Add Employee</div>
	<div class="card-body">
		<form method="post" action="{{ route('employees.store') }}" enctype="multipart/form-data">
			@csrf
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Employee Name</label>
				<div class="col-sm-10">
					<input type="text" name="employee_name" class="form-control" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Employee Email</label>
				<div class="col-sm-10">
					<input type="text" name="employee_email" class="form-control" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Employee Department</label>
				<div class="col-sm-10">
					<input type="text" name="employee_department" class="form-control" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Employee Role</label>
				<div class="col-sm-10">
					<input type="text" name="employee_role" class="form-control" />
				</div>
			</div>
			<div class="row mb-4">
				<label class="col-sm-2 col-label-form">Employee Gender</label>
				<div class="col-sm-10">
					<select name="employee_gender" class="form-control">
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					</select>
				</div>
			</div>
			<div class="row mb-4">
				<label class="col-sm-2 col-label-form">Employee Image</label>
				<div class="col-sm-10">
					<input type="file" name="employee_image" />
				</div>
			</div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Add" />
			</div>	
		</form>
	</div>
</div>

@endsection('content')
