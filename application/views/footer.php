<?php

	$this->load->model('data');
	$footer = $this->data->get_sistem_footer();
	
?>

<div id="footer">
    <div class="container">
        <p class="footer-content"><?php echo $footer; ?></p>
    </div>
</div>