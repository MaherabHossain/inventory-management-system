<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;
use App\Models\User;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['date','amount','note','user_id','admin_id','parchase_invoice_id'];



	public function admin(){

	return $this->belongsTo(Admin::class);

	}

	public function user(){

	return $this->belongsTo(User::class);

	}
}
