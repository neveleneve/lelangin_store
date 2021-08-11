@extends('layouts.app')

@section('content')
    <div class="container">
        @include('layouts.bottom_navbar')
        <div class="row mb-3">
            <div class="col">
                <hr>
            </div>
            <div class="col-auto">
                <h4 class="font-weight-bold">Users List</h4>
            </div>
            <div class="col">
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="{{ route('pengguna') }}" method="get">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-sm" placeholder="Search User" name="search"
                            value="{{ $search }}">
                        <div class="input-group-prepend">
                            <button type="submit" class="btn btn-sm btn-outline-dark" type="button">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered text-nowrap">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Status Verifikasi Email</th>
                                <th>Status Verifikasi KYC</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($datauser as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ ucwords($item->name) }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        @if ($item->email_verified_at == null)
                                            Belum
                                        @else
                                            Sudah
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->kyc == 0)
                                            Belum
                                        @else
                                            Sudah
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
