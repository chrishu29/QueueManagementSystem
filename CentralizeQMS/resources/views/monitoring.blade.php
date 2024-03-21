@extends('layouts.main')
@section('Title', 'QMS Monitoring')
@section('container')

<div class="row">

@if($TotalCategory == 1)
<div class="mt-5 py-5 col" id="QContent">
<form class="mt-5 py-5">
        <div>
            <table> 
                <tr>
                    <div class="card">
                    <div class="card-header" style="text-align:center">
                        {{ $namaAntri }}
                    </div>
                    <div class="card-body row">
                        <div class="col">
                            <h5 class="text-center">Current</h5>
                        <h5 class="card-title text-center">{{ $antrian }}</h5>
                        <p class="card-text text-center"></p>
                        </div>

                        <div class="col">
                            <h5 class="text-center">Next</h5>
                        <h5 class="card-title text-center">{{ $nextAntri }}</h5>
                        </div>
                    </div>
                    </div>
                </tr>
            </table>
        </div>
    </form>

    </div>
@elseif($TotalCategory == 2)
<div class="mt-5 py-2 col" id="QContent">
<form class="mt-5 col">
        <div>
            <table> 
                <tr>
                    <div class="card">
                    <div class="card-header">
                        {{ $namaAntri }}
                    </div>
                    <div class="card-body row" style="text-align:center">
                        <div class="col">
                            <h5 class="text-center">Current</h5>
                        <h5 class="card-title text-center">{{ $antrian }}</h5>
                        <p class="card-text text-center"></p>
                        </div>

                        <div class="col">
                            <h5 class="text-center">Next</h5>
                        <h5 class="card-title text-center">{{ $nextAntri }}</h5>
                        </div>
                    </div>
                    </div>
                </tr>
            </table>
        </div>
    </form>

    <form class="mt-5 col">
        <div>
            <table> 
                <tr>
                    <div class="card">
                    <div class="card-header" style="text-align:center">
                        {{ $namaAntri2 }}
                    </div>
                    <div class="card-body row">
                        <div class="col">
                            <h5 class="text-center">Current</h5>
                        <h5 class="card-title text-center">{{ $antrian2 }}</h5>
                        </div>

                        <div class="col">
                            <h5 class="text-center">Next</h5>
                        <h5 class="card-title text-center">{{ $nextAntri2 }}</h5>
                        </div>
                    </div>
                    </div>
                </tr>
            </table>
        </div>
    </form>
    </div>
@elseif($TotalCategory == 3)
<div class="mt-3 col" id="QContent">
<form class="mt-4">
        <div>
            <table> 
                <tr>
                    <div class="card">
                    <div class="card-header" style="text-align:center">
                        {{ $namaAntri }}
                    </div>
                    <div class="card-body row">
                        <div class="col">
                            <h5 class="text-center">Current</h5>
                        <h5 class="card-title text-center">{{ $antrian }}</h5>
                        <p class="card-text text-center"></p>
                        </div>

                        <div class="col">
                            <h5 class="text-center">Next</h5>
                        <h5 class="card-title text-center">{{ $nextAntri }}</h5>
                        </div>
                    </div>
                    </div>
                </tr>
            </table>
        </div>
    </form>

    <form class="mt-2">
        <div>
            <table> 
                <tr>
                    <div class="card">
                    <div class="card-header" style="text-align:center">
                        {{ $namaAntri2 }}
                    </div>
                    <div class="card-body row">
                        <div class="col">
                            <h5 class="text-center">Current</h5>
                        <h5 class="card-title text-center">{{ $antrian2 }}</h5>
                        </div>

                        <div class="col">
                            <h5 class="text-center">Next</h5>
                        <h5 class="card-title text-center">{{ $nextAntri2 }}</h5>
                        </div>
                    </div>
                    </div>
                </tr>
            </table>
        </div>
    </form>

    
    <form class="mt-2">
        <div>
            <table> 
                <tr>
                    <div class="card">
                    <div class="card-header" style="text-align:center">
                    {{ $namaAntri3 }}
                    </div>
                    <div class="card-body row">
                        <div class="col">
                            <h5 class="text-center">Current</h5>
                        <h5 class="card-title text-center">{{ $antrian3 }}</h5>
                        </div>

                        <div class="col">
                            <h5 class="text-center">Next</h5>
                        <h5 class="card-title text-center">{{ $nextAntri3 }}</h5>
                        </div>
                    </div>
                    </div>
                </tr>
            </table>
        </div>
    </form>
</div>

@elseif($TotalCategory == 4)
<div class="mt-4 col" id="QContent">
    <div class="mt-5 row">
<form class="mt-4 col">
        <div>
            <table> 
                <tr>
                    <div class="card">
                    <div class="card-header" style="text-align:center">
                        {{ $namaAntri }}
                    </div>
                    <div class="card-body row">
                        <div class="col">
                            <h5 class="text-center">Current</h5>
                        <h5 class="card-title text-center">{{ $antrian }}</h5>
                        <p class="card-text text-center"></p>
                        </div>

                        <div class="col">
                            <h5 class="text-center">Next</h5>
                        <h5 class="card-title text-center">{{ $nextAntri }}</h5>
                        </div>
                    </div>
                    </div>
                </tr>
            </table>
        </div>
    </form>

    <form class="mt-4 col">
        <div>
            <table> 
                <tr>
                    <div class="card">
                    <div class="card-header" style="text-align:center">
                        {{ $namaAntri2 }}
                    </div>
                    <div class="card-body row">
                        <div class="col">
                            <h5 class="text-center">Current</h5>
                        <h5 class="card-title text-center">{{ $antrian2 }}</h5>
                        </div>

                        <div class="col">
                            <h5 class="text-center">Next</h5>
                        <h5 class="card-title text-center">{{ $nextAntri2 }}</h5>
                        </div>
                    </div>
                    </div>
                </tr>
            </table>
        </div>
    </form>
</div>
<div class="row mt-4">
    <form class="mt-4 col">
        <div>
            <table> 
                <tr>
                    <div class="card">
                    <div class="card-header" style="text-align:center">
                    {{ $namaAntri3 }}
                    </div>
                    <div class="card-body row">
                        <div class="col">
                            <h5 class="text-center">Current</h5>
                        <h5 class="card-title text-center">{{ $antrian3 }}</h5>
                        </div>

                        <div class="col">
                            <h5 class="text-center">Next</h5>
                        <h5 class="card-title text-center">{{ $nextAntri3 }}</h5>
                        </div>
                    </div>
                    </div>
                </tr>
            </table>
        </div>
    </form>

    <form class="mt-4 col">
        <div>
            <table> 
                <tr>
                    <div class="card">
                    <div class="card-header" style="text-align:center">
                    {{ $namaAntri4 }}
                    </div>
                    <div class="card-body row">
                        <div class="col">
                            <h5 class="text-center">Current</h5>
                        <h5 class="card-title text-center">{{ $antrian4 }}</h5>
                        </div>

                        <div class="col">
                            <h5 class="text-center">Next</h5>
                        <h5 class="card-title text-center">{{ $nextAntri4 }}</h5>
                        </div>
                    </div>
                    </div>
                </tr>
            </table>
        </div>
    </form>
</div>
</div>
@elseif($TotalCategory == 5)
<div class="mt-3 col" id="QContent">
    <div class="row mt-5">
<form class="mt-2 col">
        <div>
            <table> 
                <tr>
                    <div class="card">
                    <div class="card-header" style="text-align:center">
                        {{ $namaAntri }}
                    </div>
                    <div class="card-body row">
                        <div class="col">
                            <h5 class="text-center">Current</h5>
                        <h5 class="card-title text-center">{{ $antrian }}</h5>
                        <p class="card-text text-center"></p>
                        </div>

                        <div class="col">
                            <h5 class="text-center">Next</h5>
                        <h5 class="card-title text-center">{{ $nextAntri }}</h5>
                        </div>
                    </div>
                    </div>
                </tr>
            </table>
        </div>
    </form>

    <form class="mt-2 col">
        <div>
            <table> 
                <tr>
                    <div class="card">
                    <div class="card-header" style="text-align:center">
                        {{ $namaAntri2 }}
                    </div>
                    <div class="card-body row">
                        <div class="col">
                            <h5 class="text-center">Current</h5>
                        <h5 class="card-title text-center">{{ $antrian2 }}</h5>
                        </div>

                        <div class="col">
                            <h5 class="text-center">Next</h5>
                        <h5 class="card-title text-center">{{ $nextAntri2 }}</h5>
                        </div>
                    </div>
                    </div>
                </tr>
            </table>
        </div>
    </form>
</div>

<div class="row">
    <form class="mt-2 col">
        <div>
            <table> 
                <tr>
                    <div class="card">
                    <div class="card-header" style="text-align:center">
                    {{ $namaAntri3 }}
                    </div>
                    <div class="card-body row">
                        <div class="col">
                            <h5 class="text-center">Current</h5>
                        <h5 class="card-title text-center">{{ $antrian3 }}</h5>
                        </div>

                        <div class="col">
                            <h5 class="text-center">Next</h5>
                        <h5 class="card-title text-center">{{ $nextAntri3 }}</h5>
                        </div>
                    </div>
                    </div>
                </tr>
            </table>
        </div>
    </form>

    <form class="mt-2 col">
        <div>
            <table> 
                <tr>
                    <div class="card">
                    <div class="card-header" style="text-align:center">
                    {{ $namaAntri4 }}
                    </div>
                    <div class="card-body row">
                        <div class="col">
                            <h5 class="text-center">Current</h5>
                        <h5 class="card-title text-center">{{ $antrian4 }}</h5>
                        </div>

                        <div class="col">
                            <h5 class="text-center">Next</h5>
                        <h5 class="card-title text-center">{{ $nextAntri4 }}</h5>
                        </div>
                    </div>
                    </div>
                </tr>
            </table>
        </div>
    </form>
</div>
<div class="row">
    <form class="mt-2">
        <div>
            <table> 
                <tr>
                    <div class="card">
                    <div class="card-header" style="text-align:center">
                    {{ $namaAntri5 }}
                    </div>
                    <div class="card-body row">
                        <div class="col">
                            <h5 class="text-center">Current</h5>
                        <h5 class="card-title text-center">{{ $antrian5 }}</h5>
                        </div>

                        <div class="col">
                            <h5 class="text-center">Next</h5>
                        <h5 class="card-title text-center">{{ $nextAntri5 }}</h5>
                        </div>
                    </div>
                    </div>
                </tr>
            </table>
        </div>
    </form>
</div>
</div>
@endif

<div class="mt-2 mt-5 py-5 col">
<iframe width="560" height="315" src="https://www.youtube.com/embed/oeQTdcLTGhM?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
<marquee behavior="scroll" direction="left" bgcolor="black"><font color="white">Welcome to Queue Management System</font></marquee>
</div>
@endsection