@extends('layouts.admin')
@section('title','Edit Courses')
@section('content')
@inject('R','App\General')
 <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('backend')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Edit Courses</li>
      </ol>
<div class="row">
	<div class="col-sm-12">
        <div class="card">
      <div class="card-header">Edit Courses</div>
      <div class="card-body">
     <form class="form-horizontal" method="POST" action="{{ route('update_course') }}">
                        {{ csrf_field() }}
      
<input  type="hidden" class="form-control" name="id" value="{{$c->id}}">
<input  type="hidden" class="form-control" name="url" value="{{url()->previous()}}">
                        <div class="form-group">
                          <div class="form-row">
                         <div class="col-sm-4">
                              <label for="Course_title" class=" control-label">Course Title</label>
                                <input id="faculty_name" type="text" class="form-control" name="title" value="{{$c->title}}">

                              
                            </div>
                             <div class="col-sm-3">
                              <label for="Course_code" class=" control-label">Courses Code</label>
                                <input id="course_code" type="text" class="form-control" name="code" value="{{$c->code}}">

                            </div>

                             <div class="col-sm-2">
                              <label for="course_unit" class=" control-label">Course Unit</label>
                                <input id="course_unit" type="text" class="form-control" name="unit" value="{{ $c->unit}}">
                                </div>
                          
                            <div class="col-sm-2">
                              <label for="course_unit" class="control-label">Course Status</label>
                              <select class="form-control" name="status">
                              <option value=""> -- Select -- </option>
                                <option value="C">Compulsary</option>
                                  <option value="E">Elective</option>
                                  </select>
                              
                                </div>
                            </div>
                          </div>
                         
                           <div class="col-md-3">
                                      <br/>
                                <button type="submit" class="btn btn-warning">
                                    <i class="fa fa-btn fa-user"></i> Update Course
                                </button>
                            </div>

                        </div>
      
      </div>
    </div>
</div>

</div>

</div>
@endsection