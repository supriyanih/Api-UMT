<?php

class User_model extends CI_Model {

	var $table = 'user';

    function User_model(){
		parent::__construct();
	}

	function changepassword($data){

        return  $this->db->query("update ".$this->table." set password = '".$data->password."' where userid =".$data->userid);

    }
    function get_all(){
        $this->db->select('*');
            $this->db->from('user');
            $this->db->join('staff','staff.nik = user.nomor_id');
            $query = $this->db->get();
            return $query->result_array();
    }
    function insert($data){
        return $this->db->insert($this->table, $data);
    }
    function updateisactive($data){
        return  $this->db->query("update ".$this->table." set isactive = '".$data->isactive."' where userid =".$data->userid);
    }
     function count(){
        return $this->db->count_all($this->tblname);
    }
}
