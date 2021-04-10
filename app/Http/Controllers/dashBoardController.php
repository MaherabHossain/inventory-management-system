<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SaleItems;
use App\Models\ParchaseItems;
use App\Models\Receipt;
use App\Models\Payment;
use App\Models\Product;

class dashBoardController extends Controller
{
    public function index(){

    	$this->data['total_sale']     = SaleItems::all()->sum('price');
    	$this->data['total_purchase'] = ParchaseItems::all()->sum('price');
    	$this->data['total_receipt']  = Receipt::all()->sum('amount');
    	$this->data['total_payment']  = Payment::all()->sum('amount');

        $sale     = SaleItems::all()->sum('quantity');
        $purchase = ParchaseItems::all()->sum('quantity');
        
        $this->data['stocks'] = $purchase - $sale;

        $receipts = Receipt::all();
        $sale_receipt = 0;
        foreach($receipts as $receipt){
            if(isset($receipt->sale_invoice_id)){
                $sale_receipt += $receipt->amount; 
            }
        }
        $this->data['due'] = $this->data['total_sale'] - $sale_receipt;
    	return view('welcome',$this->data);
    }
}
