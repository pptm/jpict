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

	

	if (($this->input->post('maklumat') && $this->input->post('syarikat') && $this->input->post('projek')) == NULL ){
	
	?>
			<br/><br/>
			<div class="alert alert-warning" align="center">
      			<p>Maklumat Tidak lengkap <br/><br/><a href="?fungsi=2&lari=baru" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span>  Kembali  </a></p>
      			</div>

	<?php

	}
	else {
	$data = array(
               	'maklumat_lad' => $this->input->post('maklumat'),
				'syarikatid' => $this->input->post('syarikat'),
				'projekid' => $this->input->post('projek')
            	);

	$this->data->pengguna_baru($data);


?>
	<br/><br/>
	<div class="alert alert-info" align="center">
      	<p>Tindakan LAD Baru Telah Di Cipta  <br/><br/><a href="?fungsi=2" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span>  Kembali  </a></p>
      	</div>
	

<?php
		} 
			
			
	
	} 


else {
?>

<form class="form-horizontal"  action="" method="post" >
<fieldset>

<!-- Form Name -->
<legend>Tindakan LAD Baru</legend>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="maklumat">Maklumat</label>  
  <div class="col-md-4">
  <input id="maklumat" name="maklumat" type="text" placeholder="maklumat"  class="form-control input-md">
    
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="maklumat">Syarikat</label>  
  <div class="col-md-4">
  <input id="syarikat" name="syarakat" type="text" placeholder="syarikat"  class="form-control input-md">
    
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="projek">Projek</label>  
  <div class="col-md-4">
  	
  <script>

$("document").ready(function() {

$('#projek').typeahead({
  name: 'projek',
  remote : 'index.php/skeleton/get_projek?query=%QUERY'

});

})

</script>

	
  <input id="projek" name="projek" type="text" placeholder="projek"  class="form-control input-md">
  
  <!-- <input type="text" class="form-control input-md" style="margin: 0 auto;" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
  -->
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