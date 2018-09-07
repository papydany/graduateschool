<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>@yield('title')</title>

<!-- Bootstrap Core CSS -->
  <link href="{{URL::to('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">


</head>

<body>
   <table  class="table table-bordered">
                      <tr>
                      	  <td>
                            <div class="row">
                      	  	
                      	  	<div class="col-sm-8 offset-sm-2">
                             <p class="text-center" style="font-size:18px; font-weight:700;">

                                UNIVERSITY OF CALABAR,CALABAR </br>
                                <span style="font-style: Serif"> SCHOOL Of POSTGRADUATE STUDIES</span><br/>
                                <img src="{{asset('img/logo.png')}}" class="responsive">
                            </p>
                            <p class="text-center">POSTGRADUATE STUDENTS ACADEMIC RECORD AND TRANSCRIPT</p></div>

                          </div>
    
                             
                             
                          </td>
                       </tr>
                     
                  </table>	

@yield('content')

</body>

</html>