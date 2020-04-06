@extends('layouts.app')
@section('content')

	<div class="container">
		<div>
            <a href="{{ route('adddata') }}" class="btn btn-primary">Add Data</a>
        </div>

    	<div class="row justify-content-center">
        	<div class="col-md-8">
            	<div class="card">
					<table class="table">
						<thead class=" thead-light">
							<tr>
								<th>Id</th>
								<th>Name</th>
								<th>EMail</th>
								<th>Mobile Number</th>
								<th>Image</th>
								<th>Gender</th>
								<th>City</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
						@if($data)
							@foreach($data as $alldata)
							<tr>
								<th>{{ $alldata->id }}</th>
								<th>{{ $alldata->name }}</th>
								<th>{{ $alldata->email }}</th>
								<th>{{ $alldata->mobile_no }}</th>
								<th>{{ $alldata->image }}</th>
								<th>{{ $alldata->gender }}</th>
								<th>{{ $alldata->city }}</th>
								<th><a href="{{ route('edit',$alldata->id) }}" class="btn btn-warning">Edit</a></th>
								<th><a href="{{ route('delete',$alldata->id) }}" class="btn btn-danger">Delete</a></th>
							</tr>
							@endforeach
						@endif
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

@endsection