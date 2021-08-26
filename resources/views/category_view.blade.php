@extends('layouts.app')

@section('content')
    <div class="container">
        @include('layouts.bottom_navbar')
        <div class="row">
            <div class="col-12">
                <div class="jumbotron jumbotron-fluid bg-dark">
                    <div class="container text-center text-white">
                        <h1 class="display-5 font-weight-bold">
                            {{ strtoupper($nama)  }}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-12">
                <div class="dropdown-divider"></div>
            </div>
        </div>
        @if (count($data) > 0)
            <div class="row mb-3 justify-content-center" id="categories">
                @foreach ($data as $item)
                    <div class="col-xs-12 col-sm-12 col-md-6 col-xl-3 mb-3">
                        <div class="card">
                            <a
                                href="{{ route('categoryview', ['id' => str_replace(' ', '-', strtolower($item->type))]) }}">
                                <img class="card-img-top"
                                    src="{{ file_exists('images/item/' . strtolower($item->code_item) . '-1.png') ? asset('images/item/' . strtolower($item->type) . '-1.png') : asset('images/brands/DEFAULT.png') }}">
                            </a>
                            <div class="card-body text-center">
                                <h5 class="card-title">
                                    <a href="{{ route('categoryview', ['id' => str_replace(' ', '-', strtolower($item->type))]) }}"
                                        class="text-dark">
                                        {{ strtoupper($item->type) }}
                                    </a>
                                </h5>
                            </div>
                            <div class="card-footer">
                                <h6>
                                    <i class="fa fa-eye"></i> {{ $item->jumlah }}
                                </h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">Data Kosong</h3>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
