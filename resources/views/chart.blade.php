@extends('sekolah.layout')
@extends('sekolah.nav')

@section('content') 
<div class="container">
  <div class="card mt-5">
      <div class="card-header bg-info text-white">Graphs</div> 
      <div class="card-body" style="width: 50%">
        {!! $charts->container() !!} 
      </div>
  </div>
</div>
{!! $charts->script() !!}
@endsection
