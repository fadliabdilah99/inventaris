@extends('template.main')

@section('title', 'Laporan')

@push('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
@endpush

@section('Judul', 'Laporan')


@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Laporan Barang</h4>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Kategori</th>
                                        <th>Produk</th>
                                        <th>Banyak Dipinjam</th>
                                        <th>History Pinjaman</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barang as $barangs)
                                        <tr>
                                            <td>{{ $barangs->br_nama }}</td>
                                            <td>{{ $barangs->jenisBarang->jns_brg_nama }}</td>
                                            <td>{{ $barangs->peminjamanBarang->count() }}x</td>
                                            <td><button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#modal-produk"><i class="fas fa-history"></button></td>
                                        </tr>
                                        @include('laporan.modal')
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
                            <h4>History Pengembalian</h4>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="history" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Peminjam</th>
                                        <th>Penanggung Jawab</th>
                                        <th>Tanggal Pengembalian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengembalian as $pengembalians)
                                        <tr>
                                            <td>{{ $pengembalians->kembali_id }}</td>
                                            <td>{{ $pengembalians->peminjaman->pb_no_siswa . '-' . $pengembalians->peminjaman->pb_nama_siswa }}
                                            </td>
                                            <td>{{ $pengembalians->user->user_nama }}</td>
                                            <td>{{ $pengembalians->kembali_tgl }}</td>
                                        </tr>
                                        @include('laporan.modal')
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
                            <div class="row">
                                <div class="col-md-2">
                                    <select name="status" id="status" class="form-control">
                                        <option value="">Semua Status</option>
                                        <option value="1">Barang Baik</option>
                                        <option value="2">Barang Rusak Dapat Diperbaiki</option>
                                        <option value="3">Barang Rusak Tidak Dapat Digunakan</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="statusbarang" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Kategori</th>
                                        <th>Produk</th>
                                        <th>Tanggal terima</th>
                                        <th>Kondisi Barang</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barangAll as $barangAlls)
                                        <tr>
                                            <td>{{ $barangAlls->br_nama }}</td>
                                            <td>{{ $barangAlls->jenisBarang->jns_brg_nama }}</td>
                                            <td>{{ $barangAlls->br_tgl_terima }}</td>
                                            <td>
                                                @if ($barangAlls->br_status == 1)
                                                    <span class="badge badge-success">barangAll kondisi baik</span>
                                                @elseif($barangAlls->br_status == 2)
                                                    <span class="badge badge-danger">barangAll kondisi rusak, bisa
                                                        diperbaiki</span>
                                                @elseif($barangAlls->br_status == 3)
                                                    <span class="badge badge-danger">barangAll rusak , tidak bisa digunakan
                                                    </span>
                                                @else
                                                    <span class="badge badge-danger">barangAll hilang</span>
                                                @endif
                                            </td>
                                            <td><button class="btn btn-primary"><i class="fas fa-edit"></button></td>
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
            $("#history").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#history_wrapper .col-md-6:eq(0)');
            $('#history1').DataTable({
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
            $("#statusbarang").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#statusbarang_wrapper .col-md-6:eq(0)');
            $('#statusbarang1').DataTable({
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
        $(document).ready(function() {
            // Inisialisasi DataTable
            var table = $('#statusbarang').DataTable();

            // Filter berdasarkan dropdown status
            $('#status').change(function() {
                var status = $(this).val();

                if (status) {
                    // Penerjemahan nilai dropdown ke teks dalam tabel
                    var statusText = '';
                    switch (status) {
                        case '1':
                            statusText = 'barangAll kondisi baik';
                            break;
                        case '2':
                            statusText = 'barangAll kondisi rusak, bisa diperbaiki';
                            break;
                        case '3':
                            statusText = 'barangAll rusak , tidak bisa digunakan';
                            break;
                        case '4':
                            statusText = 'barangAll hilang';
                            break;
                    }

                    // Filter berdasarkan kolom Kondisi Barang (kolom index 3)
                    table.column(3).search(statusText).draw();
                } else {
                    // Reset filter jika dropdown dikembalikan ke "Semua Status"
                    table.column(3).search('').draw();
                }
            });
        });
    </script>
@endpush
