<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Receipt;
use App\Http\Requests\receiptRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class receiptsController extends Controller
{
   	public function index( $id ){

   		$this->data['users']	= User::findOrFail( $id );
   		return view('users.receipts.receipts',$this->data);
   	}

   	public function store( receiptRequest $request, $id){

   		$formData	 			= $request->all();
    	$formData['user_id']	= $id;
    	$formData['admin_id']	= Auth::id();
    	if(Receipt::create($formData)){
            Session::flash('message','Receipt Added Successfully!');
        }
      return redirect()->route('users.receipts',['id' => $id]);

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
