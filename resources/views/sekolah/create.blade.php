@extends('sekolah.layout')
@extends('sekolah.nav')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white">Tambah Data</div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Maaf!</strong> Inputan yang anda masukan salah<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-body">
                    <form action="{{ route('sekolah.store') }}" method="POST">
                        @csrf

                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">Nama:</label> 
                            <div class="col-md-6">
                                <input type="text" name="nama" class="form-control" placeholder="Nama"> 
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label text-md-right">Status:</label> 
                            <div class="col-md-6">
                                <select class="form-control" id="status">
                                    <option value="Negeri">Negeri</option>
                                    <option value="Swasta"">Swasta</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bidang" class="col-md-4 col-form-label text-md-right">Bidang:</label> 
                            <div class="col-md-6">
                                <select class="form-control" id="bidang">
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA</option>
                                    <option value="SMK">SMK</option>
                                    <option value="SLB">SLB</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-md-4 col-form-label text-md-right">Alamat:</label> 
                            <div class="col-md-6">
                                <input type="text" name="alamat" class="form-control" placeholder="Alamat">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="kelurahan" class="col-md-4 col-form-label text-md-right">Kelurahan:</label> 
                            <div class="col-md-6">
                                <input type="text" name="kelurahan" class="form-control" placeholder="Kelurahan">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="kecamatan" class="col-md-4 col-form-label text-md-right">Kecamatan:</label> 
                            <div class="col-md-6">
                                <input type="text" name="kecamatan" class="form-control" placeholder="Kecamatan">
                            </div>
                        </div> 
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-info">Submit</button>
                                <a class="btn btn-info" href="{{ route('sekolah.index') }}"> Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection