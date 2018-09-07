<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AssignOfficer;
use App\User;
use App\Semester;
use App\Programme;
use App\Course;
use App\Aos;
use App\Department;
use App\Student;
use App\RegisterCourse;
use App\CourseReg;
use App\RegisterStudent;
use App\StudentResult;
use App\State;
use App\CStudentResult;
use Auth;
use DB;
class DoController extends Controller
{
	public function __construct()
     {
        $this->middleware('auth');
    }
//------------------------------ create course--------------------------------------
     public function createcourse()
    {
    	$d =AssignOfficer::where('user_id',Auth::user()->id)->select('department_id')->distinct()->get();
    	$s =Semester::get();
    	$p =Programme::get();
        return view('do.course.index')->withD($d)->withS($s)->withP($p);
    }

    //post
//------------------------------ post--------------------------------------

    public function post_createcourse(Request $request)
    {$request->validate([
        'programme' => 'required',
        'semester' => 'required',
        'department' => 'required',
        
    ]);
    
    	$semester = $request->input('semester');
         $programme =$request->input('programme');
    	$department=$request->input('department');
    	  $variable = $request->input('code');
    	  $title = $request->input('title');
    	  $unit = $request->input('unit');
    	  $status = $request->input('status');
    if($variable == null)
{
	Session::flash('warning',"course Code is empty");
    return back();
}
    	foreach ($variable as $key => $value) {
    	if(!empty($value)) {
    		$cc =strtoupper(str_ireplace(" ","",$value));

    	$clean_list[$cc] =array('title'=>$title[$key],'unit'=>$unit[$key],'code'=>$cc ,'status'=>$status[$key]);
    	}
    	}

 foreach($clean_list as $kk=>$vv ){
$course_code[] = $vv['code'];

}

$check =Course::whereIn('code',$course_code)
->where([['department_id',$department],['programme_id',$programme],['semester_id',$semester]])->get();

if(count($check) > 0)
{
foreach ($check as $key => $value) {
	unset($clean_list[$value->code]);
}
		
}

	if(count($clean_list) != 0)
	{
		
 foreach($clean_list as $k=>$v ){
	
$data[] =['title' => $clean_list[$k]['title'], 'code' =>$clean_list[$k]['code'],'unit'=>$clean_list[$k]['unit'],'status'=>$clean_list[$k]['status'],'programme_id'=>$programme,'department_id'=>$department,'semester_id'=>$semester];

}
//dd($data);
DB::table('courses')->insert($data);
$request->session()->flash('success',"course succesfull created.");

    }
 return redirect()->action('DoController@createcourse');   
}
// view
//------------------------------ view course--------------------------------------

public function viewcourse()
{
	$d =AssignOfficer::where('user_id',Auth::user()->id)->select('department_id')->distinct()->get();
    	$s =Semester::get();
    	$p =Programme::get();
        return view('do.course.view')->withD($d)->withS($s)->withP($p);
}
//------------------------------ get view course--------------------------------------

public function view_course(Request $request)
{
	$request->validate([
        'programme' => 'required',
        'semester' => 'required',
        'department' => 'required',
        
    ]);
    	$d =AssignOfficer::where('user_id',Auth::user()->id)->select('department_id')->distinct()->get();
    	$s =Semester::get();
    	$p =Programme::get();

    $semester = $request->input('semester');
     $programme =$request->input('programme');
    $department=$request->input('department');
    $c =Course::where([['department_id',$department],['programme_id',$programme],['semester_id',$semester]])->get();
        return view('do.course.view')->withD($d)->withS($s)->withP($p)->withC($c)->withSm($semester)->withDp($department)->withPg($programme);
}

//------------------------------ delete course--------------------------------------
public function delete_course(Request $request,$id)
{
Course::destroy($id);
$request->session()->flash('success',"course succesfull delete.");
return redirect(url()->previous());
}
//------------------------------ edit course--------------------------------------
public function edit_course($id)
{
$c = Course::find($id);
return view('do.course.edit')->withC($c);
}
//------------------------------ update course--------------------------------------
public function update_course(Request $request)
{
	$request->validate([
        'title' => 'required',
        'code' => 'required',
        'unit' => 'required',
        'status' => 'required',
        
    ]);
$c = Course::find($request->id);
$c->title=$request->title;
$c->code=$request->code;
$c->status=$request->status;
$c->unit=$request->unit;
$c->save();
$request->session()->flash('success',"course succesfull updated.");
return redirect($request->url);
}

//==================================== waved_couese ===========================
public function waved_couese()
{$d =Department::all();
  return view('do.students.waved')->withD($d); 
}

public function waved_couese1(Request $request)
{$d =Department::all();
  $department_id =$request->department;
  $aos_id =$request->aos;
  $session =$request->session;
  $users = DB::table('students')
            ->join('register_students', 'students.id', '=', 'register_students.student_id')
            ->where([['students.programme_id',3],['students.department_id',$department_id],['students.aos_id',$aos_id],['register_students.session',$session]])
            ->orderBy('students.matric_number','ASC')
            ->select('students.*')
            ->get();
          
  return view('do.students.waved')->withD($d)->withU($users)->withDp($department_id)->withA($aos_id)->withS($session); 
}

public function setup_waved_course(Request $request)
{
  $id =$request->id;
  $session =$request->s;
  $d =$request->d;
  $a =$request->a;
   $cr =CourseReg::where([['student_id',$id],['session',$session]])->orderBy('semester_id','ASC')->get();
   return view('do.students.setup_waved')->withCr($cr)->withS($session)->withA($a)->withD($d); 
}

public function setwavedcourse(Request $request,$id,$w)
{
$c = CourseReg::find($id);
$c->is_waved = $w;
$c->save();
$request->session()->flash('success',"course succesfull updated.");
return back();
}
// ------------------------ register courses ----------------------------------------------------
public function registercourses()
{$d =AssignOfficer::where('user_id',Auth::user()->id)->select('department_id')->distinct()->get();
 $s =Semester::get();
$p =Programme::get();
   return view('do.course.registercourses')->withD($d)->withS($s)->withP($p); 
}

//--------------------------post register courses --------------------------------

public function register_courses(Request $request)
{
$request->validate(['programme' => 'required','department' => 'required',]);
    
    $d =AssignOfficer::where('user_id',Auth::user()->id)->select('department_id')->distinct()->get();
    $p =Programme::get();
     $programme =$request->input('programme');
    $department=$request->input('department');
    $c =Course::where([['department_id',$department],['programme_id',$programme]])->get();
  
        return view('do.course.registercourses')->withD($d)->withP($p)->withC($c)->withDp($department)->withPg($programme);
}
// post register courses
public function post_register_courses(Request $request)
{
   $request->validate([
        'aos_id' => 'required',
       'session' => 'required',
         ]); 
   $url =$request->input('url');
    $session =$request->input('session');
    $aos_id=$request->input('aos_id');
        $p =$request->input('programme_id');
        $d =$request->input('department_id');
       
     $variable = $request->input('id');

     if($variable == null)
{$request->session()->flash('warning',"you did not select any courses.");
    return back();
}

$course =Course::whereIn('id',$variable)->get();

foreach ($course as $key => $value) {
    $data[$value->id] =['course_id'=>$value->id,'programme_id'=>$p,'department_id'=>$d,'aos_id'=>$aos_id,'semester_id'=>$value->semester_id,'title'=>$value->title,'code'=>$value->code,'unit'=>$value->unit,'status'=>$value->status,'session'=>$session];

    $check_data[] =$value->id;
  
}
// check if course exist already on the register course table
$check =RegisterCourse::whereIn('course_id',$check_data)
->where([['programme_id',$p],['department_id',$d],['aos_id',$aos_id],['session',$session]])
->get();
if(count($check) > 0)
{
  foreach ($check as $key => $value) {

    unset($data[$value->course_id]);
}
}

DB::table('register_courses')->insert($data);
$request->session()->flash('success',"SUCCESSFULL.");
return redirect($url);
}

// ------------------------ view register courses ----------------------------------------------------
public function viewregistercourses()
{$d =AssignOfficer::where('user_id',Auth::user()->id)->select('department_id')->distinct()->get();
$p =Programme::get();
   return view('do.course.viewregistercourses')->withD($d)->withP($p); 
}
// ------------------------ view register courses ------------------------------------------
public function view_register_courses(Request $request)
{
$request->validate(['programme' => 'required','department' => 'required','session'=>'required','aos_id' => 'required',]);
    
    $d =AssignOfficer::where('user_id',Auth::user()->id)->select('department_id')->distinct()->get();
    $p =Programme::get();
     $programme =$request->input('programme');
    $department=$request->input('department');
     $session =$request->input('session');
    $aos_id=$request->input('aos_id');
    $rc =RegisterCourse::where([['department_id',$department],['programme_id',$programme],['session',$session],['aos_id',$aos_id]])->get();
  
        return view('do.course.viewregistercourses')->withD($d)->withP($p)->withRc($rc)->withDp($department)->withPg($programme)->withS($session)->withA($aos_id);
}
//------------------------------ create students--------------------------------------
     public function createstudents()
    {
        $d =AssignOfficer::where('user_id',Auth::user()->id)->select('department_id')->distinct()->get();
        $s =Semester::get();
        $p =Programme::get();
        return view('do.students.index')->withD($d)->withS($s)->withP($p);
    }

    //post
//------------------------------ post--------------------------------------

    public function post_createstudents(Request $request)
    {
        $request->validate([
        'programme' => 'required',
        'aos' => 'required',
        'department' => 'required',
        'entry_year' => 'required',
        
    ]);
 $entry_year = $request->input('entry_year');        
 $aos = $request->input('aos');
         $programme =$request->input('programme');
        $department=$request->input('department');

          $variable = $request->input('matric_number');
          $surname = $request->input('surname');
          $name = $request->input('name');
          $other = $request->input('other');
          $f =Department::find($department);
          $faculty =$f->faculty_id;
    if($variable == null)
{
    $request->session()->flash('warning',"matric number is empty");
    return back();
}
        foreach ($variable as $key => $value) {
        if(!empty($value)) {
            $cc =strtoupper(str_ireplace(" ","",$value));

        $clean_list[$cc] =array('surname'=>$surname[$key],'name'=>$name[$key],'matric_number'=>$cc ,'other'=>$other[$key]);
        }
        }

 foreach($clean_list as $kk=>$vv ){
$students_mat[] = $vv['matric_number'];

}

$check =Student::whereIn('matric_number',$students_mat)->get();

if(count($check) > 0)
{
foreach ($check as $key => $value) {
    unset($clean_list[$value->matric_number]);
}
        
}

    if(count($clean_list) != 0)
    {
        
 foreach($clean_list as $k=>$v ){
    
$data[] =['surname' => $clean_list[$k]['surname'], 'matric_number' =>$clean_list[$k]['matric_number'],'name'=>$clean_list[$k]['name'],'other'=>$clean_list[$k]['other'],'programme_id'=>$programme,'department_id'=>$department,'faculty_id'=>$faculty,'entry_year'=>$entry_year,'aos_id'=>$aos];

}
DB::table('students')->insert($data);
$request->session()->flash('success',"course succesfull created.");

    }
 return redirect()->action('DoController@createstudents');   
}
//------------------------------ view course--------------------------------------

public function viewstudents()
{       $d =AssignOfficer::where('user_id',Auth::user()->id)->select('department_id')->distinct()->get();
       
        $p =Programme::get();
        return view('do.students.view')->withD($d)->withP($p);
    
}

//------------------------------ get view course--------------------------------------

public function view_students(Request $request)
{
    $request->validate([
        'programme' => 'required',
        'aos' => 'required',
        'department' => 'required',
        'entry_year' => 'required',
        
    ]);
 $entry_year = $request->input('entry_year');        
 $aos = $request->input('aos');
 $programme =$request->input('programme');
 $department=$request->input('department');

$d =AssignOfficer::where('user_id',Auth::user()->id)->select('department_id')->distinct()->get();
        $p =Programme::get();

    $c =Student::where([['department_id',$department],['programme_id',$programme],['aos_id',$aos],['entry_year',$entry_year]])->get();
        return view('do.students.view')->withD($d)->withP($p)->withC($c)->withEy($entry_year)->withDp($department)->withPg($programme)->withAo($aos);
}

//------------------------------ delete course--------------------------------------
public function delete_students(Request $request,$id)
{
Student::destroy($id);
$request->session()->flash('success',"course succesfull delete.");
return redirect(url()->previous());
}
//------------------------------ edit course--------------------------------------
public function edit_students($id)
{
$c = Student::find($id);
  $state =State::all(); 
return view('do.students.edit')->withC($c)->withSt($state);
}
//------------------------------ update course--------------------------------------
public function update_students(Request $request)
{
    $request->validate([
        'matric_number' => 'required',
        'surname' => 'required',
        'name' => 'required',
     ]);
    // check if another students is using the matric number
    $check =Student::where([['id','!=',$request->id],['matric_number',$request->matric_number]])->get()->count();
    if($check == 0)
    {
$c = Student::find($request->id);
$c->matric_number=$request->matric_number;
$c->surname=strtoupper($request->surname);
$c->name=strtoupper($request->name);
$c->other=strtoupper($request->other);
$c->state_of_origin=$request->matric_number;
$c->nationality=strtoupper($request->nationality);
$c->previous_institution_class=strtoupper($request->previous_institution_class);
$c->previous_institution_qualification=strtoupper($request->previous_institution_qualification);
$c->previous_institution_date=$request->previous_institution_date;
$c->previous_institution=strtoupper($request->previous_institution);
$c->save();
$request->session()->flash('success',"student succesfull updated.");
}else
{
    $request->session()->flash('warning',"student with matric number exist aready.");
}
return redirect($request->url);
}
// ---------------re_students_courses--------------
public function re_students_courses()
{ $d =AssignOfficer::where('user_id',Auth::user()->id)->select('department_id')->distinct()->get();
       
        $p =Programme::get();
    
     return view('do.students.re_students_courses')->withD($d)->withP($p);
}
// ---------------re_students_courses2--------------
public function re_students_courses2(Request $request)
{ 
     $request->validate([
        'programme' => 'required',
        'aos' => 'required',
        'department' => 'required',
        'entry_year' => 'required',
        'course_session' => 'required',
    ]);
      $entry_year = $request->input('entry_year');        
 $aos = $request->input('aos');
 $programme =$request->input('programme');
 $department=$request->input('department');
$session = $request->input('course_session'); 


    $s =Student::where([['department_id',$department],['programme_id',$programme],['aos_id',$aos],['entry_year',$entry_year]])->orderBy('matric_number','ASC')->get();
    $rc =RegisterCourse::where([['department_id',$department],['programme_id',$programme],['session',$session],['aos_id',$aos]])->get();
  
$d =AssignOfficer::where('user_id',Auth::user()->id)->select('department_id')->distinct()->get();
$p =Programme::get();
    
     return view('do.students.re_students_courses')->withD($d)->withP($p)->withS($s)->withRc($rc)->withA($aos)->withPg($programme)->withSs($session)->withDp($department)->withEy($entry_year);
}

// --------------------- post register students courses ----------------
public function re_students_courses3(Request $request)
{
     $entry_year = $request->input('entry_year');        
     $aos = $request->input('aos');
     $session = $request->input('session');
     $programme =$request->input('programme');
     $department=$request->input('department');
     $s_variable = $request->input('ids');
     $c_variable = $request->input('idc');
     $date=date("Y-m-d h:i:s");

    if($s_variable == null)
{
   $request->session()->flash('warning',"students is empty");
    return back();
}
    if($c_variable == null)
{
    $request->session()->flash('warning',"courses is empty");
    return back();
}
// get students in the id
$students =Student::whereIn('id',$s_variable)->get();

// get register courses

$rc =RegisterCourse::whereIn('id',$c_variable)->get();
foreach ($students as $key => $value) {
    # code...
    // check if you have register for the session
    $rs =RegisterStudent::where([['student_id',$value->id],['session',$session]])->first();

    if($rs == null)
    {
$rs_id = DB::table('register_students')->insertGetId(['student_id'=>$value->id,'session'=>$session]);
    }else
    {
$rs_id=$rs->id;
    }

    //check for courses that are register.
    foreach ($rc as $key => $vc) {
     $check =CourseReg::where([['student_id',$value->id],['course_id',$vc->course_id]])->first();
     if($check == null)
     {
        $data [] =['student_id'=>$value->id,'registerstudent_id'=>$rs_id,'department_id'=>$vc->department_id,'programme_id'=>$vc->programme_id,'aos_id'=>$vc->aos_id,'registercourse_id'=>$vc->id,'course_id'=>$vc->course_id,'title'=>$vc->title,'code'=>$vc->code,'unit'=>$vc->unit,'semester_id'=>$vc->semester_id,'status'=>$vc->status,'session'=>$session,'created_at'=>$date];
     }
    }
    

}

if(!empty($data))
{
    DB::table('course_regs')->insert($data);
}
$request->session()->flash('success',"course succesfull registered.");
return back();
}

//---------------- view register students -------------------------
public function view_students_courses()
{
    $d =AssignOfficer::where('user_id',Auth::user()->id)->select('department_id')->distinct()->get();
       
        $p =Programme::get();
    
     return view('do.students.view_students_courses')->withD($d)->withP($p);
}
//-----------------get register students --------------------------------------
public function view_students_courses2(Request $request)
{
$request->validate([
        'programme' => 'required',
        'aos' => 'required',
        'department' => 'required',
       'session' => 'required',
    ]);
          
$aos = $request->input('aos');
$programme =$request->input('programme');
$department=$request->input('department');
$session = $request->input('session'); 

$users = DB::table('students')
            ->join('register_students', 'students.id', '=', 'register_students.student_id')
            ->where('register_students.session',$session)
            ->where([['students.programme_id',$programme],['students.department_id',$department],['students.aos_id',$aos]])
            ->get();
  $d =AssignOfficer::where('user_id',Auth::user()->id)->select('department_id')->distinct()->get();
$p =Programme::get();
   
     return view('do.students.view_students_courses')->withD($d)->withP($p)->withU($users)->withA($aos)->withPg($programme)->withSs($session)->withDp($department);          
}

// -------------- remove reistra8tion -------------
public function remove_registration(Request $request,$id,$session,$p,$d,$a,$y=null)
{
  if($y != 1)
{
session()->put('url',url()->previous());
return view('do.students.confirm_remove_registration');
}
RegisterStudent::where([['student_id',$id],['session',$session]])->delete();

$course =CourseReg::where([['student_id',$id],['session',$session],['programme_id',$p],['department_id',$d],['aos_id',$a]])->get();
if(count($course) > 0)
{
foreach ($course as $key => $value) {
  $data [] =$value->id;
}
$del_course =CourseReg::destroy($data);

// result
$result =StudentResult::whereIn('coursereg_id',$data)->get();
if(count($result) > 0)
{
  foreach ($result as $kr => $vr) {
  $dat_r [] =$vr->id;
}
$del_result =StudentResult::destroy($dat_r);
}

}


$request->session()->flash('success',"successfull.");
return redirect(session()->get('url'));

}

//------------------- enter result ---------------------------
public function enter_result(Request $request,$id)
{
  $cr =CourseReg::where('student_id',$id)->orderBy('semester_id','ASC')->get()->groupBy('session');

   return view('do.students.enter_result')->withCr($cr)->withSt($id); 
}

  public function insert_result(Request $request)
    {
  
       $student_id =$request->input('student_id');
        $date = date("Y-m-d H:i:s");
       $id =$request->input('id');
$result_id="";

        foreach ($id as $key => $value) {
        $coursereg_id =$request->input('coursereg_id')[$value];
      $course_id =$request->input('course_id')[$value];
        $unit =$request->input('unit')[$value];
        $session=$request->input('session')[$value];
        $semester =$request->input('semester_id')[$value];
       $grade=$request->input('grade')[$value];
      $result_id =$request->input('result_id')[$value];
      $grade =strtoupper($grade);



         if(!empty($result_id))
         {
$update = StudentResult::find($result_id);
           $update->grade = $grade;
           $update->save();
         }else{
 $check_result = StudentResult::where([['student_id',$student_id],['session', $session], ['course_id', $course_id], ['coursereg_id', $coursereg_id]])->get();
                    if (count($check_result) == 0) {
$insert_data[] = ['student_id'=>$student_id,'course_id'=>$course_id,'coursereg_id'=>$coursereg_id,'grade'=>$grade,'unit'=>$unit,'session'=>$session,'semester_id'=>$semester,'status'=>0,'user_id'=>Auth::user()->id,'created_at'=>$date];
      }

        }
      }
        //dd($insert_data);
if(isset($insert_data))
        {
        if(count($insert_data) > 0)
        {
         DB::table('student_results')->insert($insert_data);
        }
    }
  
        $request->session()->flash('success',"SUCCESSFULL.");
         return back();
        //return redirect($url);
    }

    //============================= report ============================================
    public function report()
    {

$d =AssignOfficer::where('user_id',Auth::user()->id)->select('department_id')->distinct()->get();
$p =Programme::get();
    return view('do.report.index')->withD($d)->withP($p);
    }

    // report url
    public function postreport(Request $request)
    {

      $request->validate([
        'programme' => 'required',
        'aos' => 'required',
        'department' => 'required',
       'session' => 'required',
       'type' => 'required',
    ]);
   $a = $request->input('aos');
$p =$request->input('programme');
$d=$request->input('department');
$s = $request->input('session'); 
$t = $request->input('type');   
    
  $fac =Department::find($d);
  $f =$fac->faculty_id; 
  $users = $this->getRegisteredStudents($p,$d,$f,$a,$s);
  //dd($users);
if($t == 2) 
  {
    return view('do.report.display_individual_report')->withDp($d)->withFc($f)->withPr($p)->withA($a)->withS($s)->withU($users);

  }  
$regcourse1C =$this->getRegisteredCourses($p,$d,$a,$s,1);
$regcourse2C =$this->getRegisteredCourses($p,$d,$a,$s,2);

$reg2c = array();
$regc1 = array();
$course_id1 = array();
$course_id2 = array();
$no1C = count($regcourse1C);
$no2C = count($regcourse2C);

foreach ($regcourse1C as $key => $value) {
$regc1 [] =$value;
$course_id1 [] =$value->course_id;
}

foreach ($regcourse2C as $key => $value) {
$reg2c [] =$value;
$course_id2 [] =$value->course_id;
}

  if($p == 1)
  {
    

  }

return view('do.report.display_report')->withDp($d)->withFc($f)->withPr($p)->withA($a)->withS($s)->withRegc1($regc1)->withRegc2($reg2c)->withU($users)->withC1($course_id1)->withC2($course_id2)->withN1c($no1C)->withN2c($no2C);

    }

    //---------------------------- comprehensive paper --------------------------------
public function c_paper()
{$d =Department::all();
  return view('do.students.paper')->withD($d); 
}

public function c_paper1(Request $request)
{$d =Department::all();
  $department_id =$request->department;
  $aos_id =$request->aos;
  $session =$request->session;
  $users = DB::table('students')
  ->where([['programme_id',3],['department_id',$department_id],['aos_id',$aos_id],['entry_year',$session]])
            ->orderBy('matric_number','ASC')
            ->select('students.*')
            ->get();
          
  return view('do.students.paper')->withD($d)->withU($users)->withDp($department_id)->withA($aos_id)->withS($session); 
} 

//-------------------------------- enter_c_paper--------------------------------
public function enter_c_paper($id)
{
  $cresult =CStudentResult::where('student_id',$id)->first();
return view('do.students.paper2')->withD($id)->withCr($cresult);
}  
//--------------------------- post_enter_c_paper ----------------------------
public function post_enter_c_paper(Request $request)
{
  $paper1 =strtoupper($request->paper1);
  $paper2 =strtoupper($request->paper2) ;
  $paper3 =strtoupper($request->paper3);
  $id=$request->id;

  $check = CStudentResult::where('student_id',$id)->first();
  if($check == null)
  {
  $p =new CStudentResult;
  $p->student_id=$id;
  $p->grade1 =$paper1;
  $p->grade2 =$paper2;
  $p->grade3 =$paper3;
  $p->user_id =Auth::user()->id;
  $p->save();
}else
{
   $check->grade1 =$paper1;
  $check->grade2 =$paper2;
  $check->grade3 =$paper3;
  $check->user_id =Auth::user()->id;
  $check->save();
}
 $request->session()->flash('success',"SUCCESSFULL.");
         return back();
}
    //----------------------------------generate_individual_report -------------------------
    public function generate_individual_report(Request $request)
    {
          $request->validate(['id' => 'required',]);
          $id =$request->id;
          $student =Student::find($id);
          $CourseReg =CourseReg::select('id','session','course_id','student_id','code','semester_id','is_waved')->having('student_id',$id)->orderBy('session','ASC')->orderBy('code','ASC')->get()->groupBy('session');
          $check = CStudentResult::where('student_id',$id)->first();
 return view('do.report.generate_individual_report')->withS($student)->withCr($CourseReg)->withCp($check);

    }
//============================= function ===========================

public function getassignaos($id)
{
     $d =AssignOfficer::where([['department_id',$id],['user_id',Auth::user()->id]])->select('aos_id')->distinct()->get();
     foreach ($d as $key => $value) {
         $v[]=[$value->aos_id];
     }
     $aos =Aos::whereIn('id',$v)->get();
      return response()->json($aos);
       
}

// ------------------------------      custom methods---------------------------------------------------
 public function getRegisteredCourses($p,$d,$a,$s,$sm)
 {
   $reg =RegisterCourse::where([['programme_id',$p],['department_id',$d],['aos_id',$a],['session',$s],['semester_id',$sm]])->orderBy('code','ASC')->get();
   return $reg;
 }
 //---------------------------------------------------------------------------------------
// get registered students
  public function getRegisteredStudents($p,$d,$f,$a,$s)
 {
 $users = DB::table('students')
            ->join('register_students', 'students.id', '=', 'register_students.student_id')
            ->where([['students.programme_id',$p],['students.department_id',$d],['students.faculty_id',$f],['students.aos_id',$a],['register_students.session',$s]])
             ->orderBy('students.matric_number','ASC')
            ->distinct()            
            ->select('students.*')
            ->get();
   
   return $users;
 }
}
