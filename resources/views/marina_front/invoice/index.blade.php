@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-left">
            <div class="col-lg-4">

            <h1>Invoices Operations</h1>
        </div>
       
        <div class="col-lg-6 " align="center" >
            @if(Session::has('successDeleteMsg'))               
               
            <div class="alert alert-warning alerty text-left" role="alert" data-auto-dismiss="500">
                <strong> <i class="fa fa-exclamation-triangle"></i></strong> {!!Session::get('successDeleteMsg')!!}
              </div>
                         
            @endif
        </div>
    </div>
        <hr>
       <br>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <table id="invoices_table" class="display">
                    <thead>
                    <tr align="center" >
                       
                        <th>Issue Date</th>
                        <th>Boat Name</th>
                        <th>Owner</th>
                        <th>Package</th>
                        <th>Rate</th>
                        <th>Paid Amount</th>
                        <th>Invoice Status</th>
                        <th>Actions</th>

                    </tr>
                    </thead>
                    <tbody>
                        @foreach($invoices as $invoice)
                            <tr align="center" >
                                <td><a href="#">{{\Carbon\Carbon::parse($invoice->created_at )->format('d/m/Y')}}</a></td>
                                <td>{{$invoice->boat->name}}</td>
                                <td>{{$invoice->boat->client->name}}</td>
                                <td>{{$invoice->boat->package->name}}</td>
                                <td><b>{{$invoice->boat->package->rate}} EGP</b> </td>
                                <td><b>{{$invoice->paid_amount}} EGP</b> </td>
                              @if($invoice->is_paid == 0 ) 
                                  <td align="center" style="background:#ff8b8e	;">Not Paid</td>
                                   @else
                                   <td style="background:#a1e2c2	;">Paid</td>

                                @endif
                      
                                <td>
                                <!--    <a  class="btn btn-warning" href="{{url('edit/invoice').'/'.$invoice->id}}"><i class="fa fa-edit"></i></a>
                                    <a  class="btn btn-warning" href="{{url('edit/invoice').'/'.$invoice->id}}"><i class="fa fa-edit"></i></a>
                                 -->   
                                    <button title="More.." disabled class="btn btn-dark"><b>...</b></button> </td>
                                 </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection

