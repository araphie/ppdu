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

<h3>FORMULIR INPUT DATA PEGAWAI BARU</h3>

	    <?php 	if(isset($error)) 
	    			echo '<div class="alert alert-error" >'.$error.'</div>'; 
	    		if(validation_errors())	
	    			echo '<div class="alert alert-error" >'.validation_errors().'</div>';?>
    	
		<?php if(isset($success)) echo '<div class="alert alert-success" >'.$success.'</div>';?>
    
<?php
	echo form_open_multipart('pegawai/tambahPegawai');
?>

<table>
<tr><td>Unit Pendidikan</td><td>:</td><td>
<select name="unit">
<option value=1 >MIN Darul 'Ulum</option>
<option value=2 >MTsN Darul 'Ulum</option>
<option value=3 >MTs Plus Darul 'Ulum</option>
<option value=4 >SMP Darul 'Ulum 1 Unggulan</option>
<option value=5 >SMPN 3 Darul 'Ulum Unggulan RSBI</option>
<option value=6 >MAN Darul 'Ulum</option>
<option value=7 >MA Unggulan Darul 'Ulum</option>
<option value=8 >SMA Darul 'Ulum 1 Unggulan BPPT</option>
<option value=9 >SMA Darul 'Ulum 2 Unggulan BPPT RSBI</option>
<option value=10 >SMA Darul 'Ulum 3</option>
<option value=11 >SMK Darul 'Ulum 1</option>
<option value=12 >SMK Telkom Darul 'Ulum</option>
</select></td></tr>

<tr><td>NIB</td><td>:</td><td><input type="text" name="nib"></td></tr>
<tr><td>Nama</td><td>:</td><td><input type="text" name="nama"></td></tr>
<tr><td>Jenis Pegawai</td><td>:</td><td><select name="jenis_pegawai">
<option value="3">Guru</option>
<option value="2">Karyawan</option>
<option value="1">Majelis Pimpinan</option>
</select></td></tr>

<tr><td>NIP</td><td>:</td><td><input type="text" name="nip"></td></tr>
<tr><td>NUPTK :</td><td>:</td><td><input type="text" name="nuptk"></td></tr>
<tr><td>No. KTP</td><td>:</td><td><input type="text" name="no_ktp"></td></tr>
<tr><td>Alamat</td><td>:</td><td><textarea name="alamat"></textarea></td></tr>
<tr><td>Kode Pos</td><td>:</td><td><input type="text" name="kode_pos"></td></tr>
<tr><td>Tempat Lahir</td><td>:</td><td><input type="text" name="tempat_lahir"></td></tr>
<tr><td>Tanggal Lahir</td><td>:</td><td>
<div class="input-append date" id="dp1" data-date="<?php echo date("d-m-Y");?>" data-date-format="dd-mm-yyyy">
<input class="span2" style="width:180px" size="16" type="text" value="<?php echo date("d-m-Y"); ?>" readonly="" name="tanggal_lahir">
<span class="add-on"><i class="icon-th"></i></span>
</div>
</td></tr>

<tr><td>Jenis Kelamin</td><td>:</td><td><select name="jenis_kelamin">
<option value="L">Laki-Laki</option>
<option value="P">Perempuan</option>
</select></td></tr>

<tr><td>Status Perkawinan</td><td>:</td><td><select name="status_perkawinan">
<option>Kawin</option>
<option>Belum Kawin</option>
</select></td></tr>

<tr><td>Nama Pasangan</td><td>:</td><td><input type="text" name="nama_pasangan"></td></tr>
<tr><td>Jumlah Anak</td><td>:</td><td><input type="text" name="jumlah_anak"></td></tr>

<tr><td>Gol Darah
</td><td>:</td><td><select name="golongan_darah">
<option>O</option>
<option>A</option>
<option>B</option>
<option>AB</option>
</select>
</td></tr>

<tr><td>No. Telp/HP</td><td>:</td><td><input type="text" name="telepon"></td></tr>
<tr><td>Email</td><td>:</td><td><input type="text" name="email"></td></tr>
<tr><td>No. Karpeg</td><td>:</td><td><input type="text" name="no_karpeg"></td></tr>
<tr><td>No. Taspen</td><td>:</td><td><input type="text" name="no_taspen"></td></tr>
<tr><td>NPWP</td><td>:</td><td><input type="text" name="npwp"></td></tr>
<tr><td>Nama Ayah</td><td>:</td><td><input type="text" name="nama_ayah"></td></tr>
<tr><td>Nama Ibu</td><td>:</td><td><input type="text" name="nama_ibu" ></td></tr>
<tr><td>Foto</td><td>:</td><td><input type='file' name='userfile'></td></tr>

<tr><td><input type="submit" value="Simpan"></td><td></td><td></td></tr>
</table>
</form>

</div>
</div>
</div>
</body>

<script>
    
    $(function(){
    	window.prettyPrint && prettyPrint();
        $('#dp1').datepicker();
    });
</script>

</html>