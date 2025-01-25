<?php

namespace App\Http\Controllers;

use App\Models\tm_barang_inventaris;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        $data['barang'] = tm_barang_inventaris::with('peminjamanBarang')->get();
        $data['dipinjam'] = tm_barang_inventaris::whereHas('peminjamanBarang', function ($q) {
            $q->where('pdb_sts', '==', 1);
        })->get();
        $data['tersedia'] = tm_barang_inventaris::whereHas('peminjamanBarang', function ($q) {
            $q->where('pdb_sts', '!=', 1);
        })->get();
        $data['rusak'] = tm_barang_inventaris::where('br_status', '!=', 1)->get();
        return view('home.index', $data);
    }
}
