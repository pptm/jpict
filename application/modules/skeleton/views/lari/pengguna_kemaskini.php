<?php 

/*
Di lesenkan di bawah BSD 
Hak cipta © 2014, hasnan bin Hasim (nan asklinux)
Semua hak cipta terpelihara.
Pengedaran semula dan penggunaan dalam bentuk sumber dan perduaan, 
sama ada dengan pengubahsuaian atau tanpa pengubahsuaian, 
adalah dibenarkan dengan syarat-syarat berikut:
Pengedaran semula kod sumber mestilah mengekalkan 
notis hak cipta di atas, senarai syarat ini dan penolak tuntutan yang berikut.
Pengedaran semula dalam bentuk perduaan hendaklah menghasilkan semula notis 
hak cipta di atas, senarai syarat ini dan penolak tuntutan yang berikut dalam 
dokumentasinya dan/atau bahan-bahan lain yang dibekalkan bersama edaran tersebut.
Nama <organisasi> atau nama penyumbang-penyumbangnya tidak boleh digunakan untuk 
mengendors atau mempromosikan produk-produk terbitan daripada perisian ini 
tanpa kebenaran bertulis yang spesifik.
PERISIAN INI DIBEKALKAN OLEH hasnan bin Hasim (nan asklinux)
DALAM KEADAAN "SEDIA ADA" DAN SEBARANG TUNTUTAN WARANTI YANG NYATA ATAU TERSIRAT, 
TERMASUK, TETAPI TIDAK TERHAD KEPADA, WARANTI-WARANTI NYATA BAGI KEBOLEHDAGANGAN DAN 
KESESUAIAN UNTUK TUJUAN TERTENTU ADALAH DITOLAK. hasnan bin Hasim (nan asklinux) TIDAK BERTANGGUNGJAWAB 
UNTUK SEBARANG GANTI RUGI KEROSAKAN LANGSUNG, TIDAK LANGSUNG, SAMPINGAN, KHAS, 
TELADAN ATAU LANJUTAN (TERMASUK, TETAPI TIDAK TERHAD KEPADA, PEMEROLEHAN BARANG ATAU 
PERKHIDMATAN PENGGANTI; KERUGIAN GUNA, DATA ATAU KEUNTUNGAN; ATAU GANGGUAN PERNIAGAAN) YANG 
BERLAKU DENGAN APA CARA SEKALIPUN DAN PADA APA JUA TEORI LIABILITI, SAMA ADA DALAM KONTRAK, 
LIABILITI KETAT, ATAU TORT (TERMASUK KECUAIAN ATAU SEBALIKNYA) YANG TIMBUL DALAM APA JUA 
CARA DARIPADA PENGGUNAAN PERISIAN INI, MESKIPUN SETELAH DINASIHATI TENTANG 
KEMUNGKINAN KEROSAKAN TERSEBUT. 
 
 */
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	$this->load->helper('array');

	$rekod = $this->session->userdata('logmasuk');
	
	
	$email = $this->input->get('id');
	
	$this->load->model('data');
	$info = $this->data->profile($email);
	
	$this->load->model('login_model');
	$peranan = $this->login_model->peranan($email);
	$this->load->helper('form');

	
	


if(isset($_POST['kemaskini'])){

	$katalaluan = $this->input->post('password');
	
	$data = array(
                'Nama' => $this->input->post('nama'),
		'no_kp' => $this->input->post('nokp'),
                'cawangan' => $this->input->post('Cawangan'),
		'peranan' => $this->input->post('peranan'),
                'bahagian' => $this->input->post('bahagian')
            	);

	$this->data->pengguna_ubah($email,$data,$katalaluan);


?>
	<br/><br/>
	<div class="alert alert-info" align="center">
      <p>Maklumat Pengguna telah di kemaskini <br/><br/><a href="?fungsi=2" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span>  Kembali  </a></p>
      </div>
	

<?php


} 
else if(isset($_POST['padam'])){

	$this->data->pengguna_padam($email);

	?>
		<br/><br/>
	<div class="alert alert-info" align="center">
      <p>Pengguna Telah di padam <br/><br/><a href="?fungsi=2" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span>  Kembali  </a></p>
      </div>
	
	<?php

}
else {
?>

<form class="form-horizontal"  action="" method="post" >
<fieldset>

<!-- Form Name -->
<legend>Kemaskini Maklumat Pengguna</legend>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">Email</label>  
  <div class="col-md-4">
  <input id="email" name="email" type="text" placeholder="<?php echo $email; ?>" disabled="disabled" class="form-control input-md">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password">Password</label>
  <div class="col-md-4">
    <input id="password" name="password" type="password" placeholder="password" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nama">Nama</label>  
  <div class="col-md-6">
  <input id="nama" name="nama" type="text" value="<?php echo $info->Nama; ?>" placeholder="<?php echo $info->Nama; ?>" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nokp">No K/P</label>  
  <div class="col-md-6">
  <input id="nokp" name="nokp" type="text" value="<?php echo $info->no_kp; ?>" placeholder="<?php echo $info->no_kp; ?>" class="form-control input-md">
    
  </div>
</div>

<script>
function showdrop()
{
    var Cawangan=$("#Cawangan").val();   // get the value of currently selected customer
     $.ajax({
    type:"post",
    dataType:"text",
    data:"Cawangan="+Cawangan,
    url:"index.php/skeleton/get_cawangan",         // page to which the ajax request is passed
    success:function(response)
    {
             $("#bahagian").html(response);   // set the result to product dropdown
     $("#bahagian").show();
    }
})


}
</script>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Cawangan">Cawangan</label>
  <div class="col-md-6">
    <select id="Cawangan" name="Cawangan" class="form-control" onchange="showdrop()">
      <?php
	
		$bahagian1 = $this->data->cawangan('0');
		
		
		

		foreach ($bahagian1 as $bhg):
			
			if ($info->cawangan == $bhg->id){
				
				$pilihan = 'selected="selected"';
			}
			else {
				$pilihan = "";
			}
			echo '<option  value="'.$bhg->id.'" '.$pilihan.'>'.$bhg->cawangan.'</option>';
		endforeach;
 
      ?>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="bahagian">Bahagian</label>
  <div class="col-md-6">
    <select id="bahagian" name="bahagian" class="form-control">
      <?php
	
		$bahagian2 = $this->data->bahagian($info->cawangan,'1');
		
		
		if($bahagian2 == Null){
		
		echo '<option  value="'.$info->bahagian.'">'.$this->data->view_cawangan($info->bahagian).'</option>';

    		}
    		else {


		foreach ($bahagian2 as $bhg):
			if ($info->bahagian == $bhg->id){
				$pilihan = 'selected="selected"';
			}
			else {
				$pilihan = "";
			}
			echo '<option  value="'.$bhg->id.'  "'.$pilihan.'>'.$bhg->cawangan.'</option>';
		endforeach;
		}
 
      ?>	
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="bahagian">Peranan</label>
  <div class="col-md-6">
    <select id="peranan" name="peranan" class="form-control">
		
		 <?php
	
		$peranan = $this->data->peranan();
		
		
	

		foreach ($peranan as $p):
			if ($info->peranan == $p->pid){
				$pilihan = 'selected="selected"';
			}
			else {
				$pilihan = "";
			}
			echo '<option  value="'.$p->pid.'  "'.$pilihan.'>'.$p->peranan.'</option>';
		endforeach;
 
      		?>

    </select>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="simpan"></label>
  <div class="col-md-4">
    <button type="submit" id="kemaskini" name="kemaskini" class="btn btn-primary">Kemaskini</button>
  


  
    <button type="submit" id="padam" name="padam" onclick="return confirm('Maklumat Pengguna Akan di padam , Anda Pasti ?')" class="btn btn-primary">Padam</button>
  </div>
</div>

</fieldset>
</form>
<?php

}


?>