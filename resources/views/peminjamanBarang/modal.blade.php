<div class="modal fade" id="modal-pinjam">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Kategori</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('pinjam-barang') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputusername1">NIS</label>
                            <input name="pb_no_siswa" type="number" class="form-control" id="exampleInputusername1"
                                placeholder="0000">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputusername1">Nama</label>
                            <input name="pb_nama_siswa" type="text" class="form-control" id="exampleInputusername1"
                                placeholder="name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputusername1">Tenggat</label>
                            <input name="pb_harus_kembali_tgl" type="date" class="form-control"
                                id="exampleInputusername1" min="{{ date('Y-m-d') }}" placeholder="Kategori">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
