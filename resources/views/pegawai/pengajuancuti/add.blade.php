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
                            <p class="font-size-14">Form {{ $subTitle }}</p>
                        </div>
                    </div>
                    <div class="form-content">
                        <div class="contact-form-action">
                            <form action="@if($user->role == 'Pegawai') /tambah-pengajuan-cuti @elseif($user->role == 'Ketua Jurusan') /tambah-pengajuan-cuti-ketua-jurusan @endif" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <div class="input-box">
                                            <label class="label-text"><strong>FORMULIR PERMINTAAN DAN PEMBERIAN CUTI</strong></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text"><strong>Data Pegawai</strong></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Nama</label>
                                            <div class="form-group">
                                                <input class="form-control" type="hidden" name="id_pegawai" value="{{ $pegawai->id_pegawai }}" readonly>
                                                <input class="form-control" type="text" name="nama" placeholder="Masukkan Nama" value="{{ $pegawai->nama }}" readonly>
                                            </div>
                                            @error('nama')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>          
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">NIP</label>
                                            <div class="form-group">
                                                <input class="form-control" type="number" name="nip" placeholder="Masukkan NIP" value="{{ $pegawai->nip }}" readonly>
                                            </div>
                                            @error('nip')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Jabatan</label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="jabatan" placeholder="Masukkan Jabatan" value="{{ $pegawai->jabatan }}" readonly>
                                            </div>
                                            @error('jabatan')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Masa Kerja</label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="masa_kerja" placeholder="Masukkan Masa Kerja" value="{{ $pegawai->masa_kerja }}" readonly>
                                            </div>
                                            @error('masa_kerja')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Unit Kerja</label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="unit_kerja" placeholder="Masukkan Unit Kerja" value="{{ $pegawai->unit_kerja }} POLITEKNIK NEGERI SUBANG" readonly>
                                            </div>
                                            @error('unit_kerja')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text"><strong>Jenis Cuti Yang Diambil **</strong></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text">Pilih Salah Satu</label>
                                            <div class="form-group d-flex align-items-center">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <label for="cuti_tahunan" class="radio-trigger mb-0 font-size-14 mr-3">
                                                            <input type="radio" id="cuti_tahunan" onclick="jenisCuti(event)" name="jenis_cuti" value="Cuti Tahunan">
                                                            <span class="checkmark"></span>
                                                            <span>1. Cuti Tahunan</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label for="cuti_besar" class="radio-trigger mb-0 font-size-14 mr-3">
                                                            <input type="radio" id="cuti_besar" onclick="jenisCuti(event)" name="jenis_cuti" value="Cuti Besar">
                                                            <span class="checkmark"></span>
                                                            <span>2. Cuti Besar</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label for="cuti_sakit" class="radio-trigger mb-0 font-size-14 mr-3">
                                                            <input type="radio" id="cuti_sakit" onclick="jenisCuti(event)" name="jenis_cuti" value="Cuti Sakit">
                                                            <span class="checkmark"></span>
                                                            <span>3. Cuti Sakit</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label for="cuti_melahirkan" class="radio-trigger mb-0 font-size-14">
                                                            <input type="radio" id="cuti_melahirkan" onclick="jenisCuti(event)" name="jenis_cuti" value="Cuti Melahirkan">
                                                            <span class="checkmark"></span>
                                                            <span>4. Cuti Melahirkan</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label for="cuti_karena_alasan_penting" class="radio-trigger mb-0 font-size-14">
                                                            <input type="radio" id="cuti_karena_alasan_penting" onclick="jenisCuti(event)" name="jenis_cuti" value="Cuti Karena Alasan Penting">
                                                            <span class="checkmark"></span>
                                                            <span>5. Cuti Karena Alasan Penting</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label for="cuti_di_luar_tanggungan_negara" class="radio-trigger mb-0 font-size-14">
                                                            <input type="radio" id="cuti_di_luar_tanggungan_negara" onclick="jenisCuti(event)" name="jenis_cuti" value="Cuti di Luar Tanggungan Negara">
                                                            <span class="checkmark"></span>
                                                            <span>6. Cuti di Luar Tanggungan Negara</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            @error('jenis_cuti')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6" id="tahun_cuti" style="display: none;">
                                        <div class="input-box">
                                            <label class="label-text">Tahun Cuti</label><br>
                                            <small>
                                                Sisa Cuti (N) Tahun Berjalan <strong>{{$pegawai->cuti_n}}</strong> hari<br>
                                                Sisa Cuti (N-1) 1 Tahun Sebelumnya <strong>{{$pegawai->cuti_n_1}}</strong> hari<br>
                                                Sisa Cuti (N-2) 2 Tahun Sebelumnya <strong>{{$pegawai->cuti_n_2}}</strong> hari<br>
                                            </small>
                                            <div class="form-group select-contain w-100">
                                                <select class="select-contain-select" id="pilih_tahun_cuti" name="tahun_cuti" onchange="pilihCuti()" required="false">
                                                    <option value="">--Pilih--</option>
                                                    <option value="(N) Tahun Berjalan">(N) Tahun Berjalan</option>
                                                    <option value="(N-1) 1 Tahun Sebelumnya">(N-1) 1 Tahun Sebelumnya</option>
                                                    <option value="(N-2) 2 Tahun Sebelumnya">(N-2) 2 Tahun Sebelumnya</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text"><strong>Alasan Cuti</strong></label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="alasan_cuti" placeholder="Masukkan Alasan Cuti" value="{{ old('alasan_cuti') }}">
                                            </div>
                                            @error('alasan_cuti')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text"><strong>Lamanya Cuti</strong></label>
                                        </div>
                                    </div>
                                </div>
                                {{-- lAMA cUTI 1 --}}
                                <div class="row" id="lama_tanggal_cuti_1">
                                    <div class="col-lg-4">
                                        <div class="input-box">
                                            <label class="label-text">Selama</label>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input class="form-control" type="number" id="lama_cuti1" name="lama_cuti[]" onchange="handleLamaCuti1()" value="{{ old('lama_cuti') }}" placeholder="Jumlah" required>
                                                    </div>
                                                    @error('lama_cuti')
                                                    <div style="margin-top: -16px">
                                                        <small class="text-danger">{{ $message }}</small>
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="jenis_waktu" value="hari" readonly>
                                                    </div>
                                                    {{-- <div class="form-group select-contain w-100">
                                                        <select class="select-contain-select" name="jenis_waktu">
                                                            <option value="hari">hari</option>
                                                            <option value="minggu">minggu</option>
                                                            <option value="bulan">bulan</option>
                                                            <option value="tahun">tahun</option>
                                                        </select>
                                                    </div> --}}
                                                    @error('jenis_waktu')
                                                    <div style="margin-top: -16px">
                                                        <small class="text-danger">{{ $message }}</small>
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Tanggal Cuti</label>
                                            <div class="form-group d-flex align-items-center">
                                                <input class="form-control pl-3" type="date" name="mulai_tanggal[]" id="mulai_tanggal1" onchange="mulaiTanggal1()" placeholder="Tanggal Mulai" required>
                                                <span class="px-2">s/d</span>
                                                <input class="form-control pl-3" type="date" name="akhir_tanggal[]" id="akhir_tanggal1" placeholder="Tanggal Akhir" readonly required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <button type="button" id="tombol_lama_tanggal_cuti_1" onclick="lamaTanggalCuti1()" class="btn btn-primary"><i class="la la-plus"></i></button>
                                    </div>
                                </div>
                                {{-- Lama Cuti 2 --}}
                                <div id="lama_tanggal_cuti_2" style="display: none;">
                                <div class="row" >
                                    <div class="col-lg-4">
                                        <div class="input-box">
                                            <label class="label-text">Selama</label>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input class="form-control" type="number" id="lama_cuti2" onchange="handleLamaCuti2()" value="{{ old('lama_cuti') }}" placeholder="Jumlah">
                                                    </div>
                                                    @error('lama_cuti')
                                                    <div style="margin-top: -16px">
                                                        <small class="text-danger">{{ $message }}</small>
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="jenis_waktu" value="hari" readonly>
                                                    </div>
                                                    {{-- <div class="form-group select-contain w-100">
                                                        <select class="select-contain-select" name="jenis_waktu">
                                                            <option value="hari">hari</option>
                                                            <option value="minggu">minggu</option>
                                                            <option value="bulan">bulan</option>
                                                            <option value="tahun">tahun</option>
                                                        </select>
                                                    </div> --}}
                                                    @error('jenis_waktu')
                                                    <div style="margin-top: -16px">
                                                        <small class="text-danger">{{ $message }}</small>
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Tanggal Cuti</label>
                                            <div class="form-group d-flex align-items-center">
                                                <input class="form-control pl-3" type="date" id="mulai_tanggal2" onchange="mulaiTanggal2()" placeholder="Tanggal Mulai">
                                                <span class="px-2">s/d</span>
                                                <input class="form-control pl-3" type="date" id="akhir_tanggal2" placeholder="Tanggal Akhir" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <button type="button" id="tombol_lama_tanggal_cuti_2" onclick="lamaTanggalCuti2()" class="btn btn-primary"><i class="la la-plus"></i></button>
                                    </div>
                                </div>
                                </div>
                                {{-- Lama Cuti 3 --}}
                                <div id="lama_tanggal_cuti_3" style="display: none;">
                                <div class="row" >
                                    <div class="col-lg-4">
                                        <div class="input-box">
                                            <label class="label-text">Selama</label>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input class="form-control" type="number" id="lama_cuti3" onchange="handleLamaCuti3()" value="{{ old('lama_cuti') }}" placeholder="Jumlah">
                                                    </div>
                                                    @error('lama_cuti')
                                                    <div style="margin-top: -16px">
                                                        <small class="text-danger">{{ $message }}</small>
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="jenis_waktu" value="hari" readonly>
                                                    </div>
                                                    {{-- <div class="form-group select-contain w-100">
                                                        <select class="select-contain-select" name="jenis_waktu">
                                                            <option value="hari">hari</option>
                                                            <option value="minggu">minggu</option>
                                                            <option value="bulan">bulan</option>
                                                            <option value="tahun">tahun</option>
                                                        </select>
                                                    </div> --}}
                                                    @error('jenis_waktu')
                                                    <div style="margin-top: -16px">
                                                        <small class="text-danger">{{ $message }}</small>
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Tanggal Cuti</label>
                                            <div class="form-group d-flex align-items-center">
                                                <input class="form-control pl-3" type="date" id="mulai_tanggal3" onchange="mulaiTanggal3()" placeholder="Tanggal Mulai">
                                                <span class="px-2">s/d</span>
                                                <input class="form-control pl-3" type="date" id="akhir_tanggal3" placeholder="Tanggal Akhir" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <button type="button" id="tombol_lama_tanggal_cuti_3" onclick="lamaTanggalCuti3()" class="btn btn-primary"><i class="la la-plus"></i></button>
                                    </div>
                                </div>
                                </div>
                                {{-- Lama Cuti 4 --}}
                                <div id="lama_tanggal_cuti_4" style="display: none;">
                                <div class="row" >
                                    <div class="col-lg-4">
                                        <div class="input-box">
                                            <label class="label-text">Selama</label>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input class="form-control" type="number" id="lama_cuti4" onchange="handleLamaCuti4()" value="{{ old('lama_cuti') }}" placeholder="Jumlah">
                                                    </div>
                                                    @error('lama_cuti')
                                                    <div style="margin-top: -16px">
                                                        <small class="text-danger">{{ $message }}</small>
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="jenis_waktu" value="hari" readonly>
                                                    </div>
                                                    {{-- <div class="form-group select-contain w-100">
                                                        <select class="select-contain-select" name="jenis_waktu">
                                                            <option value="hari">hari</option>
                                                            <option value="minggu">minggu</option>
                                                            <option value="bulan">bulan</option>
                                                            <option value="tahun">tahun</option>
                                                        </select>
                                                    </div> --}}
                                                    @error('jenis_waktu')
                                                    <div style="margin-top: -16px">
                                                        <small class="text-danger">{{ $message }}</small>
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Tanggal Cuti</label>
                                            <div class="form-group d-flex align-items-center">
                                                <input class="form-control pl-3" type="date" id="mulai_tanggal4" onchange="mulaiTanggal4()" placeholder="Tanggal Mulai">
                                                <span class="px-2">s/d</span>
                                                <input class="form-control pl-3" type="date" id="akhir_tanggal4" placeholder="Tanggal Akhir" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                {{-- <div class="row">
                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text"><strong>Catatan Cuti</strong></label>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="row">
                                    {{-- <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Tahun Cuti</label>
                                            <div class="form-group select-contain w-100">
                                                <select class="select-contain-select" name="tahun_cuti" required>
                                                    <option value="">--Pilih--</option>
                                                    <option value="(N) Tahun Berjalan">(N) Tahun Berjalan</option>
                                                    <option value="(N-1) 1 Tahun Sebelumnya">(N-1) 1 Tahun Sebelumnya</option>
                                                    <option value="(N-2) 2 Tahun Sebelumnya">(N-2) 2 Tahun Sebelumnya</option>
                                                </select>
                                            </div>
                                        </div>
                                        @error('tahun_cuti')
                                        <div style="margin-top: -16px">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                        @enderror
                                    </div> --}}
                                    {{-- <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Sisa Cuti 2 Tahun Sebelumnya (N-2)</label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="cuti_n_2" placeholder="Masukkan N-2" value="{{ $pegawai->cuti_n_2 }}" readonly>
                                            </div>
                                            @error('cuti_n_2')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Keterangan Sisa Cuti 2 Tahun Sebelumnya (N-2)</label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="keterangan_n_2" placeholder="Masukkan Keterangan N-2" value="{{ $pegawai->keterangan_n_2 }}" readonly>
                                            </div>
                                            @error('keterangan_n_2')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Sisa Cuti 1 Tahun Sebelumnya (N-1)</label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="cuti_n_1" placeholder="Masukkan N-1" value="{{ $pegawai->cuti_n_1 }}" readonly>
                                            </div>
                                            @error('cuti_n_1')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Keterangan Sisa Cuti 1 Tahun Sebelumnya (N-1)</label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="keterangan_n_1" placeholder="Masukkan Keterangan N-1" value="{{ $pegawai->keterangan_n_1 }}" readonly>
                                            </div>
                                            @error('keterangan_n_1')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Sisa Cuti Tahun Berjalan (N)</label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="cuti_n" placeholder="Masukkan N" value="{{ $pegawai->cuti_n }}" readonly>
                                            </div>
                                            @error('cuti_n')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Keterangan Sisa Cuti Tahun Berjalan (N)</label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="keterangan_n" placeholder="Masukkan Keterangan N" value="{{ $pegawai->keterangan_n }}" readonly>
                                            </div>
                                            @error('keterangan_n')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Cuti Besar</label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="cuti_besar" placeholder="Masukkan Cuti Besar" value="{{ $pegawai->cuti_besar }}" readonly>
                                            </div>
                                            @error('cuti_besar')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Cuti Sakit</label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="cuti_sakit" placeholder="Masukkan Cuti Sakit" value="{{ $pegawai->cuti_sakit }}" readonly>
                                            </div>
                                            @error('cuti_sakit')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Cuti Melahirkan</label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="cuti_melahirkan" placeholder="Masukkan Cuti Melahirkan" value="{{ $pegawai->cuti_melahirkan }}" readonly>
                                            </div>
                                            @error('cuti_melahirkan')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Cuti Karena Alasan Penting</label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="cuti_karena_alasan_penting" placeholder="Masukkan Cuti Karena Alasan Penting" value="{{ $pegawai->cuti_karena_alasan_penting }}" readonly>
                                            </div>
                                            @error('cuti_karena_alasan_penting')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Cuti Di Luar Tanggungan Negara</label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="cuti_diluar_tanggungan_negara" placeholder="Masukkan Cuti Di Luar Tanggungan Negara" value="{{ $pegawai->cuti_diluar_tanggungan_negara }}" readonly>
                                            </div>
                                            @error('cuti_diluar_tanggungan_negara')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div> --}}
                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text"><strong>Alamat Selama Menjalankan Cuti</strong></label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="alamat_selama_cuti" placeholder="Masukkan Alamat Selama Menjalankan Cuti" value="{{ old('alamat_selama_cuti') }}" required>
                                            </div>
                                            @error('alamat_selama_cuti')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-3 text-center">
                                    <a href="/pengajuan-cuti" class="theme-btn theme-btn-small theme-btn-transparent">Kembali</a>
                                    <button type="submit" class="theme-btn theme-btn-small">Simpan</button>
                                </div>
                            </form>
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

<script>
    function lamaTanggalCuti1(){
        var lamaTanggalCuti2 = document.getElementById("lama_tanggal_cuti_2")
        var lamaCuti2 = document.getElementById("lama_cuti2")
        var tanggalMulai2 = document.getElementById("mulai_tanggal2")
        var tanggalAkhir2 = document.getElementById("akhir_tanggal2")
        var tombol_lama_tanggal_cuti_1 = document.getElementById("tombol_lama_tanggal_cuti_1")

        tombol_lama_tanggal_cuti_1.style.display = "none"
        lamaTanggalCuti2.style.display = "block"
        lamaCuti2.required = "true"
        tanggalMulai2.required = "true"
        tanggalAkhir2.required = "true"
        lamaCuti2.name = "lama_cuti[]"
        tanggalMulai2.name = "mulai_tanggal[]"
        tanggalAkhir2.name = "akhir_tanggal[]"
    }
    function lamaTanggalCuti2(){
        var lamaTanggalCuti3 = document.getElementById("lama_tanggal_cuti_3")
        var lamaCuti3 = document.getElementById("lama_cuti3")
        var tanggalMulai3 = document.getElementById("mulai_tanggal3")
        var tanggalAkhir3 = document.getElementById("akhir_tanggal3")
        var tombol_lama_tanggal_cuti_2 = document.getElementById("tombol_lama_tanggal_cuti_2")

        tombol_lama_tanggal_cuti_2.style.display = "none"
        lamaTanggalCuti3.style.display = "block"
        lamaCuti3.required = "true"
        tanggalMulai3.required = "true"
        tanggalAkhir3.required = "true"
        lamaCuti3.name = "lama_cuti[]"
        tanggalMulai3.name = "mulai_tanggal[]"
        tanggalAkhir3.name = "akhir_tanggal[]"
    }
    function lamaTanggalCuti3(){
        var lamaTanggalCuti4 = document.getElementById("lama_tanggal_cuti_4")
        var lamaCuti4 = document.getElementById("lama_cuti4")
        var tanggalMulai4 = document.getElementById("mulai_tanggal4")
        var tanggalAkhir4 = document.getElementById("akhir_tanggal4")
        var tombol_lama_tanggal_cuti_3 = document.getElementById("tombol_lama_tanggal_cuti_3")

        tombol_lama_tanggal_cuti_3.style.display = "none"
        lamaTanggalCuti4.style.display = "block"
        lamaCuti4.required = "true"
        tanggalMulai4.required = "true"
        tanggalAkhir4.required = "true"
        lamaCuti4.name = "lama_cuti[]"
        tanggalMulai4.name = "mulai_tanggal[]"
        tanggalAkhir4.name = "akhir_tanggal[]"
    }
</script>

{{-- LAMA CUTI 1 --}}
<script>
    function mulaiTanggal1() {
            // Dapatkan nilai tanggal yang baru
            var tanggalMulai = document.getElementById("mulai_tanggal1").value;
            var tanggalAkhir = document.getElementById("akhir_tanggal1");
            var lamaCuti = document.getElementById("lama_cuti1");

            if(lamaCuti.value){
                jumlahLamaCuti = parseInt(lamaCuti.value) - 1 
            } else {
                jumlahLamaCuti = 0
            }

            // Tanggal awal
            var tanggalAwal = new Date(tanggalMulai);

            // Jumlah hari yang ingin ditambahkan
            var jumlahHariDitambahkan = jumlahLamaCuti; // Misalnya, ingin menambah 5 hari

            // Menambahkan tanggal dengan jumlah hari yang diinginkan
            tanggalAwal.setDate(tanggalAwal.getDate() + jumlahHariDitambahkan);

            // Tampilkan tanggal yang sudah ditambahkan
            tanggalAkhir.value = tanggalAwal.toISOString().slice(0, 10);
        }

    function handleLamaCuti1() {
            // Dapatkan nilai tanggal yang baru
            var tanggalMulaiCuti = document.getElementById("mulai_tanggal1").value;
            var tanggalAkhirCuti = document.getElementById("akhir_tanggal1");
            var lamaCuti2 = document.getElementById("lama_cuti1");

            if(tanggalMulaiCuti){
                jumlahLamaCuti2 = parseInt(lamaCuti2.value) - 1
    
                // Tanggal awal
                var tanggalAwalCuti = new Date(tanggalMulaiCuti);
    
                // Jumlah hari yang ingin ditambahkan
                var jumlahHariTambah = jumlahLamaCuti2; // Misalnya, ingin menambah 5 hari
    
                // Menambahkan tanggal dengan jumlah hari yang diinginkan
                tanggalAwalCuti.setDate(tanggalAwalCuti.getDate() + jumlahHariTambah);
    
                // Tampilkan tanggal yang sudah ditambahkan
                tanggalAkhirCuti.value = tanggalAwalCuti.toISOString().slice(0, 10);
            }

            cuti = document.getElementById("pilih_tahun_cuti").value;
            console.log(cuti)

            if(cuti === '(N) Tahun Berjalan'){
                var maksimal = <?= $pegawai->cuti_n ?>
            } else if(cuti === '(N-1) 1 Tahun Sebelumnya'){
                var maksimal = <?= $pegawai->cuti_n_1 ?>
            } else if(cuti === '(N-2) 2 Tahun Sebelumnya'){
                var maksimal = <?= $pegawai->cuti_n_2 ?>
            }

            const inputAngka2 = document.getElementById("lama_cuti2");
            inputAngka2.max = parseInt(maksimal) - parseInt(lamaCuti2.value)

            inputAngka2.addEventListener("input", function () {
                const min = 1;
                const max = parseInt(this.max);
                const value = parseInt(this.value);

                if (isNaN(value)) {
                // Jika nilai tidak valid, atur nilai ke nilai minimum
                this.value = min;
                } else if (value < min) {
                // Jika nilai kurang dari minimum, atur nilai ke nilai minimum
                this.value = min;
                } else if (value > max) {
                // Jika nilai lebih dari maksimum, atur nilai ke nilai maksimum
                this.value = max;
                }
            });
        }
</script>

// lAMA cUTI 2
<script>
    function mulaiTanggal2() {
            // Dapatkan nilai tanggal yang baru
            var tanggalMulai = document.getElementById("mulai_tanggal2").value;
            var tanggalAkhir = document.getElementById("akhir_tanggal2");
            var lamaCuti = document.getElementById("lama_cuti2");

            if(lamaCuti.value){
                jumlahLamaCuti = parseInt(lamaCuti.value) - 1 
            } else {
                jumlahLamaCuti = 0
            }

            // Tanggal awal
            var tanggalAwal = new Date(tanggalMulai);

            // Jumlah hari yang ingin ditambahkan
            var jumlahHariDitambahkan = jumlahLamaCuti; // Misalnya, ingin menambah 5 hari

            // Menambahkan tanggal dengan jumlah hari yang diinginkan
            tanggalAwal.setDate(tanggalAwal.getDate() + jumlahHariDitambahkan);

            // Tampilkan tanggal yang sudah ditambahkan
            tanggalAkhir.value = tanggalAwal.toISOString().slice(0, 10);
        }

    function handleLamaCuti2() {
            // Dapatkan nilai tanggal yang baru
            var tanggalMulaiCuti = document.getElementById("mulai_tanggal2").value;
            var tanggalAkhirCuti = document.getElementById("akhir_tanggal2");
            var lamaCuti1 = document.getElementById("lama_cuti1");
            var lamaCuti2 = document.getElementById("lama_cuti2");

            if(tanggalMulaiCuti){
                jumlahLamaCuti2 = parseInt(lamaCuti2.value) - 1
    
                // Tanggal awal
                var tanggalAwalCuti = new Date(tanggalMulaiCuti);
    
                // Jumlah hari yang ingin ditambahkan
                var jumlahHariTambah = jumlahLamaCuti2; // Misalnya, ingin menambah 5 hari
    
                // Menambahkan tanggal dengan jumlah hari yang diinginkan
                tanggalAwalCuti.setDate(tanggalAwalCuti.getDate() + jumlahHariTambah);
    
                // Tampilkan tanggal yang sudah ditambahkan
                tanggalAkhirCuti.value = tanggalAwalCuti.toISOString().slice(0, 10);
            }

            cuti = document.getElementById("pilih_tahun_cuti").value;
            console.log(cuti)

            if(cuti === '(N) Tahun Berjalan'){
                var maksimal = <?= $pegawai->cuti_n ?>
            } else if(cuti === '(N-1) 1 Tahun Sebelumnya'){
                var maksimal = <?= $pegawai->cuti_n_1 ?>
            } else if(cuti === '(N-2) 2 Tahun Sebelumnya'){
                var maksimal = <?= $pegawai->cuti_n_2 ?>
            }

            const inputAngka3 = document.getElementById("lama_cuti3");
            inputAngka3.max = parseInt(maksimal) - parseInt(lamaCuti2.value) - parseInt(lamaCuti1.value)

            inputAngka3.addEventListener("input", function () {
                const min = 1;
                const max = parseInt(this.max);
                const value = parseInt(this.value);

                if (isNaN(value)) {
                // Jika nilai tidak valid, atur nilai ke nilai minimum
                this.value = min;
                } else if (value < min) {
                // Jika nilai kurang dari minimum, atur nilai ke nilai minimum
                this.value = min;
                } else if (value > max) {
                // Jika nilai lebih dari maksimum, atur nilai ke nilai maksimum
                this.value = max;
                }
            });
        }
</script>

// lAMA cUTI 3
<script>
    function mulaiTanggal3() {
            // Dapatkan nilai tanggal yang baru
            var tanggalMulai = document.getElementById("mulai_tanggal3").value;
            var tanggalAkhir = document.getElementById("akhir_tanggal3");
            var lamaCuti = document.getElementById("lama_cuti3");

            if(lamaCuti.value){
                jumlahLamaCuti = parseInt(lamaCuti.value) - 1 
            } else {
                jumlahLamaCuti = 0
            }

            // Tanggal awal
            var tanggalAwal = new Date(tanggalMulai);

            // Jumlah hari yang ingin ditambahkan
            var jumlahHariDitambahkan = jumlahLamaCuti; // Misalnya, ingin menambah 5 hari

            // Menambahkan tanggal dengan jumlah hari yang diinginkan
            tanggalAwal.setDate(tanggalAwal.getDate() + jumlahHariDitambahkan);

            // Tampilkan tanggal yang sudah ditambahkan
            tanggalAkhir.value = tanggalAwal.toISOString().slice(0, 10);
        }

    function handleLamaCuti3() {
            // Dapatkan nilai tanggal yang baru
            var tanggalMulaiCuti = document.getElementById("mulai_tanggal3").value;
            var tanggalAkhirCuti = document.getElementById("akhir_tanggal3");
            var lamaCuti2 = document.getElementById("lama_cuti3");
            var lamaCuti1 = document.getElementById("lama_cuti1");
            var lamaCuti3 = document.getElementById("lama_cuti2");

            if(tanggalMulaiCuti){
                jumlahLamaCuti2 = parseInt(lamaCuti2.value) - 1
    
                // Tanggal awal
                var tanggalAwalCuti = new Date(tanggalMulaiCuti);
    
                // Jumlah hari yang ingin ditambahkan
                var jumlahHariTambah = jumlahLamaCuti2; // Misalnya, ingin menambah 5 hari
    
                // Menambahkan tanggal dengan jumlah hari yang diinginkan
                tanggalAwalCuti.setDate(tanggalAwalCuti.getDate() + jumlahHariTambah);
    
                // Tampilkan tanggal yang sudah ditambahkan
                tanggalAkhirCuti.value = tanggalAwalCuti.toISOString().slice(0, 10);
            }

            cuti = document.getElementById("pilih_tahun_cuti").value;
            console.log(cuti)

            if(cuti === '(N) Tahun Berjalan'){
                var maksimal = <?= $pegawai->cuti_n ?>
            } else if(cuti === '(N-1) 1 Tahun Sebelumnya'){
                var maksimal = <?= $pegawai->cuti_n_1 ?>
            } else if(cuti === '(N-2) 2 Tahun Sebelumnya'){
                var maksimal = <?= $pegawai->cuti_n_2 ?>
            }

            const inputAngka4 = document.getElementById("lama_cuti4");
            inputAngka4.max = parseInt(maksimal) - parseInt(lamaCuti2.value) - parseInt(lamaCuti1.value) - parseInt(lamaCuti3.value)

            inputAngka4.addEventListener("input", function () {
                const min = 1;
                const max = parseInt(this.max);
                const value = parseInt(this.value);

                if (isNaN(value)) {
                // Jika nilai tidak valid, atur nilai ke nilai minimum
                this.value = min;
                } else if (value < min) {
                // Jika nilai kurang dari minimum, atur nilai ke nilai minimum
                this.value = min;
                } else if (value > max) {
                // Jika nilai lebih dari maksimum, atur nilai ke nilai maksimum
                this.value = max;
                }
            });
        }
</script>

// lAMA cUTI 4
<script>
    function mulaiTanggal4() {
            // Dapatkan nilai tanggal yang baru
            var tanggalMulai = document.getElementById("mulai_tanggal4").value;
            var tanggalAkhir = document.getElementById("akhir_tanggal4");
            var lamaCuti = document.getElementById("lama_cuti4");

            if(lamaCuti.value){
                jumlahLamaCuti = parseInt(lamaCuti.value) - 1 
            } else {
                jumlahLamaCuti = 0
            }

            // Tanggal awal
            var tanggalAwal = new Date(tanggalMulai);

            // Jumlah hari yang ingin ditambahkan
            var jumlahHariDitambahkan = jumlahLamaCuti; // Misalnya, ingin menambah 5 hari

            // Menambahkan tanggal dengan jumlah hari yang diinginkan
            tanggalAwal.setDate(tanggalAwal.getDate() + jumlahHariDitambahkan);

            // Tampilkan tanggal yang sudah ditambahkan
            tanggalAkhir.value = tanggalAwal.toISOString().slice(0, 10);
        }

    function handleLamaCuti4() {
            // Dapatkan nilai tanggal yang baru
            var tanggalMulaiCuti = document.getElementById("mulai_tanggal4").value;
            var tanggalAkhirCuti = document.getElementById("akhir_tanggal4");
            var lamaCuti2 = document.getElementById("lama_cuti4");
            var lamaCuti1 = document.getElementById("lama_cuti1");
            var lamaCuti3 = document.getElementById("lama_cuti2");
            var lamaCuti4 = document.getElementById("lama_cuti4");

            if(tanggalMulaiCuti){
                jumlahLamaCuti2 = parseInt(lamaCuti2.value) - 1
    
                // Tanggal awal
                var tanggalAwalCuti = new Date(tanggalMulaiCuti);
    
                // Jumlah hari yang ingin ditambahkan
                var jumlahHariTambah = jumlahLamaCuti2; // Misalnya, ingin menambah 5 hari
    
                // Menambahkan tanggal dengan jumlah hari yang diinginkan
                tanggalAwalCuti.setDate(tanggalAwalCuti.getDate() + jumlahHariTambah);
    
                // Tampilkan tanggal yang sudah ditambahkan
                tanggalAkhirCuti.value = tanggalAwalCuti.toISOString().slice(0, 10);
            }

            cuti = document.getElementById("pilih_tahun_cuti").value;
            console.log(cuti)

            if(cuti === '(N) Tahun Berjalan'){
                var maksimal = <?= $pegawai->cuti_n ?>
            } else if(cuti === '(N-1) 1 Tahun Sebelumnya'){
                var maksimal = <?= $pegawai->cuti_n_1 ?>
            } else if(cuti === '(N-2) 2 Tahun Sebelumnya'){
                var maksimal = <?= $pegawai->cuti_n_2 ?>
            }

            const inputAngka5 = document.getElementById("lama_cuti5");
            inputAngka5.max = parseInt(maksimal) - parseInt(lamaCuti2.value) - parseInt(lamaCuti1.value) - parseInt(lamaCuti3.value) - parseInt(lamaCuti4.value)

            inputAngka5.addEventListener("input", function () {
                const min = 1;
                const max = parseInt(this.max);
                const value = parseInt(this.value);

                if (isNaN(value)) {
                // Jika nilai tidak valid, atur nilai ke nilai minimum
                this.value = min;
                } else if (value < min) {
                // Jika nilai kurang dari minimum, atur nilai ke nilai minimum
                this.value = min;
                } else if (value > max) {
                // Jika nilai lebih dari maksimum, atur nilai ke nilai maksimum
                this.value = max;
                }
            });
        }
</script>

<script>
    // Mendapatkan elemen input tanggal
    const dateInput = document.getElementById('dates');

    // Mendengarkan event 'change' pada input tanggal
    dateInput.addEventListener('change', () => {
        // Mendapatkan semua tanggal yang dipilih dalam array
        const selectedDates = Array.from(dateInput.selectedOptions, option => option.value);
        console.log(selectedDates);
    });
</script>

<script>
    function jenisCuti(event) {
        var selectedValue = event.target.value;
        var cutiTahun = document.getElementById("tahun_cuti");
        if(selectedValue === 'Cuti Tahunan'){
            cutiTahun.style.display = 'block'
            cutiTahun.required = 'true'
            
        } else {
            cutiTahun.style.display = 'none'
            cutiTahun.required = 'false'

            const inputAngka = document.getElementById("lama_cuti");
            inputAngka.max = 'false'
        }
      }

      function pilihCuti() {
            var cuti = event.target.value;

            if(cuti === '(N) Tahun Berjalan'){
                var maksimal = <?= $pegawai->cuti_n ?>
            } else if(cuti === '(N-1) 1 Tahun Sebelumnya'){
                var maksimal = <?= $pegawai->cuti_n_1 ?>
            } else if(cuti === '(N-2) 2 Tahun Sebelumnya'){
                var maksimal = <?= $pegawai->cuti_n_2 ?>
            }

            const inputAngka1 = document.getElementById("lama_cuti1");
            inputAngka1.max = maksimal

            inputAngka1.addEventListener("input", function () {
                const min = 1;
                const max = parseInt(this.max);
                const value = parseInt(this.value);

                if (isNaN(value)) {
                // Jika nilai tidak valid, atur nilai ke nilai minimum
                this.value = min;
                } else if (value < min) {
                // Jika nilai kurang dari minimum, atur nilai ke nilai minimum
                this.value = min;
                } else if (value > max) {
                // Jika nilai lebih dari maksimum, atur nilai ke nilai maksimum
                this.value = max;
                }
            });
        }
  </script>
@endsection