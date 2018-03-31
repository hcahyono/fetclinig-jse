@extends('admin')

@section('contents')
	<h2>Hewan peliharaan</h2>
    <ul class="list-group">
      <li class="list-group-item">Pemilik Peliharaan :  <br>
          <table class="table table-stripped table-sm">
            <thead>
              <tr>
                <th>Nama pemilik</th>
                <th>Kode pemilik</th>
                <th>Gender</th>
                <th>Handphone</th>
                <th>Telepon</th>
                <th>Alamat</th>
              </tr>
            </thead>
            <tbody>
              @foreach($hewan->pasien()->withTrashed()->get() as $pemilik)
              <tr>
                <td>{{$pemilik->nama}}</td>
                <td>{{$pemilik->kode}}</td>
                <td>{{$pemilik->gender}}</td>
                <td>{{$pemilik->handphone}}</td>
                <td>{{$pemilik->telepon}}</td>
                <td>{{$pemilik->alamat}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
      </li>
      <li class="list-group-item">Nama hewan : {{$hewan->nama}}</li>
      <li class="list-group-item">Jenis hewan : {{$hewan->jenis}}</li>
      <li class="list-group-item">Jenis kelamin : {{$hewan->gender}}</li>
      <li class="list-group-item">Ras : {{$hewan->ras}}</li>
      <li class="list-group-item">Warna bulu : {{$hewan->warna}}</li>
      <li class="list-group-item">Aksi :  
        <form method="POST" action="{{route('action.hewan',[$hewan->id])}}" >
          @csrf
          <input type="hidden" name="_method" value="POST">
          
          <input type="submit" name="action" value="Kembalikan data" class="btn btn-info btn-sm float-right">
        </form>
      </li>
    </ul>
@endsection