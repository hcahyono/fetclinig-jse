@extends('admin.template.Default')

@section('title', 'Update Akun')

@section('content')

	<div class="page-title">
    <div class="title_left">
      <h3>Edit akun <small></small></h3>
    </div>
    {!! Form::open(['route' => ['update.akun'], 'class'=>'form-horizontal']) !!}
    {{Form::hidden('_method','PUT')}}
  </div>

  <div class="clearfix"></div>

 	<div id="formEditAkun" class="row top_tiles card_wrap"> 
    <div class="animated flipInY col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="tile-stats card_def shadow_fly">

	        <div class="tile-name">Update informasi
		        <div class="nav navbar-right">
		        	{{Form::submit('Simpan perubahan', ['class' => 'btn btn-success zoom btn_right'])}}
		        	<button class="close-edit btn btn-second zoom btn_right" type="reset">Keluar tanpa menyimpan</button>
		        </div>
	        	<div class="clearfix"></div>
	        </div>
	        <div class="row">
	        	<div class="col-md-12 col-sm-12 col-xs-12 ">
              <div class="x_panel">
                <div class="x_content">
                  <div class="row">
                    <div class="col-md-8 col-md-push-2 col-xs-12 col-xs-push-0">
                      @include('components.alert')
                      <h4>Nama</h4>
                      <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                          {{Form::text('name', $akun->name, ['id'=>'inputSuccess1', 'class'=>'form-control', 'placeholder'=>'ex. Amir'])}}
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>

                          @if ($errors->has('name'))
                              <span class="help-block">{{ $errors->first('name') }}</span>
                          @endif
                        </div>
                      </div>
                      <div class="clearfix"></div>
                      <h4>Nomor handphone</h4>
                      <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                          {{Form::tel('phone', $akun->phone, ['id'=>'inputSuccess2', 'class'=>'form-control', 'placeholder'=>'ex. 0821xxxxxx'])}}
                          <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>

                          @if ($errors->has('phone'))
                              <span class="help-block">{{ $errors->first('phone') }}</span>
                          @endif
                        </div>
                      </div>
                      <div class="clearfix"></div>
                      <h4>Gender</h4>
                      <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
                          {{Form::select('gender', ['laki-laki' => 'Laki-Laki', 'perempuan' => 'Perempuan'], $akun->gender, ['id'=>'inputSuccess3','class'=>'form-control', 'placeholder'=>'Pilih satu..'])}}
                          <span class="fa fa-male form-control-feedback right" aria-hidden="true"></span>

                          @if ($errors->has('gender'))
                              <span class="help-block">{{ $errors->first('gender') }}</span>
                          @endif
                        </div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                </div>
              </div>
	        	</div>
	        </div>
	        <div class="tile-end">
          	<div class="nav navbar-left">DIBUAT {{$akun->created_at}}</div>
        		<div class="nav navbar-right">UPDATE {{$akun->updated_at}}</div>
	      		<div class="clearfix"></div>
	        </div>
          {{ csrf_field() }}
        
      </div>
    </div>
    {!! Form::close() !!}
  </div>

  <div class="clearfix"></div>

@endsection