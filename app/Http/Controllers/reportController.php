<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\searchRequest;
use App\Models\saleItems;
use App\Models\ParchaseItems;
use App\Models\Payment;
use App\Models\Receipt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;

class reportController extends Controller
{
    public function index(){

    	$this->data['sale_items']  = saleItems::all();
    	return view('reports.sale',$this->data);
    }

    public function search_sale ( searchRequest $request ){

        $date = Carbon::createFromDate($request->date2)->addDay();
        $date2 = $date->toDateString();

    	$this->data['sale_items'] = saleItems::where('created_at', '>=', $request->date1)
					    ->where('created_at', '<=', $date2)
					    ->get();
		Session::flash('message','Result for '.$request->date1.'  TO  ' .$request->date2);
		return view('reports.sale',$this->data);
    }

    public function index_purchase (){
    	$this->data['purchase'] = ParchaseItems::all();

    	return view('reports.purchase',$this->data);
    }

    public function search_purchase ( searchRequest $request ){

         $date = Carbon::createFromDate($request->date2)->addDay();
        $date2 = $date->toDateString();

    	$this->data['purchase'] = ParchaseItems::where('created_at', '>=', $request->date1)
										       ->where('created_at', '<=', $request->date2)
										       ->get();
		Session::flash('message','Result for '.$request->date1.'  TO  ' .$date2);
		return view('reports.purchase',$this->data);
    }

    public function index_payment () {
    	$this->data['payment'] = Payment::all();

    	return view ('reports.payment',$this->data);
    }

    public function search_payment ( searchRequest $request ){

         $date = Carbon::createFromDate($request->date2)->addDay();
        $date2 = $date->toDateString();

    	$this->data['payment'] = Payment::where('created_at', '>=', $request->date1)
									    ->where('created_at', '<=', $date2)
									    ->get();
		Session::flash('message','Result for '.$request->date1.'  TO  ' .$request->date2);
		return view('reports.payment',$this->data);
    }

    public function index_receipt (){

    	$this->data['receipt'] = Receipt::all();

    	return view('reports.receipt',$this->data);
    }

    public function search_receipt ( searchRequest $request ){

         $date = Carbon::createFromDate($request->date2)->addDay();
        $date2 = $date->toDateString();

		$this->data['receipt'] = Receipt::where('created_at', '>=', $request->date1)
					    ->where('created_at', '<=', $date2)
					    ->get();
		Session::flash('message','Result for '.$request->date1.'  TO  ' .$request->date2);
		return view('reports.receipt',$this->data);
	}
}
