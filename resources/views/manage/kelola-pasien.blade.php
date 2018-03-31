@extends('admin')

@section('contents')
	<h2>Pemilik hewan peliharaan</h2>
    <ul class="list-group">
      <li class="list-group-item">Nama pemilik : <br>{{$pasien->nama}}</li>
      <li class="list-group-item">Kode pemilik : <br>{{$pasien->kode}}</li>
      <li class="list-group-item">Gender : <br>{{$pasien->gender}}</li>
      <li class="list-group-item">Handphone : <br>{{$pasien->handphone}}</li>
      <li class="list-group-item">Telepon : <br>{{$pasien->telepon}}</li>
      <li class="list-group-item">Alamat :  <br>{{$pasien->alamat}}</li>
      {{-- <li class="list-group-item">Hewan Peliharaan :  <br>
          <table class="table table-stripped table-sm">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama peliharaan</th>
                <th>Jenis hewan</th>
                <th>jenis kelamin</th>
                <th>Ras</th>
                <th>Warna bulu</th>
              </tr>
            </thead>
            <tbody>
              @foreach($hewans as $hewan)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$hewan->nama}}</td>
                <td>{{$hewan->jenis}}</td>
                <td>{{$hewan->gender}}</td>
                <td>{{$hewan->ras}}</td>
                <td>{{$hewan->warna}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
      </li> --}}
      <li class="list-group-item">Aksi :  <br>
        <form method="POST" action="{{route('action.pasien', [$pasien->id])}}" >
          @csrf
          <input type="hidden" name="_method" value="POST">
          
          <input type="submit" name="action" value="Kembalikan data" class="btn btn-info btn-sm float-right">
        </form>
      </li>
    </ul>
@endsection