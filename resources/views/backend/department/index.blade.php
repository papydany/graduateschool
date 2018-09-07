@extends('layouts.admin')
@section('title','Department')
@section('content')
 <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('backend')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Department</li>
      </ol>
<div class="row">
	<div class="col-sm-5">
        <div class="card">
      <div class="card-header">Department</div>
      <div class="card-body">
     <form class="form-horizontal" method="POST" action="{{ route('department') }}">
                        {{ csrf_field() }}
          <div class="form-group">
            <div class="form-row">
              <select class="form-control" name="faculty_id">
                <option value="">select faculty</option>
                @foreach($f as $v)
             <option value="{{$v->id}}">{{$v->name}}</option>
                @endforeach
                
              </select>
           

          </div>
          </div>                
          <div class="form-group">
            <div class="form-row">
           
            <input class="form-control"  type="text"  placeholder="Enter Department name" name="name">
          </div>
          </div>
          <input type="submit" value="Create" class="btn btn-primary btn-block">
        </form>
      
      </div>
    </div>
</div>
@if(!empty($d))
<div class="col-sm-7">
    <div class="card">
      <div class="card-header">Department</div>
      <div class="card-body">
       <div class="table-responsive">
            <table class="table table-bordered" >
              <thead>
                <tr>
                   <th>#</th>
                  <th>Name</th>
                  <th>Action</th>
                 </tr>
              </thead>
              <?php $i = 0; ?>
              @foreach($d as $v)
              <tr>
              	<td>{{++$i}}</td>
              	<td>{{$v->name}}</td>
              	<td>
  
    <a href="{{ route('edit_department',['id'=>$v->id]) }}" class="btn btn-xs btn-success">Edit</a>
    
 
</div>
              		

              	</td>
              </tr>
              @endforeach
          </table>
      </div>
 
      </div>
    </div>
</div>
@endif
</div>

</div>
@endsection