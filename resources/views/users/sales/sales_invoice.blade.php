 @extends('layout.app')

@section('tittle','Users')

@section('content')
<div class="row clearfix mb-4">
	<div class="col-md-4">
	<h3>Sales Invoice</h3>	
	</div>
	<div class="col-md-8 text-right">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_sale">
         <i class="fa fa-plus"></i> Add Sale 
        </button>
	</div>
</div>

<div class="row clearfix">
	<div class="col-md-2">
		<x-usershow :id="$users->id"/>
    </div>
    <div class="col-md-9">
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
                        <th>Customer Name</th>
                        <th>Challan No</th>
                        <th>Date</th>
                        <th>Total</th>
                        <th>Note</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                    $total = 0;
                  ?>
                 	@foreach($users->sales as $sale)
                    <tr>
                        <td>{{ $sale->id }}</td>
                        <td>{{ $users->name}}</td>
                        <td>{{ $sale->challan_no}}</td>
                        <td>{{ $sale->date}}</td>
                        <?php
                          $total += $sale->items->sum('totla');
                        ?>
                        <td>{{ $sale->items->sum('totla') }}</td>
                        <td>{{ $sale->note}}</td>
                        <td class="text-right">

                      <form method="POST" action=" {{ route('users.sale_invoice.delete', ['id' => $sale->id, 'user_id' => $users->id]) }} ">
                          @csrf
                          @method('DELETE')
                          <a href="{{ route('users.sale_invoice.invoice',['user_id'=>$users->id,'invoice_id'=> $sale->id]) }}" class="btn btn-success btn-sm"><i class="fa fa-eye" ></i></a>
                          <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"> 
                            <i class="fa fa-trash"></i>  
                          </button> 
                      </form>
                        </td>
                    </tr>
                    @endforeach
                    <tfoot>
                      <tr>
                          <th colspan="4" class="text-right">Total</th>
                          <th colspan="3">{{ $total }}</th>
                      </tr>
                  </tfoot>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<!-- Add model -->

<div class="modal fade" id="add_sale" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    {!! Form::open([ 'route' => ['users.sale_invoice.store', $users->id], 'method' => 'post' ]) !!}
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newPaymentModalLabel"> New Sale </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">  
          
          <div class="form-group row">
            <label for="date" class="col-sm-3 col-form-label"> Date <span class="text-danger">*</span> </label>
            <div class="col-sm-9">
              {{ Form::date('date', NULL, [ 'class'=>'form-control', 'id' => 'date', 'placeholder' => 'Date', 'required' ]) }}
            </div>
          </div>

          <div class="form-group row">
            <label for="amount" class="col-sm-3 col-form-label">Challan <span class="text-danger">*</span>  </label>
            <div class="col-sm-9">
              {{ Form::text('challan_no', NULL, [ 'class'=>'form-control', 'id' => 'challan_no', 'placeholder' => 'Challan Number', 'required' ]) }}
            </div>
          </div>

          <div class="form-group row">
            <label for="note" class="col-sm-3 col-form-label">Note </label>
            <div class="col-sm-9">
              {{ Form::textarea('note', NULL, [ 'class'=>'form-control', 'id' => 'note', 'rows' => '3', 'placeholder' => 'Note' ]) }}
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Create</button> 
        </div>
      </div>
      {!! Form::close() !!}
  </div>
</div>



@stop

