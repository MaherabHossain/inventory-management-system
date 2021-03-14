<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;

    protected $fillable        = ['tittle'];

    public static function findProductCatagory(){
    	$categories            = Category::all();
    	$data['categories']    = [];

    	foreach ($categories as $catagory) {
    		$data['categories'][$catagory->id] = $catagory->tittle;
    	}
    	return $data;
    }

    public function products(){

        return $this->hasMany(Product::class);
    }

}
