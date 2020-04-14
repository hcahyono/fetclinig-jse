@extends('admin.template.Default')

@section('title', 'Dashboard')

@section('content')

	<div class="row top_tiles">
    <div class="animated flipInY col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <div class="tile-stats">
        <div class="icon"><i class="fa fa-user"></i></div>
        <div class="count">{{$pasien}}</div>
        <h3>Pemilik Hewan</h3>
        <p><strong>Jumlah Pemilik Hewan Yang Terdaftar Pada Sistem Saat Ini</strong></p>
      </div>
    </div>
    <div class="animated flipInY col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <div class="tile-stats">
        <div class="icon"><i class="fa fa-paw"></i></div>
        <div class="count">{{$peliharaan}}</div>
        <h3>Hewan Peliharaan</h3>
        <p><strong>Jumlah Hewan Peliharaan Yang Terdaftar Pada Sistem Saat Ini</strong></p>
      </div>
    </div>
  </div>

  <div class="clearfix"></div>
  
  <div class="row top_tiles" style="">
    <div class="animated flipInY col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="tile-label">
        DATA PASIEN
      </div>
      <div class="tile-stats card_wide shadow_fly">
        <div class="r-button"><a href="{{ route('pasien.index') }}" class="btn btn-info fly_btn">LIHAT DATA PASIEN</a></div>
        <div class="tile-title big">Lihat semua data pasien</div>
        <div class="tile-info">Klik tombol LIHAT DATA PASIEN untuk melihat semua data pasien</div>
      </div>
    </div>
  </div>
  

  <div class="clearfix"></div>
  
  <div class="row top_tiles">
    <div class="animated flipInY col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="tile-label">
        REGISTRASI PASIEN
      </div>
      <div class="tile-stats card_wide shadow_fly">
        <div class="r-button"><a href="{{ route('pasien.create') }}" class="btn btn-info fly_btn">REGISTRASI PASIEN</a></div>
        <div class="tile-title big">Registrasi pasien baru</div>
        <div class="tile-info">Klik tombol REGISTRASI PASIEN untuk mendaftarkan pasien baru</div>
      </div>
    </div>
  </div>

  <div class="clearfix"></div>

@endsection
