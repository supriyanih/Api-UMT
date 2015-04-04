<?php

class Matkul_model extends CI_Model {

    function Matkul_model()
    {
        parent::__construct();
    }
    protected $tblname = 'matkul';
    function get_all()
    {
        return $this->db->get($this->tblname)->result_array();
    }

    function insert($data){
      return $this->db->insert($this->tblname, $data);
    }
    function delete($id){
        return $this->db->delete($this->tblname, array('id_matkul' => $id));
    }
    function getbyid($id){
        return $this->db->get_where($this->tblname , array('id_matkul' => $id))->result_array();
    }
    
    function count(){
       
        return $this->db->count_all($this->tblname);
    }
    function update($data){
        $matkul = array(
             'kd_matkul' => $data->kd_matkul,
            'nm_matkul' => $data->nm_matkul,
            'matkul_prodi' => $data->matkul_prodi,
            'matkul_smtr' => $data->matkul_smtr,
            'sks'=>$data->sks
        );
        $this->db->where('id_matkul',$data->id_matkul);
        
        return $this->db->update($this->tblname,$matkul);
        
    }
}