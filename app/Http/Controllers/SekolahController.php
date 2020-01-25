<?php

namespace App\Http\Controllers;

use App\Sekolah;
use App\Charts\SekolahChart;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexChart()
    {
        // $sekolah = Sekolah::all()
        //     ->groupBy('kecamatan')
        //     ->map(function ($nama, $kec) {
        //         return [
        //             'type' => $kec,
        //             'records' => $nama->count(),
        //             'data' => $nama->pluck('nama')
        //         ];
        //     })
        //     ->values();
        $sekolah = DB::table('sekolahs')
                 ->select('kecamatan', DB::raw('count(*) as jml'))
                 ->groupBy('kecamatan')
                 ->get();
        // dd($sekolah);

        $charts = new SekolahChart;
        $charts->labels($sekolah->keys());
        $charts->dataset('My dataset', 'line', $sekolah->values());
        dd($charts); 
        return view('chart', compact('sekolah', 'charts'));
    }

    /**
     * Display a listing of the resource.
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sekolah.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required'
        ]);

        $sekolah = Sekolah::create($request->all());

        return redirect()->route('sekolah.index', $sekolah)
                        ->with('success', 'Data sekolah berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Sekolah $sekolah)
    {
        return view('sekolah.show', compact('sekolah'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Sekolah $sekolah)
    {
        return view('sekolah.edit', compact('sekolah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sekolah $sekolah)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required'
        ]);

        $sekolah->update($request->all());

        return redirect()->route('sekolah.index')
                        ->with('success', 'Sekolah berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sekolah $sekolah)
    {
        $sekolah->delete();

        return redirect()->route('sekolah.index')
                        ->with('success', 'Data sekolah berhasil dihapus');
    }
}
