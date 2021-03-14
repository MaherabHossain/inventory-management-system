<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Group;
use App\Models\saleInvoice;
use App\Models\parchaseInvoice;
use App\Models\Payment;
use App\Models\Receipt;


class User extends Model
{
    use HasFactory;

    protected $fillable = ['group_id','name','email','address','phone'];

    public function group(){

    	return $this->belongsTo(Group::class);
    }

    public function sales(){
    	return $this->hasMany(saleInvoice::class);
    }

    public function payments(){
    	return $this->hasMany(Payment::class);
    } 

     public function parchase(){
    	return $this->hasMany(parchaseInvoice::class);
    }   

     public function receipts(){
    	return $this->hasMany(Receipt::class);
    }

}
