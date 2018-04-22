@extends('admin.template.Default')

@section('title', 'Data Rekam Medis')

@section('content')

	<div class="page-title">
    <div class="title_left">
      <h3>Rekam medis <small></small></h3>
    </div>

    <div class="title_right">
      <div class="col-md-12 col-sm-12 col-xs-12 pull-right">
      	<div class="right_align">
      		<button type="button" class="back btn btn-default zoom btn_right"><i class="fa fa-angle-double-left"></i> sebelumnya</button>
	        <button type="button" class="btn btn-info zoom btn_right" data-toggle="modal" data-target=".tambahMedis">Tambah rekam medis</button>
	        <a href="/pdf-all/{{$pasien->id}}/{{$peliharaan->id}}" target="_blank" class="btn btn-info zoom btn_right" type="button">Download PDF</a>
      	</div>
      </div>
    </div>
  </div>

  <div class="clearfix"></div>

	<div id="dataPemilik" class="row top_tiles card_wrap">
    <div class="animated flipInY col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="tile-stats card_def shadow_fly">
      	<div class="row">
      		<div class="col-md-7">
      			<div class="tile-name">Informasi pemilik
      			</div>
		        <div class="row">
		        	<div class="col-md-6 col-sm-12 col-xs-12">
		        		<div class="vert-label">NAMA PEMILIK</div>
		        		<div class="vert-content">{{ $pasien->nama }}</div>
								<div class="vert-label">KODE</div>
								<div class="vert-content">{{ $pasien->kode }}</div>
                <div class="vert-label">GENDER</div>
                <div class="vert-content">{{ $pasien->gender }}</div>
                <div class="vert-label">TEMPAT &amp; TANGGAL LAHIR</div>
                <div class="vert-content">{{ $pasien->tempat_lahir .', '. \Carbon\Carbon::parse($pasien->tanggal_lahir)->format('d-m-Y') }}</div>
              </div>
              <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="vert-label">HANDPHONE</div>
                <div class="vert-content">{{ $pasien->handphone }}</div>
                <div class="vert-label">TELEPON</div>
                <div class="vert-content">{{ $pasien->telepon }}</div>
		        		<div class="vert-label">ALAMAT</div>
		        		<div class="vert-content col-md-12">{{ $pasien->alamat }}</div>
		        	</div>
		        </div>
      		</div>
      		<div class="col-md-5">
      			<div class="tile-name">Informasi peliharaan
      			</div>
      			<div class="row">
		        	<div class="col-md-6 col-sm-12 col-xs-12">
		        		<div class="vert-label">NAMA HEWAN</div>
		        		<div class="vert-content">{{ $peliharaan->nama }}</div>
                <div class="vert-label">KODE HEWAN</div>
                <div class="vert-content">{{ $peliharaan->kode }}</div>
                <div class="vert-label">JENIS HEWAN</div>
                <div class="vert-content">{{ $peliharaan->jenis }}</div>
              </div>
              <div class="col-md-6 col-sm-12 col-xs-12">
		        		<div class="vert-label">JENIS KELAMIN</div>
		        		<div class="vert-content">{{ $peliharaan->gender }}</div>
                <div class="vert-label">RAS HEWAN</div>
                <div class="vert-content">{{ $peliharaan->ras }}</div>
								<div class="vert-label">WARNA BULU</div>
								<div class="vert-content">{{ $peliharaan->warna }}</div>
		        	</div>
		        </div>
      		</div>
      		<div class="col-md-12">
      			<div class="row">
      				<div class="col-md-7">
				        <div class="tile-end">
				        	<div class="nav navbar-left">DIBUAT {{ $pasien->created_at }}</div>
				        	<div class="nav navbar-right">UPDATE {{ $pasien->updated_at }}</div>
				      		<div class="clearfix"></div>
				        </div>

      				</div>
      				<div class="col-md-5">
				        <div class="tile-end">
				        	<div class="nav navbar-left">DIBUAT {{ $peliharaan->created_at }}</div>
				        	<div class="nav navbar-right">UPDATE {{ $peliharaan->updated_at }}</div>
				      		<div class="clearfix"></div>
				        </div>

      				</div>
      			</div>
      		</div>
      	</div>
      </div>
    </div>
  </div>

  <div class="clearfix"></div>

	<div class="row">
	  <div id="dataPeliharaan" class="dataPeliharaan col-md-12 col-sm-12 col-xs-12 card_wrap">
      <div class="x_panel card_def shadow_fly round-all">
        <div class="x_title">
          <h2>Rekam medis</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">

          <div class="table-responsive">
            <table id="datatable" class="table table-striped jambo_table" style="width: 100%">
              <thead>
                <tr class="headings">
                  <th class="column-title">No</th>
                  <th class="column-title">Tanggal perekaman</th>
                  <th class="column-title">Diperbaharui</th>
                  <th class="column-title">Anamnesa</th>
                  <th class="column-title">Diagnosa</th>
                  <th class="column-title no-link last"><span class="nobr">Action</span></th>
                </tr>
              </thead>

              <tbody>
                @foreach($peliharaan->medis as $medis)
                <tr class="even pointer">
                  <td class="a-center ">{{ $loop->iteration }}</td>
                  <td class=" ">{{ $medis->created_at }}</td>
                  <td class=" ">{{ $medis->updated_at }}</td>
                  <td class=" ">{{ str_limit($medis->anamnesa, $limit = 30, $end = '...') }}</td>
                  <td class=" ">{{ str_limit($medis->diagnosa, $limit = 30, $end = '...') }}</td>
                  <td class=" last"><a href="/medis/{{ $pasien->id }}/{{ $peliharaan->id }}/{{ $medis->id }}">View</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>

	</div> <!-- end row -->

	<div class="clearfix"></div>

	<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    	<div class="modal fade tambahMedis" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            {!! Form::open(['action' => ['MedisController@store', $peliharaan->id, 'method'=>'POST'], 'class'=>'form-vertical form-label-left']) !!}
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h5 class="modal-title" id="myModalLabel">{{$now}} TAMBAH REKAM MEDIS</h5>
              </div>
              <div class="modal-body">
                <div class="x_panel">
                  <div class="x_content">

                    <span class="section">Data rekam medis</span>
				            <div class="row">
	                		<div class="rekam-medis col-md-12 col-xs-12">
	                			{{Form::label('anamnesa','ANAMNESA')}}
                				{{Form::textarea('anamnesa', '', ['class'=>'form-control','placeholder'=>'Enter anamnesa..','rows'=>6])}}
		                	</div>

	                  	<div class="rekam-medis col-md-12 col-xs-12">
	                  		{{Form::label('diagnosa','DIAGNOSA')}}
                				{{Form::textarea('diagnosa', '', ['class'=>'form-control','placeholder'=>'Enter diagnosa..','rows'=>6])}}
	                		</div>

	                		<div class="rekam-medis col-md-12 col-xs-12">
	                  		{{Form::label('terapi','TERAPI')}}
                				{{Form::textarea('terapi', '', ['class'=>' form-control','placeholder'=>'Enter terapi..','rows'=>6])}}
	                		</div>

	                		<div class="rekam-medis col-md-12 col-xs-12">
	                  		{{Form::label('keterangan','KETERANGAN')}}
                				{{Form::textarea('keterangan', '', ['class'=>' form-control','placeholder'=>'Enter keterangan..','rows'=>6])}}
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

        		{!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
