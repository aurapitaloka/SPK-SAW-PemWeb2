@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Alternatif</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Alternatif</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('admin.alternatif.update', ['id' => $alternatif->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                  <!-- kolom kiri -->
                  <div class="col-md-6">
                    <!-- elemen form umum -->
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Form Edit Alternatif</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- mulai form -->
                          <div class="card-body">
                          <div class="form-group">
                            <label for="exampleInputNama">Nama</label>
                            <input type="email" class="form-control" id="exampleInputNama"
                            name="email" value="{{ $alternatif->nama }}" placeholder="Enter nama">
                            @error('nama')
                                <small>{{ $message }}</small>
                            @enderror
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">Kode</label>
                              <input type="text" name="kode" class="form-control" id="exampleInputKode" value="{{ $alternatif->kode }}" placeholder="Enter kode">
                              @error('kode')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                          <div class="form-group">
                            <label for="exampleInputKontak">Kontak</label>
                            <input type="text" name="kontak" class="form-control" id="exampleInputKontak" placeholder="Kontak">
                            @error('kontak')
                                <small>{{ $message }}</small>
                            @enderror
                          </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    <!-- /.card -->
                  </div>
                  <!-- /.kolom kiri -->
                </div>
                <!-- /.row -->
            </form>
        </div><!-- /.container-fluid -->
    </section>
</div>
@endsection 
