@extends('admin.template.Default')

@section('title', 'Pemilik Peliharaan')

@section('content')

	<div class="page-title">
    <div class="title_left">
      <h3>Data semua pasien <small></small></h3>
    </div>

    <div class="title_right">
      <div class="col-md-5 col-sm-5 col-xs-12 pull-right">
        <div class="right_align">
          <a href="/pasien/registrasi" type="button" class="btn btn-info zoom">Registrasi pasien baru</a>
        </div>
      </div>
    </div>
  </div>

  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel card_def shadow_fly round-all">
        <div class="x_title">
          <h2>Pemilik peliharaan</h2>
          <div class="clearfix"></div>
        </div>

        <div class="x_content">
          <div class="table-responsive">
            <table id="datatable-buttons" class="table table-striped jambo_table" style="width: 100%">
              <thead>
                <tr class="headings">
                  <th class="column-title">No</th>
                  <th class="column-title">Nama pemilik</th>
                  <th class="column-title">Kode pemilik</th>
                  <th class="column-title">Tgl daftar</th>
                  <th class="column-title">Gender</th>
                  <th class="column-title">Telepon</th>
                  <th class="column-title">Handphone</th>
                  <th class="column-title no-link last"><span class="nobr">Action</span></th>
                </tr>
              </thead>

              <tbody>
                @foreach($pasiens as $pasien)
                <tr class="even pointer">
                  <td class="a-center ">{{ $loop->iteration }}</td>
                  <td class=" ">{{ $pasien->nama }}</td>
                  <td class=" ">{{ $pasien->kode }}</td>
                  <td class=" ">{{ $pasien->created_at }}</td>
                  <td class=" ">{{ $pasien->gender }}</td>
                  <td class=" ">{{ $pasien->telepon }}</td>
                  <td class="a-right a-right ">{{ $pasien->handphone }}</td>
                  <td class=" last"><a href="/pasien/{{ $pasien->id }}">View</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel card_def shadow_fly round-all">
        <div class="x_title">
          <h2>Hewan peliharaan</h2>
          <div class="clearfix"></div>
        </div>

        <div class="x_content">
          <div class="table-responsive">
            <table id="datatable-fixed-header" class="table table-striped jambo_table" style="width: 100%">
              <thead>
                <tr class="headings">
                  <th class="column-title">No</th>
                  <th class="column-title">Nama hewan</th>
                  <th class="column-title">Kode hewan</th>
                  <th class="column-title">Jenis hewan</th>
                  <th class="column-title">Jenis kelamin</th>
                  <th class="column-title">Ras</th>
                  <th class="column-title">Warna bulu</th>
                  <th class="column-title">Nama pemilik</th>
                  <th class="column-title no-link last"><span class="nobr">Action</span></th>
                </tr>
              </thead>

              <tbody>
                @foreach($hewans as $hewan)
                  @if (count($hewan->pasien()->get()) > 0 )
                    @foreach($hewan->pasien()->get() as $pemilik)
                    <tr class="even pointer">
                      <td class="a-center ">{{ $loop->parent->iteration - $pemilikTerdelete }}</td>
                      <td class=" ">{{ $hewan->nama }}</td>
                      <td class=" ">{{ $hewan->kode }}</td>
                      <td class=" ">{{ $hewan->jenis }}</td>
                      <td class=" ">{{ $hewan->gender }}</td>
                      <td class=" ">{{ $hewan->ras }}</td>
                      <td class=" ">{{ $hewan->warna }}</td>
                      <td class=" ">{{ $pemilik->nama }}</td>
                      <td class=" last"><a href="/medis/{{ $pemilik->id }}/{{ $hewan->id }}">View</a></td>
                    </tr>
                    @endforeach
                  @endif
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>

@endsection
