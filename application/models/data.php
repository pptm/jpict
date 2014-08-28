<?php

class Data extends CI_Model{

	function __construct(){
	
		parent::__construct();

	
	}
	public function tetapan(){
		
		
		$query = $this->db->get('tetapan');
        	$result = $query->row();
        	
		return $result;
		

	}
	public function get_sistem_name()
	{
		//$this->db->where('Nama',$cari);
        $query = $this->db->query('SELECT Nama_laman FROM tetapan');
        $result = $query->result();

        return $result[0]->Nama_laman;
		
	}
	public function get_tarikhakhir()
	{
		//$this->db->where('Nama',$cari);
        $query = $this->db->query('SELECT tarikhakhir FROM tetapan');
        $result = $query->result();

        return $result[0]->tarikhakhir;
		
	}
	public function get_sistem_dis()
	{
		//$this->db->where('Nama',$cari);
        $query = $this->db->query('SELECT keterangan FROM tetapan');
        $result = $query->result();

        return $result[0]->keterangan;
		
	}
	public function get_sistem_pejabat()
	{
		//$this->db->where('Nama',$cari);
        $query = $this->db->query('SELECT jabatan FROM tetapan');
        $result = $query->result();

        return $result[0]->jabatan;
		
	}
	public function get_sistem_logo()
	{
		//$this->db->where('Nama',$cari);
        $query = $this->db->query('SELECT logo FROM tetapan');
        $result = $query->result();

        return $result[0]->logo;
		
	}
	public function get_sistem_footer()
	{
		//$this->db->where('Nama',$cari);
        $query = $this->db->query('SELECT footer_nama FROM tetapan');
        $result = $query->result();

        return $result[0]->footer_nama;
		
	}
	public function profile($id){
		
		$this->db->where('email',$id);
		$query = $this->db->get('pengguna');
        	$result = $query->row();
        	
		return $result;
		

	}
	
	public function cawangan($lavel){
		
		$this->db->where('lavel',$lavel);
		$query = $this->db->get('cawangan');
        	$result = $query->result();
        	
		return $result;
		

	}
	public function bahagian($cawangan,$lavel){
		
		$this->db->where('lavel',$lavel);
		$this->db->where('parent',$cawangan);
		$query = $this->db->get('cawangan');
        	$result = $query->result();
        	
		return $result;
		

	}
	public function view_cawangan($id){
		
		$this->db->where('id',$id);
		$query = $this->db->get('cawangan');
        	$row = $query->row();

		return $row->cawangan;
        	

	}
	public function kira_cawangan($cid,$lavel){
		
		$this->db->where('lavel',$lavel);
		$this->db->where('id',$cid);
		$query = $this->db->get('SELECT count(*) as jumlah FROM cawangan');
        	$result = $query->result();
        	
		return $result;
		

	}
	public function cawangan_baru($data){

		$this->db->insert('cawangan', $data); 

	}
	public function peranan(){
		
		
		$query = $this->db->get('peranan');
        	$result = $query->result();
        	
		return $result;
		

	}
	public function view_peranan($id){
		
		$this->db->where('pid',$id);
		$query = $this->db->get('peranan');
        $row = $query->row();

		return $row->peranan;
        	
		
		

	}
	public function kemaskini_profile($id,$data,$katalaluan){

		

		$this->db->where('email', $id);
		$this->db->update('pengguna', $data);
		
		if($katalaluan){

			$pass = array(
                	'katalaluan' => sha1($katalaluan)
                  	);


			$this->db->where('email', $id);
			$this->db->update('pengguna', $pass);
		
		} 
	

	}
	function count_pengguna($cari)
    	{
        
		$this->db->like('Nama',$cari);
        	$query = $this->db->query('SELECT count(*) as jumlah FROM pengguna');
        	$result = $query->result();

        	return $result[0]->jumlah;
    	
	}
	public function senarai_pengguna($num, $offset,$cari){
		
		
		$this->db->like('Nama',$cari);
		
		$query = $this->db->get('pengguna',$num, $offset);
        $result = $query->result();
		return $result;
		


	}
	public function pengguna_baru($data){

		$this->db->insert('pengguna', $data); 

	}
	public function pengguna_padam($id){

		$this->db->where('email', $id);
		$this->db->delete('pengguna');

	}
	public function pengguna_ubah($id,$data,$katalaluan){

		
		$this->db->where('email', $id);
		$this->db->update('pengguna', $data);
		
		if($katalaluan){

			$pass = array(
                	'katalaluan' => sha1($katalaluan)
                  	);


			$this->db->where('email', $id);
			$this->db->update('pengguna', $pass);
		
		} 
 

	}

	function count_cawangan($cari,$lavel)
    	{
		if ($lavel == NULL){
			$dapat = "lavel";
			$x = 0;
		}
		else {
			$dapat = "parent";
			$x = $lavel;
		}
        	
		$this->db->like('cawangan',$cari);
		$this->db->like($dapat,$x);

        	$query = $this->db->query('SELECT count(*) as jumlah FROM cawangan');
        	$result = $query->result();

        	return $result[0]->jumlah;
    	
	}

	public function senarai_cawangan($num, $offset,$cari,$lavel){

		if ($lavel == NULL){
			$dapat = "lavel";
			$x = 0;
		}
		else {
			$dapat = "parent";
			$x = $lavel;
		}
		
		$this->db->like('cawangan',$cari);
		$this->db->like($dapat,$x);

		$query = $this->db->get('cawangan',$num, $offset);
        	$result = $query->result();
		return $result;
		

	}
	function count_projek($cari)
    	{
        
			$this->db->where('tajuk',$cari);
        	$query = $this->db->query('SELECT count(*) as jumlah FROM projek');
        	$result = $query->result();

        	return $result[0]->jumlah;
    	
	}
	public function senarai_projek($num, $offset,$cari){
		

		$this->db->like('tajuk',$cari);
		$query = $this->db->get('projek',$num, $offset);
        $result = $query->result();
		return $result;
		

	}
	public function count_maklumat_projek($id)
    	{
        
			//$this->db->where('projekid',$id);
        	$query = $this->db->query('SELECT count(*) as jumlah FROM projek_makluman WHERE projekid='.$id);
        	$result = $query->result();

        	return $result[0]->jumlah;
    	
	}
	public function senarai_maklumat_projek($num, $offset,$id){
		

		$this->db->where('projekid',$id);
		$query = $this->db->get('projek_makluman',$num, $offset);
        $result = $query->result();
		return $result;
		

	}
	public function projek_baru($data){
		
		$this->db->insert('projek',$data); 

	
	}
	public function projek_maklumat($data){
		
		$this->db->insert('projek_makluman',$data); 
	
	}
	public function projek_ubah($id,$data){
		
		$this->db->where('projekid', $id);
		$this->db->update('projek', $data);
	}
	public function projek_papar($id){
			
		//$this->db->where('projekid',$id);
		//$query = $this->db->get('projek');
		$query = $this->db->query("SELECT *,(SELECT status_projek 
		FROM jenis_projek WHERE jenis_projek.jpid=projek.jpid) AS jenis ,
		(SELECT Nama FROM pengguna WHERE pengguna.id=projek.idpemohon) AS pemohon ,
		(SELECT nama_peruntukan FROM sumber_peruntukan WHERE sumber_peruntukan.spid=projek.sumber_peruntukan) AS peruntukan
		FROM `projek` WHERE projekid='$id'");
        


        $result = $query->row();
        	
		return $result;
	}
	public function get_projek($id){
		
		
		$this->db->like('tajuk',$id);
		$query = $this->db->get('projek');
		
		$array = array();
	
		
		foreach($query->result() as $row) {
				
			$array[] = $row->tajuk;
			
		}
		
		return json_encode($array); //Return the JSON Array
		
		$query->free_result();
		
	}
	public function count_mesyuarat($cari)
    {
        	$this->db->where('Tajuk',$cari);
        	$query = $this->db->query('SELECT count(*) as jumlah FROM mesyuarat');
        	$result = $query->result();
        	return $result[0]->jumlah;
			$query->free_result();
    	
	}
	public function senarai_mesyuarat($num,$offset,$cari){
		

		$this->db->where('Tajuk',$cari);
		$this->db->order_by("tarikh", "desc"); 
		$query = $this->db->get('mesyuarat',$num, $offset);
        $result = $query->result();
		return $result;
		$query->free_result();
	}
	public function mesyuarat_baru($data){
		
		$this->db->insert('mesyuarat',$data); 

	
	}
	public function mesyuarat($id){
		
		$this->db->where('muid',$id);
		$query = $this->db->get('mesyuarat');
        $result = $query->row();
        	
		return $result;
		

	}
	
	public function mesyuarat_ubah($id,$data){
		
		$this->db->where('mid', $id);
		$this->db->update('mesyuarat', $data);
	}	

	public function count_lad($cari)
    {
        	$this->db->where('makluman_lad',$cari);
        	$query = $this->db->query('SELECT count(*) as jumlah FROM lad');
        	$result = $query->result();
        	return $result[0]->jumlah;
			$query->free_result();
    	
	}
	public function senarai_lad($num,$offset,$cari){
		

		$this->db->where('makluman_lad',$cari);
		$query = $this->db->get('lad',$num, $offset);
        $result = $query->result();
		return $result;
		$query->free_result();
		

	}
	public function lad_baru($data){
		
		$this->db->insert('lad',$data); 

	
	}
	public function lad_ubah($id,$data){
		
		$this->db->where('ladid', $id);
		$this->db->update('lad', $data);
	}
	public function lad_papar($id){
			
		$this->db->where('ladid',$id);
		$query = $this->db->get('lad');
        $result = $query->row();
        	
		return $result;
	}	



}