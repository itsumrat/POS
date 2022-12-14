<div class="row">
	<div class="left-nav">
		<ul class="main-nav">
			<li><a href="#">Sales / Invoicing</a></li>
			<li><a class="{{ Request::is('pos/dashboard') == " pos/dashboard" ? 'nav-title' : '' }}"
					href="{{ route('pos.dashboard') }}">POS Dashboard</a></li>
			@if( App\Http\Controllers\PermissionAccess::menuAccess(1,1))
			<li><a href="{{route('item.index')}}">Item Master</a></li>
			@endif
			@if( App\Http\Controllers\PermissionAccess::menuAccess(2,1))
			<li><a href="{{route('inventory.index')}}">Inventory Master</a></li>
			@endif
			@if( App\Http\Controllers\PermissionAccess::menuAccess(3,1))
			<li><a href="{{route('costing.index')}}">Costing vs Pricing</a></li>
			@endif
			@if( App\Http\Controllers\PermissionAccess::menuAccess(4,1))
			<li><a href="{{route('barcode.index')}}">Print Barcode</a></li>
			@endif
			@if( App\Http\Controllers\PermissionAccess::menuAccess(5,1))
			<li><a href="{{route('requisition.index')}}">Requisition / Pre-Order</a></li>
			@endif
			@if( App\Http\Controllers\PermissionAccess::menuAccess(6,1))
			<li><a href="{{route('purchase.index')}}">Purchase Master</a></li>
			@endif
			@if( App\Http\Controllers\PermissionAccess::menuAccess(7,1))
			<li><a href="{{route('customer.index')}}">Customer Master</a></li>
			@endif
			@if( App\Http\Controllers\PermissionAccess::menuAccess(8,1))
			<li><a href="{{route('vendor.index')}}">Vendor Master</a></li>
			@endif
			@if( App\Http\Controllers\PermissionAccess::menuAccess(22,1))
			<li><a href="{{route('payables.index')}}">Payables</a></li>
			@endif
			@if( App\Http\Controllers\PermissionAccess::menuAccess(23,1))
			<li><a href="{{route('receivables.index')}}">Receivables</a></li>
			@endif
			@if( App\Http\Controllers\PermissionAccess::menuAccess(24,1))
			<li><a href="{{route('account.index')}}">Manage Accounts</a></li>
			@endif
			@if( App\Http\Controllers\PermissionAccess::menuAccess(9,1))
			<li><a href="{{route('settings.index')}}">Standard POS Settings</a></li>
			@endif
			@if( App\Http\Controllers\PermissionAccess::menuAccess(10,1))
			<li><a href="{{ url('/home/standard_pos') }}">POS Window</a></li>
			@endif
			@if( App\Http\Controllers\PermissionAccess::menuAccess(15,1))
			<li><a href="{{ route('menu.index') }}">Permission</a></li>
			@endif

		</ul>
	</div>
</div>