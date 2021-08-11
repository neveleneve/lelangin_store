@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">404 Page Not Found</h1>
                <h4 class="text-center">
                    <a href="{{ route('dashboard') }}" class="text-dark">
                        <i class="fa fa-chevron-left"></i>
                        Back to Home
                    </a>
                </h4>
            </div>
        </div>
    </div>
@endsection
