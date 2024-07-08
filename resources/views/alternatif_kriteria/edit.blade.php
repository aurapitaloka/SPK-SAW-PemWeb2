@extends('layout.main')
@section('content')

<div class="content-wrapper">
    <!-- Header Halaman (Content Header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Alternatif dan Kriteria</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Beranda</a></li>
              <li class="breadcrumb-item active">Edit Alternatif dan Kriteria</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container-fluid">
        <form action="{{ route('admin.alternatif_kriteria.update', $alternatifKriteria->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <!-- kolom kiri -->
                <div class="col-md-6">
                    <!-- elemen form umum -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form Edit Alternatif dan Kriteria</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- mulai form -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_alternatif">Nama Alternatif</label>
                                <select name="nama_alternatif" id="nama_alternatif" class="form-control">
                                    @foreach ($alternatifs as $alternatif)
                                        <option value="{{ $alternatif->nama }}" {{ $alternatif->nama == $alternatifKriteria->nama_alternatif ? 'selected' : '' }}>{{ $alternatif->nama }}</option>
                                    @endforeach
                                </select>
                                @error('nama_alternatif')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="number" class="form-control" id="harga" name="harga" value="{{ $alternatifKriteria->harga }}" placeholder="Masukkan harga">
                                @error('harga')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="fasilitas">Fasilitas</label>
                                <input type="number" class="form-control" id="fasilitas" name="fasilitas" value="{{ $alternatifKriteria->fasilitas }}" placeholder="Masukkan fasilitas">
                                @error('fasilitas')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="keamanan">Keamanan</label>
                                <input type="number" class="form-control" id="keamanan" name="keamanan" value="{{ $alternatifKriteria->keamanan }}" placeholder="Masukkan keamanan">
                                @error('keamanan')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="kebersihan">Kebersihan</label>
                                <input type="number" class="form-control" id="kebersihan" name="kebersihan" value="{{ $alternatifKriteria->kebersihan }}" placeholder="Masukkan kebersihan">
                                @error('kebersihan')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="rating">Rating</label>
                                <input type="number" class="form-control" id="rating" name="rating" value="{{ $alternatifKriteria->rating }}" placeholder="Masukkan rating">
                                @error('rating')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.kolom kiri -->
            </div>
            <!-- /.row -->
        </form>
    </div><!-- /.container-fluid -->
</div>

@endsection
