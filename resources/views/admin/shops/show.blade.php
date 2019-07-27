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
                    @if(session()->has('successMessage'))
                        <div class="alert alert-warning">{{ session()->get('successMessage') }}</div>
                    @endif
                    @if(!blank($errors->all()))
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif
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
                                                <button data-sub="{{ 'a'.$shop->id }}" class="btn btn-danger subbtn">Delete</button>
                                            </div>
                                            <form data-sub="{{ 'a'.$shop->id }}" class="formsub" method="POST" action="{{ route("shops.destroy", $shop->id) }}">@csrf @method("DELETE")</form>
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
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($shop->products as $product)
                                                <tr data-tr="{{ 'd'.$product->id }}">
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
                                                        @if(!blank($product->price()->where('shop_id',$shop->id)->first()->description))
                                                            {{  Str::limit($product->price()->where('shop_id',$shop->id)->first()->description, 70, ' (...)') }}
                                                            @else
                                                            <p>
                                                                No descriptions are available!
                                                            </p>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <button data-edit="{{ 'd'.$product->id }}" class="btn btn-info btn-sm formShowBtn">Edit Price</button>
                                                        <button data-sub="{{ 'b'.$product->id }}" class="btn btn-outline-danger btn-sm subbtn">Remove</button>
                                                        <form data-sub="{{ 'b'.$product->id }}" class="formsub" action="{{ route('price.destroy', $product->price()->where('shop_id',$shop->id)->first()->id) }}" method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                        </form>
                                                    </td>
                                                </tr>
{{--                                                The form--}}
                                                <tr data-edit="{{ 'd'.$product->id }}" style="display: none">
                                                        <td class="text-center">
                                                            <div class="thumbnail"><img class="img img-thumbnail" src="@if($product->image) {{ $product->image->url }} @else https://via.placeholder.com/100x100.png?text=No+Image @endif" width="100" alt="image"></div>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('products.show', $product->id ) }}">{{ $product->name }}</a>
                                                            <div class="small text-muted">Last Update: {{ $product->updated_at->diffForHumans() }}</div>
                                                        </td>
                                                        <td>
                                                            <input data-info="{{ 'e'.$product->price()->where('shop_id',$shop->id)->first()->id }}" type="text" value="{{ $product->price()->where('shop_id',$shop->id)->first()->amounts }}" class="form-control">
                                                        </td>
                                                        <td>
                                                            @if(!blank($product->price()->where('shop_id',$shop->id)->first()->description))
                                                                <textarea data-info="{{ 'e'.$product->price()->where('shop_id',$shop->id)->first()->id }}" id="" cols="30" rows="2"
                                                                          class="form-control">{{ $product->price()->where('shop_id',$shop->id)->first()->description }}</textarea>
                                                            @else
                                                                <textarea name="description" id="" cols="30" rows="10"
                                                                          class="form-control">
                                                                </textarea>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <button type="button" data-info="{{ 'e'.$product->price()->where('shop_id',$shop->id)->first()->id }}" class="btn btn-outline-success btn-sm sButton">Update</button>
                                                            <button type="button" data-edit="{{ 'd'.$product->id }}" class="btn btn-sm btn-warning xbtn">Cancel</button>
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

    <form id="edit-form-bottom" style="display: none" method="POST">
        @method("PATCH")
        @csrf
        <input type="hidden" name="amounts">
        <textarea name="description"></textarea>
    </form>

    <footer class="app-footer">
        <div><a href="https://github.com/utpalongit">Utpal Sarkar</a><span> &copy; 2019.</span></div>
        <div class="ml-auto"><span>Powered by</span> Utpal Sarkar</div>
    </footer>
    @include('admin.layouts.footer')
    </body>
@endsection
