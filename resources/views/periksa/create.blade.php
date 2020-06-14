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
      	{!! Form::open(['route' => ['periksa.store'], 'method' => 'post', 'class'=>'form-horizontal form-label-left', 'novalidate']) !!}
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
                    <div class="alert alert-danger alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <b>{{ session('error') }}</b>
                    </div>
                  @endif
                  @if (session('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <b>{{ session('success') }}</b>
                    </div>
                  @endif
                  <div class="item form-group {{ $errors->has('peliharaan') ? 'has-error' : '' }}">
                    {{Form::label('select_peliharaan','Pilih Hewan Peliharaan *', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                    <div class="col-md-6 col-sm-6 col-xs-12">
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
		        	<button type="button" class="batal btn btn-second zoom btn_right can-action">Keluar</button>
              <button type="reset" class="btn btn-warning zoom btn_right can-action">Reset</button>
              <button type="button" value="1" class="btn btn-info zoom btn_right save_as can-action">Simpan draft</button>
              <button type="button" value="2" class="btn btn-success zoom btn_right save_as can-action">Simpan & kirimkan</button>
	        	</div>
	      		<div class="clearfix"></div>
	        </div>
          <input type="hidden" name="saveAs" id="save_as" value="">

        {!! Form::close() !!}
      </div>
    </div>
  </div>

  <div class="clearfix"></div>



@endsection

@section('script')
<script src="{{ asset('/js/_select2.min.js') }}"></script>
<script>
$(function() {
  $('.save_as').click(function(el) {
    var e = $(el.target).get(0) // get this first element
    var form = e.closest('form')

    $('input#save_as').val(e.getAttribute('value')) // asign el value to #save_as
    onAction(true)
    form.submit()
  })
})
</script>
@endsection
