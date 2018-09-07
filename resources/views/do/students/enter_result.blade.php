@extends('layouts.admin')
@section('title','Enter Result')
@section('content')
@inject('R','App\General')
 <style type="text/css">
 .fc {padding:0px;text-align: center;font-weight: bolder;width:20%;}
 </style>
 <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('backend')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Enter Result</li>
      </ol>
<div class="row">
	<div class="col-sm-12">
        <div class="card">
      <div class="card-header">Enter Result</div>
      <div class="card-body">
        <div class="table-responsive">
          @if(isset($cr))
     <form class="form-horizontal" method="POST" action="{{ route('insert_result') }}">
                        {{ csrf_field() }}
                         <input type="hidden" name="student_id" value="{{$st}}">
                         <?php $t = 0;?>
                        @foreach($cr as $k => $v)
                        <?php $i = 0; $n =$k+1; ?>
                        <p>Session {{$k .' / ' .$n}}</p>
                        <table class="table table-bordered">
                          <thead>
                          <tr>
                            <th></th>
                          <th>#</th>
                          <th>Code</th>
                          <th>semester</th>
                          <th>Grade</th>
                        </tr>
                      </thead>
                        @foreach($v as $vv)
                        <?php $semester = $R->getSemeter($vv->semester_id);
                        $result =$R->getresult($vv->student_id,$vv->id);
                         ++$t;
                         ?>
                         
 <tr> <td>
                      <input type="checkbox" class="checkbox" name="id[{{$t}}]" id="check[{{$t}}]" value="{{$t}}">
                      <input type="hidden" name="coursereg_id[{{$t}}]" value="{{$vv->id}}">
                      <input type="hidden" name="course_id[{{$t}}]" value="{{$vv->course_id}}">
                      <input type="hidden" name="unit[{{$t}}]" value="{{$vv->unit}}">
                       <input type="hidden" name="session[{{$t}}]" value="{{$vv->session}}">
                      <input type="hidden" name="semester_id[{{$t}}]" value="{{$vv->semester_id}}">
          
                        </td>
                          <th>{{++$i}}</th>
                          <th>{{$vv->code}}</th>
                          <th>{{$semester->name}}</th>
                          <th>
                          @if($result != null)
     @if(Auth::user()->edit_right > 0)
      <input type="hidden"class="form-control" name="result_id[{{$t}}]"  value="{{$result->id}}"> 
     <input type="text" id="g[{{$t}}]" class="form-control fc" name="grade[{{$t}}]" onKeyUp="updA(this,'check[{{$t}}]')" value="{{$result->grade}}">
     @else
     <input type="hidden"class="form-control" name="result_id[{{$t}}]"  value=""> 
<input type="text" id="g[{{$t}}]" class="form-control fc" name="grade[{{$t}}]" onKeyUp="updA(this,'check[{{$t}}]')" value="{{$result->grade}}" readonly>
     @endif 
     @else
     <input type="hidden"class="form-control" name="result_id[{{$t}}]"  value=""> 
    <input type="text" id="g[{{$t}}]" class="form-control fc" name="grade[{{$t}}]" value="" onKeyUp="updA(this,'check[{{$t}}]')">
     @endif

                            </th>
                        </tr>
                        @endforeach
                        

                          
                        </table>
                        @endforeach
                       
                        <input type="submit" class="btn btn-success btn-xs" name="">
                        
    
                      </form>
                      @endif
      
      </div>
    </div>
  </div>
</div>

</div>

</div>


@endsection
@section('script')

  <script >
function updA(e,g){
  var chk=document.getElementById(g);
  if(/[^a-b+cdef]/gi.test(e.value))
    {
      alert('Only Grade A - F  is Allowed');
      e.value='';
      chk.checked=false;
    }else{

if(e.value!='')
  {chk.checked=true;}else{chk.checked=false;}}}


 

  </script>


@endsection  