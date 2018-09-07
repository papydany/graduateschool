@extends('layouts.admin')
@section('title','Students')
@section('content')
@inject('R','App\General')
 <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('backend')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Students</li>
      </ol>
<div class="row">
	<div class="col-sm-12">
        <div class="card">
      <div class="card-header">Students</div>
      <div class="card-body">
     <form class="form-horizontal" method="POST" action="{{ route('createstudents') }}">
                        {{ csrf_field() }}
      <div class="form-group">
        <div class="form-row">
           <div class="col-sm-3">
                              <label class=" control-label">Programme</label>
                              <select class="form-control"  name="programme" >
                                   <option value="">select</option>
                               @if(isset($p))
                                  @foreach($p as $v)
                                 
                                  <option value="{{$v->id}}">{{$v->name}}</option>
                                  @endforeach
                                  @endif
                                 
                              </select>
                             
                            </div>
                     <div class="col-sm-3">
                              <label  class=" control-label">Department</label>
                              <select id="d_id" class="form-control"  name="department" >
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
                              <label  class=" control-label">AOS</label>
                              <select id="aos" class="form-control"  name="aos" >
                                 
                              </select>
                             
                            </div>
                            

                            <div class="col-sm-3">
                              <label for="semester" class=" control-label">Entry Year</label>
                               <select class="form-control" name="entry_year" required>
                              <option value=""> - - Select - -</option>
                               
                                  @for ($year = (date('Y')); $year >= 1970; $year--)
                                  {{!$yearnext =$year+1}}
                                  <option value="{{$year}}">{{$year.'/'.$yearnext}}</option>
                                  @endfor
                                
                              </select>
                             
                            </div>
                          </div>
                    
                        </div>
@for ($i = 0; $i < 10; $i++)
                        <div class="form-group">
                          <div class="form-row">
                         <div class="col-sm-3">
                              <label for="Course_title" class=" control-label">Matric Number</label>
                                <input  type="text" class="form-control" name="matric_number[{{$i}}]" value="">
                              </div>
                             <div class="col-sm-3">
                              <label for="Course_code" class=" control-label">Surname </label>
                                <input id="course_code" type="text" class="form-control" name="surname[{{$i}}]" value="">

                            </div>

                             <div class="col-sm-3">
                              <label for="course_unit" class=" control-label">Name</label>
                                <input  type="text" class="form-control" name="name[{{$i}}]" value="">
                                </div>
                          
                            <div class="col-sm-3">
                              <label for="course_unit" class="control-label">Other Name</label>
                              <input  type="text" class="form-control" name="other[{{$i}}]" value="">
                              
                                </div>
                            </div>
                          </div>
                            @endfor
                           <div class="col-md-3">
                                      <br/>
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-btn fa-user"></i> Add Students
                                </button>
                            </div>

                        </div>
      
      </div>
    </div>
</div>

</div>

</div>
 
<div class="modal fade" id="myModal" role="dialog" tabindex="-1"  aria-labelledby="myModalLabel" aria-hidden="true"">
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