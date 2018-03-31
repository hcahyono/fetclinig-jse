@if (count($errors) > 0 )
	@foreach($errors->all() as $error)
		<div class="alert alert-danger">
			{{$error}}
		</div>
	@endforeach
@endif

@if (session('danger'))
    <div class="alert alert-danger">
        <strong>{{ session('danger') }}</strong>.
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success">
        <strong>{{ session('success') }}</strong>.
    </div>
@endif
@if (session('warning'))
    <div class="alert alert-warning">
        <strong>{{ session('warning') }}</strong>.
    </div>
@endif