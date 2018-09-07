@extends('layouts.admin')
@section('title','Courses')
@section('content')
@inject('R','App\General')
 <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('backend')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Courses</li>
      </ol>
<div class="row">
	<div class="col-sm-12">
        <div class="card">
      <div class="card-header">Courses</div>
      <div class="card-body">
     <form class="form-horizontal" method="GET" action="{{ route('view_course') }}">
                        {{ csrf_field() }}
      <div class="form-group">
        <div class="form-row">
           <div class="col-sm-3">
                              <label class=" control-label">Programme</label>
                              <select class="form-control" id="department" name="programme" >
                                   <option value="">select</option>
                               @if(isset($p))
                                  @foreach($p as $v)
                                 
                                  <option value="{{$v->id}}">{{$v->name}}</option>
                                  @endforeach
                                  @endif
                                 
                              </select>
                             
                            </div>
                     <div class="col-sm-4">
                              <label  class=" control-label">Department</label>
                              <select class="form-control"  name="department">
                                 <option value="">Select Department</option>
                                  @if(isset($d))
                                  @foreach($d as $v)
                                  <?php $depart = $R->GetDepartment($v->department_id) ?>
                                  <option value="{{$v->department_id}}">{{$depart->name}}</option>
                                  @endforeach
                                  @endif
                              </select>
                             
                            </div>
                            

                            <div class="col-sm-3">
                              <label for="semester" class=" control-label">Semester</label>
                              <select class="form-control" name="semester">
                                  @if(isset($s))
                                  @foreach($s as $v)
                                  <option value="{{$v->id}}">{{$v->name}}</option>
                                  @endforeach
                                  @endif
                              </select>
                             
                            </div>
                         
                    <div class="col-md-2">
                                   <br/>
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-btn fa-user"></i> View Course
                                </button>
                            </div>
                          </div>

                        </div>
                      </form>
      
      </div>
    </div>
</div>
@if(isset($c))
<?php $department =$R->GetDepartment($dp);
$semester =$R->getSemeter($sm);
$programme =$R->getProgramme($pg);
?>
<div class="col-sm-12">
    <div class="card">
      <div class="card-header"><b>Programme:</b> &nbsp;&nbsp;{{$programme->name}}&nbsp;&nbsp;&nbsp;&nbsp;
        <b>Department:</b>&nbsp;&nbsp;{{$department->name}}
        &nbsp;&nbsp;&nbsp;&nbsp;<b>Semester:</b>&nbsp;&nbsp;{{$semester->name}}

      </div>
      <div class="card-body">
       <div class="table-responsive">
            <table class="table table-bordered" >
              <thead>
                <tr>
                   <th>#</th>
                  <th>Title</th>
                  <th>Code</th>
                  <th>Unit</th>
                  <th>Status</th>
                  <th>Action</th>
                 </tr>
              </thead>
              <?php $i = 0; ?>
              @foreach($c as $v)
         
              <tr>
                <td>{{++$i}}</td>
                <td>{{$v->title}}</td>
                <td>{{$v->code}}</td>
                <td>{{$v->unit}}</td>
                <td>{{$v->status}}</td>
                <td>
             
<a href="{{ route('edit_course',['id'=>$v->id]) }}" class="btn btn-xs btn-success">Edit</a>
 <a href="{{ route('delete_course',['id'=>$v->id]) }}" class="btn btn-xs btn-danger">Delete</a>             

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