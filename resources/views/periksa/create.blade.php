@extends('admin.template.Default')

@section('title', 'Pemeriksaan Pasien')

@section('content')

	<div class="page-title">
    <div class="title_left">
      <h3>Form pemeriksaan pasien<small></small></h3>
    </div>
  </div>

  <div class="clearfix"></div>

  <div class="row top_tiles card_wrap">
    <div class="animated flipInY col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="tile-stats card_def shadow_fly">
      	{!! Form::open(['route' => ['periksa.store'], 'class'=>'form-horizontal form-label-left', 'novalidate']) !!}
	        <div class="tile-name">
		        <div class="nav navbar-right">
		        	<span class="text-capitalize">Tanggal &nbsp; {{ $now }}</span>
		        </div>
	        	<div class="clearfix"></div>
	        </div>
	        <div class="row">
	        	<div class="col-md-12 col-sm-12 col-xs-12">
	        		<div class="x_panel">
                <div class="x_content">
                  @if (session('error'))
                    <div class="alert alert-danger">
                      <b>{{ session('error') }}</b>
                    </div>
                  @endif
                  <div class="item form-group {{ $errors->has('peliharaan') ? 'has-error' : '' }}">
                    {{Form::label('select_peliharaan','Pilih Hewan Peliharaan *', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      {{-- {{Form::text('nama', '', ['class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'ex. Joni','required'=>'required', 'data-validate-length-range'=>6, 'data-validate-words'=>1])}} --}}
                      <select name="peliharaan" id="select_peliharaan" class="form-control" data-url="{{ route('api.peliharaan.index') }}">  
                        <option value=""></option>
                      </select>

                      @if ($errors->has('peliharaan'))
                          <span class="help-block">{{ $errors->first('peliharaan') }}</span>
                      @endif
                    </div>
                  </div>
                  
                  <div class="item form-group {{ $errors->has('anamnesa') ? 'has-error' : '' }}">
                    {{Form::label('anamnesa','Keluhan / Anamnesa *', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      {{Form::textarea('anamnesa', '', ['class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Tulis keluhan ..','required'=>'required','data-validate-length-range'=>6,'data-validate-word'=>2,'rows'=>6])}}

                      @if ($errors->has('anamnesa'))
                          <span class="help-block">{{ $errors->first('anamnesa') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
	        	</div>
	        </div>
	        <div class="tile-end">
	        	<div class="nav navbar-right">
	        	{{-- DIBUAT &nbsp;|&nbsp; {{ $now }} --}}
		        	<button  type="button" class="batal btn btn-second zoom btn_right">Keluar</button>
		        	<button type="reset" class="btn btn-warning zoom btn_right">Reset</button>
	        		{{Form::submit('Simpan data', ['class' => 'btn btn-success zoom btn_right'])}}
	        	</div>
	      		<div class="clearfix"></div>
	        </div>

					{{ csrf_field() }}
        {!! Form::close() !!}
      </div>
    </div>
  </div>

  <div class="clearfix"></div>



@endsection

@section('script')
<script src="{{ asset('/js/_select2.min.js') }}"></script>
@endsection
