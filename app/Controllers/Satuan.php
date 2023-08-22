<?php

namespace App\Controllers;
use App\Models\ModelSatuan;


class Satuan extends BaseController
{
    public function __construct()
    {
        $this->ModelSatuan = new ModelSatuan();
    }
    public function index(): string
    {
        $data = [
            'judul' => 'Data Barang',
            'subjudul' => 'Satuan',
            'menu' => 'databarang',
            'submenu' => 'satuan',
            'page' => 'satuan/satuan',
            'satuan' => $this->ModelSatuan->AllData(),
        ];
        return view('template/template',$data);
    }
    public function Create()
    {
        $data = ['nama_satuan' => $this->request->getPost('nama_satuan')];
        $this->ModelSatuan->Create($data);
        session()->setFlashdata('pesan', 'Data Berhasil di Tambahkan !!');
        return redirect()->to(('Satuan'));
    }

    public function UpdateData($id_satuan)
    {
        $data = [
            'id_satuan' => $id_satuan,
            'nama_satuan' => $this->request->getPost('nama_satuan')
        ];
        $this->ModelSatuan->UpdateData($data);
        session()->setFlashdata('pesan', 'Data Berhasil di Ubah !!');
        return redirect()->to(('Satuan'));
    }

    public function DeleteData($id_satuan)
    {
        $data = [
            'id_satuan' => $id_satuan,
        ];
        $this->ModelSatuan->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil di Hapus !!');
        return redirect()->to(('Satuan'));
    }
}
