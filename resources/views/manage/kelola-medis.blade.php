@extends('admin')

@section('contents')
	<h2>Rekam medis</h2>
    <ul class="list-group">
      <li class="list-group-item">Hewan peliharaan :  <br>
          <table class="table table-stripped table-sm">
            <thead>
              <tr>
                <th>Nama hewan</th>
                <th>Jenis hewan</th>
                <th>Jenis kelamin</th>
                <th>Ras</th>
                <th>Warna bulu</th>
              </tr>
            </thead>
            <tbody>
              @foreach($medis->hewan()->withTrashed()->get() as $hewan)
              <tr>
                <td>{{$hewan->nama}}</td>
                <td>{{$hewan->jenis}}</td>
                <td>{{$hewan->gender}}</td>
                <td>{{$hewan->ras}}</td>
                <td>{{$hewan->warna}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
      </li>
      <li class="list-group-item">Anamnesa : <br>{{$medis->anamnesa}}</li>
      <li class="list-group-item">Diagnosa : <br>{{$medis->diagnosa}}</li>
      <li class="list-group-item">Terapi : <br>{{$medis->terapi}}</li>
      <li class="list-group-item">Keterangan : <br>{{$medis->keterangan}}</li>
      <li class="list-group-item">Aksi :  
        <form method="POST" action="{{route('action.medis',[$medis->id])}}" >
          @csrf
          <input type="hidden" name="_method" value="POST">
          
          <input type="submit" name="action" value="Kembalikan data" class="btn btn-info btn-sm float-right">
        </form>
      </li>
    </ul>
@endsection