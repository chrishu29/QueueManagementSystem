@extends('layouts.adminMain')
@section('Title', 'QMS Queue Tracking')
@section('container')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" id="reports">
<h1 class="mt-5">Queue Tracking</h1>
<form action="{{ route('reportOnDate') }}" method="get" id="dateForm">
<p>Select Date : <input type="text" id="datepicker" name="datepicker"> <button type="submit" id ="searchByDate" style="background : none; border : none;"><span data-feather="search" class="align-text-bottom"></span></button></p>
</form>
<table class="table" id ="report_header">
  <td>
    <p>Created By : {{ Auth::user()->name }}</p>
    <p>Date & Time : {{ now()->format('d-F-Y') }}</p>
  </td>
  <td>---------------------------------------------------</td>
  <td style="text-align:right">
    @if(Auth::user()->role == '0')
      <p>Position : Admin</p>
    @elseif(Auth::user()->role == '1')
      <p>Position : Employee</p>
    @elseif(Auth::user()->role == '2')
      <p>Position : Supervisor</p>
    @endif
    <p>No : Daily/{{ Auth::user()->id }}/{{ Auth::user()->role }}/{{ now()->format('dmY') }}/{{ Auth::user()->role }}</p>
  </td>
</table>
<!-- <p>Build in Date : <input type="date"></p> -->
    <table class="table" id="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Cases</th>
          @foreach($categoriess as $nyan)
          <th scope="col" style="text-align: center;">{{ $nyan->QName }}</th>
          @endforeach
        </tr>
      </thead>
      <tbody>
            <tr>
            <th scope="row">1</th>
            <td>Total Queue</td>
            @if($totalCats == 1)
            <td style="text-align: center;">{{ $tot1 }}</td>
            @elseif($totalCats == 2)
            <td style="text-align: center;">{{ $tot1 }}</td>
            <td style="text-align: center;">{{ $tot2 }}</td>
            @elseif($totalCats == 3)
            <td style="text-align: center;">{{ $tot1 }}</td>
            <td style="text-align: center;">{{ $tot2 }}</td>
            <td style="text-align: center;">{{ $tot3 }}</td>
            @elseif($totalCats == 4)
            <td style="text-align: center;">{{ $tot1 }}</td>
            <td style="text-align: center;">{{ $tot2 }}</td>
            <td style="text-align: center;">{{ $tot3 }}</td>
            <td style="text-align: center;">{{ $tot4 }}</td>
            @elseif($totalCats == 5)
            <td style="text-align: center;">{{ $tot1 }}</td>
            <td style="text-align: center;">{{ $tot2 }}</td>
            <td style="text-align: center;">{{ $tot3 }}</td>
            <td style="text-align: center;">{{ $tot4 }}</td>
            <td style="text-align: center;">{{ $tot5 }}</td>
            @endif
            </tr>

            <tr>
            <th scope="row">2</th>
            <td>Skipped Queue</td>
            @if($totalCats == 1)
            <td style="text-align: center;">{{ $skip1 }}</td>
            @elseif($totalCats == 2)
            <td style="text-align: center;">{{ $skip1 }}</td>
            <td style="text-align: center;">{{ $skip2 }}</td>
            @elseif($totalCats == 3)
            <td style="text-align: center;">{{ $skip1 }}</td>
            <td style="text-align: center;">{{ $skip2 }}</td>
            <td style="text-align: center;">{{ $skip3 }}</td>
            @elseif($totalCats == 4)
            <td style="text-align: center;">{{ $skip1 }}</td>
            <td style="text-align: center;">{{ $skip2 }}</td>
            <td style="text-align: center;">{{ $skip3 }}</td>
            <td style="text-align: center;">{{ $skip4 }}</td>
            @elseif($totalCats == 5)
            <td style="text-align: center;">{{ $skip1 }}</td>
            <td style="text-align: center;">{{ $skip2 }}</td>
            <td style="text-align: center;">{{ $skip3 }}</td>
            <td style="text-align: center;">{{ $skip4 }}</td>
            <td style="text-align: center;">{{ $skip5 }}</td>
            @endif
            </tr>

            <tr>
            <th scope="row">3</th>
            <td>Queue Finished</td>
            @if($totalCats == 1)
            <td style="text-align: center;">{{ $done1 }}</td>
            @elseif($totalCats == 2)
            <td style="text-align: center;">{{ $done1 }}</td>
            <td style="text-align: center;">{{ $done2 }}</td>
            @elseif($totalCats == 3)
            <td style="text-align: center;">{{ $done1 }}</td>
            <td style="text-align: center;">{{ $done2 }}</td>
            <td style="text-align: center;">{{ $done3 }}</td>
            @elseif($totalCats == 4)
            <td style="text-align: center;">{{ $done1 }}</td>
            <td style="text-align: center;">{{ $done2 }}</td>
            <td style="text-align: center;">{{ $done3 }}</td>
            <td style="text-align: center;">{{ $done4 }}</td>
            @elseif($totalCats == 5)
            <td style="text-align: center;">{{ $done1 }}</td>
            <td style="text-align: center;">{{ $done2 }}</td>
            <td style="text-align: center;">{{ $done3 }}</td>
            <td style="text-align: center;">{{ $done4 }}</td>
            <td style="text-align: center;">{{ $done5 }}</td>
            @endif
            </tr>

            <tr>
            <th scope="row">4</th>
            <td>Average Wait Time</td>
            @if($totalCats == 1)
            <td style="text-align: center;">{{ $avg1 }} Minutes</td>
            @elseif($totalCats == 2)
            <td style="text-align: center;">{{ $avg1 }} Minutes</td>
            <td style="text-align: center;">{{ $avg2 }} Minutes</td>
            @elseif($totalCats == 3)
            <td style="text-align: center;">{{ $avg1 }} Minutes</td>
            <td style="text-align: center;">{{ $avg2 }} Minutes</td>
            <td style="text-align: center;">{{ $avg3 }} Minutes</td>
            @elseif($totalCats == 4)
            <td style="text-align: center;">{{ $avg1 }} Minutes</td>
            <td style="text-align: center;">{{ $avg2 }} Minutes</td>
            <td style="text-align: center;">{{ $avg3 }} Minutes</td>
            <td style="text-align: center;">{{ $avg4 }} Minutes</td>
            @elseif($totalCats == 5)
            <td style="text-align: center;">{{ $avg1 }} Minutes</td>
            <td style="text-align: center;">{{ $avg2 }} Minutes</td>
            <td style="text-align: center;">{{ $avg3 }} Minutes</td>
            <td style="text-align: center;">{{ $avg4 }} Minutes</td>
            <td style="text-align: center;">{{ $avg5 }} Minutes</td>
            @endif
            </tr>

            <tr>
            <th scope="row">5</th>
            <td>Fastest Wait Time</td>
            @if($totalCats == 1)
            <td style="text-align: center;">{{ $fast1 }} Minutes</td>
            @elseif($totalCats == 2)
            <td style="text-align: center;">{{ $fast1 }} Minutes</td>
            <td style="text-align: center;">{{ $fast2 }} Minutes</td>
            @elseif($totalCats == 3)
            <td style="text-align: center;">{{ $fast1 }} Minutes</td>
            <td style="text-align: center;">{{ $fast2 }} Minutes</td>
            <td style="text-align: center;">{{ $fast3 }} Minutes</td>
            @elseif($totalCats == 4)
            <td style="text-align: center;">{{ $fast1 }} Minutes</td>
            <td style="text-align: center;">{{ $fast2 }} Minutes</td>
            <td style="text-align: center;">{{ $fast3 }} Minutes</td>
            <td style="text-align: center;">{{ $fast4 }} Minutes</td>
            @elseif($totalCats == 5)
            <td style="text-align: center;">{{ $fast1 }} Minutes</td>
            <td style="text-align: center;">{{ $fast2 }} Minutes</td>
            <td style="text-align: center;">{{ $fast3 }} Minutes</td>
            <td style="text-align: center;">{{ $fast4 }} Minutes</td>
            <td style="text-align: center;">{{ $fast5 }} Minutes</td>
            @endif
            </tr>

            <tr>
            <th scope="row">6</th>
            <td>Longest Wait Time</td>
            @if($totalCats == 1)
            <td style="text-align: center;">{{ $long1 }} Minutes</td>
            @elseif($totalCats == 2)
            <td style="text-align: center;">{{ $long1 }} Minutes</td>
            <td style="text-align: center;">{{ $long2 }} Minutes</td>
            @elseif($totalCats == 3)
            <td style="text-align: center;">{{ $long1 }} Minutes</td>
            <td style="text-align: center;">{{ $long2 }} Minutes</td>
            <td style="text-align: center;">{{ $long3 }} Minutes</td>
            @elseif($totalCats == 4)
            <td style="text-align: center;">{{ $long1 }} Minutes</td>
            <td style="text-align: center;">{{ $long2 }} Minutes</td>
            <td style="text-align: center;">{{ $long3 }} Minutes</td>
            <td style="text-align: center;">{{ $long4 }} Minutes</td>
            @elseif($totalCats == 5)
            <td style="text-align: center;">{{ $long1 }} Minutes</td>
            <td style="text-align: center;">{{ $long2 }} Minutes</td>
            <td style="text-align: center;">{{ $long3 }} Minutes</td>
            <td style="text-align: center;">{{ $long4 }} Minutes</td>
            <td style="text-align: center;">{{ $long5 }} Minutes</td>
            @endif
            </tr>
      </tbody>
    </table>
    
    <br>  
    <br>
    <div class="handledCaseByEmployee">
      <h3>Handling Time by Employee</h3>
      <div class="row"><div class="col" style="border-style: ridge; text-align: center;"><b>Name (Handle Category)</b></div><div class="col" style="border-style: ridge; text-align: center;"><b>Handle Time</b></div></div>
      <div class="row">
        <div class="col">
          @foreach($employeeData as $employee)
          <div class="row" style="border-style: ridge;  display: flex; justify-content: center;">
            {{ $employee->name }} ({{ $employee->QName }})
          </div>
          @endforeach
        </div>

        <div class="col">
          @foreach($eHandleTime as $handleTime)
            <div class="row" style="border-style: ridge; display: flex; justify-content: center;">
              {{ $handleTime }} Minutes
            </div>
          @endforeach
        </div>
      </div>
    </div>
    <br>  

    <div class="overallStatistics">
      <br>
      <table class="table">
        <h3>All Time Statistics</h3>
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Cases</th>
            @foreach($categoriess as $nyan)
            <th scope="col" style="text-align: center;">{{ $nyan->QName }}</th>
            @endforeach
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Fastest Queue Time</td>
            @if($totalCats == 1)
            <td style="text-align: center;">{{ $overFast1 }} Minutes</td>
            @elseif($totalCats == 2)
            <td style="text-align: center;">{{ $overFast1 }} Minutes</td>
            <td style="text-align: center;">{{ $overFast2 }} Minutes</td>
            @elseif($totalCats == 3)
            <td style="text-align: center;">{{ $overFast1 }} Minutes</td>
            <td style="text-align: center;">{{ $overFast2 }} Minutes</td>
            <td style="text-align: center;">{{ $overFast3 }} Minutes</td>
            @elseif($totalCats == 4)
            <td style="text-align: center;">{{ $overFast1 }} Minutes</td>
            <td style="text-align: center;">{{ $overFast2 }} Minutes</td>
            <td style="text-align: center;">{{ $overFast3 }} Minutes</td>
            <td style="text-align: center;">{{ $overFast4 }} Minutes</td>
            @elseif($totalCats == 5)
            <td style="text-align: center;">{{ $overFast1 }} Minutes</td>
            <td style="text-align: center;">{{ $overFast2 }} Minutes</td>
            <td style="text-align: center;">{{ $overFast3 }} Minutes</td>
            <td style="text-align: center;">{{ $overFast4 }} Minutes</td>
            <td style="text-align: center;">{{ $overFast5 }} Minutes</td>
            @endif
          </tr>
          
          <tr>
            <th scope="row">2</th>
            <td>Longest Queue Time</td>
            @if($totalCats == 1)
            <td style="text-align: center;">{{ $overLong1 }} Minutes</td>
            @elseif($totalCats == 2)
            <td style="text-align: center;">{{ $overLong1 }} Minutes</td>
            <td style="text-align: center;">{{ $overLong2 }} Minutes</td>
            @elseif($totalCats == 3)
            <td style="text-align: center;">{{ $overLong1 }} Minutes</td>
            <td style="text-align: center;">{{ $overLong2 }} Minutes</td>
            <td style="text-align: center;">{{ $overLong3 }} Minutes</td>
            @elseif($totalCats == 4)
            <td style="text-align: center;">{{ $overLong1 }} Minutes</td>
            <td style="text-align: center;">{{ $overLong2 }} Minutes</td>
            <td style="text-align: center;">{{ $overLong3 }} Minutes</td>
            <td style="text-align: center;">{{ $overLong4 }} Minutes</td>
            @elseif($totalCats == 5)
            <td style="text-align: center;">{{ $overLong1 }} Minutes</td>
            <td style="text-align: center;">{{ $overLong2 }} Minutes</td>
            <td style="text-align: center;">{{ $overLong3 }} Minutes</td>
            <td style="text-align: center;">{{ $overLong4 }} Minutes</td>
            <td style="text-align: center;">{{ $overLong5 }} Minutes</td>
            @endif
            </tr>
            
            <tr>
            <th scope="row">3</th>
            <td>Average Queue Time</td>
            @if($totalCats == 1)
            <td style="text-align: center;">{{ $overAvg1 }} Minutes</td>
            @elseif($totalCats == 2)
            <td style="text-align: center;">{{ $overAvg1 }} Minutes</td>
            <td style="text-align: center;">{{ $overAvg2 }} Minutes</td>
            @elseif($totalCats == 3)
            <td style="text-align: center;">{{ $overAvg1 }} Minutes</td>
            <td style="text-align: center;">{{ $overAvg2 }} Minutes</td>
            <td style="text-align: center;">{{ $overAvg3 }} Minutes</td>
            @elseif($totalCats == 4)
            <td style="text-align: center;">{{ $overAvg1 }} Minutes</td>
            <td style="text-align: center;">{{ $overAvg2 }} Minutes</td>
            <td style="text-align: center;">{{ $overAvg3 }} Minutes</td>
            <td style="text-align: center;">{{ $overAvg4 }} Minutes</td>
            @elseif($totalCats == 5)
            <td style="text-align: center;">{{ $overAvg1 }} Minutes</td>
            <td style="text-align: center;">{{ $overAvg2 }} Minutes</td>
            <td style="text-align: center;">{{ $overAvg3 }} Minutes</td>
            <td style="text-align: center;">{{ $overAvg4 }} Minutes</td>
            <td style="text-align: center;">{{ $overAvg5 }} Minutes</td>
            @endif
            </tr>
        </tbody>
      </table>
      <div class="row">
        <div class="col">
          <b>Average Wait Time</b> : {{ $avgQ }} Minutes
        </div>
        <div class="col">
          <b>Fastest Queue Time</b> : {{ $fastQ }} Minutes
        </div>
        <div class="col">
          <b>Longest Queue Time</b> : {{ $longQ }} Minutes
        </div>
      </div>
    <br>
    </div>

    <div class="createReport">
      <button onclick="print_current_page()" target="_blank()" class="btn btn-primary" id="printBtn"><i class="fa-solid fa-print"></i> Print Report</button>
    </div>

    <script>
      var selectedDate;
      $(function(){
        $('#datepicker').datepicker({
          dateFormat: 'yy-mm-dd'
        }); // add this to show current date .datepicker("setDate",'now')
      })

      function print_current_page(){
        window.print();
      }
    </script>
</main>

@endsection