@extends('admin.layouts.app')

@section('content')
    <body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
    @include("admin.layouts.header")
    <div class="app-body">
        @include('admin.layouts.sidebar')
        <main class="main">
            <!-- Breadcrumb-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><i class="icon-home"></i></li>
                <li class="breadcrumb-item active">Admin</li>
                <li class="breadcrumb-item"><a href="{{ route("users.index") }}">All Users</a></li>
                <li class="breadcrumb-item active">User Profile</li>
                <!-- Breadcrumb Menu-->
                <li class="breadcrumb-menu d-md-down-none">
                    <div class="btn-group" role="group" aria-label="Button group"><a class="btn" href="/"><i class="icon-graph"></i>  Dashboard</a></div>
                </li>
            </ol>
            <div class="container-fluid">
                <div class="animated fadeIn">
                    @if(count($errors) > 0)
                        @foreach($errors as $error)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Success!</strong> {{ $error }}
                                <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                    @endforeach
                @endif
                <!-- .row-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <img class="card-img-top" src="{{ asset("img/044.jpg") }}" height="150" alt="Card image cap">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-2">
                                        <div class="img-thumbnail mt-n5 text-center"><img src="@if($user->image){{ $user->image->url }} @else https://via.placeholder.com/140x140.png?text=140x140 @endif" alt="{{ $user->name }}" height="140"></div>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="btn btn-secondary disabled">{{ $user->name }}</div>
                                        <a data-toggle="tooltip" data-placement="top" title="Edit User" href="{{ route("users.edit", $user->id)}}" class="btn btn-outline-primary"><i class="icon icon-pencil"></i></a>
                                        <button type="button" data-toggle="tooltip" data-placement="top" title="Delete User" class="btn btn-outline-danger"><i class="icon icon-trash"></i></button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            @if($user->isOnline()) <span class="badge badge-pill badge-success">Online Now</span> @else <span class="badge badge-pill badge-secondary">Offline Now</span> @endif
                                            @if($user->roles)
                                                <div class="card-text">
                                                    @foreach($user->roles as $role)
                                                        <div class="bg-primary p-1 rounded mt-2">{{ $role->name }}</div>
                                                    @endforeach
                                                </div>
                                                @endif
                                                <div class="bg-light p-1 rounded mt-3">
                                                    Location: {{ $user->location }}
                                                </div>
                                                <div class="bg-light p-1 rounded mt-3">
                                                    Phone: {{ $user->phone }}
                                                </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <ul class="list-group">
                                                <li class="list-group-item">Name: {{ $user->name }}</li>
                                                <li class="list-group-item">Last Active: @if($user->activity) {{ $user->activity->updated_at->diffForHumans() }}@else Not active yet @endif</li>
                                                <li class="list-group-item">Products added: @if($user->products) {{ count($user->products) }} @else No product added. @endif</li>
                                                <li class="list-group-item">Email: {{ $user->email }} @if($user->email_verified_at) <span class="badge badge-pill badge-success">Verified</span> @else <span class="badge badge-pill badge-warning">Not verified</span> @endif</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-->
                    </div>
                <!-- /.row-->
                <!-- .row -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card card-accent-primary">
                                <div class="card-header">User shops</div>
                                <div class="card-body">
                                    @if(count($user->shops) > 0)
                                    <table class="table table-responsive-sm table-hover table-outline mb-0">
                                        <thead class="thead-light">
                                        <tr>
                                            <th class="text-center"><i class="icon-picture"></i> Image</th>
                                            <th>Product Name</th>
                                            <th>Actions</th>
                                            <th>Descriptions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($user->shops as $shop)
                                                <tr>
                                                    <td class="text-center">
                                                        <div class="thumbnail"><img class="img img-thumbnail" src="@if($shop->image) {{ $shop->image->url }} @else https://via.placeholder.com/100x100.png?text=No+Image @endif" width="100" alt="image"></div>
                                                    </td>
                                                    <td>
                                                        <div>{{ $shop->name }}</div>
                                                        <div class="small text-muted">Created: {{ $shop->created_at->diffForHumans() }}</div>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route("shops.show", $shop->id) }}" class="btn btn-sm btn-primary">View</a>
                                                        <a href="{{ route("shops.edit", $shop->id) }}" class="btn btn-sm btn-info">Edit</a>
                                                        <button class="btn btn-danger btn-sm subbtn">Delete</button>
                                                        <form class="formsub" method="POST" action="{{ route("shops.destroy", $shop->id) }}">@csrf @method("DELETE")</form>
                                                    </td>
                                                    <td>
                                                        {{  Str::limit($shop->description, 80, ' (...)') }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @else
                                    This user doesn't add any shop yet!
                                    <p>
                                        <a href="{{ route('shops.create') }}" class="btn btn-light active mt-3" type="button">Add Now!</a>
                                    </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- /.row -->
                @if(count($user->products) > 0)
                <!-- .row -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card card-accent-info">
                                <div class="card-header">User added product.</div>
                                <div class="card-body">
                                    <table class="table table-responsive-sm table-hover table-outline mb-0">
                                        <thead class="thead-light">
                                        <tr>
                                            <th class="text-center"><i class="icon-picture"></i> Image</th>
                                            <th>Product Name</th>
                                            <th>Actions</th>
                                            <th>Descriptions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($user->products as $product)
                                                <tr>
                                                    <td class="text-center">
                                                        <div class="thumbnail"><img class="img img-thumbnail" src="@if($product->image) {{ $product->image->url }} @else https://via.placeholder.com/100x100.png?text=No+Image @endif" width="100" alt="image"></div>
                                                    </td>
                                                    <td>
                                                        <div>{{ $product->name }}</div>
                                                        <div class="small text-muted">Created: {{ $product->created_at->diffForHumans() }}</div>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route("products.show", $product->id) }}" class="btn btn-sm btn-primary">View</a>
                                                        <a href="{{ route("products.edit", $product->id) }}" class="btn btn-sm btn-info">Edit</a>
                                                        <button class="btn btn-danger btn-sm subbtn">Delete</button>
                                                        <form class="formsub" method="POST" action="{{ route("products.destroy", $product->id) }}">@csrf @method("DELETE")</form>
                                                    </td>
                                                    <td>
                                                        {{  Str::limit($product->description, 70, ' (...)') }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- /.row -->
                @endif
                </div>
            </div>
        </main>
    </div>
    <footer class="app-footer">
        <div><a href="https://github.com/utpalongit">Utpal Sarkar</a><span>&copy; 2019.</span></div>
        <div class="ml-auto"><span>Powered by</span> Utpal Sarkar</div>
    </footer>
    @include('admin.layouts.footer')
    </body>
@endsection
