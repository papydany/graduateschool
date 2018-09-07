@extends('layouts.home')
@section('title','Track Your Transcript')
@section('content')
<section>
      <div class="container">
        <nav aria-label="breadcrumb" role="navigation">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li aria-current="page" class="breadcrumb-item active">Track Your Transcript</li>
          </ol>
        </nav>
        <div class="row">
 
    <div class="col-sm-4" style="min-height: 210px;">
       <form class="form-horizontal" method="POST" action="{{ route('track_transcript') }}">
                        {{ csrf_field() }}
          <div class="form-group">
            <div class="form-row">
              <div class="col-sm-12">
                <label>Matric Number</label>
                <input class="form-control"  type="text" name="matric_number"  placeholder="Enter Matric Number" required>
              </div>
              
            </div>
          </div>
              <div class="form-group">
         <div class="form-row">
            <div class="col-sm-12">    
        <input type="submit" class="btn btn-primary btn-block" value="Continue">
         </div>
     </div>
     </div>
        </form>
    </div>
    @if(isset($t))
    <div class="col-sm-8">
      <table class="table table-bordered table-striped">
        <tr><th>Transcript Destination</th><th>Status</th></tr>
        @foreach($t as $v)
      <tr><td>{{$v->transcrip_address}}</td><td>{{$v->status == 0 ? 'Processing' : 'Treated and sent to destination'}}</td></tr>
        @endforeach
      </table>
    </div>
    @endif
</div>
</div>
</section>
<div class="modal fade" id="myModal" role="dialog" style="margin-top: 100px;">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
       
        <div class="modal-body text-danger text-center">
          <p>... processing ...</p>
        </div>
       
      </div>
      
    </div>
  </div>  
  @endsection
  @section('script')
 <script src="{{asset('js/main.js')}}"></script>
  @endsection