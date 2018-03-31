@extends('admin.template.Default')

@section('title', 'Registrasi Pasien')

@section('content')

	<div class="page-title">
    <div class="title_left">
      <h3>Registrasi pasien baru<small></small></h3>
    </div>
  </div>

  <div class="clearfix"></div>

  <div class="row top_tiles card_wrap">
    <div class="animated flipInY col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="tile-stats card_def shadow_fly">
      	{!! Form::open(['route' => ['pasien.store'], 'class'=>'form-horizontal form-label-left', 'novalidate']) !!}
	        <div class="tile-name">
		        <div class="nav navbar-right">
		        	{{Form::submit('Simpan data', ['class' => 'btn btn-success zoom btn_right'])}}
		        	<button type="reset" class="btn btn-warning zoom btn_right">Reset</button>
		        	<button  type="button" class="batal btn btn-second zoom btn_right">Keluar</button>
		        </div>
	        	<div class="clearfix"></div>
	        </div>
	        <div class="row">
	        	<div class="col-md-12 col-sm-12 col-xs-12">
	        		<div class="x_panel">
			       		<div class="x_content">
			            <span class="section">Data pemilik hewan</span>
			            <div class="item form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
			              {{Form::label('nama','Nama Lengkap *', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
			              <div class="col-md-6 col-sm-6 col-xs-12">
			            		{{Form::text('nama', '', ['class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'ex. Joni','required'=>'required', 'data-validate-length-range'=>6, 'data-validate-words'=>1])}}

			            		@if ($errors->has('nama'))
													<span class="help-block">{{ $errors->first('nama') }}</span>
			            		@endif
			            	</div>
			            </div>
			            <div class="item form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
			            	{{Form::label('gender','Gender *', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
			              <div class="col-md-6 col-sm-6 col-xs-12">
			            		{{Form::select('gender', ['laki-laki' => 'Laki-Laki', 'perempuan' => 'Perempuan'], null, ['class'=>'form-control', 'placeholder'=>'Pilih satu..'])}}

			            		@if ($errors->has('gender'))
													<span class="help-block">{{ $errors->first('gender') }}</span>
			            		@endif
			            	</div>
			            </div>
			            <div class="item form-group {{ $errors->has('telepon') ? 'has-error' : '' }}">
			              {{Form::label('telepon','Telepon', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
			              <div class="col-md-6 col-sm-6 col-xs-12">
			                {{Form::tel('telepon', '', ['class'=>'form-control col-md-7 col-xs-12','placeholder'=>'ex. 7675xxx', 'data-validate-length-range'=>8.20])}}

			                @if ($errors->has('telepon'))
													<span class="help-block">{{ $errors->first('telepon') }}</span>
			            		@endif
			              </div>
			            </div>
			            <div class="item form-group {{ $errors->has('handphone') ? 'has-error' : '' }}">
			              {{Form::label('handphone','Handphone *', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
			              <div class="col-md-6 col-sm-6 col-xs-12">
			                {{Form::tel('handphone', '', ['class'=>'form-control col-md-7 col-xs-12','placeholder'=>'ex. 0821xxxxxx', 'data-validate-length-range'=>8.20, 'required'=>'required'])}}

			                @if ($errors->has('handphone'))
													<span class="help-block">{{ $errors->first('handphone') }}</span>
			            		@endif
			              </div>
			            </div>
			            <div class="item form-group {{ $errors->has('alamat') ? 'has-error' : '' }}">
			              {{Form::label('alamat','Alamat Lengkap *', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
			              <div class="col-md-6 col-sm-6 col-xs-12">
			                {{Form::textarea('alamat', '', ['class'=>'form-control col-md-7 col-xs-12','placeholder'=>'ex. Jln. mt. haryono no. 30, rt. 17 rw. 8, kelurahan wahid hasyim, kecamatan prambanan, kabupaten sleman, provinsi yogyakarta, pos 55281','required'=>'required','data-validate-length-range'=>6,'data-validate-word'=>2,'rows'=>3])}}

			                @if ($errors->has('alamat'))
													<span class="help-block">{{ $errors->first('alamat') }}</span>
			            		@endif
			              </div>
			            </div>

			            <span class="section">Data hewan peliharaan</span>
			            <div class="item form-group {{ $errors->has('namahewan') ? 'has-error' : '' }}">
			              {{Form::label('namahewan','Nama Peliharaan *', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
			              <div class="col-md-6 col-sm-6 col-xs-12">
			            		{{Form::text('namahewan', '', ['class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'ex. Snowy', 'data-validate-length-range'=>6, 'data-validate-words'=>1, 'required'=>'required'])}}

			            		@if ($errors->has('namahewan'))
													<span class="help-block">{{ $errors->first('namahewan') }}</span>
			            		@endif
			            	</div>
			            </div>
			            <div class="item form-group {{ $errors->has('jenishewan') ? 'has-error' : '' }}">
			              {{Form::label('jenishewan','Jenis Hewan *', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
			              <div class="col-md-6 col-sm-6 col-xs-12">
			            		{{Form::text('jenishewan', '', ['class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'ex. Kucing', 'data-validate-length-range'=>6, 'data-validate-words'=>1, 'required'=>'required'])}}

			            		@if ($errors->has('jenishewan'))
													<span class="help-block">{{ $errors->first('jenishewan') }}</span>
			            		@endif
			            	</div>
			            </div>
			            <div class="item form-group {{ $errors->has('genderhewan') ? 'has-error' : '' }}">
			              {{Form::label('genderhewan','Jenis Kelamin *', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
			              <div class="col-md-6 col-sm-6 col-xs-12">
			            		{{Form::select('genderhewan', ['jantan'=>'Jantan', 'betina'=>'Betina'], null, ['class'=>'form-control', 'placeholder'=>'Pilih satu..', 'required'=>'required'])}}

			            		@if ($errors->has('genderhewan'))
													<span class="help-block">{{ $errors->first('genderhewan') }}</span>
			            		@endif
			            	</div>
			            </div>
			            <div class="item form-group {{ $errors->has('rashewan') ? 'has-error' : '' }}">
			              {{Form::label('rashewan','Ras Hewan', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
			              <div class="col-md-6 col-sm-6 col-xs-12">
			            		{{Form::text('rashewan', '', ['class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'ex. Pomerania', 'data-validate-length-range'=>6, 'data-validate-words'=>1])}}

			            		@if ($errors->has('rashewan'))
													<span class="help-block">{{ $errors->first('rashewan') }}</span>
			            		@endif
			            	</div>
			            </div>
			            <div class="item form-group {{ $errors->has('warnabulu') ? 'has-error' : '' }}">
			              {{Form::label('warnabulu','Warna Bulu', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
			              <div class="col-md-6 col-sm-6 col-xs-12">
			            		{{Form::text('warnabulu', '', ['class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'ex. Putih', 'data-validate-length-range'=>6, 'data-validate-words'=>1])}}

			            		@if ($errors->has('warnabulu'))
													<span class="help-block">{{ $errors->first('warnabulu') }}</span>
			            		@endif
			            	</div>
			            </div>
			        	</div>
				      </div>
	        	</div>
	        </div>
	        <div class="tile-end">
	        	<div class="nav navbar-left">DIBUAT &nbsp;|&nbsp; {{ $now }}</div>
	      		<div class="clearfix"></div>
	        </div>

					{{ csrf_field() }}
        {!! Form::close() !!}
      </div>
    </div>
  </div>

  <div class="clearfix"></div>



@endsection
