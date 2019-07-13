@extends('layouts.app')

@section('content')
    <div class="container-fluid text-center">    
            <div class="row content">
                @include('layouts.sidebar')
                <div class="col-sm-10 text-left pl-0">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-header mb-2">
                                All Products
                            </h4>
                            @if (session()->has('successMassage'))
                                <div class="alert alert-success">
                                    {{ session()->get('successMassage') }}
                                </div>
                            @endif
                            @if (count($products) > 0)
                            {{-- Product list from here --}}
                            <div class="row">
                                    <div class="col-lg-11 mx-auto">
                                
                                      <!-- List group-->
                                      <ul class="list-group shadow">
                                        @foreach ($products as $product)
                                        <!-- list group item-->
                                        <li class="list-group-item">
                                          <!-- Custom content-->
                                          <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                                            <div class="media-body order-2 order-lg-1">
                                              <h5 class="mt-0 font-weight-bold mb-2">{{ $product->name }}</h5>
                                              <p class="font-italic text-muted mb-0 small">{{ $product->description }}</p>
                                              <div class="d-flex align-items-center justify-content-between mt-1">
                                                <div class="font-weight-bold my-2">
                                                    <form method="POST" action="{{ route('products.destroy',$product->id) }}">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button title="Delete product" class="btn btn-outline-danger btn-sm submitButton" type="submit"><i class="fas fa-trash"></i></button>
                                                        <a title="Show product" class="btn btn-outline-secondary btn-sm" href="{{ route('products.show', $product->id) }}"><i class="fas fa-eye"></i></a>
                                                        <a title="Edit product" class="btn btn-outline-info btn-sm" href="{{ route('products.edit', $product->id) }}"><i class="fas fa-pen"></i></a>
                                                    </form>
                                                </div>
                                                <ul class="list-inline small">
                                                  <li class="list-inline-item m-0"><i class="fas fa-star text-success"></i></li>
                                                  <li class="list-inline-item m-0"><i class="fas fa-star text-success"></i></li>
                                                  <li class="list-inline-item m-0"><i class="fas fa-star text-success"></i></li>
                                                  <li class="list-inline-item m-0"><i class="fas fa-star text-success"></i></li>
                                                  <li class="list-inline-item m-0"><i class="far fa-star text-muted"></i></li>
                                                </ul>
                                              </div>
                                            </div><img src="@if($product->image) {{ $product->image->url }} @else https://via.placeholder.com/300x300.png?text=No+Image @endif" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">
                                          </div>
                                          <!-- End -->
                                        </li>
                                        <!-- End -->
                                        @endforeach
                                      </ul>
                                      <!-- End -->
                                    </div>
                                  </div>
                            {{-- End of product list --}}
                            @else
                            <p class="lead">There is no product yet.</p>
                                <a class="btn btn-primary" href="{{ route('products.create') }}">Add Product</a>
                            @endif
                        </div>
                      </div>
                      
                    <div class="col-12">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
    </div>
@endsection
