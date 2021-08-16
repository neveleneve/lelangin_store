@extends('layouts.app')

@section('content')
    <div class="container">
        @include('layouts.bottom_navbar')
        <div class="row">
            <div class="col-12">
                <div class="jumbotron jumbotron-fluid bg-dark">
                    <div class="container text-center text-white">
                        <h1 class="display-4 font-weight-bold">
                            Category
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12">
                <a href="#" class="btn btn-sm btn-primary btn-block">Add Category</a>
            </div>
        </div>
        @if (Session::has('alert1'))
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-{{ session('color') }} alert-dismissible fade show" role="alert">
                        <strong>{{ session('alert1') }}</strong> {{ session('alert2') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        @endif
        <div class="row justify-content-center">
            @foreach ($data as $item)
                <div class="col-xs-12 col-sm-12 col-md-6 col-xl-3 mb-3">
                    <div class="card">
                        <a href="{{ route('categoryview', ['id' => str_replace(' ', '-', strtolower($item->type))]) }}">
                            <img class="card-img-top"
                                src="{{ file_exists('images/cat/' . strtolower($item->type) . '.png') ? asset('images/cat/' . strtolower($item->type) . '.png') : asset('images/brands/DEFAULT.png') }}">
                        </a>
                        <div class="card-body text-center">
                            <h5 class="card-title">
                                <a href="{{ route('categoryview', ['id' => str_replace(' ', '-', strtolower($item->type))]) }}"
                                    class="text-dark">
                                    {{ strtoupper($item->type) }}
                                </a>
                            </h5>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('admincategoryview', ['id' => str_replace(' ', '-', strtolower($item->type))]) }}"
                                class="btn btn-sm btn-warning font-weight-bold">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admincategoryedit', ['id' => $item->id]) }}"
                                class="btn btn-sm btn-primary font-weight-bold">
                                <i class="fas fa-edit"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
