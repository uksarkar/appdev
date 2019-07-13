@extends('layouts.app')

@section('content')
    <div class="container-fluid text-center">    
            <div class="row content">
                @include('layouts.sidebar')
                <div class="col-sm-10 text-left pl-0">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-header mb-2">
                                All Users
                            </h4>
                            @if (session()->has('successMassege'))
                                <div class="alert alert-success">
                                    {{ session()->get('successMassege') }}
                                </div>
                            @endif
                            @if (count($users) > 0)
                            {{-- Product list from here --}}
                            <div class="row">
                                    <div class="col-lg-11 mx-auto">
                                
                                      <!-- List group-->
                                      <ul class="list-group shadow">
                                        @foreach ($users as $user)
                                        <!-- list group item-->
                                        <li class="list-group-item">
                                          <!-- Custom content-->
                                          <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                                            <div class="media-body order-2 order-lg-1">
                                              <h5 class="mt-0 font-weight-bold mb-2">{{ $user->name }}</h5>
                                              <p class="font-italic text-muted mb-0 small"></p>
                                              <div class="d-flex align-items-center justify-content-between mt-1">
                                                <div class="font-weight-bold my-2">
                                                    <form method="POST" action="{{ route('products.destroy',$user->id) }}">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button title="Delete product" class="btn btn-outline-danger btn-sm submitButton" type="submit"><i class="fas fa-trash"></i></button>
                                                        <a title="Show product" class="btn btn-outline-secondary btn-sm" href="{{ route('products.show', $user->id) }}"><i class="fas fa-eye"></i></a>
                                                        <a title="Edit product" class="btn btn-outline-info btn-sm" href="{{ route('products.edit', $user->id) }}"><i class="fas fa-pen"></i></a>
                                                    </form>
                                                </div>
                                              </div>
                                            </div><img src="@if($user->image) {{ $user->image->url }} @else https://via.placeholder.com/300x300.png?text=No+Image @endif" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">
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
                            @endif
                        </div>
                      </div>
                      
                    <div class="col-12">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
    </div>
@endsection
