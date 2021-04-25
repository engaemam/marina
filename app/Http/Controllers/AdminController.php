<?php

namespace App\Http\Controllers;

use App\Models\Boats;
use App\Models\Clients;
use App\Models\InvoiceLogs;
use App\Models\Invoices;
use App\Models\Packages;
use App\Traits\Uploads;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    use Uploads;


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

    public function showCreateBoat(){

        $clients = Clients::all();

        $packages = Packages::all();

        return view('marina_front.boats.create_boat',compact('clients','packages'));

    }

    public function createBoat(Request $request){

        $names =  json_encode($this->multipleUploads($request,'images','boats'));






        $boat = Boats::create([
            'name' => $request->name,
            'length' => $request->length,
            'color' => $request->color,
            'images' => $names,
            'user_id' => $request->user_id,
            'package_id' => $request->package_id,
        ]);

        return view('home');



    }

    public function showCreatePackage(){



        return view('marina_front.packages.create_package');

    }

    public function createPackage(Request $request){


        $package = Packages::create([
            'name' => $request->name,
            'description' => $request->description,
            'rate' => $request->rate
        ]);

        return view('home');



    }

    public function showCreateInvoice(){

        $boats = Boats::all();

        return view('marina_front.invoice.create_invoice',compact('boats'));

    }

    public function createInvoice(Request $request){


        $tax = 1 + $request->tax/100;

        $boat = Boats::find($request->boat_id);

        $total = ((int) $boat->length * (int) $boat->package->rate);

        $total = $total * $tax;

        $invoice = Invoices::create([
            'user_id' => Boats::find($request->boat_id)->user->id,
            'boat_id' => $request->boat_id,
            'tax' => $request->tax,
            'issue_date' => \Carbon\Carbon::today(),
            'total' => $total,

        ]);
        return view('home');



    }

    public function showPayInvoice(){
        $invoices = Invoices::where('is_paid',0)->get();
        return view('marina_front.invoice.pay_invoice',compact('invoices'));
    }

    public function payInvoice(Request $request){
      $invoice = Invoices::find($request->invoice);

      InvoiceLogs::create([
      'invoice_id' => $request->invoice,
      'boat_id' =>$invoice->boat_id,
      'user_id' => auth()->user()->id,
      'client_id' =>$invoice->user_id,
      'paid_amount' =>$request->paid_amount,
      'payment_method' => $request->payment_method
      ]);

      $is_paid = 0;

      if($invoice->paid_amount >= $invoice->total){
          $is_paid = 1;
      }

      $paid_amount = $invoice->paid_amount + $request->paid_amount;


      $invoice->update(['paid_amount'=> $paid_amount,'is_paid'=> $is_paid,'payment_method' => $request->payment_method]);
      $invoice->save();
    }

    public function getInvoice($invoice_id = null){

        if($invoice_id !=  null){

            return Invoices::find($invoice_id);
        }
        return [];
    }

}
