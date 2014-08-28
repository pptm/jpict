<?php

class Login_model extends CI_Model{

	function __construct(){
	
	parent::__construct();

	}


	public function validate(){

	$username = $this->security->xss_clean($this->input->post('email'));
	$password = sha1($this->security->xss_clean($this->input->post('katalaluan')));

	//$username = $this->input->post('email');
	//$password = sha1($this->input->post('katalaluan'));

	$this->db->where('email', $username);
	$this->db->where('katalaluan',$password);

	$query = $this->db->get('pengguna');

	
		if($query->num_rows() == 1)
		
		{

		$getkey = "testsahaja";
		
		
		$row = $query->row();

		$data = array(
		'Nama' => $row->Nama,
		'bahagian' => $row->bahagian,
		'email' => $row->email,
		'id' => $row->id,
		'vkey' => sha1($getkey),
		'rip' => $_SERVER['REMOTE_ADDR'],
		'sagent' => $_SERVER['HTTP_USER_AGENT'],
		'validated' => true
		);

		//session_start();
		$this->session->set_userdata('logmasuk',$data);
		session_regenerate_id(true); 

		return true;
		
		}
	
	return false;
	
	}

	public function semakkemasukan(){

		//$logins = $this->session->all_userdata('logmasuk');

	
		if($this->session->userdata('logmasuk')){

			return 1;

		}else {
			return 0;
		}

	}
	public function peranan($id){

		$rekod = $this->session->userdata('logmasuk');
		$username = element('email', $rekod);

		$this->db->where('email', $username);

		$query = $this->db->get('pengguna');
		$row = $query->row();

		return $row->peranan;

	}

	public function keluar(){

		$this->session->unset_userdata('logmasuk');
   		//session_destroy();


	}

}

?>