<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\saleItems;
use App\Models\Receipt;
use App\Models\Payment;

class saleInvoice extends Model
{
    use HasFactory;

     protected $fillable = ['date','challan_no','note','user_id','admin_id'];

     public function items(){

        return $this->hasMany(saleItems::class);
    }

       public function payment(){

        return $this->hasMany(Payment::class);
    }


    public function receipt(){

        return $this->hasMany(Receipt::class);
    }

   
}
