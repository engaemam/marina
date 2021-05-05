<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','boat_id','tax','rate','issue_date','total','payment_method','paid_amount','is_paid'];

    public function boat(){

        return $this->belongsTo('App\Models\Boats','boat_id');

    }

    public function user(){

        return $this->belongsTo('App\Models\User','user_id');

    }
  
}
