<!DOCTYPE html>
<html>

<head>
    <title>Data Karyawan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--manggil css-->
    <link rel="stylesheet" href="<?= base_url(); ?>css/style.css">
    <!--manggil bootstrap-->
    <link rel="stylesheet" href="<?= base_url(); ?>css/bootstrap.min.css">
    <!-- Bootstrap core JavaScript -->
    <script src="<?= base_url(); ?>js/jquery.min.js"></script>
    <script src="<?= base_url(); ?>js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="sidebar">
        <a class="active" href="#home">daftar karyawan</a>
        <a href="<?= base_url(); ?>Welcome/dua">daftar jadwal</a>
        <a href="<?= base_url(); ?>Welcome/tiga">daftar kehadiran</a>
        <a href="<?= base_url(); ?>Welcome/empat">daftar laporan</a>
    </div>

    <div class="content">
        <!--TABEL KARYAWAN-->

        <h3>Tabel Karyawan</h3> &emsp;<button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#addModal">Add New Karyawan</button>
        <table id="customers">
            <tr>
                <th>ID KARYAWAN</th>
                <th>NAMA</th>
                <th>TANGGAL LAHIR</th>
                <th>JENIS KELAMIN</th>
                <th>ALAMAT</th>
                <th>NO TELEPON</th>
                <th>PILIHAN</th>
            </tr>
            <tbody>
                <?php foreach ($karyawan as $row) { ?>
                    <!-- TABEL KARYAWAN-->
                    <tr>
                        <td><?= $row->ID_KARYAWAN; ?></td>
                        <td><?= $row->NAMA; ?></td>
                        <td><?= $row->TANGGAL_LAHIR; ?></td>
                        <td><?= $row->JENIS_KELAMIN; ?></td>
                        <td><?= $row->ALAMAT; ?></td>
                        <td><?= $row->NO_TELEPON; ?></td>
                        <td><a type="text" class="btn btn-primary" data-toggle="modal" data-target="#editModal<?= $row->ID_KARYAWAN; ?>">Edit</a>

                            <a type="text" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $row->ID_KARYAWAN; ?>">Delete</a>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>

        </table>
        <!-- Modal Add Product-->
        <!-- TABEL KARYAWAN-->
        <form action="<?= base_url(); ?>index.php/Welcome/save" method="post">
            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add New Karyawan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">

                            <div class="form-group">
                                <label>Id Karyawan</label>
                                <input type="text" class="form-control" name="id_kar" placeholder="Id Karyawan">
                            </div>

                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="na" placeholder="Hari">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="text" class="form-control" name="t_l" placeholder="Tanggal Lahir">
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <input type="text" class="form-control" name="jk" placeholder="Jenis Kelamin">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" name="alt" placeholder="Alamat">
                            </div>
                            <div class="form-group">
                                <label>No Telepon</label>
                                <input type="text" class="form-control" name="n_t" placeholder="No Telepon">
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
        foreach ($karyawan as $row) : $no++; ?>
            <form action="<?= base_url(); ?>index.php/Welcome/update" method="post">
                <div class="modal fade" id="editModal<?= $row->ID_KARYAWAN; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Karyawan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="form-group">
                                    <label>Id Karyawan</label>
                                    <input type="text" class="form-control nama pelanggan" name="idkar" placeholder="Id Karyawan" value="<?= $row->ID_KARYAWAN; ?>">

                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control tahun lahir" name="nama" placeholder="Nama" value="<?= $row->NAMA; ?>">

                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="text" class="form-control no telp" name="tgl" placeholder="Tanggal Lahir" value="<?= $row->TANGGAL_LAHIR; ?>">

                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <input type="text" class="form-control alamat" name="jenis" placeholder="Jenis Kelamin" value="<?= $row->JENIS_KELAMIN; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control id pelanggan" name="alamat" placeholder="Alamat" value="<?= $row->ALAMAT; ?>">
                                </div>
                                <div class="form-group">
                                    <label>No Telepon</label>
                                    <input type="text" class="form-control id pelanggan" name="notelp" placeholder="No Telepon" value="<?= $row->NO_TELEPON; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Id Jadwal</label>
                                    <input type="text" class="form-control id pelanggan" name="idjadwal" placeholder="Id Jadwal" value="<?= $row->ID_JADWAL; ?>">
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
        foreach ($karyawan as $row) : $no++; ?>
            <form action="<?= base_url(); ?>index.php/Welcome/hapus" method="post">
                <div class="modal fade" id="deleteModal<?= $row->ID_KARYAWAN; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete Karyawan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <h4>Apakah Anda ingin delete data karyawan?</h4>

                            </div>
                            <div class="modal-footer">
                                <input type="hidden" class="form-control id pelanggan" name="idhapus" placeholder="ID karyawan" value="<?= $row->ID_KARYAWAN; ?>">
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