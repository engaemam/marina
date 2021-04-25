@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <table id="boats_table" class="display">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Length</th>
                        <th>Image</th>
                        <th>Color</th>
                        <th>User</th>
                        <th>Package</th>
                        <th>Paid Invoices</th>
                        <th>Not Paid Invoices</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($boats as $boat)
                            <tr>
                                <td><a href="#">{{$boat->name}}</a></td>
                                <td>{{$boat->length}}</td>

                                <td>
                                    @foreach(json_decode($boat->images) as $boat_image)

                                        <img style="width: 50px" src="{{url('/boats')}}/{{$boat_image}}">

                                    @endforeach

                                </td>

                                <td><input type="color" id="favcolor" name="favcolor" value="{{$boat->color}}" disabled></td>
                                <td>{{$boat->user->name}}</td>
                                <td>{{$boat->package->name}}</td>

                                <td>{{$payment_array[$boat->id]['paid']}}</td>
                                <td>{{$payment_array[$boat->id]['not_paid']}}</td>
                                <td><a class="btn btn-warning" href="{{url('edit/boat').'/'.$boat->id}}"><i class="fa fa-edit"></i></a> <button class="btn btn-danger"><i class="fa fa-trash"></i></button> </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection

