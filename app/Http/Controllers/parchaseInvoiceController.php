<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class parchaseInvoiceController extends Controller
{
    public function index( $id ){
    	$this->data['users'] = User::findOrFail( $id );
    	return view('users.parchase.parchase_invoice',$this->data);
    	return $id;
    }
}
