<?php

namespace App\Http\Controllers;

use App\Models\td_peminjaman_barang;
use App\Models\tm_barang_inventaris;
use App\Models\tm_peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class peminjamanbarangController extends Controller
{
    public function index()
    {
        $data['peminjaman'] = tm_peminjaman::all();
        $data['belumKembali'] = td_peminjaman_barang::where('pdb_sts', 1)->get();
        return view('peminjamanBarang.index', $data);
    }

    public function pinjam(Request $request)
    {
        $request->validate([
            'pb_no_siswa' => 'required',
            'pb_nama_siswa' => 'required',
            'pb_harus_kembali_tgl' => 'required',
        ]);
        // dd($request->all());
        $dataterakhir = tm_peminjaman::first();
        if ($dataterakhir == null) {
            $pbid = 'PJ' . date('Ym') . 001;
        } else {
            $pbid = 'PJ' . (substr($dataterakhir->pb_id, 2) + 1);
        }



        tm_peminjaman::create([
            'pb_id' => $pbid,
            'user_id' => Auth::user()->user_id,
            'pb_tgl' => date('Y-m-d'),
            'pb_no_siswa' => $request->pb_no_siswa,
            'pb_nama_siswa' => $request->pb_nama_siswa,
            'pb_harus_kembali_tgl' => $request->pb_harus_kembali_tgl,
            'pb_stat' => 1,
        ]);

        return redirect()->back()->with('success', 'Data Berhasil Ditambahkan');
    }

    public function list($id)
    {
        $inventaris = tm_barang_inventaris::all();
        return view('peminjamanBarang.list', compact('id', 'inventaris'));
    }

    public function add(Request $request)
    {
        // dd($request->all());

        $dataterakhir = td_peminjaman_barang::first();
        if ($dataterakhir == null) {
            $pbid = $request->pb_id . 001;
        } else {
            $pbid = (substr($dataterakhir->pb_id, 2) + 1);
        }

        foreach ($request->id as $id) {
            td_peminjaman_barang::create([
                'pbd_id' => 'PJ' . $pbid,
                'pb_id' => $request->pb_id,
                'br_kode' => $id,
                'pdb_tgl' => date('Y-m-d'),
                'pdb_sts' => 1,
            ]);
            $pbid++;
        }

        return redirect()->route('peminjaman')->with('success', 'Data Berhasil Ditambahkan');
    }
}
