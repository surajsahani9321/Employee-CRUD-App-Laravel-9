@extends('layouts.app')

@section('content')

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>Employee Details</b></div>
			<div class="col col-md-6">
				<a href="{{ route('employees.index') }}" class="btn btn-primary btn-sm float-end">View All</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Employee Name</b></label>
			<div class="col-sm-10">
				{{ $employee->employee_name }}
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Employee Email</b></label>
			<div class="col-sm-10">
				{{ $employee->employee_email }}
			</div>
		</div>
		<div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Employee Gender</b></label>
			<div class="col-sm-10">
				{{ $employee->employee_gender }}
			</div>
		</div>
		<div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Employee Department</b></label>
			<div class="col-sm-10">
				{{ $employee->employee_department }}
			</div>
		</div>
		<div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Employee Role</b></label>
			<div class="col-sm-10">
				{{ $employee->employee_role }}
			</div>
		</div>
		<div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Employee Image</b></label>
			<div class="col-sm-10">
				<img src="{{ asset('images/' .  $employee->employee_image) }}" width="200" class="img-thumbnail" />
			</div>
		</div>
	</div>
</div>

@endsection('content')
