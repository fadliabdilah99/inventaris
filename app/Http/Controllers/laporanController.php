<?php

namespace App\Http\Controllers;

use App\Models\tm_barang_inventaris;
use App\Models\tm_peminjaman;
use App\Models\tm_pengembalian;
use App\Models\tr_jenis_barang;
use App\Models\User;
use Illuminate\Http\Request;

class laporanController extends Controller
{

    public function index()
    {
        $data['barangAll'] = tm_barang_inventaris::get();
        $data['barang'] = $data['barangAll']->where('br_status', '1');
        $data['pengembalian'] = tm_pengembalian::where('kembali_sts', '1')->get();
        return view('laporan.index', $data);
    }

    public function referensi()
    {
        $data['kategori'] = tr_jenis_barang::all();
        $data['user'] = User::all();
        return view('referensi.index', $data);
    }
}
