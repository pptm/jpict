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
	$info = $this->data->projek_papar($pid);
	
	//$this->load->model('login_model');
	//$peranan = $this->login_model->peranan($email);
	//$this->load->helper('form');

	
	date_default_timezone_set("Asia/Kuala_Lumpur");

	


?>


<div class="panel panel-success">
  <!-- Default panel contents -->
  <div class="panel-heading">Maklumat Projek </div>
  <div class="panel-body">
    <p><?php echo $info->tajuk; ?></p>
  </div>

  <!-- List group -->
  <ul class="list-group">
    <li class="list-group-item">
    	<div class="row">
        <div class="col-xs-4"><b>Projek id :</b></div>
        <div class="col-xs-8">JKKP/JPICT/<?php echo date('Y', strtotime($info->tarikh_pemohonan)); ?>/<?php echo $pid; ?> 
</div>
      	</div>
    	</li>
    <li class="list-group-item"><b>Maklumat Projek : </b><br/><br/><?php echo $info->maklumat_ringkas; ?> </li>
    <li class="list-group-item"><b>Syarikat dilantik :</b> <br/><br/> <?php echo $info->nama_syarikat; ?></li>
    <li class="list-group-item"><b>Pemohon : <?php echo $info->pemohon; ?></b> <br/><br /></li>
    <li class="list-group-item"><b>Jenis Projek : <?php echo $info->jenis; ?></b> <br/><br/> </li>
    <li class="list-group-item"><b>Tarikh Permohonan : <?php echo $info->tarikh_pemohonan; ?></b> <br/><br/> </li>
	<li class="list-group-item"><b>Nilai Angaran Projek : <?php echo $info->nilai_projek; ?></b> <br/><br/> </li>  
  	<li class="list-group-item"><b>Sumber Peruntukan : <?php echo $info->peruntukan; ?></b> <br/><br/> </li>
  </ul>
  <div class="panel-footer"><center>
  <div class="btn-group">
<a href="?fungsi=5&lari=ubah&id=<?php echo  $pid; ?>" role="button" class="btn btn-primary">Kemaskini</a>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#statusprojek">Tambah Status</button>
<button type="button" class="btn btn-primary" onClick="history.go(-1);return true;">Kembali</button>
  
</div></center></div>
</div>

<!-- Pop up masukan status projek-->


<div class="modal fade" id="statusprojek" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      	<?php
      	
      	
		
		
      			
      		if(isset($_POST['simpan'])){
      		
			$data = array(
        		'projekid' => $pid,
				'tajuk' => $this->input->post('tajuk'),
				'maklumat' => $this->input->post('keterangan')
				
            	);
				
			$this->load->model('data');
			$this->data->projek_maklumat($data);
			
			header("location: ?fungsi=5&lari=papar&id=$pid");
			
		}
		
?>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Status Projek </h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="post">

		<div class="form-group">
  		<label class="col-md-2 control-label" for="tajuk">Perkara</label>  
  		<div class="col-md-8">
  		<input id="tajuk" name="tajuk" type="text" placeholder="Tajuk"  class="form-control input-md">
    
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
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php if(isset($_POST['simpan'])){ ?>
		<div class="alert alert-info" align="center">
      	<p>Maklumat tambahan bagi projek telah di tambah  </p>
      	</div>
<?php } ?>

<?php

	$offset = $this->input->get('per_page',TRUE);
	$jumlah = $this->data->count_maklumat_projek($pid);
	
	$senarai = $this->data->senarai_maklumat_projek($jumlah,$offset,$pid);	
	



	$this->load->library('pagination');
	

	$config['base_url'] = '?fungsi=5&lari=papar&id=$pid';
	$config['page_query_string'] = TRUE;
	$config['total_rows'] = $jumlah;
	$config['per_page'] = 10;

	$config['full_tag_open'] = "<ul class='pagination'>";
	$config['full_tag_close'] ="</ul>";
	$config['num_tag_open'] = '<li>';
	$config['num_tag_close'] = '</li>';
	$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
	$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
	$config['next_tag_open'] = "<li>";
	$config['next_tagl_close'] = "</li>";
	$config['prev_tag_open'] = "<li>";
	$config['prev_tagl_close'] = "</li>";
	$config['first_tag_open'] = "<li>";
	$config['first_tagl_close'] = "</li>";
	$config['last_tag_open'] = "<li>";
	$config['last_tagl_close'] = "</li>";

	$this->pagination->initialize($config); 
?>
<?php if ($jumlah != 0) { ?>
<div class="panel panel-default">
  <div class="panel-heading">Maklumat Projek Terkini</div>
  <div class="panel-body">
  	<div class="row">
    <table class="table" >
        <thead>
            <tr>
                <th width="5%">Bil</th><th width="75%">Perkara</th><th width="20%">Tarikh</th>
            </tr>
        </thead>
        <tbody>
            <?php 

		$bil =1;		
	 ?>
	<?php foreach ($senarai as $jumlah): ?>
            <tr>
		<!-- <td class="active" width="5%"><input type="checkbox" name="checkboxes" id="checkboxes-0" value="1"></td> -->
                
		<td class="active" width="5%"> <?php echo $bil++; ?></td>
                <td class="active"><a href="?fungsi=5&lari=papar&id=<?php echo  $jumlah->projekid; ?>"><?php echo  $jumlah->tajuk; ?></a> </td>
    			<td class="active"><?php echo  $jumlah->tarikh; ?></td>
            </tr>

	<?php endforeach; ?> 

        	</tbody>
    		</table>
    		</div>
    		<?php echo $this->pagination->create_links(); ?>
  </div>
</div>
<?php } ?>
		