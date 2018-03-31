@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-default">
                <div class="card-header">ADMIN Panel</div>

                <div id="accordion" class="card-body">
                  <div class="card">
                    <a class="card-link btn btn-light" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                      Kelola Panduan <i class="fa fa-angle-down"></i>
                    </a>
                    <div id="collapseOne" class="collapse show">
                      <div class="card-body">
                        <ul class="nav flex-column">
                          <li class="nav-item">
                            <a class="nav-link" href="{{route('panduan')}}">Dashboard</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{route('create.panduan')}}">Tambah Panduan</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
          <div class="card card-default">
              <div class="card-header">ADMIN Dashboard</div>

              <div class="card-body">
                  @include('components.message')

                  @yield('content.panduan')
              </div>
          </div>
        </div>
    </div>
</div>
@endsection
