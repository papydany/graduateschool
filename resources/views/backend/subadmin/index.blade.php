@extends('layouts.admin')
@section('title','Sub Admin')
@section('content')
@inject('R','App\General')
 <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('backend')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Sub Admin</li>
      </ol>
<div class="row">
	<div class="col-sm-5">
        <div class="card">
      <div class="card-header">Sub Admin</div>
      <div class="card-body">
     <form class="form-horizontal" method="POST" action="{{ route('sub_admin') }}">
                        {{ csrf_field() }}
          <div class="form-group">
            <div class="form-row">
           
            <input class="form-control"  type="text"  placeholder="Enter  name" name="name">
          </div>
          </div>
            <div class="form-group">
            <label for="exampleInputEmail1">Phone</label>
            <input class="form-control"  type="text" name="phone" placeholder="Enter phone">
          </div>
           <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" id="exampleInputEmail1" type="email" name="email" placeholder="Enter email">
          </div>
          <div class="form-group">
            <div class="form-row">
           
                <label for="exampleInputPassword1">Password</label>
                <input class="form-control" type="password" name="password" placeholder="Password">
           </div>
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

          <input type="submit" value="Create" class="btn btn-primary btn-block">
        </form>
      
      </div>
    </div>
</div>
@if(!empty($u))
<div class="col-sm-7">
    <div class="card">
      <div class="card-header">Sub Admin</div>
      <div class="card-body">
       <div class="table-responsive">
            <table class="table table-bordered" >
              <thead>
                <tr>
                   <th>#</th>
                  <th>Name</th>
                  <th>email</th>
                  <th>password</th>
                  <th>Role</th>
                  <th>Action</th>
                 </tr>
              </thead>
              <?php $i = 0; ?>
              @foreach($u as $v)
             <?php $role =$R->getrole($v->role_id) ?>
              <tr>
              	<td>{{++$i}}</td>
              	<td>{{$v->name}}</td>
                <td>{{$v->email}}</td>
                 <td>{{$v->word}}</td>
                <td>{{$role->desc}}</td>
              	<td>
  
    <a href="{{ route('edit_sub_admin',['id'=>$v->user_id]) }}" class="btn btn-xs btn-success">Edit</a>
    
 
</div>
              		

              	</td>
              </tr>
              @endforeach
          </table>
      </div>
 
      </div>
    </div>
</div>
@endif
</div>

</div>
@endsection