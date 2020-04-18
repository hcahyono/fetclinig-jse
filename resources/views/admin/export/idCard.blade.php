<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Jose vet clinic') }}</title>
    <style>
      *{
        margin: 0;
        padding: 0;
      }

      body {
        font-family: sans-serif;
      }

      .id-card-frame {
        background-color: #ffffff;
        /* border-radius: 8px; */
        width: 1011px;
        height: 638px;
        overflow: hidden;
      }

      .id-card-logo {
        padding: 20px 0px;
        text-align: center;
      }

      .id-card-logo::after {
        content: '';
        width: 100%;
        height: 2px;
        display: block;
        padding-top: 10px;
        border-bottom: 6px solid #2e789b;
      }

      .id-card-logo img {
        display: inline-block;
        width: 25%;
        height: auto;
      }

      .id-card-body {
        /* background-color: aquamarine; */
        padding: 20px 0;
      }

      .id-card-barcode {
        padding: 20px;
        margin: 0px auto;
        text-align: center;
      }

      .id-card-barcode > div {
        margin: 0px auto;
        text-align: center;
      }

      .id-card-biodata {
        width: 65%;
        height: 100%;
        margin: 0 auto;
      }

      .id-card-biodata h1 {
        text-align: center;
        padding-bottom: 20px;
        font-size: 1.5em;
      }

      .id-card-biodata h2 {
        padding-bottom: 10px;
        text-transform: capitalize;
      }

      .id-card-biodata h3 {
        padding-top: 5px;
        min-height: 90px;
        max-height: 90px;
        overflow: hidden;
        text-align: justify;
        /* background-color: cadetblue; */
      }

      .id-card-footer::before {
        content: '';
        width: 100%;
        display: block;
        border-top: 4px solid #e46228;
      }

      .id-card-address {
        background-color: #2e789b;
        padding: 20px 40px;
        text-align: center;
        min-height: 110px;
        max-height: 110px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
      }

      .id-card-address p {
        color: #ffffff;
        margin-bottom: 7px;
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
          {!! DNS1D::getBarcodeHTML(@$pasien ? @$pasien->kode : '123TEST45', 'C128',3,53) !!}
        </div>
        <div class="id-card-biodata">
          <h1>{{ @$pasien ? @$pasien->kode : '123TEST45' }}</h1>
          <h2>{{ @$pasien ? ($pasien->gender == 'perempuan' ? "Mrs. $pasien->nama" : "Mr. $pasien->nama") : 'mr. john smith nanda mahendra' }}</h2>
          <span>Alamat,</span>
          <h3 class="address">{{ @$pasien ? @$pasien->alamat : 'JLn Bougenville No.01, RT.02/RW.03 Raflesia arnoldi, Kec. Sirih Gading, Kota Rosella, Wijayakusuma 45678' }}</h3>
        </div>
      </div>
      <div class="id-card-footer">
        <div class="id-card-address">
          <p>Kartu ini adalah kartu pasien <b>{{ config('app.name', 'Jose Vet Clinic') }}</b></p>
          <p>Jl. Sungai Ampal, RT.57/RW.No 9, Sumber Rejo, Kec. Balikpapan Tengah, Kota Balikpapan, Kalimantan Timur 76114</p>
          <p>Telp. 568 861388 | 0821-5487-7993</p>
        </div>
      </div>
    </div>
  </body>
</html>
