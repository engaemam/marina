<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Clients;
use App\Models\Boats;
use App\Models\InvoiceLogs;
use App\Models\Invoices;
use App\Models\Packages;

class InvoicesController extends Controller
{
    public function index(){
        $invoices = Invoices::all();
        
      return view('marina_front.invoice.index',compact('invoices'));
  }
}
