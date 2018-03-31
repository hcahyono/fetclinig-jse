@extends('admin.template.Default')

@section('title', 'Akun')

@section('content')

	<div class="page-title">
    <div class="title_left">
      <h3>Akun <small></small></h3>
    </div>

  </div>

  <div class="clearfix"></div>

	<div id="dataPemilik" class="row top_tiles card_wrap">
    <div class="animated flipInY col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="tile-stats card_def shadow_fly">
        <div class="tile-name">Informasi akun
	        <div class="nav navbar-right">
	        	<a href="{{route('edit.akun')}}" id="editAkun" class="btn btn-second zoom btn_right" type="button">Edit akun</a>
	        </div>
        	<div class="clearfix"></div>
        </div>
        <div class="row">
        	<div class="col-md-6 col-sm-12 col-xs-12">
        		<div class="vert-label">NAMA</div>
        		<div class="vert-content">{{ $akun->name }}</div>
        		<div class="vert-label">GENDER</div>
        		<div class="vert-content">{{ $akun->gender }}</div>
        	</div>
        	<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="vert-label">EMAIL</div>
						<div class="vert-content">{{ $akun->email }}</div>
        		<div class="vert-label">HANDPHONE</div>
        		<div class="vert-content">{{ $akun->phone }}</div>
        	</div>
        </div>
        <div class="tile-end">
        	<div class="nav navbar-left">DIBUAT {{ $akun->created_at }} </div>
        	<div class="nav navbar-right">UPDATE {{ $akun->updated_at }} </div>
      		<div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="clearfix"></div>

 	<div id="formEditPemilik" class="row top_tiles card_wrap">
	 	{!! Form::open(['route' => ['ubah.password'], 'class'=>'form-horizontal']) !!}
	  {{Form::hidden('_method','PUT')}} 
    <div class="animated flipInY col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="tile-stats card_def shadow_fly">

	        <div class="tile-name">Ubah password
		        <div class="nav navbar-right">
		        	{{Form::submit('Update password', ['class' => 'btn btn-success zoom btn_right'])}}
		        	
		        </div>
	        	<div class="clearfix"></div>
	        </div>
	        <div class="row">
	        	<div class="col-md-4 col-sm-12 col-xs-12">
	        		<div class="form-group vert-label {{ $errors->has('password') ? 'has-error' : '' }}">
                {{Form::label('password','PASSWORD LAMA')}}
                {{Form::password('password', ['class'=>'form-control', 'placeholder'=>'Password lama anda', 'required'])}}

                @if ($errors->has('password'))
                    <span class="help-block">{{ $errors->first('password') }}</span>
                @endif
              </div>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
	        		<div class="form-group vert-label {{ $errors->has('passwordbaru') ? 'has-error' : '' }}">
                {{Form::label('passwordbaru','PASSWORD BARU')}}
                {{Form::password('passwordbaru', ['class'=>'form-control','placeholder'=>'Password baru', 'required'])}}

                @if ($errors->has('passwordbaru'))
                    <span class="help-block">{{ $errors->first('passwordbaru') }}</span>
                @endif
              </div>
	        	</div>
	        	<div class="col-md-4 col-sm-12 col-xs-12">
	        		<div class="form-group vert-label">
                {{Form::label('passwordbaru_confirmation','KONFIRMASI PASSWORD')}}
                {{Form::password('passwordbaru_confirmation', ['class'=>'form-control','placeholder'=>'Konfirmasi password baru', 'required'])}}
              </div>
	        	</div>
	        </div>
	        <div class="tile-end">
	        	@include('components.alert')
	        </div>
          {{ csrf_field() }}
      </div>
    </div>
    {!! Form::close() !!}
  </div>

@endsection
