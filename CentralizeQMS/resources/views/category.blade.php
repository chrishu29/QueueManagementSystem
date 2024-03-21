@extends('layouts.main')
@section('Title', 'QMS Queue')
@section('container')

<div class="container-fluid py-5 mt-5">

                <div class="row justify-content-center">
                    <div class="col-md-7">

                        <div class="card rouded-0 shadow">
                            <div class="formqueue card-body" style="display: block;">
                                <div class="card-header">
                                    <div class="h5 card-title">Choose Category</div>
                                </div>
                                    <div class="form-group text-center my-2">
                                        @foreach($caties as $cats)
                                        <a href="{{ route('giveIt',$cats->QName) }}" id="CatBtn" type="button" class="btn-lg btn col-sm-4 mt-2">{{ $cats->QName }}</a>
                                        @endforeach
                                    </div>
                            </div>
                    </div>
                </div>

        </div>
@endsection