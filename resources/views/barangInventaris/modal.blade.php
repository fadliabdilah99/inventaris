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


<div class="modal fade" id="modal-update">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('update-barang') }}" method="POST">
                    @csrf
                    <input type="text" hidden name="br_kode" id="br_kode">
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
                            <input name="br_nama" type="text" class="form-control" id="br_nama"
                                placeholder="nama barang">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputusername1">Kondisi Barang</label>
                            <select name="br_status" class="form-control" id="exampleInputusername1">
                                    <option value="">pilih status</option>
                                    <option value="1">Barang Baik</option>
                                    <option value="2">Barang Rusak, Dapat Diperbaki</option>
                                    <option value="3">Barang Rusak, Tidak Dapat Diperbaki</option>
                            </select>
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
