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

<h3>FORMULIR UPDATE DATA PEGAWAI</h3>
<strong><a href="<?php echo base_url().'index.php/pegawai/displayDaftarPegawai'?>">[Daftar Pegawai]</a></strong>
<br><br><br>
	    <?php 	if(isset($error)) 
	    			echo '<div class="alert alert-error" >'.$error.'</div>'; 
	    		if(validation_errors())	
	    			echo '<div class="alert alert-error" >'.validation_errors().'</div>';?>
    	
		<?php if(isset($success)) echo '<div class="alert alert-success" >'.$success.'</div>';?>
    
<?php echo form_open('pegawai/updatePegawai');?>

<?php if(isset($pegawai->NIB)){?>

<table>
	<input type="hidden" name="nib_lama" value="<?php echo $pegawai->NIB;?>">
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

<tr><td>NIB</td><td>:</td><td><input type="text" name="nib" value="<?php echo $pegawai->NIB;?>"></td></tr>
<tr><td>Nama</td><td>:</td><td><input type="text" name="nama" value="<?php echo $pegawai->Nama;?>"></td></tr>
<tr><td>Jenis Pegawai</td><td>:</td><td><select name="jenis_pegawai">
<option <?php echo $pegawai->JenisPegawai==3 ? 'selected=selected' : '';?> value="3">Guru</option>
<option <?php echo $pegawai->JenisPegawai==2 ? 'selected=selected' : '';?> value="2">Karyawan</option>
<option <?php echo $pegawai->JenisPegawai==1 ? 'selected=selected' : '';?> value="1">Majelis Pimpinan</option>
</select></td></tr>

<tr><td>NIP</td><td>:</td><td><input type="text" name="nip" value="<?php echo $pegawai->NIP;?>"></td></tr>
<tr><td>NUPTK :</td><td>:</td><td><input type="text" name="nuptk" value="<?php echo $pegawai->NUPTK;?>"></td></tr>
<tr><td>No. KTP</td><td>:</td><td><input type="text" name="no_ktp" value="<?php echo $pegawai->NoKTP;?>"></td></tr>
<tr><td>Alamat</td><td>:</td><td><textarea name="alamat"><?php echo $pegawai->AlamatRumah;?></textarea></td></tr>
<tr><td>Kode Pos</td><td>:</td><td><input type="text" name="kode_pos" value="<?php echo $pegawai->KodePos;?>"></td></tr>
<tr><td>Tempat Lahir</td><td>:</td><td><input type="text" name="tempat_lahir" value="<?php echo $pegawai->TempatLahir;?>"></td></tr>
<tr><td>Tanggal Lahir</td><td>:</td><td>
<div class="input-append date" id="dp1" data-date="<?php echo date("d-m-Y");?>" data-date-format="dd-mm-yyyy">
<input class="span2" style="width:180px" size="16" type="text" value="<?php 
$tanggal_lahir = explode('-', $pegawai->TanggalLahir);
$tanggal_lahir = $tanggal_lahir[2].'-'.$tanggal_lahir[1].'-'.$tanggal_lahir[0];
echo $tanggal_lahir;?>" readonly="" name="tanggal_lahir">
<span class="add-on"><i class="icon-th"></i></span>
</div>
</td></tr>

<tr><td>Jenis Kelamin</td><td>:</td><td>
	<select name="jenis_kelamin" value="<?php echo $pegawai->JenisKelamin;?>">
<option <?php echo $pegawai->JenisKelamin=='L' ? 'selected=selected' : '';?> value="L">Laki-Laki</option>
<option <?php echo $pegawai->JenisKelamin=='P' ? 'selected=selected' : '';?> value="P">Perempuan</option>
</select></td></tr>

<tr><td>Status Perkawinan</td><td>:</td><td><select name="status_perkawinan">
<option <?php echo $pegawai->StatusPerkawinan=='Kawin' ? 'selected=selected' : '';?> >Kawin</option>
<option <?php echo $pegawai->StatusPerkawinan=='Belum Kawin' ? 'selected=selected' : '';?> >Belum Kawin</option>
</select></td></tr>

<tr><td>Nama Pasangan</td><td>:</td><td><input type="text" name="nama_pasangan" value="<?php echo $pegawai->NamaPasangan;?>"></td></tr>
<tr><td>Jumlah Anak</td><td>:</td><td><input type="text" name="jumlah_anak" value="<?php echo $pegawai->JumlahAnak;?>"></td></tr>

<tr><td>Gol Darah
</td><td>:</td><td><select name="golongan_darah">
<option <?php echo $pegawai->GolonganDarah=='O' ? 'selected=selected' : '';?> >O</option>
<option <?php echo $pegawai->GolonganDarah=='A' ? 'selected=selected' : '';?> >A</option>
<option <?php echo $pegawai->GolonganDarah=='B' ? 'selected=selected' : '';?> >B</option>
<option <?php echo $pegawai->GolonganDarah=='AB' ? 'selected=selected' : '';?> >AB</option>
</select>
</td></tr>

<tr><td>No. Telp/HP</td><td>:</td><td><input type="text" name="telepon" value="<?php echo $pegawai->Telepon;?>"></td></tr>
<tr><td>Email</td><td>:</td><td><input type="text" name="email" value="<?php echo $pegawai->Email;?>"></td></tr>
<tr><td>No. Karpeg</td><td>:</td><td><input type="text" name="no_karpeg" value="<?php echo $pegawai->NoKarpeg;?>"></td></tr>
<tr><td>No. Taspen</td><td>:</td><td><input type="text" name="no_taspen" value="<?php echo $pegawai->NoTaspen;?>"></td></tr>
<tr><td>NPWP</td><td>:</td><td><input type="text" name="npwp" value="<?php echo $pegawai->NPWP;?>"></td></tr>
<tr><td>Nama Ayah</td><td>:</td><td><input type="text" name="nama_ayah" value="<?php echo $pegawai->NamaAyah;?>"></td></tr>
<tr><td>Nama Ibu</td><td>:</td><td><input type="text" name="nama_ibu" value="<?php echo $pegawai->NamaIbu;?>"></td></tr>
<tr><td><input type="submit" value="Ubah"></td><td></td><td></td></tr>
</table>

</form>

<?php echo form_open_multipart('pegawai/ubahFotoPegawai');?>
<h4>Ubah Foto</h4>
<table>
	<input type="hidden" name="nib_lama_foto" value="<?php echo $pegawai->NIB;?>">
	<tr><td>Foto</td><td>:</td><td><img src="<?php echo base_url().'/foto/'.$pegawai->Foto;?>" height="100" width="100"></td></tr>
	<tr><td></td><td></td><td><input type="file" name="userfile" ></td></tr>
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

<script>
    
    $(function(){
    	window.prettyPrint && prettyPrint();
        $('#dp1').datepicker();
    });
</script>


</body>
</html>