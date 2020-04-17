@extends('admin')

@section('contents')
	<h2>Rekam medis</h2>
    <ul class="list-group">
      <li class="list-group-item">Pemilik peliharaan :  <br>
        <table class="table table-stripped table-sm">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Kode</th>
              <th>Gender</th>
              <th>Kontak</th>
              <th>Alamat</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              @if ($medis->hewan->pasien)    
                <td><strong>{{ $medis->hewan->pasien->nama }}</strong></td>
                <td>{{ $medis->hewan->pasien->kode }}</td>
                <td>{{ $medis->hewan->pasien->gender }}</td>
                <td>{{ "Tel. ". $medis->hewan->pasien->telepon}} <br> {{ "Hp. ". $medis->hewan->pasien->handphone }}</td>
                <td>{{ $medis->hewan->pasien->alamat }}</td>
              @else
                <td colspan="5" class="text-center">data tidak ditemukan.</td>
              @endif
            </tr>
          </tbody>
        </table>
      </li>
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
              <tr>
                @if ($medis->hewan)    
                  <td><strong>{{ $medis->hewan->nama }}</strong></td>
                  <td>{{ $medis->hewan->jenis }}</td>
                  <td>{{ $medis->hewan->gender }}</td>
                  <td>{{ $medis->hewan->ras }}</td>
                  <td>{{ $medis->hewan->warna }}</td>
                @else
                  <td colspan="5" class="text-center">data tidak ditemukan.</td>
                @endif
              </tr>
            </tbody>
          </table>
      </li>
      <li class="list-group-item">Anamnesa : <strong>{{($medis->anamnesa != "" ? $medis->anamnesa : "-" )}}</strong></li>
      <li class="list-group-item">Diagnosa : <strong>{{($medis->diagnosa != "" ? $medis->diagnosa : "-" )}}</strong></li>
      <li class="list-group-item">Terapi : <strong>{{($medis->terapi != "" ? $medis->terapi : "-" )}}</strong></li>
      <li class="list-group-item">Keterangan : <strong>{{($medis->keterangan != "" ? $medis->keterangan : "-" )}}</strong></li>
      <li class="list-group-item">Aksi :  
        <form method="POST" action="{{route('action.medis',[$medis->id])}}" >
          @csrf
          <input type="hidden" name="_method" value="POST">
          
          <input type="submit" name="action" value="Kembalikan data" class="btn btn-info btn-sm float-right">
        </form>
      </li>
    </ul>
@endsection