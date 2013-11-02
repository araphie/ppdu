<html>
<head>
<title>SIM Kepegawaian PPDU</title>

<link href="<?php echo base_url(); ?>public/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>public/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>public/css/datepicker.css" rel="stylesheet">

<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/bootstrap-datepicker.js"></script>      
</head>

<body>

<div class="container">
<div class="row">
<div class="span12">	

<h3>FORMULIR TAMBAH PENGGUNA BARU</h3>

	    <?php 	if(isset($error)) 
	    			echo '<div class="alert alert-error" >'.$error.'</div>'; 
	    		if(validation_errors())	
	    			echo '<div class="alert alert-error" >'.validation_errors().'</div>';?>
    	
		<?php if(isset($success)) echo '<div class="alert alert-success" >'.$success.'</div>';?>
    
<?php
	echo form_open_multipart('user/adduser');
?>

<table>
<tr><td>Nama Lengkap</td><td>:</td><td><input type="text" name="nama"></td></tr>
<tr><td>Username</td><td>:</td><td><input type="text" name="username"></td></tr>
<tr><td>Password</td><td>:</td><td><input type="password" name="password"></td></tr>
<tr><td>Confirm Password</td><td>:</td><td><input type="password" name="passconf"></td></tr>
<tr><td>Email</td><td>:</td><td><input type="text" name="email"></td></tr>
<tr><td>Role</td><td>:</td><td><select name="role">
	<option value="3">Administrator</option>
	<option value="2">Pegawai</option>
	<option value="1">Operator</option>
</select></td></tr>
<input type="hidden" name="status" value="1" />

<tr><td><input type="submit" value="Simpan"></td><td></td><td></td></tr>
</table>
</form>

</div>
</div>
</div>
</body>
</html>