<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Http\Requests\parchaseInvoiceRequest;
use App\Models\parchaseInvoice;
use App\Models\ParchaseItems;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class parchaseInvoiceController extends Controller
{
    public function index( $id ){
    	$this->data['user'] = User::findOrFail( $id );
    	return view('users.parchase.parchase_invoice',$this->data);
    	return $id;
    }
    public function store ( parchaseInvoiceRequest $request, $user_id ){

    	$formData 				= $request->all();
    	$formData['admin_id']   = Auth::id();
    	$formData['user_id']    = $user_id;

    	if($invoice = parchaseInvoice::create($formData)){
    		Session::flash('message','Parchase Invoice Created Sucessfully :)');
    	}
    	return redirect()->route('user.parchase_invoice.invoiceDetails',['user_id'=> $user_id,'invoice_id'=>$invoice]);
    }

    public function delete ($user_id, $invoice_id){

      if(parchaseInvoice::find($invoice_id)->delete()){
    		Session::flash('message','Parchase Invoice Deleted Sucessfully :)');
    	}
    	return redirect()->route('users.parchase_invoice',['id'=> $user_id]);
    }

    public function invoiceDetails ( $user_id, $invoice_id ){
    	$this->data['invoice']   = parchaseInvoice::findOrFail($invoice_id);
    	$this->data['user']      = User::findOrFail($user_id);
    	$this->data['products']  = Product::findProduct();
    	$this->data['total']     = $this->data['invoice']->items->sum('totla');
    	$this->data['pay']       = $this->data['invoice']->payment->sum('amount');

    	return view('users.parchase.parchase_invoice_details',$this->data);
    }

    public function productStore ( Request $request, $user_id, $invoice_id ) {

    	$formData                        = $request->all();
    	$formData['parchase_invoice_id'] = $invoice_id;

    	 if(ParchaseItems::create($formData)){
    		Session::flash('message','Product Added Sucessfully :)');
    	}

    	return redirect()->route('user.parchase_invoice.invoiceDetails',['user_id'=> $user_id,'invoice_id'=> $invoice_id]);
    	
    }

}
