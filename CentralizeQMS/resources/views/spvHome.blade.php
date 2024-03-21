@extends('layouts.supervisorMain')
@section('Title', 'QMS Supervisor')
@section('container')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 QContent">
  <h3>Welcome, {{ Auth::user()->name }}</h3>
  <br>
    <div class="row" id="QContent">
      <!-- Current Q -->
    <div class="col">
        @if($catsTotal == 1)
        <div class="row">
            <div class="card col">
                <div class="card-header">
                    Current {{ $NKocheng }}
                </div>
                <div class="card-body">
                    <center>
                    <h5 class="card-title">{{ $antrian }}</h5>
                    @if($antrian == '0')
                    <a href="#" class="btn btn-primary disabled">Skip</a>
                    <a href="#" class="btn btn-primary disabled">Done</a>
                    @else
                    <a href="{{ route('spvSkipAction',$NKocheng) }}" class="btn btn-primary">Skip</a>
                    <a href="{{ route('spvDoneAction',$NKocheng) }}" class="btn btn-primary">Done</a>
                    @endif
                    </center>
                </div>
            </div>
        </div>
        @elseif($catsTotal == 2)
        <div class="row">
            <div class="card col">
                <div class="card-header">
                    Current {{ $NKocheng }}
                </div>
                <div class="card-body">
                    <center>
                    <h5 class="card-title">{{ $antrian }}</h5>
                    @if($antrian == '0')
                    <a href="#" class="btn btn-primary disabled">Skip</a>
                    <a href="#" class="btn btn-primary disabled">Done</a>
                    @else
                    <a href="{{ route('spvSkipAction',$NKocheng) }}" class="btn btn-primary">Skip</a>
                    <a href="{{ route('spvDoneAction',$NKocheng) }}" class="btn btn-primary">Done</a>
                    @endif
                    </center>
                </div>
            </div>
            <div class="card col">
                <div class="card-header">
                    Current {{ $NKocheng2 }}
                </div>
                <div class="card-body">
                    <center>
                    <h5 class="card-title">{{ $antrian2 }}</h5>
                    @if($antrian2 == '0')
                    <a href="#" class="btn btn-primary disabled">Skip</a>
                    <a href="#" class="btn btn-primary disabled">Done</a>
                    @else
                    <a href="{{ route('spvSkipAction',$NKocheng2) }}" class="btn btn-primary">Skip</a>
                    <a href="{{ route('spvDoneAction',$NKocheng2) }}" class="btn btn-primary">Done</a>
                    @endif
                    </center>
                </div>
            </div>
        </div>
        @elseif($catsTotal == 3)
        <div class="row">
            <div class="card col mx-1">
                <div class="card-header">
                    Current {{ $NKocheng }}
                </div>
                <div class="card-body">
                    <center>
                    <h5 class="card-title">{{ $antrian }}</h5>
                    @if($antrian == '0')
                    <a href="#" class="btn btn-primary disabled">Skip</a>
                    <a href="#" class="btn btn-primary disabled">Done</a>
                    @else
                    <a href="{{ route('spvSkipAction',$NKocheng) }}" class="btn btn-primary">Skip</a>
                    <a href="{{ route('spvDoneAction',$NKocheng) }}" class="btn btn-primary">Done</a>
                    @endif
                    </center>
                </div>
            </div>
            <div class="card col">
                <div class="card-header">
                    Current {{ $NKocheng2 }}
                </div>
                <div class="card-body">
                    <center>
                    <h5 class="card-title">{{ $antrian2 }}</h5>
                    @if($antrian2 == '0')
                    <a href="#" class="btn btn-primary disabled">Skip</a>
                    <a href="#" class="btn btn-primary disabled">Done</a>
                    @else
                    <a href="{{ route('spvSkipAction',$NKocheng2) }}" class="btn btn-primary">Skip</a>
                    <a href="{{ route('spvDoneAction',$NKocheng2) }}" class="btn btn-primary">Done</a>
                    @endif
                    </center>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
        <div class="card col">
                <div class="card-header">
                    Current {{ $NKocheng3 }}
                </div>
                <div class="card-body">
                    <center>
                    <h5 class="card-title">{{ $antrian3 }}</h5>
                    @if($antrian3 == '0')
                    <a href="#" class="btn btn-primary disabled">Skip</a>
                    <a href="#" class="btn btn-primary disabled">Done</a>
                    @else
                    <a href="{{ route('spvSkipAction',$NKocheng3) }}" class="btn btn-primary">Skip</a>
                    <a href="{{ route('spvDoneAction',$NKocheng3) }}" class="btn btn-primary">Done</a>
                    @endif
                    </center>
                </div>
            </div>
        </div>
        @elseif($catsTotal == 4)
        <div class="row">
            <div class="card col mx-1">
                <div class="card-header">
                    Current {{ $NKocheng }}
                </div>
                <div class="card-body">
                    <center>
                    <h5 class="card-title">{{ $antrian }}</h5>
                    @if($antrian == '0')
                    <a href="#" class="btn btn-primary disabled">Skip</a>
                    <a href="#" class="btn btn-primary disabled">Done</a>
                    @else
                    <a href="{{ route('spvSkipAction',$NKocheng) }}" class="btn btn-primary">Skip</a>
                    <a href="{{ route('spvDoneAction',$NKocheng) }}" class="btn btn-primary">Done</a>
                    @endif
                    </center>
                </div>
            </div>
            <div class="card col">
                <div class="card-header">
                    Current {{ $NKocheng2 }}
                </div>
                <div class="card-body">
                    <center>
                    <h5 class="card-title">{{ $antrian2 }}</h5>
                    @if($antrian2 == '0')
                    <a href="#" class="btn btn-primary disabled">Skip</a>
                    <a href="#" class="btn btn-primary disabled">Done</a>
                    @else
                    <a href="{{ route('spvSkipAction',$NKocheng2) }}" class="btn btn-primary">Skip</a>
                    <a href="{{ route('spvDoneAction',$NKocheng2) }}" class="btn btn-primary">Done</a>
                    @endif
                    </center>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
        <div class="card col mx-1">
                <div class="card-header">
                    Current {{ $NKocheng3 }}
                </div>
                <div class="card-body">
                    <center>
                    <h5 class="card-title">{{ $antrian3 }}</h5>
                    @if($antrian3 == '0')
                    <a href="#" class="btn btn-primary disabled">Skip</a>
                    <a href="#" class="btn btn-primary disabled">Done</a>
                    @else
                    <a href="{{ route('spvSkipAction',$NKocheng3) }}" class="btn btn-primary">Skip</a>
                    <a href="{{ route('spvDoneAction',$NKocheng3) }}" class="btn btn-primary">Done</a>
                    @endif
                    </center>
                </div>
            </div>
            <div class="card col">
                <div class="card-header">
                    Current {{ $NKocheng4 }}
                </div>
                <div class="card-body">
                    <center>
                    <h5 class="card-title">{{ $antrian4 }}</h5>
                    @if($antrian4 == '0')
                    <a href="#" class="btn btn-primary disabled">Skip</a>
                    <a href="#" class="btn btn-primary disabled">Done</a>
                    @else
                    <a href="{{ route('spvSkipAction',$NKocheng4) }}" class="btn btn-primary">Skip</a>
                    <a href="{{ route('spvDoneAction',$NKocheng4) }}" class="btn btn-primary">Done</a>
                    @endif
                    </center>
                </div>
            </div>
        </div>
        @elseif($catsTotal == 5)
        <div class="row">
            <div class="card col mx-1">
                <div class="card-header">
                    Current {{ $NKocheng }}
                </div>
                <div class="card-body">
                    <center>
                    <h5 class="card-title">{{ $antrian }}</h5>
                    @if($antrian == '0')
                    <a href="#" class="btn btn-primary disabled">Skip</a>
                    <a href="#" class="btn btn-primary disabled">Done</a>
                    @else
                    <a href="{{ route('spvSkipAction',$NKocheng) }}" class="btn btn-primary">Skip</a>
                    <a href="{{ route('spvDoneAction',$NKocheng) }}" class="btn btn-primary">Done</a>
                    @endif
                    </center>
                </div>
            </div>
                <br>
            <div class="card col">
                <div class="card-header">
                    Current {{ $NKocheng2 }}
                </div>
                <div class="card-body">
                    <center>
                    <h5 class="card-title">{{ $antrian2 }}</h5>
                    @if($antrian2 == '0')
                    <a href="#" class="btn btn-primary disabled">Skip</a>
                    <a href="#" class="btn btn-primary disabled">Done</a>
                    @else
                    <a href="{{ route('spvSkipAction',$NKocheng2) }}" class="btn btn-primary">Skip</a>
                    <a href="{{ route('spvDoneAction',$NKocheng2) }}" class="btn btn-primary">Done</a>
                    @endif
                    </center>
                </div>
            </div>
            </div>
            <br>
        <div class="row">
            <div class="card col mx-1">
                <div class="card-header">
                    Current {{ $NKocheng3 }}
                </div>
                <div class="card-body">
                    <center>
                    <h5 class="card-title">{{ $antrian3 }}</h5>
                    @if($antrian3 == '0')
                    <a href="#" class="btn btn-primary disabled">Skip</a>
                    <a href="#" class="btn btn-primary disabled">Done</a>
                    @else
                    <a href="{{ route('spvSkipAction',$NKocheng3) }}" class="btn btn-primary">Skip</a>
                    <a href="{{ route('spvDoneAction',$NKocheng3) }}" class="btn btn-primary">Done</a>
                    @endif
                    </center>
                </div>
            </div>
                <br>
            <div class="card col">
                <div class="card-header">
                    Current {{ $NKocheng4 }}
                </div>
                <div class="card-body">
                    <center>
                    <h5 class="card-title">{{ $antrian4 }}</h5>
                    @if($antrian4 == '0')
                    <a href="#" class="btn btn-primary disabled">Skip</a>
                    <a href="#" class="btn btn-primary disabled">Done</a>
                    @else
                    <a href="{{ route('spvSkipAction',$NKocheng4) }}" class="btn btn-primary">Skip</a>
                    <a href="{{ route('spvDoneAction',$NKocheng4) }}" class="btn btn-primary">Done</a>
                    @endif
                    </center>
                </div>
            </div>
        </div>
            <br>
        <div class="row">
            <div class="card">
                <div class="card-header">
                    Current {{ $NKocheng5 }}
                </div>
                <div class="card-body">
                    <center>
                    <h5 class="card-title">{{ $antrian5 }}</h5>
                    @if($antrian5 == '0')
                    <a href="#" class="btn btn-primary disabled">Skip</a>
                    <a href="#" class="btn btn-primary disabled">Done</a>
                    @else
                    <a href="{{ route('spvSkipAction',$NKocheng5) }}" class="btn btn-primary">Skip</a>
                    <a href="{{ route('spvDoneAction',$NKocheng5) }}" class="btn btn-primary">Done</a>
                    @endif
                    </center>
                </div>
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
                @if($skiped->isEmpty() && $skiped2->isEmpty() && $skiped3->isEmpty() && $skiped4->isEmpty() && $skiped5->isEmpty())
                  <h5 class="card-title">No Skipped Queue</h5>
                @else
                  @foreach($skiped as $skipped)
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title">{{ $type }}-{{ $skipped->queue }}</h5>
                    </div>
                    <div class="col">
                      <a href="{{ route('spvCallAction',$NKocheng) }}" class="btn btn-primary">Next</a>
                    </div>
                  </div>
                  <br>
                  @endforeach
            
                @foreach($skiped2 as $skipped2)
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title">{{ $type2 }}-{{ $skipped2->queue }}</h5>
                    </div>
                    <div class="col">
                      <a href="{{ route('spvCallAction',$NKocheng2) }}" class="btn btn-primary">Next</a>
                    </div>
                  </div>
                  <br>
                @endforeach

                @foreach($skiped3 as $skipped3)
                <div class="row">
                  <div class="col">
                    <h5 class="card-title">{{ $type3 }}-{{ $skipped3->queue }}</h5>
                  </div>
                  <div class="col">
                      <a href="{{ route('spvCallAction',$NKocheng3) }}" class="btn btn-primary">Next</a>
                  </div>
                </div>
                <br>
                @endforeach
                
                @foreach($skiped4 as $skipped4)
                <div class="row">
                  <div class="col">
                    <h5 class="card-title">{{ $type4 }}-{{ $skipped4->queue }}</h5>
                  </div>
                  <div class="col">
                      <a href="{{ route('spvCallAction',$NKocheng4) }}" class="btn btn-primary">Next</a>
                  </div>
                </div>
                <br>
                @endforeach

                @foreach($skiped5 as $skipped5)
                <div class="row">
                  <div class="col">
                    <h5 class="card-title">{{ $type5 }}-{{ $skipped5->queue }}</h5>
                  </div>
                  <div class="col">
                      <a href="{{ route('spvCallAction',$NKocheng5) }}" class="btn btn-primary">Next</a>
                  </div>
                </div>
                <br>
                @endforeach
              @endif
            </center>
        </div>
    </div>
    </div>

    <script>
        setInterval(function () {
          $( "#QContent" ).load(window.location.href + " #QContent" ); //Don't disregard the space within the load element selector: + " #here"
        },5000);
    </script>
</main>

@endsection