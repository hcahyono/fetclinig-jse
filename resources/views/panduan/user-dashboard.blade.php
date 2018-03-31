@extends('admin.template.Default')

@section('title', 'Panduan')

@section('content')


    <div class="page-title">
      <div class="title_left">
        <h3>Panduan</h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Panduan operasional sistem</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
              <div class="col-md-4 col-xs-12">
                <div class="list-group">
                  <div class="list-group-item"> <h4>Menu navigasi</h4> </div>
                  @foreach($panels as $panel)
                    <a href="{{route('view.panduan', $panel->id)}}" class="list-group-item list-group-item-action">{{$panel->judul}}</a>
                  @endforeach
                </div>
              </div>

              <div class="col-md-8 col-xs-12">
                <div class="well">
                  <h4>Pilih panduan pada menu navigasi di samping kiri untuk melihat panduan</h4>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>


@endsection