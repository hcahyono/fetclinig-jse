@extends('panduan')

@section('content.panduan')

<h4>Edit panduan</h4>
{{Form::open(['route' => ['update.panduan', $panduan->id]])}}
{{Form::hidden('_method', 'PUT')}}
	<div class="form-group">
    {{Form::label('judul','Judul Panduan *', ['class'=>'control-label'])}}
    {{Form::text('judul', $panduan->judul, ['class'=>'form-control', 'placeholder'=>'judul panduan'])}}
  </div>
  <div class="form-group">
	  {{Form::label('panduan','Isi Panduan *', ['class'=>'control-label'])}}
    {{Form::textarea('panduan', $panduan->panduan, ['id'=>'article-ckeditor', 'class'=>'form-control', 'placeholder'=>'isi panduan'])}}
	</div>
	<button type="submit" class="btn btn-success">Submit</button>
{{csrf_field()}}
{{Form::close()}}

@endsection