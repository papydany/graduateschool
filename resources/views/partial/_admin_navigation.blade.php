 @inject('R','App\General')
 <?php $role =$R->getrolename(Auth::user()->id) ?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{route('backend')}}">GRADUATE SCHOOL.(UNIVERSITY OF CALABAR )</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="{{route('backend')}}">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        @if($role == "superadmin")
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="{{route('faculty')}}">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Faculty</span>
          </a>
        </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="{{route('department')}}">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Department</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Area Of Specialization</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="{{route('aos')}}">Create</a>
            </li>
            <li>
              <a href="{{route('view_aos')}}">View</a>
            </li>
          </ul>
        </li>
      
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="{{route('sub_admin')}}">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Admin</span>
          </a>
        </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components12">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Components12" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Assign Officer</span>
          </a>
          <ul class="sidenav-second-level collapse" id="Components12">
            <li>
              <a href="{{route('assignofficer')}}">Create</a>
            </li>
            <li>
              <a href="{{route('view_assignofficer')}}">View</a>
            </li>
          </ul>
        </li>
      
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Components" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Setup</span>
          </a>
          <ul class="sidenav-second-level collapse" id="Components">
            <li>
              <a href="{{route('price')}}">Price</a>
            </li>
            
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Report</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="login.html">Login Page</a>
            </li>
            <li>
              <a href="register.html">Registration Page</a>
            </li>
            <li>
              <a href="forgot-password.html">Forgot Password Page</a>
            </li>
            <li>
              <a href="blank.html">Blank Page</a>
            </li>
          </ul>
        </li>
      
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="{{route('adminstatus')}}">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Admin Status</span>
          </a>
        </li>
        @elseif($role=="do")
  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#c" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Course</span>
          </a>
          <ul class="sidenav-second-level collapse" id="c">
            <li>
              <a href="{{route('createcourse')}}">Create Course</a>
            </li>
            <li>
              <a href="{{route('viewcourse')}}">view Course</a>
            </li>
            <li>
              <a href="{{route('registercourses')}}">Register Course</a>
            </li>
            <li>
              <a href="{{route('viewregistercourses')}}">view Course</a>
            </li>
           
          </ul>
        </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#cs" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Student</span>
          </a>
          <ul class="sidenav-second-level collapse" id="cs">
            <li>
              <a href="{{route('createstudents')}}">Create </a>
            </li>
            <li>
              <a href="{{route('viewstudents')}}">view</a>
            </li>
            <li>
              <a href="{{route('re_students_courses')}}">Register Students Courses </a>
            </li>
            <li>
              <a href="{{route('view_students_courses')}}">View Register Students Courses</a>
            </li>
            <li>
              <a href="{{route('waved_couese')}}">Set waved Courses</a>
            </li>
            <li>
              <a href="{{route('c_paper')}}">Comprehensive Paper</a>
            </li>
            
          </ul>
        </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="{{url('report')}}">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Report</span>
          </a>
        </li>
       
        @endif

      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
     
       
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>