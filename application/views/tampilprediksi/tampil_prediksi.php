<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
			<ol class="breadcrumb mb-4 mt-2">
				<li class="breadcrumb-item active"><a href="<?= base_url() ?>pemilik">Dashboard</a> </li>
				<li class="breadcrumb-item active" aria-current="page">Transaksi</li>
				<li class="breadcrumb-item active" aria-current="page">Hitung Prediksi</li>
				<li class="breadcrumb-item" aria-current="page">Hasil Prediksi</li>
			</ol>
			<div class="card mb-4">
				<div class="card-body">
					<form method="POST" action="" class="">
						<?=
							$this->session->flashdata('notify');
						?>
						<div class="form-group row">
							<h3 class="col-md-5">Hasil Prediksi</h3>
						</div>
						<?php
						foreach ($tb_prediksi as $showresult) {
						?>
							<div class="form-group row">
								<label for="staticNama" class="col-md-3 col-form-label">Kode Prediksi</label>
								<div class="col">
									<label for="setkdprediksi" class="col-form-label"> <?php echo $showresult['kd_prediksi']; ?> </label>
								</div>
							</div>
							<div class="form-group row">
								<label for="staticNama" class="col-md-3 col-form-label">Hasil Prediksi Barang Keluar Bulan Selanjutnya</label>
								<div class="col-sm-5">
									<label for="sethasilprediksi" class="col-md-3 col-form-label"> <?php echo $showresult['hasil_prediksi']; ?> </label>
								</div>
							</div>
							<div class="form-group row">
								<label for="staticNama" class="col-md-3 col-form-label">Jumlah Barang Keluar Bulan Selanjutnya</label>
								<div class="col-sm-5">
									<label for="sethasilprediksi" class="col-md-3 col-form-label"> <?php echo round($showresult['hasil_prediksi']); ?> </label>
								</div>
							</div>
							<div class="form-group row">
								<label for="staticNama" class="col-md-3 col-form-label">Bulan yang diprediksi</label>
								<div class="col-sm-5">
									<?php
									// foreach ($tampilwma as $showresult) {
									if ($showresult['bulan_prediksi'] == "01") {
										$setnamabulan = "Januari";
									} else if ($showresult['bulan_prediksi'] == "02") {
										$setnamabulan = "Februari";
									} else if ($showresult['bulan_prediksi'] == "03") {
										$setnamabulan = "Maret";
									} else if ($showresult['bulan_prediksi'] == "04") {
										$setnamabulan = "April";
									} else if ($showresult['bulan_prediksi'] == "05") {
										$setnamabulan = "Mei";
									} else if ($showresult['bulan_prediksi'] == "06") {
										$setnamabulan = "Juni";
									} else if ($showresult['bulan_prediksi'] == "07") {
										$setnamabulan = "Juli";
									} else if ($showresult['bulan_prediksi'] == "08") {
										$setnamabulan = "Agustus";
									} else if ($showresult['bulan_prediksi'] == "09") {
										$setnamabulan = "September";
									} else if ($showresult['bulan_prediksi'] == "10") {
										$setnamabulan = "Oktober";
									} else if ($showresult['bulan_prediksi'] == "11") {
										$setnamabulan = "November";
									} else if ($showresult['bulan_prediksi'] == "12") {
										$setnamabulan = "Desember";
									}
									//}
									?>

									<label for="setnamabulanprediksi" class="col-md-3 col-form-label"> <?php echo $setnamabulan; ?> </label>
								</div>
							</div>

							<div class="form-group row">
								<label for="staticNama" class="col-md-3 col-form-label">Tahun yang diprediksi</label>
								<div class="col-sm-5">
									<label for="settahunprediksi" class="col-md-3 col-form-label"> <?php echo $showresult['tahun_prediksi']; ?> </label>

								</div>
							</div>
						<?php } ?>
						<div class="form-group">
							<label for="inputCalculate">&nbsp;</label>
							<a href="<?= base_url() ?>pemilik/dataprediksibarang" class="btn btn-info">Kembali</a>
							<!-- <button type="submit" class="btn btn-primary">Hitung</button> -->
						</div>
					</form>


				</div>
			</div>
		</div>
	</main>


	<script type="text/javascript">

	</script>
	<!-- isi div id="layoutSidenav_content" terdapat pada footer -->
