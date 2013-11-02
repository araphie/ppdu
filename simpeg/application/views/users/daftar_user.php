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

<a href="<?php echo base_url().'index.php/user/displayTambahUser'; ?>" alt="Tambah Pegawai">[Tambah Pegawai]</a>

<?php if($users->num_rows() > 0){?>

<table border="1">

<thead> 
<tr>
	<th>No.</th>
	<th>Username</th>
	<th>nama</th>
	<th>Email</th>
	<th>id_role Pegawai</th>
	<th>status</th>
	<th>Aksi</th>
	</tr>
</thead> 
<tbody>
<?php 
$counter=1;
foreach($users->result() as $row){ ?>
	<tr>
	<td><?php echo $counter;$counter++?></td>	
	<td><?php echo $row->username; ?></td>
	<td><?php echo $row->nama; ?></td>
	<td><?php echo $row->email; ?></td>
	<td><?php echo $row->id_role; ?></td>
	<td><?php echo $row->status; ?></td>
	<td align="center">
		&nbsp<a href="<?php echo base_url().'index.php/user/displayEditUser/'.$row->id; ?>" alt="Detail">[Ubah]</a>&nbsp
		<a href="<?php echo base_url().'index.php/user/deleteUser/'.$row->id; ?>" alt="Hapus" onclick="return confirm(&quot;Anda yakin ingin menghapus <?php echo $row->username?> ?&quot;)" >[Hapus]</a>&nbsp
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