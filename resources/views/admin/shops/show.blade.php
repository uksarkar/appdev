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
                <li class="breadcrumb-item"><a href="{{ route("shops.index") }}">All Shops</a></li>
                <li class="breadcrumb-item active">View Shop</li>
                <!-- Breadcrumb Menu-->
                <li class="breadcrumb-menu d-md-down-none">
                    <div class="btn-group" role="group" aria-label="Button group"><a class="btn" href="/"><i class="icon-graph"></i>  Dashboard</a></div>
                </li>
            </ol>
            <div class="container-fluid">
                <div class="animated fadeIn">
                <!-- /.row-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header"><i class="fa fa-view"></i>View Shop</div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img src="@if($shop->image){{ $shop->image->url }}@else https://via.placeholder.com/300x300.png?text=No+Image @endif" alt="Image" width="300" class="img img-thumbnail">
                                        </div>
                                        <div class="col-sm-9">
                                            <h4 class="card-title">{{ $shop->name }}</h4>
                                            <div class="card-text">
                                                {{ $shop->description }}
                                            </div>
                                            <div class="card-accent-dark">
                                                <a href="{{ route("shops.edit", $shop->id) }}" class="btn btn-primary">Edit</a>
                                                <button class="btn btn-danger subbtn">Delete</button>
                                            </div>
                                            <form class="formsub" method="POST" action="{{ route("products.destroy", $shop->id) }}">@csrf @method("DELETE")</form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-->
                    </div>
                    <!-- /.row-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header"><i class="fa fa-view"></i>Available Products</div>
                                <div class="card-body">
                                    @if(!blank($shop->products))
                                        <table class="table table-responsive-sm table-hover table-outline mb-0">
                                            <thead class="thead-light">
                                            <tr>
                                                <th class="text-center"><i class="icon-picture"></i> Image</th>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Description</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($shop->products as $product)
                                                <tr>
                                                    <td class="text-center">
                                                        <div class="thumbnail"><img class="img img-thumbnail" src="@if($product->image) {{ $product->image->url }} @else https://via.placeholder.com/100x100.png?text=No+Image @endif" width="100" alt="image"></div>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('products.show', $product->id ) }}">{{ $product->name }}</a>
                                                        <div class="small text-muted">Last Update: {{ $product->updated_at->diffForHumans() }}</div>
                                                    </td>
                                                    <td>
                                                        <p class="bg-light p-1 rounded">{{ $product->price()->where('shop_id',$shop->id)->first()->amounts }}</p>
                                                    </td>
                                                    <td>
                                                        {{  Str::limit($product->description, 70, ' (...)') }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <div class="bg-cyan p-1 rounded">
                                            This shop doesn't have any product yet.
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- /.col-->
                    </div>
                    <!-- /.row-->
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
