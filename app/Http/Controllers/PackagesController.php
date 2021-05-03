<?php

namespace App\Http\Controllers;
use App\Models\Packages;
use Illuminate\Http\Request;

class PackagesController extends Controller
{
    public function index(){

        //        dd('test');
                $packages = Packages::all();
        
        
              //  $payment_array = [];
        
              /*  foreach($boats as $boat){
        
                    $payment_array[$boat->id] = ['paid'=>Invoices::where('is_paid',1)->count(),'not_paid' =>Invoices::where('is_paid',0)->count()];
        
                }*/
        
                return view('marina_front.packages.index',compact('packages'));
            }
        }
