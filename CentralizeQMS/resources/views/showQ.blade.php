@extends('layouts.main')
@section('Title', 'Your Queue')
@section('container')

<div class="container-fluid py-5 mt-5">

                <div class="row justify-content-center">
                    <div class="col-md-7">

                        <div class="card rouded-0 shadow">
                            <div class="formqueue card-body" style="display: block;">
                                <div class="card-header">
                                    <div class="h5 card-title">Your Queue Details</div>
                                </div>
                                <form>
                                    <div class="form-group text-center my-2">
                                        @foreach($showItQ as $show)
                                        <div  id="dataQ">
                                            <div style="visibility:hidden;">
                                                <h3 style="border-style: solid; border-color: green;">Queue Management System</h3>
                                            </div>
                                        <p>Please wait for your Queue !</p>
                                        <p>Your Queue is :</p>
                                        <h1>{{ $show->QType }} - {{ $show->queue }}</h1>
                                        @if($waitTime == 0)
                                        @else
                                        <h4>Estimated Wait Time {{ $waitTime }} Minutes</h4>
                                        @endif
                                        <p>You're on Category {{ $show->category }}</p>
                                            <div style="visibility:hidden;">
                                                <h3 style="border-style: solid; border-color: green;">Thank you for Coming !!!</h3>
                                            </div>
                                        </div>
                                        @endforeach
                                        <!-- <a href="{{ route('catHome') }}" class="btn btn-success" type="submit"><i class="fa-solid fa-floppy-disk"></i> Save</a> -->
                                        <a href="{{ route('catHome') }}" class="btn btn-primary" id="printQ" type="submit"><i class="fa-solid fa-print"></i> Print</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

    <script>
        $('#printQ').click(function(){
          window.print();
        })

        setTimeout(function () {
            window.location = "{{ route('catHome') }}";
        },5000);
    </script>
@endsection