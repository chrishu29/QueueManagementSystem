
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Tenth navbar example">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('home') }}"><img src="/assets/QMSLogo.jpg" style="width:30px;height:30px;"> Queue Management System</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('catHome') }}">Take Queue</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('monitoringPage') }}">Monitor Queue</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
