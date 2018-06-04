<?php 
	$hari = date('d');
	$bulan = date('m');
	$ultah = array();
	$ultahBesok = array();
	
	$ultahPemilik = DB::table('pasien')
								->whereNull('deleted_at')
								->whereMonth('tanggal_lahir', $bulan)
								->whereDay('tanggal_lahir', $hari)
								->get();
	foreach ($ultahPemilik as $ultahValue) {
		$ultah[] = $ultahValue;
	}

	$ultahPemilikBesok = DB::table('pasien')
								->whereNull('deleted_at')
								->whereMonth('tanggal_lahir', $bulan)
								->whereDay('tanggal_lahir', $hari+1)
								->get();
	foreach ($ultahPemilikBesok as $ultahBesokValue) {
		$ultahBesok[] = $ultahBesokValue;
	}

	echo count($ultah)+count($ultahBesok);

?>