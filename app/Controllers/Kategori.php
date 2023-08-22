<?php

namespace App\Controllers;
use App\Models\ModelKategori;


class Kategori extends BaseController
{
    public function __construct()
    {
        $this->ModelKategori = new ModelKategori();
    }
    public function index(): string
    {
        $data = [
            'judul' => 'Data Barang',
            'subjudul' => 'Kategori',
            'menu' => 'databarang',
            'submenu' => 'kategori',
            'page' => 'kategori/kategori',
            'kategori' => $this->ModelKategori->AllData(),
        ];
        return view('template/template',$data);
    }
    public function Create()
    {
        $data = ['nama_kategori' => $this->request->getPost('nama_kategori')];
        $this->ModelKategori->Create($data);
        session()->setFlashdata('pesan', 'Data Berhasil di Tambahkan !!');
        return redirect()->to(('Kategori'));
    }

    public function UpdateData($id_kategori)
    {
        $data = [
            'id_kategori' => $id_kategori,
            'nama_kategori' => $this->request->getPost('nama_kategori')
        ];
        $this->ModelKategori->UpdateData($data);
        session()->setFlashdata('pesan', 'Data Berhasil di Ubah !!');
        return redirect()->to(('Kategori'));
    }

    public function DeleteData($id_kategori)
    {
        $data = [
            'id_kategori' => $id_kategori,
        ];
        $this->ModelKategori->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil di Hapus !!');
        return redirect()->to(('Kategori'));
    }
}
