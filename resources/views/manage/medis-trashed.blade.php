@extends('admin')

@section('contents')
	<h2>Trash data rekam medis</h2>
	<table class="table table-bordered table-sm">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama pemilik</th>
        <th>Nama hewan</th>
        <th>Anamnesa</th>
        <th>Diagnosa</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @if (count($medises))
        @foreach($medises as $medis)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{ ($medis->hewan->pasien ? $medis->hewan->pasien->nama : "-" ) }}</td>
            <td>{{ ($medis->hewan ? $medis->hewan->nama : "-" ) }}</td>
            <td>{{ str_limit( ($medis->anamnesa != "" ? $medis->anamnesa : "-" ), $limit = 16, $end = '...')}}</td>
            <td>{{ str_limit( ($medis->diagnosa != "" ? $medis->diagnosa : "-" ), $limit = 16, $end = '...')}}</td>
            <td>
              <a href="{{route('kelola.medis',[$medis->id])}}" class="btn btn-link btn-sm">View</a>
            </td>
          </tr>
        @endforeach
      @else
       <tr>
         <td colspan="6">data tidak ditemukan</td>
       </tr>
      @endif
    </tbody>
  </table>
  
  <div class="text-center mx-auto">
    {{ $medises->links() }}
  </div>
  
@endsection