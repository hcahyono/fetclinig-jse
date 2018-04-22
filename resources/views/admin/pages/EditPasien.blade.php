@extends('admin.template.Default')

@section('title', 'Edit Pemilik Peliharaan')

@section('content')

	<div class="page-title">
    <div class="title_left">
      <h3>Edit data pemilik hewan <small></small></h3>
    </div>
    <div class="title_right">
      <div class="col-md-12 col-sm-12 col-xs-12 pull-right">
      	<div class="right_align">
	        <button class="btn btn-danger zoom btn_right pull-left"
              onclick="event.preventDefault();
              var q = confirm('Data akan dihapus!!, lanjutkan ?');
              if (q){
                document.getElementById('pasien-delete').submit();
              }
              "><i class="fa fa-exclamation-circle"></i> Hapus data</button>

          {!! Form::open(['route' => ['pasien.delete', $pasien->id], 'method' => 'DELETE','id'=>'pasien-delete', 'class'=>'form pull-left']) !!}

          {!! Form::close() !!}
      	</div>
      </div>
    </div>
  </div>

  <div class="clearfix"></div>

  <div id="formEditPemilik" class="row top_tiles card_wrap">
    <div class="animated flipInY col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="tile-stats card_def shadow_fly">

          <div class="tile-name">Edit pemilik <span class="vert-content">KODE {{ $pasien->kode }}</span>
            <div class="nav navbar-right">
              <button class="btn btn-success zoom btn_right"
                onclick="event.preventDefault();
                var q = confirm('Data akan di update, lanjutkan ?');
                if (q){
                  document.getElementById('update-pemilik').submit();
                }
                ">Simpan perubahan</button>
              <button class="close-edit btn btn-second zoom btn_right" type="reset">Keluar tanpa menyimpan</button>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="row">
          {!! Form::open(['action' => ['PasienController@update', $pasien->id],'id'=>'update-pemilik']) !!}
            {{Form::hidden('_method','PUT')}}
	        	<div class="col-md-6 col-sm-12 col-xs-12">
	        		<div class="form-group vert-label {{ $errors->has('nama') ? 'has-error' : '' }}">
                {{Form::label('nama','NAMA')}}
                {{Form::text('nama', $pasien->nama, ['class'=>'form-control', 'placeholder'=>'Nama pasien','required'=>'required'])}}

                @if ($errors->has('nama'))
                    <span class="help-block">{{ $errors->first('nama') }}</span>
                @endif
              </div>
	        		<div class="form-group vert-label {{ $errors->has('gender') ? 'has-error' : '' }}">
                {{Form::label('gender','GENDER')}}
                {{Form::select('gender', ['laki-laki'=>'Laki-Laki', 'perempuan'=>'Perempuan'], $pasien->gender, ['class'=>'form-control','placeholder' => 'Pilih satu..', 'required'=>'required'])}}

                @if ($errors->has('gender'))
                    <span class="help-block">{{ $errors->first('gender') }}</span>
                @endif
              </div>
              <div class="form-group vert-label {{ $errors->has('tempatlahir') ? 'has-error' : '' }}">
                {{Form::label('tempatlahir','TEMPAT KELAHIRAN')}}
                {{Form::text('tempatlahir', $pasien->tempat_lahir, ['class'=>'form-control','placeholder'=>'Enter tempat'])}}

                @if ($errors->has('tempatlahir'))
                    <span class="help-block">{{ $errors->first('tempatlahir') }}</span>
                @endif
              </div>
              <div class="form-group vert-label {{ $errors->has('tanggallahir') ? 'has-error' : '' }}">
                {{Form::label('tanggallahir','TANGGAL LAHIR')}}
                <div class='input-group date' id='bDatePicker'>
                  {{Form::text('tanggallahir', \Carbon\Carbon::parse($pasien->tanggal_lahir)->format('d-m-Y'), ['class'=>'form-control','placeholder'=>'Enter tanggal lahir', 'required'=>'required'])}}
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                  </span>
                </div>

                @if ($errors->has('tanggallahir'))
                    <span class="help-block">{{ $errors->first('tanggallahir') }}</span>
                @endif
              </div>
	        	</div>
	        	<div class="col-md-6 col-sm-12 col-xs-12">
              <div class="form-group vert-label {{ $errors->has('handphone') ? 'has-error' : '' }}">
                {{Form::label('handphone','HANDPHONE')}}
                {{Form::tel('handphone', $pasien->handphone, ['class'=>'form-control','placeholder'=>'Enter handphone', 'required'=>'required'])}}

                @if ($errors->has('handphone'))
                    <span class="help-block">{{ $errors->first('handphone') }}</span>
                @endif
              </div>
              <div class="form-group vert-label {{ $errors->has('telepon') ? 'has-error' : '' }}">
                {{Form::label('telepon','TELEPON')}}
                {{Form::tel('telepon', $pasien->telepon, ['class'=>'form-control','placeholder'=>'Enter telepon'])}}

                @if ($errors->has('telepon'))
                    <span class="help-block">{{ $errors->first('telepon') }}</span>
                @endif
              </div>
	        		<div class="form-group vert-label {{ $errors->has('alamat') ? 'has-error' : '' }}">
                {{Form::label('alamat','ALAMAT')}}
                {{Form::textarea('alamat', $pasien->alamat, ['class'=>'form-control','placeholder'=>'Enter alamat..','required'=>'required','data-validate-length-range'=>6,'data-validate-word'=>4,'rows'=>3])}}

                @if ($errors->has('alamat'))
                    <span class="help-block">{{ $errors->first('alamat') }}</span>
                @endif
              </div>
            </div>
            {{ csrf_field() }}
          {!! Form::close() !!}
          </div>
          <div class="tile-end">
            <div class="nav navbar-left">DIBUAT {{ $pasien->created_at }} &nbsp;|&nbsp; {{ $pasien->created_by }}</div>
            <div class="nav navbar-right">UPDATE {{ $pasien->updated_at }} &nbsp;|&nbsp; {{ $pasien->updated_by }}</div>
            <div class="clearfix"></div>
          </div>

      </div>
    </div>
  </div>

  <div class="clearfix"></div>

@endsection
