<?php
/**
 * Created by PhpStorm.
 * User: Madrasty lap
 * Date: 4/25/2021
 * Time: 9:45 PM
 */

namespace App\Traits;


use Illuminate\Http\Request;

trait Uploads
{


  public function upload_image(Request $request,$input_name = null,$folder_name = null){

      if($input_name != null){

              $this->validate($request, [
                  $input_name => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
              ]);

              if ($request->hasFile($input_name)) {
                  $image = $request->file($input_name);
                  $name = time().'.'.$image->getClientOriginalExtension();
                  $destinationPath = public_path('/'.$folder_name);
                  $image->move($destinationPath, $name);


                  return $name;
              }
      }

      return false;

    }



    public function multipleUploads(Request $request,$input_name = null,$folder_name = null){

        $names = [];
        $request->validate([
            'images' => 'required',
        ]);

        if ($request->hasfile('images')) {
            $images = $request->file('images');

            foreach($images as $key=> $image) {
                $name = time().'.'.$image->getClientOriginalName();
                $destinationPath = public_path('/'.$folder_name);
                $image->move($destinationPath, $name);
                $names[$key] = $name;
            }

            return $names;
        }
    }




}