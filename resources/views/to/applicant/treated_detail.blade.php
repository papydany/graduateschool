@extends('layouts.admin')
@section('title','Treated Appllication')
@section('content')
@inject('R','App\General')
<?php  $department =$R->GetDepartment($ts->department_id);
$faculty =$R->GetFaculty($ts->faculty_id);

  $aos =$R->GetAos2($ts->aos_id);
$programme =$R->getProgramme($ts->programme_id);

?>
 <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('backend')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Treated Appllication</li>
      </ol>
<div class="row">
	<div class="col-sm-12">
        <div class="card">
      <div class="card-header">Treated Appllication</div>
      <div class="card-body">
        @if(!empty($ts))

               <div class="table-responsive">
            <table class="table table-bordered table-striped" >
              <tr>
                            <th>Transcript Status</th>
                            <th class="text->success">Treated</th>
                          </tr>
            
                          <tr>
                            <th>Cost Of Transcript</th>
                            <th>{{number_format($ts->amount)}}</th>
                          </tr>
                          <tr>
                            <th>Date Treated</th>
                            <th>{{date("M j,Y h:i:sa",strtotime($ts->updated_at))}}</th>
                          </tr>
          <tr>
            <th>Surname</th>
             <td>{{$ts->surname}}</td> 
              </tr>
              <tr>
                <th>Name</th>
                <td>{{$ts->name}}</td>
              </tr>
                <tr>
                <th>Other name</th>
                <td>{{$ts->other}}</td>
              </tr>
                <tr>
                <th>Matriculation Number</th>
                <td>{{$ts->matric_number}}</td>
              </tr>
                <tr>
                <th>Email address</th>
                <td>{{$ts->email}}</td>
              </tr>
                  <tr>
                <th>Phone Number</th>
                <td>{{$ts->phone}}</td>
              </tr>
                <tr>
                <th>Programme</th>
                <td>{{$programme->name}}</td>
              </tr>
                <tr>
                <th>Faculty</th>
                <td>{{$faculty->name}}</td>
              </tr>
                <tr>
                <th>Deparment</th>
                <td>{{$department->name}}</td>
              </tr>

                <tr>
                <th>Area Of Specialisation</th>
                <td>{{$aos->name}}</td>
              </tr>
                <tr>
                <th>Entry Year(session)</th>
                <td>{{$ts->entry_year}}</td>
              </tr>
                <tr>
                <th>Gender</th>
                <td>{{$ts->gender}}</td>
              </tr>
                  <tr>
                <th>Birth Year</th>
                <td>{{$ts->dob}}</td>
              </tr>
                <tr>
                <th>Transcript Destinaion Email</th>
                <td>{{$ts->transcript_email}}</td>
              </tr>
                <tr>
                <th>Transcript Destinaion</th>
                <td>{{$ts->transcrip_address}}</td>
              </tr> 
          </table>
      </div>
      @else
      <div class=" col-sm-9 alert alert-danger" role="alert" pull-right>
     No Records is available
    </div>
      @endif
    </div>
      
      </div>
    </div>
</div>

</div>
@endsection