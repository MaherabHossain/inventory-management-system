 @extends('layout.app')

@section('tittle','Products')

@section('content')
<div class="row clearfix mb-4">
	<div class="col-md-6">
	<h3>Product List</h3>	
	</div>
	<div class="col-md-6 text-right">
		<a href="{{ route('products.create') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> Add Products </a>
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
                        <th>Category</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Cost Price</th>
                        <th>Price</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Cost Price</th>
                        <th>Price</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                 	@foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->category->tittle }}</td>
                        <td>{{ $product->tittle}}</td>
                        <td>{{ $product->description}}</td>
                        <td>{{ $product->cost_price}}</td>
                        <td>{{ $product->price}}</td>
                        <td class="text-right">
                       {!! Form::open(['url' => 'products/'.$product->id,'method'=>'delete']) !!}

                       <a href="{{ route('products.show',['product'=>$product->id]) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>

                       <a href="{{ route('products.edit',['product'=>$product->id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>

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

