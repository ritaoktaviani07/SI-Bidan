@extends('sb-admin/app')
@section('title', 'Detail Pendaftaran Pasien')

@section('content')
<div class="modal fade show" id="modal-default" style="display: block; padding-right: 17px;">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Lihat Detail Pasien</h4>
        <button wire:click="format" type="button" class="close" data-dismiss="modal" aria-label="Close">
            <button aria-hidden="true">&times;</button>
        </button>
        </div>
        <div class="modal-body">
            <table class="table text-nowrap">
                <tbody>
                    <tr>
                        <th>ID Tindakan </th>
                        <td>:</td>
                        <td>{{$pasien->id_tindakan}}</td>
                    </tr>
                    <tr>
                        <th>Nama Pasien</th>
                        <td>:</td>
                        <td>{{$pasien->nama_pasien}}</td>
                    </tr>
                    <tr>
                        <th>NIK</th>
                        <td>:</td>
                        <td>{{$pasien->nik}}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>:</td>
                        <td>{{$pasien->jenis_kelamin}} </td>
                    </tr>
                    <tr>
                        <th>Umur</th>
                        <td>:</td>
                        <td>{{$pasien->umur}}</td>
                    </tr>
                    <tr>
                        <th>NO HP</th>
                        <td>:</td>
                        <td>{{$pasien->no_hp}}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>:</td>
                        <td>{{$pasien->alamat}}</td>
                    </tr>
                </tbody>
            </table>

        </div>
        <div class="modal-footer justify-content-between">
        <span wire:click="format" type="button" class="btn btn-default" data-dismiss="modal">Kembali</span>
        </div>
    </div>
    </div>
</div>

@endsection
