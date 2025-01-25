<div class="modal fade" id="modal-produk">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">History</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <section class="content">
                    <div class="container-fluid">
                        <!-- Timelime example  -->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- The time line -->
                                <div class="timeline">
                                    @foreach ($barangs->peminjamanBarang as $history)
                                        <div>
                                            <i class="fas fa-user bg-green"></i>
                                            <div class="timeline-item">
                                                <span class="time"><i class="fas fa-clock"></i> {{$history->created_at->diffforHumans()}}</span>
                                                <h3 class="timeline-header no-border"><a href="#">{{$history->peminjaman->pb_nama_siswa}}</a>-{{$history->peminjaman->pb_no_siswa}}</h3>
                                                <p>dari {{$history->peminjaman->pb_tgl}}</p>
                                                <p>kembali {{$history->peminjaman->pb_harus_kembali_tgl}}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                    <!-- /.timeline -->
                </section>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
