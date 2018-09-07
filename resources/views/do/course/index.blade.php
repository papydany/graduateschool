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
     <form class="form-horizontal" method="POST" action="{{ route('createcourse') }}">
                        {{ csrf_field() }}
      <div class="form-group">
        <div class="form-row">
           <div class="col-sm-4">
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
                            

                            <div class="col-sm-4">
                              <label for="semester" class=" control-label">Semester</label>
                              <select class="form-control" name="semester">
                                  @if(isset($s))
                                  @foreach($s as $v)
                                  <option value="{{$v->id}}">{{$v->name}}</option>
                                  @endforeach
                                  @endif
                              </select>
                             
                            </div>
                          </div>
                    
                        </div>
@for ($i = 0; $i < 10; $i++)
                        <div class="form-group">
                          <div class="form-row">
                         <div class="col-sm-4">
                              <label for="Course_title" class=" control-label">Course Title</label>
                                <input id="faculty_name" type="text" class="form-control" name="title[{{$i}}]" value="{{ old('title') }}">

                              
                            </div>
                             <div class="col-sm-3">
                              <label for="Course_code" class=" control-label">Courses Code</label>
                                <input id="course_code" type="text" class="form-control" name="code[{{$i}}]" value="{{ old('code') }}">

                            </div>

                             <div class="col-sm-2">
                              <label for="course_unit" class=" control-label">Course Unit</label>
                                <input id="course_unit" type="text" class="form-control" name="unit[{{$i}}]" value="{{ old('unit') }}">
                                </div>
                          
                            <div class="col-sm-2">
                              <label for="course_unit" class="control-label">Course Status</label>
                              <select class="form-control" name="status[{{$i}}]">
                              <option value=""> -- Select -- </option>
                                <option value="C">Compulsary</option>
                                  <option value="E">Elective</option>
                                  </select>
                              
                                </div>
                            </div>
                          </div>
                            @endfor
                           <div class="col-md-3">
                                      <br/>
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-btn fa-user"></i> Add Course
                                </button>
                            </div>

                        </div>
      
      </div>
    </div>
</div>

</div>

</div>
@endsection