@extends('template.main')

@section('title', 'Home')

@push('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
@endpush

@section('Judul', 'Inventaris')


@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-pinjam">
                                Pinjam Barang
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Penanggung Jawab</th>
                                        <th>Tanggal dipinjam</th>
                                        <th>NIS/Nama Siswa</th>
                                        <th>Tenggat</th>
                                        <th>Total Barang</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($peminjaman as $peminjamans)
                                        <tr>
                                            <td>{{ $peminjamans->pb_id }}</td>
                                            <td>{{ $peminjamans->user->user_nama }}</td>
                                            <td>{{ $peminjamans->pb_tgl }}</td>
                                            <td>{{ $peminjamans->pb_no_siswa . '-' . $peminjamans->pb_nama_siswa }}</td>
                                            <td>{{ $peminjamans->pb_harus_kembali_tgl }}</td>
                                            <td>{{ $peminjamans->peminjamanBarang->count() }}</td>
                                            <td><a href="{{ route('pinjam-barang-list', $peminjamans->pb_id) }}" class="btn btn-primary"><i class="fas fa-edit"></button></td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                        <h4>Dipinjam</h4>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="dipinjam" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Penanggung Jawab</th>
                                        <th>Peminjam</th>
                                        <th>tenggat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($belumKembali as $dipinjam)
                                        <tr>
                                            <td>{{ $dipinjam->pbd_id }}</td>
                                            <td>{{ $dipinjam->peminjaman->user->user_nama }}</td>
                                            <td>{{ $dipinjam->peminjaman->pb_no_siswa . '-' . $dipinjam->peminjaman->pb_nama_siswa }}</td>
                                            <td>{{ $dipinjam->peminjaman->pb_harus_kembali_tgl }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    @include('peminjamanBarang.modal')
@endsection
@push('script')
    <!-- DataTables  & Plugins -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="dist/js/demo.js"></script> --}}
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    <script>
        $(function() {
            $("#dipinjam").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#dipinjam_wrapper .col-md-6:eq(0)');
            $('#dipinjam1').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush
