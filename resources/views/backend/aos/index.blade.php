@extends('layouts.admin')
@section('title','AOS')
@section('content')
 <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('backend')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">AOS</li>
      </ol>
<div class="row">
	<div class="col-sm-5">
        <div class="card">
      <div class="card-header">AOS</div>
      <div class="card-body">
     <form class="form-horizontal" method="POST" action="{{ route('aos') }}">
                        {{ csrf_field() }}
          <div class="form-group">
            <div class="form-row">
              <select class="form-control" id="faculty_id" name="faculty_id" >
                <option value="">select faculty</option>
                @foreach($f as $v)
             <option value="{{$v->id}}">{{$v->name}}</option>
                @endforeach
                
              </select>
           

          </div>
          </div>  
<div class="form-group">
            <div class="form-row">
              <select class="form-control" name="department_id" id="department_id">
                <option value="">select Department</option>
              </select>
           

          </div>
          </div>      

          <div class="form-group">
            <div class="form-row">
           
            <input class="form-control"  type="text"  placeholder="Enter AOS name" name="name">
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
      <div class="card-header">AOS</div>
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
  
    <a href="{{ route('edit_AOS',['id'=>$v->id]) }}" class="btn btn-xs btn-success">Edit</a>
    
 
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

  <div class="modal fade" id="myModal" role="dialog" style="margin-top: 100px;">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
       
        <div class="modal-body text-danger text-center">
          <p>... processing ...</p>
        </div>
       
      </div>
      
    </div>
  </div>             
@endsection