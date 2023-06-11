<?php

class BeasiswaModel extends CI_Model
{
    private $tabel = "beasiswa";
    public function get_beasiswa()
    {
        $q = "SELECT beasiswa.*, jenis_beasiswa.nama_jenis, jenis_beasiswa.keterangan FROM beasiswa
INNER JOIN jenis_beasiswa ON beasiswa.jenis_id = jenis_beasiswa.id";
        return $this->db->query($q)->result();
        //join versi CI
        //$this->db->select("beasiswa.', jenis_beasiswa.nama_jenis, jenisubeasiswa.keterangan");
        //$this—>db->from("beasiswa");
        //$this->db->join("jenis_beasiswa", "beasiswa.jenis_id = jenis_beasiswa.id", "inner");
        //return Sthis->db-)get()->result();
    }
    public function insert_beasiswa()
    {
        $data = [
            'nama_beasiswa' => $this->input->post('nama_beasiswa'),
            'tanggal_mulai' => $this->input->post('tanggal_mulai'),
            'tanggal_selesai' => $this->input->post('tanggal_selesai'),
            'jenis_id' => $this->input->post('jenis_id')
        ];
        //nama_bea5i5wa sebalah kiri, sesuaikan dengan nama kolom di tabel
        //nama_beasiswa sebelah kanan, sesuaikan dengan name di form yaitu (beasiswa‘create.php baris 29)
        $this->db->insert($this->tabel, $data);
    }
    //function dengan 1 parameter. Sid nilainya dikirimkan oleh controller
    public function get_beasiswa_byid($id)
    {
        return $this->db->get_where($this->tabel, ['id' => $id])->row();
        //select * from beasiswa_beasiswa where id = 1
        /*
get_where hampir sama seperti get, bedanya ada tambahan klause where
untuk menampilkan data berdasarkan kriteria tertentu. 'id‘=>$id artinya
data yang diambil adalah data beasiswa_beasiswa dengan nilai id - Sid.
rou() digunakan untuk mengambil satu baris data, beda dengan result() yang mengambil semua data
*/
    }

    public function update_beasiswa()
    {
        $data = [
            'nama_beasiswa' => $this->input->post('nama_beasiswa'),
            'tanggal_mulai' => $this->input->post('tanggal_mulai'),
            'tanggal_selesai' => $this->input->post('tanggal_selesai'),
            'jenis_id' => $this->input->post('jenis_id')
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update($this->tabel, $data);
        /* proses update hanpir sama seperti insert, bedanya, ada tambahan where (baris 39)
untuk menentukan data mana yang akan diperbaharui */
    }
    public function delete_beasiswa($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->tabel);
        //sebelum dilakukan hapus, tamhahkan where dulu untuk menentukan data nana yang dihapus
        //untuk proses hapus gunakan fungsi delete(namatabel)
    }
}
