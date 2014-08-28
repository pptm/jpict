<?php


$logins = $this->session->userdata('logmasuk');
	
	$this->load->model('data');

	$name = $this->data->get_sistem_name();
	$logo = $this->data->get_sistem_logo();
?>

<header class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
          
            <div class="navbar-brand">
		<img src="<?php echo $logo; ?>" alt="jata" width="42" height="38"> <?php echo $name; ?></div>
        </div>
        <nav class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
               

            </ul>
            <ul class="nav navbar-nav navbar-right">
               
			<?php if ($logins){ ?> 
			<div class="navbar-brand">
			<a href="index.php/keluar" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-off"></span> Keluar</a>
			</div>
			<?php } ?>
		
            </ul>
        </nav>
    </div>

</header>