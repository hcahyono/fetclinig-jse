<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Jose vet clinic') }}</title>
    <style>
      body {
        margin: 0;
        padding: 0;
      }

      *{
        font-family:  arial, sans-serif;
      }

      .id-card-frame {
        background-color: darkgrey;
        border-radius: 8px;
        width: 1011px;
        height: 638px;
      }

      .id-card-logo {
        /* background-color: cadetblue; */
        padding: 20px 0px;
        text-align: center;
      }

      .id-card-logo::after {
        content: '';
        width: 100%;
        height: 2px;
        display: block;
        padding-top: 10px;
        border-bottom: 2px solid #2e789b;
      }

      .id-card-logo img {
        display: inline-block;
        width: 25%;
        height: auto;
      }

      .id-card-body {
        background-color: darkkhaki;
      }

      .id-card-barcode {
        background-color: indianred;
        padding: 20px;
        text-align: center;
      }

      .id-card-biodata {
        background-color: cornflowerblue;
        width: 50%;
        height: 100%;
        margin: 0 auto;
      }

      .id-card-footer {
        background-color: dodgerblue;
        bottom: 0;
      }

      .id-card-address {
        background-color: lightskyblue;
        padding: 0 40px;
        text-align: center;
      }
    </style>
  </head>
  <body>
    <div class="id-card-frame">
      <div class="id-card-logo">
        <img src="{{ asset('images/jose-logo.png') }}" alt="logo">
      </div>
      <div class="id-card-body">
        <div class="id-card-barcode">
          <h2>BARCODE</h2>
        </div>
        <div class="id-card-biodata">
          <h1>{{ @$pasien ? @$pasien->kode : '123TEST45' }}</h1>
          <h2 class="text-capitalize">{{ @$pasien ? @$pasien->nama : 'Testing' }}</h2>
        </div>
      </div>
      <div class="id-card-footer">
        <hr>
        <div class="id-card-address">
          <p>Kartu ini adalah kartu pasien <b>{{ config('app.name', 'Jose Vet Clinic') }}</b></p>
          <p>JLn Mayor Tni AD Ismail Saili, Jl. Sungai Ampal, RT.57/RW.No 9, Sumber Rejo, Kec. Balikpapan Tengah, Kota Balikpapan, Kalimantan Timur 76114</p>
          <p>Telp. 568 861388 | 0821-5487-7993</p>
        </div>
      </div>
    </div>
  </body>
</html>
