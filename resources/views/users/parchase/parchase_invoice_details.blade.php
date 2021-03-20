 @extends('layout.app')

@section('tittle','sale invoice')

@section('content')
<div class="row clearfix mb-4" >
	<div class="col-md-4">
	<h3 >Product invoice details</h3>	
	</div>

	<div class="col-md-8 text-right">
		<a href="#" class="btn btn-info btn-sm"><i class="fa fa-save"> print invoice</i></a>
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

			    	  @if(session('message'))
			            <div class="alert alert-success" role="alert">
			                <h5>{{ session('message') }}</h5>
			            </div>
			         @endif
			    	<table class="table table-borderless">
			    		<thead>
			    			<th>SL</th>
			    			<th>Product</th>
			    			<th>Price</th>
			    			<th>Quantity</th>
			    			<th>Unit price</th>
			    			<th>Total</th>
			    			<th></th>
			    		</thead>

			    		<tfoot>
			    			
			    			
			    		</tfoot>

			    		<tbody>
			    			@foreach($invoice->items as $key => $item)
			    			<tr>
			    				<td>{{ $key+1 }}</td>
			    				<td>{{ $item->Product->tittle }}</td>
			    				<td>{{ $item->Product->price }}</td>
			    				<td>{{ $item->quantity }}</td>
			    				<td>{{ $item->price }}</td>
			    				<td>{{ $item->totla }}</td>
			    				<td>
			    					 {!! Form::open([ 'route' => ['users.sale_invoice.invoice.delete_product', ['user_id' => $user->id, 'invoice_id' => $invoice->id,'item_id'=>$item->id] ], 'method' => 'delete' ]) !!}
			                          <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"> 
			                            <i class="fa fa-trash"></i>  
			                          </button> 
			                       {!! Form::close() !!}
			    				</td>
			    			</tr>
			    			@endforeach
			    			<th>
			    				<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_product">
						        	 <i class="fa fa-plus"></i> Add Product 
						       </button>

						       <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#add_receipt">
						        	 <i class="fa fa-plus"></i> Add Payment 
						       </button>

			    			</th>
			    			<th colspan="4" class="text-right">Total : </th>
			    			<th>{{ $total = $invoice->items->sum('totla') }}</th>
			    			<th></th>

			    			<tr>
			    				<td colspan="5" class="text-right"><strong> Pay : </strong></td>
			    				<td  class="text-right"><strong> NULL() </strong></td>
			    			</tr>

			    			<tr>
			    				<td colspan="5" class="text-right"><strong> Due : </strong></td>
			    				<td  class="text-right"><strong> NULL() </strong></td>
			    			</tr>

			    		</tbody>
			    	</table>
			    </div>
			  </div>                 
		</div>
    </div>
</div>
@stop

