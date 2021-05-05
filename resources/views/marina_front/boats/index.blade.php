@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-left">
            <div class="col-lg-4">

            <h1>Boats Operations</h1>
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
                <table id="boats_table" class="display">
                    <thead>
                        <tr align="center" >
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
                        <tr align="center" >
                            <td><a href="#">{{$boat->name}}</a></td>
                                <td>{{$boat->length}}</td>

                                <!-- Added Handler for the no image uploaded-->
                            @if (json_decode($boat->images) != null)
                                <td>
                                   
                                        
                                    @foreach(json_decode($boat->images) as $boat_image)

                                        <img style="width: 50px" src="{{url('/boats')}}/{{$boat_image}}">

                                    @endforeach

                                </td>
                                @else

                                <td>
                                      <img style="width: 40px" src="{{url('/images/no-image.png')}}">  No images.
                                </td>
                                @endif
                                <td><input type="color" id="favcolor" name="favcolor" value="{{$boat->color}}" disabled></td>
                                <td>{{$boat->client->name}}</td>
                                <td>{{$boat->package->name}}</td>

                                <td>{{$payment_array[$boat->id]['paid']}}</td>
                                <td>{{$payment_array[$boat->id]['not_paid']}}</td>
                                <td dir="rtl">
                                    
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <a class="btn btn-warning" href="{{url('edit/boat').'/'.$boat->id}}"><i class="fa fa-edit"></i></a> 

                                    </div>
                                    <div class="col-lg-6">
                                        <form action="{{url('delete/boat').'/'.$boat->id}}" method="POST">
                                            @method('POST')
                                            @csrf
                                            <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> </button>               
                                           </form>
                                    </div>
                                    </div>
                                  
                                   
                                       
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<!-- To make the  alert hide after Specific Time -->
    <script>
    window.setTimeout(function() {
    $(".alerty").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);
    </script>

@endsection

