@extends('admin.layouts.app')

@section("content")
    <body class="app flex-row align-items-center">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-group">
                    <div class="card p-4">
                        <div class="card-body">
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <h1>Login</h1>
                                <p class="text-muted">Sign In to your account</p>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend"><span class="input-group-text @error('email') text-danger @enderror">@</span></div>
                                    <input id="login-email" name="email" class="form-control @error('email')is-invalid @enderror" type="text" placeholder="email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend"><span class="input-group-text @error('password')text-danger @enderror"><i class="icon-lock"></i></span></div>
                                    <input class="form-control @error('password')is-invalid @enderror" value="{{ old('password') }}" type="password" name="password" placeholder="Password" required>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-6">

                                    </div>
                                    <div class="col-6 text-right">
                                        <button class="btn btn-primary px-4 float-right" type="submit">Login</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
                        <div class="card-body text-center">
                            <h2>Admin dashboard</h2>
                            <div>
                                <p>Login to the admin panel. You must have admin permission to login here.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.layouts.footer')
    </body>
@endsection
