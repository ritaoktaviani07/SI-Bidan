<!DOCTYPE html> 
<html> 
<head> 
    <title>Laporan Data Pemeriksaan Pasien</title> 
</head> 

<body> 
    <div>
        <table class="table table-bordered-1" id="dataTable" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pasien</th>
                    <th>Jenis Tindakan</th>
                    <th>Tanggal Periksa</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pemeriksaan as $row)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$row->id_pasien}}</td>
                    <td>{{$row->id_tindakan}}</td>
                    <td>{{$row->tgl_periksa}}</td>
                    <td>
                      @if ($row->keterangan == "Menunggu Konfirmasi")
                      <span class="badge badge-pill badge-primary">Menunggu Konfirmasi</span>
                      @elseif ($row->keterangan == "Sedang Diperiksa")
                      <span class="badge badge-pill badge-warning">Sedang Diperiksa</span>
                      @elseif ($row->keterangan == "Selesai Diperiksa")
                      <span class="badge badge-pill badge-success">Selesai Diperiksa</span>
                      @endif
                    </td>


                </tr>
                @endforeach
            </tbody>
        </table>

    </div>


</body> 
</html>