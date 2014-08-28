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
	
	
	$nama = element('Nama', $rekod);
	$email = element('email', $rekod);
	
	$this->load->model('data');
	$info = $this->data->mesyuarat($this->input->get('id'));	
	$this->load->model('login_model');
	$peranan = $this->login_model->peranan($email);
	$this->load->helper('form');

	
	date_default_timezone_set("Asia/Kuala_Lumpur");



if(isset($_POST['simpan'])){

	

	if (($this->input->post('tajuk') && $this->input->post('keterangan') && $this->input->post('datepicker') && $this->input->post('lokasi')) == NULL ){
	
	?>
			<br/><br/>
			<div class="alert alert-warning" align="center">
      			<p>Maklumat Tidak lengkap <br/><br/><a href="?fungsi=6&lari=baru" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span>  Kembali  </a></p>
      			</div>

	<?php

	}
	else {
	
	$date=date("Y-m-d h:i:s",strtotime($this->input->post('datepicker')));
	
	$data = array(
				'Tajuk' => $this->input->post('tajuk'),
                'keterangan' => $this->input->post('keterangan'),
				'tarikh' => $date,
				'masa' => $this->input->post('masa'),
				'lokasi2' => $this->input->post('bahagian'),
				'lokasi' => $this->input->post('lokasi')
				);

	$this->data->mesyuarat_baru($data);


?>
	<br/><br/>
	<div class="alert alert-info" align="center">
      	<p>Pengguna Baru Telah Di Cipta  <br/><br/><a href="?fungsi=6" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span>  Kembali  </a></p>
      	</div>
	

<?php
		} 
			
			
	
	} 


else {
?>

<form class="form-horizontal"  action="" method="post" >
<fieldset>

<!-- Form Name -->
<legend>Kemaskini Mesyuarat </legend>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="tajuk">Tajuk</label>  
  <div class="col-md-4">
  <input id="tajuk" name="tajuk" value="<?php echo $info->Tajuk; ?>" type="text" placeholder="tajuk"  class="form-control input-md">
    
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="keterangan">Maklumat Ringkas</label>  
  <div class="col-md-6">
  <input id="keterangan" name="keterangan" value="<?php echo $info->keterangan; ?>" type="text"  placeholder="Maklumat Ringkas" class="form-control input-md">
    
  </div>

</div>




 <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>

	<div class="form-group">
        <label class="col-md-4 control-label" for="datepicker">Tarikh Jangkaan</label>  
        <div class="col-md-6">
            <div class="input-group">
                <input id="datepicker" value="<?php echo $info->tarikh; ?>" name="datepicker" type="text" class="date-picker form-control" />
                <label for="datepicker" class="input-group-addon btn"><span class="glyphicon glyphicon-calendar"></span>

                </label>
            </div>
        </div>
    	</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="masa">Waktu</label>  
  <div class="col-md-6">
  <input id="masa" name="masa" type="text" value="<?php echo $info->masa; ?>"  placeholder="Waktu Mesyuarat" class="form-control input-md">
    
  </div>

</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="lokasi">Lokasi</label>  
  <div class="col-md-6">
  <input id="lokasi" name="lokasi" type="text" value="<?php echo $info->lokasi; ?>" placeholder="Lokasi Mesyuarat" class="form-control input-md">
    
  </div>

</div>

<!-- Select Basic -->

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

<div class="form-group">
  <label class="col-md-4 control-label" for="Cawangan">Cawangan</label>
  <div class="col-md-6">
    <select id="Cawangan" name="Cawangan" class="form-control" onchange="showdrop()">
    	
      <?php
	
		$bahagian1 = $this->data->cawangan('0');
		
			echo '<option value="'.$info->lokasi2.'">'.$info->lokasi2. '</option>';
			
		foreach ($bahagian1 as $bhg):
			
			echo '<option  value="'.$bhg->id.'">'.$bhg->cawangan.'</option>';
		endforeach;
 
      ?>

    </select>
     <select id="bahagian" name="bahagian" style="display:none;" class="form-control">
     	<option value="<?php echo $info->lokasi2; ?>"><?php echo $info->lokasi2; ?></option>
    </select>
  </div>
</div>



<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="simpan"></label>
  <div class="col-md-4">
    <button type="submit" id="simpan" name="simpan" class="btn btn-primary">Kemaskini</button>
    <button type="button"  class="btn btn-primary" onClick="history.go(-1);return true;" >Kembali</button>
  </div>
</div>

</fieldset>
</form>
<?php

}


?>