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
        <x-usershow :id="$users->id"/>
    </div>
    <div class="col-md-9">
<div class="card-body">
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
                    @foreach ($users->parchase as $parchase)
                        <tr>
                          <td> {{ $parchase->challan_no }} </td>
                          <td> {{ $users->name }} </td>
                          <td> {{ $parchase->date }} </td>
                          <td> 100 </td>
                          <td class="text-right">
                            <form method="POST" action=" {{ route('users.destroy', ['user' => $users->id]) }} ">
                                <a class="btn btn-primary btn-sm" href="{{ route('users.show', ['user' => $users->id]) }}"> 
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
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>




@stop

