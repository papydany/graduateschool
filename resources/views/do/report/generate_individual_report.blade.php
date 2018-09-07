@extends('layouts.display')
@section('title','REPORT')
@section('content')
@inject('R','App\General')
<style type="text/css">
@media print,Screen{
 html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,font,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td{border:0 none;font-size:100%;vertical-align:baseline;margin:0;padding:0;}
 
  .thead th{ border-right:1px solid #000;} 
 .table-bordered {border: 1.5px solid #000;
} 
.table-bordered > tbody > tr > td{border: 2px solid #000 !important;}
.table-bordered > tbody > tr > th{border: 2px solid #000 !important;}
.table-bordered > thead > tr > td{padding: 1px; border: 2px solid #000 !important;}
.table-bordered > thead > tr > th{padding: 1px; border: 2px solid #000 !important;}
.table > tbody > tr > td{padding: 1px !important;}
.table > tbody > tr > th{padding: 0px !important;}

.tB{ border-top:1px solid #000 !important;}
.bbt{ vertical-align:bottom; width:65px;}
.B{ font-weight:700;}
body{font-size: 14px;}
.ups{
-webkit-transform: rotate(-90deg);
-moz-transform: rotate(-90deg);
-o-transform: rotate(-90deg);
-khtml-transform: rotate(-90deg);

filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
height:70px;
text-align:center;
width:20px;
position:relative;
left:25px;
top:15px;

}

.bl{ border:2px solid #000; display:block; overflow:hidden; margin-bottom:5px; padding:3px 5px 5px;}
.bl p{ margin-bottom:2px;}
.sph p{ float:left; margin-right:20px;}
.sph p span{ display:block; color:#000;}
.center{ margin:40px auto; display:block;}
.block{ display:block; overflow:hidden;}
.st div{ padding-top:5px; display:block; overflow:hidden; padding-left:20px; }
.st .a{ color:#000; width:200px;}
.st .b{ color:#000;}
.s9{ font-size:10px;}
.dw{ width:140px; display:block; word-spacing:.1px;}

}



</style>
  <div class="row" style="min-height: 520px;padding-left: 0px; padding-right: 0px;">
     <div class="col-sm-12">
          
                   <?php   $d = $R->GetDepartment($s->department_id);

                      $f = $R->GetFaculty($s->faculty_id);

                      $aos =$R->GetAos2($s->department_id);

                      $entry_year_next = $s->entry_year + 1;

    $set['bottom'] = '<p style="margin-left:0px">
              <span>_______________________</span>
              <span style="color:#000; padding-left:3px"></span>
              <span style="color:#000; padding-left:3px; font-size:10px;" class="B">(HEAD OF DEPARTMENT)</span>
              <span style="color:#000; padding:20px 0 0 3px; font-size:10px;">DATE: .....................................................</span>
            </p>
            <p> 
              <span>______________________________</span>
              <span style="color:#000; padding-left:3px"></span>
              <span style="color:#000; padding-left:3px"></span>
              <span style="color:#000; padding-left:3px; font-size:10px;" class="B">(CHAIRMAN DEPARTMENTAL GRADUATE COMMITTEE)</span>
              <span style="color:#000; padding:20px 0 0 3px; font-size:10px;">DATE: .............................................................</span>
            </p>
            <p> 
              <span>_______________________</span>
              <span style="color:#000; padding-left:3px"></span>
              <span style="color:#000; padding-left:3px; font-size:10px;" class="B">(CHAIRMAN DEPARTMENTAL GRADUATE COMMITTEE)</span>
              <span style="color:#000; padding:20px 0 0 3px; font-size:10px;">DATE: .............................................................</span>
            </p>
            
            <p style="margin-right:0;"> 
              <span>___________________________</span>
              <span style="color:#000; padding-left:3px"></span>
              <span style="color:#000; padding-left:3px; font-size:10px;" class="B">(AG. DEAN GRADUATE SCHOOL)</span>
              <span style="color:#000; padding:20px 0 0 3px; font-size:10px;">DATE: .............................................................</span>
            </p>';

              
 // }
  

                   ?>
                   <table  class="table table-bordered">
                      <tr>
                      	  <td>
                             <p class="text-center" style="font-size:18px; font-weight:700;">
                             GRADUATE SCHOOL </br>
                                UNIVERSITY OF CALABAR </br>
                            CALABAR</p>
    
                              <div class="col-sm-8 www" style="padding-left: 0px; padding-right: 0px;float: left;">
  
                                  <p>FACULTY: {{$f->name}}</br>
                                 DEPARTMENT: {{$d->name}}</br>
                                  PROGRAMME:  {{$aos->name }}</p>
                              </div>
                              <div class="col-sm-3 ww" style="padding-left: 0px; padding-right: 0px; float:left;">
                                  {{!$next = $s->entry_year + 1}}
                                  <p>
                                 <strong>SESSION : </strong>{{$s->entry_year.' / '.$entry_year_next}}</br>
                                  <strong>SEMESTER : </strong>FIRST & SECOND </p>
                              </div>
                          </td>
                       </tr>
                       <tr>
                          <td bgcolor="#cec">
                          	  <div class="col-sm-12 text-center"> 
                          	  <p><strong>EXAMINATION REPORTING SHEET</strong></p> 
                          	  </div>
                          </td>
                      </tr>
                  </table>
                  <table class="table table-bordered">
                    <thead>
                  	<tr class="thead">
                    @if($s->programme_id == 3)
                    
                    <th class="text-center text-size" rowspan="2">S/N</th>
                      <th class="text-center" rowspan="2">NAME / REG NO</th>
                  
                     <th class="text-center" rowspan="2">STATUS</th>
                      <th  class="text-center" rowspan="2">PREVIOUSLY FAILED COURSES</th>
                      <th class="text-center" rowspan="2">RESIT</th>
                      
                      <th class="text-center" rowspan="2">FIRST SEMESTER RESULTS</th>
                      <th class="text-center" rowspan="2">SECOND SEMESTER RESULTS</th>
                      <th class="text-center" rowspan="2">GPA</th>

                  <th  class="text-center" colspan="3">COMPREHENSIVE PAPERS
                    <tr>
                      <th class="text-center">I</th>
                      <th class="text-center">II</th>
                      <th class="text-center">III</th>
                    </th>
                      <th  class="text-center" rowspan="2">REMARKS</th>
                    @else
                    <th class="text-center text-size" >S/N</th>
                      <th class="text-center">NAME / REG NO</th>
                  
                     <th class="text-center">STATUS</th>
                      <th  class="text-center">PREVIOUSLY FAILED COURSES</th>
                      <th class="text-center">RESIT</th>
                      
                      <th class="text-center">FIRST SEMESTER RESULTS</th>
                      <th class="text-center">SECOND SEMESTER RESULTS</th>
                      <th class="text-center">GPA</th>
                  
                      <th  class="text-center">REMARKS</th>
                     @endif
                  		
                  		
                  	</tr>
                  		
                  <tr class="thead">
                  
{{! $fullname = $s->surname.' '.$s->name.' '.$s->other}}

 <tbody>
<tr>
    <td>1</td>
    <td>{{strtoupper($fullname)}}<br/>
      {{$s->matric_number}}
    </td>
    <td></td>
    <td></td>
    <td></td>
    <td colspan="2">
      @foreach($cr as $k => $vc)
      <?php $next_k =$k+1;
$waved =$R->getwavedcourse($k,$s->id);


      ?>
      <p class="text-center" style="font-weight: bold;">{{$k.'/'.$next_k}}</p>
      
       <div class="row">
        <div class="col-sm-6 text-center">
           @foreach($vc as  $c)
          @if($c->semester_id == 1 && $c->is_waved != 1)

        <?php $result = $R->getresult($c->student_id,$c->id);  ?>

          <p>{{$c->code}} {{isset($result->grade) ? $result->grade : ''}}</p>
          @endif
          @endforeach
       </div>
      <div class="col-sm-6 text-center">
         @foreach($vc as  $c)
          @if($c->semester_id == 2 && $c->is_waved != 1)
        <?php 

        $result = $R->getresult($c->student_id,$c->id);  ?>
        <p>  {{$c->code}} {{isset($result->grade) ? $result->grade : ''}}</p>
          @endif
          @endforeach
       </div>
       <div class="clearfix"></div>
       @if($waved != null)
       <!--- for waved courses ----->
<div class="col-sm-12"><p class="text-center" style="font-weight: bolder;">COURSES WAVED</p></div>
<div class="clearfix"></div>
 <div class="col-sm-6 text-center">
           @foreach($vc as  $c)
          @if($c->semester_id == 1 && $c->is_waved == 1)

        <?php $result = $R->getresult($c->student_id,$c->id); ?>

          <p>{{$c->code}} {{isset($result->grade) ? $result->grade : ''}}</p>
          @endif
          @endforeach
       </div>
      <div class="col-sm-6 text-center">
         @foreach($vc as  $c)
          @if($c->semester_id == 2 && $c->is_waved == 1)
        <?php 

        $result = $R->getresult($c->student_id,$c->id);  ?>
        <p>  {{$c->code}} {{isset($result->grade) ? $result->grade : ''}}</p>
          @endif
          @endforeach
       </div>
       <div class="clearfix"></div>

      
       @endif

     </div>
  

     @endforeach

      
    </td>
   <td>
 @foreach($cr as $k => $vc)     
<?php $gpa =$R->get_gpa($k,$s->id,$s->entry_year) ?>
<br/><br/>
  <p>  {{$gpa}}</p>
 @endforeach
  </td>
     @if($s->programme_id == 3)
    <td class="text-center"><br/><br/><br/><br/><br/>{{isset($cp->grade1) ? $cp->grade1 : ''}}</td>
    <td class="text-center"><br/><br/><br/><br/><br/>{{isset($cp->grade2) ? $cp->grade2 : ''}}</td>
    <td class="text-center"><br/><br/><br/><br/><br/>{{isset($cp->grade3) ? $cp->grade3 : ''}}</td>
    @endif
 
   

    <td></td>
    </tr>
 
 <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td colspan="2" class="text-center">
           <?php  

$cgpa =$R->get_cgpa($k,$s->id,$s->entry_year);
$remark = "";
 ?>
      CGPA ={{$cgpa}}
    

    </td>

     @if($s->programme_id == 3)
    <td></td>
    <td></td>
    <td></td>
    @endif
    <td></td>
    <td></td>
    </tr>
 
</tbody>

</table>    



<div class="sph block" style="margin-top:40px;"><?php echo $set['bottom'] ?></div>

  

     </div>

  </div>
@endsection