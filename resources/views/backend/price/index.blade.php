@extends('layouts.admin')
@section('title','Price')
@section('content')
@inject('R','App\General')
 <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('backend')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Price</li>
      </ol>
<div class="row">
	<div class="col-sm-5">
        <div class="card">
      <div class="card-header">Transcript Price</div>
      <div class="card-body">
     <form class="form-horizontal" method="POST" action="{{ route('price') }}">
                        {{ csrf_field() }}
          <div class="form-group">
            <div class="form-row">
           
            <input class="form-control"  type="text"  placeholder="Enter  Amount" name="name">
          </div>
          </div>
          
        
          <input type="submit" value="Create" class="btn btn-primary btn-block">
        </form>
      
      </div>
    </div>
</div>
@if(!empty($p))
<div class="col-sm-7">
    <div class="card">
      <div class="card-header">Price</div>
      <div class="card-body">
       <div class="table-responsive">
            <table class="table table-bordered" >
              <thead>
                <tr>
                   <th>#</th>
                  <th>Amount</th>
              </tr>
              </thead>
             
              <tr>
              	<td>1</td>
              	<td>{{number_format($p->name)}}</td>
              </tr>
          </table>
      </div>
 
      </div>
    </div>
</div>
@endif
</div>

</div>
@endsection