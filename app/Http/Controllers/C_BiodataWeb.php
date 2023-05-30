<?php

namespace App\Http\Controllers;

use App\Models\ModelBiodataWeb;
use App\Models\ModelUser;

class C_BiodataWeb extends Controller
{

    private $ModelBiodataWeb;
    private $ModelUser;

    public function __construct()
    {
        $this->ModelBiodataWeb = new ModelBiodataWeb();
        $this->ModelUser = new ModelUser();
    }

    public function index()
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $data = [
            'title'     => '',
            'subTitle'  => 'Biodata Website',
            'user'      => $this->ModelUser->detail(Session()->get('id_user')),
            'biodata'   => $this->ModelBiodataWeb->detail(1)
        ];

        return view('admin.biodataWeb.data', $data);
    }

    public function prosesEdit($id_biodata_web)
    {
        Request()->validate([
            'nama_website'       => 'required',
            'email'              => 'required|email',
            'alamat'             => 'required',
            'nomor_telepon'      => 'required',
            'logo'               => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'nama_website.required'   => 'Nama website harus diisi!',
            'email.required'          => 'Email harus diisi!',
            'email.email'             => 'Format email harus sesuai!',
            'alamat.required'         => 'Alamat harus diisi!',
            'nomor_telepon.required'  => 'Nomor telepon harus diisi!',
            'logo.mimes'              => 'Format logo harus jpg/jpeg/png/bmp!',
            'logo.max'                => 'Ukuran logo maksimal 5 mb',
        ]);

        if (Request()->logo <> "") {
            $biodata = $this->ModelBiodataWeb->detail($id_biodata_web);
            if ($biodata->logo <> "") {
                unlink(public_path('foto_biodata') . '/' . $biodata->logo);
            }

            $file = Request()->logo;
            $fileName = date('mdYHis') . Request()->id_biodata_web . '.' . $file->extension();
            $file->move(public_path('foto_biodata'), $fileName);

            $data = [
                'id_biodata_web'    => $id_biodata_web,
                'nama_website'      => Request()->nama_website,
                'email'             => Request()->email,
                'alamat'            => Request()->alamat,
                'nomor_telepon'     => Request()->nomor_telepon,
                'logo'              => $fileName,
            ];
        } else {
            $data = [
                'id_biodata_web'    => $id_biodata_web,
                'nama_website'      => Request()->nama_website,
                'email'             => Request()->email,
                'alamat'            => Request()->alamat,
                'nomor_telepon'     => Request()->nomor_telepon,
                // 'power_harga'       => Request()->power_harga,
            ];
        }

        $this->ModelBiodataWeb->edit($data);
        return redirect()->route('biodata-web')->with('berhasil', 'Data Berhasil Diedit !');
    }
}
