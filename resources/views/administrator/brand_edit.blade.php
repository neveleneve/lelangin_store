@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-sm bg-dark">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-light">Dashboard</a></li>
                <li class="breadcrumb-item"> <a href="{{ route('brand') }}" class="text-light">Brands</a></li>
                <li class="breadcrumb-item"> <a href="{{ route('adminbrand') }}" class="text-light">Administrator</a>
                </li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('adminbrandupdate') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="font-weight-bold" for="type">Brand's Name</label>
                                <input type="text" name="type" id="type" class="form-control"
                                    value="{{ $data[0]['brand'] }}" required>
                                <input type="hidden" name="id" value="{{ $data[0]['id'] }}">
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold" for="type">Brand's Image</label>
                                <br>
                                @if (file_exists('images/brands/' . strtolower($data[0]->brand) . '.png'))
                                    <img class="img-fluid img-thumbnail"
                                        src="{{ file_exists('images/brands/' . strtolower($data[0]->brand) . '.png') ? asset('images/brands/' . strtolower($data[0]->brand) . '.png') : asset('images/brands/DEFAULT.png') }}"
                                        alt="" style="max-width: 200px">
                                    <br>
                                    <a class="text-dark" href="">Delete Images</a>
                                @else
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input btn-outline-dark" id="gambar" required>
                                            <label class="custom-file-label" for="gambar">Choose Image</label>
                                        </div>
                                    </div>
                                    <small>- Kategori belum memiliki gambar!</small>
                                @endif
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-2">
                                    <a class="btn btn-danger btn-block" href="{{ route('adminbrand') }}">Back</a>
                                </div>
                                <div class="col-2">
                                    <button type="submit" onclick="return confirm('Update Data?')"
                                        class="btn btn-primary btn-block">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
