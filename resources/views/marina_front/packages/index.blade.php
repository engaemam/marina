@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-left">
            <div class="col-lg-4">

            <h1>Packeges Operations</h1>
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
                <table id="packages_table" class="display">
                    <thead>
                        <tr align="center" >
                            <th>Name</th>
                        <th>Description</th>
                        <th>Rate</th>
                        <th>Boats on Package</th>
                      
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($packages as $package)
                        <tr align="center" >
                            <td><a href="#">{{$package->name}}</a></td>
                                <td>{{$package->description}}</td>
                                <td>{{$package->rate}}</td>
                                <td>{{$package->boatsOnPackage}}</td>
  
                                <td dir="rtl">  <div align="center" class="row">
                                    <div align="center"class="col-lg-2">
                                    <a class="btn btn-warning" href="{{url('edit/package').'/'.$package->id}}"><i class="fa fa-edit"></i></a> 
                                    </div>
                                    <div  align="center" class="col-lg-2">
                                        <form action="{{url('delete/package').'/'.$package->id}}" method="POST">
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



@endsection

