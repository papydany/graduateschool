@extends('layouts.admin')
@section('title','Edit Students')
@section('content')
@inject('R','App\General')
 <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('backend')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Edit Students</li>
      </ol>
<div class="row">
	<div class="col-sm-12">
        <div class="card">
      <div class="card-header">Edit Students</div>
      <div class="card-body">
     <form class="form-horizontal" method="POST" action="{{ route('update_students') }}">
                        {{ csrf_field() }}
      
<input  type="hidden" class="form-control" name="id" value="{{$c->id}}">
<input  type="hidden" class="form-control" name="url" value="{{url()->previous()}}">
  <div class="form-group">
   <div class="form-row">
     <div class="col-sm-3">
       <label class=" control-label">Matric Number</label>
       <input  type="text" class="form-control" name="matric_number" value="{{$c->matric_number}}">
     </div>
     <div class="col-sm-3">
       <label  class=" control-label">Surname</label>
       <input  type="text" class="form-control" name="surname" value="{{$c->surname}}">
     </div>
     <div class="col-sm-3">
        <label  class=" control-label">Name</label>
        <input  type="text" class="form-control" name="name" value="{{$c->name}}">
     </div>
     <div class="col-sm-3">
        <label  class="control-label">Other</label>
        <input  type="text" class="form-control" name="other" value="{{$c->other}}">                    
      </div>
  </div>
 </div>
   <div class="form-group">
   <div class="form-row">
     <div class="col-sm-3">
       <label class=" control-label">State Of Origin</label>
       <select class="form-control" name="previous_institution_date" required>
                              <option value=""> - - Select - -</option>
                               
                                @foreach($st as $v)
                                <option value="{{$v->id}}">{{$v->state_name}}</option>
                                @endforeach
                              </select>         
     </div>
     <div class="col-sm-3">
       <label  class=" control-label">Nationality</label>
       <input  type="text" class="form-control" name="nationality" value="{{$c->nationality}}">
     </div>
     <div class="col-sm-6">
        <label  class=" control-label">Previous institution</label>
        <input  type="text" class="form-control" name="previous_institution" value="{{$c->previous_institution_class}}">
     </div>
   </div>
 </div>
 <div class="form-group">
   <div class="form-row">
       <div class="col-sm-3">
       <label  class=" control-label">Previous Qualification<label>
       <input  type="text" class="form-control" name="previous_institution_qualification" value="{{$c->previous_institution_qualification}}">
     </div>
        <div class="col-sm-4">
       <label  class=" control-label">Previous Class Of Degree</label>
       <input  type="text" class="form-control" name="previous_institution_class" value="{{$c->previous_institution_class}}">
     </div>
     <div class="col-sm-4">
        <label  class="control-label">Year  Degree was obtain</label>
         <select class="form-control" name="previous_institution_date" required>
                              <option value=""> - - Select - -</option>
                               
                                  @for ($year = (date('Y')); $year >= 1970; $year--)
                                  {{!$yearnext =$year+1}}
                                  <option value="{{$year}}">{{$year.' / '.$yearnext}}</option>
                                  @endfor
                                
                              </select>                    
      </div>
  </div>
 </div>
  <div class="col-md-3">
                                      <br/>
                                <button type="submit" class="btn btn-warning">
                                    <i class="fa fa-btn fa-user"></i> Update
                                </button>
                            </div>

                        </div>
      
      </div>
    </div>
</div>

</div>

</div>
@endsection