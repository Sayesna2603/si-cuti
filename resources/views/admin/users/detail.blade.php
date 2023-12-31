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
                            <form action="/edit-user/{{$detail->id_user}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Nama Lengkap</label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="nama" placeholder="Masukkan Nama Lengkap" value="{{ $detail->nama }}" disabled>
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
                                            <label class="label-text">No. Telepon</label>
                                            <div class="form-group">
                                                <input class="form-control" type="number" name="nomor_telepon" placeholder="Masukkan Nomor Telepon" value="{{ $detail->nomor_telepon }}" disabled>
                                            </div>
                                            @error('nomor_telepon')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Email</label>
                                            <div class="form-group">
                                                <input class="form-control" type="email" name="email" placeholder="Masukkan Email" value="{{ $detail->email }}" disabled>
                                            </div>
                                            @error('email')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>          
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Foto</label>
                                            <div class="form-group">
                                                <img src="@if($detail->foto){{ asset('foto_user/'.$detail->foto) }} @else {{ asset('foto_user/default1.jpg') }} @endif" class="user-pro-img" style="width: 8rem;" alt="Foto User"> 
                                            </div>
                                        </div>          
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Role</label>
                                            <div class="form-group select-contain w-100">
                                                <select class="select-contain-select" name="role" disabled>
                                                    <option value="{{$detail->role}}">{{$detail->role}}</option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="Wakil Direktur">Wakil Direktur</option>
                                                    <option value="Ketua Jurusan">Ketua Jurusan</option>
                                                    <option value="Pegawai">Pegawai</option>
                                                </select>
                                            </div>
                                            @error('role')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    @if ($detail->role === 'Ketua Jurusan')
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Jususan</label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="jurusan" value="{{$detail->jurusan}}" readonly>
                                            </div>
                                            @error('jurusan')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>          
                                    </div>
                                    @endif
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
@endsection