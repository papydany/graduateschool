@extends('layouts.admin')
@section('title','Assign Officer')
@section('content')
@inject('r','App\General')
 <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('backend')}}">Assign Officer</a>
        </li>
        <li class="breadcrumb-item active">Assign Officer</li>
      </ol>
<div class="row">

@if(!empty($u))
<div class="col-sm-12">
    <div class="card">
      <div class="card-header">Assign Officer</div>
      <div class="card-body">
       <div class="table-responsive">
            <table class="table table-bordered" >
              <thead>
                <tr>
                   <th>#</th>
                  <th>Name</th>
                  <th>Department</th>
                  <th>Aos</th>
                  <th>Action</th>
                 </tr>
              </thead>
              <?php $i = 0; ?>
              @foreach($u as $v)
              <?php $user =$r->GetUser($v->user_id);
               $depart =$r->GetDepartment($v->department_id);
               $aos =$r->GetAos2($v->aos_id);
               ?>
              <tr>
              	<td>{{++$i}}</td>
              	<td>{{$user->name}}</td>
                <td>{{$depart->name}}</td>
                <td>{{$aos->name}}</td>
              	<td>
  
    <a href="{{ route('remove_ao',['id'=>$v->id]) }}" class="btn btn-xs btn-success">remove</a>
    
 
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