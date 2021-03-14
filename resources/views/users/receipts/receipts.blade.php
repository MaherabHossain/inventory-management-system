 @extends('layout.app')

@section('tittle','Receipts')

@section('content')
<div class="row clearfix mb-4">
	<div class="col-md-4">
	<h3>Receipts</h3>	
	</div>
	<div class="col-md-8 text-right">
		    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_receipt">
         <i class="fa fa-plus"></i> Add Receipt 
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
    	<h6 class="m-0 font-weight-bold text-primary">Receipts</h6>
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
                        <th>User Name</th>
                        <th>Collected by</th>
                        <th>Date</th>
                        <th>Total</th>
                        <th>Note</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tfoot>
                  <tr>
                        <th>Total</th>
                        <th></th>
                        <th></th>
                        <th>{{ $users->receipts->sum('amount') }}</th>
                        <th></th>
                        <th class="text-right"></th>
                    </tr>

                    <tr>
                        <th>User Name</th>
                        <th>Collected by</th>
                        <th>Date</th>
                        <th>Total</th>
                        <th>Note</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                 	@foreach($users->receipts as $receipts)
                    <tr>
                        <td>{{ $users->name}}</td>
                        <td>{{ $receipts->admin->name}}</td>
                        <td>{{ $receipts->date}}</td>
                        <td>{{ $receipts->amount}}</td>
                        <td>{{ $receipts->note}}</td>
                        <td class="text-right">
                      <form method="POST" action=" {{ route('users.receipts.delete', ['id' => $receipts->id, 'user_id' => $users->id]) }} ">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"> 
                          <i class="fa fa-trash"></i>  
                        </button> 
                      </form>                       
                        </td>
                    </tr>
                    @endforeach

                </tbody>

            </table>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="add_receipt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    {!! Form::open([ 'route' => ['users.receipts.store', $users->id], 'method' => 'post' ]) !!}
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newPaymentModalLabel"> New Payments </h5>
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
            <label for="amount" class="col-sm-3 col-form-label">Amount <span class="text-danger">*</span>  </label>
            <div class="col-sm-9">
              {{ Form::text('amount', NULL, [ 'class'=>'form-control', 'id' => 'amount', 'placeholder' => 'Amount', 'required' ]) }}
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
          <button type="submit" class="btn btn-primary">Submit</button> 
        </div>
      </div>
      {!! Form::close() !!}
  </div>
</div>
@stop

