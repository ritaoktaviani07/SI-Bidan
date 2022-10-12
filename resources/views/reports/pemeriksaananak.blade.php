<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $data->pemeriksaan->tgl_periksa }} - Pemeriksaan Anak - {{ $data->pasien->nama_pasien }}</title>
  <link rel="stylesheet" type="text/css" media="all" href="{{ asset('reports/paper.min.css') }}">
  <link rel="stylesheet" type="text/css" media="all" href="{{ asset('reports/style.css') }}">
</head>
{{-- <body  onload="window.print()"> --}}
<body class="A4">
  <section class="sheet padding-20mm">
    <table width="100%">
      <tr>
        <td>
          <img src="{{ asset('reports/baktihusada.png') }}" alt="logo bakti husada" width="80px">
        </td>
        <td class="text-center">
          <h2>Bidan Desmiwarti S.Tr.Keb</h2>
          <h4>Jl. Pilakut Kampung Jambak No.08, Kelurahan Gunung Sarik, Kec Kuranji</h4>
          <h5>Hp : 0823-8431-9045</h5>
        </td>
      </tr>

    </table>
    <hr class="bold">
    <h1 class="title">Laporan Pemeriksaan Pemeriksaan Anak</h1>

    <table class="single-table">
      <thead>
        <tr>
          <th width="25%"></th>
          <th width="3%"></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr> 
          <td>Nama Pasien </td> <td>:</td> <td>{{$data->pasien->nama_pasien}}</td>
        </tr>
        <tr>
          <td>Tanggal pemeriksaan</td> <td>:</td> <td>{{$data->pemeriksaan->tgl_periksa}}</td>
        </tr>
        <tr> 
          <td>Nama Ibu </td> <td>:</td> <td>{{ $data->nama_ibu }}</td>
        </tr>
        <tr>
          <td>Tanggal Lahir </td> <td>:</td> <td>{{ $data->tgl_lahir }} </td>
        </tr>
        <tr>
          <td>BCG</td> <td>:</td> <td>{{ ($data->bcg == 'true')?'Iya':'Tidak' }}</td>
        </tr>
        <tr>
          <td>DPT</td> <td>:</td> <td>{{ ($data->dpt == 'true')?'Iya':'Tidak' }}</td>
        </tr>
        <tr>
          <td>Polio</td> <td>:</td> <td>{{ ($data->polio == 'true')?'Iya':'Tidak' }}</td>
        </tr>
        <tr>
          <td>IPV</td> <td>:</td> <td>{{ ($data->ipv == 'true')?'Iya':'Tidak' }}</td>
        </tr>
        <tr>
          <td>Campak</td> <td>:</td> <td>{{ ($data->campak == 'true')?'Iya':'Tidak' }}</td>
        </tr>
        <tr>
          <td>Tetanus</td> <td>:</td> <td>{{ ($data->tetanus == 'true')?'Iya':'Tidak' }}</td>
        </tr>
      </tbody>
    </table>
    <table style="margin-top: 10mm">
      <tr>
        <td width="65%"></td>
        <td class="nospace">
          <p>Padang , ......</p>
          <p>Pemilik Praktik</p>
          <p style="height: 15mm"></p>
          <p><b>Desmiwarti S.Tr.Kep</b></p>
          <p>NIP. 0710200</p>
        </td>
      </tr>
    </table>
  </section>
</body>
</html>