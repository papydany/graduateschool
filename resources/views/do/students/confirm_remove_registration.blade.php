@extends('layouts.admin')
@section('title','Remove Students')
@section('content')
@inject('R','App\General')
 <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('backend')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Remove Students</li>
      </ol>
<div class="row">
	<div class="col-sm-12">
        <div class="card">
      <div class="card-header">Remove Students</div>
      <div class="card-body">
    <p class="text-center" style="font-size:14px; font-weight:700;">Do you want to continue with delete the course?</p>
          <br/>
          <p class="text-center"><a href="{{url()->current().'/1'}}" class="btn btn-xs btn-danger">Yes</a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="{{url()->previous()}}" class="btn btn-xs btn-primary">No</a></p>


      </div>
    </div>
</div>

</div>

</div>
@endsection