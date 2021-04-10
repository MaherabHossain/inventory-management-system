 @extends('layout.app')

@section('tittle','sale reports')

@section('content')
<div class="row clearfix mb-4">
	<div class="col-md-6">
	<h3>Purchase Reports</h3>	
	</div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
    	<h6 class="m-0 font-weight-bold text-primary">Search Report</h6>
    </div>
     @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card-body">
       {!! Form::open(['route' => 'purchase_information.search','method'=>'post']) !!}
            <div class="row mb-4">
                <div class="col-md-3">                 
                    {{ Form::date('date1',NULL,['class' => 'form-control'])}}
                </div>
                <strong class="text-primary">TO</strong>
                <div class="col-md-3">
                    {{ Form::date('date2',NULL,['class' => 'form-control'])}}
                </div>
                <div class="col-md-3">
                    <input type="submit" name="" class="btn btn-info" value="search">
                </div>
            </div>
        {!! Form::close() !!}
        <div class="table-responsive">
                @if(session('message'))
                    <div class="alert alert-success" role="alert">
                        <h5>{{ session('message') }}</h5>
                    </div>
                 @endif
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0;?>
                 	@foreach($purchase as $purchase)
                    <tr>
                        <td>{{ $purchase->id }}</td>
                        <td>{{ $purchase->product->tittle }}</td>
                        <td>{{ $purchase->product->category->tittle }}</td>
                        <td>{{ $purchase->quantity }}</td>
                        <td>{{ $purchase->totla }}</td>
                        <?php
                            $total += $purchase->price;
                        ?>
                        <td>{{ $purchase->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Product</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>{{ $total }}</th>
                        <th>Date</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@stop

