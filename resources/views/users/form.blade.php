 @extends('layout.app')

@section('tittle','Create User')

@section('content')

<h3>{{ $headline1 }}</h3>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> {{ $headline2 }} </h6>
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
		   			@if (isset($user))
		   				{!! Form::model($user, [ 'route' => ['users.update', $user->id], 'method' => 'put' ]) !!}
		   			@else
		   				{!! Form::open(['route' => 'users.store','method'=>'post']) !!}
		   			@endif
					  <div class="form-group">
					    <label for="name">User Name<i class="text-danger">*</i></label>
					    {{ Form::text('name',NULL,['class' => 'form-control','id'=> 'name', 'placeholder'=> 'Enter user name'])}}
					  </div>
					  <div class="form-group">
					    <label for="email">User Email<i class="text-danger">*</i></label>
					     {{ Form::text('email',NULL,['class' => 'form-control','id'=> 'email', 'placeholder'=> 'Enter user email '])}}
					  </div>
					  <div class="form-group">
					    <label for="phone">User Phone<i class="text-danger">*</i></label>
					    {{ Form::text('phone',NULL,['class' => 'form-control','id'=> 'phone', 'placeholder'=> 'Enter user phone'])}}
					  </div>
					   <div class="form-group">
					    <label for="address">User Address<i class="text-danger">*</i></label>
					    {{ Form::text('address',NULL,['class' => 'form-control','id'=> 'address', 'placeholder'=> 'Enter user address'])}}
					  </div>
					  <div class="form-group">
					    <label for="select">Select Group<i class="text-danger">*</i> </label>
					      {{ Form::select('group_id',$groups,NULL,['class' => 'form-control','id'=> 'select', 'placeholder'=> 'Group'])}}
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