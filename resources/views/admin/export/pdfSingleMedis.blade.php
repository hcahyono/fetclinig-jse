<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Josevetclinic | Rekam Medis</title>
    <style>
      *{
        font-family:  arial, sans-serif;
      }

      .page-break {
        page-break-after: always;
      }

      .ln_solid {
        margin-top: 5px;
        margin-bottom: 5px;
        border-top: 1px solid #dddddd;
      }

      .text-capitalize {
        text-transform: capitalize;
      }

      table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }

      td, th{
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
      }

      table#pasien tr:nth-child(even), table#hewan tr:nth-child(even) {
        background-color: #dddddd;
      }

      th {
        font-size: 14px;
      }

      td {
        font-size: 12px;
      }

      td#except {
        padding: 24px;
        font-size: 14px;
        font-weight: bold;
        text-align: center;
      }
    </style>
  </head>

  <body>
    <p>{{$now}} &nbsp;Dicetak oleh - {{$user}}</p>
    <h2>Data Rekam Medis Peliharaan</h2>

    <h3>Informasi pemilik hewan</h3>
    <table id="pasien">
      <tr>
        <th>Nama pemilik</th>
        <th>Gender</th>
        <th colspan="2">Kontak</th>
        <th>Alamat</th>
      </tr>
      <tr>
        <td class="text-capitalize">{{ ($pasien->nama != "" ? $pasien->nama : "--") }}</td>
        <td class="text-capitalize">{{ ($pasien->gender != "" ? $pasien->gender : "--") }}</td>
        <td>{{ ($pasien->handphone != "" ? $pasien->handphone : "--") }}</td>
        <td>{{ ($pasien->telepon != "" ? $pasien->telepon : "--") }}</td>
        <td>{{ ($pasien->alamat != "" ? $pasien->alamat : "--") }}</td>
      </tr>
    </table>

    <h3>Informasi hewan peliharaan</h3>
    <table id="hewan">
      <tr>
        <th>Nama hewan</th>
        <th>Jenis hewan</th>
        <th>Jenis kelamin</th>
        <th>Ras hewan</th>
        <th>Warna bulu</th>
      </tr>
      <tr>
        <td class="text-capitalize">{{ ($hewan->nama != "" ? $hewan->nama : "--") }}</td>
        <td class="text-capitalize">{{ ($hewan->jenis != "" ? $hewan->jenis : "--") }}</td>
        <td class="text-capitalize">{{ ($hewan->gender != "" ? $hewan->gender : "--") }}</td>
        <td class="text-capitalize">{{ ($hewan->ras != "" ? $hewan->ras : "--") }}</td>
        <td class="text-capitalize">{{ ($hewan->warna != "" ? $hewan->warna : "--") }}</td>
      </tr>
    </table>
    
    <br><br><div class="ln_solid"></div><br>

    <h3>Data rekam medis</h3>
    <table id="medis">
      @if( $medis != "" OR $medis != NULL )
      <tr>
        <th>Perekaman</th>
        <td>{{ ($medis->created_at != "" ? $medis->created_at : "--") }}</td>
      </tr>
      <tr>
        <th>Anamnesa</th>
        <td>{!! nl2br( e( ($medis->anamnesa != "" ? $medis->anamnesa : "--") ) ) !!}</td>
      </tr>
      <tr>
        <th>Diagnosa</th>
        <td>{!! nl2br( e( ($medis->diagnosa != "" ? $medis->diagnosa : "--") ) ) !!}</td>
      </tr>
      <tr>
        <th>Terapi</th>
        <td>{!! nl2br( e( ($medis->terapi != "" ? $medis->terapi : "--") ) ) !!}</td>
      </tr>
      <tr>
        <th>Keterangan</th>
        <td>{!! nl2br( e( ($medis->keterangan != "" ? $medis->keterangan : "--") ) ) !!}</td>
      </tr>
      @else
      <tr>
        <td id="except" colspan="5">Tidak dapat menemukan data rekam medis</td>
      </tr>
      @endif
    </table>
  </body>
</html>
