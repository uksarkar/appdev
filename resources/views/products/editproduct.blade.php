
@extends('layouts.app')

@section('content')
    <div class="container-fluid text-center">    
            <div class="row content">
                @include('layouts.sidebar')
                <div class="col-sm-10 text-left pl-0">
                    <div class="card">
                        <div class="card-body">
                          <h4 class="card-header">Edit Product</h4>
                        <form method="post" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                            @if(count( $errors ) > 0)
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                            @endif
                            @csrf
                            @method("PATCH")
                              <div class="row">
                                  <div class="col-sm-3">
                                    <!-- image-preview-filename input [CUT FROM HERE]-->
                                    <label for="imageUpload">Product Image</label>
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input name="image" type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                            <label for="imageUpload"></label>
                                        </div>
                                        <div class="avatar-preview">
                                            <div id="imagePreview" style="background-image: url('@if($product->image) {{ $product->image->url }} @else https://via.placeholder.com/300x300.png?text=Image @endif');">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /input-group image-preview [TO HERE]--> 
                                  </div>
                                  <div class="col-sm-9">
                                    <div class="form-group">
                                            <label for="productName">Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="productName" aria-describedby="productHelp" required placeholder="Enter Name" value="{{ $product->name }}">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group green-border-focus">
                                            <label for="productDescription">Product Description</label>
                                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="productDescription" rows="3" required placeholder="Write proper description here...">{{ $product->description }}</textarea>
                                        </div>        
                                        <div class="row">
                                            <div class="col-sm-6"><button id="deletesubmit" class="btn btn-danger btn-block" type="submit">Delete</button> </div>
                                            <div class="col-sm-6"><button type="submit" class="btn btn-primary btn-block float-right submitButton">Update</button></div>
                                        </div>
                                  </div>
                              </div>
                            </form>
                        </div>
                      </div>
                </div>
            </div>
    </div>
    <form id="deleteform" method="POST" action="{{ route('products.destroy',$product->id) }}">
            @csrf
            @method("DELETE")
    </form>
@endsection
