<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                Tabel Pengeluaran Kas
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <th>Jumlah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $no = 1;
                            require 'config.php';

                            $sql = $link->query("SELECT * FROM kas WHERE jenis = 'Keluar'");
                            while ($data = $sql->fetch_assoc()) {

                            ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $data['kode']; ?></td>
                                    <td><?php echo date('d F Y', strtotime($data['tgl'])); ?></td>
                                    <td><?php echo $data['keterangan']; ?></td>
                                    <td align="right"><?php echo number_format($data['keluar']) . ",-"; ?></td>
                                    <td>
                                        <a class="btn btn-primary" id="edit_data" data-toggle="modal" data-target="#edit" data-id="<?php echo $data['kode'] ?>" data-ket="<?php echo $data['keterangan'] ?>" data-tgl="<?php echo $data['tgl'] ?>" data-jml="<?php echo $data['keluar'] ?>">
                                            <i class="fa fa-edit"></i>Edit
                                        </a>
                                        <a onclick="return confirm('Yakin Akan Menghapus Data?')" href="?page=keluar&aksi=hapus&id=<?php echo $data['kode']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i>Hapus</a>
                                    </td>
                                </tr>

                            <?php

                                $total += $data['keluar'];
                            }
                            ?>

                        </tbody>
                        <tr>
                            <th colspan="4" style="text-align:center; font-size:17px">Total Kas Keluar</th>
                            <th style="font-size:16px; text-align: right">
                                <?php
                                echo "Rp." . number_format($total) . ",-"; ?></th>
                        </tr>
                    </table>
                </div>


                <!-- HALAMAN TAMBAH -->

                <div class="panel-body">
                    <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">
                        Tambah Data
                    </button>
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Form Tambah Data</h4>
                                </div>
                                <div class="modal-body">
                                    <form role="form" method="POST">

                                        <div class="form-group">
                                            <label>Kode</label>
                                            <input class="form-control" name="kode" placeholder="Input Kode" />
                                        </div>

                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <textarea class="form-control" name="ket" id="" rows="3"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <input class="form-control" name="tgl" type="date" placeholder="Input Tanggal" />
                                        </div>

                                        <div class="form-group">
                                            <label>Jumlah</label>
                                            <input class="form-control" type="number" name="jml" placeholder="Input Jumlah" />
                                        </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                    <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                                </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

                <?php

                if (isset($_POST['simpan'])) {
                    $kode = $_POST['kode'];
                    $ket = $_POST['ket'];
                    $tgl = $_POST['tgl'];
                    $jml = $_POST['jml'];

                    $sql = $link->query("INSERT INTO kas (kode, keterangan, tgl, jumlah, jenis, keluar)VALUES('$kode','$ket','$tgl',0,'keluar','$jml')");
                    if ($sql) {
                ?>
                        <script type="text/javascript">
                            alert("Simpan Data Berhasil");
                            window.location.href = "?page=keluar";
                        </script>
                <?php

                    }
                }
                ?>

                <!-- HALAMAN UBAH -->

                <div class="panel-body">
                    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Form Ubah Data</h4>
                                </div>
                                <div class="modal-body" id="modal_edit">
                                    <form role="form" method="POST">

                                        <div class="form-group">
                                            <label>Kode</label>
                                            <input class="form-control" name="kode" placeholder="Input Kode" id="kode" readonly />
                                        </div>

                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <textarea class="form-control" name="ket" id="ket" rows="3"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <input class="form-control" name="tgl" type="date" id="tgl" placeholder="Input Tanggal" />
                                        </div>

                                        <div class="form-group">
                                            <label>Jumlah</label>
                                            <input class="form-control" type="number" id="jml" name="jml" placeholder="Input Jumlah" />
                                        </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                    <input type="submit" name="ubah" value="Ubah" class="btn btn-primary">
                                </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

                <script src="assets/js/jquery-1.10.2.js"></script>
                <script type="text/javascript">
                    $(document).on("click", "#edit_data", function() {
                        var kode = $(this).data('id')
                        var ket = $(this).data('ket')
                        var tgl = $(this).data('tgl')
                        var jml = $(this).data('jml')

                        $("#modal_edit #kode").val(kode);
                        $("#modal_edit #ket").val(ket);
                        $("#modal_edit #tgl").val(tgl);
                        $("#modal_edit #jml").val(jml);
                    })
                </script>

                <?php
                if (isset($_POST['ubah'])) {
                    $kode = $_POST['kode'];
                    $ket = $_POST['ket'];
                    $tgl = $_POST['tgl'];
                    $jml = $_POST['jml'];

                    $sql = $link->query("UPDATE kas SET keterangan = '$ket', tgl = '$tgl', jumlah = 0, jenis='keluar', keluar='$jml' WHERE kode = '$kode'");
                    if ($sql) {
                ?>
                        <script type="text/javascript">
                            alert("Ubah Data Berhasil");
                            window.location.href = "?page=keluar";
                        </script>
                <?php
                    }
                }
                ?>

            </div>
        </div>
    </div>
</div>