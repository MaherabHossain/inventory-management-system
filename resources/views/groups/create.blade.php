 @extends('layout.app')

@section('tittle','Groups')

@section('content')

<h1>Create New Group</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">New Group</h6>
    </div>
   <div class="card-body">
      <div class="row justify-content-md-center">
	       <div class="col-md-6"> 
		   		<form method="post" action="{{ url('groups') }}">
		   			@csrf
					  <div class="form-group">
					    <label for="exampleInputEmail1">User Group Name</label>
					    <input type="tittle" class="form-control" id="tittle" name="tittle" aria-describedby="emailHelp" placeholder="Enter User Group Name" required>
					    <small id="emailHelp" class="form-text text-muted">Tittle of users group</small>
					  </div>
					  <button type="submit" class="btn btn-primary">Create</button>
				</form>
			  </div>
		 </div>
    </div>
 </div>

@stop