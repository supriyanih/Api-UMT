<?php

class Jadwaldosen_model extends CI_Model {

    function Jadwaldosen_model() {
        parent::__construct();
    }

    protected $tblname = 'jadwal';

    function get_al() {
        return $this->db->get($this->tblname)->result_array();
    }

    function get_all($data) {
        $this->db->select('*');
        $this->db->from('jadwal');
        $this->db->join('staff','staff_id = jadwal.dosen');
        $this->db->join('matkul','id_matkul = jadwal.matkul');
        $this->db->where('dosen',$data);
        $this->db->where('status','1');
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
