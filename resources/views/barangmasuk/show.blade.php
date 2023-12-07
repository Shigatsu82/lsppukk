@extends('layouts.adm-main')


@section('content')
    <div class="container">
        <div class="pull-left">
            <h2>TAMPILKAN BARANG</h2>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td>TANGGAL MASUK</td>
                                <td>{{ $rsetBarangMas->tgl_masuk }}</td>
                            </tr>
                            <tr>
                                <td>KUANTITAS MASUK</td>
                                <td>{{ $rsetBarangMas->qty_masuk }}</td>
                            </tr>
                                <td>NAMA BARANG</td>
                                <td>{{ $rsetBarangMas->barang->merk }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <div class="row">
            <div class="col-md-12  text-center">
                <a href="{{ route('barangmasuk.index') }}" class="btn btn-md btn-primary mb-3">Back</a>
            </div>
        </div>
    </div>
@endsection