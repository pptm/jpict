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



	$rekod = $this->session->userdata('logmasuk');
	
		
	$nama = element('Nama', $rekod);
	$email = element('email', $rekod);


	$this->load->model('login_model');
	$peranan = $this->login_model->peranan($email);

	$this->load->model('data');
	$perananv = $this->data->view_peranan($peranan);

	$peranan_nama = strtoupper($perananv);



?>

<center><b>MENU <?php echo $peranan_nama; ?></b></center>
<div class="panel-body">

<ul class="nav sidenav">
	

<?php if ($peranan == 0) { ?>
<li class="active"><a href="." class="btn btn-default"><span class="glyphicon glyphicon-home"></span> Utama </a></li>
<li class="active"><a href="?fungsi=1" class="btn btn-default"><span class="glyphicon glyphicon-dashboard"></span> Profile</a></li>
<li class="active"><a href="?fungsi=2" class="btn btn-default"><span class="glyphicon glyphicon-user"></span> Pengguna</a></li>
<li class="active"><a href="?fungsi=3" class="btn btn-default"><span class="glyphicon glyphicon-th-large"></span>Cawangan</a></li>
<li class="active"><a href="?fungsi=4" class="btn btn-default"><span class="glyphicon glyphicon-wrench"></span> Tetapan</a></li>

<?php } ?>

<?php if ($peranan == 1) { ?>
<li class="active"><a href="." class="btn btn-default"><span class="glyphicon glyphicon-home"></span> Utama </a></li>
<li class="active"><a href="?fungsi=1" class="btn btn-default"><span class="glyphicon glyphicon-dashboard"></span> Profile</a></li>
<li class="active"><a href="?fungsi=5" class="btn btn-default"><span class="glyphicon glyphicon-tags"></span> Projek</a></li>
<li class="active"><a href="?fungsi=6" class="btn btn-default"><span class="glyphicon glyphicon-briefcase"></span> Mesyuarat</a></li>
<li class="active"><a href="?fungsi=7" class="btn btn-default"><span class="glyphicon glyphicon-hand-up"></span>Tindakan LAD</a></li>
<?php } ?>

<?php if ($peranan == 2) { ?>
<li class="active"><a href="." class="btn btn-default"><span class="glyphicon glyphicon-home"></span> Utama </a></li>
<li class="active"><a href="?fungsi=1" class="btn btn-default"><span class="glyphicon glyphicon-dashboard"></span> Profile</a></li>
<li class="active"><a href="?fungsi=5" class="btn btn-default"><span class="glyphicon glyphicon-tags"></span> Projek</a></li>
<li class="active"><a href="?fungsi=6" class="btn btn-default"><span class="glyphicon glyphicon-briefcase"></span> Mesyuarat</a></li>
<?php } ?>

<?php if ($peranan == 3) { ?>
<li class="active"><a href="." class="btn btn-default"><span class="glyphicon glyphicon-home"></span> Utama </a></li>
<li class="active"><a href="?fungsi=1" class="btn btn-default"><span class="glyphicon glyphicon-dashboard"></span> Profile</a></li>
<li class="active"><a href="?fungsi=5" class="btn btn-default"><span class="glyphicon glyphicon-tags"></span> Projek</a></li>
<li class="active"><a href="?fungsi=6" class="btn btn-default"><span class="glyphicon glyphicon-briefcase"></span> Mesyuarat</a></li>
<?php } ?>

</ul>
</div>