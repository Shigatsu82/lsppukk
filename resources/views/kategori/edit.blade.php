@extends('layouts.adm-main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="pull-left">
                    <h2>EDIT KATEGORI</h2>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('kategori.update',$rsetKategori->id) }}" method="POST" enctype="multipart/form-data">                    
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">DESKRIPSI</label>
                                <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" value="{{ old('deskripsi',$rsetKategori->deskripsi) }}" placeholder="Masukkan Deskripsi Kategori">
                           
                                <!-- error message untuk merk -->
                                @error('deskripsi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">KATEGORI</label>
                                <select class="form-control" name="kategori" aria-label="Default select example">
                                
                                <option value="M">Barang Modal</option>
                                <option value="A">Alat</option>
                                <option value="BHP">Bahan Habis Pakai</option>
                                <option value="BTHP">Barang Tidak Habis Pakai</option>
                                </select>
                               
                                <!-- error message untuk kategori -->
                                @error('kategori')
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