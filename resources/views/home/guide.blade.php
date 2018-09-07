@extends('layouts.home')
@section('title','Preview Application')
@section('content')
<section>
      <div class="container">
        <nav aria-label="breadcrumb" role="navigation">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li aria-current="page" class="breadcrumb-item active">Applicant Guide</li>
          </ol>
        </nav>
        <div class="row">
        	<div class="col-sm-8">

<p>To make a transcript request, simply click on the 'proceed' button below. Fill in your details as required on the form.  provide a valid email address. to enable us send you status alerts of your application.</p>

<p>Upon your first visit to the platform, you must fill in the form providing your personal details, contact information and Matriculation number .
However, if you have visited the platform previously, and have successfully requested and PAID for a transcript, you must skip the process of filling the form and simply enter your matriculation number in the field provided at the bottom of the page.</p>
<p>You are expected to provide shipping details about the transcript you are requesting as follows: The name of the Institution or Organization that the transcript is to be sent to as well as its full address including City, State, ZIP/Postcode (for foreign addresses), Country, and Continent. Please note that the address you enter is the address that the courier will deliver your transcript to, therefore ensure that you are as detailed and accurate as possible. Also provide the destination email address for advance softcopy to be send while the hard copy will be send later.
</p>
<p>
You can pay with any ATM card you have (VISA, INTERSWITCH or MASTERCARD) as long as that card has been enabled for web transactions. Please confirm from your bank that your card is enabled for web transactions.
</p>

<p>After successful payment, you may wish to print your payment receipt.
After payment, you can monitor the progress of the processing of your transcript by logging on to the portal with the details sent to your email address. As soon as your transcript is picked up by your selected courier, you will then be provided with the tracking number of your transcript. This will help you monitor it between the time it is picked up by a courier and when it is reaches its final destination.
</p>
<a href="{{url('application')}}" class="btn btn-primary">Proceed</a>
</div>
</div>
</div>
</section>
@endsection