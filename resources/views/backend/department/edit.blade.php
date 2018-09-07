@extends('layouts.admin')
@section('title','Department')
@section('content')
 <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('backend')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Edit Department</li>
      </ol>
<div class="row">
	<div class="col-sm-5">
        <div class="card">
      <div class="card-header">Edit Department</div>
      <div class="card-body">
     <form class="form-horizontal" method="POST" action="{{ route('update_department') }}">
                        {{ csrf_field() }}
          <div class="form-group">
            <div class="form-row">
            <input   type="hidden"  name="id" value="{{$d->id}}">
            <input class="form-control"  type="text"  name="name" value="{{$d->name}}">
          </div>
          </div>
          <input type="submit" value="Create" class="btn btn-primary btn-block">
        </form>
      
      </div>
    </div>
</div>

</div>

</div>
@endsection