<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;
use App\Models\User;
use App\Models\saleInvoice;

class Receipt extends Model
{
    use HasFactory;

    protected $fillable = ['date','amount','note','user_id','admin_id','sale_invoice_id'];

	public function admin(){

	return $this->belongsTo(Admin::class);
	}
	public function user(){

	return $this->belongsTo(User::class);
	}

	public function invoice(){

	return $this->belongsTo(saleInvoice::class);
	}
}
