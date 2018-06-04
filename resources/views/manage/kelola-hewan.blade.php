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
                <td><strong>{{($pemilik->nama != "" ? $pemilik->nama : "-" )}}</strong></td>
                <td>{{($pemilik->kode != "" ? $pemilik->kode : "-" )}}</td>
                <td>{{($pemilik->gender != "" ? $pemilik->gender : "-" )}}</td>
                <td>{{($pemilik->handphone != "" ? $pemilik->handphone : "-" )}}</td>
                <td>{{($pemilik->telepon != "" ? $pemilik->telepon : "-" )}}</td>
                <td>{{($pemilik->alamat != "" ? $pemilik->alamat : "-" )}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
      </li>
      <li class="list-group-item">Nama hewan : <strong>{{($hewan->nama != "" ? $hewan->nama : "-" )}}</strong></li>
      <li class="list-group-item">Jenis hewan : <strong>{{($hewan->jenis != "" ? $hewan->jenis : "-" )}}</strong></li>
      <li class="list-group-item">Jenis kelamin : <strong>{{($hewan->gender != "" ? $hewan->gender : "-" )}}</strong></li>
      <li class="list-group-item">Ras : <strong>{{($hewan->ras != "" ? $hewan->ras : "-" )}}</strong></li>
      <li class="list-group-item">Warna bulu : <strong>{{($hewan->warna != "" ? $hewan->warna : "-" )}}</strong></li>
      <li class="list-group-item">Aksi :  
        <form method="POST" action="{{route('action.hewan',[$hewan->id])}}" >
          @csrf
          <input type="hidden" name="_method" value="POST">
          
          <input type="submit" name="action" value="Kembalikan data" class="btn btn-info btn-sm float-right">
        </form>
      </li>
    </ul>
@endsection