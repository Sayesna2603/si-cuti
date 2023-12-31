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
                            <p class="font-size-14">Silahkan lihat data pengajuan cuti di tabel bawah!</p>
                        </div>
                    </div>
                    <div class="form-content">
                        <div class="table-form table-responsive">
                            <div class="row mb-2">
                                <div class="col-lg-12">
                                    <a href="@if($user->role == 'Pegawai') /tambah-pengajuan-cuti @elseif($user->role == 'Ketua Jurusan') /tambah-pengajuan-cuti-ketua-jurusan @endif" class="theme-btn theme-btn-small"><i class="la la-plus"></i> Tambah</a>
                                </div>
                            </div>
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
                                        <th scope="col">Status Pengajuan</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;?>
                                    @foreach ($dataPengajuanCuti as $item)
                                    @if ($item->status_pengajuan !== 'Selesai')
                                        <tr>
                                            <th scope="row">{{ $no++ }}</th>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->jenis_cuti }}</td>
                                            <td><span class="badge badge-primary py-1 px-2">{{ $item->status_pengajuan }}</span></td>
                                            <td>
                                                <div class="table-content">
                                                    <a href="@if($user->role == 'Pegawai')/detail-pengajuan-cuti/{{ $item->id_pengajuan_cuti }}@elseif($user->role == 'Ketua Jurusan')/detail-pengajuan-cuti-ketua-jurusan/{{ $item->id_pengajuan_cuti }}@endif" class="theme-btn theme-btn-small mb-1" data-toggle="tooltip" data-placement="top" title="Detail"><i class="la la-eye"></i></a>
                                                    @if ($item->status_pengajuan === 'Persiapan')
                                                        <button type="button" data-toggle="modal" data-target="#kirim{{$item->id_pengajuan_cuti}}" class="theme-btn theme-btn-small mb-1" data-toggle="tooltip" data-placement="top" title="Kirim Pengajuan Cuti"><i class="la la-check"></i></button>
                                                        <a href="@if($user->role == 'Pegawai')/edit-pengajuan-cuti/{{ $item->id_pengajuan_cuti }}@elseif($user->role == 'Ketua Jurusan')/edit-pengajuan-cuti-ketua-jurusan/{{ $item->id_pengajuan_cuti }}@endif" class="theme-btn theme-btn-small mb-1" data-toggle="tooltip" data-placement="top" title="Edit"><i class="la la-edit"></i></a>
                                                        <button type="button" data-toggle="modal" data-target="#hapus{{$item->id_pengajuan_cuti}}" class="theme-btn theme-btn-small mb-1" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="la la-trash"></i></button>
                                                    @endif
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
@foreach ($dataPengajuanCuti as $item)
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
            <a href="@if($user->role == 'Pegawai')/hapus-pengajuan-cuti/{{ $item->id_pengajuan_cuti }}@elseif($user->role == 'Ketua Jurusan')/hapus-pengajuan-cuti-ketua-jurusan/{{ $item->id_pengajuan_cuti }}@endif" class="btn btn-danger">Hapus</a>
        </div>
        </div>
    </div>
</div>
@endforeach

{{-- kirim --}}
@foreach ($dataPengajuanCuti as $item)
<div class="modal fade" id="kirim{{ $item->id_pengajuan_cuti }}"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Kirim Pengajuan Cuti</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <p>Apakah Anda yakin akan kirim pengajuan cuti ini ?</p>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
            <a href="@if($user->role == 'Pegawai')/kirim-pengajuan-cuti/{{ $item->id_pengajuan_cuti }}@elseif($user->role == 'Ketua Jurusan')/kirim-pengajuan-cuti-ketua-jurusan/{{ $item->id_pengajuan_cuti }}@endif" class="btn btn-primary">Kirim</a>
        </div>
        </div>
    </div>
</div>
@endforeach

@endsection