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
                <li class="breadcrumb-item active">Edit User</li>
                <!-- Breadcrumb Menu-->
                <li class="breadcrumb-menu d-md-down-none">
                    <div class="btn-group" role="group" aria-label="Button group"><a class="btn" href="/"><i class="icon-graph"></i>  Dashboard</a></div>
                </li>
            </ol>
            <div class="container-fluid">
                <div class="animated fadeIn">
                    @if(count($errors) > 0)
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Caution!</strong> {{ $error }}
                                <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                    @endforeach
                @endif
                <!-- /.row-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header"><i class="fa fa-edit"></i>Edit User</div>
                                <div class="card-body">
                                    <form action="{{ route("users.update", $user->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method("PATCH")
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <!-- image-preview-filename input [CUT FROM HERE]-->
                                                <div class="avatar-upload">
                                                    <div class="avatar-edit">
                                                        <input name="image" type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                                        <label for="imageUpload"></label>
                                                    </div>
                                                    <div class="avatar-preview">
                                                        <div id="imagePreview" style="background-image: url('@if($user->image){{ $user->image->url }}@else https://via.placeholder.com/300x300.png?text=Image @endif');">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /input-group image-preview [TO HERE]-->
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text">Name</span></div>
                                                        <input class="form-control" id="name" type="text" name="name" placeholder="Full Name" required value="@if(old('name')){{old('name')}}@else{{ $user->name }}@endif">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text">Email</span></div>
                                                        <input class="form-control" id="email" type="email" name="email" placeholder="email@example.com" required value="@if(old('email')){{old('email')}}@else{{ $user->email }}@endif">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text">User Role</span></div>
                                                        <select class="form-control" name="role_id" id="role">
                                                            @foreach($roles as $role)
                                                                <option value="{{ $role->id }}" @if(old("role_id") == $role->id) selected @elseif($user->roles && $user->roles[0]->name == $role->name)
                                                                    selected
                                                                @endif>{{ $role->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group form-actions">
                                                    <button class="btn btn-sm btn-primary float-right" type="submit">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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
