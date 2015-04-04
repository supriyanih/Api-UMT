<?php

class Dosen_model extends CI_Model {

    function Dosen_model() {
        parent::__construct();
    }

    protected $tblname = 'user';

    function get_all() {

        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('staff', 'staff.nik = user.nomor_id');
        $this->db->where('level', 'dosen');
        $query = $this->db->get();
        return $query->result_array();
    }

    function insertStaff($data) {
        return $this->db->insert('staff',$data);
    }

    function insert($data) {
        return $this->db->insert($this->tblname,$data);
    }

    function delete($id) {
        return $this->db->delete($this->tblname, array('userid' => $id));
    }

    function getbyid($id) {
        return $this->db->get_where($this->tblname, array('userid' => $id))->result_array();
    }

    function count() {
        $this->db->where('level', 'dosen');
        $this->db->from($this->tblname);
        return $this->db->count_all();
    }

    function update($data) {
        $dosen = array(
            'nik' => $data->nik,
            'nama' => $data->nama,
            'alamat' => $data->alamat,
            'telpon' => $data->telpon,
            'email' => $data->email,
            'foto' => $data->foto
        );
        $this->db->where('staff_id', $data->staff_id);

        return $this->db->update('staff', $dosen);
    }

}
