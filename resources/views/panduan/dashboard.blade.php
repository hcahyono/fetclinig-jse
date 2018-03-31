@extends('panduan')

@section('content.panduan')

<h4>List panduan</h4>
<div class="list-group">
	@foreach($panduans as $panduan)
  	<a href="{{route('show.panduan', $panduan->id)}}" class="list-group-item list-group-item-action">{{$panduan->judul}}</a>
  @endforeach
</div>

<div class="text-center mx-auto mt-2">
	{{ $panduans->links() }}
</div>

@endsection