@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Data</div>
                <div class="card-body">
                	@if($data)
                	@foreach($data as $userdata)
                    <form method="POST" action="{{ route('updatedata') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{$userdata->id}}" name="id">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $userdata->name ?? old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$userdata->email ?? old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Image" class="col-md-4 col-form-label text-md-right">Image</label>

                            <div class="col-md-6">
                            	<img src="{{ asset('image') }}/{{$userdata->image}}" width="100px" height="100px"></img>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Mobile No</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('mobile_no') is-invalid @enderror" name="mobile_no" value="{{ $userdata->mobile_no ?? $old('mobile_no') }}" required autocomplete="mobile_no" autofocus>

                                @error('mobile_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Image" class="col-md-4 col-form-label text-md-right">Gender</label>

                            <div class="col-md-6">
                                <input type="radio" class="form-control @error('gender') is-invalid @enderror" name="gender" value="male" {{ ($userdata->gender=="male")? "checked" : "" }} required>Male
                                <input type="radio" class="form-control @error('gender') is-invalid @enderror" name="gender" value="female" {{ ($userdata->gender=="female")? "checked" : "" }} required>Female
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Image" class="col-md-4 col-form-label text-md-right">City</label>

                            <div class="col-md-6">
                                <select name="city" class="form-control @error('city') is-invalid @enderror">
                                	<option value="Rajkot"{{ $userdata->city == 'Rajkot' ? 'selected' : '' }}>Rajkot</option>
                                	<option value="Morbi"{{ $userdata->city == 'Morbi' ? 'selected' : '' }}>Morbi</option>
                                	<option value="Ahmedabad"{{ $userdata->city == 'Ahmedabad' ? 'selected' : '' }}>Ahmedabad</option>
                                	<option value="Jamnagar"{{ $userdata->city == 'Jamnagar' ? 'selected' : '' }}>Jamnagar</option>
                                </select>
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection