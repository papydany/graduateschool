@extends('layouts.admin')
@section('title','Assign Officer')
@section('content')
 <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('backend')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Assign Officer</li>
      </ol>
<div class="row">
	<div class="col-sm-5">
        <div class="card">
      <div class="card-header">Assign Officer</div>
      <div class="card-body">
     <form class="form-horizontal" method="POST" action="{{ route('assignofficer') }}">
                        {{ csrf_field() }}
          <div class="form-group">
            <div class="form-row">
              <select class="form-control"  name="user_id" >
                <option value="">select Desk Officer</option>
                @foreach($u as $v)
             <option value="{{$v->user_id}}">{{$v->name}}</option>
                @endforeach
                
              </select>
           

          </div>
          </div>               
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
            <div class="form-row" >
              <p id="aos_id"></p>
            </div>
            </div>      

          <input type="submit" value="Create" class="btn btn-primary btn-block">
        </form>
      
      </div>
    </div>
</div>

</div>

</div>
            
@endsection


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