<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ route('spvDashboard') }}">
              <span data-feather="home" class="align-text-bottom"></span>
              Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('SEdit') }}">
              <span data-feather="users" class="align-text-bottom"></span>
              Edit Employee
            </a>
            <a class="nav-link" href="{{ route('TrackingSpv') }}">
              <span data-feather="file" class="align-text-bottom"></span>
              Queue Tracking
            </a>
            <a class="nav-link" href="{{ route('SProfile') }}">
              <span data-feather="user" class="align-text-bottom"></span>
              Profile
            </a>
          </li>
        </ul>
      </div>
    </nav>