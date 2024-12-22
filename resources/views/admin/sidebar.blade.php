<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{url('admin/dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Webinar</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{url('create_webinar')}}">
              <i class="bi bi-circle"></i><span>Create Webinar</span>
            </a>
          </li>
          <li>
            <a href="{{url('view_webinar')}}">
              <i class="bi bi-circle"></i><span>List of Webinar</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{url('user_list')}}">
              <i class="bi bi-circle"></i><span>Users list</span>
            </a>
          </li>
          <li>
            <a href="{{url('create_user')}}">
              <i class="bi bi-circle"></i><span>Create User</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Webinar Register</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li> 
            <a href="{{url('web_list')}}">
              <i class="bi bi-circle"></i><span>Webinar Registration List</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Master Settings</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url('admin/settings') }}">
              <i class="bi bi-circle"></i><span>Logo Management</span>
            </a>
          </li>
          <li>
            <a href="charts-apexcharts.html">
              <i class="bi bi-circle"></i><span>Payment Gateway</span>
            </a>
          </li>
          <li>
            <a href="{{url('view_email')}}">
              <i class="bi bi-circle"></i><span>SMS/Email Verification</span>
            </a>
          </li>
        </ul>
      </li><!-- End Charts Nav -->

      <li class="nav-item">
        <a class="nav-link " href="{{url('view_category')}}">
          
        <i class="bi bi-menu-button-wide"></i> <span>Category</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="{{url('view_category')}}">
          
        <i class="bi bi-bootstrap-reboot"></i></i> <span>Role</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="{{url('view_category')}}">
          
        <i class="bi bi-clipboard2-check-fill"></i> <span>Permission</span>
        </a>
      </li>


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gem"></i><span>Address</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{url('admin/countries')}}">
              <i class="bi bi-circle"></i><span>Country</span>
            </a>
          </li>
          <li>
            <a href="{{url('admin/state')}}">
              <i class="bi bi-circle"></i><span>State</span>
            </a>
          </li>
          <li>
            <a href="{{url('admin/city')}}">
              <i class="bi bi-circle"></i><span>City</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->

      
    </ul>
   

        </aside>