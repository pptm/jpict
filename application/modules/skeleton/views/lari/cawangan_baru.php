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
	
	$parent = $this->input->get('cawangan',TRUE);

	$nama = element('Nama', $rekod);
	$email = element('email', $rekod);
	
	$this->load->model('data');
	$info = $this->data->profile($email);	
	$this->load->model('login_model');
	$peranan = $this->login_model->peranan($email);
	$this->load->helper('form');

	


	

	if (isset($_GET['cawangan'])){
		$label = "bahagian";
		$lavel = 1;
		$parentd = $parent;
		$link = "?fungsi=3&cawangan=".$parentd;
	}
	else{
		$label = "cawangan";
		$lavel = 0;
		$parentd = 0;
		$link = "?fungsi=3";
	}





if(isset($_POST['simpan'])){

	

	if (($this->input->post($label)) == NULL ){
	
	?>
			<br/><br/>
			<div class="alert alert-warning" align="center">
      			<p>Maklumat Tidak lengkap <br/><br/><a href="?fungsi=3&lari=baru" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span>  Kembali  </a></p>
      			</div>

	<?php

	}
	else {
	$data = array(
                'cawangan' => $this->input->post($label),
                'lavel' => $lavel,
                'parent' => $parentd
            	);

	$this->data->cawangan_baru($data);


?>
	<br/><br/>
	<div class="alert alert-info" align="center">
      	<p>Pengguna Baru Telah Di Cipta  <br/><br/><a href="<?php echo $link; ?>" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span>  Kembali  </a></p>
      	</div>
	

<?php
		} 
			
			
	
	} 


else {
?>

<form class="form-horizontal"  action="" method="post" >
<fieldset>

<!-- Form Name -->
<legend>Kemasukan <?php echo $label; ?></legend>



<!-- Text input-->

<?php 

	if (isset($_GET['cawangan'])){


?>
<div class="form-group">
  <label class="col-md-4 control-label" for="cawangan">Cawangan</label>  
  <div class="col-md-4">

   <?php 
		echo $this->data->view_cawangan($parent);
		
    ?>
    
  </div>
</div>

<?php } else { } ?>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="<?php echo $label; ?>"><?php echo $label; ?></label>  
  <div class="col-md-4">
  <input id="<?php echo $label; ?>" name="<?php echo $label; ?>" type="text" placeholder="<?php echo $label; ?>"  class="form-control input-md">
    
  </div>
</div>



<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="simpan"></label>
  <div class="col-md-4">
    <button type="submit" id="simpan" name="simpan" class="btn btn-primary">Simpan</button>
  </div>
</div>

</fieldset>
</form>
<?php

}


?>