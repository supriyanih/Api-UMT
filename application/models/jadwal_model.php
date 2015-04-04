<?php

class Jadwal_model extends CI_Model {

    function Jadwal_model() {
        parent::__construct();
    }

    protected $tblname = 'jadwal';

    function get_al() {
        return $this->db->get($this->tblname)->result_array();
    }

    function get_all() {
        $this->db->select('*');
        $this->db->from('jadwal');
        $this->db->join('staff', 'staff_id = jadwal.dosen');
        $this->db->join('matkul', 'id_matkul = jadwal.matkul');
        $query = $this->db->get();
        return $query->result_array();
    }

    function insert($data) {
        return $this->db->insert($this->tblname, $data);
    }

    function delete($id) {
        return $this->db->delete($this->tblname, array('id_jadwal' => $id));
    }

    function getbyid($id) {
        return $this->db->get_where($this->tblname, array('id_jadwal' => $id))->result_array();
    }

    function count() {

        return $this->db->count_all($this->tblname);
    }

    function krs($id) {
        $this->db->select('*');
        $this->db->from('nilai');
        $this->db->join('jadwal', 'id_jadwal = nilai.jadwal');
        $this->db->where('nilai.mhs',$id);
        $this->db->where('jadwal.status','1');
        $query = $this->db->get();
        return $query->result_array();
        
        
    }

    function getby($data) {

        $this->db->select('*');
        $this->db->from('jadwal');
        $this->db->join('staff', 'staff_id = jadwal.dosen');
        $this->db->join('matkul', 'id_matkul = jadwal.matkul');
        //$this->db->join('nilai','jadwal = jadwal.id_jadwal');
        $this->db->where('matkul.matkul_prodi', $data->prodi);
        $this->db->where('matkul.matkul_smtr', $data->semester);
        //$this->db->where('nilai.mhs <>',$data->mhsid);
        $this->db->where('jadwal.kelas', $data->kls_mhs);
        $this->db->where('jadwal.status', '1');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function daftar($data) {
        $status = $this->check($data);
        if ($status == false) {
            return false;
        } else {
            $mhs = array(
                'jadwal' => $data->id_jadwal,
                'mhs' => $data->mhsid,
                'status_nilai' => 1
            );
            return $this->db->insert('nilai', $mhs);
        }
    }

    public function check($data) {
        $jadwal = $data->id_jadwal;
        $mhs = $data->mhsid;

        $this->db->select('*');
        $this->db->from('nilai');
        $this->db->where('jadwal', $jadwal);
        $this->db->where('mhs', $mhs);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return false;
        } else {
            return true;
        }
    }

    function update($data) {
        $jadwal = array(
            'kd_jadwal' => $data->kd_jadwal,
            'dosen' => $data->dosen,
            'matkul' => $data->matkul,
            'kelas' => $data->kelas,
            'hari' => $data->hari,
            'mulai' => $data->mulai,
            'selesai' => $data->selesai,
            'ruang' => $data->ruang,
            'thn_akademik' => $data->thn_akademik,
            'smtr_tmp' => $data->smtr_tmp,
            'mak_siswa' => $data->mak_siswa
        );
        $this->db->where('id_jadwal', $data->id_jadwal);

        return $this->db->update($this->tblname, $jadwal);
    }

}
