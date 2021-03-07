<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <!-- <h1 class="mt-4">Dashboard</h1> -->
            <ol class="breadcrumb mb-4 mt-2">
                <li class="breadcrumb-item active"><a href="<?= base_url() ?>pengguna">Dashboard</a> </li>
                <li class="breadcrumb-item active" aria-current="page">Transaksi</li>
                <li class="breadcrumb-item" aria-current="page">Barang Keluar</li>
            </ol>
            <!-- <div class="row"> -->
            <!-- isi content -->
            <!-- </div> -->
            <div class="card mb-4">
                <div class="card-body">
                    <?= $this->session->flashdata('notify'); ?>
                    <!-- <div class="row"> -->
                    <form method="POST" action="<?= base_url(); ?>pengguna/TransBarangKeluar">
                        <div class="form-row">
                            <div class="col-md-5 mb-3 mr-4">
                                <div class="form-group">
                                    <label for="nota">Nomer Nota</label>
                                    <input type="text" class="form-control" id="no_nota" name="no_nota">
                                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
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
                                    <label for="tgl-keluar">Tanggal Barang Keluar</label> :
                                    <input type="date" class="form-control" id="tglkeluar" name="tglkeluar">
                                </div>

                                <!-- <div class="form-group">
                                    <label for="lbl_idbrg">Id Barang</label>
                                    <div class="form-row">
                                        <div class="col">
                                            <input class="form-control" placeholder="Id Barang" id="id_brg" name="id_brg">
                                        </div>
                                        <div class="col">
                                            <a href="" class="btn btn-primary btn-md ml-1" data-toggle="modal" data-target="#lihatbarangModal">Pilih Barang</a>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <label for="pembeli">Id Pembeli</label>
                                    <div class="form-row">
                                        <div class="col">
                                            <input class="form-control" placeholder="Id Pembeli" id="id_pbl" name="id_pbl">
                                        </div>
                                        <div class="col">
                                            <a href="" class="btn btn-primary btn-md ml-1" data-toggle="modal" data-target="#lihatpembeliModal">lihat pembeli</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lbl_nmpbl">Nama Pembeli</label>
                                    <input type="text" class="form-control" placeholder="Nama Pembeli" id="nm_pbl" name="nm_pbl">
                                </div>
                            </div>
                            <div class="col-md-5 mb-3 ">
                                <div class="form-group">
                                    <label for="lbl_idbrg">Id Barang</label>
                                    <div class="form-row">
                                        <div class="col">
                                            <input class="form-control" placeholder="Id Barang" id="id_brgk" name="id_brgk" readonly>
                                        </div>
                                        <div class="col">
                                            <a href="" class="btn btn-primary btn-md ml-1" data-toggle="modal" data-target="#lihatbarangkeluarModal">Pilih Barang</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lbl_nmbrg">Nama Barang</label>
                                    <input type="text" class="form-control" placeholder="Nama Barang" id="nm_brgk" name="nm_brgk" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="lbl_nmktgr">Harga Beli</label>
                                    <input type="text" class="form-control" placeholder="Harga Beli" id="hrg_belik" name="hrg_belik" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="lbl_hrgbl">Harga Jual</label>
                                    <input type="text" class="form-control" placeholder="Harga Jual" id="hrg_jualk" name="hrg_jualk" readonly>
                                </div>

                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="lbl_stoksemula">Stock Semula</label>
                                            <input class="form-control" placeholder="" id="stok_awalk" name="stok_awalk" readonly>
                                        </div>
                                        <div class="col">
                                            <label for="lbl_stoksemula">Jumlah Barang Keluar</label>
                                            <input type="number" class="form-control" placeholder="" id="set_stokkeluar" name="set_stokkeluar">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <a href="#" id="tmbhklrtb_sementara" class="btn btn-success btn-md ml-1" value=""> Tambah Transaksi </a>
                                </div>

                                <div class="center-align">
                                    <?php
                                    // echo $this->pagination->create_links();
                                    ?>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="form-row"> -->
                        <div class="form-group">
                            <table class="table table-borderless" id="dataku" name="dataku">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">No Nota</th>
                                        <th scope="col">Id Barang</th>
                                        <th scope="col">Nama Barang</th>
                                        <th scope="col">Harga Beli</th>
                                        <th scope="col">Harga Jual</th>
                                        <th scope="col">Banyak Barang</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="tbodytranklr">
                                    <?php
                                    //Data mentah yang ditampilkan ke tabel  
                                    ?>

                                </tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Subtotal semua</td>
                                    <td colspan="2"><input class="form-control" style="border: hidden" placeholder="0" value="0" id="sub_itemkeluar" name="hasil_totalhrgjual" readonly></td>

                                </tr>
                            </table>
                        </div>
                        <!-- </div> -->
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <!-- </div> -->

                </div>
            </div>
        </div>
    </main>
    <!-- isi div id="layoutSidenav_content" terdapat pada footer -->

    <div class="modal fade bd-example-modal-lg " id="lihatbarangkeluarModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="">Data Barang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <table id="datatranskeluar" name="datatranskeluar" class="table table-responsive" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Id Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Harga Beli</th>
                                    <th>Harga Jual</th>
                                    <th>Stok</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //Data mentah yang ditampilkan ke tabel  
                                $no = $this->uri->segment('3') + 1;
                                foreach ($tb_barang as $dtb) {
                                ?>
                                    <tr class="pilih">
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $dtb['id_barang']; ?></td>
                                        <td><?php echo $dtb['nama_barang']; ?></td>
                                        <td><?php echo $dtb['harga_beli']; ?></td>
                                        <td><?php echo $dtb['harga_jual']; ?></td>
                                        <td><?php echo $dtb['stok']; ?></td>
                                        <td><a id="pilihbrgkeluar" href="#" class="btn btn-success btn-sm ml-1" data-toggle="" data-target="" data-idbrgklr="<?= $dtb['id_barang'];  ?>" data-nmbrgklr="<?= $dtb['nama_barang'];  ?>" data-hrgbeliklr="<?= $dtb['harga_beli'];  ?>" data-hrgjualklr="<?= $dtb['harga_jual'];  ?>" data-stockklr="<?= $dtb['stok'];  ?>">
                                                Pilih</a></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="center-align">
                        <?php //echo $this->pagination->create_links();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-md responsive" id="lihatpembeliModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md responsive">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="">Data Pembeli</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                </div>
                <div class="modal-body responsive">
                    <div class="container-fluid">
                        <table id="datapbl" name="datapbl" class="table table-responsive" width="auto">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Id Pembeli</th>
                                    <th>Nama Pembeli</th>
                                    <!-- <th>No Tlp Pembeli</th> -->
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //Data mentah yang ditampilkan ke tabel  
                                $no = $this->uri->segment('3') + 1;
                                foreach ($tb_pembeli as $pb) {
                                ?>
                                    <tr class="pilih">
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $pb['id_pembeli']; ?></td>
                                        <td><?php echo $pb['nama_pembeli']; ?></td>
                                        <td><a id="pilihpembeli" href="#" class="btn btn-success btn-sm ml-1" data-idpembeli="<?= $pb['id_pembeli'];  ?>" data-nmpembeli="<?= $pb['nama_pembeli'];  ?>">
                                                Pilih
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>


                    <div class="center-align">
                        <?php //echo $this->pagination->create_links();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- isi div id="layoutSidenav_content" terdapat pada footer -->
    <!-- Stok minimum Modal-->
    <div class="modal fade" id="warninglimitstokModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Stok Barang sudah habis, atau sudah mencapai batas minimum.</div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Menampilkan kesalahan modal -->
    <div class="modal fade" id="warningtranklrModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Anda belum memilih barang, atau barang yang anda pilih tidak ada.</div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '#tmbhklrtb_sementara', function() {
                var stok1 = document.getElementById('stok_awalk').value;
                var stok2 = document.getElementById('set_stokkeluar').value;
                var stokpertama = parseInt(stok1);
                var stokygkeluar = parseInt(stok2);
                if (stokygkeluar > stokpertama) {
                    $('#warninglimitstokModal').modal('show');
                } else if ($('#id_brgk').val() == '' || $('#nm_brgk').val() == '' || $('#hrg_jualk').val() == '' || $('#set_stokkeluar').val() == '' || $('#no_nota').val() == '') {
                    $('#warningtranklrModal').modal('show');
                } else {
                    var nonota = document.getElementById('no_nota').value;
                    var idbrg = document.getElementById('id_brgk').value;
                    var nmbrg = document.getElementById('nm_brgk').value;
                    var hrgbelik = document.getElementById('hrg_belik').value;
                    var hrgjualk = document.getElementById('hrg_jualk').value;
                    var qtykeluar = document.getElementById('set_stokkeluar').value;
                    var stoksemula = document.getElementById('stok_awalk').value;
                    var tombolhapusnya = '<a href="" id="hapusrowtrankeluar" class="btn btn-danger btn-sm ml-1" data-toggle="modal" data-target="#"> Hapus</a>';

                    var hrgjual = parseInt(hrgjualk);
                    var jmlhjual = parseInt(qtykeluar);
                    var totalperitem = hrgjual * jmlhjual;
                    var stoksemulanya = parseInt(stoksemula);
                    var totalstok = stoksemulanya - jmlhjual;
                    var totalsemua = document.getElementById('sub_itemkeluar').value;
                    var barisbaru = '<tr> ';
                    barisbaru += '<td> <input type="text" class="form-control" style="border-style: hidden; background-color: white; " id="nonota" name="nonota[]" value="' + nonota + '" readonly> </td>';
                    barisbaru += '<td> <input type="text" class="form-control" style="border-style: hidden; background-color: white; " id="id_barang" name="idbarang[]" value="' + idbrg + '" readonly> </td>';
                    barisbaru += '<td>' + nmbrg + '</td>';
                    barisbaru += '<td> <input type="text" class="form-control" style="border-style: hidden; background-color: white; " id="harga_beli" name="harga_beli[]" value="' + hrgbelik + '" readonly> </td>';
                    barisbaru += '<td> <input type="text" class="form-control" style="border-style: hidden; background-color: white; " id="harga_jual" name="harga_jual[]" value="' + hrgjualk + '" readonly> </td>';
                    barisbaru += '<td> <input type="text" class="form-control" style="border-style: hidden; background-color: white; " id="jumlah_brgkeluar" name="jumlah_brgkeluar[]" value="' + qtykeluar + '" readonly> </td>';
                    barisbaru += '<td> <input type="text" class="form-control" style="border-style: hidden; background-color: white; " id="total_harga_jual" name="total_harga_jual[]" value="' + totalperitem + '" readonly> </td>';
                    barisbaru += '<td>' + tombolhapusnya + ' </td>';
                    barisbaru += '<td> <input type="text" class="form-control" style="border-style: hidden; background-color: white; " id="stok" name="stok[]" value="' + totalstok + '" hidden> </td>';
                    var totalsemuaparse = parseInt(totalsemua);
                    var totalperitemparse = parseInt(totalperitem);
                    totalsemuaparse = totalperitemparse + totalsemuaparse;

                    $('#tbodytranklr').append(barisbaru);
                    $('#sub_itemkeluar').val(totalsemuaparse);
                    $('#id_brgk').val('');
                    $('#nm_brgk').val('');
                    $('#hrg_belik').val('');
                    $('#hrg_jualk').val('');
                    $('#set_stokkeluar').val('');
                    $('#stok_awalk').val('');
                }

            });

            $(document).on('click', '#hapusrowtrankeluar', function() {
                $(this).closest("tr").remove();
                var subitemsebelumnya = document.getElementById('sub_itemkeluar').value;
                var currentRow = $(this).closest("tr");
                var totalperitem = currentRow.find("td:eq(6) input[type='text']").val();
                var totalperitemparse = parseInt(totalperitem);
                var subitemsebelumnyap = parseInt(subitemsebelumnya);
                subitemsebelumnyap = subitemsebelumnyap - totalperitemparse;
                $('#sub_itemkeluar').val(subitemsebelumnyap);
            });
        });
    </script>