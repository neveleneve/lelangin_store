@extends('layouts.app')

@section('content')
    <div class="container">
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
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-sm bg-dark">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-light">Dashboard</a></li>
                <li class="breadcrumb-item"> <a href="{{ route('category') }}" class="text-light">Categories</a></li>
                <li class="breadcrumb-item active">Administrator</li>
            </ol>
        </nav>
        <div class="row mb-3">
            <div class="col-12">
                <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-sm btn-dark btn-block">
                    Add Category
                </button>
            </div>
        </div>
        <hr>
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
                            <a href="{{ route('categoryview', ['id' => str_replace(' ', '-', strtolower($item->type))]) }}"
                                class="btn btn-sm btn-warning font-weight-bold" target="__blank">
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
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Category</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <input type="text" name="category" id="category" class="form-control" placeholder="Category Name">
                    </div>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input btn-outline-dark" id="gambar">
                            <label class="custom-file-label" for="gambar">Choose Image</label>
                        </div>
                    </div>
                    <small>- Gunakan gambar dengan latar belakang putih</small>
                    <br>
                    <small>- Ukuran file gambar maks. 2 Mb</small>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-dark">Add Category</button>
                    <button type="button" class="btn btn-sm btn-outline-dark" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
@endsection
