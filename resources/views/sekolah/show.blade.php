@extends('sekolah.layout')
@extends('sekolah.nav')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white">Detail Sekolah</div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Nama:</label>
                        <div class="col-md-6">
                            {{ $sekolah->nama }}
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Status:</label> 
                        <div class="col-md-6">
                            {{ $sekolah->status}}
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Bidang:</label> 
                        <div class="col-md-6">
                            {{ $sekolah->bidang}}
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Alamat:</label> 
                        <div class="col-md-6">
                            {{ $sekolah->alamat}}
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Kelurahan:</label> 
                        <div class="col-md-6">
                            {{ $sekolah->kelurahan}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Kecamatan:</label> 
                        <div class="col-md-6">
                            {{ $sekolah->kecamatan}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection