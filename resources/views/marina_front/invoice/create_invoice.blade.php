@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><i class="fa fa-money"></i> {{ __('Create Invoice') }}</div>

                </br>


                    <form method="POST" action="{{ route('create_invoice') }}">
                        @csrf



                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Boat') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control " name="boat_id" id="boat_id" required>
                                        <option value="">Please Select Boat</option>
                                        @foreach($boats as $boat)
                                            <option value="{{$boat->id}}">{{$boat->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('boat_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Tax') }}</label>

                                <div class="col-md-6">
                                    <input id="tax" type="number"  class="form-control @error('tax') is-invalid @enderror" name="tax" value="{{ old('tax') }}"  placeholder="ex.(10) % just the percentatge Number"required >

                                    @error('tax')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create Invoice') }}
                                    </button>
                              
                                </div>
                            </div>
                        </form>
                    </br>  </br>
                    </div>
                </div>
                
                
          
            </div>
        </div>
    
@endsection
