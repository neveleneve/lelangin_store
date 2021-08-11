@extends('layouts.app')

@section('content')
    <div class="container">
        @include('layouts.bottom_navbar')
        <div class="row">
            <div class="col-12">
                <div class="jumbotron jumbotron-fluid bg-dark">
                    <div class="container text-center text-white">
                        <h1 class="display-4 font-weight-bold">
                            Kategori
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3 justify-content-center" id="categories">
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
                        <div class="card-footer">
                            <h6>
                                Jumlah Item : {{ $item->jumlah }}
                            </h6>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
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
