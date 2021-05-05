@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-left">
            <div class="col-lg-4">

            <h1>Clients Operations</h1>
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
                <table id="clients_table" class="display">
                    <thead>
                        <tr align="center" >
                            <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Nationality</th>
                        <th>ID</th>
                        <th>ID Image</th>
                        <th>Address</th>
                        <th>Job Title</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($clients as $client)
                        <tr align="center" >
                            <td><a href="#">{{$client->name}}</a></td>
                                <td>{{$client->email}}</td>
                                <td>{{$client->mobile}}</td>
                                <td>{{$client->nationality}}</td>
                                <td>{{$client->national_id}}</td>
                                <td><img style="width: 50px" src="{{url('/clients')}}/{{$client->national_id_image}}">              </td>
                                <td>{{$client->address}}</td>
                                <td>{{$client->job_title}}</td>
                      
                                <td dir="rtl"><a class="btn btn-warning" href="{{url('edit/client').'/'.$client->id}}"><i class="fa fa-edit"></i></a> <button class="btn btn-danger"><i class="fa fa-trash"></i></button> </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection

