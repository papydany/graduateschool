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
@media print{
.pagination{display: none}
}


</style>
  <div class="row" style="min-height: 520px;padding-left: 0px; padding-right: 0px;">
     <div class="col-sm-12">
          
                   <?php   $d = $R->GetDepartment($dp);

                      $f = $R->GetFaculty($fc);

                      $aos =$R->GetAos2($a);



                     if(empty($n1c))
                      {
                      	 $n1c = 1;
                         $regc1 = array('');
                      }
                     
                       if(empty($n2c))
                      {
                      	 $n2c = 1;
                         $regc2 = array('');
                      }
                       $no1 =$n1c;  
                     $no2 =$n2c;
                      


    
    $set['rpt'] = array(0=>'<th>REPEAT COURSES</th>', 1=>'<th></th>', 2=>'<th class="tB"></th>');
    $set['carry'] = array(0=>'<th>CARRY OVER COURSES</th>', 1=>'<th></th>', 2=>'<th class="tB">CH</th>');
    $set['cpga'] = array(0=>'<th>CGPA</th>', 1=>'<th></th>', 2=>'<th class="tB"></th>');
    $set['wrong_fix'] = '';
    $set['class'] = array(0=>'', 1=>'', 2=>'');
    
   
    
    $set['bottom'] = '<p style="margin-left:0px">
              <span>___________________________________</span>
              <span style="color:#000; padding-left:3px"></span>
              <span style="color:#000; padding-left:3px; font-size:10px;" class="B">(HEAD OF DEPARTMENT)</span>
              <span style="color:#000; padding:20px 0 0 3px; font-size:10px;">DATE: .....................................................</span>
            </p>
            <p> 
              <span>_____________________________________________</span>
              <span style="color:#000; padding-left:3px"></span>
              <span style="color:#000; padding-left:3px"></span>
              <span style="color:#000; padding-left:3px; font-size:10px;" class="B">(CHAIRMAN DEPARTMENTAL GRADUATE COMMITTEE)</span>
              <span style="color:#000; padding:20px 0 0 3px; font-size:10px;">DATE: .............................................................</span>
            </p>
            <p> 
              <span>___________________________________________</span>
              <span style="color:#000; padding-left:3px"></span>
              <span style="color:#000; padding-left:3px; font-size:10px;" class="B">(CHAIRMAN DEPARTMENTAL GRADUATE COMMITTEE)</span>
              <span style="color:#000; padding:20px 0 0 3px; font-size:10px;">DATE: .............................................................</span>
            </p>
            
            <p style="margin-right:0;"> 
              <span>________________________________________</span>
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
                                UNIVERSITY OF CALABAR </br>
                            CALABAR</p>
    
                              <div class="col-sm-8 www" style="padding-left: 0px; padding-right: 0px; float:left">
  
                                  <p><strong>FACULTY:</strong> {{$f->name}}</br>
                                 <strong>DEPARTMENT:</strong> {{$d->name}}</br>
                                  <strong>PROGRAMME:</strong>  {{$aos->name }}</p>
                              </div>
                              <div class="col-sm-3 ww" style="padding-left: 0px; padding-right: 0px; float:left;">
                                  {{!$next = $s + 1}}
                                  <p>
                                 <strong>SESSION : </strong>{{$s.' / '.$next}}</br>
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
                  		<th class="text-center text-size">S/N</th>
                  		<th class="text-center">NAME</th>
                  		<th  class="text-center">REG NO</th>
                      <?php
                     echo  $set['rpt'][0],
                      $set['carry'][0];
                      ?>
                  		<th class="text-center" colspan="{{$no1}}">FIRST SEMESTER RESULTS</th>
                  		<th class="text-center" colspan="{{$no2}}">SECOND SEMESTER RESULTS</th>
                  		
                      <?php
                      echo $set['cpga'][0],
                          $set['class'][0];
                          ?>
                        <th  class="text-center">Class</th>   
                  		<th  class="text-center">REMARKS</th>
                  		
                  	</tr>
                  		
                  <tr class="thead">
                  <th></th>
                  <th></th>
                  <th></th>
                  <?php
        echo $set['rpt'][1],
          $set['carry'][1];
  

  if( $n1c != 0 || $n2c != 0 ) {
    
    
    
    $sizea = $n1c; //+ 1;
    $sizeb =  $n1c + 1 + $n2c + 1;
  
    $k = (int)($n1c + $n2c); // additional 2 is for the two elective spaces
   // dd($regc1);

    $list = array_merge( $regc1, $regc2 );
    

    for($i=0; $i<$k; $i++) {

        echo '<th class="tB"><p class="ups">',isset($list[$i]['code']) ? strtoupper($list[$i]['code']) : '','</p></th>';
      
    }
  
  } else {
    echo '<th></th>';
  }
  
  echo'<th></th>',
     '<th></th>',
     '<th></th>',
     '</tr>';

     echo '<tr class="thead">',
     '<th class="tB"></th>',
     '<th class="tB"></th>',
     '<th class="tB">',$set['wrong_fix'],'</th>',
     $set['rpt'][2],
     $set['carry'][2];

  if($n1c != 0 || $n2c != 0 ) {
    //echo $k, $sizea, $sizeb;
    
    
    for($i=0; $i<$k; $i++) {

    
    
        echo '<th class="tB">',isset($list[$i]['unit']) ? $list[$i]['unit'] : '','</th>';
    }
  
  } else
    echo '<th></th>';
  
  
  echo '<th class="tB"></th>',
     
  '<th></th>',
     '<th class="tB"></th>',
     '</tr></thead>';    
  
 
  ?>

  {{!! $c = 0}}
 @if(count($u) > 0)
  
    
  @foreach($u as $v)
  

 {{! $fullname = $v->surname.' '.$v->name.' '.$v->other}}
 <?php  

$first_grade = $R->getStudentResult($v->id,$c1, $s);

$second_grade = $R->getStudentResult($v->id,$c2,$s);

$first_semester = empty($first_grade) ? array('') : $first_grade;

$second_semester = empty($second_grade) ? array('') : $second_grade;

$ll = array_merge($first_semester,$second_semester);
 
$cc =array_merge($c1,$c2);

$cgpa =$R->get_cgpa($s,$v->id,$v->entry_year);

$class =$R->get_class_degree($cgpa,$v->entry_year);

$remark =$R->s_remark($cc,$v->id,$aos->name);

 ?>
 <tbody>
<tr>
    <td>{{++$c}}</td>
    <td>{{strtoupper($fullname)}}</td>
    <td>{{$v->matric_number}}</td>
    <th></th>
    <th></th>
<?php
for($i=0; $i<$k; $i++) {
            
            
          
            
            if( $i == ($n1c + $n2c) ) {
            
            }
            else {
              
              if( isset($ll[$i]['grade']) ) { 

                if( $ll[$i]['grade'] == '&nbsp;&nbsp;' ) {
                  echo '<td class="tB" style="background:yellow"></td>';
                } else {
                  echo '<td class="tB">',$ll[$i]['grade'],
                  '</td>';
                }
   
              
              } else { //  Jst for GUI purpose
                echo '<td class="tB"></td>';
              }
             
            }
          } 
           echo'<td>',$cgpa,'</td>',
           '<td>',$class,'</td>';
        echo '<td class="s9"><div class="dw">',$remark,'</div></td>';


?>

  </tr>
  @endforeach

  @else
  <div class="col-sm-10 col-sm-offset-1 alert alert-danger text-center" role="alert" >
   No records of students is available
    </div>
  @endif
</tbody>

</table>    



<div class="sph block" style="margin-top:40px;"><?php echo $set['bottom'] ?></div>


  </div>
@endsection