<div class="sidebar hidden-print" id="sidebar" data-spy="affix">
    <ul class="nav sidenav">
	
    
<div class="panel panel-primary">
    <div class="panel-heading">LOGIN</div>
<div class="panel-body">


<?php echo form_open(''); ?>

    <!-- Inputs with different sizes -->
    <div class="form-group">
        <input class="form-control" type="text" name="email" placeholder="email">
    </div>
	<div class="form-group">
        <input class="form-control" type="password" name="katalaluan" placeholder="katalaluan">
    </div>
    

    <!-- Button -->
    <div class="form-group">
        <button class="btn btn-default" type="submit">Login</button>
    </div>

</form>
<?php echo validation_errors(); ?>
</div>
</div>

	




       
    </ul>
</div>