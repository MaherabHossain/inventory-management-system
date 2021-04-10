 @extends('layout.app')

@section('tittle','sale invoice')

@section('content')
<div class="row clearfix mb-4" >
	<div class="col-md-4">
	<h3 >Parchase invoice details</h3>	
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

			      <h6 class="m-0 font-weight-bold text-primary"> Parchase invoice details </h6>
			    </div>
			    <div class="card-body">
			    	<div class="row clearfix justify-content-md">
			    		<div class="col-md-6 ">
			    			<p><strong>Supplier : </strong>{{ $user->name }}</p>
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
			    				<td>{{ $item->id }}</td>
			    				<td>{{ $item->Product->tittle }}</td>
			    				<td>{{ $item->Product->price }}</td>
			    				<td>{{ $item->quantity }}</td>
			    				<td>{{ $item->price }}</td>
			    				<td>{{ $item->totla }}</td>
			    				<td>
			    					 {!! Form::open([ 'route' => ['users.purchase_invoice.delete_product', ['user_id' => $user->id, 'invoice_id' => $invoice->id,'item_id'=>$item->id] ], 'method' => 'delete' ]) !!}
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
			    			<th>{{ $total }}</th>
			    			<th></th>

			    			<tr>
			    				<td colspan="5" class="text-right"><strong> Pay : </strong></td>
			    				<td  class="text-right"><strong> {{ $pay }} </strong></td>
			    			</tr>

			    			<tr>
			    				<td colspan="5" class="text-right"><strong> Due : </strong></td>
			    				<td  class="text-right"><strong>  {{ $total - $pay }} </strong></td>
			    			</tr>

			    		</tbody>
			    	</table>
			    </div>
			  </div>                 
		</div>
    </div>
</div>
@stop

<!-- modal for add product -->

<!-- Add model -->

<div class="modal fade" id="add_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   
    	{!! Form::open([ 'route' => ['user.parchase_invoice.add_product', ['user_id' => $user->id, 'invoice_id' => $invoice->id] ], 'method' => 'post' ]) !!}

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


<div class="modal fade" id="add_receipt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    {!! Form::open([ 'route' => ['users.payment.store', ['user_id'=>$user->id,'invoice_id' => $invoice->id ]], 'method' => 'post' ]) !!}
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title " id="newPaymentModalLabel"> New Payments </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">  
          
          <div class="form-group row">
            <label for="date" class="col-sm-3 col-form-label text-right"> Date <span class="text-danger">*</span> </label>
            <div class="col-sm-9">
              {{ Form::date('date', NULL, [ 'class'=>'form-control', 'id' => 'date', 'placeholder' => 'Date', 'required' ]) }}
            </div>
          </div>

          <div class="form-group row">
            <label for="amount" class="col-sm-3 col-form-label text-right">Amount <span class="text-danger">*</span>  </label>
            <div class="col-sm-9">
              {{ Form::text('amount', NULL, [ 'class'=>'form-control', 'id' => 'amount', 'placeholder' => 'Amount', 'required' ]) }}
            </div>
          </div>

          <div class="form-group row">
            <label for="note" class="col-sm-3 col-form-label text-right">Note </label>
            <div class="col-sm-9">
              {{ Form::textarea('note', NULL, [ 'class'=>'form-control', 'id' => 'note', 'rows' => '3', 'placeholder' => 'Note' ]) }}
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

