<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Print Preview Pemeriksaan</title>
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
    <h1 class="title">Laporan Pemeriksaan</h1>

    <table class="table">
        <thead>
            <tr>
                <th>NO</th>
                <th>Nama Pasien</th>
                <th>Jenis Tindakan</th>
                <th>Tanggal Periksa</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
          @foreach($pemeriksaan as $row)
          <tr>
              <td class="text-center" width="20">{{$loop->iteration}}</td>
              <td>{{$row->pasien->nama_pasien}}</td>
              <td>{{$row->tindakan->jenis_tindakan}}</td>
              <td>{{$row->tgl_periksa}}</td>
              <td>{{$row->keterangan}}</td>
          </tr>
          @endforeach
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