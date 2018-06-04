@extends('admin')

@section('contents')
	<h2>Operator</h2>
	<table class="table table-bordered table-sm">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Gender</th>
        <th>Handphone</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    	@foreach($users as $user)
      <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{($user->name != "" ? $user->name : "-" )}}</td>
        <td>{{($user->email != "" ? $user->email : "-" )}}</td>
        <td>{{($user->gender != "" ? $user->gender : "-" )}}</td>
        <td>{{($user->phone != "" ? $user->phone : "-" )}}</td>
        <td>
        	<a href="{{route('kelola.operator',[$user->id])}}" class="btn btn-link btn-sm">Kelola</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  
  <div class="text-center mx-auto">
    {{ $users->links() }}
  </div>
@endsection