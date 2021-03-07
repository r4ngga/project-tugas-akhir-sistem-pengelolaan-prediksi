<?php foreach ($tb_brg as $dtbrg) : ?>
	<!-- Edit Barang Modal -->
	<div class="modal fade" id="editbrgModal<?php echo $dtbrg['id_barang']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Data Barang</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="POST" action="<?= base_url(); ?>admin/EditBarang ">
						<div class="form-group">
							<label for="id_barang">Id Barang</label>
							<input type="text" class="form-control" id="id_Barang" name="id_barang" value="<?= $dtbrg['id_barang']; ?>">
						</div>
						<div class="form-group">
							<label for="namabarang">Nama Barang</label>
							<input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= $dtbrg['nama_barang']; ?>">
						</div>
						<div class="form-group">
							<label for="nama_kategori">Nama Kategori</label>
							<select class="form-control" id="id_kategori" name="id_kategori">
								<?php foreach ($tb_kategori as $k) { ?>
									<?php if ($k['id_kategori'] == $dtbrg['id_kategori']) { ?>
										<option value="<?= $dtbrg['id_kategori']; ?>" selected> <?= $k['nama_kategori']; ?> </option>
									<?php } else { ?>
										<option value="<?= $k['id_kategori']; ?>"> <?= $k['nama_kategori']; ?> </option>
									<?php } ?>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label for="harga_beli">Harga Beli</label>
							<input type="text" class="form-control" id="hargabeli" name="harga_beli" value="<?= $dtbrg['harga_beli']; ?>" maxlength="" onkeypress="return validasi_angkahrgbeli(event)">

						</div>
						<div class="form-group">
							<label for="harga_jual">Harga Jual</label>
							<input type="text" class="form-control" id="hargajual" name="harga_jual" value="<?= $dtbrg['harga_jual']; ?>" onkeypress="return validasi_angkahrgjual(event)">

						</div>
						<div class="form-group">
							<label for="spesifikasi">Spesifikasi</label>
							<textarea class="form-control" id="spesifikasi" name="spesifikasi" value="" rows="3"><?= $dtbrg['spesifikasi']; ?></textarea>
						</div>
						<div class="form-group">
							<label for="stok">Stok</label>
							<input type="text" class="form-control" id="stok" name="stok" value="<?= $dtbrg['stok']; ?>" readonly>
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					</form>
				</div>
				<div class="modal-footer">
					<!-- isi modal footer -->
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>

<?php foreach ($tb_brg as $dtbrg) : ?>
	<!-- Hapus Barang Modal -->
	<div class="modal fade" id="hapusbrgModal<?php echo $dtbrg['id_barang']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Hapus Data Barang</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="POST" action="<?= base_url(); ?>admin/HapusBarang ">
						<p>Yakin menghapus data barang ini yang bernama <?= $dtbrg['nama_barang']; ?> ? </p>
						<input type="hidden" class="form-control" id="id_Barang" name="id_barang" value="<?= $dtbrg['id_barang']; ?>">
						<button type="submit" class="btn btn-primary">Submit</button>
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					</form>
				</div>
				<div class="modal-footer">
					<!-- isi modal footer -->
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>

<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
			<!-- <h1 class="mt-4">Dashboard</h1> -->
			<ol class="breadcrumb mb-4 mt-2">
				<?php
				$jenisakses = $this->session->userdata('jenis_akses');
				if ($jenisakses == "admin") {
				?>
					<li class="breadcrumb-item active"><a href="<?= base_url() ?>admin">Dashboard</a> </li>
				<?php
				} elseif ($jenisakses == "pengguna") {
				?>
					<li class="breadcrumb-item active"><a href="<?= base_url() ?>pengguna">Dashboard</a> </li>
				<?php
				}
				?>
				<li class="breadcrumb-item active" aria-current="page">Data Master</li>
				<li class="breadcrumb-item" aria-current="page">Barang</li>
			</ol>
			<!-- <div class="row"> -->
			<!-- isi content -->
			<!-- </div> -->
			<div class="card mb-4">
				<div class="card-header"><i class="fas fa-table mr-1"></i>Tabel Barang</div>
				<div class="card-body">
					<div class="row">
						<?php
						$jenisakses = $this->session->userdata('jenis_akses');
						if ($jenisakses == "admin") {
						?>
							<a href="#" data-toggle="modal" data-target="#inptbrgModal" class="btn btn-primary ml-3 mb-3 "> Tambah Data Barang</a>
						<?php } ?>
						<form class="form-inline ml-3 mb-3 mr-3" method="POST">
							<input class="form-control mr-sm-2" placeholder="Cari" name="keyword">
							<button class="btn btn-outline-success m-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
						</form>
					</div>
					<?= $this->session->flashdata('notify'); ?>
					<?php if (empty($tb_brg)) {
					?>
						<div class="alert alert-danger" role="alert">
							Data Barang yang dicari tidak ditemukan!!
						</div>
					<?php } ?>
					<div class="table-responsive">
						<table class="table table-bordered" id="" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>No</th>
									<th>Id Barang</th>
									<th>Nama</th>
									<th>Kategori</th>
									<th>Harga Beli</th>
									<th>Harga Jual</th>
									<th>Spesifikasi</th>
									<th>Stok</th>
									<?php
									if ($jenisakses == "admin") {
									?>
										<th>Aksi</th>
									<?php
									}
									?>
								</tr>
							</thead>
							<tbody>

								<?php
								$no = $this->uri->segment('3') + 1;
								foreach ($tb_brg as $dtbrg) : ?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td><?php echo $dtbrg['id_barang']; ?></td>
										<td><?php echo $dtbrg['nama_barang']; ?></td>
										<td><?php echo $dtbrg['nama_kategori']; ?></td>
										<td><?php echo $dtbrg['harga_beli']; ?></td>
										<td><?php echo $dtbrg['harga_jual']; ?></td>
										<td><?php echo $dtbrg['spesifikasi']; ?></td>
										<td><?php echo $dtbrg['stok']; ?></td>
										<?php
										if ($jenisakses == "admin") {
										?>
											<td>
												<a href="<?= base_url(); ?><?= $dtbrg['id_barang']; ?>/#editbrgModal" class="btn btn-success btn-sm ml-1 mb-1" data-toggle="modal" data-target="#editbrgModal<?php echo $dtbrg['id_barang']; ?>">
													Ubah</a>
												<a href="<?= base_url(); ?><?= $dtbrg['id_barang']; ?>/#hapusbrgModal" class="btn btn-danger btn-sm ml-1 mb-1" data-toggle="modal" data-target="#hapusbrgModal<?php echo $dtbrg['id_barang']; ?>">Hapus</a>
											</td>
										<?php
										}
										?>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
						<div class="center-align">
							<?php echo $this->pagination->create_links();
							?>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>
	<!-- isi div id="layoutSidenav_content" terdapat pada footer -->
