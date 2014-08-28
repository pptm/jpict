<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	$this->load->helper('array');

	$rekod = $this->session->userdata('logmasuk');
	
	
	$nama = element('Nama', $rekod);
	$email = element('email', $rekod);
	
	$this->load->model('data');
	$info = $this->data->tetapan();	
	$this->load->model('login_model');
	$peranan = $this->login_model->peranan($email);
	$this->load->helper('form');

	
	


if(isset($_POST['kemaskini'])){

	
	$data = array(
                'Nama' => $this->input->post('nama'),
		'no_kp' => $this->input->post('nokp'),
                'cawangan' => $this->input->post('Cawangan'),
                'bahagian' => $this->input->post('bahagian')
            	);

	$this->data->kemaskini_tetapan($email,$data);


?>
	<br/><br/>
	<div class="alert alert-info" align="center">
      <p>Profile telah di kemaskini <br/><br/><a href="?fungsi=4" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span>  Kembali  </a></p>
      </div>
	

<?php

} else {
?>

<form class="panel panel-default  form-horizontal"  action="" method="post" >
<fieldset>

<!-- Form Name -->
<legend>Tetapan Sistem</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nama">Jabatan / Kementerian</label>  
  <div class="col-md-6">
  <input id="nokp" name="nokp" type="text" value="<?php echo $info->jabatan; ?>" placeholder="<?php echo $info->jabatan; ?>" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nama">Nama Sistem</label>  
  <div class="col-md-6">
  <input id="nama" name="nama" type="text" value="<?php echo $info->Nama_laman; ?>" placeholder="Nama Laman"  class="form-control input-md">
    
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nama">Keterangan Sistem</label>  
  <div class="col-md-6">
  <textarea id="nama" name="nama"  value="<?php echo $info->keterangan; ?>" placeholder="<?php echo $info->keterangan; ?>" class="form-control input-md"></textarea>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nama">Maklumat Footer</label>  
  <div class="col-md-6">
  <input id="nokp" name="nokp" type="text" value="<?php echo $info->footer_nama; ?>" placeholder="Maklumat Footer" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nama">Gambar Logo</label>  
  <div class="col-md-6">
  <input id="nokp" name="nokp" type="text" value="<?php echo $info->logo; ?>" placeholder="url logo" class="form-control input-md">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="simpan"></label>
  <div class="col-md-4">
    <button type="submit" id="kemaskini" name="kemaskini" class="btn btn-primary">Kemaskini</button>
  </div>
</div>

</fieldset>
</form>
<?php

}


?>