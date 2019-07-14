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
                <li class="breadcrumb-item"><a href="{{ route("products.index") }}">All Products</a></li>
                <li class="breadcrumb-item active">View Product</li>
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
                                <div class="card-header"><i class="fa fa-view"></i>View Product</div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img src="@if($product->image){{ $product->image->url }}@else https://via.placeholder.com/300x300.png?text=No+Image @endif" alt="Image" width="300" class="img img-thumbnail">
                                        </div>
                                        <div class="col-sm-9">
                                            <h4 class="card-title">{{ $product->name }}</h4>
                                            <div class="card-text">
                                                {{ $product->description }}
                                            </div>
                                            <div class="card-accent-dark">
                                                <a href="{{ route("products.edit", $product->id) }}" class="btn btn-primary">Edit</a>
                                                <button class="btn btn-danger subbtn">Delete</button>
                                            </div>
                                            <form class="formsub" method="POST" action="{{ route("products.destroy", $product->id) }}">@csrf @method("DELETE")</form>
                                        </div>
                                    </div>
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
