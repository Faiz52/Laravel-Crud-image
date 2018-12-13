@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
        <h2 class="text-center">LARAVEL CRUD</h2>
    </div>
    	@if($message = Session::get('success'))
	<div class="alert alert-success text-center">{{$message}}</div>
	@endif
    
    <a href="{{url('students/create')}}" class="btn btn-primary" role="button">Insert Data</a>
    <br><br>


    <table class="table table-hover">
    	<tr>
	    	<th>ID</th>
	    	<th>First Name</th>
	    	<th>Last Name</th>
	    	<th>Email</th>
	    	<th>Image</th>
	    	<th>Action</th>
	    	<th>Action</th>
    	</tr>
    	@foreach($students as $student)
    	<tr>
			<td>{{$student->id}}</td>
			<td>{{$student->firstname}}</td>
			<td>{{$student->lastname}}</td>
			<td>{{$student->email}}</td>
			<td>
				<img src="{{asset($student->avatar)}}" alt="{{$student->firstname}}" class="thumbnail" width="50px">
			</td>
			<td>
				<a href="students/{{$student->id}}/edit" role="button" class="btn btn-primary">Edit</a>
			</td>
			<td>
				<form action="{{route('students.destroy' , $student->id)}}" method="POST">
					{{method_field('DELETE')}}
					{{csrf_field()}}
					
					<input type="submit" name="submit" value="Delete" class="btn btn-danger">
				</form>
			</td>
    	</tr>
    	@endforeach
    	<tr>
	    	<th>ID</th>
	    	<th>First Name</th>
	    	<th>Last Name</th>
	    	<th>Email</th>
	    	<th>Image</th>
	    	<th>Action</th>
	    	<th>Action</th>
    	</tr>
    </table>

<div class="pull-right">
    {!! $students->links() !!}
</div>


</div>
@endsection
