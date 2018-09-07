<?php

namespace App;
use DB;
use App\Aos;
use App\User;
use App\Department;
class General
{
	public function Getaos($id)
	{
$aos = Aos::where('department_id',$id)->get();
return $aos;
	}
// get waved courses
  public function getwavedcourse($session,$id)
  {
$C =CourseReg::where([['student_id',$id],['session',$session],['is_waved',1]])->orderBy('session','ASC')->orderBy('code','ASC')->get();
if(count($C) > 0)
{
  return $C;
}
}

 public function getrolename($id){
        $user = DB::table('roles')
            ->join('user_roles', 'roles.id', '=', 'user_roles.role_id')
            ->where('user_roles.user_id',$id)
            ->first();
            return $user->name;
    }
  public function getrole($id)
  {
$r =Role::find($id);
return $r;
    
  }
  // get user
 	public function GetUser($id)
	{
$u = User::find($id);
if($u != null)
{
return $u;	
}
}   	
  // get department
  public function GetDepartment($id)
  {
$u = Department::find($id);
if($u != null)
{
return $u;  
}
}  
// get faculty
  public function GetFaculty($id)
  {
$u = Faculty::find($id);
if($u != null)
{
return $u;  
}
}  

  // get user
  public function GetAos2($id)
  {
$u = Aos::find($id);
if($u != null)
{
return $u;  
}
}

public function aos_assigned($user_id,$department_id)
{
  $d =AssignOfficer::where([['user_id',$user_id],['department_id',$department_id]])->get();
  foreach ($d as $key => $value) {
   $id[] =[$value->aos_id];
  }
  $u = Aos::whereIn('id',$id)->get();
  return $u;
}
// semester
public function getSemeter($id)
{
  $s =semester::find($id);
  if($s != null)
  {
    return $s;
  }
} 

// programme
public function getProgramme($id)
{
  $s =Programme::find($id);
  if($s != null)
  {
    return $s;
  }
}   

// state
public function getState($id)
{
  $s =State::find($id);
  if($s != null)
  {
    return $s;
  }
}  
// subject

public function getCourseReg($id)
{
  $cr =CourseReg::where('student_id',$id)->select('*','session')->orderBy('semester_id','ASC')->groupBy('session')->get();
  if(count($cr) > 0)
  {
    return $cr;
  }
}


// result

 public function getresult($s_id,$id){
        $result =StudentResult::where([['student_id',$s_id],['coursereg_id',$id]])->first();
        return $result;
       
   }
function getStudentResult($id,$course_id,$s) {
  
  if(empty($course_id) )
    return array();
  
  $return = array(); 
   $all = array();
  $s_result =StudentResult::where([['student_id',$id],['session',$s]])->whereIn('course_id',$course_id)->get();
 
  if(count($s_result) > 0)
  {
    foreach ($s_result as $key => $value ) {
      $all[$value->course_id] =$value;
    }
    
  }

  /*coursereg*/
    $creglist = array();
      $creg =CourseReg::where([['student_id',$id],['session',$s]])->get();
      if(count($creg))
      {
      foreach ($creg as $key => $value) {
        $creglist[] =  $value->course_id;
      }
    }
/*coursereg*/
  $keys = array_keys($all);

  foreach($course_id as $k=>$v ) {

    if( in_array($v, $keys) ) {
      if( empty($all[$v]['grade']) ) {
        $result[] = array( 'grade'=>$all[$v]['grade'] );
      } else {
        $result[] = array('grade'=>$all[$v]['grade'] );
      }
    } else {
      if( in_array($v, $creglist) )
        $result[] = array('grade'=>'&nbsp;&nbsp;');
      else
        $result[] = array('grade'=>'');
    }
  }

  return $result;
  
}



function get_cgpa($s,$id,$entry_year){

$tcu = 0; $tgp = 0;$coursereg_id =array();
$coursereg =CourseReg::where([['student_id',$id],['session','<=',$s],['is_waved','!=',1]])->get();
foreach ($coursereg as $key => $value) {
$coursereg_id [] =$value->id;
}
$result = StudentResult::where([['student_id',$id],['session','<=',$s]])
->whereIn('coursereg_id',$coursereg_id)->get();


if(count($result) > 0)
{
  foreach ($result as $key => $value) {
   
  $cu = $this->get_crunit($value->course_id,$value->session,$id);
  $gp = $this->get_gradepoint ($value->grade,$cu,$entry_year);

    $tcu += $cu;
    $tgp += $gp;
  }

@$gpa = $tgp / $tcu ;
$gpa = number_format ($gpa,2); 
return $gpa;
}
return 0;
}


function get_gpa($s,$id,$entry_year){
  
  $tcu = 0; $tgp = 0;  $course_id = array();
  //, level_id, std_mark_custom_2, period
   $creg =CourseReg::where([['student_id',$id],['session',$s],['is_waved','!=',1]])->get();
   foreach ($creg as $key => $value) {
     $course_id[] =$value->course_id;
   }

$s_result = $this->getResult_grade($id,$s,$course_id);
 
  if(count($s_result) > 0)
  {
foreach ($s_result as $key => $value) {
  $cu = $this->get_crunit($value->course_id, $s, $id);
  $gp = $this->get_gradepoint ($value->grade,$cu,$entry_year);
  
    $tcu = $tcu + $cu;
    $tgp = $tgp + $gp;
 
}

//dd();
  @$gpa = $tgp / $tcu ;
  $gpa = number_format ($gpa,2);
  return $gpa;
}
return 0;

}


// get course unit
private function get_crunit ($courseid, $s, $id) {
  $creg =CourseReg::where([['student_id',$id],['session',$s],['course_id',$courseid]])->first();

  $cu = $creg['unit'];
  return $cu;
}
// get result
private function getResult_grade($id,$s,$course_id_array)
{
    $s_result =StudentResult::where([['student_id',$id],['session',$s]])
  ->whereIn('course_id',$course_id_array)->get();
  return $s_result;
}
// get grade point
private function get_gradepoint ($grade,$cu,$y){
  if($y < 2009)
  {
 if ($grade == 'A' )
    return 4.0 * $cu;
  else if ($grade == 'A-' )
    return 3.0 * $cu;
  else if ($grade == 'B+' )
    return 2.0 * $cu;
  else if ($grade == 'B' )
    return 1.0 * $cu;
  }else
  {
    if ($grade == 'A' )
    return 5.0 * $cu;
  else if ($grade == 'B' )
    return 4.0 * $cu;
  else if ($grade == 'C' )
    return 3.0 * $cu;
  else if ($grade == 'D' )
    return 2.0 * $cu;
  else if ($grade == 'E' )
    return 1.0 * $cu;
  else if ($grade == 'F' )
    return 0.0 * $cu ;
  }
  
}

public function get_class_degree ($cgpa,$y){
  if($y < 2009)
  {
  if ($cgpa >= 4  )
    return 'Distinction';
  else if ($cgpa >= 3.75 )
    return 'Credit';
  else if ($cgpa >= 3.5 )
    return 'Merit';
   else if ($cgpa >= 3.0 )
    return 'Passed';
  else 
    return 'Fail';
  }else
  {
    if ($cgpa >= 4.5  )
    return 'Distinction';
  else if ($cgpa >= 3.5 )
    return 'Credit';
  else if ($cgpa >= 3.0 )
    return 'Merit';
  else 
    return 'Fail';
 
  }
  
}
public function s_remark($course_id,$id,$aos,$t=null)
{
  $ti = 0;
  foreach ($course_id as $key => $value) {
     $r = StudentResult::where([['course_id',$value],['student_id',$id]])->first();
    
     if($r == null)
     {
$ti =$ti + 1;
     }else
     { 
      if($r->grade =='F' || $r->grade ='')
      {
        $ti =$ti + 1;
      }

     }

  }
  
  if($ti == 0)
  {
    if($t == true)
    {
return 'PASS';
    }else{

return 'PASS <br/>'.
'recommended for the award of '.$aos;
}
  }
 
}


}