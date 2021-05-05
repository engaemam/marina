@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> <i class="fa fa-dollar"></i> {{ __('Pay Invoice') }}</div>
<br>



                    <form method="POST" action="{{ route('pay_invoice') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="payment_method" class="col-md-4 col-form-label text-md-right">{{ __('Invoice Number - Boat') }}</label>

                            <div class="col-md-6">
                                <select class="form-control " name="invoice" id="invoice" required>
                                    <option value="">Please Select Invoice</option>
                                    @foreach($invoices as $invoice)
                                        <option value="{{$invoice->id}}">{{$invoice->id}} - {{\App\Models\Boats::find($invoice->boat_id)->name}}</option>
                                    @endforeach
                                </select>
                                @error('payment_method')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="payment_method" class="col-md-4 col-form-label text-md-right">{{ __('Payment Method') }}</label>

                            <div class="col-md-6">
                                    <select class="form-control " name="payment_method" id="payment_method" required>
                                            <option value="">Please Select Payment</option>
                                            <option value="Visa">Visa</option>
                                            <option value="Cash">Cash</option>
                                            <option value="Bank Transfer">Bank Transfer</option>
                                            <option value="Vodafone Cash">Vodafone Cash</option>
                                            <option value="Other">Other</option>
                                    </select>
                                 @error('payment_method')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Total') }}</label>

                            <div class="col-md-6">
                                <input id="total" type="number" min="0"  class="form-control @error('color') is-invalid @enderror" name="rate" value="" disabled>

                                @error('rate')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Issue Date') }}</label>

                            <div class="col-md-6">
                                <input id="issue_date" type="date" min="0"  class="form-control @error('color') is-invalid @enderror" name="rate" value="" disabled>

                                @error('rate')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Paid Amount') }}</label>

                            <div class="col-md-6">
                                <input id="paid_amount" type="number" min="0"  class="form-control @error('color') is-invalid @enderror" name="paid_amount" value="" required>

                                @error('rate')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>




                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-dark">
                                    {{ __('Pay Invoice') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </br>     </br>
                </div>
           
            </div>
        
        </div>
   
    </div>
    <script>

        $('#invoice').on('change',function (event) {
            $.ajax({

                url:"{{ url('get/invoice') }}"+"/"+$(this).val(),


                success:function(data) {
                    console.log(data);
                    $('#total').val(data.total - data.paid_amount);
                    $('#issue_date').val(data.issue_date);
                }



            });
        })
    </script>
@endsection
