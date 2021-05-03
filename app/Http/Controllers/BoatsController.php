<?php

namespace App\Http\Controllers;

use App\Models\Boats;
use App\Models\Clients;
use App\Models\Invoices;
use App\Models\Packages;
use Illuminate\Http\Request;

class BoatsController extends Controller
{

    public function index(){

//        dd('test');
        $boats = Boats::all();


        $payment_array = [];

        foreach($boats as $boat){

            $payment_array[$boat->id] = ['paid'=>Invoices::where('is_paid',1)->count(),'not_paid' =>Invoices::where('is_paid',0)->count()];

        }

        return view('marina_front.boats.index',compact('boats','payment_array'));
    }

    public function edit($boat_id = null){

      $clients = Clients::all();
      $packages = Packages::all();
      $boat = [];
      if($boat_id != null){
          $boat = Boats::find($boat_id);
      }

      return view('marina_front.boats.edit_boat',compact('boat','clients','packages'));

    }




public function delete($boat_id = null){


    if($boat_id != null ){

        $boat = Boats::find($boat_id);
        $boat->delete();
        return redirect()->back()->with('successDeleteMsg','The requested <strong>boat deleted</strong> successfully');
    }
    
  }


  
}