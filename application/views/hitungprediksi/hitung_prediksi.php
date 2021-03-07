<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
			<ol class="breadcrumb mb-4 mt-2">
				<li class="breadcrumb-item active"><a href="<?= base_url() ?>pemilik">Dashboard</a> </li>
				<li class="breadcrumb-item active" aria-current="page">Transaksi</li>
				<li class="breadcrumb-item" aria-current="page">Hitung Prediksi</li>
			</ol>
			<div class="card mb-4">
				<div class="row">
					<div class="col-md">
						<div class="card-body ">
							<form method="POST" action="<?= base_url(); ?>pemilik/hitungprediksi" class="">
								<?= $this->session->flashdata('notify'); ?>
								<div class="form-group row">
									<label for="staticUsername" class="col col-form-label">Kode Prediksi</label>
									<div class="col">
										<input type="text" class="form-control" name="kd_prediksi" id="kd_prediksi" value="PDR-<?= $rand_string ?>" readonly>
									</div>
								</div>
								<div class="form-group row">
									<!-- <label for="staticUsername" class="col-sm-2 col-form-label">Pilih Barang</label> -->
									<div class="col">
										<a href="" class="btn btn-primary btn-md" data-toggle="modal" data-target="#lihatbarangdihitungModal">Pilih Barang</a>
									</div>
								</div>
								<div class="form-group row">
									<label for="staticNama" class="col col-form-label">Id Barang</label>
									<div class="col">
										<?php
										if ($this->input->post('idbrghit')) {
											foreach ($idbarangnya as $idb) {
										?>
												<input type="text" class="form-control" id="idbrghit" name="idbrghit" value="<?= $idb['id_barang'] ?>">
											<?php
											}
										} else {
											?>
											<input type="text" class="form-control" id="idbrghit" name="idbrghit" value="">
										<?php
										}
										?>
									</div>
								</div>
								<div class="form-group row">
									<label for="staticNama" class="col col-form-label">Nama Barang</label>
									<div class="col">
										<?php
										if ($this->input->post('idbrghit')) {
											foreach ($idbarangnya as $idb) {
										?>
												<input type="text" class="form-control" id="nmbrghit" name="nmbrghit" value="<?= $idb['nama_barang'] ?>">
											<?php
											}
										} else {
											?>
											<input type="text" class="form-control" id="nmbrghit" name="nmbrghit" value="">
										<?php
										}
										?>
									</div>
								</div>
								<?php

								$now = date('m');
								//$monthequal = date('y');
								if ($now == "01") {
									$month_now = "Januari";
								} else if ($now == "02") {
									$month_now = "Februari";
								} else if ($now == "03") {
									$month_now = "Maret";
								} else if ($now == "04") {
									$month_now = "April";
								} else if ($now == "05") {
									$month_now = "Mei";
								} else if ($now == "06") {
									$month_now = "Juni";
								} else if ($now == "07") {
									$month_now = "Juli";
								} else if ($now == "08") {
									$month_now = "Agustus";
								} else if ($now == "09") {
									$month_now = "September";
								} else if ($now == "10") {
									$month_now = "Oktober";
								} else if ($now == "11") {
									$month_now = "November";
								} else if ($now == "12") {
									$month_now = "Desember";
								}

								$monthequal = new DateTime('m');
								$monthequal->modify('+1 month');
								if ($monthequal->format('m') == "01") {
									$nextmonth = "Januari";
								} else if ($monthequal->format('m') == "02") {
									$nextmonth  = "Februari";
								} else if ($monthequal->format('m') == "03") {
									$nextmonth  = "Maret";
								} else if ($monthequal->format('m') == "04") {
									$nextmonth  = "April";
								} else if ($monthequal->format('m') == "05") {
									$nextmonth  = "Mei";
								} else if ($monthequal->format('m') == "06") {
									$nextmonth  = "Juni";
								} else if ($monthequal->format('m') == "07") {
									$nextmonth  = "Juli";
								} else if ($monthequal->format('m') == "08") {
									$nextmonth  = "Agustus";
								} else if ($monthequal->format('m') == "09") {
									$nextmonth  = "September";
								} else if ($monthequal->format('m') == "10") {
									$nextmonth  = "Oktober";
								} else if ($monthequal->format('m') == "11") {
									$nextmonth  = "November";
								} else if ($monthequal->format('m') == "12") {
									$nextmonth  = "Desember";
								}
								$yearnow = date('Y');
								$yearnow_equal =  new DateTime('y');
								$yearnow_equal->modify('+1 year');
								?>



								<div class="form-group row">
									<label for="staticNama" class="col col-form-label">Bulan Sekarang</label>
									<label for="" class="col col-form-label">
										<?= $month_now ?>
										<?= $yearnow ?>
									</label>
								</div>

								<div class="form-group row" hidden>
									<div class="col">
										<input type="text" class="form-control" id="pilihbulan" name="pilihbulan" value="<?= $monthequal->format('m') ?>">
									</div>
									<div class="col">
										<?php
										if ($nextmonth == "Desember") {
										?>
											<input type="text" class="form-control" id="pilihtahun" name="pilihtahun" value="<?= $yearnow_equal->format('Y') ?>">
										<?php
										} else {
										?>
											<input type="text" class="form-control" id="pilihtahun" name="pilihtahun" value="<?= $yearnow ?>">
										<?php
										}
										?>
									</div>
								</div>

								<div class="form-group row">
									<label for="staticNama" class="col col-form-label">Bulan Selanjutnya yang akan diprediksi</label>
									<label for="" class="col col-form-label">
										<?= $nextmonth  ?>
										<?php
										if ($nextmonth == "Desember") {
										?>
											<?= $yearnow_equal->format('Y') ?>
										<?php
										} else {
										?>
											<?= $yearnow ?>
										<?php
										}
										?>

									</label>
								</div>


								<div class="form-group row" hidden>
									<label for="staticNama" class="col col-form-label">periode 1</label>
									<div class="col">
										<input type="text" class="form-control-plaintext" id="periodeke1" name="periodeke1" value="">
									</div>
									<div class="col">
										<input type="text" class="form-control-plaintext" id="thnke1" name="thnke1" value="">
									</div>
								</div>
								<div class="form-group row" hidden>
									<label for="staticNama" class="col col-form-label">periode 2</label>
									<div class="col">
										<input type="text" class="form-control-plaintext" id="periodeke2" name="periodeke2" value="">
									</div>
									<div class="col">
										<input type="text" class="form-control-plaintext" id="thnke2" name="thnke2" value="">
									</div>
								</div>
								<div class="form-group row" hidden>
									<label for="staticNama" class="col col-form-label">periode 3</label>
									<div class="col">
										<input type="text" class="form-control-plaintext" id="periodeke3" name="periodeke3" value="">
									</div>
									<div class="col">
										<input type="text" class="form-control-plaintext" id="thnke3" name="thnke3" value="">
									</div>
								</div>

								<div class="form-group">
									<label for="inputCalculate">&nbsp;</label>
									<button type="submit" class="btn btn-primary">Hitung</button>
								</div>
							</form>

						</div>

					</div>
					<div class="col-md">
						<div class="card-body ">
							<form action="" method="POST">
								<div class="form-group row" hidden>
									<label for="setIdBarangnya" class="col col-form-label">Id Barang</label>
									<div class="col"><input type="text" name="idbrghit" id="idbarang"></div>
								</div>
								<div class="form-group row">
									<label for="staticNama" class="col col-form-label"><button type="submit" class="btn btn-primary">Tampil Data</button></label>
									<div class="col">
										<label for="staticNama" class="col col-form-label">Bulan</label>
									</div>
									<div class="col">
										<label for="staticNama" class="col col-form-label">Tahun</label>
									</div>
									<div class="col">
										<label for="staticNama" class="col col-form-label">Data</label>
									</div>
								</div>
								<div class="form-group row">
									<label for="staticNama" class="col col-form-label">Periode 1</label>
									<div class="col">
										<input type="text" class="form-control" id="p1" name="periodeke1" value="" hidden>
										<input type="text" class="form-control" id="prd1" name="p1" value="" readonly>
									</div>
									<div class="col">
										<input type="text" class="form-control" id="t1" name="thnke1" value="" readonly>
									</div>
									<div class="col">
										<?php
										if ($this->input->post('idbrghit')) {
										?>
											<input type="text" class="form-control" id="" name="" value="<?= $dataperiode1 ?>">
										<?php
										} else {
										?>
											<input type="text" class="form-control" id="" name="" value="test">
										<?php
										}
										?>
									</div>
								</div>
								<div class="form-group row">
									<label for="staticNama" class="col col-form-label">Periode 2</label>
									<div class="col">
										<input type="text" class="form-control" id="p2" name="periodeke2" value="" hidden>
										<input type="text" class="form-control" id="prd2" name="prd2" value="" readonly>
									</div>
									<div class="col">
										<input type="text" class="form-control" id="t2" name="thnke2" value="" readonly>
									</div>
									<div class="col">
										<?php
										if ($this->input->post('idbrghit')) {
										?>
											<input type="text" class="form-control" id="" name="" value="<?= $dataperiode2 ?>">
										<?php
										} else {
										?>
											<input type="text" class="form-control" id="" name="" value="test">
										<?php
										}
										?>
									</div>
								</div>
								<div class="form-group row">
									<label for="staticNama" class="col col-form-label">Periode 3</label>
									<div class="col">
										<input type="text" class="form-control" id="p3" name="periodeke3" value="" hidden>
										<input type="text" class="form-control" id="prd3" name="prd3" value="" readonly>
									</div>
									<div class="col">
										<input type="text" class="form-control" id="t3" name="thnke3" value="" readonly>
									</div>
									<div class="col">
										<?php
										if ($this->input->post('idbrghit')) {
										?>
											<input type="text" class="form-control" id="" name="" value="<?= $dataperiode3 ?>">
										<?php
										} else {
										?>
											<input type="text" class="form-control" id="" name="" value="test">
										<?php
										}
										?>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>


			</div>
		</div>
	</main>

	<div class="modal fade bd-example-modal-md " id="lihatbarangdihitungModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-md">
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
										<td><a id="pilihbrghitung" href="#" class="btn btn-success btn-sm ml-1" data-toggle="" data-target="" data-idbrghit="<?= $dtb['id_barang'];  ?>" data-nmbrghit="<?= $dtb['nama_barang'];  ?>">
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
	<script type="text/javascript">
		$(document).ready(function() {
			$(document).on('click', '#pilihbrghitung', function() {
				var idbrg_hit = $(this).data('idbrghit');
				var nmbrg_hit = $(this).data('nmbrghit');
				$('#idbarang').val(idbrg_hit);
				$('#idbrghit').val(idbrg_hit);
				$('#idbrghit1').val(idbrg_hit);
				$('#idbrghit2').val(idbrg_hit);
				$('#nmbrghit').val(nmbrg_hit);
				$('#lihatbarangdihitungModal').modal('hide');
			});
			$('#pilihbulan').ready(function() {
				var tahundipilih = parseInt(document.getElementById('pilihtahun').value);
				var set_tahun = tahundipilih - 1;
				if ($('#pilihbulan').val() == '01') {
					$('#periodeke1').val("10");
					$('#periodeke2').val("11");
					$('#periodeke3').val("12");
					$('#prd1').val("Oktober");
					$('#prd2').val("November");
					$('#prd3').val("Desember");
					$('#p1').val("10");
					$('#p2').val("11");
					$('#p3').val("12");
					$('#thnke1').val(set_tahun);
					$('#thnke2').val(set_tahun);
					$('#thnke3').val(set_tahun);
					$('#t1').val(set_tahun);
					$('#t2').val(set_tahun);
					$('#t3').val(set_tahun);
				} else if ($('#pilihbulan').val() == '02') {
					$('#periodeke1').val("11");
					$('#periodeke2').val("12");
					$('#periodeke3').val("01");
					$('#prd1').val("November");
					$('#prd2').val("Desember");
					$('#prd3').val("Januari");
					$('#p1').val("11");
					$('#p2').val("12");
					$('#p3').val("01");
					$('#thnke1').val(set_tahun);
					$('#thnke2').val(set_tahun);
					$('#thnke3').val(tahundipilih);
					$('#t1').val(set_tahun);
					$('#t2').val(set_tahun);
					$('#t3').val(tahundipilih);
				} else if ($('#pilihbulan').val() == '03') {
					$('#periodeke1').val("12");
					$('#periodeke2').val("01");
					$('#periodeke3').val("02");
					$('#prd1').val("Desember");
					$('#prd2').val("Januari");
					$('#prd3').val("Februari");
					$('#p1').val("12");
					$('#p2').val("01");
					$('#p3').val("02");
					$('#thnke1').val(set_tahun);
					$('#thnke2').val(tahundipilih);
					$('#thnke3').val(tahundipilih);
					$('#t1').val(set_tahun);
					$('#t2').val(tahundipilih);
					$('#t3').val(tahundipilih);
				} else if ($('#pilihbulan').val() == '04') {
					$('#periodeke1').val("01");
					$('#periodeke2').val("02");
					$('#periodeke3').val("03");
					$('#prd1').val("Januari");
					$('#prd2').val("Februari");
					$('#prd3').val("Maret");
					$('#p1').val("01");
					$('#p2').val("02");
					$('#p3').val("03");
					$('#thnke1').val(tahundipilih);
					$('#thnke2').val(tahundipilih);
					$('#thnke3').val(tahundipilih);
					$('#t1').val(tahundipilih);
					$('#t2').val(tahundipilih);
					$('#t3').val(tahundipilih);
				} else if ($('#pilihbulan').val() == '05') {
					$('#periodeke1').val("02");
					$('#periodeke2').val("03");
					$('#periodeke3').val("04");
					$('#prd1').val("Februari");
					$('#prd2').val("Maret");
					$('#prd3').val("April");
					$('#p1').val("02");
					$('#p2').val("03");
					$('#p3').val("04");
					$('#thnke1').val(tahundipilih);
					$('#thnke2').val(tahundipilih);
					$('#thnke3').val(tahundipilih);
					$('#t1').val(tahundipilih);
					$('#t2').val(tahundipilih);
					$('#t3').val(tahundipilih);
				} else if ($('#pilihbulan').val() == '06') {
					$('#periodeke1').val("03");
					$('#periodeke2').val("04");
					$('#periodeke3').val("05");
					$('#prd1').val("Maret");
					$('#prd2').val("April");
					$('#prd3').val("Mei");
					$('#p1').val("03");
					$('#p2').val("04");
					$('#p3').val("05");
					$('#thnke1').val(tahundipilih);
					$('#thnke2').val(tahundipilih);
					$('#thnke3').val(tahundipilih);
					$('#t1').val(tahundipilih);
					$('#t2').val(tahundipilih);
					$('#t3').val(tahundipilih);
				} else if ($('#pilihbulan').val() == '07') {
					$('#periodeke1').val("04");
					$('#periodeke2').val("05");
					$('#periodeke3').val("06");
					$('#prd1').val("April");
					$('#prd2').val("Mei");
					$('#prd3').val("Juni");
					$('#p1').val("04");
					$('#p2').val("05");
					$('#p3').val("06");
					$('#thnke1').val(tahundipilih);
					$('#thnke2').val(tahundipilih);
					$('#thnke3').val(tahundipilih);
					$('#t1').val(tahundipilih);
					$('#t2').val(tahundipilih);
					$('#t3').val(tahundipilih);
				} else if ($('#pilihbulan').val() == '08') {
					$('#periodeke1').val("05");
					$('#periodeke2').val("06");
					$('#periodeke3').val("07");
					$('#prd1').val("Mei");
					$('#prd2').val("Juni");
					$('#prd3').val("Juli");
					$('#p1').val("05");
					$('#p2').val("06");
					$('#p3').val("07");
					$('#thnke1').val(tahundipilih);
					$('#thnke2').val(tahundipilih);
					$('#thnke3').val(tahundipilih);
					$('#t1').val(tahundipilih);
					$('#t2').val(tahundipilih);
					$('#t3').val(tahundipilih);
				} else if ($('#pilihbulan').val() == '09') {
					$('#periodeke1').val("06");
					$('#periodeke2').val("07");
					$('#periodeke3').val("08");
					$('#prd1').val("Juni");
					$('#prd2').val("Juli");
					$('#prd3').val("Agustus");
					$('#p1').val("06");
					$('#p2').val("07");
					$('#p3').val("08");
					$('#thnke1').val(tahundipilih);
					$('#thnke2').val(tahundipilih);
					$('#thnke3').val(tahundipilih);
					$('#t1').val(tahundipilih);
					$('#t2').val(tahundipilih);
					$('#t3').val(tahundipilih);
				} else if ($('#pilihbulan').val() == '10') {
					$('#periodeke1').val("07");
					$('#periodeke2').val("08");
					$('#periodeke3').val("09");
					$('#prd1').val("Juli");
					$('#prd2').val("Agustus");
					$('#prd3').val("September");
					$('#p1').val("07");
					$('#p2').val("08");
					$('#p3').val("09");
					$('#thnke1').val(tahundipilih);
					$('#thnke2').val(tahundipilih);
					$('#thnke3').val(tahundipilih);
					$('#t1').val(tahundipilih);
					$('#t2').val(tahundipilih);
					$('#t3').val(tahundipilih);
				} else if ($('#pilihbulan').val() == '11') {
					$('#periodeke1').val("08");
					$('#periodeke2').val("09");
					$('#periodeke3').val("10");
					$('#prd1').val("Agustus");
					$('#prd2').val("September");
					$('#prd3').val("Oktober");
					$('#p1').val("08");
					$('#p2').val("09");
					$('#p3').val("10");
					$('#thnke1').val(tahundipilih);
					$('#thnke2').val(tahundipilih);
					$('#thnke3').val(tahundipilih);
					$('#t1').val(tahundipilih);
					$('#t2').val(tahundipilih);
					$('#t3').val(tahundipilih);
				} else if ($('#pilihbulan').val() == '12') {
					$('#periodeke1').val("09");
					$('#periodeke2').val("10");
					$('#periodeke3').val("11");
					$('#prd1').val("September");
					$('#prd2').val("Oktober");
					$('#prd3').val("November");
					$('#p1').val("09");
					$('#p2').val("10");
					$('#p3').val("11");
					$('#thnke1').val(tahundipilih);
					$('#thnke2').val(tahundipilih);
					$('#thnke3').val(tahundipilih);
					$('#t1').val(tahundipilih);
					$('#t2').val(tahundipilih);
					$('#t3').val(tahundipilih);
				}
			});
			// $(document).on('change', '#pilihbulan', function() {
			//     if ('#pilihbulan' == '04') {
			//         $('#periodeke1').val('01');
			//         $('#periodeke2').val('02');
			//         $('#periodeke3').val('03');
			//     }
			// });
		});
	</script>
	<!-- isi div id="layoutSidenav_content" terdapat pada footer -->
