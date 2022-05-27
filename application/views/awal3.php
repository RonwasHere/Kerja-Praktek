<!DOCTYPE html>
<html>

<head>
    <title>Kehadiran</title>
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
        <a href="<?php echo base_url(); ?>Welcome/dua">daftar jadwal</a>
        <a class="active" href="<?php echo base_url(); ?>Welcome/tiga">daftar kehadiran</a>
        <a href="<?php echo base_url(); ?>Welcome/empat">daftar laporan</a>
    </div>

    <div class="content">
        <!--daftar KEHADIRAN-->

        <h3>Tabel KEHADIRAN</h3> &emsp;<button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#addModal">Add New KEHADIRAN</button>
        <table id="customers">
            <tr>
                <th>ID PRESENSI</th>
                <th>TANGGAL</th>
                <th>CHECK IN </th>
                <th>STATUS CHECK IN</th>
                <th>CHECK OUT</th>
                <th>STATUS CHECK OUT</th>
                <th>CATATAN</th>
                <th>ID JADWAL</th>
                <th>PILIHAN</th>
            </tr>
            <tbody>
                <?php foreach ($kehadiran as $row) { ?>
                    <tr>
                        <td><?= $row->ID_PRESENSI; ?></td>
                        <td><?= $row->TANGGAL; ?></td>
                        <td><?= $row->CHECK_IN; ?></td>
                        <td><?= $row->STATUS_CHECK_IN; ?></td>
                        <td><?= $row->CHECK_OUT; ?></td>
                        <td><?= $row->STATUS_CHECK_OUT; ?></td>
                        <td><?= $row->CATATAN; ?></td>
                        <td><?= $row->ID_JADWAL; ?></td>
                        <td><a type="text" class="btn btn-primary" data-toggle="modal" data-target="#editModal<?= $row->ID_PRESENSI; ?>">Edit</a>

                            <a type="text" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $row->ID_PRESENSI; ?>">Delete</a>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>

        </table>
        <!-- Modal Add Product-->
        <form action="<?php echo base_url(); ?>Welcome/savekeh" method="post">
            <!--daftar KEHADIRAN---->
            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add New KEHADIRAN</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">

                            <div class="form-group">
                                <label>Id Presensi</label>
                                <input type="text" class="form-control" name="id_pre" placeholder="Id Presensi">
                            </div>

                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="text" class="form-control" name="tgl" placeholder="Tanggal">
                            </div>
                            <div class="form-group">
                                <label>Check In </label>
                                <input type="text" class="form-control" name="ci" placeholder="Check in">
                            </div>
                            <div class="form-group">
                                <label>Status Check In</label>
                                <input type="text" class="form-control" name="sci" placeholder="STATUS_CHECK_IN">
                            </div>
                            <div class="form-group">
                                <label>Check out</label>
                                <input type="text" class="form-control" name="co" placeholder="Check out">
                            </div>
                            <div class="form-group">
                                <label>Status Check out</label>
                                <input type="text" class="form-control" name="sto" placeholder="STATUS_CHECK_OUT">
                            </div>
                            <div class="form-group">
                                <label>Catatan</label>
                                <input type="text" class="form-control" name="cat" placeholder="catatan">
                            </div>
                            <div class="form-group">
                                <label>Id Jadwal</label>
                                <input type="text" class="form-control" name="id_j" placeholder="id jadwal">
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
        foreach ($kehadiran as $row) : $no++; ?>
            <form action="<?php echo base_url(); ?>Welcome/update_keh" method="post">
                <div class="modal fade" id="editModal<?= $row->ID_PRESENSI; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Kehadiran</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="form-group">
                                    <label>Id Presensi</label>
                                    <input type="text" class="form-control nama pelanggan" name="idpresensi" placeholder="Id Presensi" value="<?= $row->ID_PRESENSI; ?>">

                                </div>
                                <div class="form-group">
                                    <label>TANGGAL</label>
                                    <input type="text" class="form-control tahun lahir" name="tanggal" placeholder="TANGGAL" value="<?= $row->TANGGAL; ?>">

                                </div>
                                <div class="form-group">
                                    <label>CHECK_IN</label>
                                    <input type="text" class="form-control no telp" name="checkin" placeholder="CHECK_IN" value="<?= $row->CHECK_IN; ?>">

                                </div>
                                <div class="form-group">
                                    <label>STATUS_CHECK_IN</label>
                                    <input type="text" class="form-control alamat" name="statusci" placeholder="STATUS_CHECK_IN" value="<?= $row->STATUS_CHECK_IN; ?>">
                                </div>
                                <div class="form-group">
                                    <label>CHECK OUT</label>
                                    <input type="text" class="form-control id pelanggan" name="checkout" placeholder="CHECK_OUT" value="<?= $row->CHECK_OUT; ?>">
                                </div>
                                <div class="form-group">
                                    <label>STATUS_CHECK_OUT</label>
                                    <input type="text" class="form-control id pelanggan" name="statusco" placeholder="STATUS_CHECK_OUT" value="<?= $row->STATUS_CHECK_OUT; ?>">
                                </div>
                                <div class="form-group">
                                    <label>CATATAN</label>
                                    <input type="text" class="form-control id pelanggan" name="catatan" placeholder="CATATAN" value="<?= $row->CATATAN; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Id JADWAL</label>
                                    <input type="text" class="form-control id pelanggan" name="idjadwal" placeholder="Id JADWAL" value="<?= $row->ID_JADWAL; ?>">
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
        foreach ($kehadiran as $row) : $no++; ?>
            <form action="<?php echo base_url(); ?>Welcome/hapus_k" method="post">
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
                                <input type="hidden" class="form-control id pelanggan" name="idhapus_k" placeholder="ID karyawan" value="<?= $row->ID_JADWAL; ?>">
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