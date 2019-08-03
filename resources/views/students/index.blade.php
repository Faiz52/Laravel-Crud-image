@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
        <h2 class="text-center">LARAVEL CRUD</h2>
    </div>
    	@if($message = Session::get('success'))
	<div class="alert alert-success text-center">{{$message}}</div>
	@endif

	<div>
		<a href="{{route('students.create')}}" class="btn btn-primary" role="button">Insert Data</a>
	</div>
<br>
		
	<form action="{{route('student.search')}}" method="GET">
    	<div class="input-group">
      		<input type="text" class="form-control" placeholder="Search by Name" name="query">
      	<div class="input-group-btn">
        	<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
      	</div>
    	</div>
    </form>

	<br>

    
    <table class="table table-hover">
    	<tr>
	    	<th>ID</th>
	    	<th>First Name</th>
	    	<th>Last Name</th>
	    	<th>Email</th>
	    	<th>Image</th>
	    	<th>Action</th>
    	</tr>

    	@foreach($students as $student)
    	<tr>
			<td>{{$student->id}}</td>
			<td>{{$student->firstname}}</td>
			<td>{{$student->lastname}}</td>
			<td>{{$student->email}}</td>
			<td>
				<img src="{{asset($student->avatar)}}" alt="{{$student->firstname}}" class="thumbnail" width="60px" height="60px">
			</td>
			<td>
				
			
				<form action="{{route('students.destroy' , $student->id)}}" method="POST">
					{{method_field('DELETE')}}
					{{csrf_field()}}
					<a href="{{route('students.edit' , $student->id)}}" role="button" class="btn btn-primary">Edit</a>
					<input type="submit" name="submit" value="Delete" class="btn btn-danger" id="del_data">
				</form>
			</td>
    	</tr>
    	@endforeach
    </table>

<div class="pull-right">
    {{ $students->appends(['query' => request()->query('query')])->links() }}
</div>


</div>

@endsection
