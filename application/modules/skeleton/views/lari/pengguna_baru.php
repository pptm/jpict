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
	$info = $this->data->profile($email);	
	$this->load->model('login_model');
	$peranan = $this->login_model->peranan($email);
	$this->load->helper('form');

	




if(isset($_POST['simpan'])){

	

	if (($this->input->post('nama') && $this->input->post('email') && $this->input->post('password')) == NULL ){
	
	?>
			<br/><br/>
			<div class="alert alert-warning" align="center">
      			<p>Maklumat Tidak lengkap <br/><br/><a href="?fungsi=2&lari=baru" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span>  Kembali  </a></p>
      			</div>

	<?php

	}
	else {
	$data = array(
                'Nama' => $this->input->post('nama'),
		'no_kp' => $this->input->post('nokp'),
		'email' => $this->input->post('email'),
		'katalaluan' => sha1($this->input->post('password')),
		'peranan' => $this->input->post('peranan'),
                'cawangan' => $this->input->post('Cawangan'),
                'bahagian' => $this->input->post('bahagian')
            	);

	$this->data->pengguna_baru($data);


?>
	<br/><br/>
	<div class="alert alert-info" align="center">
      	<p>Pengguna Baru Telah Di Cipta  <br/><br/><a href="?fungsi=2" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span>  Kembali  </a></p>
      	</div>
	

<?php
		} 
			
			
	
	} 


else {
?>

<form class="form-horizontal"  action="" method="post" >
<fieldset>

<!-- Form Name -->
<legend>Kemasukan Pengguna Baru</legend>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">Email</label>  
  <div class="col-md-4">
  <input id="email" name="email" type="text" placeholder="email"  class="form-control input-md">
    
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
  <input id="nama" name="nama" type="text"  placeholder="Nama" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nokp">No K/P</label>  
  <div class="col-md-6">
  <input id="nokp" name="nokp" type="text"  placeholder="No K/P" class="form-control input-md">
    
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
		
			echo '<option>Sila Pilih</option>';
			
		foreach ($bahagian1 as $bhg):
			
			echo '<option  value="'.$bhg->id.'">'.$bhg->cawangan.'</option>';
		endforeach;
 
      ?>

    </select>
     <select id="bahagian" name="bahagian" style="display:none;" class="form-control">
     	
    </select>
  </div>
</div>


<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="bahagian">Peranan</label>
  <div class="col-md-6">
    <select id="peranan" name="peranan" class="form-control">
      <option value="0">Administrator</option>
      <option value="1">Pengerusi</option>
      <option value="2">Ahli Jawatankuasa</option>
      <option value="3">Pemohon</option>
    </select>
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