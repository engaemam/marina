<?php

namespace App\Http\Controllers;
use App\Models\Packages;
use App\Models\Boats;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class PackagesController extends Controller
{
    public function index(){

        //        dd('test');
                  $packages = Packages::all();
        
                  foreach($packages as $package){
                    $boatsOnPackage= Boats::get()->where('package_id', $package->id)->count() ;
                    $package = Arr::add($package,'boatsOnPackage' ,$boatsOnPackage);

                }
                    
        
                return view('marina_front.packages.index',compact('packages'));
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
            public function delete($package_id = null){


                if($package_id != null ){
            
                    $package = Packages::find($package_id);
                    $package->delete();
                    return redirect()->back()->with('successDeleteMsg','The requested <strong>package deleted</strong> successfully');
                }
                
              }



        }
