<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_uas extends CI_Model
{
    private $_table = "susulan_uas";

    public $nama_mahasiswa;
    public $npm;
    public $program_studi;
    public $kelas;
    public $no_tlp;
    public $matkul;
    public $tahun_ajaran;
    public $semester;
    public $dosen;
    public $tanggal_uas;
    public $pukul;
    public $verivikasi;

    public function Getall()
    {
        // return $this->db->get('susulan_uts');
        return $this->db->get('susulan_uas')->result();
    }
    public function Get($id = '')
    {
        $this->db->where('id', $id);
        return $this->db->get('susulan_uas')->row_array();
    }

    public function getById($npm)
    {
        return $this->db->get_where($this->_table, ["npm" => $npm])->row();
    }

    public function save()
    {
        $data = [
            'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
            'npm' => $this->input->post('npm'),
            'program_studi' => $this->input->post('program_studi'),
            'tahun_ajaran' => $this->input->post('tahun_ajaran'),
            'kelas' => $this->input->post('kelas'),
            'no_tlp' => $this->input->post('no_tlp'),
            'semester' => $this->input->post('semester'),
            'tanggal_uas' => $this->input->post('tanggal_uas'),
            'pukul' => $this->input->post('pukul'),
            'verivikasi' => $this->input->post('verivikasi'),
            'createdAt' => date("Y-m-d")
        ];
        $inputan = $this->db->insert($this->_table, $data);
        return $inputan;
    }
    public function getwhere($field, $where, $table)
    {
        $this->db->where($field, $where);
        $query = $this->db->get($table);
        return $query;
    }

    public function update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("npm" => $id));
    }
}
