@extends('layouts.adm-main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
		<div class="pull-left">
		    <h2>INPUT BARANG KELUAR</h2>
		</div>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('barangkeluar.store') }}" method="POST" enctype="multipart/form-data">                    
                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">TANGGAL Keluar</label>
                                <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" placeholder="Masukkan Tanggal Masuk">
                           
                                <!-- error message untuk merk -->
                                @error('date')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label class="font-weight-bold">Jumlah Barang Keluar</label>
                                <input type="text" class="form-control @error('qty') is-invalid @enderror" name="qty" value="{{ old('qty') }}" placeholder="Masukkan qty Barang">
                           
                                <!-- error message untuk qty -->
                                @error('qty')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Nama Barang</label>
                                <select name="barang_id" id="" class="form-control">
                                    @foreach ($Barang as $rowBarang )
                                        <option value="{{$rowBarang->id}}">{{$rowBarang->merk}}</option>
                                    @endforeach
                                </select>
                           
                                <!-- error message untuk barang_id -->
                                @error('barang_id')
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