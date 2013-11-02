<html>
<head>
<title>SIM Kepegawaian PPDU</title>

<link href="<?php echo base_url(); ?>public/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>public/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/bootstrap.js"></script>

<body>

<div class="container">
<div class="row">
<div class="span12">    

<h3>FORMULIR UPDATE DATA PENGGUNA</h3>
<strong><a href="<?php echo base_url().'index.php/user/viewUser'?>">[Daftar User]</a></strong>
<br><br>
        <?php   if(isset($error)) 
                    echo '<div class="alert alert-error" >'.$error.'</div>'; 
                if(validation_errors()) 
                    echo '<div class="alert alert-error" >'.validation_errors().'</div>';?>
        
        <?php if(isset($success)) echo '<div class="alert alert-success" >'.$success.'</div>';?>
    
<?php echo form_open('user/editUser');?>

<?php if(isset($user->id)){?>

<table>
    <input type="hidden" name="id" value="<?php echo $user->id;?>">
<tr><td>Username</td><td>:</td><td><input type="text" name="username" value="<?php echo $user->username;?>"></td></tr>
<tr><td>Name </td><td>:</td><td><input type="text" name="nama" value="<?php echo $user->nama;?>"></td></tr>
<tr><td>Email</td><td>:</td><td><input type="text" name="email" value="<?php echo $user->email;?>"></td></tr>
<tr><td>Role</td><td>:</td><td>
<select name="id_role" value="<?php echo $user->id_role;?>">
    <option <?php echo $user->id_role=='3' ? 'selected=selected' : '';?> value="3">Administrator</option>
    <option <?php echo $user->id_role=='2' ? 'selected=selected' : '';?> value="2">Pegawai</option>
    <option <?php echo $user->id_role=='1' ? 'selected=selected' : '';?> value="1">Operator</option>
</select></td></tr>

<tr><td><input type="submit" value="Ubah"></td><td></td><td></td></tr>
</table>

</form>

<?php 
    } //end if
    else{
        echo '<div class="alert alert-warning" > Data pegawai tidak ditemukan.</div>';
    }
?>

</div>
</div>
</div>

</body>
</html>