@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header  "><b><i class="fa fa-list-alt "> </i> {{ __('Packages Actions') }}</b></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                <a type="button" class="buttonb" href="{{url('create/package')}}"><span>  New Package</span></a>
                <a type="button" class="buttony" href="{{url('list/packages')}}"><span>  Packages List</span></a>
                </div>
            </div>
        </div>


        
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header"><b><i class="fa fa-users "> </i> {{ __('Clients Actions') }}</b></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                     <a type="button" class="buttonb" href="{{url('create/client')}}"><span> New Client</span></a>
                     <a type="button" class="buttony" href="{{url('list/clients')}}"><span> Clients List</span></a>
                </div>
            </div>
        </div>

       
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header"><b><i class="fa fa-ship"> </i> {{ __('Boats Actions') }}</b></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a type="button" class="buttonb" href="{{url('create/boat')}}"><span> New Boat</span></a>
                    <a type="button" class="buttony" href="{{url('/list/boats')}}"><span> Boats List</span></a>
                </div>
            </div>
        </div>
        </div>
        <hr>
        <div class="row justify-content-center">
            <div class="col-lg-7">
            <div class="card">
                <div class="card-header"><b><i class="fa fa-money "> </i> {{ __('Invoices Actions') }}</b></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a type="button"  class="buttonb " href="{{url('create/invoice')}}"><span> New Invoice</span></a>
                    <a type="button" class="buttony" href="{{url('pay/invoice')}}"><span> Invoices List</span> </a>
                    <a type="button" class="buttonyx" href="{{url('pay/invoice')}}"><span> Pay Invoice</span></a>

                </div>


            </div>
        </div>
        </div>




    </div>

</div>
@endsection
