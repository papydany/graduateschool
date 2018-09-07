@extends('layouts.admin')
@section('title','Edit Sub Admin')
@section('content')
@inject('R','App\General')
 <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('backend')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Edit Sub Admin</li>
      </ol>
<div class="row">
	<div class="col-sm-5">
        <div class="card">
      <div class="card-header">Edit Sub Admin</div>
      <div class="card-body">
     <form class="form-horizontal" method="POST" action="{{ route('update_sub_admin') }}">
                        {{ csrf_field() }}
          <div class="form-group">
            <div class="form-row">
             <input   type="hidden"  name="id" value="{{$u->id}}">
            <input class="form-control"  type="text"  name="name" value="{{$u->name}}">
          </div>
          </div>
            <div class="form-group">
            <label for="exampleInputEmail1">Phone</label>
            <input class="form-control"  type="text" name="phone"  value="{{$u->phone}}">
          </div>
             <div class="form-group">
            <div class="form-row">
           
                <label for="exampleInputPassword1">Role</label>
                <select class="form-control" name="role">
                  <option value="">select</option>
                  @foreach($r as $vs)
             <option value="{{$vs->id}}">{{$vs->desc}}</option>
                  @endforeach
                </select>
                
           </div>
          </div>

          <input type="submit" value="Update" class="btn btn-warning btn-block">
        </form>
      
      </div>
    </div>
</div>

</div>

</div>
@endsection