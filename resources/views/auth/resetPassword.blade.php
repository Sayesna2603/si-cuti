@extends('layoutAuth.main')

@section('content')
<section class="info-area padding-top-50px padding-bottom-70px">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 responsive-column">
                <div class="card box-shadow" style="box-shadow: 3px 3px 3px #e8e7e7;">
                    <div class="card-header">
                        <div>
                            <h5 class="modal-title title" id="exampleModalLongTitle">Reset Password</h5>
                            <p class="font-size-14">Hallo {{$user->nama}}, silahkan ubah dengan password baru!</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="contact-form-action">
                            <form action="/reset-password/{{$user->id_user}}" method="POST">
                                @csrf
                                <div class="row">
                                    @if (session('berhasil'))
                                        <div class="col-lg-12">
                                            <div class="alert bg-primary text-white alert-dismissible">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                <h4><i class="icon fa fa-ban"></i> Berhasil!</h4>
                                                {{ session('berhasil') }}
                                            </div>
                                        </div>
                                    @endif
                                    @if (session('gagal'))
                                        <div class="col-lg-12">
                                            <div class="alert bg-danger text-white alert-dismissible">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                <h4><i class="icon fa fa-ban"></i> Gagal!</h4>
                                                {{ session('gagal') }}
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text">Password Baru</label>
                                            <div class="form-group">
                                                <span class="la la-envelope form-icon"></span>
                                                <input class="form-control" type="password" name="password" placeholder="Masukkan Password Baru" autofocus>
                                            </div>
                                            @error('password')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>          
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text">Konfirmasi Password</label>
                                            <div class="form-group">
                                                <span class="la la-envelope form-icon"></span>
                                                <input class="form-control" type="password" name="password_confirmation" placeholder="Masukkan Konfirmasi Password">
                                            </div>
                                            @error('password_confirmation')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>          
                                    </div>
                                </div>
                                <div class="btn-box pt-3 pb-4">
                                    <center>
                                        <button type="submit" class="theme-btn w-50">Simpan</button>
                                    </center>
                                </div>
                            </form>
                        </div><!-- end contact-form-action -->
                    </div>
                </div>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</section>
@endsection
