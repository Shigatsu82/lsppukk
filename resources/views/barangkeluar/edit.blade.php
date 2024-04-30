@extends('layouts.adm-main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="pull-left">
                    <h2>EDIT BARANG KELUAR</h2>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('barangkeluar.update',$rsetBarangKel->id) }}" method="POST" enctype="multipart/form-data">                    
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">TANGGAL KELUAR</label>
                                <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date',$rsetBarangKel->tgl_keluar) }}" placeholder="Masukkan Tanggal Keluar Barang">
                           
                                <!-- error message untuk date -->
                                @error('date')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group" hidden>
                                <label class="font-weight-bold">QTY</label>
                                <input type="number" class="form-control @error('qty_keluar') is-invalid @enderror" name="qty_keluar" value="{{ old('qty_keluar',$rsetBarangKel->qty_keluar) }}" placeholder="Masukkan qty Barang">
                           
                                <!-- error message untuk merk -->
                                @error('qty_keluar')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">NAMA BARANG KELUAR</label>
                                <select class="form-control" name="barang_id" aria-label="Default select example">
                                    @foreach ($barangall as $barang)
                                        @if ($selectedBarang && $selectedBarang->id == $barang->id)
                                            <option value="{{ $barang->id }}" selected>{{ $barang->merk }}</option>
                                        @else
                                            <option value="{{ $barang->id }}">{{ $barang->merk }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            
                                <!-- error message untuk kategori -->
                                @error('kategori_id')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection