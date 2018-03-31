@extends('admin.template.Default')

@section('title', 'Tambah Peliharaan')

@section('content')

	<div class="page-title">
    <div class="title_left">
      <h3>Tambah peliharaan<small></small></h3>
    </div>
  </div>

  <div class="clearfix"></div>

  <div class="row top_tiles card_wrap">
    <div class="animated flipInY col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="tile-stats card_def shadow_fly">
      	{!! Form::open(['action' => 'PasienController@store', 'class'=>'form-horizontal form-label-left', 'novalidate']) !!}
	        <div class="tile-name">20180221
		        <div class="nav navbar-right">
		        	{{Form::submit('Simpan data', ['class' => 'btn btn-success zoom btn_right'])}}
		        	<button type="reset" class="btn btn-warning zoom btn_right">Reset</button>
		        	<button  type="button" class="batal btn btn-danger zoom btn_right">Batal</button>
		        </div>
	        	<div class="clearfix"></div>
	        </div>
	        <div class="row">
	        	<div class="col-md-12 col-sm-12 col-xs-12">
	        		<div class="x_panel">
			       		<div class="x_content">
			            <span class="section">Data hewan peliharaan</span>
			            <div class="item form-group">
			              {{Form::label('namahewan','Nama Peliharaan *', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
			              <div class="col-md-6 col-sm-6 col-xs-12">
			            		{{Form::text('namahewan', '', ['class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'ex. Kucing Yani', 'required'=>'required', 'data-validate-length-range'=>6, 'data-validate-words'=>1])}}
			            	</div>
			            </div>
			            <div class="item form-group">
			              {{Form::label('jenishewan','Jenis Hewan *', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
			              <div class="col-md-6 col-sm-6 col-xs-12">
			            		{{Form::text('jenishewan', '', ['class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'ex. Kucing', 'required'=>'required', 'data-validate-length-range'=>6, 'data-validate-words'=>1])}}
			            	</div>
			            </div>
			            <div class="item form-group">
			              {{Form::label('genderhewan','Jenis Kelamin *', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
			              <div class="col-md-6 col-sm-6 col-xs-12">
			            		{{Form::select('genderhewan', [1 => 'Laki-Laki', 2 => 'Perempuan'], null, ['class'=>'form-control', 'required'=>'required', 'placeholder'=>'Pilih satu..'])}}
			            	</div>
			            </div>
			            <div class="item form-group">
			              {{Form::label('rashewan','Ras Hewan *', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
			              <div class="col-md-6 col-sm-6 col-xs-12">
			            		{{Form::text('rashewan', '', ['class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'ex. Pomerania', 'data-validate-length-range'=>6, 'data-validate-words'=>1])}}
			            	</div>
			            </div>
			            <div class="item form-group">
			              {{Form::label('warnabulu','Warna Bulu *', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
			              <div class="col-md-6 col-sm-6 col-xs-12">
			            		{{Form::text('warnabulu', '', ['class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'ex. Putih', 'data-validate-length-range'=>6, 'data-validate-words'=>1])}}
			            	</div>
			            </div>
			        	</div>
				      </div>
	        	</div>
	        </div>
	        <div class="tile-end">
	        	<div class="nav navbar-left">DIBUAT &nbsp;|&nbsp; </div>
	      		<div class="clearfix"></div>
	        </div>

					{{ csrf_field() }}
        {!! Form::close() !!}
      </div>
    </div>
  </div>

  <div class="clearfix"></div>

@endsection