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
<h3>DAFTAR PEGAWAI PPDU</h3>

<a href="<?php echo base_url().'index.php/pegawai/displayTambahPegawai'; ?>" alt="Tambah Pegawai">[Tambah Pegawai]</a>

<?php if($daftar_pegawai->num_rows() > 0){?>

<table border="1">

<thead> 
<tr>
	<th>No.</th>
	<th>NIB</th>
	<th>Nama Pegawai</th>
	<th>JK</th>
	<th>Tempat Lahir</th>
	<th>Tanggal Lahir</th>
	<th>Aksi</th>
	</tr>
</thead> 
<tbody>
<?php 
$counter=1;
foreach($daftar_pegawai->result() as $row){ ?>
	<tr>
	<td><?php echo $counter;$counter++?></td>	
	<td><?php echo $row->NIB; ?></td>
	<td><?php echo $row->Nama; ?></td>
	<td><?php echo $row->JenisKelamin; ?></td>
	<td><?php echo $row->TempatLahir; ?></td>
	<td><?php echo $row->TanggalLahir; ?></td>
  	<td align="center">
	&nbsp<a href="<?php echo base_url().'index.php/pegawai/displayUpdatePegawai/'.$row->NIB; ?>" alt="Detail">[Detail]</a>&nbsp
	<a href="<?php echo base_url().'index.php/pegawai/hapusPegawai/'.$row->NIB; ?>" alt="Hapus" onclick="return confirm(&quot;Anda yakin ingin menghapus <?php echo $row->Nama?> ?&quot;)" >[Hapus]</a>&nbsp
	</td>
	</tr>
<?php } 

}?> 
</tbody>

</table>

</div>
</div>
</div>

</body>
</html>	