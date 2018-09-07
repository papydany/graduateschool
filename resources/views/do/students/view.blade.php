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
     <form class="form-horizontal" method="GET" action="{{ route('view_students') }}">
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
 <div class="col-md-2">
                                   <br/>
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-btn fa-user"></i> View Students
                                </button>
                            </div>
                        </div>
                      </form>
      
      </div>
    </div>
</div>
@if(isset($c))
<?php $department =$R->GetDepartment($dp);
$programme =$R->getProgramme($pg);
$aos =$R->GetAos2($ao);
$next =$ey+1;
?>
<div class="col-sm-12">
    <div class="card">
      <div class="card-header"><b>Programme:</b> &nbsp;&nbsp;{{$programme->name}}&nbsp;&nbsp;&nbsp;&nbsp;
        <b>Department:</b>&nbsp;&nbsp;{{$department->name}}
        &nbsp;&nbsp;&nbsp;<b>AOS</b>&nbsp;&nbsp;{{$aos->name}}
&nbsp;&nbsp;&nbsp;<b>Entry Year</b>&nbsp;&nbsp;{{$ey.'/'.$next}}

      </div>
      <div class="card-body">
       <div class="table-responsive">
            <table class="table table-bordered" >
              <thead>
                <tr>
                   <th>#</th>
                  <th>Matric Number</th>
                  <th>Surname</th>
                  <th>Name</th>
                  <th>Other</th>
                  <th>Action</th>
                 </tr>
              </thead>
              <?php $i = 0; ?>
              @foreach($c as $v)
         
              <tr>
                <td>{{++$i}}</td>
                <td>{{$v->matric_number}}</td>
                <td>{{$v->surname}}</td>
                <td>{{$v->name}}</td>
                <td>{{$v->other}}</td>
                <td>
             
<a href="{{ route('edit_students',['id'=>$v->id]) }}" class="btn btn-xs btn-success">Edit</a>
 <a href="{{ route('delete_students',['id'=>$v->id]) }}" class="btn btn-xs btn-danger">Delete</a>             

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