@extends('admin')

@section('contents')
	<h2>Operator</h2>
    <ul class="list-group">
      <li class="list-group-item">Nama : {{$operator->name}}</li>
      <li class="list-group-item">Email : {{$operator->email}}</li>
      <li class="list-group-item">Akun status : {{$status}}
        <form method="POST" action="{{route('update.operator', [$operator->id])}}" >
          @csrf
          <input type="hidden" name="_method" value="DELETE">
          @if($status == 'aktif') 
            <input type="submit" name="status" value="Non-aktifkan" class="btn btn-secondary btn-sm float-right">
          @else
            <input type="submit" name="status" value="Aktifkan" class="btn btn-secondary btn-sm float-right">
          @endif
        </form>
      </li>
      <li class="list-group-item">Handphone : {{$operator->phone}}</li>
      <li class="list-group-item">Gender : {{$operator->gender}}</li>
      <li class="list-group-item">Password 
        <form method="POST" action="{{route('reset.operator', [$operator->id])}}" >
          @csrf
          <input type="hidden" name="_method" value="PUT">
          <input type="submit" name="reset" value="Reset password" class="btn btn-secondary btn-sm float-right">
        </form>
      </li>
    </ul>
@endsection