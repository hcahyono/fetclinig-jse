const _token = document.getElementById('csrf-token').getAttribute('content')
const _site_url = "{{ url('/') }}"

$(document).ready(function()
{

	$(".close-edit").click(function()
	{
		var r = confirm("Perubahan pada data tidak akan disimpan");
		if ( r == true ) {
			window.history.back();
		}
	});

	$(".batal").click(function()
	{
		var r = confirm("Aksi menyebabkan data pada halaman ini tidak akan disimpan, lanjutkan ?");
		if ( r == true ) {
			window.history.back();
		}

	});

	$(".back").click(function()
	{
		window.history.back();
	});

	$(".back-to-pasien").click(function()
	{
		window.location.href = _site_url + '/pasien';
  });
  

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': _token
    },
    data: {
      '_token' : _token
    }
  });

});

 // global function set button disable when any http action
 window.onAction = function(on_action = false) {
  if (on_action) {
    if ($('.can-action').length) {
      $('.can-action').attr('disabled', true)
    }
  } else {
    if ($('.can-action').length) {
      $('.can-action').attr('disabled', false)
    }
  }
};