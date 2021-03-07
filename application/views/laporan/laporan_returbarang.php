<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
			<!-- <h1 class="mt-4">Dashboard</h1> -->
			<ol class="breadcrumb mb-4 mt-2">
				<li class="breadcrumb-item active"><a href="<?= base_url() ?>pengguna">Dashboard</a> </li>
				<li class="breadcrumb-item active" aria-current="page">Laporan</li>
				<li class="breadcrumb-item" aria-current="page">Laporan Retur Barang</li>
			</ol>
			<div class="card mb-4">
				<div class="card-body">
					<?= $this->session->flashdata('notify'); ?>
					<form method="POST" action="">
						<div class="form-row">
							<div class="col-md-6 mr-1">
								<div class="form-group">
									<div class="form-row">
										<div class="col">
											<label for="lbl_stoksemula">Awal Periode</label>
											<input type="date" class="form-control" placeholder="" id="awalperiode" name="awalperiode">
										</div>
										<div class="col">
											<label for="lbl_stoksemula">Akhir Periode</label>
											<input type="date" class="form-control" placeholder="" id="akhirperiode" name="akhirperiode">
										</div>
										<div class="col">
											<label for="inputcari">&nbsp;</label><br>
											<button type="submit" id="" class="btn btn-primary">Cari</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>

					<form method="POST" action="<?= base_url(); ?>/pengguna/excelcetakbrgkembali">
						<div class="form-row">
							<div class="col-md-5 mr-2">
								<div class="form-group">
									<div class="form-row">
										<div class="col" hidden>
											<label for="lbl_stoksemula">Awal Periode</label>
											<input type="date" class="form-control" placeholder="" id="awaltgl" name="awalperiode">
										</div>
										<div class="col" hidden>
											<label for="lbl_stoksemula">Akhir Periode</label>
											<input type="date" class="form-control" placeholder="" id="akhirtgl" name="akhirperiode">
										</div>
									</div>
								</div>
								<div class="form-group">
									<button type="submit" id="" class="btn btn-warning">Unduh</button>
								</div>
							</div>
						</div>
					</form>

					<div class="table-responsive">
						<?php
						if ($this->input->post('awalperiode') == true && $this->input->post('akhirperiode') == true) {
							if ($this->input->post('awalperiode') > $this->input->post('akhirperiode')) {
							} else {
								if ($tb_retur > 0) {
						?>
									<label for="tampiltgl"> Dari <?php echo $tgl1; ?> Sampai <?php echo $tgl2; ?></label>
						<?php
								}
							}
						}
						?>
						<table class="table table-bordered" id="" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>Kode Retur</th>
									<th>Urutan Kembali</th>
									<th>No Nota</th>
									<th>Id Barang</th>
									<th>Nama Barang</th>
									<th>Tanggal</th>
									<th>Harga Jual</th>
									<th>QTY</th>
								</tr>
							</thead>
							<tbody id="">
								<?php
								if ($this->input->post('awalperiode') == true && $this->input->post('akhirperiode') == true) {
									if ($this->input->post('awalperiode') > $this->input->post('akhirperiode')) {
										$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
                                                    Gagal melakukan pencarian karena tanggal awal lebih besar daripada tanggal akhir!!
                                                    </div>');
										redirect('pengguna/datalaporanrtur_p');
									} else {
										if ($tb_retur > 0) {
											foreach ($tb_retur as $dtbr) : ?>
												<tr>
													<td><?php echo $dtbr['kd_retur']; ?></td>
													<td><?php echo $dtbr['no_urut_kembali']; ?></td>
													<td><?php echo $dtbr['no_nota']; ?></td>
													<td><?php echo $dtbr['id_barang']; ?></td>
													<td><?php echo $dtbr['nama_barang']; ?></td>
													<td><?php echo $dtbr['tgl_retur']; ?></td>
													<td><?php echo $dtbr['harga_jual']; ?></td>
													<td><?php echo $dtbr['jumlah_brgkembali']; ?></td>
												</tr>
								<?php endforeach;
										}
									}
								} ?>
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
			$('#awalperiode').change(function() {
				var awalan = $(this).val(); //use jquery built in functions
				$('#awaltgl').val(awalan);
			});

			$('#akhirperiode').change(function() {
				var akhiran = $(this).val(); //use jquery built in functions
				$('#akhirtgl').val(akhiran);
			});
		});
	</script>
	<!-- isi div id="layoutSidenav_content" terdapat pada footer -->
