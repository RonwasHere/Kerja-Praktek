<!DOCTYPE html>
<html>

<head>
    <title>Jadwal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--manggil css-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/style.css">
    <!--manggil bootstrap-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/bootstrap.min.css">
    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url(); ?>/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="sidebar">
        <a href="<?php echo base_url(); ?>Welcome">daftar karyawan</a>
        <a class="active" href="<?php echo base_url(); ?>Welcome/">daftar jadwal</a>
        <a href="<?php echo base_url(); ?>Welcome/tiga">daftar kehadiran</a>
        <a href="<?php echo base_url(); ?>Welcome/empat">daftar laporan</a>
    </div>

    <div class="content">
        <!--daftar JADWAL-->

        <h3>Tabel JADWAL</h3> &emsp; 
		<!--<button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#addModal">Add New Jadwal</button>-->
        <table id="customers">
            <tr>
                <th>ID JADWAL</th>
                <th>HARI</th>
                <th>JAM MASUK </th>
                <th>JAM KELUAR</th>
                <th>STATUS</th>
                <!--<th>PILIHAN</th>-->
            </tr>
            <tbody>
                <?php foreach ($jadwal as $row) { ?>
                    <tr>
                        <td><?= $row->ID_JADWAL; ?></td>
                        <td><?= $row->HARI; ?></td>
                        <td><?= $row->JAM_MASUK; ?></td>
                        <td><?= $row->JAM_KELUAR; ?></td>
                        <td><?= $row->STATUS; ?></td> 
                        <!--<td><a type="text" class="btn btn-primary" data-toggle="modal" data-target="#editModal<?= $row->ID_JADWAL; ?>">Edit</a>
                            <a type="text" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $row->ID_JADWAL; ?>">Delete</a>
                        </td>-->
                    </tr>
                <?php } ?>

            </tbody>

        </table>
        <!-- Modal Add Product-->
        <form action="<?php echo base_url(); ?>index.php/Welcome/savejad" method="post">
            <!--daftar JADWAL-->
            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add New Jadwal</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">

                            <div class="form-group">
                                <label>Id Jadwal</label>
                                <input type="text" class="form-control" name="id_jad" placeholder="Id Jadwal">
                            </div>

                            <div class="form-group">
                                <label>Hari</label>
                                <input type="text" class="form-control" name="ha" placeholder="Nama">
                            </div>
                            <div class="form-group">
                                <label>Jam Masuk </label>
                                <input type="text" class="form-control" name="j_m" placeholder="Jam Masuk">
                            </div>
                            <div class="form-group">
                                <label>Jam Keluar</label>
                                <input type="text" class="form-control" name="j_k" placeholder="Jam Keluar">
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <input type="text" class="form-control" name="sta" placeholder="Status">
                            </div>
                            <div class="form-group">
                                <label>Id Karyawan</label>
                                <input type="text" class="form-control" name="id_kar" placeholder="Id Karyawan">
                            </div>
                            <div class="form-group">
                                <label>Id Presensi</label>
                                <input type="text" class="form-control" name="id_p" placeholder="Id Presensi">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- End Modal Add Product-->
        <!--MODAL EDIT (UPDATE)-->
        <?php $no = 0;
        foreach ($jadwal as $row) : $no++; ?>
            <form action="<?php echo base_url(); ?>index.php/Welcome/update_jad" method="post">
                <div class="modal fade" id="editModal<?= $row->ID_JADWAL; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Jadwal</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="form-group">
                                    <label>Id Jadwal</label>
                                    <input type="text" class="form-control nama pelanggan" name="idjad" placeholder="Id Jadwal" value="<?= $row->ID_JADWAL; ?>">

                                </div>
                                <div class="form-group">
                                    <label>Hari</label>
                                    <input type="text" class="form-control tahun lahir" name="hari" placeholder="Hari" value="<?= $row->HARI; ?>">

                                </div>
                                <div class="form-group">
                                    <label>Jam Masuk</label>
                                    <input type="text" class="form-control no telp" name="jammasuk" placeholder="Jam Masuk" value="<?= $row->JAM_MASUK; ?>">

                                </div>
                                <div class="form-group">
                                    <label>Jam Keluar</label>
                                    <input type="text" class="form-control alamat" name="jamkeluar" placeholder="Jam Keluar" value="<?= $row->JAM_KELUAR; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <input type="text" class="form-control id pelanggan" name="status" placeholder="Status" value="<?= $row->STATUS; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Id Karyawan</label>
                                    <input type="text" class="form-control id pelanggan" name="idkaryawan" placeholder="Id Karyawan" value="<?= $row->ID_KARYAWAN; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Id Presensi</label>
                                    <input type="text" class="form-control id pelanggan" name="idpresensi" placeholder="Id Presensi" value="<?= $row->ID_PRESENSI; ?>">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        <?php endforeach; ?>
        <!--End Modal Edit Data-->
        <!-- Modal Delete Karyawan-->
        <?php $no = 0;
        foreach ($jadwal as $row) : $no++; ?>
            <form action="<?php echo base_url(); ?>index.php/Welcome/hapus_j" method="post">
                <div class="modal fade" id="deleteModal<?= $row->ID_JADWAL; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete Jadwal</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <h4>Apakah Anda ingin delete data jadwal?</h4>

                            </div>
                            <div class="modal-footer">
                                <input type="hidden" class="form-control id pelanggan" name="idhapus_j" placeholder="ID karyawan" value="<?= $row->ID_JADWAL; ?>">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <button type="submit" class="btn btn-primary">Yes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        <?php endforeach; ?>
        <!-- End Modal Delete Product-->

    </div>

</body>

</html>