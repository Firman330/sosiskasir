<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelProduk extends Model
{
    public function AllData()
    {
        return $this->db->table('produk')
            ->join('kategori', 'kategori.id_kategori=produk.id_kategori', 'left')
            ->join('satuan', 'satuan.id_satuan=produk.id_satuan', 'left')
            ->orderBy('kategori.id_kategori', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function Create($data)
    {
        $this->db->table('produk')->insert($data);
    }

    public function UpdateData($data)
    {
        $this->db->table('produk')
            ->where('id_produk', $data['id_produk'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('produk')
            ->where('id_produk', $data['id_produk'])
            ->delete($data);
    }
}
