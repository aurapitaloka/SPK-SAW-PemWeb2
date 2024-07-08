@extends('layout.main')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Alternatif dan Kriteria</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Alternatif dan Kriteria</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('admin.alternatif_kriteria.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Alternatif dan Kriteria</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Alternatif</th>
                                        <th>Harga</th>
                                        <th>Fasilitas</th>
                                        <th>Keamanan</th>
                                        <th>Kebersihan</th>
                                        <th>Rating</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $alternatifKriteria)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $alternatifKriteria->nama_alternatif }}</td>
                                        <td>{{ $alternatifKriteria->harga }}</td>
                                        <td>{{ $alternatifKriteria->fasilitas }}</td>
                                        <td>{{ $alternatifKriteria->keamanan }}</td>
                                        <td>{{ $alternatifKriteria->kebersihan }}</td>
                                        <td>{{ $alternatifKriteria->rating }}</td>
                                        <td>
                                            <a href="{{ route('admin.alternatif_kriteria.edit', ['id' => $alternatifKriteria->id]) }}" class="btn btn-primary"><i class="fas fa-pen"></i> Edit</a>
                                            <a data-toggle="modal" data-target="#modal-hapus{{ $alternatifKriteria->id }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Hapus</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    @foreach ($data as $alternatifKriteria)
    <!-- Modal -->
    <div class="modal fade" id="modal-hapus{{ $alternatifKriteria->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah kamu yakin ingin menghapus data alternatif kriteria <b>{{ $alternatifKriteria->nama_alternatif }}</b>?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <form action="{{ route('admin.alternatif_kriteria.delete', ['id' => $alternatifKriteria->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Ya, Hapus</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    @endforeach

</div>

@endsection
