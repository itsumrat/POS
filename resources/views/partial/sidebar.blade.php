<div class="row">
	<div class="left-nav">
		<ul class="main-nav">
			<li><a href="#">Sales / Invoicing</a></li>
			<li><a class="{{ Request::is('pos/dashboard') == "pos/dashboard" ? 'nav-title' : '' }}" href="{{ route('pos.dashboard') }}">POS Dashboard</a></li>
			@if( App\Http\Controllers\PermissionAccess::menuAccess(1,1))
				<li><a href="item_master.php">Item Master</a></li>
			@endif
			@if( App\Http\Controllers\PermissionAccess::menuAccess(2,1))
			<li><a href="{{route('inventory.index')}}">Inventory Master</a></li>
			@endif
			@if( App\Http\Controllers\PermissionAccess::menuAccess(3,1))
			<li><a href="costing_pricing.php">Costing vs Pricing</a></li>
			@endif
			@if( App\Http\Controllers\PermissionAccess::menuAccess(4,1))
			<li><a href="print_barcode.php">Print Barcode</a></li>
			@endif
			@if( App\Http\Controllers\PermissionAccess::menuAccess(5,1))
			<li><a href="{{route('requisition.index')}}">Requisition / Pre-Order</a></li>
			@endif
			@if( App\Http\Controllers\PermissionAccess::menuAccess(6,1))
			<li><a href="{{route('purchase.index')}}">Purchase Master</a></li>
			@endif
			@if( App\Http\Controllers\PermissionAccess::menuAccess(7,1))
			<li><a href="customer_master.php">Customer Master</a></li>
			@endif
			@if( App\Http\Controllers\PermissionAccess::menuAccess(8,1))
			<li><a href="{{route('vendor.index')}}">Vendor Master</a></li>
			@endif
			@if( App\Http\Controllers\PermissionAccess::menuAccess(22,1))
			<li><a href="payables.php">Payables</a></li>
			@endif
			@if( App\Http\Controllers\PermissionAccess::menuAccess(23,1))
			<li><a href="receivables.php">Receivables</a></li>
			@endif
			@if( App\Http\Controllers\PermissionAccess::menuAccess(24,1))
			<li><a href="accounts.php">Manage Accounts</a></li>
			@endif
			@if( App\Http\Controllers\PermissionAccess::menuAccess(9,1))
			<li><a href="spos_settings.php">Standard POS Settings</a></li>
			@endif
			@if( App\Http\Controllers\PermissionAccess::menuAccess(10,1))
			<li><a href="standard_pos.php">POS Window</a></li>
			@endif
			@if( App\Http\Controllers\PermissionAccess::menuAccess(15,1))
				<li><a href="{{ route('menu.index') }}">Permission</a></li>
			@endif
			
		</ul>
	</div>
</div>