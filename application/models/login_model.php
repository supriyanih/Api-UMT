<?php

class Login_model extends CI_Model {

	 var $table = 'user';
	function Login_model()
	{
		parent::__construct();
	}
	

	
        function cek_user($username, $password){
            
            $this->db->select('*');
            $this->db->from('user');
            $this->db->join('staff','staff.nik = user.nomor_id');
            $this->db->where('username',$username);
            $this->db->where('password',$password);
            $this->db->where('isactive','1');
            $query = $this->db->get();
            return $query->result_array();
            
        }
        
        function cek_mhs($username, $password){
           $this->db->select('*');
            $this->db->from('mhs');
           
            $this->db->where('username_mhs',$username);
            $this->db->where('password_mhs',$password);
            $this->db->where('isactive','1');
            $query = $this->db->get();
            return $query->result_array(); 
        }

}
