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
			    			<th>Total</th>
			    			<th></th>
			    		</thead>

			    		<tfoot>
			    			<th>
			    				<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_product">
						        	 <i class="fa fa-plus"></i> Add Product 
						       </button>
			    			</th>
			    			<th colspan="3" class="text-right">Total : </th>
			    			<th>{{ $invoice->items->sum('totla') }}</th>
			    			<th></th>
			    			
			    		</tfoot>

			    		<tbody>
			    			@foreach($invoice->items as $key => $item)
			    			<tr>
			    				<td>{{ $key+1 }}</td>
			    				<td>{{ $item->Product->tittle }}</td>
			    				<td>{{ $item->Product->price }}</td>
			    				<td>{{ $item->quantity }}</td>
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
			    		</tbody>
			    	</table>
			    </div>
			  </div>                 
		</div>
    </div>
</div>
@stop


<!-- Add model -->

<div class="modal fade" id="add_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   
    	{!! Form::open([ 'route' => ['users.sale_invoice.invoice.add_product', ['user_id' => $user->id, 'invoice_id' => $invoice->id] ], 'method' => 'post' ]) !!}

      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newPaymentModalLabel"> Add Product </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">  
          
		  <div class="form-group row">
		    <label for="product" class="col-sm-3 col-form-label text-right">Product <span class="text-danger">*</span> </label>
		    <div class="col-sm-9">

		      {{ Form::select('product_id', $products, NULL, [ 'class'=>'form-control', 'id' => 'product', 'required', 'placeholder' => 'Select Product' ]) }}
		    </div>
		</div>

          <div class="form-group row">
            <label for="quantity" class="col-sm-3 col-form-label text-right"> Quantity <span class="text-danger">*</span>  </label>
            <div class="col-sm-9">
              {{ Form::text('quantity', NULL, [ 'class'=>'form-control', 'id' => 'quantity', 'placeholder' => 'Quantity', 'required' ]) }}
            </div>
          </div>

          <div class="form-group row">
            <label for="price" class="col-sm-3 col-form-label text-right"> Unit price <span class="text-danger">*</span>  </label>
            <div class="col-sm-9">
              {{ Form::text('price', NULL, [ 'class'=>'form-control', 'id' => 'price', 'placeholder' => 'Unit price', 'required' ]) }}
            </div>
          </div>

          <div class="form-group row">
            <label for="totla" class="col-sm-3 col-form-label text-right"> Total <span class="text-danger">*</span>  </label>
            <div class="col-sm-9">
              {{ Form::text('totla', NULL, [ 'class'=>'form-control', 'id' => 'totla', 'placeholder' => 'Total', 'required' ]) }}
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button> 
        </div>
      </div>
      {!! Form::close() !!}
  </div>
</div>