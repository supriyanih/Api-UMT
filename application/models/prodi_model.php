<?php

class Prodi_model extends CI_Model {

    function Prodi_model()
    {
        parent::__construct();
    }
    protected $tblname = 'prodi';
    function get_all()
    {
        return $this->db->get($this->tblname)->result_array();
    }

    function insert($data){
      return $this->db->insert($this->tblname, $data);
    }
    function delete($id){
        return $this->db->delete($this->tblname, array('id_prodi' => $id));
    }
    function getbyid($id){
        return $this->db->get_where($this->tblname , array('id_prodi' => $id))->result_array();
    }
    
    function count(){
       
        return $this->db->count_all($this->tblname);
    }
    function update($data){
        $prodi = array(   
            'kd_prodi' => $data->kd_prodi,
            'nm_prodi' => $data->nm_prodi,
            'deskripsi'=> $data->deskripsi
        );
        $this->db->where('id_prodi',$data->id_prodi);
        
        return $this->db->update($this->tblname,$prodi);
        
    }
}