<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ProdiModel extends CI_Model
{
    private $tabel = "prodi";

    public function get_prodi()
    {
        return $this->db->get($this->tabel)->result();
        //baris 9 ini tujuannya untuk mengambil data dari tabel prodi. selain dengan fungsi get,
        //kita juga bisa menggunakan $this->db—>query('select * from prodi')->result();
    }

    public function insert_prodi()
    {
        $data = [
            'nama_prodi' => $this->input->post('nama_prodi')
        ];
        //nama_prodi sebelah kiri, sesuaikan dengan nama kolom di tabel
        //nama_prodi sebelah kanan, sesuaikan dengan name di form yaitu (prodi_create.php baris 29)
        $this->db->insert($this->tabel, $data);
    }

    //function dengan 1 parameter. $id nilainya dikirimkan oleh controller
    public function get_prodi_byid($id)
    {
        return $this->db->get_where($this->tabel, ['id' => $id])->row();
        /*
        get_where hampir sama seperti get, bedanya ada tambahan klause where untuk menampilkan data berdasarkan kriteria tertentu. 'id'=>$id artinya data yang diambil adalah data prodi_beasiswa dengan nilai id = $id. row() digunakan untuk mengambil satu baris data, beda dengan result() yang mengambil semua data
        */
    }

    public function update_prodi()
    {
        $data = [
            'nama_prodi' => $this->input->post('nama_prodi')
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update($this->tabel, $data);
        /* proses update hampir sama seperti insert, bedanya, ada tambahan where (baris 39) untuk menentukan data mana yang akan diperbaharui */
    }

    public function delete_prodi($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->tabel);
        //sebelum dilakukan hapus, tambahkan where dulu untuk menentukan data mana yang dihapus
        //untuk proses hapus gunakan fungsi delete(namatabel)
    }
}
