@extends('layouts.home')
@section('title','Application')
@section('content')
<section>
      <div class="container">
        <nav aria-label="breadcrumb" role="navigation">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li aria-current="page" class="breadcrumb-item active">Application</li>
          </ol>
        </nav>
        <div class="row">
          <div class="col-sm-8 text-content" style="border:#000 2px solid; padding-top: 30px;">
            <h3>First Time Application</h3>
 <form class="form-horizontal" method="POST" action="{{ route('preview_application') }}">
                        {{ csrf_field() }}
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label>Surname</label>
                <input class="form-control"  type="text" name="surname"  placeholder="Enter surname" required>
              </div>
              <div class="col-md-6">
                <label>Name</label>
                <input class="form-control" type="text" name="name" placeholder="Enter  name" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label>Other name</label>
                <input class="form-control"  type="text" name="othername"  placeholder="Enter other name">
              </div>
              <div class="col-md-6">
                <label>Matriculation Number</label>
                <input class="form-control" type="text" name="matric_number" placeholder="Enter Matriculation Number" required>
              </div>
            </div>
          </div>
          <div class="form-group">
          	<div class="form-row">
          	<div class="col-md-6">	
            <label>Email address</label>
            <input class="form-control" type="email" name="email" placeholder="Enter email" required>
        </div>
          	<div class="col-md-6">	
            <label>Phone Number</label>
            <input class="form-control" type="text" name="phone" placeholder="Enter phone number" required>
        </div>
          </div>
      </div>
       <div class="form-group">
            <div class="form-row">
             
                <label for="exampleInputPassword1">Permanent Home Address</label>
              <textarea class="form-control" name="permanet_address" required></textarea>
              </div>
             
          </div>
        <div class="form-group">
          	<div class="form-row">
          	<div class="col-md-6">	
            <label>Programme</label>
            <select class="form-control"  name="programme" required>
             <option value="">select</option>
              @if(isset($p))
              @foreach($p as $v)
            <option value="{{$v->id}}">{{$v->name}}</option>
              @endforeach
              @endif
            </select>
        </div>
          	<div class="col-md-6">	
            <label>Faculty</label>
             <select id="f_id" class="form-control"  name="faculty" required>
             <option value="">select</option>
              @if(isset($f))
              @foreach($f as $v)
            <option value="{{$v->id}}">{{$v->name}}</option>
              @endforeach
              @endif
            </select>
        </div>
          </div>
      </div>
        <div class="form-group">
          	<div class="form-row">
          	<div class="col-md-6">	
            <label>Department</label>
           <select id="dept_id" class="form-control"  name="department" required>
           </select>
        </div>
          	<div class="col-md-6">	
            <label>Area Of Specialisation</label>
            <select id="aos" class="form-control"  name="aos" required>
           </select>
        </div>
          </div>
      </div>
       <div class="form-group">
          	<div class="form-row">
          	<div class="col-md-6">	
            <label>Entry Year(session)</label>
             <select class="form-control" name="entry_year" required>
              <option value=""> - - Select - -</option>
                               
            @for ($year = (date('Y')); $year >= 1970; $year--)
           {{!$yearnext =$year+1}}
           <option value="{{$year}}">{{$year.'/'.$yearnext}}</option>
           @endfor
           </select>
        </div>
          	<div class="col-md-6">	
            <label>Gender</label>
     <select class="form-control" name="gender" required>
              <option value=""> - - Select - -</option>
           <option value="Male">Male </option>
           <option value="Female">Female</option>
           </select>
        </div>
          </div>
      </div>
      <div class="form-group">
          	<div class="form-row">
          	<div class="col-md-4">	
            <label>Birth Year</label>
             <select class="form-control" name="birthday_year" required>
              <option value=""> - - Select - -</option>
                               
            @for ($year = (date('Y')); $year >= 1940; $year--)
          
           <option value="{{$year}}">{{$year}}</option>
           @endfor
           </select>
        </div>
          	<div class="col-md-4">	
            <label>Birth Month</label>
     <select class="form-control" name="month" required>
              <option value=""> - - Select - -</option>
            @for ($year = 1; $year <= 12; $year++)
          
           <option value="{{$year}}">{{$year}}</option>
           @endfor
           </select>
        </div>
         	<div class="col-md-4">	
            <label>Birth Day</label>
     <select class="form-control" name="day" required>
              <option value=""> - - Select - -</option>
             @for ($year = 1; $year <= 31; $year++)
          
           <option value="{{$year}}">{{$year}}</option>
           @endfor
           </select>
        </div>
          </div>
      </div>
      <h3>Transcript  Destination</h3>
        <div class="form-group">
            <div class="form-row">
            <div class="col-md-6">  
            <label>Institution or Organization Name</label>
            <input class="form-control" type="text" name="destinaion_name" placeholder="Enter Organisation Name" required>
        </div>
      
          <div class="col-md-6">
             
                <label for="exampleInputPassword1"> Destination City</label>
          <input class="form-control" type="text" name="destinaion_city" placeholder="Enter Organisation City" required>
              </div>
             
          </div>
        </div>
            <div class="form-group">
            <div class="form-row">
            <div class="col-md-6">  
            <label> Destination State</label>
            <input class="form-control" type="text" name="destinaion_state" placeholder="Enter Organisation State" required>
        </div>
      
          <div class="col-md-6">
             
                <label for="exampleInputPassword1">Destination County</label>
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
        <input type="submit" class="btn btn-primary btn-block" value="Register">
         </div>
     </div>
     </div>
        </form>
    </div>
    <div class="col-sm-4" style=" padding-top: 30px;">
      <h3>I Have Applied Before</h3>
       <form class="form-horizontal" method="POST" action="{{ route('old_application') }}">
                        {{ csrf_field() }}
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label>Matric Number</label>
                <input class="form-control"  type="text" name="matric_number"  placeholder="Enter Matric Number" required>
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