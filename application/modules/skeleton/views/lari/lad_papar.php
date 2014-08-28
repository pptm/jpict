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
	
	
	//$email = $this->input->get('id');
	
	$pid = $this->input->get('id');
	
	$this->load->model('data');
	$info = $this->data->lad_papar($pid);
	
	//$this->load->model('login_model');
	//$peranan = $this->login_model->peranan($email);
	//$this->load->helper('form');

	
	date_default_timezone_set("Asia/Kuala_Lumpur");




?>

<div class="panel panel-success">
  <!-- Default panel contents -->
  <div class="panel-heading">Maklumat LAD </div>
  <div class="panel-body">
    <p><?php echo $info->makluman_lad; ?></p>
  </div>

  <!-- List group -->
  <ul class="list-group">
    <li class="list-group-item">
    	<div class="row">
        <div class="col-xs-4"><b>Projek id :</b></div>
        <div class="col-xs-8">JKKP/JPICT/<?php echo date('Y', strtotime($info->tarikh)); ?>/<?php echo $pid; ?> 
</div>
      	</div>
    	</li>
    <li class="list-group-item"><b>Maklumat Projek : </b><br/><br/><?php echo $info->projekid; ?> </li>
    <li class="list-group-item"><b>Syarikat dilantik :</b> <br/><br/> <?php echo $info->syarikatid; ?></li>
  </ul>
  <div class="panel-footer"><center>
  <div class="btn-group">
  	<a href="?fungsi=7&lari=ubah&id=<?php echo  $info->ladid; ?>" role="button" class="btn btn-primary">Kemaskini</a>

  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#statuslad">Tambah Status</button>
  <button type="button" class="btn btn-primary" onClick="history.go(-1);return true;">Kembali</button>
  
</div></center></div>
</div>

<!-- Pop up masukan status projek-->


<div class="modal fade" id="statuslad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Status LAD </h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="post">

		<div class="form-group">
  		<label class="col-md-2 control-label" for="maklumat">Tajuk</label>  
  		<div class="col-md-8">
  		<input id="maklumat" name="maklumat" type="text" placeholder="maklumat"  class="form-control input-md">
    
 		</div>
		</div>
		<script src="<?php echo assets_url('js/tinymce/tinymce.min.js'); ?>"></script>
		<script type="text/javascript">
		tinymce.init({
    	selector: "textarea"
 		});	
		</script>
		
		
		<textarea class="col-md-6" id="keterangan" name="keterangan" >Your content here.</textarea>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
