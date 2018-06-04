@extends('admin.template.Default')

@section('title', 'Edit Peliharaan')

@section('content')

  <div class="page-title">
    <div class="title_left">
      <h3>Edit data peliharaan <small></small></h3>
    </div>
    <div class="title_right">
      <div class="col-md-12 col-sm-12 col-xs-12 pull-right">
      	<div class="right_align">
          <button class="btn btn-danger zoom btn_right pull-left"
              onclick="event.preventDefault();
              var q = confirm('Data akan dihapus dari sistem !!, tetap lanjutkan ?');
              if (q){
                document.getElementById('peliharaan-delete').submit();
              }
              "><i class="fa fa-exclamation-circle"></i> Hapus data</button>

          {!! Form::open(['route' => ['peliharaan.delete', $pasien->id, $peliharaan->id], 'method' => 'DELETE','id'=>'peliharaan-delete', 'class'=>'form pull-left']) !!}

          {!! Form::close() !!}
      	</div>
      </div>
    </div>
  </div>

  <div class="clearfix"></div>

  <div id="formEditPeliharaan" class="formEditPeliharaan  row top_tiles card_wrap">
    <div class="animated flipInY col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="formEditPeliharaan tile-stats card_def shadow_fly">

          <div class="tile-name">Edit Peliharaan
            <div class="nav navbar-right">
              <button class="btn btn-success zoom btn_right"
                onclick="event.preventDefault();
                var q = confirm('Data akan di update, lanjutkan ?');
                if (q){
                  document.getElementById('update-peliharaan').submit();
                }
                ">Simpan perubahan</button>
              <button class="close-edit btn btn-second zoom btn_right">Keluar tanpa menyimpan</button>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="row">
          {!! Form::open(['action' => ['PeliharaanController@update', $peliharaan->id], 'id'=>'update-peliharaan']) !!}
          {{Form::hidden('_method','PUT')}}
            <div class="col-md-6 col-sm-12 col-xs-12">
              <div class="form-group vert-label {{ $errors->has('namahewan') ? 'has-error' : '' }}">
                {{Form::label('namahewan','NAMA HEWAN')}}
                {{Form::text('namahewan', $peliharaan->nama, ['class'=>'form-control', 'placeholder'=>'ex. Snowy','required'=>'required'])}}

                @if ($errors->has('namahewan'))
                    <span class="help-block">{{ $errors->first('namahewan') }}</span>
                @endif
              </div>
              <div class="form-group vert-label {{ $errors->has('jenishewan') ? 'has-error' : '' }}">
                {{Form::label('jenishewan','JENIS HEWAN')}}
                {{Form::text('jenishewan', $peliharaan->jenis, ['class'=>'form-control', 'placeholder'=>'ex. Kucing','required'=>'required'])}}

                @if ($errors->has('jenishewan'))
                    <span class="help-block">{{ $errors->first('jenishewan') }}</span>
                @endif
              </div>
              <div class="form-group vert-label {{ $errors->has('genderhewan') ? 'has-error' : '' }}">
                {{Form::label('genderhewan','JENIS KELAMIN')}}
                {{Form::select('genderhewan', ['jantan'=>'Jantan', 'betina'=>'Betina'], $peliharaan->gender, ['class'=>'form-control','placeholder' => 'Pilih satu..', 'required'=>'required'])}}

                @if ($errors->has('genderhewan'))
                    <span class="help-block">{{ $errors->first('genderhewan') }}</span>
                @endif
              </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
              <div class="form-group vert-label {{ $errors->has('rashewan') ? 'has-error' : '' }}">
                {{Form::label('rashewan','RAS HEWAN')}}
                {{Form::text('rashewan', $peliharaan->ras, ['class'=>'form-control', 'placeholder'=>'ex. Pomerania'])}}

                @if ($errors->has('rashewan'))
                    <span class="help-block">{{ $errors->first('rashewan') }}</span>
                @endif
              </div>
              <div class="form-group vert-label {{ $errors->has('warnabulu') ? 'has-error' : '' }}">
                {{Form::label('warnabulu','WARNA BULU')}}
                {{Form::text('warnabulu', $peliharaan->warna, ['class'=>'form-control', 'placeholder'=>'ex. Putih'])}}

                @if ($errors->has('warnabulu'))
                    <span class="help-block">{{ $errors->first('warnabulu') }}</span>
                @endif
              </div>
            </div>
          {{ csrf_field() }}
          {!! Form::close() !!}
          </div>
          <div class="tile-end">
            <div class="nav navbar-left">DIBUAT {{$peliharaan->created_at}} &nbsp;|&nbsp; USER</div>
            <div class="nav navbar-right">UPDATE {{$peliharaan->updated_at}} &nbsp;|&nbsp; USER</div>
            <div class="clearfix"></div>
          </div>

      </div>
    </div>
  </div>

  <div class="clearfix"></div>

@endsection
