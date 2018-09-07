@extends('layouts.admin')
@section('title','AOS')
@section('content')
@inject('R','App\General')

 <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('backend')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">View AOS</li>
      </ol>
<div class="row">

@if(!empty($d))
<div class="col-sm-12">
    <div class="card">
      <div class="card-header">AOS</div>
      <div class="card-body">
       <div class="table-responsive">
            <table class="table table-bordered" >
              <thead>
                <tr>
                   <th>#</th>
                  <th>Name</th>
                  <th>AOS</th>
               
                 </tr>
              </thead>
              <?php $i = 0; ?>
              @foreach($d as $v)
             <?php $aos =$R->Getaos($v->id) ?>
              <tr>
              	<td>{{++$i}}</td>
              	<td>{{$v->name}}</td>
                <td>
                  @foreach($aos as $va)
                 <p> {{$va->name}} &nbsp;&nbsp;
<a href="{{ route('edit_aos',['id'=>$va->id]) }}" class="btn btn-xs btn-success">Edit</a>
                 </p>

                  @endforeach

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