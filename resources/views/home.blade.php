@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">{{ __('Create Invoice') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a type="button" class="btn btn-dark" href="{{url('create/invoice')}}">Create Invoice</a>
                        <hr>
                    <a type="button" class="btn btn-success" href="{{url('pay/invoice')}}">Pay Invoice</a>
                </div>


            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">{{ __('Create Boat') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a type="button" class="btn btn-danger" href="{{url('create/boat')}}">Create Boat</a>
                    <a type="button" class="btn btn-warning" href="{{url('/list/boats')}}">Boats List</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">{{ __('Create Package') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a type="button" class="btn btn-warning" href="{{url('create/package')}}">Create Package</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">{{ __('Create Client') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                     <a type="button" class="btn btn-primary" href="{{url('create/client')}}">Create Client</a>
                </div>
            </div>
        </div>


    </div>

</div>
@endsection
