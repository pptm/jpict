<!DOCTYPE html>
<html lang="my">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo "JPICT JKKP HQ"; ?></title>

        <meta name="description" content="<?php echo $description; ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Extra metadata -->
        <?php echo $metadata; ?>
        <!-- / -->

        <!-- favicon.ico and apple-touch-icon.png -->

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="<?php echo assets_url('css/bootstrap.min.css'); ?>">
        <!-- Custom styles -->
        <link rel="stylesheet" href="<?php echo assets_url('css/main.css'); ?>">
	<link rel="stylesheet" href="<?php echo assets_url('css/jquery-ui.css'); ?>">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo assets_url('css/bootstrap-datetimepicker.min.css'); ?>">
        
        
        
        <?php echo $css; ?>
        <!-- / -->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="<?php echo assets_url('js/html5shiv.min.js'); ?>"></script>
            <script src="<?php echo assets_url('js/respond.min.js'); ?>"></script>
        <![endif]-->
	<script src="<?php echo assets_url('js/tinymce/tinymce.min.js'); ?>"></script>
	<script type="text/javascript">
tinymce.init({
    selector: "textarea"
 });
</script>
	
  	<script src="<?php echo assets_url('js/jquery.js'); ?>"></script>
    </head>
    <body>

        <?php echo $body; ?>
        <!-- / -->

        <script src="<?php echo assets_url('js/jquery.min.js'); ?>"></script>
        <script src="<?php echo assets_url('js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo assets_url('js/main.js'); ?>"></script>
     <script src="<?php echo assets_url('js/bootstrap-typeahead.js') ?>"></script> 
     <script src="<?php echo assets_url('js/bootstrap-datetimepicker.min.js'); ?>"></script>
   
	<script src="<?php echo assets_url('js/jquery-ui.js'); ?>"></script>
	<script src="<?php echo assets_url('js/jquery-ui.min.js'); ?></script>
        <!-- Extra javascript -->
        <?php echo $js; ?>
        <!-- / -->

       
    </body>
</html>