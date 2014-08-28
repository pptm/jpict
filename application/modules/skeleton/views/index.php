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

	$this->load->model('data');

	$jumlah = $this->data->count_mesyuarat($cari);

	$senarai = $this->data->senarai_mesyuarat($jumlah,$offset,$cari);	
	
	$jumlah2 = $this->data->count_mesyuarat($cari);
	$senarai2 = $this->data->senarai_mesyuarat($jumlah2,$offset,$cari);	
	$configure = $this->data->get_tarikhakhir();
	
	date_default_timezone_set("Asia/Kuala_Lumpur");
	
	$this->load->library('pagination');
	

	$config['base_url'] = '?fungsi=6';
	$config['page_query_string'] = TRUE;
	$config['total_rows'] = $jumlah;
	$config['per_page'] = 5;

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


<div class="row">
    <div class="col-md-9">
        <div>
            <h1 id="welcome"> </h1>

	     <div class="alert alert-warning">
                                <p>TENTATIF JADUAL MESYUARAT JAWATANKUASA PEMANDU TEKNOLOGI MAKLUMAT DAN KOMUNIKASI (JPICT)</p>


                </div>
            <p>
	
	<div class="panel panel-default table-responsive">
    	<table class="table">
        <thead>
            <tr>
                <th>Bil</th><th>Mesyuarat</th><th>Tarikh</th><th>Hari</th><th>Masa</th><th>Lokasi</th>
            </tr>
        </thead>
        <tbody>
	<?php 
		$bil = 1;		
		setlocale(LC_ALL,'ms_MY');
	
	 ?>
	<?php foreach ($senarai as $jumlah): ?>
		<?php setLocale(LC_ALL, 'ms_MY.utf8'); ?>
            <tr>
                <td class="active" width="5%"><?php echo $bil; ?></td>
                <td class="active"><?php echo  $jumlah->Tajuk; ?></td>
                <td class="active"><?php echo  date('d-m-Y',strtotime($jumlah->tarikh)); ?></td>
                <td class="active"><?php echo  date('D',strtotime($jumlah->tarikh)); ?> </td>
                <td class="active"><?php echo  $jumlah->masa; ?></td>
		<td class="active"><?php echo  $jumlah->lokasi; ?></td>
            </tr>

	<?php endforeach; ?>          
  
        	</tbody>
    		</table>
	</div>
	<?php echo $this->pagination->create_links(); ?>

                
	 <?php if($configure == 1) { ?> 
	 <div class="alert alert-info">
                                <p>TENTATIF JADUAL TARIKH AKHIR MENGHANTAR PERMOHONAN</p>


                </div>
            <p>

	 <?php }?>
        </div>

	<?php if($configure == 1) { ?> 
	<div class="panel panel-default table-responsive">
    	<table class="table">
        <thead>
            <tr>
                <th>Bil</th><th>Mesyuarat</th><th>Tarikh</th><th>Hari</th>
            </tr>
        </thead>
        <tbody>
        	
            <?php 
			$bil2 = 1;		
	 ?>
	<?php foreach ($senarai2 as $jumlah2): ?>
            <tr>
                <td class="active" width="5%"><?php echo $bil2; ?></td>
                <td class="active"><?php echo  $jumlah2->Tajuk; ?></td>
                <td class="active"><?php echo  date('d-m-Y',strtotime('-3 day', strtotime($jumlah2->tarikh)));  ?></td>
                <td class="active"><?php echo  date('D',strtotime($jumlah2->tarikh)); ?></td>
            </tr>

	<?php endforeach; ?> 
        	</tbody>
    		</table>
	</div>

        <?php } ?>


    </div>
    <div class="col-md-3">
        <?php echo $pagelet_sidebar; ?>
    </div>

</div>

<div class="modal" id="dialog-html-inspector">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal" type="button">&times;</button>
                <h4 class="modal-title">Source Code</h4>
            </div>
            <div class="modal-body">
                <pre><code></code></pre>
            </div>
        </div>
    </div>
</div>