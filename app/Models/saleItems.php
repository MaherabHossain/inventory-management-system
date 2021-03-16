<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\saleInvoice;
use App\Models\Product;

class saleItems extends Model
{
    use HasFactory;

     protected $fillable = ['product_id','sale_invoice_id','price','totla','quantity'];

    public function invoice(){

    	return $this->belongsTo(saleInvoice::class);
    }

    public function product(){

        return $this->belongsTo(Product::class);
    }
}
