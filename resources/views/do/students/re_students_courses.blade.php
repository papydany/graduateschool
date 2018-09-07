@extends('layouts.admin')
@section('title','Register Students Courses')
@section('content')
@inject('R','App\General')
 <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('backend')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Register Students Courses</li>
      </ol>
<div class="row">
	<div class="col-sm-12">
        <div class="card">
      <div class="card-header">Register Students Courses</div>
      <div class="card-body">
     <form class="form-horizontal" method="GET" action="{{ route('re_students_courses2') }}">
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
                              <label for="semester" class=" control-label">Student Entry Year</label>
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
                        <div class="form-group">
        <div class="form-row">
   <div class="col-sm-3">
                              <label for="semester" class=" control-label">Courses Session</label>
                               <select class="form-control" name="course_session" required>
                              <option value=""> - - Select - -</option>
                               
                                  @for ($year = (date('Y')); $year >= 1970; $year--)
                                  {{!$yearnext =$year+1}}
                                  <option value="{{$year}}">{{$year.'/'.$yearnext}}</option>
                                  @endfor
                                
                              </select>
                             
                            </div>
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
 @if(isset($s))
<div class="col-sm-12" style="margin-top: 10px;">
  <?php $department =$R->GetDepartment($dp);
$programme =$R->getProgramme($pg);
$aos =$R->GetAos2($a);
$n_ey =$ey + 1;
$n_ss =$ss + 1;

?>
  <div class="card">
      <div class="card-header"> <b>Programme:</b>&nbsp;{{$programme->name}}&nbsp;&nbsp;&nbsp;
        <b>Department:</b>&nbsp;{{$department->name}}&nbsp;&nbsp;&nbsp;
        <b>AOS:</b>&nbsp;{{$aos->name}}&nbsp;&nbsp;&nbsp;<b>Entry Year:</b>&nbsp;{{$ey.'/'.$n_ey}}
&nbsp;&nbsp;&nbsp;<b>Courses Session:</b>&nbsp;{{$ss.'/'.$n_ss}}
      </div>
      <div class="card-body">
  <form class="form-horizontal" method="POST" action="{{ route('re_students_courses3') }}">
                        {{ csrf_field() }}
                      
  <input type="hidden" name="department_id" value="{{$dp}}">
  <input type="hidden" name="programme_id" value="{{$pg}}">
   <input type="hidden" name="aos_id" value="{{$a}}"> 
    <input type="hidden" name="session" value="{{$ss}}">                      
 <div class="form-group">
 <div class="form-row">
  <div class="col-sm-6">
   
    <table class="table table-stripped table-bordered">
      <tr>
        <td>#&nbsp;&nbsp;<input type="checkbox" id="all_ids" name="all_ids" value=""></td>
        <th>Matric Number</th>
        <th>Names</th>
      </tr>
    @foreach($s as $v)
    <tr>
      <td><input type="checkbox" class="ids" name="ids[]" value="{{$v->id}}"></td>
      <td>{{$v->matric_number}}</td>
      <td>{{$v->surname.' '.$v->name.' '.$v->other}}</td>
    </tr>

    @endforeach
  </table>

    @endif
  </div>
  <div class="col-sm-6">
     @if(isset($rc))
    <table class="table table-stripped table-bordered">
      <tr>
        <th>#&nbsp;&nbsp;<input type="checkbox" id="all_idc" name="all_idc" value=""></th>
        <th>Title</th>
         <th>Code /S / U</th>
        <th>Semester</th>
        
      </tr>
    @foreach($rc as $vc)
    <?php $semester =$R->getSemeter($vc->semester_id); ?>
    <tr>
      <td><input type="checkbox" class="idc" name="idc[]" value="{{$vc->id}}"></td>
      <td>{{$vc->title}}</td>
      <td>{{$vc->code.' &nbsp;=&nbsp; '.$vc->status.' &nbsp;=&nbsp; '.$vc->unit}}</td>
      <td>{{$semester->name}}</td>
    </tr>

    @endforeach
  </table>

   
  </div>
 </div>
</div>
 <div class="col-md-3"> <br/>
<button type="submit" class="btn btn-success btn-block">
  <i class="fa fa-btn fa-user"></i> Register
</button>
</div>
</form>
</div>

</div>
</div>
 @endif
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