@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">ADMIN Reset Password</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-danger">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="GET" action="{{ route('admin.kode.confirm') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="kode" class="col-md-4 col-form-label text-md-right">Kode Reset</label>

                            <div class="col-md-6">
                                <input id="kode" type="password" class="form-control" name="kode" required formnovalidate>

                                @if ($errors->has('kode'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('kode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Kirim Form Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
