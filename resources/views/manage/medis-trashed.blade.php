@extends('admin')

@section('contents')
	<h2>Trash data rekam medis</h2>
	<table class="table table-bordered table-sm">
    <thead>
      <tr>
        <th>No</th>
        <th>Anamnesa</th>
        <th>Diagnosa</th>
        <th>Terapi</th>
        <th>Keterangan</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    	@foreach($medises as $medis)
      <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{ str_limit($medis->anamnesa, $limit = 16, $end = '...')}}</td>
        <td>{{ str_limit($medis->diagnosa, $limit = 16, $end = '...')}}</td>
        <td>{{ str_limit($medis->terapi, $limit = 16, $end = '...')}}</td>
        <td>{{ str_limit($medis->keterangan, $limit = 16, $end = '...')}}</td>
        <td>
        	<a href="{{route('kelola.medis',[$medis->id])}}" class="btn btn-link btn-sm">View</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  
  <div class="text-center mx-auto">
    {{ $medises->links() }}
  </div>
  
@endsection