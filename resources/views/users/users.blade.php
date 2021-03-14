 @extends('layout.app')

@section('tittle','Users')

@section('content')
<div class="row clearfix mb-4">
	<div class="col-md-6">
	<h3>Users List</h3>	
	</div>
	<div class="col-md-6 text-right">
		<a href="{{ url('users/create') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> Add User </a>
	</div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
    	<h6 class="m-0 font-weight-bold text-primary">Users</h6>
    </div>
    <div class="card-body">
         @if(session('message'))
            <div class="alert alert-success" role="alert">
                <h5>{{ session('message') }}</h5>
            </div>
         @endif
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Group</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tfoot>

                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Group</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                 	@foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name}}</td>
                        <td>{{ $user->group->tittle}}</td>
                        <td>{{ $user->email}}</td>
                        <td>{{ $user->phone}}</td>
                        <td>{{ $user->address}}</td>

                        <td class="text-right">
                       {!! Form::open(['url' => 'users/'.$user->id,'method'=>'delete']) !!}
                       <a href="{{ url('users/'.$user->id) }}" class="btn btn-success btn-sm"> <i class="fa fa-eye" ></i></a>

                       <a href="{{ url('users/'.$user->id.'/edit') }}" class="btn btn-primary btn-sm"> <i class="fa fa-edit" ></i></a>
                            
                        	<button onclick="return confirm('Are you sure')" class="btn btn-danger mb-1 btn-sm"> <i class="fa fa-trash"></i> </button>

                        </form>
                       
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop