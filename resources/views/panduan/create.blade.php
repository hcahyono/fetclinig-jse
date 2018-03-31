@extends('panduan')

@section('content.panduan')

<h4>Buat panduan</h4>
{{Form::open(['route' => ['simpan.panduan']])}}
{{Form::hidden('_method', 'POST')}}
	<div class="form-group">
    {{Form::label('judul','Judul Panduan *', ['class'=>'control-label'])}}
    {{Form::text('judul', '', ['class'=>'form-control', 'placeholder'=>'judul panduan'])}}
  </div>
  <div class="form-group">
	  {{Form::label('panduan','Isi Panduan *', ['class'=>'control-label'])}}
    {{Form::textarea('panduan', '', ['id'=>'article-ckeditor', 'class'=>'form-control', 'placeholder'=>'isi panduan'])}}
	</div>
	<button type="submit" class="btn btn-success">Submit</button>
{{csrf_field()}}
{{Form::close()}}

@endsection