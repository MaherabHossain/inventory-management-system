 @extends('layout.app')

@section('tittle','Users')

@section('content')
<div class="row clearfix mb-4">
    <div class="col-md-4">
    <h3>Parchase</h3>    
    </div>
    <div class="col-md-8 text-right">
       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_parchase">
      <i class="fa fa-plus"></i> Add Parchase 
      </button>
    </div>
</div>

<div class="row clearfix">
    <div class="col-md-2">
        <x-usershow :id="$user->id"/>
    </div>
    <div class="col-md-9">
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
                      <th>Challen No</th>
                      <th>Customer</th>
                      <th>Date</th>
                      <th>Total</th>
                      <th class="text-right">Actions</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Challen No</th>
                      <th>Customer</th>
                      <th>Date</th>
                      <th>Total</th>
                      <th class="text-right">Actions</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($user->parchases as $parchase)
                        <tr>
                          <td> {{ $parchase->challan_no }} </td>
                          <td> {{ $user->name }} </td>
                          <td> {{ $parchase->date }} </td>
                          <td> 100 </td>
                          <td class="text-right">
                            <form method="POST" action=" {{ route('user.parchase_invoice.delete', ['user_id' => $user->id,'invoice_id' => $parchase->id]) }} ">
                                <a class="btn btn-primary btn-sm" href="{{ route('user.parchase_invoice.invoiceDetails', ['user_id' => $user->id,'invoice_id' => $parchase->id]) }}"> 
                                    <i class="fa fa-eye"></i> 
                                </a>
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

<!-- Add modal -->


<div class="modal fade" id="add_parchase" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    {!! Form::open([ 'route' => ['user.parchase_invoice.store', ['user_id'=>$user->id]], 'method' => 'post' ]) !!}
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

