<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\saleInvoice;

class ParchaseItems extends Model
{
    use HasFactory;
    protected $fillable = ['product_id','parchase_invoice_id','price','totla','quantity'];

        public function invoice(){

    	return $this->belongsTo(saleInvoice::class);
    }

    public function product(){

        return $this->belongsTo(Product::class);
    }
    
}
