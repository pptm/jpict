<?php

	$this->load->model('data');
	$keterangan = $this->data->get_sistem_dis();
	$jabatan = $this->data->get_sistem_pejabat();
	$logo = $this->data->get_sistem_logo();
?>

<center>

	<br/><br/><br/><br/>
	<img src="<?php echo $logo; ?>" alt="Logo Jabatan">

	<br/> <h2><?php echo $keterangan; ?> </h2>
	<br/> <h4><?php echo $jabatan; ?></h4>

</center>