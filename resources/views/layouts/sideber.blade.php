<div class="col-sm-2 sidenav m-0 p-0">
    <!-- Main sidebar -->
<div id="sidebar-main" class="sidebar sidebar-default sidebar-separate sidebar-fixed">
	<div class="sidebar-content">
		<div class="sidebar-category sidebar-default">
			<div class="sidebar-user">
				<div class="category-content">
					<h6>{{ Auth::user()->name }}</h6>
					<small>Admin</small>
				</div>
			</div>
		</div>
		<!-- /Sidebar Category -->
		<div class="sidebar-category sidebar-default">
				<div class="category-title">
					<span>Products</span>
				</div>
			<div class="category-content">
				<ul id="fruits-nav" class="nav flex-column">
					<li class="nav-item">
						<a href="{{ route('products.index') }}" class="nav-link">
							<i class="fas fa-box" aria-hidden="true"></i>
							All Products
						</a>
					</li>
					<li class="nav-item">
                    <a href="{{ route('products.create') }}" class="nav-link">
							<i class="fas fa-box-open" aria-hidden="true"></i>
							Add Product
						</a>
					</li>
				</ul>
				<!-- /Nav -->
			</div>
			<!-- /Category Content -->
		</div>
		<!-- /Sidebar Category -->
		<div class="sidebar-category sidebar-default">
            <div class="category-title">
                <span>Users</span>
            </div>
        <div class="category-content">
            <ul id="sidebar-editable-nav" class="nav flex-column">
                <li class="nav-item">
                    <a href="/admin/customers" class="nav-link">
                        <i class="fas fa-users" aria-hidden="true"></i>
                        All Users
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/resettest" class="nav-link">
                        <i class="fas fa-user-plus" aria-hidden="true"></i>
                        Add User
                    </a>
                </li>
            </ul>
            <!-- /Nav -->
        </div>
        <!-- /Category Content -->
    </div>
    <!-- /Sidebar Category -->
		<div class="sidebar-category sidebar-default">
            <div class="category-title">
                <span>Others</span>
            </div>
        <div class="category-content">
            <ul id="sidebar-editable-nav" class="nav flex-column">
                <li class="nav-item">
                    <a href="#other-fruits" class="nav-link" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="other-fruits">
                        Others
                    </a>
                    <ul id="other-fruits" class="flex-column collapse">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                Orange
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="#" class="nav-link">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                Kiwi
                            </a>
                        </li>
                    </ul>
                    <!-- /Sub Nav -->
                </li>
            </ul>
            <!-- /Nav -->
        </div>
        <!-- /Category Content -->
    </div>
    <!-- /Sidebar Category -->
	</div>
</div>
<!-- /main sidebar -->
</div>