@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
        <h2 class="text-center">LARAVEL CRUD</h2>
    </div>

<!--     @if(count($errors) > 0)
	<div class="alert alert-danger">
		
		@foreach($errors->all() as $error)
				<li class="list">{{$error}}</li>
		@endforeach
	</div>
	@endif -->

	@if(Session::has('success'))
	<div class="alert alert-success">
		<p>{{Session::get('success')}}</p>
	</div>	
	@endif

	<form action="{{route('students.store')}}" method="POST" enctype="multipart/form-data">
		{{csrf_field()}}
		<div class="form-group">
			<label for="Name" class="label-control">First Name</label>
			<input type="text" name="firstname" class="form-control" value="{{ old('firstname') }}"  autofocus>
			 @if ($errors->has('firstname'))
             	<span class="help-block">
             		<strong>{{ $errors->first('firstname') }}</strong>
             	</span>
             @endif
		</div>
		<div class="form-group">
			<label for="Name" class="label-control">Last Name</label>
			<input type="text" name="lastname" class="form-control" value="{{ old('lastname') }}"  autofocus>
			 @if ($errors->has('lastname'))
             	<span class="help-block">
             		<strong>{{ $errors->first('lastname') }}</strong>
             	</span>
             @endif
		</div>
		<div class="form-group">
			<label for="Name" class="label-control">Email</label>
			<input type="text" name="email" class="form-control" value="{{ old('email') }}"  autofocus>
			 @if ($errors->has('email'))
             	<span class="help-block">
             		<strong>{{ $errors->first('email') }}</strong>
             	</span>
             @endif
		</div>
		<div class="form-group">
			<label for="Name" class="label-control">Image</label>
			<input type="file" name="avatar" class="form-control" class="btn btn-primary">

		</div>
		<div class="form-group">
			<input type="submit" name="submit" class="btn btn-primary" value="Insert Data">
		</div>
	</form>



</div>
@endsection
