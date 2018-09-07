<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transcript;

class PaymentController extends Controller
{
        public function index(Request $request)
    {    
   $ref =time();
  
$t = new Transcript;

$t->surname =strtoupper($request->surname);
$t->name =strtoupper($request->name);
$t->other =strtoupper($request->othername);
$t->matric_number =$request->matric_number;
$t->email =$request->email;
$t->phone =$request->phone;
$t->programme_id =$request->programme;
$t->faculty_id =$request->faculty;
$t->department_id =$request->department;
$t->aos_id =$request->aos;
$t->entry_year =$request->entry_year;
$t->gender =$request->gender;
$t->dob =$request->dob;
$t->transcrip_address =$request->destination;
$t->tranx_id =$ref;
$t->payment_status = 0;
$t->amount =$request->amount;
$t->status =0;
$t->permanet_address =$request->permanet_address;
$t->transcript_email=$request->transcript_email;
$t->destinaion_name =$request->destinaion_name;
$t->destinaion_city=$request->destinaion_city;
$t->destinaion_state =$request->destinaion_state;
$t->destinaion_country=$request->destinaion_country;
$t->save();
$tc =Transcript::find($t->id);

return view('payment.index')->withTc($tc);
        
    }

    public function verify(Request $request,$reference)
{

$result = array();
//The parameter after verify/ is the transaction reference to be verified
$url = 'https://api.paystack.co/transaction/verify/'.$reference;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt(
  $ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer SECRET_KEY']
);
$req = curl_exec($ch);
curl_close($ch);

if ($req) {
    $result = json_decode($req, true);
    
    //if($result){
      //if($result['data']){
        //something came in
        //if($result['data']['status'] == 'success'){
     
        
            $tc =Transcript::where('tranx_id',$reference)->first();
       
       $tc->payment_status = 1;

       $tc->save();
       $request->session()->flash('success',"Transaction was successful.");
       /* }else{
          // the transaction was not successful, do not deliver value'
          // print_r($result);  //uncomment this line to inspect the result, to check why it failed.
          echo "Transaction was not successful: Last gateway response was: ".$result['data']['gateway_response'];
           $tc =Transcript::where('tranx_id',$reference);
       
       $tc->payment_status = 0;

       $tc->save();
        }
      }else{
        echo $result['message'];
      }

    }else{
      //print_r($result);
      die("Something went wrong while trying to convert the request variable to json. Uncomment the print_r command to see what is in the result variable.");
    }*/
  }else{
   // var_dump($request);
  
    die("Something went wrong while executing curl. Uncomment the var_dump line above this line to see what the issue is. Please check your CURL command to make sure everything is ok");
  }	
return redirect('payment_status');

        
}

public function status()
{
	return view('payment.status');
}
}
