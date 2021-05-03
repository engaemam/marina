<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clients;
use App\Models\Boats;
use App\Models\InvoiceLogs;
use App\Models\Invoices;
use App\Models\Packages;
use App\Traits\Uploads;

class ClientsController extends Controller
{ 


    use Uploads;
    // Get all "Client List"
    public function index(){
        $clients = Clients::all();
        
      return view('marina_front.clients.index',compact('clients'));
  }


 


  public function showCreateClient(){


      return view('marina_front.clients.client_register');
  }

  public function createClient(Request $request){
      $name = '';

    //        dd('test');

      $rules = $this->validate($request, [
          'email' => 'required|email',
          'national_id' => 'required',
          'mobile' => 'required|unique:client',
      ]);



//        $validate = Validator::make($request, $rules, $messages = [
//            'unique' => 'The :attribute field is required.',
//        ]);




      $name = $this->upload_image($request,'national_id_image','clients');





      $client = Clients::create([
      'name' => $request->name,
      'email'=> $request->email,
      'mobile' => $request->mobile,
      'job_title' => $request->job_title,
      'address' => $request->address,
      'national_id_image' => $name,
      'national_id' => $request->national_id,
      'nationality' => $request->nationality
      ]);

      return view('home');
  }


}
