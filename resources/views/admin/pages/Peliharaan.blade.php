@extends('admin.template.Default')

@section('title', 'Hewan Peliharaan')

@section('content')

	<div class="page-title">
    <div class="title_left">
      <h3>Peliharaan <small></small></h3>
    </div>

    <div class="title_right">
      <div class="col-md-12 col-sm-12 col-xs-12 pull-right">
      	<div class="right_align">
      		<button type="button" class="back-to-pasien btn btn-default zoom btn_right"><i class="fa fa-angle-double-left"></i> sebelumnya</button>
	        <button type="button" class="btn btn-info zoom btn_right" data-toggle="modal" data-target=".tambahpeliharaan">Tambah peliharaan</button>
      	</div>
      </div>
    </div>
  </div>

  <div class="clearfix"></div>

	<div id="dataPemilik" class="row top_tiles card_wrap">
    <div class="animated flipInY col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="tile-stats card_def shadow_fly">
        <div class="tile-name">Pemilik hewan peliharaan
	        <div class="nav navbar-right">
	        	<a href="{{route('pasien.edit', [$pasien->id])}}" id="editPemilik" class="btn btn-second zoom btn_right" type="button">Edit pemilik</a>
	        </div>
        	<div class="clearfix"></div>
        </div>
        <div class="row">
        	<div class="col-md-6 col-sm-12 col-xs-12">
        		<div class="vert-label">NAMA PEMILIK</div>
        		<div class="vert-content">{{ $pasien->nama }}</div>
						<div class="vert-label">TELEPON</div>
						<div class="vert-content">{{ $pasien->telepon }}</div>
        		<div class="vert-label">GENDER</div>
        		<div class="vert-content">{{ $pasien->gender }}</div>
        	</div>
        	<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="vert-label">KODE</div>
						<div class="vert-content">{{ $pasien->kode }}</div>
        		<div class="vert-label">HANDPHONE</div>
        		<div class="vert-content">{{ $pasien->handphone }}</div>
        		<div class="vert-label">ALAMAT</div>
        		<div class="vert-content">{{ $pasien->alamat }}</div>
        	</div>
        </div>
        <div class="tile-end">
        	<div class="nav navbar-left">DIBUAT {{ $pasien->created_at }} &nbsp;|&nbsp; OLEH {{ $pasien->created_by }}</div>
        	<div class="nav navbar-right">UPDATE {{ $pasien->updated_at }} &nbsp;|&nbsp; OLEH {{ $pasien->updated_by }}</div>
      		<div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="clearfix"></div>

	<div class="row">
	  <div id="dataPeliharaan" class="dataPeliharaan col-md-12 col-sm-12 col-xs-12 card_wrap">
      <div class="x_panel card_def shadow_fly round-all">
        <div class="x_title">
          <h2>Peliharaan</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">

          <!-- start accordion -->
          <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">

            @foreach($pasien->peliharaan as $peliharaan)

            <div class="panel">
              <a class="panel-heading" role="tab" id="headingOne1" data-toggle="collapse" data-parent="#accordion" href="#{{ $peliharaan->id }}" aria-expanded="true" aria-controls="{{ $peliharaan->id }}">
              	<div class="row">
              		<div class="col-md-12">
	                	<div class="nav navbar-left">
                			<div class="panel-title"><small>Nama hewan :</small> <strong>{{ $peliharaan->nama }}</strong> - <small>Kode :</small> {{ $peliharaan->kode }}</div>
						        </div>
						        <div class="clearfix"></div>
              		</div>
              	</div>
              </a>
              <div id="{{ $peliharaan->id }}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                	<div class="row">
	              		<div class="col-md-12">
	                		<div class="panel-title">Informasi peliharaan
		                		<div class="nav navbar-right">
		                			<a href="/medis/{{ $pasien->id }}/{{ $peliharaan->id }}" class="lihatRekamMedis btn btn-info zoom btn_right" type="button">Lihat rekam medis</a>
								        	<a href="{{route('peliharaan.edit', [$pasien->id, $peliharaan->id])}}" id="{{$peliharaan->id}}" class="btn btn-second zoom btn_right" type="button">Edit peliharaan</a>
								        </div>
							        </div>
							        <div class="clearfix"></div><br>
	              		</div>
	              	</div>
	              	<div class="row">
										<div class="col-md-6 col-sm-6">
						        	<div class="row">
						        		<div class="col-md-6 col-sm-12">
						        			<div class="row">
								        		<div class="col-md-12 col-sm-12">
									        		<div class="vert-label">JENIS HEWAN</div>
									        	</div>
									        	<div class="col-md-12 col-sm-12">
									        		<div class="vert-content">{{ $peliharaan->jenis }}</div>
									        	</div>
						        			</div>
						        		</div>
												<div class="col-md-6 col-sm-12">
						        			<div class="row">
									        	<div class="col-md-12 col-sm-12">
									        		<div class="vert-label">JENIS KELAMIN</div>
									        	</div>
									        	<div class="col-md-12 col-sm-12">
									        		<div class="vert-content">{{ $peliharaan->gender }}</div>
									        	</div>
								        	</div>
						        		</div>
							        </div>
										</div>
										<div class="col-md-6 col-sm-6">
						        	<div class="row">
						        		<div class="col-md-6 col-sm-12">
						        			<div class="row">
								        		<div class="col-md-12 col-sm-12">
									        		<div class="vert-label">RAS HEWAN</div>
									        	</div>
									        	<div class="col-md-12 col-sm-12">
									        		<div class="vert-content">{{ $peliharaan->ras }}</div>
									        	</div>
						        			</div>
						        		</div>
												<div class="col-md-6 col-sm-12">
						        			<div class="row">
									        	<div class="col-md-12 col-sm-12">
									        		<div class="vert-label">WARNA BULU</div>
									        	</div>
									        	<div class="col-md-12 col-sm-12">
									        		<div class="vert-content">{{ $peliharaan->warna }}</div>
									        	</div>
								        	</div>
						        		</div>
							        </div>
										</div>
					        </div>
					        <div class="row">
						        <div class="col-md-12">
						        	<div class="foot-info">
							        	<div class="nav navbar-left">DIBUAT {{ $peliharaan->created_at }} &nbsp;|&nbsp; OLEH {{ $peliharaan->created_by }}</div>
							        	<div class="nav navbar-right">UPDATE {{ $peliharaan->updated_at }} &nbsp;|&nbsp; OLEH {{ $peliharaan->updated_by }}</div>
							      		<div class="clearfix"></div>
							        </div>
					        	</div>
					        </div>
                </div>
              </div>
            </div>

            @endforeach
          </div>
          <!-- end of accordion -->

        </div>
      </div>
    </div>

	</div> <!-- end row -->

	<div class="clearfix"></div>

	<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    	<div class="modal fade tambahpeliharaan" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            {!! Form::open(['action' => ['PeliharaanController@store', $pasien->id], 'class'=>'form-horizontal form-label-left', 'novalidate']) !!}
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h5 class="modal-title" id="myModalLabel">{{$now}} TAMBAH PELIHARAAN BARU</h5>
              </div>
              <div class="modal-body">
                <div class="x_panel">
                  <div class="x_content">

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
				            		{{Form::text('jenishewan', '', ['class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'ex. Kucing', 'data-validate-length-range'=>6, 'data-validate-words'=>1])}}

				            		@if ($errors->has('jenishewan'))
				                    <span class="help-block">{{ $errors->first('jenishewan') }}</span>
				                @endif
				            	</div>
				            </div>
				            <div class="item form-group {{ $errors->has('genderhewan') ? 'has-error' : '' }}">
				              {{Form::label('genderhewan','Jenis Kelamin *', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
				              <div class="col-md-6 col-sm-6 col-xs-12">
				            		{{Form::select('genderhewan', ['jantan' => 'Jantan', 'betina' => 'Betina'], null, ['class'=>'form-control', 'placeholder'=>'Pilih satu..', 'required'=>'required'])}}

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
              <div class="modal-footer">
                <button type="button" class="btn btn-second zoom" data-dismiss="modal">Keluar</button>
                <button type="reset" class="btn btn-warning zoom">Reset</button>
                {{Form::submit('Simpan data', ['class' => 'btn btn-success zoom btn_right'])}}
              </div>

            	{{ csrf_field() }}
        		{!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
