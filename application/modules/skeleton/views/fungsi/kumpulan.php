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

	
	$cari = $this->input->post('cari',TRUE);	
	$offset = $this->input->get('per_page',TRUE);

	$parent = $this->input->get('cawangan',TRUE);
	$this->load->model('data');
	

	$jumlah = $this->data->count_cawangan($cari,$parent);

	
	$senarai = $this->data->senarai_cawangan($jumlah,$offset,$cari,$parent);	

	


	$this->load->library('pagination');
	

	$config['base_url'] = '?fungsi=3';
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

<legend>Senarai Kumpulan</legend>
<?php

	if ($parent ){

		$link = "?fungsi=3&lari=baru&cawangan=$parent";
		
	}else{

		$link = "?fungsi=3&lari=baru";

	}

?>
<div class="col-md-4">
	<div class="col-md-4">
        	<a href="<?php echo $link; ?>" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span> Baru</a>
  	</div>
	<!--
	<div class="col-md-4">
		<a href="#" class="btn btn-default"><span class="glyphicon glyphicon-remove-sign"></span> Padam</a>
	</div>
	-->
</div>


<div class="col-md-8">

<form name="cari" action="" method="post" class="form-horizontal" >

<div class="form-group">
  
  <div class="col-md-8">
    <input id="cari" name="cari" type="search" placeholder="cari" class="form-control input-md">
    
  </div>
	<div class="col-md-1">
	<button id="carix" name="carix" class="btn btn-primary">Cari</button>
	</div>
</div>
</div>

</form>



<div class="col-md-12">
	<div class="panel panel-default  table-responsive">
    	<table class="table">
        <thead>
            <tr>
                <th>Bil</th><th><?php if($parent == NULL): echo "Cawangan"; else: echo "Bahagian"; endif; ?></th>
            </tr>
        </thead>
        <tbody>
            <?php 
		$bil=1;

	 ?>
	<?php foreach ($senarai as $jumlah): ?>
            <tr>
		<!-- <td class="active" width="5%"><input type="checkbox" name="checkboxes" id="checkboxes-0" value="1"></td> -->
                <td class="active" width="5%"> <?php echo $bil++; ?></td>
		
		<?php if($parent == NULL): ?>
                <td class="active"><a href="?fungsi=3&cawangan=<?php echo $jumlah->id; ?>"><?php echo $jumlah->cawangan; ?></a></td>
    		

		<?php else: ?>
                <td class="active"><?php echo $jumlah->cawangan; ?> </td>
    		<?php endif; ?>

            </tr>

	<?php endforeach; ?> 

        	</tbody>
    		</table>
	</div>
 </div>
