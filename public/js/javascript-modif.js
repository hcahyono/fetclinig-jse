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
		window.location.href = 'http://josevetclinic.ap/pasien';
	});


});
