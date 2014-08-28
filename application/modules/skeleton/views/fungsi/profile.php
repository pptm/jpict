<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	$this->load->helper('array');

	$rekod = $this->session->userdata('logmasuk');
	
	
	$nama = element('Nama', $rekod);
	$email = element('email', $rekod);
	
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
                'bahagian' => $this->input->post('bahagian')
            	);

	$this->data->kemaskini_profile($email,$data,$katalaluan);


?>
	<br/><br/>
	<div class="alert alert-info" align="center">
      <p>Profile telah di kemaskini <br/><br/><a href="?fungsi=1" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span>  Kembali  </a></p>
      </div>
	

<?php

} else {
?>

<form class="panel panel-default  form-horizontal"  action="" method="post" >
<fieldset>

<!-- Form Name -->
<legend>Profile Pengguna</legend>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">Email</label>  
  <div class="col-md-4">
  <input id="email" name="email" value="<?php echo $email; ?>" type="text" placeholder="<?php echo $email; ?>" disabled="disabled" class="form-control input-md">
    
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
  <label class="col-md-4 control-label" for="nama">No K/P</label>  
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
			echo '<option  value="'.$bhg->id.'"'.$pilihan.'>'.$bhg->cawangan.'</option>';
		endforeach;
		}
 
      ?>
    </select>
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