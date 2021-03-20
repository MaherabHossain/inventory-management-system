<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ParchaseItems;

class ParchaseInvoice extends Model
{
    use HasFactory;

	public function items(){
	    return $this->hasMany(ParchaseItems::class);
	}
}
