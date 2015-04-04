<?php

class Mhs_model extends CI_Model {

    function Mhs_model()
    {
        parent::__construct();
    }
    protected $tblname = 'mhs';
    function get_all()
    {
        return $this->db->get($this->tblname)->result_array();
    }

    function insert($data){
        $mhs = array(
            'nim' => $data->nim,
            'nama' => $data->nama,
            'username_mhs' => $data->nim,
            'password_mhs' => $data->nim,
            'tmpt_lahir' =>$data->tmpt_lahir,
            'tgl_lahir' =>$data->tgl_lahir,
            'jenkel' =>$data->jenkel,
            'prodi' =>$data->prodi,
            'kls_mhs' =>$data->kls_mhs,
            'alamat' =>$data->alamat,
            'telpon' =>$data->telpon,
            'email' =>$data->email,
            
            'isactive'=>'1'
        );
      return $this->db->insert($this->tblname, $mhs);
    }
    function delete($id){
        return $this->db->delete($this->tblname, array('mhsid' => $id));
    }
    function getbyid($id){
        return $this->db->get_where($this->tblname , array('mhsid' => $id))->result_array();
    }
    function update($data){
        $mhs = array(
            'nim' => $data->nim,
            'nama' => $data->nama,
            'tmpt_lahir' =>$data->tmpt_lahir,
            'tgl_lahir' =>$data->tgl_lahir,
            'jenkel' =>$data->jenkel,
            'prodi' =>$data->prodi,
            'kls_mhs' =>$data->kls_mhs,
            'alamat' =>$data->alamat,
            'telpon' =>$data->telpon,
            'email' =>$data->email
                );
        $this->db->where('mhsid', $data->mhsid);
        return $this->db->update('mhs', $mhs);
       }
    function count(){
        return $this->db->count_all($this->tblname);
    }
}