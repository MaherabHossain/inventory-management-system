<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Receipt;
use App\Models\Product;
use App\Models\saleInvoice;
use App\Http\Requests\receiptRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class receiptsController extends Controller
{
   	public function index( $id ){

   		$this->data['users']	= User::findOrFail( $id );
   		return view('users.receipts.receipts',$this->data);
   	}

   	public function store( receiptRequest $request, $user_id, $invoice_id){

   		$formData	 			= $request->all();
    	$formData['user_id']	= $user_id;
    	$formData['admin_id']	= Auth::id();
      if ($invoice_id) {
        $formData['sale_invoice_id']  = $invoice_id;
      }
    	if(Receipt::create($formData)){
            Session::flash('message','Receipt Added Successfully!');
        }
        if ($invoice_id) {
          return redirect()->route('users.sale_invoice.invoice',['user_id'=> $user_id, 'invoice_id' => $invoice_id]);
        }
      return redirect()->route('users.receipts',['id' => $user_id]);

   	}

   	public function delete($user_id,$id)
   	{
   		if(Receipt::find($id)->delete()){
   			Session::flash('message','Receipt Deleted Successfully!');
   		}
   		$this->data['id'] 	= $id;
   		  return redirect()->route('users.receipts',['id' => $user_id]);
   	}
}
