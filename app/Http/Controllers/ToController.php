<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transcript;
use App\Student;
use App\CourseReg;
use Illuminate\Support\Collection;
use PDF;
class ToController extends Controller
{
   public function __construct()
     {
        $this->middleware('auth');
    }


    public function index()
    {
    	$ts =Transcript::where([['status',0],['payment_status',1]])->orderBy('created_at','DESC')->paginate(200);
    	if(count($ts) == 0)
    	{
    		$ts ='';
    	}
    	return view('to.applicant.index')->withTs($ts);

    }

    public function more_detail($id)
    {
     
$ts =Transcript::where([['id',$id],['payment_status',1]])->first();
    	if($ts == null)
    	{
    		$ts ='';
    	}
    	return view('to.applicant.detail')->withTs($ts);

    }

     public function treated(Request $request,$id)
    {
    	$ts =Transcript::where([['id',$id],['payment_status',1]])->first();
    	$ts->status = 1;
    	$ts->save();

    	$request->session()->flash('success', 'Applicant successfuly Treated!');
    	return redirect()->action('ToController@index');  
    }

    public function treated_applicant()
    {
    	$ta =Transcript::where([['status',1],['payment_status',1]])->orderBy('created_at','ASC')->paginate(2);
    	if(count($ta) == 0)
    	{
    		$ta ='';
    	}
    	return view('to.applicant.treated')->withTa($ta);

    }

    public function treated_detail($id)
    {
$ts =Transcript::where([['id',$id],['payment_status',1]])->first();
    	if($ts == null)
    	{
    		$ts ='';
    	}
    	return view('to.applicant.treated_detail')->withTs($ts);

    }

    //======== generate_transcript =====

    public function generate_transcript(Request $request,$id)
    {
        $ts =Transcript::where([['id',$id],['payment_status',1]])->first();

        if($ts != null){
        $student =Student::where('matric_number',$ts->matric_number)->first();

        if($student != null)
        {
$CourseReg =CourseReg::where('student_id',$student->id)->get();
foreach ($CourseReg as $key => $value) {
   $course_id[] =$value->course_id;
}
$year = CourseReg::where([['student_id',$student->id],['is_waved','!=',1]])->orderBy('session','DESC')->first();
        }else
        {

        }
    }
   

$data =['ts'=>$ts,'s'=>$student,'c'=>$CourseReg,'ys'=>$year,'cid'=>$course_id];

    $pdf = PDF::loadview('to.applicant.generated_transcript',$data);
      return $pdf->stream('generated_transcript.pdf');
    }
}
