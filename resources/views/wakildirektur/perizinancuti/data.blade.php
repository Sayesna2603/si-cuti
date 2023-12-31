@extends('layout.main')

@section('content')
<div class="dashboard-main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-box">
                    <div class="form-title-wrap">
                        <div>
                            <h3 class="title">{{ $subTitle }}</h3>
                            <p class="font-size-14">Silahkan lihat data perizinan cuti di tabel bawah!</p>
                        </div>
                    </div>
                    <div class="form-content">
                        <div class="table-form table-responsive">
                            {{-- <div class="row mb-2">
                                <div class="col-lg-12">
                                    <a href="/download-semua-pengajuan-cuti" class="theme-btn theme-btn-small"><i class="la la-download"></i> Download Semua Data</a>
                                </div>
                            </div> --}}
                            <div class="mb-2">
                                @if (session('berhasil'))    
                                    <div class="alert bg-primary text-white alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h4><i class="icon fa fa-ban"></i> Berhasil!</h4>
                                        {{ session('berhasil') }}
                                    </div>
                                @endif
                                @if (session('gagal'))    
                                    <div class="alert bg-danger text-white alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h4><i class="icon fa fa-ban"></i> Gagal!</h4>
                                        {{ session('gagal') }}
                                    </div>
                                @endif
                            </div>
                            <table class="table" id="example2">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Jenis Cuti</th>
                                        <th scope="col">Unit Kerja</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;?>
                                    @foreach ($dataPengajuanCuti as $item)
                                    @if ($item->status_pengajuan === 'Dikirim ke Wakil Direktur 2')
                                        <tr>
                                            <th scope="row">{{ $no++ }}</th>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->jenis_cuti }}</td>
                                            <td>{{ $item->unit_kerja }}</td>
                                            <td colspan="5">
                                                <div class="table-content text-center">
                                                    <button type="button" data-toggle="modal" data-target="#terima{{$item->id_pengajuan_cuti}}" class="theme-btn theme-btn-small"><i class="la la-check"></i> Terima</button>
                                                </div>
                                            </td>
                                        </tr>
                                    @else
                                        <tr>
                                            <th scope="row">{{ $no++ }}</th>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->jenis_cuti }}</td>
                                            <td>{{ $item->unit_kerja }}</td>
                                            {{-- <td><span class="badge badge-primary py-1 px-2">{{ $item->status_pengajuan }}</span></td> --}}
                                            <td>
                                                <div class="table-content">
                                                    @if ($item->status_pengajuan === 'Diterima Wakil Direktur 2')
                                                        <button type="button" data-toggle="modal" data-target="#izin-atasan{{$item->id_pengajuan_cuti}}" class="theme-btn theme-btn-small mb-1" data-toggle="tooltip" data-placement="top" title="Keputusan Pejabat"><i class="la la-check"></i></button>
                                                    @endif
                                                    <a href="/detail-pengajuan-cuti-wakil-direktur2/{{ $item->id_pengajuan_cuti }}" class="theme-btn theme-btn-small mb-1" data-toggle="tooltip" data-placement="top" title="Detail"><i class="la la-eye"></i></a>
                                                    {{-- <a href="/download-kelola-pengajuan-cuti/{{ $item->id_pengajuan_cuti }}" class="theme-btn theme-btn-small mb-1" data-toggle="tooltip" data-placement="top" title="Download"><i class="la la-download"></i></a> --}}
                                                    {{-- @if ($item->status_pengajuan === 'Diterima Admin')
                                                        <a href="/edit-kelola-pengajuan-cuti/{{ $item->id_pengajuan_cuti }}" class="theme-btn theme-btn-small mb-1" data-toggle="tooltip" data-placement="top" title="Edit"><i class="la la-edit"></i></a>
                                                        <button type="button" data-toggle="modal" data-target="#hapus{{$item->id_pengajuan_cuti}}" class="theme-btn theme-btn-small mb-1" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="la la-trash"></i></button>
                                                    @endif --}}
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- end form-box -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        {{-- footer --}}
        @include('layout.footer')
        {{-- end footer --}}
    </div>
</div>

{{-- Hapus --}}
{{-- @foreach ($dataPengajuanCuti as $item)
<div class="modal fade" id="hapus{{ $item->id_pengajuan_cuti }}"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <p>Apakah Anda yakin akan hapus data ini ?</p>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
            <a href="/hapus-kelola-pengajuan-cuti/{{ $item->id_pengajuan_cuti }}" class="btn btn-danger">Hapus</a>
        </div>
        </div>
    </div>
</div>
@endforeach --}}

{{-- Terima --}}
@foreach ($dataPengajuanCuti as $item)
<div class="modal fade" id="terima{{ $item->id_pengajuan_cuti }}"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Terima Data Pengajuan Cuti</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 mb-3">
                        <table>
                            <tr>
                                <th colspan="3">Pengajuan Cuti:</th>
                            </tr>
                            <tr>
                                <th>Nama Pegawai</th>
                                <td>:</td>
                                <td>{{$item->nama}}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Pengajuan</th>
                                <td>:</td>
                                <td>{{ date('d F Y', strtotime($item->tanggal_pengajuan)) }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-lg-12">
                        <p>Apakah Anda yakin akan terima data pengajuan cuti <strong>{{$item->nama}}</strong> ?</p>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
            <a href="/terima-pengajuan-cuti-wakil-direktur2/{{ $item->id_pengajuan_cuti }}" class="btn btn-primary">Terima</a>
        </div>
        </div>
    </div>
</div>
@endforeach

{{-- beri izin --}}
@foreach ($dataPengajuanCuti as $item)
<div class="modal fade" id="izin-atasan{{ $item->id_pengajuan_cuti }}"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Perizinan Cuti</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <p>Silahkan berikan keputusan pejabat untuk pengajuan cuti <strong>{{$item->nama}}</strong> ?</p>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
            <a href="/izin-wakil-direktur2/{{ $item->id_pengajuan_cuti }}" class="btn btn-primary">Keputusan Pejabat</a>
        </div>
        </div>
    </div>
</div>
@endforeach

@endsection