<?php

namespace App\Http\Controllers\Api;

use App\Sekolah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SekolahController extends Controller
{

    public function data()
    {
        $sekolah = Sekolah::all();
 
        return response()->json([
            'success' => true,
            'data' => $sekolah
        ]);
    }

    public function index()
    {
        $sekolah = Sekolah::all();
 
        return response()->json([
            'success' => true,
            'data' => $sekolah
        ]);
    }
 
    public function show($id)
    {
        $sekolah = Sekolah::all()->find($id);
 
        if (!$sekolah) {
            return response()->json([
                'success' => false,
                'message' => 'Sekolah dengan id ' . $id . ' tidak ditemukan'
            ], 400);
        }
 
        return response()->json([
            'success' => true,
            'data' => $sekolah->toArray()
        ], 400);
    }
 
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required'
        ]);
 
        $sekolah = new Sekolah();
        $sekolah->nama = $request->nama;
        $sekolah->status = $request->status;
        $sekolah->bidang = $request->bidang;
        $sekolah->alamat = $request->alamat;
        $sekolah->kelurahan = $request->kelurahan;
        $sekolah->kecamatan = $request->kecamatan;
 
        if ($sekolah)
            return response()->json([
                'success' => true,
                'data' => $sekolah->toArray()
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Gagal menambahkan sekolah'
            ], 500);
    }
 
    public function update(Request $request, $id)
    {
        $sekolah = Sekolah::all()->find($id);
 
        if (!$sekolah) {
            return response()->json([
                'success' => false,
                'message' => 'Sekolah dengan id ' . $id . ' tidak ditemukan'
            ], 400);
        }
 
        $updated = $sekolah->fill($request->all())->save();
 
        if ($updated)
            return response()->json([
                'success' => true
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Tidak dapat mengupdate sekolah'
            ], 500);
    }
 
    public function destroy($id)
    {
        $sekolah = Sekolah::all()->find($id);
 
        if (!$sekolah) {
            return response()->json([
                'success' => false,
                'message' => 'Sekolah dengan id ' . $id . ' tidak ditemukan'
            ], 400);
        }
 
        if ($sekolah->delete()) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Sekolah tidak dapat dihapus!'
            ], 500);
        }
    }
}
