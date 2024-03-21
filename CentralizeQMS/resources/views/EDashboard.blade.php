@extends('layouts.employeeMain')
@section('Title', 'QMS Employee')
@section('container')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4t">
  <h1>Welcome, {{ Auth::user()->name }}</h1>
  <h3 class="py-4">Queue List</h1>
    <div class="row" id="QContent">
      <!-- Current Q -->
      <div class="col">
          @if(Auth::user()->Assign_Category == 1 )
        <div class="card">
          <div class="card-header">
            Current Queue {{ $NKocheng }}
          </div>
          <div class="card-body">
            <center>
            <h5 class="card-title">{{ $antrian }}</h5>
                    @if($antrian == '0')
                    <a href="#" class="btn btn-primary disabled">Skip</a>
                    <a href="#" class="btn btn-primary disabled">Done</a>
                    @else
                    <a href="{{ route('skipAction',$NKocheng) }}" class="btn btn-primary">Skip</a>
                    <a href="{{ route('doneAction',$NKocheng) }}" class="btn btn-primary">Done</a>
                    @endif
            </center>
          </div>
        </div>
      <br>
          @elseif(Auth::user()->Assign_Category == 2 )
        <div class="card">
          <div class="card-header">
            Current Queue {{ $NKocheng2 }}
          </div>
          <div class="card-body">
            <center>
            <h5 class="card-title">{{ $antrian2 }}</h5>
                    @if($antrian2 == '0')
                    <a href="#" class="btn btn-primary disabled">Skip</a>
                    <a href="#" class="btn btn-primary disabled">Done</a>
                    @else
                    <a href="{{ route('skipAction',$NKocheng2) }}" class="btn btn-primary">Skip</a>
                    <a href="{{ route('doneAction',$NKocheng2) }}" class="btn btn-primary">Done</a>
                    @endif
            </center>
          </div>
        </div>
      <br>
          @elseif(Auth::user()->Assign_Category == 3 )
        <div class="card">
          <div class="card-header">
            Current Queue {{ $NKocheng3 }}
          </div>
          <div class="card-body">
            <center>
            <h5 class="card-title">{{ $antrian3 }}</h5>
                    @if($antrian3 == '0')
                    <a href="#" class="btn btn-primary disabled">Skip</a>
                    <a href="#" class="btn btn-primary disabled">Done</a>
                    @else
                    <a href="{{ route('skipAction',$NKocheng3) }}" class="btn btn-primary">Skip</a>
                    <a href="{{ route('doneAction',$NKocheng3) }}" class="btn btn-primary">Done</a>
                    @endif
            </center>
          </div>
        </div>
        <br>
        @elseif(Auth::user()->Assign_Category == 4 )
        <div class="card">
          <div class="card-header">
            Current Queue {{ $NKocheng4 }}
          </div>
          <div class="card-body">
            <center>
            <h5 class="card-title">{{ $antrian4 }}</h5>
                    @if($antrian4 == '0')
                    <a href="#" class="btn btn-primary disabled">Skip</a>
                    <a href="#" class="btn btn-primary disabled">Done</a>
                    @else
                    <a href="{{ route('skipAction',$NKocheng4) }}" class="btn btn-primary">Skip</a>
                    <a href="{{ route('doneAction',$NKocheng4) }}" class="btn btn-primary">Done</a>
                    @endif
            </center>
          </div>
        </div>
        <br>
        @elseif(Auth::user()->Assign_Category == 5 )
        <div class="card">
          <div class="card-header">
            Current Queue {{ $NKocheng5 }}
          </div>
          <div class="card-body">
            <center>
            <h5 class="card-title">{{ $antrian5 }}</h5>
                    @if($antrian5 == '0')
                    <a href="#" class="btn btn-primary disabled">Skip</a>
                    <a href="#" class="btn btn-primary disabled">Done</a>
                    @else
                    <a href="{{ route('skipAction',$NKocheng5) }}" class="btn btn-primary">Skip</a>
                    <a href="{{ route('doneAction',$NKocheng5) }}" class="btn btn-primary">Done</a>
                    @endif
            </center>
          </div>
        </div>
        @endif
      </div>

      <!-- Skipped Queue -->
      <div class="col">
        <div class="card">
          <div class="card-header">
            Skipped Queue List
          </div>
          <div class="card-body">
            <center>
              @if(Auth::user()->Assign_Category == 1 )
                @if($skiped->isEmpty())
                  <h5 class="card-title">No Skipped Queue</h5>
                @else
                  @foreach($skiped as $skipped)
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title">{{ $type }}-{{ $skipped->queue }}</h5>
                    </div>
                    <div class="col">
                      <a href="{{ route('callAction',$NKocheng) }}" class="btn btn-primary">Next</a>
                    </div>
                  </div>
                  <br>
                  @endforeach
                @endif
            
            @elseif(Auth::user()->Assign_Category == 2 )
              @if($skiped2->isEmpty())
                <h5 class="card-title">No Skipped Queue</h5>
              @else
                @foreach($skiped2 as $skipped2)
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title">{{ $type2 }}-{{ $skipped2->queue }}</h5>
                    </div>
                    <div class="col">
                      <a href="{{ route('callAction',$NKocheng2) }}" class="btn btn-primary">Next</a>
                    </div>
                  </div>
                  <br>
                @endforeach
              @endif

            @elseif(Auth::user()->Assign_Category == 3 )
              @if($skiped3->isEmpty())
                <h5 class="card-title">No Skipped Queue</h5>
              @else
                @foreach($skiped3 as $skipped3)
                <div class="row">
                  <div class="col">
                    <h5 class="card-title">{{ $type3 }}-{{ $skipped3->queue }}</h5>
                  </div>
                  <div class="col">
                      <a href="{{ route('callAction',$NKocheng3) }}" class="btn btn-primary">Next</a>
                  </div>
                </div>
                <br>
                @endforeach
              @endif

            @elseif(Auth::user()->Assign_Category == 4 )
              @if($skiped4->isEmpty())
                <h5 class="card-title">No Skipped Queue</h5>
              @else
                @foreach($skiped4 as $skipped4)
                <div class="row">
                  <div class="col">
                    <h5 class="card-title">{{ $type4 }}-{{ $skipped4->queue }}</h5>
                  </div>
                  <div class="col">
                      <a href="{{ route('callAction',$NKocheng4) }}" class="btn btn-primary">Next</a>
                  </div>
                </div>
                <br>
                @endforeach
              @endif

            @elseif(Auth::user()->Assign_Category == 5 )
              @if($skiped5->isEmpty())
                <h5 class="card-title">No Skipped Queue</h5>
              @else
                @foreach($skiped5 as $skipped5)
                <div class="row">
                  <div class="col">
                    <h5 class="card-title">{{ $type5 }}-{{ $skipped5->queue }}</h5>
                  </div>
                  <div class="col">
                      <a href="{{ route('callAction',$NKocheng5) }}" class="btn btn-primary">Next</a>
                  </div>
                </div>
                <br>
                @endforeach
              @endif
            @endif
            </center>
          </div>
        </div>
</main>
@endsection