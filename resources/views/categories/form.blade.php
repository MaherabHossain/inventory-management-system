 @extends('layout.app')

@section('tittle','Create User')

@section('content')

<h3>{{ $headline }}</h3>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
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
		   			@if (isset($categories))
		   				{!! Form::model($categories, [ 'route' => ['categories.update', $categories->id], 'method' => 'put' ]) !!}
		   			@else
		   				{!! Form::open(['route' => 'categories.store','method'=>'post']) !!}
		   			@endif
					   <div class="form-group">
					    <label for="tittle">Category<i class="text-danger">*</i></label>
					    {{ Form::text('tittle',NULL,['class' => 'form-control','id'=> 'tittle', 'placeholder'=> 'Enter categories title'])}}
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