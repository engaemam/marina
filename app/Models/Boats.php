<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Boats extends Model
{
    use HasFactory;

    protected $fillable = ['name','length', 'color', 'images','user_id','package_id'];





    public function user(){

            return $this->belongsTo('App\Models\User','user_id');

    }
    public function client(){

        return $this->belongsTo('App\Models\Clients','user_id');

}

    public function package(){

        return $this->belongsTo('App\Models\Packages','package_id');

    }
}
