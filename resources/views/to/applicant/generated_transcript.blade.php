<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>pdf report</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<style type="text/css">
body{font-size: 12px;}
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 4px;
}

/*tr:nth-child(even) {
    background-color: #dddddd;*/
}
.page-break {
    page-break-after: always;
}
.text-center {
    text-align: center!important;
}
.col-sm-6{max-width: 50%;}
.col-sm-12{max-width: 100%;}

 #headline1 {
      width: 20%;
     
      	float: left
     }
   #address{
   	width: 60%;
   	float: left
   }
   
   .clear{clear:both;
   }
   #top{padding-top:50px;}
   
</style>
</head>
<body>

@inject('R','App\General')
<?php  $department =$R->GetDepartment($s->department_id);
$faculty =$R->GetFaculty($s->faculty_id);

  $aos =$R->GetAos2($ts->aos_id);
$programme =$R->getProgramme($ts->programme_id);
$state=$R->getState($s->state_of_origin);
$cgpa =$R->get_cgpa($ys->session,$s->id,$s->entry_year);
$remark =$R->s_remark($cid,$s->id,$aos,true);

$nest_session =$ys->session + 1;
?>
 <div class="container-fluid">

<div class="row">
	<div class="col-sm-12">
	  <table  class="table table-bordered">
                      <tr>
                      	  <td>
                            <div class="row">
                      	  	
                      	  	<div class="col-sm-8 offset-sm-2">
                             <p class="text-center"  style="font-size: 18px; font-weight: bolder;">

                                UNIVERSITY OF CALABAR,CALABAR <br/>
                                <span style="font-size: 10px; font-family: serif;">SCHOOL Of POSTGRADUATE STUDIES</span><br/>
                                <img src="img/logo.png"/>
                            </p>
                            <p class="text-center" style="font-size: 12px;">POSTGRADUATE STUDENTS ACADEMIC RECORD AND TRANSCRIPT</p></div>

                          </div>
    
                             
                             
                          </td>
                       </tr>
                     
                  </table>		
	<h5>ACADEMIC RECORDS OF</h5>
	<table class="table table-bordered">
		<tr>
			<th>NAME :</th>
			<td colspan="3">{{$s->surname.' '.$s->name.' '.$s->other}}</td>
			
		</tr>
		<tr>
			<th>REG NUMBER :</th>
			<td>{{$s->matric_number}}</td>
						<th>DATE OF BIRTH:</th>
			<td>{{$ts->dob}}</td>
		</tr>
		<tr>
			<th>PERMANENT<br/>
			ADDRESS :</th>
			<td colspan="3">{{$ts->permanet_address}}</td>

		</tr>

		<tr>
			<th>STATE OF ORIGIN</th>
			<td>{{isset($state->state_name) ? $state->state_name : ''}}</td>
			<th>NATIONALITY:</th>
			<td>{{$s->nationality}}</td>
		</tr>
		<tr>
			<th>FACULTY :</th>
			<td>{{$faculty->name}}</td>
			<th>DEPARTMENT:</th>
			<td>{{$department->name}}</td>
		</tr>

		
	</table>
	<h5>BASIS OF ADMISSION</h5>

		<table class="table table-bordered">
		<tr>
			<th colspan="2">INSTITUTION WHERE OBTAINED</th>
			<th>DATE</th>
			<th>QUALIFICATION AND CLASS</th>
		
		</tr>
		<tr>
			<td colspan="2">{{$s->previous_institution}}</td>
			<td>{{$s->previous_institution_date}}</td>
		
			<td>{{$s->previous_institution_qualification}}
				<br/>
				{{$s->previous_institution_class}}</td>
		</tr>

		<tr>
			<th>ENTRY YEAR</th>
			<th colspan="3">{{$s->entry_year}}</th>
			
		</tr>
		</table><br/>
		<table class="table table-bordered">
			<tr>
				<th>COURSE CODE</th>
				<th>TITLE OF COURSE</th>
				<th>CREDIT UNIT</th>
				<th>GRADE</th>
			</tr>
			@foreach($c as $v)
			<?php   $result =$R->getresult($v->student_id,$v->id);?>
			<tr>
				<td>{{$v->code}}</td>
				<td>{{$v->title}}</td>
				<td>{{$v->unit}}</td>
				<td>{{$result->grade}}</td>
			</tr>
			@endforeach

		</table><br/>
		<table class="table table-bordered">
			<tr>
				<th>RESULT :</th>
				<td>{{$remark}}</td>
				<th>CGPA:</th>
				<th>{{$cgpa}} on 
					@if($s->entry_year < 2009)
					 ( 4 Point Scale )
					  @else
					  ( 5 Point Scale ) 
					@endif</th>
			</tr>
				<tr>
				<th>YEAR OF GRADUATION:</th>
				<td colspan="3">{{$ys->session.'/'.$nest_session}}</td>
				
			</tr>
			<tr>
				<th>DEGREE AWARDED :</th>
				<td colspan="3">{{$aos->name}}</td>
				
			</tr>
			
		</table>
		
	<div class="row">
		<h5 class="text-center">THIS IS A CERTIFIED TRUE COPY OF THE RECORD IN THIS SCHOOL</h5>
	<div class="col-sm-6" style="float: left;">
		<div class="row">
		<div class="col-sm-12"><h5 class="text-center">GRADING SYSTEM</h5></div>
		
		<div class="col-sm-12" >
			<table class="table table-bordered" >
				<tr>
					<th colspan="3">4 Point Scale</th>
					<th colspan="3">5 Point Scale</th>
				</tr>
				<tr><td>A</td>
					<td>4</td>
					<td>Distintion</td>
					<td>A</td>
					<td>4.50</td>
					<td>Distintion</td>
				</tr>
				<tr><td>A-</td>
					<td>3.75</td>
					<td>Credit</td>
					<td>B</td>
					<td>3.50</td>
					<td>Credit</td>
				</tr>
				<tr><td>B+</td>
					<td>3.50</td>
					<td>Merit</td>
					<td>C</td>
					<td>3.00</td>
					<td>Merit</td>
				</tr>
				<tr><td>B</td>
					<td>3.00</td>
					<td>Pass</td>
					<td>D</td>
					<td>1.00</td>
					<td>Fail</td>
				</tr>
				<tr><td>B-</td>
					<td>2.75</td>
					<td>Fail</td>
					<td colspan="3"></td>
					
				</tr>
			</table>
	</div>
	
	<p style="font-size: 12px;">The University Operated the 4 point scale until 2008 / 2009 session</p>
	</div>
	</div>		
		<div class="col-sm-6 text-center" style="min-height: 30px; float: left;">
			<h5>CERTIFIED BY</h5>
			<br><br/><br/><br/><br/>
			<p>___________________________________________<br/>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			FOR SECRETARY TO THE SCHOOL</p>

	</div>
	<div class="clear"></div>
		
</div>
<table class="table">
			
				<tr>
					<td colspan="4">Destination : {{$ts->transcrip_address}}</td>
				</tr>
				<tr>
					<td colspan="4" class="text-center"><br/><br/><br/><br/>_________________________________<br/><br/>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span >REGISTRAR</span></td>
				</tr>
			
		</table>

	</div>
</div>
</div>
</body>
</html>