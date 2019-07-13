@extends('layouts.app')

@section('content')
    <div class="container-fluid text-center">    
            <div class="row content">
                @include('layouts.sidebar')
                <div class="col-sm-10 text-left pl-0">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-header mb-2">
                                View Product
                            </h4>
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
                                        <button class="btn btn-outline-danger btn-sm submitButton" type="submit"><i class="fas fa-trash"></i></button>
                                        <a class="btn btn-outline-info btn-sm" href="{{ route('products.edit', $product->id) }}"><i class="fas fa-pen"></i></a>
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
                        </div>
                      </div>
                </div>
            </div>
    </div>
@endsection
