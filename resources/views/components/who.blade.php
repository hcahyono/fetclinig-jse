@if (Auth::guard('web')->check())
  <p class="text-success">
    Anda Sedang <strong>logged IN</strong> sebagai <strong>OPERATOR!</strong>
  </p>
@else
  <p class="text-danger">
    Anda Saat Ini Sedang <strong>logged OUT!</strong>
  </p>
@endif

@if (Auth::guard('admin')->check())
  <p class="text-success">
    Anda Sedang <strong>logged IN</strong>  sebagai <strong>ADMIN</strong>!
  </p>
@endif
