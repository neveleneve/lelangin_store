@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="jumbotron jumbotron-fluid bg-dark">
                    <div class="container text-center text-white">
                        <h1 class="display-4 font-weight-bold">
                            Verifikasi Data Diri
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="dropdown-divider"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="{{ route('kycinput') }}" method="post">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-group">
                                <label class="font-weight-bold" for="dataverifikasi">Pilih Kartu Identitas</label>
                                <select class="form-control form-control-sm" name="dataverifikasi" id="dataverifikasi">
                                    <option value="" selected disabled hidden>Pilih Kartu Identitas</option>
                                    <option value="KTP">Kartu Tanda Penduduk</option>
                                    <option value="SIM">Surat Izin Mengemudi</option>
                                    <option value="PASPOR">Paspor</option>
                                </select>
                            </div>
                            <input type="hidden" name="username" value="{{Auth::user()->username}}">
                            <div class="form-group">
                                <label class="font-weight-bold" for="nomorid">Nomor ID</label>
                                <input type="text" class="form-control form-control-sm" id="nomorid" name="nomorid"
                                    placeholder="Masukkan Nomor ID Sesuai Pilihan Kartu Identitas Anda">
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold" for="foto">Foto Kartu Identitas</label>
                                <input type="file" class="form-control-file form-control-sm" id="foto" name="foto">
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold" for="fotodiri">Foto Diri</label>
                                <input type="file" class="form-control-file form-control-sm" id="fotodiri" name="fotodiri">
                            </div>
                            <div class="form-group">
                                <small><strong>Note</strong></small>
                                <br>
                                <small>- Proses verifikasi KYC akan memakan waktu 4-7 hari kerja</small>
                                <br>
                                <small>- Pastikan gambar yang diambil sesuai dengan contoh yang diberikan</small>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="form-group">
                                <input type="submit" class="btn btn-sm btn-primary" name="submitkyc" value="Input KYC">
                                <a href="{{ route('dashboard') }}" class="btn btn-sm btn-danger">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
