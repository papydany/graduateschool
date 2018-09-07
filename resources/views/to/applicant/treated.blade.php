@extends('layouts.admin')
@section('title','Treated Appllication')
@section('content')
@inject('R','App\General')
 <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('backend')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Treated Appllication</li>
      </ol>
<div class="row">
	<div class="col-sm-12">
        <div class="card">
      <div class="card-header">Treated Appllication</div>
      <div class="card-body">
        @if(!empty($ta))

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
              @foreach($ta as $v)
         
              <tr>
                <td>{{++$i}}</td>
                <td>{{$v->surname.' '.$v->name.' '.$v->other}}</td>
                <td>{{$v->matric_number}}</td>
                <td>{{$v->phone}}</td>
                <td>{{$v->email}}</td>
                <td>
             
<a href="{{ route('treated_detail',['id'=>$v->id]) }}" class="btn btn-xs btn-success">More Detail</a>
          

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