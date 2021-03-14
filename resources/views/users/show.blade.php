 @extends('layout.app')

@section('tittle','Users')

@section('content')
<div class="row clearfix mb-4">
	<div class="col-md-4">
	<h3>User Information</h3>	
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
			      <h6 class="m-0 font-weight-bold text-primary"> {{ $user->name }} </h6>
			    </div>
			    <div class="card-body">
			    	<div class="row clearfix justify-content-md-center">
			    		<div class="col-md-8">
			    			<table class="table table-borderless table-striped">
					      	<tr>
					      		<th class="text-right">Group :</th>
					      		<td> {{ $user->group->tittle }} </td>
					      	</tr>
					      	<tr>
					      		<th class="text-right">Name : </th>
					      		<td> {{ $user->name }} </td>
					      	</tr>
					      	<tr>
					      		<th class="text-right">Eamil : </th>
					      		<td> {{ $user->email }} </td>
					      	</tr>
					      	<tr>
					      		<th class="text-right">Phone : </th>
					      		<td> {{ $user->phone }} </td>
					      	</tr>
					      	<tr>
					      		<th class="text-right">Address : </th>
					      		<td> {{ $user->address }} </td>
					      	</tr>
						     </table>
			    		</div>
			    	</div>
			    </div>
			  </div>                 
		</div>
    </div>
</div>






@stop