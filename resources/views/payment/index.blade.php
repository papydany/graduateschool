@extends('layouts.home')
@section('title','Application')
@section('content')
<section>
      <div class="container">
        <nav aria-label="breadcrumb" role="navigation">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li aria-current="page" class="breadcrumb-item active">Payment</li>
          </ol>
        </nav>
        <div class="row">
          <div class="col-xl-8 text-content" style="min-height: 200px;">

	
	
		<table class="table table-bordered table-striped">
			<tr>
		<th><b>Name</b>&nbsp;</th>
				<td>{{$tc->surname.' '.$tc->name.' '.$tc->other}}</td>
		</tr>
		<tr>
		<th><b>Amount</b>&nbsp;</th><td>N{{number_format($tc->amount)}}</td>
	</tr>
			</table>
		<form >
			<script src="https://js.paystack.co/v1/inline.js"></script>
			<input type="hidden" value="{{$tc->email}}" id="email"/>
			<input type="hidden" value="{{$tc->phone}}" id="phone"/>
			<input type="hidden" value="{{$tc->amount * 100}}" id="amount"/>
			<input type="hidden" value="{{$tc->tranx_id}}" id="ref"/>
			<input type="hidden" value="{{$tc->surname}}" id="lastname"/>
			<input type="hidden" value="{{$tc->name.' '.$tc->other}}" id="firstname"/>
			<button type="button" onclick="payWithPaystack()" class="btn btn-success"> Pay </button>
		</form>




	</div>
	</div>
	</div>

</section>
@endsection
@section('script')
	<script>

function payWithPaystack(){
		
			var email =document.getElementById('email').value;
			var amount =document.getElementById('amount').value;
			var ref =document.getElementById('ref').value;
			var phone =document.getElementById('phone').value;
			var lastname =document.getElementById('lastname').value;
			var firstname =document.getElementById('firstname').value;
			var handler = PaystackPop.setup({
				key: 'pk_test_fe2585f14f5eb8e5dc4396e753eb2c8b0ffbe938',
				email: email,
				amount: amount,
				ref: ref,
				firstname: firstname,
                lastname: lastname,
				metadata: {
					custom_fields: [
						{
							display_name: "Mobile Number",
							variable_name: "mobile_number",
							value: phone
						}
					]
				},
				callback: function(response){
			
					var c ="/verify/"+response.reference;
					window.location =c;
//var lc ="/"
					//window.location =lc;
					//alert('success. transaction ref is ' + response.reference);
				},
				onClose: function(){
					alert('window closed');
				}
			});
			handler.openIframe();
		}
	</script>
@endsection