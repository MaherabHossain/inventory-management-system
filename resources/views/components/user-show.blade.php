<div class="nav flex-column nav-pills " >
	<a href="{{ route('users.show',$id) }}" class="btn btn-primary text-left">User Information</a>
	<a href="{{ route('users.sale_invoice',$id) }}" class="btn btn-primary mt-1 text-left">Sales</a>
	<a href=" {{ route('users.parchase_invoice',$id) }} " class="btn btn-primary mt-1 text-left">Perchase</a>
	<a href="{{ route('users.payment',$id) }}" class="btn btn-primary mt-1 text-left">Payment</a>
	<a href="{{ route('users.receipts',$id) }}" class="btn btn-primary mt-1 text-left">Receipts</a>
</div>
