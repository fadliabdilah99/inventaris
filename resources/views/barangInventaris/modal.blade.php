<div class="modal fade" id="modal-kategori">
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
                <form action="{{ route('kategori') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputusername1">Kategori</label>
                            <input name="jns_brg_nama" type="text" class="form-control" id="exampleInputusername1"
                                placeholder="Kategori">
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


<div class="modal fade" id="modal-produk">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('barang') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputusername1">Kategori</label>
                            <select name="jns_brg_kode" class="form-control" id="exampleInputusername1">
                                @foreach ($kategori as $kats)
                                    <option value="{{ $kats->jns_brg_kode }}">{{ $kats->jns_brg_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputusername1">Nama</label>
                            <input name="br_nama" type="text" class="form-control" id="exampleInputusername1"
                                placeholder="nama barang">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputusername1">Tanggal Terima</label>
                            <input name="br_tgl_terima" type="date" class="form-control" value="{{ date('Y-m-d') }}"
                                id="exampleInputusername1" placeholder="nama barang">
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
