<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
			<!-- <h1 class="mt-4">Dashboard</h1> -->
			<ol class="breadcrumb mb-4 mt-2">
				<li class="breadcrumb-item active"><a href="<?= base_url() ?>pemilik">Dashboard</a> </li>
				<li class="breadcrumb-item active" aria-current="page">Laporan</li>
				<li class="breadcrumb-item" aria-current="page">Laporan Prediksi</li>
			</ol>
			<div class="card mb-4">
				<div class="card-body">
					<?= $this->session->flashdata('notify'); ?>
					<!-- <div class="row"> -->
					<form method="POST" action="">
						<div class="form-row">
							<div class="col-md-6 mr-1">
								<div class="form-group">
									<div class="form-row">
										<div class="col">
											<label for="cari">Cari</label>
											<input type="text" class="form-control" placeholder="" id="keyword" name="keyword">
										</div>
										<div class="col">
											<label for="inputcari">&nbsp;</label><br>
											<button type="submit" name="carilaporanbrgmsk" id="" class="btn btn-primary">Cari</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>

					<form method="POST" action="<?= base_url(); ?>/pemilik/excelcetakhasilprediksi">
						<div class="form-row">
							<div class="col-md-6 mr-1">
								<div class="form-group" hidden>
									<div class="form-row">
										<div class="col" hidden>
											<input type="text" class="form-control" placeholder="" id="cariygdiunduh" name="keyword">
										</div>
									</div>
								</div>
								<div class="form-group">
									<button type="submit" name="carilaporanprediksi" id="" class="btn btn-warning">Unduh</button>
								</div>
							</div>
						</div>
					</form>


					<div class="table-responsive">

						<table class="table table-bordered" id="" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>Kode Prediksi</th>
									<th>Id Barang</th>
									<th>Nama Barang</th>
									<th>Bulan yang di Prediksi</th>
									<th>Tahun yang di Prediksi</th>
									<th>Hasil Prediksi</th>
									<th>Pembulatan Prediksi</th>
								</tr>
							</thead>
							<tbody id="">
								<?php
								if ($this->input->post('keyword') == true) {
									if ($tb_prediksi > 0) {
										foreach ($tb_prediksi as $dtp) { ?>
											<tr>
												<td><?php echo $dtp['kd_prediksi']; ?></td>
												<td><?php echo $dtp['id_barang']; ?></td>
												<td><?php echo $dtp['nama_barang']; ?></td>
												<?php
												if ($dtp['bulan_prediksi'] == "01") {
													$setnamabulan = "Januari";
												} else if ($dtp['bulan_prediksi'] == "02") {
													$setnamabulan = "Februari";
												} else if ($dtp['bulan_prediksi'] == "03") {
													$setnamabulan = "Maret";
												} else if ($dtp['bulan_prediksi'] == "04") {
													$setnamabulan = "April";
												} else if ($dtp['bulan_prediksi'] == "05") {
													$setnamabulan = "Mei";
												} else if ($dtp['bulan_prediksi'] == "06") {
													$setnamabulan = "Juni";
												} else if ($dtp['bulan_prediksi'] == "07") {
													$setnamabulan = "Juli";
												} else if ($dtp['bulan_prediksi'] == "08") {
													$setnamabulan = "Agustus";
												} else if ($dtp['bulan_prediksi'] == "09") {
													$setnamabulan = "September";
												} else if ($dtp['bulan_prediksi'] == "10") {
													$setnamabulan = "Oktober";
												} else if ($dtp['bulan_prediksi'] == "11") {
													$setnamabulan = "November";
												} else if ($dtp['bulan_prediksi'] == "12") {
													$setnamabulan = "Desember";
												}
												?>
												<td><?php echo $setnamabulan; ?></td>
												<td><?php echo $dtp['tahun_prediksi']; ?></td>
												<td><?php echo $dtp['hasil_prediksi']; ?></td>
												<td><?php echo round($dtp['hasil_prediksi']); ?></td>
											</tr>
									<?php
										}
									} else {
										$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
                                        Gagal melakukan pencarian !!
                                        </div>');
										redirect('pemilik/datalaporanprediksi');
									}
								} else {
									?>
									<?php
									foreach ($tb_prediksi as $dtp) { ?>
										<tr>
											<td><?php echo $dtp['kd_prediksi']; ?></td>
											<td><?php echo $dtp['id_barang']; ?></td>
											<td><?php echo $dtp['nama_barang']; ?></td>
											<?php
											if ($dtp['bulan_prediksi'] == "01") {
												$setnamabulan = "Januari";
											} else if ($dtp['bulan_prediksi'] == "02") {
												$setnamabulan = "Februari";
											} else if ($dtp['bulan_prediksi'] == "03") {
												$setnamabulan = "Maret";
											} else if ($dtp['bulan_prediksi'] == "04") {
												$setnamabulan = "April";
											} else if ($dtp['bulan_prediksi'] == "05") {
												$setnamabulan = "Mei";
											} else if ($dtp['bulan_prediksi'] == "06") {
												$setnamabulan = "Juni";
											} else if ($dtp['bulan_prediksi'] == "07") {
												$setnamabulan = "Juli";
											} else if ($dtp['bulan_prediksi'] == "08") {
												$setnamabulan = "Agustus";
											} else if ($dtp['bulan_prediksi'] == "09") {
												$setnamabulan = "September";
											} else if ($dtp['bulan_prediksi'] == "10") {
												$setnamabulan = "Oktober";
											} else if ($dtp['bulan_prediksi'] == "11") {
												$setnamabulan = "November";
											} else if ($dtp['bulan_prediksi'] == "12") {
												$setnamabulan = "Desember";
											}
											?>
											<td><?php echo $setnamabulan; ?></td>
											<td><?php echo $dtp['tahun_prediksi']; ?></td>
											<td><?php echo $dtp['hasil_prediksi']; ?></td>
											<td><?php echo round($dtp['hasil_prediksi']); ?></td>
										</tr>
									<?php
									}
									?>
								<?php
								}
								?>
							</tbody>
						</table>
						<div class="center-align">
							<?php
							?>
						</div>
					</div>

				</div>
			</div>
		</div>
	</main>
	<script type="text/javascript">
		$(document).ready(function() {

			$("#keyword").change(function() {
				$("#cariygdiunduh").val($("#keyword").val());
			});

			$("#keyword").keyup(function() {
				$("#cariygdiunduh").val($("#keyword").val());
			});

		});
	</script>
	<!-- isi div id="layoutSidenav_content" terdapat pada footer -->
