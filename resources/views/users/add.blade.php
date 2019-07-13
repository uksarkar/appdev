
@extends('layouts.app')

@section('content')
    <div class="container-fluid text-center">    
            <div class="row content">
                @include('layouts.sidebar')
                <div class="col-sm-10 text-left pl-0">
                    <div class="card">
                        <div class="card-body">
                          <h4 class="card-header">Add User</h4>
                        <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                            @if(count( $errors ) > 0)
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                            @endif
                            @csrf
                              <div class="row">
                                  <div class="col-sm-3">
                                    <!-- image-preview-filename input [CUT FROM HERE]-->
                                    <label for="imageUpload">User Image</label>
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input name="image" type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                            <label for="imageUpload"></label>
                                        </div>
                                        <div class="avatar-preview">
                                            <div id="imagePreview" style="background-image: url(https://via.placeholder.com/300x300.png?text=Image);">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /input-group image-preview [TO HERE]--> 
                                  </div>
                                  <div class="col-sm-9">
                                    <div class="form-group">
                                            <label for="productName">Name</label>
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="productName" aria-describedby="productHelp" required placeholder="Enter Name">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group green-border-focus">
                                            <label for="email">Email</label>
                                            <input class="form-control @error('email') is-invalid @enderror" name="email" id="email" required placeholder="example@mail.com">
                                        </div>
                                        <div class="form-group green-border-focus">
                                            <label for="password">Password</label>
                                            <input class="form-control @error('password') is-invalid @enderror" name="password" id="password" type="password" required placeholder="*******">
                                        </div>
                                        <div class="form-group green-border-focus">
                                            <label for="role">Role</label>
                                            <select name="role_id" id="role_id" class="form-control">
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}">
                                                        {{ $role->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary submitButton float-right">Submit</button>
                                  </div>
                              </div>
                            </form>
                        </div>
                      </div>
                </div>
            </div>
    </div>
@endsection
