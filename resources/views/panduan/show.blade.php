@extends('panduan')

@section('content.panduan')

<h4>Panduan</h4>
<div class="card">
  <div class="card-header">{{$panduan->judul}}</div>
  <div class="card-body">{!! $panduan->panduan !!}</div>
  <div class="card-footer">
  	{!!Form::open(['route' => ['delete.panduan', $panduan->id], 'id'=>'panduan-delete', 'class'=>'form-horzontal pull-left'])!!}
  		{{Form::hidden('_method', 'DELETE')}}

  		{{csrf_field()}}
  	{!!Form::close()!!}
    <button class="btn btn-danger" 
              onclick="event.preventDefault();
              var q = confirm('Data akan dihapus!!, lanjutkan ?');
              if (q){
                document.getElementById('panduan-delete').submit();  
              }
              "><i class="fa fa-exclamation-circle"></i> Hapus</button>
  	&nbsp;
  	<a href="{{route('edit.panduan', $panduan->id)}}" class="btn btn-secondary">edit panduan</a>
  </div>
</div>

@endsection