<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\paymentRequest;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class paymentController extends Controller
{
    public function index( $id ){
    	$this->data['users'] = User::findOrfail( $id );
    	return view('users.payment.payment',$this->data);
    }

    public function store( paymentRequest $request, $user_id , $invoice_id){
    	$formData	 = $request->all();
    	$formData['user_id'] = $user_id;
      $formData['admin_id'] = Auth::id();
      if($invoice_id){
        $formData['parchase_invoice_id'] = $invoice_id;
      }
    	if(Payment::create($formData)){
            Session::flash('message','Payment Added Successfully!');
        }
        if ($invoice_id) {
          return redirect()->route('user.parchase_invoice.invoiceDetails',['user_id'=>$user_id,'invoice_id'=>$invoice_id]);
        }
        return redirect()->route('users.payment',['id' => $id]);
    }



    public function delete( $user_id,$id){
   		if(Payment::find($id)->delete()){
   			Session::flash('message','Payment Deleted Successfully!');
   		}
   		$this->data['id'] = $id;
   		  return redirect()->route('users.payment',['id' => $user_id]);
   }
}
