<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item"><a class="nav-link" href="{{ route("home") }}"><i class="nav-icon icon-speedometer"></i> Dashboard</a></li>
            <li class="nav-title">Products</li>
            <li class="nav-item"><a class="nav-link" href="{{ route("products.index") }}"><i class="nav-icon icon-layers"></i> All Products</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route("products.create") }}"><i class="nav-icon icon-plus"></i> Add Product</a></li>
            <li class="nav-title">Users</li>
            <li class="nav-item"><a class="nav-link" href="{{ route("users.index") }}"><i class="nav-icon icon-people"></i> All Users</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route("users.create") }}"><i class="nav-icon icon-user-follow"></i> Add User</a></li>
            <li class="nav-title">Shops</li>
            <li class="nav-item"><a class="nav-link" href="{{ route("shops.index") }}"><i class="nav-icon icon-basket-loaded"></i> All Shops</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route("shops.create") }}"><i class="nav-icon icon-plus"></i> Add Shop</a></li>
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
