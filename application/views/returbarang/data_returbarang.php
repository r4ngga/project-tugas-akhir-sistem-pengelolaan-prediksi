<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <ol class="breadcrumb mb-4 mt-2">
                <li class="breadcrumb-item active"><a href="<?= base_url() ?>pengguna">Dashboard</a> </li>
                <li class="breadcrumb-item active" aria-current="page">Transaksi</li>
                <li class="breadcrumb-item" aria-current="page">Retur Barang</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <?= $this->session->flashdata('notify'); ?>
                    <form method="POST" action="">
                        <div class="form-row">
                            <div class="col-md-5 mr-4">
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="lbl_stoksemula">Nomer Nota</label>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <input class="form-control" placeholder="" id="keyword" name="keyword">
                                        </div>
                                        <div class="col">
                                            <label for="lbl_stoksemula"> &nbsp; </label>
                                            <button type="submit" name="" id="" class="btn btn-success btn-md ml-1">Cari Nomer Nota</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tglkeluarnya">Tanggal Barang Keluar</label> :
                                    <?php
                                    if ($this->input->post('keyword') == true) {
                                        if ($tb_brg_keluar > 0) {
                                            foreach ($tb_brg_keluar as $dtb) :
                                    ?>
                                                <label for="nomer_nota"><?php echo $dtb['tgl_keluar']; ?></label>
                                            <?php
                                                break;
                                            endforeach;
                                        } else {
                                            ?>
                                            <label for="nomer_nota"> - </label>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <label for="nomer_nota"> - </label>
                                    <?php
                                    }
                                    ?>
                                </div>

                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="id_user">Nomer Nota</label> :
                                    <?php
                                    if ($this->input->post('keyword') == true) {
                                        if ($tb_brg_keluar > 0) {
                                            foreach ($tb_brg_keluar as $dtb) :
                                    ?>
                                                <label for="nomer_nota"><?php echo $dtb['no_nota']; ?></label>
                                                <input type="text" class="form-control" name="no_nota" id="no_nota" value="<?php echo $dtb['no_nota']; ?>" hidden>
                                            <?php
                                                break;
                                            endforeach;
                                        } else {
                                            ?>
                                            <label for="nomer_nota"> - </label>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <label for="nomer_nota"> - </label>
                                    <?php
                                    }
                                    ?>
                                </div>

                                <div class="form-group">
                                    <label for="idpembeli">Id Pembeli</label> :
                                    <?php
                                    if ($this->input->post('keyword') == true) {
                                        if ($tb_brg_keluar > 0) {
                                            foreach ($tb_brg_keluar as $dtb) :
                                    ?>
                                                <label for="idpembeliset"><?php echo $dtb['id_pembeli']; ?></label>
                                                <input type="text" class="form-control" name="id_pembeli" id="id_pembeli" value="<?php echo $dtb['id_pembeli']; ?>" hidden>
                                            <?php
                                                break;
                                            endforeach;
                                        } else {
                                            ?>
                                            <label for="idpembeliset"> - </label>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <label for="idpembeliset"> - </label>
                                    <?php
                                    }
                                    ?>
                                </div>

                                <div class="form-group">
                                    <label for="idpembeli">Nama Pembeli yang mengembalikan</label> :
                                    <?php
                                    if ($this->input->post('keyword') == true) {
                                        if ($tb_brg_keluar > 0) {
                                            foreach ($tb_brg_keluar as $dtb) :
                                    ?>
                                                <label for="idpembeliset"><?php echo $dtb['nama_pembeli']; ?></label>
                                            <?php
                                                break;
                                            endforeach;
                                        } else {
                                            ?>
                                            <label for="namapembeliset"> - </label>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <label for="namapembeliset"> - </label>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-borderless" id="" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nomer Nota</th>
                                        <th>No Urut Keluar</th>
                                        <th>Id Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Harga Jual</th>
                                        <th>QTY Kembali</th>
                                        <th>Total Harga Jual</th>
                                        <th>Pilih</th>
                                    </tr>
                                </thead>

                                <?php
                                if ($this->input->post('keyword') == true) {
                                    if ($tb_brg_keluar > 0) {
                                        foreach ($tb_brg_keluar as $dtbk) : ?>
                                            <tbody>
                                                <tr>
                                                    <td> <?php echo $dtbk['no_nota']; ?> </td>
                                                    <td> <?php echo $dtbk['no_urut_keluar']; ?> </td>
                                                    <td> <?php echo $dtbk['id_barang']; ?> </td>
                                                    <td> <?php echo $dtbk['nama_barang']; ?> </td>
                                                    <td> <?php echo $dtbk['harga_jual']; ?> </td>
                                                    <td> <?php echo $dtbk['jumlah_brgkeluar']; ?> </td>
                                                    <td> <?php echo $dtbk['total_harga_jual']; ?> </td>
                                                    <td>
                                                        <a id="pilihbrgkembali" href="#" class="btn btn-success btn-sm ml-1" data-notakembali="<?= $dtbk['no_nota']; ?>" data-idbrgkembali="<?= $dtbk['id_barang']; ?>" data-nmbrgkembali="<?= $dtbk['nama_barang']; ?>" data-hrgjualkembali="<?= $dtbk['harga_jual']; ?>" data-qtybrgkembali="<?= $dtbk['jumlah_brgkeluar']; ?>" data-tothrgkembali="<?= $dtbk['total_harga_jual']; ?>" data-urutankeluar="<?= $dtbk['no_urut_keluar']; ?>">
                                                            Pilih
                                                        </a>
                                                    </td>
                                                </tr>

                                            </tbody>

                                        <?php endforeach;
                                    } else {
                                        ?>
                                        <div class="alert alert-danger" role="alert">
                                            Nomer Nota yang dicari tidak ditemukan!!
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                            </table>
                            <div class="form-group">
                                <button onClick="reloadbutton()" class="badge badge-success"> <i class="fas fa-redo"></i> </button>
                            </div>
                        </div>
                    </form>
                    <!-- </div> -->
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <form action="<?= base_url(); ?>/pengguna/TransReturBarang" method="POST">
                        <div class="form-row">
                            <div class="col-md-5 mb-3 mr-4">
                                <div class="form-group">
                                    <label for="koderetur">Kode Retur</label> :
                                    <input type="text" class="form-control" name="kd_retur" id="kd_retur">
                                </div>

                                <div class="form-group">
                                    <label for="namapengguna">Petugas</label> :
                                    <label for="nota"><?php echo $tb_pengguna['nama_pengguna']; ?>
                                    </label>
                                </div>
                                <div class="form-group" hidden>
                                    <label for="id_user">Id Petugas </label>
                                    <input type="text" class="form-control" name="id_user" id="id_user" value="<?php echo $tb_pengguna['id_user']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="tgl-retur">Tanggal Barang Kembali ke toko</label> :
                                    <input type="date" class="form-control" id="tglretur" name="tglretur">
                                </div>
                            </div>

                            <div class="col-md-5 mb-3">
                                <div class="form-group">
                                    <label for="keteranggan">Keterangan</label> :
                                    <textarea name="ket" id="ket" class="form-control" cols="4" rows="3"></textarea>                                    
                                </div>

                                <div class="form-group" hidden>
                                    <label for="idpembeli">Id Pembeli</label> :
                                    <?php
                                    if ($this->input->post('keyword') == true) {
                                        if ($tb_brg_keluar > 0) {
                                            foreach ($tb_brg_keluar as $dtb) :
                                    ?>
                                                <label for="idpembeliset"><?php echo $dtb['id_pembeli']; ?></label>
                                                <input type="text" class="form-control" name="id_pembeli" id="id_pembeli" value="<?php echo $dtb['id_pembeli']; ?>" hidden>
                                            <?php
                                                break;
                                            endforeach;
                                        } else {
                                            ?>
                                            <label for="idpembeliset"> - </label>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <label for="idpembeliset"> - </label>
                                    <?php
                                    }
                                    ?>
                                </div>

                                <div class="form-group" hidden>
                                    <label for="id_user">Nomer Nota</label> :
                                    <?php
                                    if ($this->input->post('keyword') == true) {
                                        if ($tb_brg_keluar > 0) {
                                            foreach ($tb_brg_keluar as $dtb) :
                                    ?>
                                                <label for="nomer_nota"><?php echo $dtb['no_nota']; ?></label>
                                                <input type="text" class="form-control" name="no_nota" id="no_nota" value="<?php echo $dtb['no_nota']; ?>" hidden>
                                            <?php
                                                break;
                                            endforeach;
                                        } else {
                                            ?>
                                            <label for="nomer_nota"> - </label>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <label for="nomer_nota"> - </label>
                                    <?php
                                    }
                                    ?>
                                </div>

                                <div class="form-group">
                                    <label for="qty_defaultnya">Jumlah Defaultnya</label> :
                                    <input class="form-control" type="text" name="" id="qtydefault" readonly>
                                </div>

                                <div class="form-group" hidden>
                                    <label for="qty_batasnya"> Defaultnya</label> :
                                    <input class="form-control" type="text" name="" id="qtybatasnya">
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nomer Nota</th>
                                        <th>Id Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Harga Jual</th>
                                        <th>QTY Kembali</th>
                                        <th>Total Harga Jual</th>
                                        <th>Pilih</th>
                                    </tr>
                                </thead>
                                <tbody id="tbodyretur">

                                </tbody>
                            </table>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    
    <!-- menampilkan peringatan ketika barang yang dikembalikan lebih banyak -->
    <div class="modal fade" id="warninglebihbanyakModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Barang yang dikembalikan lebih banyak daripada jumlah barang di nota.</div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function reloadbutton() {
            lcoation.reload();
        }
        $(document).ready(function() {
            $(document).on('click', '#pilihbrgkembali', function() {
                var nonota_kembali = $(this).data('notakembali');
                var idbrg_kembali = $(this).data('idbrgkembali');
                var nmbrg_kembali = $(this).data('nmbrgkembali');
                var hrgjual_kembali = $(this).data('hrgjualkembali');
                var tothrg_kembali = $(this).data('tothrgkembali');
                var qty_kembali = $(this).data('qtybrgkembali');
                var urutan_kembali = $(this).data('urutankeluar');
                var tombolhapusn = '<a href="" id="hapusrowretur" class="btn btn-danger btn-sm ml-1" data-toggle="modal" data-target="#"> Hapus</a>';
                var barisbaru = '<tr>';
                barisbaru += '<td> <input type="text" class="form-control" style="border-style: hidden; background-color: white;" name="nonota[]" value="' + nonota_kembali + '" readonly> </td>';
                //barisbaru += '<td> <input type="text" class="form-control" style="border-style: hidden; background-color: white;" name="nourutkeluar[]" value="" readonly> </td>';
                barisbaru += '<td> <input type="text" class="form-control" style="border-style: hidden; background-color: white;" name="idbarang[]" value="' + idbrg_kembali + '" readonly> </td>';
                barisbaru += '<td>' + nmbrg_kembali + '</td>';
                barisbaru += '<td> <input type="text" class="form-control" style="border-style: hidden; background-color: white;" name="hargajual[]" value="' + hrgjual_kembali + '" readonly></td>';
                barisbaru += '<td> <input type="number" class="form-control" style="border-style: hidden; background-color: white;" name="stok[]" value="' + qty_kembali + '"> </td>';
                barisbaru += '<td> <input type="text" class="form-control" style="border-style: hidden; background-color: white;" name="tothargajual[]" value="' + tothrg_kembali + '" readonly> </td>';
                barisbaru += '<td>' + tombolhapusn + ' </td>';
                barisbaru += '<td hidden> <input type="text" class="form-control" style="border-style: hidden; background-color: white;" name="nourutkeluar[]" value="' + urutan_kembali + '" hidden> </td>';
                barisbaru += '<td hidden> <input type="text" class="form-control" style="border-style: hidden; background-color: white;" name="stokdefault[]" value="' + qty_kembali + '" hidden> </td>';
                barisbaru += '</tr>';
                $('#qtydefault').val(qty_kembali);
                $('#tbodyretur').append(barisbaru);
                $(this).prop('disabled', true);
                if ($('#hapusrowretur').onclick() == true) {
                    $(this).prop('disabled', false);
                } else {
                    $(this).prop('disabled', true);
                }
            });

            $("#qtyset").keydown(function() {
                alert("check");              
            });

            $(document).on('click', '#hapusrowretur', function() {
                $(this).closest("tr").remove();
                $('#pilihbrgkembali').prop('disabled', false);
                $('#qtydefault').val('');
            });
        });
    </script>
