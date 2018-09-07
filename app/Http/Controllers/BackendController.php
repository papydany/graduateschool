<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faculty;
use App\Department;
use App\Aos;
use App\Role;
use App\User;
use App\Price;
use App\AssignOfficer;
use App\Transcript;
use DB;
class BackendController extends Controller
{
    Const Sp =1;
    Const Do =2;
    Const Active =1;
    Const Pending =0;
    Const Treated  =1;
     public function __construct()
    {
        $this->middleware('auth');
    }

     public function index()
    {
$ts =Transcript::where([['status',self::Pending],['payment_status',1]])->count();
$ta =Transcript::where([['status',self::Treated],['payment_status',1]])->count();
        return view('backend.index')->withTs($ts)->withTa($ta);
    }
//=============================== Faculty ========================
     public function faculty()
    {
        $check =Faculty::orderBy('name','ASC')->get();
        if(count($check) == 0)
        {
        $check ='';	
        }
        //dd($check);
        return view('backend.faculty.index')->withF($check);
    }
//------------------- post faculty --------------------------
     public function postfaculty(Request $request)
    {
    	$name=strtoupper($request->name);
    	$check =Faculty::where('name',$name)->get()->count();
    	if($check == 0)
    	{
$fac = New Faculty;
$fac->name =$name;
$fac->save();
$request->session()->flash('success', 'Faculty was successfuly Created!');

    	}
    	else
    	{
$request->session()->flash('warning', 'Faculty created already');
    	}

 return redirect()->action('BackendController@faculty');   	
       // return view('backend.faculty.index');
    }
//----------------------- edit faculty ----------------------------------------------
public function edit_faculty($id)
{
	$fac =Faculty::find($id);
	return view('backend.faculty.edit')->withF($fac);
}

//------------------------- update faculty --------------------------------------------
public function update_faculty(Request $request)
{
	$id =$request->id;
	$name=strtoupper($request->name);
	$fac =Faculty::find($id);
	$fac->name =$name;
	$fac->save();
	$request->session()->flash('success', 'Faculty was successfuly Created!');
 return redirect()->action('BackendController@faculty');   	
 
}

//================================= Department ========================================

 public function department()
    {
    	$fac = Faculty::orderBy('name','ASC')->get();
        $check =Department::orderBy('name','ASC')->get();
        if(count($check) == 0)
        {
        $check ='';	
        }
        return view('backend.department.index')->withD($check)->withF($fac);
    }
//------------------- post department --------------------------
     public function postdepartment(Request $request)
    {
    	$name=strtoupper($request->name);
    	$fac_id=$request->faculty_id;
    	$check =Department::where([['name',$name],['faculty_id',$fac_id]])->get()->count();
    	if($check == 0)
    	{
$d = New Department;
$d->name =$name;
$d->faculty_id =$fac_id;
$d->save();
$request->session()->flash('success', 'Department was successfuly Created!');

    	}
    	else
    	{
$request->session()->flash('warning', 'Department created already');
    	}

 return redirect()->action('BackendController@department');   	
     
    }
//----------------------- edit department ----------------------------------------------
public function edit_department($id)
{
	$d =Department::find($id);
	return view('backend.department.edit')->withD($d);
}

//------------------------- update department --------------------------------------------
public function update_department(Request $request)
{
	$id =$request->id;
	$name=strtoupper($request->name);
	$d =Department::find($id);
	$d->name =$name;
	$d->save();
	$request->session()->flash('success', 'Department was successfuly Created!');
 return redirect()->action('BackendController@department');   	
 
}

//================================= AOS ========================================

 public function aos()
    {
    	$fac = Faculty::orderBy('name','ASC')->get();
        return view('backend.aos.index')->withF($fac);
    }
//------------------- post department --------------------------
     public function postaos(Request $request)
    {
    	$name=ucwords($request->name);
    	$department_id=$request->department_id;
    	$check =Aos::where([['name',$name],['department_id',$department_id]])->get()->count();
    	if($check == 0)
    	{
$a = New Aos;
$a->name =$name;
$a->department_id =$department_id;
$a->save();
$request->session()->flash('success', 'Aos was successfuly Created!');

    	}
    	else
    	{
$request->session()->flash('warning', 'Aos created already');
    	}

 return redirect()->action('BackendController@aos');   	
     
    }
    //----------------------view aos -------------------------
    public function view_aos()
    {
    $d =Department::orderBy('name','asc')->get();
    return view('backend.aos.view')->withD($d);
    }
//----------------------- edit aos ----------------------------------------------
public function edit_aos($id)
{
	$a =Aos::find($id);
	return view('backend.aos.edit')->withA($a);
}

//------------------------- update aos --------------------------------------------
public function update_aos(Request $request)
{
	$id =$request->id;
	$name=ucwords($request->name);
	$a =Aos::find($id);
	$a->name =$name;
	$a->save();
	$request->session()->flash('success', 'Aos was successfuly Created!');
 return redirect()->action('BackendController@view_aos');   	
 
}
//------------------------get department ----------------------

 public function getDepartment($id)
    {
  $d =Department::where('faculty_id',$id)->get();
    return response()->json($d);
    }
//=============================== sub admin ========================
     public function sub_admin()
    {
            $user=DB::table('users')
            ->join('user_roles', 'users.id', '=', 'user_roles.user_id')
            ->where('user_roles.role_id','!=',self::Sp)
            ->where('users.status',self::Active)
            ->orderBy('name','ASC')
            ->get();
   
        if(count($user) == 0)
        {
        $user =''; 
        }
        $role =Role::where('id','!=',self::Sp)->get();
        
        return view('backend.subadmin.index')->withU($user)->withR($role);
    }
//------------------- post sub_admin --------------------------
     public function post_sub_admin(Request $request)
    {
        $request->validate([
        'email' => 'required|string|email|max:255|unique:users',
        'name' => 'required',
        'phone' => 'required',
        'role' => 'required',
    ]);
 

        $u =New User;
        $u->name =$request->name;
        $u->email =$request->email;
        $u->password =bcrypt($request->password);
        $u->phone = $request->phone;
        $u->word = $request->password;
        $u->status = 1;
        $u->save();
        $user_role =DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' =>$request->role]);
       
$request->session()->flash('success', 'sub admin was successfuly Created!');
 return redirect()->action('BackendController@sub_admin');    
   
    }
//----------------------- edit sub_admin ----------------------------------------------
public function edit_sub_admin($id)
{$role =Role::where('id','!=',self::Sp)->get();
    $u =User::find($id);

    return view('backend.subadmin.edit')->withU($u)->withR($role);
}

//------------------------- update sub_admin --------------------------------------------
public function update_sub_admin(Request $request)
{//dd($request->role);
    $id =$request->id;
    $name=strtoupper($request->name);
    $phone =$request->phone;
    $u =user::find($id);
    $u->name =$name;
    $u->phone =$phone;
    $u->save(); 
    $user_role =DB::table('user_roles')->where('user_id', $id)->update(['role_id'=>$request->role]);
    $request->session()->flash('success', 'sub admin was successfuly Created!');
 return redirect()->action('BackendController@sub_admin');    
 
}

public function adminstatus()
{
   $user=DB::table('users')
            ->join('user_roles', 'users.id', '=', 'user_roles.user_id')
            ->where('user_roles.role_id','!=',self::Sp)
            ->orderBy('name','ASC')
            ->get();
   
        if(count($user) == 0)
        {
        $user =''; 
        }

    return view('backend.subadmin.status')->withU($user);     
}

public function editright_sub_admin(Request $request,$id)
{
$u =User::find($id);
$u->editright =20;
$u->save();
 $request->session()->flash('success', 'edit right was successfuly Created!');
 return redirect()->action('BackendController@adminstatus');
}

public function activate_sub_admin(Request $request,$id)
{
$u =User::find($id);
$u->status =1;
$u->save();
 $request->session()->flash('success', 'Activation was successfuly Created!');
 return redirect()->action('BackendController@adminstatus');
}

public function deactivate_sub_admin(Request $request,$id)
{
$u =User::find($id);
$u->status =0;
$u->save();
 $request->session()->flash('success', 'Deactivation was successfuly Created!');
 return redirect()->action('BackendController@adminstatus');
}
//============================= price =========================================

     public function price()
    {
    $p=Price::first();
    return view('backend.price.index')->withP($p);
    }
//------------------- post price --------------------------
     public function post_price(Request $request)
    {
        $request->validate(['name' => 'required',]);
        $pp=Price::first();
        if(count($pp) == 0)
        {
        $p =New Price;
        $p->name =$request->name;
       $p->save();   
   }else
   {
    $pp->name =$request->name;
    $pp->save();  
   }
$request->session()->flash('success', 'Price was successfuly Created!');
 return redirect()->action('BackendController@price');    
   
    }

// =========================== assignofficer ==========================
    public function assignofficer()
    {$fac = Faculty::orderBy('name','ASC')->get();
       $user=DB::table('users')
            ->join('user_roles', 'users.id', '=', 'user_roles.user_id')
            ->where('user_roles.role_id',self::Do)
            ->where('users.status',self::Active)
            ->orderBy('name','ASC')
            ->get();

        if(count($user) == 0)
        {
        $user =''; 
        }

         return view('backend.assignofficer.index')->withF($fac)->withU($user);
    }

    //poost
       public function post_assignofficer(Request $request)
    {
        $request->validate([
        'faculty_id' => 'required',
        'department_id' => 'required',
        'aos_id' => 'required',
        'user_id' => 'required',
    ]);

        $user_id =$request->user_id;
        $aos =$request->aos_id;
        $faculty_id =$request->faculty_id;
        $department_id =$request->department_id;
        foreach ($aos as $key => $value) {
     $check=AssignOfficer::where([['user_id',$user_id],['faculty_id',$faculty_id],['department_id',$department_id],['aos_id',$value]])->first();
           if($check == null)
           {
            $data [] =['user_id'=>$user_id,'faculty_id'=>$faculty_id,'department_id'=>$department_id,'aos_id'=>$value];
           }
        }

        if(!empty($data))
        {
DB::table('assign_officers')->insert($data);
$request->session()->flash('success', 'Assign Officer was successfuly Created!');
        }else
        {
            $request->session()->flash('waring', 'records not inserted. please check if you have not assign officers to the AOS.');
        }
       
     return redirect()->action('BackendController@assignofficer');  
    }

    // view
    public function view_assignofficer()
    {
     $ao=AssignOfficer::orderBy('department_id','ASC')->get();

         return view('backend.assignofficer.view')->withU($ao);
    }
    // view
    public function remove_ao(Request $request,$id)
    {
     $ao=AssignOfficer::destroy($id);
$request->session()->flash('success', 'successfuly remove!');
 return redirect()->action('BackendController@view_assignofficer'); 
    }
    //------------------------get fos ----------------------

 public function getFos($id)
    {
  $d =Aos::where('department_id',$id)->get();
    return response()->json($d);
    }
}