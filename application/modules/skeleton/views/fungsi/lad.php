<?php

	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	$cari = $this->input->post('cari',TRUE);	
	$offset = $this->input->get('per_page',TRUE);

	$this->load->model('data');

	$jumlah = $this->data->count_lad($cari);

	
	$senarai = $this->data->senarai_lad($jumlah,$offset,$cari);	

	


	$this->load->library('pagination');
	

	$config['base_url'] = '?fungsi=2';
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

<legend>Senarai LAD</legend>

<div class="col-md-4">
	<div class="col-md-4">
        	<a href="?fungsi=7&lari=baru" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span> Baru</a>
  	</div>
	<!--
	<div class="col-md-4">
		<a href="test.php" class="btn btn-default"><span class="glyphicon glyphicon-remove-sign"></span> Padam</a>
	</div>
	-->
</div>


<form name="cari" action="" method="post" class="form-horizontal" >

<div class="col-md-8">



<div class="form-group">
 
<?php

	if ($cari == NULL){
		$paparan = "Cari Nama";
	}
	else{
		$paparan = $cari;
	}

?> 
  <div class="col-md-8">
    <input id="cari" name="cari" type="search" placeholder="<?php echo $paparan; ?>" class="form-control input-md">
    
  </div>
	<div class="col-md-1">
	<button id="carix" name="carix" class="btn btn-primary">Cari</button>
	</div>
</div>
</div>

</form>


<div class="col-md-12">
	<div class="panel panel-default table-responsive">
    	<table class="table">
        <thead>
            <tr>
                <th>Bil</th><th>Tajuk</th><th>Ringkasan</th><th>Tarikh</th><th>Status</th>
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
                <td class="active"><a href="?fungsi=7&lari=papar&id=<?php echo  $jumlah->ladid; ?>"><?php echo  $jumlah->makluman_lad; ?></a> </td>
                <td class="active"><?php echo  $jumlah->projekid; ?></td>
                <td class="active"><?php echo  $jumlah->tarikh; ?></td>
    			 <td class="active"><?php echo  $jumlah->status; ?></td>
            </tr>

	<?php endforeach; ?> 

        	</tbody>
    		</table>
		<?php echo $this->pagination->create_links(); ?>
	</div>
 </div>
