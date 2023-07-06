@extends('layouts.app')

@section('content')

<div class="card">
	<div class="card-header">Edit Employee</div>
	<div class="card-body">
		<form method="post" action="{{ route('employees.update', $employee->id) }}" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Employee Name</label>
				<div class="col-sm-10">
					<input type="text" name="employee_name" class="form-control" value="{{ $employee->employee_name }}" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Employee Email</label>
				<div class="col-sm-10">
					<input type="text" name="employee_email" class="form-control" value="{{ $employee->employee_email }}" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Employee Department</label>
				<div class="col-sm-10">
					<input type="text" name="employee_department" class="form-control" value="{{ $employee->employee_department }}" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Employee Role</label>
				<div class="col-sm-10">
					<input type="text" name="employee_role" class="form-control" value="{{ $employee->employee_role }}" />
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
					<br />
					<img src="{{ asset('images/' . $employee->employee_image) }}" width="100" class="img-thumbnail" />
					<input type="hidden" name="hidden_employee_image" value="{{ $employee->employee_image }}" />
				</div>
			</div>
			<div class="text-center">
				<input type="hidden" name="hidden_id" value="{{ $employee->id }}" />
				<input type="submit" class="btn btn-primary" value="Edit" />
			</div>	
		</form>
	</div>
</div>
<script>
document.getElementsByName('employee_gender')[0].value = "{{ $employee->employee_gender }}";
</script>

@endsection('content')