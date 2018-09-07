@extends('layouts.admin')
@section('title','Register Students Courses')
@section('content')
@inject('R','App\General')
<?php  $department = $R->GetDepartment($dp); 
 $faculty =$R->GetFaculty($fc);
$aos = $R->GetAos2($a);
$programme =$R->getProgramme($pr);
$next = $s + 1;
 ?>
 <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('backend')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Individual Report </li>
      </ol>
<div class="row">
  <div class="col-sm-12">
        <div class="card">
      <div class="card-header">Individual Report</div>
      <div class="card-body">
     <form class="form-horizontal" method="GET" action="{{ url('generate_individual_report') }}" target="_blank">
                        {{ csrf_field() }}
      <div class="form-group">
        <div class="form-row">
           <div class="col-sm-2">
                              <label class=" control-label">Programme</label>
                              <p>{{$programme->name}}</p>
                             
                             
                            </div>
                     <div class="col-sm-3">
                              <label  class=" control-label">Faculty</label>
                             <p>{{$faculty->name}}</p>
                             
                            </div>
                            <div class="col-sm-2">
                              <label  class=" control-label">Department</label>
                             <p>{{$department->name}}</p>
                             
                            </div>
                             <div class="col-sm-3">
                              <label  class=" control-label">AOS</label>
                              <p>{{$aos->name}}</p>
                             
                            </div>
                           

                            <div class="col-sm-2">
                              <label for="semester" class=" control-label">Session</label>
                               <p>{{$s.'/'. $next}}</p>
                             
                            </div>
                          </div>
                          <table class="table table-bordered table-stripe">
                            <tr>
                              <th>select</th>
                              <th>Matric number</th>
                              <th>Names</th>
                            </tr>
                          
                          @foreach($u as $v)
                          <tr>
                            <td><input type="radio" class="form-control" name="id" value="{{$v->id}}"></td>
                            <td>{{$v->matric_number}}</td>
                            <td>{{$v->surname.''.$v->name.''.$v->other}}</td>
                          </tr>


                          @endforeach
                    </table>
                        </div>
                        <div class="form-group">
        <div class="form-row">

                           <div class="col-md-3">
                                      <br/>
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-btn fa-user"></i> Continue
                                </button>
                            </div>

                        </div>
      
      </div>
    </form>


    </div>
</div>

</div>

</div>

  
@endsection