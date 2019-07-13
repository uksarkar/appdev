@extends('layouts.app')

@section('content')
    <div class="container-fluid text-center">    
            <div class="row content">
                @include('layouts.sidebar')
                <div class="col-sm-10 text-left pl-0">
                    <div class="card">
                        <div class="card-body">
                          This is some text within a card body.
                        </div>
                      </div>
                </div>
            </div>
    </div>
@endsection
