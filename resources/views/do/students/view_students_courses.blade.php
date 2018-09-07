@extends('layouts.admin')
@section('title','Register Students')
@section('content')
@inject('R','App\General')
 <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('backend')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active"> View Register Students</li>
      </ol>
<div class="row">
	<div class="col-sm-12">
        <div class="card">
      <div class="card-header">View Register Students</div>
      <div class="card-body">
     <form class="form-horizontal" method="GET" action="{{ route('view_students_courses2') }}">
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
                              <label for="semester" class=" control-label">Session</label>
                               <select class="form-control" name="session" required>
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
 @if(isset($u))
<div class="col-sm-12" style="margin-top: 10px;">
  <?php $department =$R->GetDepartment($dp);
$programme =$R->getProgramme($pg);
$aos =$R->GetAos2($a);
$n_ss =$ss + 1;

?>
  <div class="card">
      <div class="card-header"> <b>Programme:</b>&nbsp;{{$programme->name}}&nbsp;&nbsp;&nbsp;
        <b>Department:</b>&nbsp;{{$department->name}}&nbsp;&nbsp;&nbsp;
        <b>AOS:</b>&nbsp;{{$aos->name}}
&nbsp;&nbsp;&nbsp;<b>Session:</b>&nbsp;{{$ss.'/'.$n_ss}}
      </div>
      <div class="card-body">
                     

   
    <table class="table table-stripped table-bordered">
      <tr>
        <td>#</td>
        <th>Matric Number</th>
        <th>Names</th>
        <th>Action</th>
      </tr>
      <?php $c = 0; ?>
    @foreach($u as $v)
    <tr>
      <td>{{++$c}}</td>
      <td>{{$v->matric_number}}</td>
      <td>{{$v->surname.' '.$v->name.' '.$v->other}}</td>
      <td><a href="{{url('remove_registration',[$v->student_id,$ss,$pg,$dp,$a])}}" class="btn btn-danger btn-xs">Remove</a>
        <a href="{{url('enter_result',[$v->student_id])}}" class="btn btn-primary btn-xs">Enter Result</a></td>
    </tr>

    @endforeach
  </table>

  
  </div>


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

