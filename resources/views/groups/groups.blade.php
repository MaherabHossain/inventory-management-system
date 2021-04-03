 @extends('layout.app')

@section('tittle','Groups')

@section('content')



<div class="row clearfix mb-4">
	<div class="col-md-6">
	<h2>Users Group</h2>	
	</div>
	<div class="col-md-6 text-right">
		<a href="{{ url('groups/create') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> Add Group </a>
	</div>
</div>
         @if(session('message'))
        	<div class="alert alert-success" role="alert">
        		<h5>{{ session('message') }}</h5>
        	</div>
         @endif
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Groups</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tittle</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tfoot>

                    <tr>
                        <th>ID</th>
                        <th>Tittle</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                 	@foreach($groups as $group)
                    <tr>
                        <td>{{ $group->id }}</td>
                        <td>{{ $group->tittle}}</td>

                        <td class="text-right">
                        <form method="post" action="{{ url('groups/'.$group->id) }}">
                        	@csrf
                        	@method('delete')
                        	<button onclick="return confirm('Are you sure')" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> Delete</button>
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