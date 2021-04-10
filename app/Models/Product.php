<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\saleInvoice;
use App\Models\saleItems;
use App\Models\ParchaseItems;

class Product extends Model
{
    use HasFactory;

      protected $fillable = ['category_id','tittle','description','cost_price','price'];

     public function category(){

    	return $this->belongsTo(Category::class);
    }

        public static function findProduct(){
      	$products            = Product::all();
      	$data['products']    = [];

      	foreach ($products as $product) {
      		$data['products'][$product->id] = $product->tittle;
      	}
      	return $data;
    }

     public function sale_product(){

        return $this->hasMany(saleItems::class);
    }

     public function purchase_product(){

        return $this->hasMany(ParchaseItems::class);
    }
    



}
