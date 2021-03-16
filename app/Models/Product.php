<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\saleInvoice;

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
    



}
