@extends('layouts.home')
@section('title','Preview Application')
@section('content')
@inject('R','App\General')
<?php  $department =$R->GetDepartment($t->department_id);
$faculty =$R->GetFaculty($t->faculty_id);

  $aos =$R->GetAos2($t->aos_id);
$programme =$R->getProgramme($t->programme_id);

?>
<section>
      <div class="container">
        <nav aria-label="breadcrumb" role="navigation">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li aria-current="page" class="breadcrumb-item active">Application</li>
          </ol>
        </nav>
        <div class="row">
          <div class="col-xl-8 text-content">
 <form class="form-horizontal" method="POST" action="{{ route('preview_application') }}">
                        {{ csrf_field() }}
          <input class="form-control"  type="hidden" name="old" value="old"/>               
          <input class="form-control"  type="hidden" name="surname" value="{{$t->surname}}"/>
          <input class="form-control" type="hidden" name="name" value="{{$t->name}}">
          <input class="form-control"  type="hidden" name="othername"  value="{{$t->other}}">
           <input class="form-control" type="hidden" name="matric_number" value="{{$t->matric_number}}">
         <input class="form-control" type="hidden" name="email" value="{{$t->email}}">
           <input class="form-control" type="hidden" name="phone" value="{{$t->phone}}">
            <input class="form-control" type="hidden" name="programme" value="{{$t->programme_id}}"> 
          <input class="form-control" type="hidden" name="faculty" value="{{$t->faculty_id}}">
            <input class="form-control" type="hidden" name="department" value="{{$t->department_id}}">
          <input class="form-control" type="hidden" name="gender" value="{{$t->gender}}">  
            <input class="form-control" type="hidden" name="aos" value="{{$t->aos_id}}"> 
          <input class="form-control" type="hidden" name="entry_year" value="{{$t->entry_year}}">  
          <input class="form-control" type="hidden" name="dob" value="{{$t->dob}}"> 
       
                        <table class="table table-bordered table-striped">
                          
          <tr>
            <th>Surname</th>
             <td>{{$t->surname}}</td> 
              </tr>
              <tr>
                <th>Name</th>
                <td>{{$t->name}}</td>
              </tr>
                <tr>
                <th>Other name</th>
                <td>{{$t->other}}</td>
              </tr>
                <tr>
                <th>Matriculation Number</th>
                <td>{{$t->matric_number}}</td>
              </tr>
                <tr>
                <th>Email address</th>
                <td>{{$t->email}}</td>
              </tr>
                  <tr>
                <th>Phone Number</th>
                <td>{{$t->phone}}</td>
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
                <td>{{$t->entry_year}}</td>
              </tr>
                <tr>
                <th>Gender</th>
                <td>{{$t->gender}}</td>
              </tr>
                  <tr>
                <th>Birth Year</th>
                <td>{{$t->dob}}</td>
              </tr>
              <tr>
                   <tr>
                      </table>
              <div class="form-group">
            <div class="form-row">
             
                <label for="exampleInputPassword1">Permanet Home Address</label>
              <textarea class="form-control" name="permanet_address" required></textarea>
              </div>
             
          </div>         
          <h3>Transcript Destinaion</h3>
        <div class="form-group">
            <div class="form-row">
            <div class="col-md-6">  
            <label>Institution or Organization Name</label>
            <input class="form-control" type="text" name="destinaion_name" placeholder="Enter Organisation Name" required>
        </div>
      
          <div class="col-md-6">
             
                <label for="exampleInputPassword1">Destinaion City</label>
          <input class="form-control" type="text" name="destinaion_city" placeholder="Enter Organisation City" required>
              </div>
             
          </div>
        </div>
            <div class="form-group">
            <div class="form-row">
            <div class="col-md-6">  
            <label>Destinaion State</label>
            <input class="form-control" type="text" name="destinaion_state" placeholder="Enter Organisation State" required>
        </div>
      
          <div class="col-md-6">
             
                <label for="exampleInputPassword1">Destinaion County</label>
            <input class="form-control" type="text" name="destinaion_country" placeholder="Enter Organisation Country" required>
              </div>
             
          </div>
        </div>
       
           <div class="form-group">
            <div class="form-row">
            <div class="col-md-6">  
            <label>Transcript Email address</label>
            <input class="form-control" type="email" name="transcript_email" placeholder="Enter email">
        </div>
      
          <div class="col-md-6">
             
                <label for="exampleInputPassword1">Transcript Address</label>
              <textarea class="form-control" name="destinaion"></textarea>
              </div>
             
          </div>
        </div>
          <div class="form-group">
         <div class="form-row">
          	<div class="col-md-4">		
        <input type="submit" class="btn btn-primary btn-block" value="Continue">
         </div>
     </div>
     </div>
        </form>
    </div>
</div>
</div>
</section>
  
  @endsection
