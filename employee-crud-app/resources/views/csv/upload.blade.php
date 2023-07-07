@extends('layouts.app')
@section('content')
<!-- upload.blade.php -->
<div class="card">
	<div class="card-header">Add Employee</div>
	<div class="card-body">
    <form action="/csv/upload" method="post" enctype="multipart/form-data">
    @csrf
            <div class="row mb-4">
				<label class="col-sm-2 col-label-form">Uplaod Employee CSV File</label>
				<div class="col-sm-10">
                <input class="form-control" type="file" name="csv_file" accept=".csv,.xlsx">
				</div>
			</div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Upload" />
			</div>
		</form>
	</div>
</div>
@endsection
