<?php

namespace App\Http\Controllers;

use App\Sekolah;
use App\Charts\SekolahChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SekolahController extends Controller
{
    /**
     * Menampilkan data sekolah per Kecamatan
     *
     * @return \Illuminate\Http\Response
     */
    public function indexChart()
    {
        $sekolah = DB::table('sekolahs')
                 ->select('kecamatan', DB::raw('count(*) as jml'))
                 ->groupBy('kecamatan')
                 ->get()
                 ->pluck('jml', 'kecamatan');

        $charts = new SekolahChart;
        $charts->labels($sekolah->keys());
        $charts->dataset('Data Sekolah', 'line', $sekolah->values());
        return view('chart', compact('sekolah', 'charts'));
    }

    /**
     * Menampilkan Data sekolah
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sekolahs = Sekolah::latest()->paginate(5);

        return view('sekolah.index', compact('sekolahs'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Menampilkan form untuk input sekolah
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sekolah.create');
    }

    /**
     * Menyimpan data sekolah
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kecamatan' => 'required'
        ]);

        $sekolah = Sekolah::create($request->all());

        return redirect()->route('sekolah.index', $sekolah)
                        ->with('success', 'Data sekolah berhasil ditambahkan.');
    }

    /**
     * Menampilkan data sekolah secara spesifik
     *
     * @param  \App\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function show(Sekolah $sekolah)
    {
        return view('sekolah.show', compact('sekolah'));
    }

    /**
     * Menampilkan form edit sekolah
     *
     * @param  \App\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function edit(Sekolah $sekolah)
    {
        return view('sekolah.edit', compact('sekolah'));
    }

    /**
     * Update data sekolah
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sekolah $sekolah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sekolah $sekolah)
    {
        $request->validate([
            'nama' => 'required',
            'kecamatan' => 'required'
        ]);

        $sekolah->update($request->all());

        return redirect()->route('sekolah.index')
                        ->with('success', 'Sekolah berhasil diupdate.');
    }

    /**
     * Menghapus data sekolah
     *
     * @param  \App\Sekolah $sekolah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sekolah $sekolah)
    {
        $sekolah->delete();

        return redirect()->route('sekolah.index')
                        ->with('success', 'Data sekolah berhasil dihapus');
    }
}
