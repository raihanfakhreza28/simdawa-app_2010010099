<?php
defined('BASEPATH') or exit('No direct script access allowed');
class PersyaratanModel extends CI_Model
{
    private $tabel = "persyaratan";

    public function get_persyaratan()
    {
        return $this->db->get($this->tabel)->result();
        //baris 9 ini tujuannya untuk mengambil data dari tabel persyaratan. selain dengan fungsi get,
        //kita juga bisa menggunakan $this->db—>query('select * from persyaratan')->result();
    }

    public function insert_persyaratan()
    {
        $data = [
            'nama_persyaratan' => $this->input->post('nama_persyaratan'),
            'keterangan' => $this->input->post('keterangan')
        ];
        //nama_persyaratan sebelah kiri, sesuaikan dengan nama kolom di tabel
        //nama_persyaratan sebelah kanan, sesuaikan dengan name di form yaitu (persyaratan_create.php baris 29)
        $this->db->insert($this->tabel, $data);
    }

    //function dengan 1 parameter. $id nilainya dikirimkan oleh controller
    public function get_persyaratan_byid($id)
    {
        return $this->db->get_where($this->tabel, ['id' => $id])->row();
        /*
        get_where hampir sama seperti get, bedanya ada tambahan klause where untuk menampilkan data berdasarkan kriteria tertentu. 'id'=>$id artinya data yang diambil adalah data persyaratan_beasiswa dengan nilai id = $id. row() digunakan untuk mengambil satu baris data, beda dengan result() yang mengambil semua data
        */
    }

    public function update_persyaratan()
    {
        $data = [
            'nama_persyaratan' => $this->input->post('nama_persyaratan'),
            'keterangan' => $this->input->post('keterangan')
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update($this->tabel, $data);
        /* proses update hampir sama seperti insert, bedanya, ada tambahan where (baris 39) untuk menentukan data mana yang akan diperbaharui */
    }

    public function delete_persyaratan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->tabel);
        //sebelum dilakukan hapus, tambahkan where dulu untuk menentukan data mana yang dihapus
        //untuk proses hapus gunakan fungsi delete(namatabel)
    }
}
