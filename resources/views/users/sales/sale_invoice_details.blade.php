 @extends('layout.app')

@section('tittle','sale invoice')

@section('content')
<div class="row clearfix mb-4">
	<div class="col-md-4">
	<h3>Sale invoice details</h3>	
	</div>
	<div class="col-md-8 text-right">

	</div>
</div>

<div class="row clearfix">
	<div class="col-md-2">
		<x-usershow :id="$user->id"/>
    </div>
    <div class="col-md-9">
    	<div class="card shadow mb-4">
            <div class="card shadow mb-4">
			    <div class="card-header py-3">
			      <h6 class="m-0 font-weight-bold text-primary"> Sale invoice details </h6>
			    </div>
			    <div class="card-body">
			    	<div class="row clearfix justify-content-md">
			    		<div class="col-md-6 ">
			    			<p><strong>Customer : </strong>{{ $user->name }}</p>
			    			<p> <strong>Email :</strong> </strong>{{ $user->email }}</p>
			    			<p> <strong>Phone : </strong>{{ $user->phone }}</p>
			    		</div>

			    		<div class="col-md-6 ">
			    			<p><strong>Date : </strong>{{ $invoice->date }}</p>
			    			<p> <strong>Challan No : </strong>{{ $invoice->challan_no }}</p>
			    		</div>
			    	</div>
			    	<table class="table">
			    		<thead>
			    			<th>SL</th>
			    			<th>Product</th>
			    			<th>Price</th>
			    			<th>Quantity</th>
			    			<th>Total</th>
			    			<th>Action</th>
			    		</thead>

			    		<tfoot>
			    			<th colspan="4">Total</th>
			    			<th>{{ $invoice->items->sum('totla') }}</th>
			    			<th></th>
			    			
			    		</tfoot>

			    		<tbody>
			    			@foreach($invoice->items as $item)
			    			<tr>
			    				<td></td>
			    				<td>{{ $item->Product->tittle }}</td>
			    				<td>{{ $item->Product->price }}</td>
			    				<td>{{ $item->quantity }}</td>
			    				<td>{{ $item->totla }}</td>
			    				<td>
			    					 <form method="POST" action=" {{ route('users.sale_invoice.delete', ['id' => $item->id, 'user_id' => $user->id]) }} ">
			                          @csrf
			                          @method('DELETE')
			                          <a href="{{ route('users.sale_invoice.invoice',['user_id'=>$user->id,'invoice_id'=> $invoice->id]) }}" class="btn btn-success btn-sm"><i class="fa fa-eye" ></i></a>
			                          <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"> 
			                            <i class="fa fa-trash"></i>  
			                          </button> 
			                       </form>
			    				</td>
			    			</tr>
			    			@endforeach
			    		</tbody>
			    	</table>
			    </div>
			  </div>                 
		</div>
    </div>
</div>






@stop