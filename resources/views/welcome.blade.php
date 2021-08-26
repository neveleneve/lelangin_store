@extends('layouts.app')

@section('content')
    <div class="container">
        @include('layouts.bottom_navbar')
        <div class="row mb-3">
            <div class="col-12">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100"
                                src="https://www.sunchemical.com/wp-content/uploads/2019/07/SunWave_banner-1200x400.jpg"
                                alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100"
                                src="https://londonoktober.github.io/UdacityPortfolioSite/images/1200x400.jpg"
                                alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100"
                                src="https://www.mesa-africa.org/wp-content/uploads/2016/06/beijing-1200x400.jpg"
                                alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="dropdown-divider"></div>
            </div>
        </div>
        <div class="row">        
            @if (count($data) > 0)
                <div class="col-6">
                    <h3 class="mb-3">Lelang Terbaru</h3>
                </div>
                @if (count($data) > 3)
                    <div class="col-6 text-right">
                        <a class="btn btn-primary mb-3 mr-1" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                            <i class="fa fa-arrow-left"></i>
                        </a>
                        <a class="btn btn-primary mb-3 " href="#carouselExampleIndicators2" role="button" data-slide="next">
                            <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                @endif
                <div class="col-12">
                    <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row justify-content-center">
                                    @if (count($data) < 3)
                                        @for ($i = 0; $i < count($data); $i++)                                        
                                            <div class="col-md-4 mb-3">
                                                <div class="card">
                                                    <div class="embed-responsive embed-responsive-1by1">
                                                        <img class="card-img embed-responsive-item" 
                                                        src="{{ file_exists('images/item/' . $data[$i]['code_item'] . '-1.png') ? asset('images/item/' . $data[$i]['code_item'] . '-1.png') : asset('images/brands/DEFAULT.png') }}">
                                                    </div>
                                                    <div class="card-body-right text-center">
                                                        <h5 class="card-title">
                                                            <a class="text-dark">
                                                                {{ $data[$i]['nama'] }}
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div class="card-footer">
                                                        <h6>
                                                            Jumlah View :
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor
                                    @else
                                        @for ($i = 0; $i < 3; $i++)                                        
                                            <div class="col-md-4 mb-3">
                                                <div class="card">
                                                    <div class="embed-responsive embed-responsive-16by9">
                                                        <img class="card-img-top" src="">
                                                    </div>
                                                    <div class="card-body text-center">
                                                        <h5 class="card-title">
                                                            <a class="text-dark">
                                                                {{ $data[$i]['nama'] }}
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div class="card-footer">
                                                        <h6>
                                                            Jumlah View :
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor                                    
                                    @endif
                                </div>
                            </div>
                            @if (count($data) > 3 && count($data) <= 6)                            
                                <div class="carousel-item">
                                    <div class="row justify-content-center">

                                    </div>
                                </div>
                            @endif
                            @if (count($data) > 6)                            
                                <div class="carousel-item">
                                    <div class="row justify-content-center">

                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @else                
                <div class="col-12 text-center">
                    <h2>
                        Data Lelang Belum Tersedia
                    </h2>
                </div>                
            @endif
        </div>
    </div>
@endsection
