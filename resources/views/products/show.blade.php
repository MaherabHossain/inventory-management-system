 @extends('layout.app')

@section('tittle','Product')

@section('content')
<div class="row clearfix mb-4">
	<div class="col-md-4">
	<h3>Product Information</h3>	
	</div>
<!-- 	<div class="col-md-8 text-right">
		<a href="{{ url('users/create') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> Add Sale </a>
		<a href="{{ url('users/create') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> Add Parchase </a>
		<a href="{{ url('users/create') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> Add Payment </a>
		<a href="{{ url('users/create') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> Add Receipt </a>
	</div> -->
</div>

<div class="card shadow mb-4">
            <div class="card shadow mb-4">
	    <div class="card-header py-3">
	      <h6 class="m-0 font-weight-bold text-primary"> {{ $product->tittle }} </h6>
	    </div>
	    <div class="card-body">
	    	<div class="row clearfix justify-content-md-center">
	    		<div class="col-md-8">
	    			<table class="table table-borderless table-striped">
	    			  <tr>
			      		<th class="text-right">Name : </th>
			      		<td> {{ $product->tittle }} </td>
			         </tr>
			      	<tr>
			      		<th class="text-right">Category :</th>
			      		<td> {{ $product->category->tittle }} </td>
			      	</tr>
			      	<tr>
			      		<th class="text-right">Cost Price : </th>
			      		<td> {{ $product->cost_price }} </td>
			      	</tr>
			      	<tr>
			      		<th class="text-right">Price : </th>
			      		<td> {{ $product->price }} </td>
			      	</tr>
			      	<tr>
			      		<th class="text-right">Description : </th>
			      		<td> {{ $product->description }} </td>
			      	</tr>
				     </table>
	    		</div>
	    	</div>
	    </div>
	  </div>                
      
</div>

@stop