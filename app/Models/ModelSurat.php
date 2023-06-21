<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelSurat extends Model
{
    use HasFactory;
    public $table = 'surat';

    public function getData()
    {
        return DB::table($this->table)
            // ->join('pegawai', 'pegawai.id_pegawai', '=', 'surat.id_pegawai', 'left')
            // ->join('users', 'users.id_user', '=', 'pegawai.id_user', 'left')
            ->orderBy('id_surat', 'ASC')->get();
    }

    // public function getDataSurat()
    // {
    //     return DB::table('de')
    //         ->join('pegawai', 'pegawai.id_pegawai', '=', 'surat.id_pegawai', 'left')
    //         ->join('users', 'users.id_user', '=', 'pegawai.id_user', 'left')
    //         ->orderBy('id_surat', 'ASC')->get();
    // }

    public function getDataPegawai()
    {
        return DB::table('detail_surat')
            ->join('surat', 'surat.id_surat', '=', 'detail_surat.id_surat', 'left')
            ->join('pegawai', 'pegawai.id_pegawai', '=', 'detail_surat.id_pegawai', 'left')
            ->join('users', 'users.id_user', '=', 'pegawai.id_user', 'left')
            ->orderBy('id_detail_surat', 'ASC')->get();
    }

    public function getDataByDate($tanggal_mulai, $tanggal_akhir)
    {
        return DB::table($this->table)
            // ->join('pegawai', 'pegawai.id_pegawai', '=', 'surat.id_pegawai', 'left')
            // ->join('users', 'users.id_user', '=', 'pegawai.id_user', 'left')
            ->whereBetween('tanggal_upload', [$tanggal_mulai, $tanggal_akhir])
            ->orderBy('id_surat', 'ASC')->get();
    }

    public function detail($id_surat)
    {
        return DB::table($this->table)
            // ->join('pegawai', 'pegawai.id_pegawai', '=', 'surat.id_pegawai', 'left')
            // ->join('users', 'users.id_user', '=', 'pegawai.id_user', 'left')
            ->where('id_surat', $id_surat)->first();
    }

    public function add($data)
    {
        DB::table($this->table)->insert($data);
    }

    public function addPegawai($data)
    {
        DB::table('detail_surat')->insert($data);
    }

    public function edit($data)
    {
        DB::table($this->table)->where('id_surat', $data['id_surat'])->update($data);
    }

    public function deleteData($id_surat)
    {
        DB::table($this->table)->where('id_surat', $id_surat)->delete();
    }

    public function deletePegawai($id_surat)
    {
        DB::table('detail_surat')->where('id_surat', $id_surat)->delete();
    }

    public function lastData()
    {
        return DB::table($this->table)->orderBy('id_surat', 'DESC')->limit(1)->first();
    }
}
