@extends('layouts.admin')
@section('title','New Appllicant')
@section('content')
@inject('R','App\General')
 <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('backend')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">New Appllicant</li>
      </ol>
<div class="row">
	<div class="col-sm-12">
        <div class="card">
      <div class="card-header">New Appllicant</div>
      <div class="card-body">
        @if(!empty($ts))

               <div class="table-responsive">
            <table class="table table-bordered" >
              <thead>
                <tr>
                   <th>#</th>
                  <th>Names</th>
                  <th>Matric Number</th>
                  <th>phone</th>
                  <th>Email</th>
                  <th>Action</th>
                 </tr>
              </thead>
              <?php $i = 0; ?>
              @foreach($ts as $v)
         
              <tr>
                <td>{{++$i}}</td>
                <td>{{$v->surname.' '.$v->name.' '.$v->other}}</td>
                <td>{{$v->matric_number}}</td>
                <td>{{$v->phone}}</td>
                <td>{{$v->email}}</td>
                <td>
             

             
<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Action
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a href="{{ route('more_detail',['id'=>$v->id]) }}" class="dropdown-item" target="_blank">More Detail</a>
     <a href="{{ route('treated',['id'=>$v->id]) }}" class="dropdown-item">Treated</a>
    <a href="{{ route('generate_transcript',['id'=>$v->id]) }}" class="dropdown-item" target="_blank">Generate Report</a>
   
  
  </div>
</div>             

                </td>

                
              </tr>
              @endforeach
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