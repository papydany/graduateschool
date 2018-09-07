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

@if(!empty($u))
<div class="col-sm-12">
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
                  <th>Role</th>
                  <th>Edit Right</th>
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
                <td>{{$role->desc}}</td>
                <td>{{$v->editright}}</td>
              	<td>
  
    <a href="{{ route('editright_sub_admin',['id'=>$v->id]) }}" class="btn btn-xs btn-success">Edit Right</a>
    @if($v->status == 1)
 
 <a href="{{ route('deactivate_sub_admin',['id'=>$v->id]) }}" class="btn btn-xs btn-danger">deactivate</a>
    @else
    
      <a href="{{ route('activate_sub_admin',['id'=>$v->id]) }}" class="btn btn-xs btn-primary">Activate</a>
    @endif
     
     
 
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