@extends('layouts.admin')
@section('title','Comprehensive Paper')
@section('content')
@inject('R','App\General')
 <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('backend')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Comprehensive Paper</li>
      </ol>
<div class="row">
	<div class="col-sm-12">
        <div class="card">
      <div class="card-header">Comprehensive Paper</div>
      <div class="card-body">
     <form class="form-horizontal" method="POST" action="{{ route('enter_c_paper') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$d}}">
    
 
       <table class="table table-bordered">
                          <tr>
                            <th colspan="3" class="text-center">Comprehensive Paper</th>
                          </tr>
                          <tr>
                          <td>I</td>
                          <td>II</td>
                          <td>III</td>
                        </tr>
                        <tr>
                          <td><input type="" class="form-control" name="paper1" value="{{isset($cr->grade1) ? $cr->grade1:'' }}"></td>
                          <td><input type="" class="form-control" name="paper2" value="{{isset($cr->grade2) ? $cr->grade2:'' }}"></td>
                          <td><input type="" class="form-control" name="paper3" value="{{isset($cr->grade3) ? $cr->grade3:'' }}"></td>
                        </tr>
                        <tr>
                          <td colspan="3"><input type="submit" class="btn btn-success" name="Submit"></td>
                        </tr>
                        </table>
                      </form>
      
    
    </div>

  </div>
</div>
 

  
  </div>


</div>

</div>


@endsection

