@extends('layouts.admin')
@section('title','Registered Courses')
@section('content')
@inject('R','App\General')
 <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('backend')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Registered Courses</li>
      </ol>
<div class="row">
	<div class="col-sm-12">
        <div class="card">
      <div class="card-header">Registered Courses</div>
      <div class="card-body">
     <form class="form-horizontal" method="GET" action="{{ route('view_register_courses') }}">
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
                     <div class="col-sm-3">
                              <label  class=" control-label">Department</label>
                              <select id="d_id" class="form-control"  name="department">
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
         <select id="aos" class="form-control" name="aos_id" required>
          <option value="">Select AOS</option>
         
        </select>
      </div>

            <div class="col-sm-3">
                              <label  class=" control-label">Session</label>
                               <select class="form-control" name="session" required>
                              <option value=""> - - Select - -</option>
                               
                                  @for ($year = (date('Y')); $year >= 1970; $year--)
                                  {{!$yearnext =$year+1}}
                                  <option value="{{$year}}">{{$year.'/'.$yearnext}}</option>
                                  @endfor
                                
                              </select>
                             
                            </div>
                          
                    <div class="col-md-2">
                                   <br/>
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-btn fa-user"></i>Continue
                                </button>
                            </div>
                          </div>

                        </div>
                      </form>
      
      </div>
    </div>
</div>
@if(isset($rc))
<?php $department =$R->GetDepartment($dp);
$programme =$R->getProgramme($pg);
$aos =$R->GetAos2($a);

?>
<div class="col-sm-12">
    
    <input type="hidden" name="url" value="{{url()->full()}}">                    
  <input type="hidden" name="department_id" value="{{$dp}}">
  <input type="hidden" name="programme_id" value="{{$pg}}">
    <div class="card">
      <div class="card-header">
         <div class="form-row">
        <div class="col-sm-12">
          <h3> Registered Courses</h3>

          <b>Programme:</b> &nbsp;&nbsp;{{$programme->name}}&nbsp;&nbsp;&nbsp;&nbsp;
        <b>Department:</b>&nbsp;&nbsp;{{$department->name}}
        &nbsp;&nbsp;&nbsp;&nbsp;
        <b>AOS:</b>&nbsp;&nbsp;{{$aos->name}}
       
        </div>
        <div class="col-sm-6 pull-right">
          <div class="form-row">
      
                          </div>
      </div>
      </div>
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
                  <th>Semester</th>
                 </tr>
              </thead>
              <?php $i = 0; ?>
              @foreach($rc as $v)
         <?php $semester =$R->getSemeter($v->semester_id); ?>
              <tr>
                
                <td>{{++$i}}</td>
                <td>{{$v->title}}</td>
                <td>{{$v->code}}</td>
                <td>{{$v->unit}}</td>
                <td>{{$v->status}}</td>
                <td>{{$semester->name}}           

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