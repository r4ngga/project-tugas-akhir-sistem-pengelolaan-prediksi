<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <!-- <h1 class="mt-4">Dashboard</h1> -->
            <ol class="breadcrumb mb-4 mt-2">
                <li class="breadcrumb-item active"><a href="<?= base_url() ?>admin">Dashboard</a> </li>
                <li class="breadcrumb-item active" aria-current="page">Transaksi</li>
                <li class="breadcrumb-item" aria-current="page">Barang Masuk</li>
            </ol>
            <!-- <div class="row"> -->
            <!-- isi content -->
            <!-- </div> -->
            <div class="card mb-4">
                <div class="card-body">
                    <?= $this->session->flashdata('notify'); ?>
                    <!-- <div class="row"> -->
                    <form method="POST" action="<?= base_url(); ?>admin/TransBarangMasuk">
                        <div class="form-row">
                            <div class="col-md-5 mb-3 mr-4">
                                <div class="form-group">
                                    <label for="faktur">Nomer Faktur</label>
                                    <input type="text" class="form-control" id="no_faktur" name="no_faktur">
                                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                </div>
                                <div class="form-group">
                                    <label for="namapengguna">Petugas</label> :
                                    <label id="nama_petugas" name="nama_petugas" for="namapetugas"><?php echo $tb_pengguna['nama_pengguna']; ?>
                                    </label>
                                </div>
                                <div class="form-group" hidden>
                                    <label for="id_user">Id Petugas </label>
                                    <input type="text" class="form-control" name="id_user" id="id_user" value="<?php echo $tb_pengguna['id_user']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="namapengguna">Tanggal Barang Masuk</label> :
                                    <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk">
                                </div>
                                <div class="form-group">
                                    <label for="supplier">Nama Supplier</label>
                                    <select class="form-control" id="id_supplier" name="id_supplier">
                                        <option>Pilih Supplier</option>
                                        <?php foreach ($tb_supplier as $sp) { ?>
                                            <option value="<?php echo $sp['id_supplier']; ?>"> <?php echo $sp['nama_supplier']; ?> </option>
                                        <?php } ?>
                                    </select>
                                    <?php if (empty($tb_supplier)) {
                                    ?>
                                        <div class="alert alert-danger" role="alert">
                                            Data Supplier yang dicari tidak ditemukan!!
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-md-5 mb-3 ">
                                <div class="form-group">
                                    <label for="lbl_idbrg">Id Barang</label>
                                    <div class="form-row">
                                        <div class="col">
                                            <input class="form-control" placeholder="Id Barang" id="id_brg" name="id_brg" readonly>
                                        </div>
                                        <div class="col">
                                            <a href="" class="btn btn-primary btn-md ml-1" data-toggle="modal" data-target="#lihatbarangmskModal">Pilih Barang</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="lbl_nmbrg">Nama Barang</label>
                                    <input type="text" class="form-control" placeholder="Nama Barang" id="nm_brg" name="nm_brg" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="lbl_nmktgr">Nama Kategori</label>
                                    <input type="text" class="form-control" placeholder="Kategori" id="nm_ktgr" name="nm_ktgr" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="lbl_hrgbl">Harga Beli</label>
                                    <input type="text" class="form-control" placeholder="Harga" id="hrg_beli" name="hrg_beli" readonly>
                                </div>

                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="lbl_stoksemula">Stock Semula</label>
                                            <input class="form-control" placeholder="" id="stok_awal" name="stok_awal" readonly>
                                        </div>
                                        <div class="col">
                                            <label for="lbl_stoksemula">Jumlah Barang Masuk</label>
                                            <input type="number" class="form-control" placeholder="" id="set_stok" name="set_stok">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <a href="#" id="tmbhmsktb_sementara" onclick="" class="btn btn-success btn-md ml-1" value=""> Tambah Transaksi </a>
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
                            <table id="datasmmntrmsk" name="datasmmntrmsk" class="table table-borderless">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No Faktur</th>
                                        <th>Id Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Harga Beli</th>
                                        <th>Banyak Barang</th>
                                        <th>Total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="tbodytranmsk">
                                    <?php
                                    //Data mentah yang ditampilkan ke tabel  
                                    ?>

                                </tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Subtotal semua</td>
                                    <td colspan="2" id=""> <input class="form-control" style="border: hidden" placeholder="0" value="0" id="sub_item" name="hasil_totalhrgbeli" readonly></td>
                                </tr>
                            </table>
                        </div>
                        <!-- </div> -->

                        <!-- <a href="#" id="input_tranmsk" onclick="" class="btn btn-success btn-md ml-1" value=""> Tambah </a> -->
                        <button type="submit" id="input_tranmsk" class="btn btn-primary">Submit</button>
                    </form>
                    <!-- </div> -->

                </div>
            </div>
        </div>
    </main>
    <!-- isi div id="layoutSidenav_content" terdapat pada footer -->

    <div class="modal fade bd-example-modal-lg " id="lihatbarangmskModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="">Data Barang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <table id="datatransmsk" name="datatransmsk" class="table table-responsive" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Id Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Nama Kategori</th>
                                    <th>Harga Beli</th>
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
                                        <td><?php echo $dtb['nama_kategori']; ?></td>
                                        <td><?php echo $dtb['harga_beli']; ?></td>
                                        <td><?php echo $dtb['stok']; ?></td>
                                        <td><button id="pilihbrgmsk" href="" class="btn btn-success btn-sm ml-1" data-idbrgm="<?= $dtb['id_barang'];  ?>" data-nmbrgm="<?= $dtb['nama_barang'];  ?>" data-nmktgrm="<?= $dtb['nama_kategori'];  ?>" data-hrgbelim="<?= $dtb['harga_beli'];  ?>" data-stockm="<?= $dtb['stok'];  ?>">
                                                Pilih</button></td>
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

    <!-- Kesalahan Modal-->
    <div class="modal fade" id="warningtranmskModal" tabindex="-1" role="dialog" aria-hidden="true">
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
            $(document).on('click', '#tmbhmsktb_sementara', function() {
                // var id_brgj1 = document.getElementsById('id_brg').value;
                // var nm_brgj1 = document.getElementsById('nm_brg').value;
                // var hrg_belij1 = document.getElementsById('hrg_beli').value;
                // var set_stokj1 = document.getElementsById('set_stok').value;
                if ($('#id_brg').val() == '' || $('#nm_brg').val() == '' || $('#hrg_beli').val() == '' || $('#set_stok').val() == '' || $('#no_faktur').val() == '') {
                    $('#warningtranmskModal').modal('show');
                } else {
                    var nofktr = document.getElementById('no_faktur').value;
                    var id_brgj = document.getElementById('id_brg').value;
                    var nm_brgj = document.getElementById('nm_brg').value;
                    var hrg_belij = document.getElementById('hrg_beli').value;
                    var set_stokj = document.getElementById('set_stok').value;
                    var stok_awalj = document.getElementById('stok_awal').value;
                    var tombolhapus = '<a href="" id="hapusrowtranmsk" class="btn btn-danger btn-sm ml-1" data-toggle="modal" data-target="#">Hapus</a>';
                    var valtablemsk_smntr = document.getElementById('datasmmntrmsk');

                    var hrgbeli = parseInt(hrg_belij);
                    var jmlhbeli = parseInt(set_stokj);
                    var totalperitem = hrgbeli * jmlhbeli;
                    var stokawalnya = parseInt(stok_awalj);
                    var totalstok = stokawalnya + jmlhbeli;
                    var totalsemua = document.getElementById('sub_item').value;
                    var newrow = '<tr> ';
                    newrow += '<td> <input type="text" class="form-control" style="border-style: hidden; background-color: white; " id="nofaktur" name="nofaktur[]" value="' + nofktr + '" readonly> </td>';
                    newrow += '<td> <input type="text" class="form-control" style="border-style: hidden; background-color: white; " id="id_barang" name="idbarang[]" value="' + id_brgj + '" readonly> </td>';
                    newrow += '<td contentditable="true" class="nmbrgrow">' + nm_brgj + '  </td>';
                    // newrow += '<td> <input type="text" class="form-control" style="border-style: hidden; background-color: white; " id="nmbrgrow" name="nmbrgrow[]" value=" ' + nm_brgj + ' " readonly> </td>';
                    newrow += '<td> <input type="text" class="form-control" style="border-style: hidden; background-color: white; " id="harga_beli" name="harga_beli[]" value="' + hrg_belij + '"  readonly> </td>';
                    newrow += '<td> <input type="text" class="form-control" style="border-style: hidden; background-color: white; " id="jumlah_brgmsk" name="jumlah_brgmsk[]" value="' + set_stokj + '"  readonly> </td>';
                    newrow += '<td> <input type="text" class="form-control" style="border-style: hidden; background-color: white; " id="total_harga_beli" name="total_harga_beli[]" value="' + totalperitem + '" readonly> </td>';
                    newrow += '<td> ' + tombolhapus + ' </td>';
                    newrow += '<td> <input type="text" class="form-control" style="border-style: hidden; background-color: white; " id="stok" name="stok[]" value="' + totalstok + '" hidden> </td>';
                    newrow += '</tr>';
                    $('#tbodytranmsk').append(newrow);

                    var totalperitemparse = parseInt(totalperitem);
                    var totalsemuaparse = parseInt(totalsemua);
                    totalsemuaparse = totalperitemparse + totalsemuaparse;


                    $('#sub_item').val(totalsemuaparse);
                    $('#id_brg').val('');
                    $('#nm_brg').val('');
                    $('#hrg_beli').val('');
                    $('#set_stok').val('');
                    $('#nm_ktgr').val('');
                    $('#stok_awal').val('');
                }
            });

            $(document).on("click", "#hapusrowtranmsk", function() {
                $(this).closest("tr").remove();
                var subitemsebelumnya = document.getElementById('sub_item').value;
                var currentRow = $(this).closest("tr");
                var totalperitem = currentRow.find("td:eq(5) input[type='text']").val();
                //var totalperitem = document.getElementById("totalperitem").value;
                var totalperitemparse = parseInt(totalperitem);
                var subitemsebelumnyap = parseInt(subitemsebelumnya);
                subitemsebelumnyap = subitemsebelumnyap - totalperitemparse;
                $('#sub_item').val(subitemsebelumnyap);
            });

            $(document).on("click", "#input_tranmsk", function() {
                // if ($('#tbodytranmsk').val() == '') {
                //     $('#warningtranmskModal').modal('show');
                // }
                // var table_datajsn = [];
                // var no_faktur = document.getElementById('no_faktur').value;
                // $('#tbodytranmsk tr').each(function(row, tr) {
                //     var sub = {
                //         'no_faktur': $(tr).find('td:eq(0)').text(),
                //         'id_barang': $(tr).find('td:eq(1) input[type="text"]').text(),
                //         'stok': $(tr).find('td:eq(7) input[type="text"]').text()
                //         // 'harga_beli': $(tr).find('td:eq(3)').text(),
                //         // 'jumlah_brgmsk': $(tr).find('td:eq(4)').text(),
                //         // 'total_harga_beli': $(tr).find('td:eq(5)').text()
                //     };
                //     table_datajsn.push(sub);
                //     // table_datajsn.push(no_faktur);
                // });

                // var data = {
                //     'data_tabel': table_datajsn
                // };
                // $.ajax({

                //     data: data,
                //     type: 'POST',
                //     url: ' // base_url(' admin / DetailTransBarangMasuk '); ?>',
                //     crossOrigin: false,
                //     dataType: 'json',
                //     success: function(result) {
                //         console.log(result.status);
                //     }
                // });
                // $('#tbodytranmsk').html('');



            });
        });
    </script>