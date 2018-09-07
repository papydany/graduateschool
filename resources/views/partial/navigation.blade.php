 <!-- header-->
    <header class="header">
      <!-- top bar-->
      <div class="top-bar d-none d-md-block">
        <div class="container">
          <div class="row">       
            
            <div class="col-sm-12 text-center">
              <h4>University Of Calabar Graduate School<br/>
              Transcript Portal </h4>
            </div>
          </div>
        </div>
      </div>
      <!-- navbar-->
      <nav class="navbar navbar-expand-lg" style="padding: 0px !important;">
       
        <div class="container"><a href="{{url('/')}}" class="navbar-brand">
          <img src="img/logo.png">
        </a>
          <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right mt-0"><span></span><span></span><span></span></button>
          <div id="navbarSupportedContent" class="collapse navbar-collapse">
            <div class="navbar-nav ml-auto">
              <div class="nav-item"><a href="{{url('/')}}" class="nav-link active">Home <span class="sr-only">(current)</span></a></div>
              <!-- multi-level dropdown-->
              <div class="nav-item dropdown"><a id="navbarDropdownMenuLink" href="http://example.com/" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link">Transcript <i class="fa fa-angle-down"></i></a>
                <ul aria-labelledby="navbarDropdownMenuLink" class="dropdown-menu">
                  <li><a href="{{url('guide')}}" class="dropdown-item nav-link">Applicant Guide</a></li>
                  <li><a href="{{url('application')}}" class="dropdown-item nav-link">Apply</a></li>
                  <li><a href="{{url('track_transcript')}}" class="dropdown-item nav-link">Track Transcript</a></li>
             
                </ul>
              </div>
              <div class="nav-item"><a href="#" class="nav-link">Contact Us</a></div>
             
              
            
            </div>
          </div>
        </div>
      </nav>
    </header>