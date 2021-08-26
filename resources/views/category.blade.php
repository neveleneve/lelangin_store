@extends('layouts.app')

@section('content')
    <div class="container">
        @include('layouts.bottom_navbar')
        <div class="row">
            <div class="col-12">
                <div class="jumbotron jumbotron-fluid bg-dark">
                    <div class="container text-center text-white">
                        <h1 class="display-5 font-weight-bold">
                            KATEGORI
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
                                    src="{{ file_exists('images/cat/' . strtolower($item->type) . '.png') ? asset('images/cat/' . strtolower($item->type) . '.png') : asset('images/brands/DEFAULT.png') }}">
                            </a>
                            <a href="{{ route('categoryview', ['id' => str_replace(' ', '-', strtolower($item->type))]) }}"
                                class="text-dark">
                                <div class="card-body text-center">
                                    <h5 class="card-title">
                                        {{ strtoupper($item->type) }}
                                    </h5>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <h3 class="text-center">Data Kosong</h3>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@section('customcss')
    <link rel="stylesheet" href="{{ asset('css/card.css') }}">
@endsection

@section('customjs')
    <script>
        $(document).ready(function() {
            $('.card').hover(
                function() {
                    $(this).animate({
                        marginTop: "-1%"
                    }, 200);
                },
                function() {
                    $(this).animate({
                        marginTop: "0%"
                    }, 100);
                }
            );
        });
    </script>
@endsection
