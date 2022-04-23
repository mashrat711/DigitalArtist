{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
@extends('layouts.backend-layout')
@section('content')

                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            <!-- order-card start -->
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card bg-c-blue order-card">
                                                    <div class="card-block">
                                                        <h6 class="m-b-20"><a href="{{route('artists.index')}}">Artists</a></h6>
                                                        <h2 class="text-right"><i class="ti-shopping-cart f-left"></i><span>486</span></h2>
                                                        <p class="m-b-0">Completed Orders<span class="f-right">351</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card bg-c-green order-card">
                                                <a href="{{route('artistDetails.index')}}">
                                                    <div class="card-block">
                                                        <h6 class="m-b-20"><a href="{{route('artistDetails.index')}}">Prjects</a></h6>
                                                        <h2 class="text-right"><i class="ti-tag f-left"></i><span>1641</span></h2>
                                                        <p class="m-b-0">This Month<span class="f-right">213</span></p>
                                                    </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card bg-c-yellow order-card"  >
                                                
                                                    <div class="card-block">
                                                        <h6 class="m-b-20"><a href="{{route('events.index')}}">Events</a></h6>
                                                        <h2 class="text-right"><i class="ti-reload f-left"></i><span>$42,562</span></h2>
                                                        <p class="m-b-0">This Month<span class="f-right">$5,032</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card bg-c-pink order-card">
                                                    <div class="card-block">
                                                        <h6 class="m-b-20">Total Profit</h6>
                                                        <h2 class="text-right"><i class="ti-wallet f-left"></i><span>$9,562</span></h2>
                                                        <p class="m-b-0">This Month<span class="f-right">$542</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- order-card end -->

                                           


                                        </div>
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                                <div id="styleSelector"> </div>
                            </div>
                        </div>
                    </div>

                    @endsection
