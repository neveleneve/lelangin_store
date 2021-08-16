@extends('layouts.app')

@section('content')
    <div class="container">
        @include('layouts.bottom_navbar')
        <div class="row">
            <div class="col-12">
                <div class="jumbotron jumbotron-fluid bg-dark">
                    <div class="container text-center text-white">
                        <h1 class="display-4 font-weight-bold">
                            Category Edit
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admincategoryupdate') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="font-weight-bold" for="type">Car Type</label>
                                <input type="text" name="type" id="type" class="form-control" value="{{ $data[0]['type'] }}">
                                <input type="hidden" name="id" value="{{ $data[0]['id'] }}">
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <a class="btn btn-danger btn-block" href="{{route('category')}}">Back</a>
                                </div>
                                <div class="col-6">
                                    <button type="submit" onclick="return confirm('Update Data?')" class="btn btn-primary btn-block">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
