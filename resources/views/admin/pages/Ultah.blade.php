@extends('admin.template.Default')

@section('title', 'Ulang Tahun')

@section('content')

	<div class="page-title">
    <div class="title_left">
      <h3>Ulang Tahun <small></small></h3>
    </div>
  </div>

  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel card_def shadow_fly round-all">
        <div class="x_title">
          <h2>Ulang tahun pemilik hewan peliharaan</h2>
          <div class="clearfix"></div>
        </div>

        <div class="x_content">
          <div class="panel panel-danger">
            <div class="panel-heading"><h4 class="text-capitalize">ulang tahun hari ini {{$now}}</h4></div>
            <div class="panel-body">
              @if( empty($ulangtahun) )
                <blockquote>
                  <p class="lead text-center">Tidak ada pemilik hewan peliharaan yang ulang tahun di hari ini</p> 
                </blockquote>
              @else
                <div class="row">
                  @foreach($ulangtahun as $ultah)
                    <div class="col-xs-12 col-sm-6 col-lg-4">
                      <div class="thumbnail shadow_fly">
                        <img src="/images/birthday-cake_1280.png" alt="ultah-images">
                        <div class="caption">
                          <p class="text-uppercase">Berikan kartu ucapan selamat ulang tahun kepada</p>
                          <h3 class="text-center text-capitalize">{{$ultah->nama}}</h3>
                          <p class="text-center text-capitalize">Hari ini <strong>{{$now}}</strong> adalah hari ulang tahunnya</p>
                          <div class="list-group">
                            <a href="/pasien/{{ $ultah->id }}" target="blank" class="list-group-item list-group-item-danger text-center text-capitalize">lihat informasi tentang {{$ultah->nama}}</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endforeach  
                </div>
              @endif
            </div>
          </div>
        </div>

        <div class="x_content">
          <div class="panel panel-info">
            <div class="panel-heading"><h4 class="text-capitalize">ulang tahun besok {{$tomorrow}}</h4></div>
            <div class="panel-body">
              @if( empty($ulangtahunbesok) )
                <blockquote>
                  <p class="lead text-center">Tidak ada pemilik hewan peliharaan yang ulang tahun besok</p> 
                </blockquote>
              @else
                <div class="row">
                  @foreach($ulangtahunbesok as $ultahbesok)
                    <div class="col-xs-12 col-sm-6 col-lg-4">
                      <div class="thumbnail shadow_fly">
                        <img src="/images/birthday-balloon_1280.png" alt="ultah-images">
                        <div class="caption">
                          <p class="text-uppercase">Siapkan kartu ucapan ulang tahun terbaik untuk</p>
                          <h3 class="text-center text-capitalize">{{$ultahbesok->nama}}</h3>
                          <p class="text-center text-capitalize">Karena besok <strong>{{$tomorrow}}</strong> adalah hari ulang tahunnya</p>
                          <div class="list-group">
                            <a href="/pasien/{{ $ultahbesok->id }}" target="blank" class="list-group-item list-group-item-success text-center text-capitalize">lihat informasi tentang {{$ultahbesok->nama}}</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endforeach  
                </div>
              @endif
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <div class="clearfix"></div>

@endsection
