<html>

<head>
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>css/style2.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>css/select2.min.css">
	<!--manggil bootstrap-->
	<link rel="stylesheet" href="<?= base_url(); ?>css/bootstrap.min.css">

	<!-- Bootstrap core JavaScript -->
	<script src="<?= base_url(); ?>js/jquery.min.js"></script>
	<script src="<?= base_url(); ?>js/bootstrap.min.js"></script>
	<script src="<?= base_url(); ?>js/select2.min.js"></script>

</head>

<body>
	<?php if (isset($_SESSION['gagal'])) :  ?>
		<script>
			alert('*ERROR* Pegawai telah melakukan absensi hari ini.');
		</script>
	<?php endif ?>

	<?php if (isset($_SESSION['berhasil'])) :  ?>
		<script type='text/javascript'>
			$(document).ready(function() {
				$('#exampleModal').modal('show');
			});
		</script>
	<?php endif ?>

	<?php if (isset($_SESSION['gagalKosong'])) :  ?>
		<script>
			alert('Belum memilih karyawan.');
		</script>"
	<?php endif ?>

	<h1>Halaman Log Presensi Karyawan</h1>

	<div class="kotak_login">
		<p class="tulisan_login">Silahkan Presensi</p>
		<form action="<?= base_url(); ?>index.php/Welcome/savelogin" method="post">
			<div class="form-group">
				<select class="form-select" id="karyawan" name="karyawan" aria-label="Select Karyawan" style="width: 30ch;" required>
					<option value="">--Nama Karyawan--</option>
					<?php foreach ($karyawan as $kr) : ?>
						<option value="<?= $kr['ID_KARYAWAN']; ?>"> <?= $kr['NAMA']; ?> </option>
					<?php endforeach; ?>
				</select>
			</div>
			<!-- Trigger/Open The Modal -->
			<button type="submit" class="btn btn-primary" value="Simpan" id="btn_checkin">CHECK IN</button>
			&emsp;&emsp;
			<button class="btn btn-primary" id="btn_checkout">CHECK OUT</button>

			<br />
			<br />
		</form>
	</div>
	<!-- The Modal -->
	<!-- Button trigger modal -->


	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Presensi Karyawan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					Terima Kasih telah Check in / Check out Presensi Kehadiran
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<!--<button type="button" class="btn btn-primary">Save changes</button>-->
				</div>
			</div>
		</div>
	</div>

	<script>
		$('#btn_checkout').on('click', function() {
			$.ajax({
				type: "POST",
				url: "<?= base_url(); ?>index.php/Welcome/upcheckout",
				dataType: "JSON",
				data: {
					id_pegawai: $('#karyawan option:selected').val()
				},
				success: function(data) {
					if (data) {
						$(document).ready(function() {
							$('#exampleModal').modal('show');
						});
					} else {
						alert('*ERROR* Pegawai belum melakukan absensi atau Pegawai telah melakukan Checkout.');
					}
				}
			});
			return false;
		});

		// Select 2
		$(document).ready(function() {
			$('#karyawan').select2();
		});
	</script>
</body>

</html>