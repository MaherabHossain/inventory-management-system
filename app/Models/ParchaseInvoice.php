<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ParchaseItems;

class ParchaseInvoice extends Model
{
    use HasFactory;

    protected $fillable = ['date','challan_no','note','user_id','admin_id'];
    
	public function items(){
	    return $this->hasMany(ParchaseItems::class);
	}
	public function product(){

        return $this->belongsTo(Product::class);
    }
     public function payment(){

        return $this->hasMany(Payment::class);
    }
}
