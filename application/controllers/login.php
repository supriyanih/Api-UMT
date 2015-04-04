<?php 
//header('Access-Control-Allow-Origin: *');


class Login extends CI_Controller {


 
	function Login()
	{
		parent::__construct();
		$this->load->model('Login_model', '', TRUE);
	}
	 function index(){
         $data    = json_decode(file_get_contents("php://input"));
         $cekdata = $this->Login_model->cek_user($data->username, $data->password);

         echo json_encode($cekdata);
	 }
         
         function loginmhs(){
             $data = json_decode(file_get_contents("php://input"));
             $cekdata = $this->Login_model->cek_mhs($data->username, $data->password);
              echo json_encode($cekdata);
         }

}
