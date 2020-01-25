@extends('sekolah.layout')
@extends('sekolah.nav')

@section('content')
    <div class="row mt-4">
        <div class="col-lg-12 mb-2">
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('sekolah.create') }}">Tambah sekolah</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table">
        <tr class="table-info">
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Status</th>
            <th scope="col">Bidang</th>
            <th scope="col">Alamat</th>
            <th scope="col">Kelurahan</th>
            <th scope="col">Kecamatan</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($sekolahs as $sekolah)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $sekolah->nama }}</td>
            <td>{{ $sekolah->status }}</td>
            <td>{{ $sekolah->bidang }}</td>
            <td>{{ $sekolah->alamat }}</td>
            <td>{{ $sekolah->kelurahan }}</td>
            <td>{{ $sekolah->kecamatan }}</td>
            <td>
                <form action="{{ route('sekolah.destroy',$sekolah->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('sekolah.show',$sekolah->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('sekolah.edit',$sekolah->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $sekolahs->links() !!}
      
@endsection