@extends('layouts.home')
@section('title','Preview Application')
@section('content')
@inject('R','App\General')
<?php  $department =$R->GetDepartment($d);
$faculty =$R->GetFaculty($f);

  $aos =$R->GetAos2($a);
$programme =$R->getProgramme($p);

?>
<section>
      <div class="container">
        <nav aria-label="breadcrumb" role="navigation">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li aria-current="page" class="breadcrumb-item active">Preview Application</li>
          </ol>
        </nav>
        <div class="row">
          <div class="col-xl-8 text-content">
 <form class="form-horizontal" method="POST" action="{{ route('submit_application') }}">
                        {{ csrf_field() }}
          <input class="form-control"  type="hidden" name="surname" value="{{$sn}}"/>
          <input class="form-control" type="hidden" name="name" value="{{$na}}">
          <input class="form-control"  type="hidden" name="othername"  value="{{$on}}">
           <input class="form-control" type="hidden" name="matric_number" value="{{$mn}}">
         <input class="form-control" type="hidden" name="email" value="{{$em}}">
           <input class="form-control" type="hidden" name="phone" value="{{$ph}}">
            <input class="form-control" type="hidden" name="programme" value="{{$p}}"> 
          <input class="form-control" type="hidden" name="faculty" value="{{$f}}">
            <input class="form-control" type="hidden" name="department" value="{{$d}}">
          <input class="form-control" type="hidden" name="gender" value="{{$ge}}">  
            <input class="form-control" type="hidden" name="aos" value="{{$a}}"> 
          <input class="form-control" type="hidden" name="entry_year" value="{{$ey}}">  
          <input class="form-control" type="hidden" name="dob" value="{{$dob}}"> 
           <input class="form-control" type="hidden" name="destination" value="{{$des}}">
            <input class="form-control" type="hidden" name="amount" value="{{$amount->name}}">
           <input class="form-control" type="hidden" name="permanet_address" value="{{$pa}}">
            <input class="form-control" type="hidden" name="transcript_email" value="{{$te}}">
            <input class="form-control" type="hidden" name="destinaion_name" value="{{$dn}}">
            <input class="form-control" type="hidden" name="destinaion_city" value="{{$dc}}">
            <input class="form-control" type="hidden" name="destinaion_state" value="{{$ds}}">
            <input class="form-control" type="hidden" name="destinaion_country" value="{{$dco}}">
                        <table class="table table-bordered table-striped">
                          <tr>
                            <th>Cost Of Transcript</th>
                            <th>{{number_format($amount->name)}}</th>
                          </tr>
          <tr>
            <th>Surname</th>
             <td>{{$sn}}</td> 
              </tr>
              <tr>
                <th>Name</th>
                <td>{{$na}}</td>
              </tr>
                <tr>
                <th>Other name</th>
                <td>{{$on}}</td>
              </tr>
                <tr>
                <th>Matriculation Number</th>
                <td>{{$mn}}</td>
              </tr>
                <tr>
                <th>Email address</th>
                <td>{{$em}}</td>
              </tr>
                  <tr>
                <th>Phone Number</th>
                <td>{{$ph}}</td>
              </tr>
              <tr>
                <th>Permanet Address</th>
                <td>{{$pa}}</td>
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
                <td>{{$ey}}</td>
              </tr>
                <tr>
                <th>Gender</th>
                <td>{{$ge}}</td>
              </tr>
                  <tr>
                <th>Birth Year</th>
                <td>{{$dob}}</td>
              </tr>
                                <tr>
                <th>Institution or Organization Name</th>
                <td>{{$dn}}</td>
              </tr>
                  <tr>
                <th>Destinaion City</th>
                <td>{{$dc}}</td>
              </tr>
              <tr>
                <th>destinaion_state</th>
                <td>{{$ds}}</td>
              </tr>
                <tr>
                <th>Destinaion County</th>
                <td>{{$dco}}</td>
              </tr>
                <th>Transcript Email</th>
                <td>{{$te}}</td>
              </tr>
                <tr>
                <th>Transcript Destinaion</th>
                <td>{{$des}}</td>
              </tr>
             </table>
         
          <div class="form-group">
         <div class="form-row">
          	<div class="col-md-4">		
        <input type="submit" class="btn btn-primary btn-block" value="Register">
         </div>
     </div>
     </div>
        </form>
    </div>
</div>
</div>
</section>
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
  @section('script')
 <script src="{{asset('js/main.js')}}"></script>
  @endsection