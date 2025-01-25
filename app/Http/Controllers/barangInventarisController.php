<?php

namespace App\Http\Controllers;

use App\Models\tm_barang_inventaris;
use App\Models\tr_jenis_barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class barangInventarisController extends Controller
{
    public function index()
    {
        $data['kategori'] = tr_jenis_barang::all();
        $data['barang'] = tm_barang_inventaris::all();
        return view('barangInventaris.index', $data);
    }

    public function addkategori(Request $request)
    {
        $request->validate([
            'jns_brg_nama' => 'required'
        ]);
        $kode = tr_jenis_barang::orderBy('jns_brg_kode', 'desc')->first();
        if ($kode == null) {
            $kodenew = 1;
        } else {
            $kodenew = tr_jenis_barang::get()->count() + 1;
        }

        tr_jenis_barang::create([
            'jns_brg_kode' => $kodenew,
            'jns_brg_nama' => $request->jns_brg_nama
        ]);
    }

    public function addbarang(Request $request)
    {
        $request->validate([
            'jns_brg_kode' => 'required',
            'br_nama' => 'required',
            'br_tgl_terima' => 'required'
        ]);

        $kodeTerakhir = tm_barang_inventaris::first()->br_kode ?? 0;
        if ($kodeTerakhir == 0) {
            $nomber = 'inv' . date('Y') . '1';
        } else {
            $nomber = substr($kodeTerakhir, 0, 5) . (substr($kodeTerakhir, 4) + 1);
        }


        tm_barang_inventaris::create([
            'br_kode' => $nomber,
            'jns_brg_kode' => $request->jns_brg_kode,
            'user_id' => Auth::user()->user_id,
            'br_nama' => $request->br_nama,
            'br_tgl_terima' => $request->br_tgl_terima,
            'br_tgl_entry' => date('Y-m-d'),
            'br_status' => '1'
        ]);

        return redirect()->back()->with('success', 'Data Berhasil Ditambahkan');
    }

    public function update(Request $request){
        $request->validate([
            'br_kode' => 'required',
            'br_nama' => 'required',
            'jns_brg_kode' => 'required'
        ]);
        tm_barang_inventaris::where('br_kode', $request->br_kode)->update([
            'br_nama' => $request->br_nama,
            'jns_brg_kode' => $request->jns_brg_kode,
            'user_id' => Auth::user()->user_id,
            'br_status' => $request->br_status
        ]);

        return redirect()->back()->with('success', 'Data Berhasil Diubah');
    }
}
