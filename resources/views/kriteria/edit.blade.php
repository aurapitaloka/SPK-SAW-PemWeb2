@extends('layout.main')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Kriteria</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Kriteria</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('admin.kriteria.update', ['id' => $kriteria->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <!-- kolom kiri -->
                    <div class="col-md-6">
                        <!-- elemen form umum -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Form Edit Kriteria</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- mulai form -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputKode">Kode Kriteria</label>
                                    <input type="text" class="form-control" id="exampleInputKode" name="kode_kriteria" value="{{ $kriteria->kode_kriteria }}" placeholder="Masukkan kode kriteria">
                                    @error('kode_kriteria')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputNama">Nama Kriteria</label>
                                    <input type="text" name="nama_kriteria" class="form-control" id="exampleInputNama" value="{{ $kriteria->nama_kriteria }}" placeholder="Masukkan nama kriteria">
                                    @error('nama_kriteria')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputBobot">Bobot</label>
                                    <input type="text" name="bobot" class="form-control" id="exampleInputBobot" value="{{ $kriteria->bobot }}" placeholder="Masukkan bobot">
                                    @error('bobot')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputJenis">Jenis</label>
                                    <select name="jenis" class="form-control" id="exampleInputJenis">
                                        <option value="Benefit" @if($kriteria->jenis == 'Benefit') selected @endif>Benefit</option>
                                        <option value="Cost" @if($kriteria->jenis == 'Cost') selected @endif>Cost</option>
                                    </select>
                                    @error('jenis')
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
