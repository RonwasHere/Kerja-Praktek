<!DOCTYPE html>
<html>

<head>
  <title>Laporan</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--manggil css-->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/css/style.css">


  <!--css untuk dtabel export-->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">

  <!-- Bootstrap core JavaScript -->

  <link rel="stylesheet" href="<?php echo base_url(); ?>/css/jquery.dataTables.css">
  <!--4-->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/css/dataTables.bootstrap.css">
  <!--5-->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/css/bootstrap.css">
  <!--5-->

</head>

<body>

  <div class="sidebar">
    <a href="<?php echo base_url(); ?>Welcome">daftar karyawan</a>
    <a href="<?php echo base_url(); ?>Welcome/dua">daftar jadwal</a>
    <a href="<?php echo base_url(); ?>Welcome/tiga">daftar kehadiran</a>
    <a class="active" href="<?php echo base_url(); ?>Welcome/empat">daftar laporan</a>
  </div>

  <div class="content">
    <!--TABEL KARYAWAN-->

    <h3>DAFTAR LAPORAN PRESENSI</h3> &emsp;
    <!--<button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#addModal">Add New Karyawan</button>-->
    <table class="table table-striped " cellspacing="0" width="100%" id="mydata">
      <thead>
        <tr>
          <th class="th-sm">NAMA</th>
          <th class="th-sm">CHECK IN</th>
          <th class="th-sm">CHECK OUT</th>
          <th class="th-sm">STATUS</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($kehadiran as $row) { ?>
          <!-- DAFTAR LAPORAN PRESENSI-->
          <tr>

            <td><?= $row->nama; ?></td>
            <td><?= $row->check_in; ?></td>
            <td><?= $row->check_out; ?></td>
            <td><?= $row->status_check_in; ?></td>

          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

</body>
<script src="<?php echo base_url(); ?>/js/jquery-2.1.4.min.js"></script>
<!--1-->
<script src="<?php echo base_url(); ?>/js/bootstrap.js"></script>
<!--1-->
<script src="<?php echo base_url(); ?>/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>/js/jquery.dataTables.js"></script>
<!--2-->
<script src="<?php echo base_url(); ?>/js/jquery.dataTables.min.js"></script>
<!--2-->

<!--js untuk export excel-->


<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>


<script>
  $(document).ready(function() {
    $('#mydata').DataTable({
      dom: 'Bfrtip',
      buttons: [
        'excel', 'pdf'
      ]
    });
  });
</script>

</html>