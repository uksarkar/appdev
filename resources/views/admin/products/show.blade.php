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
                    @if( count($errors->all()) > 0)
                        @foreach($errors->all() as $error)
                        <div class="alert alert-warning">
                            {{ $error }}
                        </div>
                        @endforeach
                        @endif
                    @if(session()->has('successMassage'))
                        <div class="alert alert-success">
                            {{ session()->get('successMassage') }}
                        </div>
                        @endif
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
                                                <button class="btn btn-success" type="button" data-toggle="modal" data-target="#successModal"><i class="icon icon-plus"></i></button>
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
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header"><i class="fa fa-view"></i>Available shop</div>
                                <div class="card-body">
                                    @if( count($product->shops) > 0)
                                    <table class="table table-responsive-sm table-hover table-outline mb-0">
                                        <thead class="thead-light">
                                        <tr>
                                            <th class="text-center"><i class="icon-picture"></i> Image</th>
                                            <th>Shop Name</th>
                                            <th>Price</th>
                                            <th>Location</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($product->shops as $shop)
                                            <tr>
                                                <td class="text-center">
                                                    <div class="thumbnail"><img class="img img-thumbnail" src="@if($shop->image) {{ $shop->image->url }} @else https://via.placeholder.com/100x100.png?text=No+Image @endif" width="100" alt="image"></div>
                                                </td>
                                                <td>
                                                    <a href="{{ route('shops.show', $shop->id ) }}">{{ $shop->name }}</a>
                                                    <div class="small text-muted">Last Update: {{ $shop->updated_at->diffForHumans() }}</div>
                                                </td>
                                                <td>
                                                    <p class="bg-light p-1 rounded">{{ $shop->price[0]->amounts }}</p>
                                                </td>
                                                <td>
                                                    {{  $shop->location }}
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                        @else
                                        <div class="bg-cyan p-1 rounded">
                                            This product is not available at any shop yet.
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
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog @if(count(auth()->user()->shops) > 0)modal-success @else modal-warning @endif modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Add this product to your shop.</h4>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
          <div class="modal-body">
              @if(count(auth()->user()->shops) > 0)
                  @if(!blank(auth()->user()->hasShops($product)))
                    <form method="POST" id="SubForm" action="{{ route('price.store') }}">
                @csrf
                <input type="hidden" name="product" value="{{ $product->id }}">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text">Shop</span></div>
                        <select class="form-control" name="shop" id="shop">
                            @foreach(auth()->user()->hasShops($product) as $shop)
                                    <option value="{{ $shop->id }}">{{ $shop->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text">Price</span></div>
                        <input class="form-control" id="amounts" type="number" name="amounts" placeholder="00.000" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text">Description</span></div>
                        <textarea class="form-control" id="textarea-input" name="description" rows="9" placeholder="Content.."></textarea>
                    </div>
                </div>
            </form>
                      @else
                      <p class="alert alert-warning mb-1">
                          Your all of the shops are added with this product!
                      </p>

                  @endif
              @else
              You doesn't have any shop yet! <br>
                  <a href="{{ route('shops.create') }}" class="btn btn-light">Add Now!</a>
                  @endif
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
            <button id="productSub" class="btn btn-success" type="button">Save changes</button>
          </div>
        </div>
        <!-- /.modal-content-->
      </div>
      <!-- /.modal-dialog-->
    </div>
    <!-- /.modal-->
    <footer class="app-footer">
        <div><a href="https://github.com/utpalongit">Utpal Sarkar</a><span>&copy; 2019.</span></div>
        <div class="ml-auto"><span>Powered by</span> Utpal Sarkar</div>
    </footer>
    @include('admin.layouts.footer')
    </body>
@endsection
