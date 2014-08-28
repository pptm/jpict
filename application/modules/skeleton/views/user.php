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

	$this->load->helper('array');

	$rekod = $this->session->userdata('logmasuk');
	
	
	
	$nama = element('Nama', $rekod);
	$email = element('email', $rekod);

	$this->load->model('login_model');
	$peranan = $this->login_model->peranan($email);


	

?>




<div class="row">
    <div class="col-md-9">
        <div>
            <!-- <h1 id="welcome"> SELAMAT DATAN <?php echo $nama; ?> </h1> -->
		
	     <?php

		if($peranan == 0){
			
			$data['peranan'] = $peranan;
			echo $this->load->view('kandungan/admin',$data);
			

		}
		else if($peranan == 1){
			
			$data['peranan'] = $peranan;
			echo $this->load->view('kandungan/pengerusi',$data);
			

		}
		else if($peranan == 2){
			
			$data['peranan'] = $peranan;
			echo $this->load->view('kandungan/ajk',$data);
			

		}
		else if($peranan == 3){
			
			$data['peranan'] = $peranan;
			echo $this->load->view('kandungan/pemohon',$data);
			

		}
		else { echo $peranan; }
		
		?>
		
        
</div></div>

   
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