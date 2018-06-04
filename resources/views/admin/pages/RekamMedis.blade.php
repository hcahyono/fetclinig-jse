@extends('admin.template.Default')

@section('title', 'Rekam Medis')

@section('content')


<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Lihat rekam medis <small></small></h3>
    </div>

    <div class="title_right">
      <div class="col-md-12 col-sm-12 col-xs-12 pull-right">
        <div class="right_align">
          <button type="button" class="back btn btn-default zoom btn_right"><i class="fa fa-angle-double-left"></i> sebelumnya</button>
          <a href="/pdf/{{$pasien->id}}/{{$peliharaan->id}}/{{$medis->id}}" target="_blank" class="btn btn-info zoom btn_right" type="button">Download PDF</a>
        </div>
      </div>
    </div>
  </div>

  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 card_wrap">
      <div class="x_panel card_def shadow_fly round-all">
        <div class="x_title">
          <h2>Rekam medis hewan peliharaan</h2>
          <div class="nav navbar-right">
            <button class="btn btn-danger zoom btn_right pull-left" 
              onclick="event.preventDefault();
              var q = confirm('Data akan dihapus dari sistem !!, tetap lanjutkan ?');
              if (q){
                document.getElementById('medis-delete').submit();  
              }
              "><i class="fa fa-exclamation-circle"></i> Hapus data</button>

            {!! Form::open(['route' => ['medis.delete', $pasien->id, $peliharaan->id, $medis->id], 'method' => 'DELETE','id'=>'medis-delete', 'class'=>'form pull-left']) !!}
              
            {!! Form::close() !!}
            <a href="#editRekamMedis" id="" class="btn btn-second zoom btn_right" type="button" data-toggle="modal" data-target=".editRekamMedis">Edit rekam medis</a>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="row">
            <div class="col-md-12">
              <div class="panel-title">Informasi pemilik</div>
              <div class="clearfix"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 col-sm-12">
              <div class="row">
                <div class="col-md-6 col-sm-12">
                  <div class="row">
                    <div class="col-md-12 col-sm-12">
                      <div class="vert-label">NAMA PEMILIK</div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                      <div class="vert-content text-capitalize">{{ ($pasien->nama != "" ? $pasien->nama : "--") }}</div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-sm-12">
                  <div class="row">
                    <div class="col-md-12 col-sm-12">
                      <div class="vert-label">KONTAK</div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                      <div class="vert-content text-capitalize">hp.{{ ($pasien->handphone != "" ? $pasien->handphone : "--") }} <br> tlp.{{ ($pasien->telepon != "" ? $pasien->telepon : "--") }}</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8 col-sm-12">
              <div class="row">
                <div class="col-md-4 col-sm-12">
                  <div class="row">
                    <div class="col-md-12 col-sm-12">
                      <div class="vert-label">GENDER</div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                      <div class="vert-content text-capitalize">{{ ($pasien->gender != "" ? $pasien->gender : "--") }}</div>
                    </div>
                  </div>
                </div>
                <div class="col-md-8 col-sm-12">
                  <div class="row">
                    <div class="col-md-12 col-sm-12">
                      <div class="vert-label">ALAMAT</div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                      <div class="vert-content">{{ ($pasien->alamat != "" ? $pasien->alamat : "--") }}</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="ln_solid"></div>

          <div class="row">
            <div class="col-md-12">
              <div class="panel-title">Informasi peliharaan</div>
              <div class="clearfix"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 col-sm-12">
              <div class="row">
                <div class="col-md-6 col-sm-6">
                  <div class="row">
                    <div class="col-md-12 col-sm-12">
                      <div class="vert-label">NAMA HEWAN</div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                      <div class="vert-content text-capitalize">{{ ($peliharaan->nama != "" ? $peliharaan->nama : "--") }}</div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="row">
                    <div class="col-md-12 col-sm-12">
                      <div class="vert-label">JENIS HEWAN</div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                      <div class="vert-content text-capitalize">{{ ($peliharaan->jenis != "" ? $peliharaan->jenis : "--") }}</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8 col-sm-12">
              <div class="row">
                <div class="col-md-4 col-sm-6">
                  <div class="row">
                    <div class="col-md-12 col-sm-12">
                      <div class="vert-label">JENIS KELAMIN</div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                      <div class="vert-content text-capitalize">{{ ($peliharaan->gender != "" ? $peliharaan->gender : "--") }}</div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6">
                  <div class="row">
                    <div class="col-md-12 col-sm-12">
                      <div class="vert-label">RAS HEWAN</div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                      <div class="vert-content text-capitalize">{{ ($peliharaan->ras != "" ? $peliharaan->ras : "--") }}</div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6">
                  <div class="row">
                    <div class="col-md-12 col-sm-12">
                      <div class="vert-label">WARNA BULU</div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                      <div class="vert-content text-capitalize">{{ ($peliharaan->warna != "" ? $peliharaan->warna : "--") }}</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="ln_solid"></div>

          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">Anamnesa</h3>
                </div>
                <div class="panel-body">
                  <p class="primary-text">{!! nl2br( e( ($medis->anamnesa != "" ? $medis->anamnesa : "--") ) ) !!}</p>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">Diagnosa</h3>
                </div>
                <div class="panel-body">
                  <p class="primary-text">{!! nl2br( e( ($medis->diagnosa != "" ? $medis->diagnosa : "--") ) ) !!}</p>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">Terapi</h3>
                </div>
                <div class="panel-body">
                  <p class="primary-text">{!! nl2br( e( ($medis->terapi != "" ? $medis->terapi : "--") ) ) !!}</p>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">Keterangan</h3>
                </div>
                <div class="panel-body">
                  <p class="primary-text">{!! nl2br( e( ($medis->keterangan != "" ? $medis->keterangan : "--") ) ) !!}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="foot-info">
              <div class="nav navbar-left">DIBUAT {{ $medis->created_at }} &nbsp;|&nbsp; OLEH {{ $medis->created_by }}</div>
              <div class="nav navbar-right">UPDATE {{ $medis->updated_at }} &nbsp;|&nbsp; OLEH {{ $medis->updated_by }}</div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div id="editRekamMedis" class="modal fade editRekamMedis" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            {!! Form::open(['action' => ['MedisController@update', $medis->id], 'class'=>'form-vertical form-label-left', 'novalidate']) !!}
              {{Form::hidden('_method','PUT')}}
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h5 class="modal-title" id="myModalLabel">{{$now}} <span class="text-uppercase">Edit rekam medis</span></h5>
              </div>
              <div class="modal-body">
                <div class="x_panel">
                  <div class="x_content">

                    <span class="section">Data rekam medis</span>
                    <div class="row">
                      <div class="rekam-medis col-md-12 col-xs-12">
                        {{Form::label('anamnesa','*ANAMNESA')}}
                        {{Form::textarea('anamnesa', $medis->anamnesa, ['class'=>'form-control','placeholder'=>'Input anamnesa..','data-validate-length-range'=>6,'data-validate-word'=>4,'rows'=>6,'required'=>'required'])}}
                      </div>

                      <div class="rekam-medis col-md-12 col-xs-12">
                        {{Form::label('diagnosa','DIAGNOSA')}}
                        {{Form::textarea('diagnosa', $medis->diagnosa, ['class'=>'form-control','placeholder'=>'Input diagnosa..','data-validate-length-range'=>6,'data-validate-word'=>4,'rows'=>6])}}
                      </div>

                      <div class="rekam-medis col-md-12 col-xs-12">
                        {{Form::label('terapi','TERAPI')}}
                        {{Form::textarea('terapi', $medis->terapi, ['class'=>'form-control','placeholder'=>'Input diagnosa..','data-validate-length-range'=>6,'data-validate-word'=>4,'rows'=>6])}}
                      </div>

                      <div class="rekam-medis col-md-12 col-xs-12">
                        {{Form::label('keterangan','KETERANGAN')}}
                        {{Form::textarea('keterangan', $medis->keterangan, ['class'=>'form-control','placeholder'=>'Input diagnosa..','data-validate-length-range'=>6,'data-validate-word'=>4,'rows'=>6])}}
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
</div>

@endsection
