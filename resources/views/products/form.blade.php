 @extends('layout.app')

@section('tittle','Create User')

@section('content')

<h3>{{ $headline }}</h3>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> Product </h6>
    </div>
    <div class="card-body">
      <div class="row justify-content-md-center">
	       <div class="col-md-6"> 
		    	@if ($errors->any())
		    		<div class="alert alert-danger">
		    			<ul>
		    				@foreach ($errors->all() as $error)
		    					<li>{{ $error }}</li>
		    				@endforeach
		    			</ul>
		    		</div>
		    	@endif
		   			@if (isset($product))
		   				{!! Form::model($product, [ 'route' => ['products.update', $product->id], 'method' => 'put' ]) !!}
		   			@else
		   				{!! Form::open(['route' => 'products.store','method'=>'post']) !!}
		   			@endif
					  <div class="form-group">
					    <label for="tittle">Product Title<i class="text-danger">*</i></label>
					    {{ Form::text('tittle',NULL,['class' => 'form-control','id'=> 'tittle', 'placeholder'=> 'Enter product title'])}}
					  </div>
					  <div class="form-group">
					    <label for="description">Product Description<i class="text-danger">*</i></label>
					     {{ Form::textarea('description',NULL,['class' => 'form-control','id'=> 'description', 'placeholder'=> 'Enter product description '])}}
					  </div>
					  <div class="form-group">
					    <label for="cost_price">Cost Price<i class="text-danger">*</i></label>
					    {{ Form::text('cost_price',NULL,['class' => 'form-control','id'=> 'cost_price', 'placeholder'=> 'Enter cost price'])}}
					  </div>
					   <div class="form-group">
					    <label for="price">Price<i class="text-danger">*</i></label>
					    {{ Form::text('price',NULL,['class' => 'form-control','id'=> 'price', 'placeholder'=> 'Enter Price'])}}
					  </div>
					  <div class="form-group">
					    <label for="select">Select Catagory<i class="text-danger">*</i> </label>
					      {{ Form::select('category_id',$categories,NULL,['class' => 'form-control','id'=> 'select', 'placeholder'=> 'Categories'])}}
					  </div>
					  <div class="text-right">
					  	<button type="submit" class="btn btn-primary">{{ $button }}</button>
					  </div>
				{!! Form::close() !!}
			  </div>
		 </div>
    </div>
 </div>

@stop