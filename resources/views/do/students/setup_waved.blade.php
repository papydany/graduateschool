@extends('layouts.admin')
@section('title','Waved Courses')
@section('content')
@inject('R','App\General')
 <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('backend')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Waved Courses</li>
      </ol>
<div class="row">
	
      
 @if(isset($cr))
<div class="col-sm-12" style="margin-top: 10px;">
  <?php $department =$R->GetDepartment($d);
$programme =$R->getProgramme(3);
$aos =$R->GetAos2($a);
$n_ss =$s + 1;

?>
  <div class="card">
      <div class="card-header"> <b>Programme:</b>&nbsp;{{$programme->name}}&nbsp;&nbsp;&nbsp;
        <b>Department:</b>&nbsp;{{$department->name}}&nbsp;&nbsp;&nbsp;
        <b>AOS:</b>&nbsp;{{$aos->name}}
&nbsp;&nbsp;&nbsp;<b>Session:</b>&nbsp;{{$s.'/'.$n_ss}}
      </div>
      <div class="card-body">
                     

   
    <table class="table table-striped table-bordered">
      <tr>
        <td>#</td>
        <th>Matric Number</th>
        <th>Semester</th>
        
        <th>Action</th>
      </tr>
      <?php $c = 0; ?>
    @foreach($cr as $v)
    <tr>
      <td>{{++$c}}</td>
      <td>{{$v->code}}</td>
      <td>
        @if($v->semester_id == 1)
First Semester
      @else
Second Semester
    @endif
      </td>
      
      <td>@if($v->is_waved != 1)
<a href="{{url('setwavedcourse',[$v->id,1])}}" class="btn btn-success">Setup Waved</a>
      @else
<a href="{{url('setwavedcourse',[$v->id,0])}}" class="btn btn-danger">Remove as Waved</a>
    @endif</td>
        
    </tr>
    @endforeach
  </table>

  
  </div>


</div>

</div>
</div>
 @endif
</div>




@endsection

