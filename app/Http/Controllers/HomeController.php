<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Programme;
use App\Faculty;
use App\Department;
use App\Aos;
use App\Price;
use App\Transcript;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function index()
    {
        return view('home');
    }
// ---------------- application -------
    public function application()
    {
        $p =Programme::get();
        $f =Faculty::get();
        return view('home.application')->withP($p)->withF($f);
    }

// ---------------------preview_application------------------------
    public function preview_application(Request $request)
    {
$surname =strtoupper($request->surname);
$name =strtoupper($request->name);
$othername =strtoupper($request->othername);
$matric_number =$request->matric_number;
$email =$request->email;
$phone =$request->phone;
$permanet_address =$request->permanet_address;
$programme =$request->programme;
$faculty =$request->faculty;
$department =$request->department;
$aos =$request->aos;
$entry_year =$request->entry_year;
$gender =$request->gender;
if(isset($request->old))
{
$dob =$request->dob;
}else
{
  $birthday_year=$request->birthday_year;
$month =$request->month;
$day =$request->day;
$dob =$day.'-'.$month.'-'.$birthday_year;
}

$destinaion_name =$request->destinaion_name;
$destinaion_city =$request->destinaion_city;
$destinaion_state =$request->destinaion_state;
$destinaion_country =$request->destinaion_country;
$transcript_email =$request->transcript_email;
$destinaion =$request->destinaion;
$price =Price::first();
return view('home.preview_application')->withSn($surname)->withNa($name)->withOn($othername)->withMn($matric_number)->withEm($email)->withPh($phone)->withP($programme)->withF($faculty)->withD($department)->withA($aos)->withEy($entry_year)->withGe($gender)->withDob($dob)->withDes($destinaion)->withAmount($price)->withTe($transcript_email)->withPa($permanet_address)->withDn($destinaion_name)->withDc($destinaion_city)->withDs($destinaion_state)->withDco($destinaion_country);
    }

   public function old_application(Request $request)
    {
    $t = Transcript::where('matric_number',$request->matric_number)->oldest()->first();
    if($t == null)
    {
      $request->session()->flash('warning', 'Please check your matric number.');

      return back();
    }
        return view('home.old_application')->withT($t);
    
    }   
//---------------------- function -------------------------------
    // get department
    public function getdepart($id)
    {
  $d =Department::where('faculty_id',$id)->get();
    return response()->json($d);
    }

    // get aos
public function getaos($id)
{
     $aos =Aos::where('department_id',$id)->get();
      return response()->json($aos);
       
}
public function track_transcript()
{
  return view('home.track');
}

public function post_track_transcript(Request $request)
{

    $t =Transcript::where([['matric_number',$request->matric_number],['payment_status',1]])->orderBy('id','ASC')->get();
   
    if(count($t) == 0)
    {
      $request->session()->flash('warning', 'Please check your matric number.');

      return back();
    }
  return view('home.track')->withT($t);
}
public function guide()
{
  return view('home.guide');
}
}
