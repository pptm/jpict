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

	

	if (($this->input->post('tajuk') && $this->input->post('ringkasan') && $this->input->post('perincian')) == NULL ){
	
	?>
			<br/><br/>
			<div class="alert alert-warning" align="center">
      			<p>Maklumat Tidak lengkap <br/><br/><a href="?fungsi=5&lari=baru" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span>  Kembali  </a></p>
      			</div>

	<?php

	}
	else {
	$data = array(
        		'tajuk' => $this->input->post('tajuk'),
				'maklumat_ringkas' => $this->input->post('ringkasan'),
				'perincian' => $this->input->post('perincian'),
				'tarikh_jangkaan' => $this->input->post('tarikh'),
				'idpemohon' => $this->input->post('pemohon'),
                'skopid' => $this->input->post('skop'),
                'idpengerusi' => $this->input->post('pengerusi'),
                'cawanganid' => $this->input->post('cawangan'),
                'jpid' => $this->input->post('jenisprojek'),
                'nilai_projek' => $this->input->post('bahagian')
            	);

	$this->data->projek_baru($data);


?>
	<br/><br/>
	<div class="alert alert-info" align="center">
      	<p>Pengguna Baru Telah Di Cipta  <br/><br/><a href="?fungsi=5" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span>  Kembali  </a></p>
      	</div>
	

<?php
		} 
			
			
	
	} 


else {
?>

<form class="form-horizontal"  action="" method="post" >
<fieldset>

<!-- Form Name -->
<legend>Kemasukan Projek Baru</legend>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="tajuk">Tajuk</label>  
  <div class="col-md-4">
  <input id="tajuk" name="tajuk" type="text" placeholder="tajuk"  class="form-control input-md">
    
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="ringkasan">Maklumat Ringkas</label>  
  <div class="col-md-6">
  <input id="ringkasan" name="ringkasan" type="text"  placeholder="Maklumat Ringkas" class="form-control input-md">
    
  </div>

</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="perincian">Perincian</label>  
  <div class="col-md-6">
  <input id="perincian" name="perincian" type="text"  placeholder="Maklumat Ringkas" class="form-control input-md">
    
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
                <input id="datepicker" type="text" class="date-picker form-control" />
                <label for="datepicker" class="input-group-addon btn"><span class="glyphicon glyphicon-calendar"></span>

                </label>
            </div>
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
  <label class="col-md-4 control-label" for="bahagian">Pelulus</label>
  <div class="col-md-6">
    <select id="peranan" name="peranan" class="form-control">
      <option value="0">Administrator</option>
      <option value="1">Pengerusi</option>
      <option value="2">Ahli Jawatankuasa</option>
      <option value="3">Pemohon</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="bahagian">Jenis Projek</label>
  <div class="col-md-6">
    <select id="peranan" name="peranan" class="form-control">
      <option value="0">Pembangunan Sistem Aplikasi</option>
      <option value="1">Bukan Sistem Aplikasi</option>
     
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="bahagian">Skop Projek</label>
  <div class="col-md-6">
    <select id="peranan" name="peranan" class="form-control">
      <option value="0">Administrator</option>
      <option value="1">Pengerusi</option>
      <option value="2">Ahli Jawatankuasa</option>
      <option value="3">Pemohon</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="ringkas">Nilai Angaran Projek</label>  
  <div class="col-md-4">
  <input id="ringkas" name="ringkas" type="text"  placeholder="RM" class="form-control input-md">
    
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