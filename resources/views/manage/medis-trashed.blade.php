@extends('admin')

@section('contents')
	<h2>Trash data rekam medis</h2>
	<table class="table table-bordered table-sm">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama hewan</th>
        <th>Anamnesa</th>
        <th>Diagnosa</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    	@foreach($medises as $medis)
        @if (count($medis->hewan()->withTrashed()->get()) > 0 )
          @foreach($medis->hewan()->withTrashed()->get() as $hewan)
          <tr>
            <td>{{$loop->parent->iteration}}</td>
            <td>{{ ($hewan->nama != "" ? $hewan->nama : "-" ) }}</td>
            <td>{{ str_limit( ($medis->anamnesa != "" ? $medis->anamnesa : "-" ), $limit = 16, $end = '...')}}</td>
            <td>{{ str_limit( ($medis->diagnosa != "" ? $medis->diagnosa : "-" ), $limit = 16, $end = '...')}}</td>
            <td>
            	<a href="{{route('kelola.medis',[$medis->id])}}" class="btn btn-link btn-sm">View</a>
            </td>
          </tr>
          @endforeach
        @endif
      @endforeach
    </tbody>
  </table>
  
  <div class="text-center mx-auto">
    {{ $medises->links() }}
  </div>
  
@endsection