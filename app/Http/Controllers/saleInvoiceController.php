<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\saleInvoice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\saleInvoiceRequest;

class saleInvoiceController extends Controller
{
    public function index($id){

    	$this->data['users'] = User::findOrFail($id);
    	return view('users.sales.sales_invoice',$this->data);

     }

     public function storeSale ( saleInvoiceRequest $request , $user_id ) {

     	$formData	 			= $request->all();
    	$formData['user_id']	= $user_id;
    	$formData['admin_id']	= Auth::id();
    	if(saleInvoice::create($formData)){
            Session::flash('message','Sale Invoice Added Successfully!');
        }
      return redirect()->route('users.sale_invoice',['id' => $user_id]);
     }

     public function delete( $user_id, $id ){

     	if(saleInvoice::find($id)->delete()){
   			Session::flash('message','Sale Invoice Deleted Successfully!');
   		}
   		  return redirect()->route('users.sale_invoice',['id' => $user_id]);
     }

     public function invoiceDetails ($user_id,$invoice_id){
     	$this->data['invoice'] = saleInvoice::findOrFail($invoice_id);
     	$this->data['user'] = User::findOrFail($user_id);
     	return view('users.sales.sale_invoice_details',$this->data);
     }
}
