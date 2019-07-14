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
                <li class="breadcrumb-item active">All Shops</li>
                <!-- Breadcrumb Menu-->
                <li class="breadcrumb-menu d-md-down-none">
                    <div class="btn-group" role="group" aria-label="Button group"><a class="btn" href="/"><i class="icon-graph"></i>  Dashboard</a></div>
                </li>
            </ol>
            <div class="container-fluid">
                <div class="animated fadeIn">
                    @if(session()->has("successMassage"))
                        <div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> {{ session()->get("successMassage") }}
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                    @endif
                    <!-- /.row-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">All shops</div>
                                <div class="card-body">
                                    @if(count($shops) > 0)
                                    <table class="table table-responsive-sm table-hover table-outline mb-0">
                                        <thead class="thead-light">
                                        <tr>
                                            <th class="text-center"><i class="icon-picture"></i> Image</th>
                                            <th>Shop Name</th>
                                            <th>Actions</th>
                                            <th>Descriptions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($shops as $shop)
                                                <tr>
                                                    <td class="text-center">
                                                        <div class="thumbnail"><img class="img img-thumbnail" src="@if($shop->image) {{ $shop->image->url }} @else https://via.placeholder.com/100x100.png?text=No+Image @endif" width="100" alt="image"></div>
                                                    </td>
                                                    <td>
                                                        <div>{{ $shop->name }}</div>
                                                        <div class="small text-muted">Created: {{ $shop->created_at->diffForHumans() }}</div>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route("shops.show", $shop->id) }}" class="btn btn-sm btn-primary">View</a>
                                                        <a href="{{ route("shops.edit", $shop->id) }}" class="btn btn-sm btn-info">Edit</a>
                                                        <button class="btn btn-danger btn-sm subbtn">Delete</button>
                                                        <form class="formsub" method="POST" action="{{ route("shops.destroy", $shop->id) }}">@csrf @method("DELETE")</form>
                                                    </td>
                                                    <td>
                                                        {{  Str::limit($shop->description, 80, ' (...)') }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @else
                                    <p class="bg-light rounded p-1">
                                        There is no shop yet!
                                    </p>
                                    @endif
                                </div>
                                <div class="mx-auto flex-column">{{ $shops->links() }}</div>
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
