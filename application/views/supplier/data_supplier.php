<?php foreach ($tb_supplier as $dtsupplier) : ?>
	<!-- Edit Supplier Modal -->
	<div class="modal fade" id="editsupplierModal<?php echo $dtsupplier['id_supplier']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="">Edit Data Supplier</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="POST" action="<?= base_url(); ?>admin/EditSupplier">
						<div class="form-group">
							<label for="namakategori">Id Suppllier</label>
							<input type="text" class="form-control" id="id_supplier" name="id_supplier" value="<?= $dtsupplier['id_supplier']; ?>" readonly>
						</div>
						<div class="form-group">
							<label for="namakategori">Nama Supplier</label>
							<input type="text" class="form-control" id="nama_supplier" name="nama_supplier" value="<?= $dtsupplier['nama_supplier']; ?>">
						</div>
						<div class="form-group">
							<label for="namakategori">Alamat</label>
							<input type="text" class="form-control" id="alamat" name="alamat" value="<?= $dtsupplier['alamat']; ?>">
						</div>
						<div class="form-group">
							<label for="namakategori">No Tlp</label>
							<input type="text" class="form-control" id="notlp" name="no_tlp" value="<?= $dtsupplier['no_tlp']; ?>">
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

<?php foreach ($tb_supplier as $dtsupplier) : ?>
	<!-- Hapus Supplier Modal -->
	<div class="modal fade" id="hapussupplierModal<?php echo $dtsupplier['id_supplier']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="">Hapus Data Supplier</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="POST" action="<?= base_url(); ?>admin/HapusSupplier">
						<p>Yakin menghapus data supplier ini yang bernama <?= $dtsupplier['nama_supplier']; ?> ? </p>
						<input type="hidden" class="form-control" id="id_supplier" name="id_supplier" value="<?= $dtsupplier['id_supplier']; ?>" readonly>
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
				<li class="breadcrumb-item" aria-current="page">Supplier</li>
			</ol>

			<div class="card mb-4">
				<div class="card-header"><i class="fas fa-table mr-1"></i>Tabel Supplier</div>
				<div class="card-body">
					<div class="row">
						<?php
						$jenisakses = $this->session->userdata('jenis_akses');
						if ($jenisakses == "admin") {
						?>
							<a href="#" id="tmbhkategori" data-toggle="modal" data-target="#inptsupplierModal" data-id="" class="btn btn-primary mb-3 ml-3"> Tambah Data Supplier</a>
						<?php } ?>
						<form class="form-inline mb-3 mr-3 ml-3" method="POST" action="">
							<input class="form-control mr-sm-2" placeholder="Cari" name="keyword">
							<button class="btn btn-outline-success m-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
						</form>
					</div>
					<?= $this->session->flashdata('notify'); ?>
					<?php if (empty($tb_supplier)) {
					?>
						<div class="alert alert-danger" role="alert">
							Data Supplier yang dicari tidak ditemukan!!
						</div>
					<?php } ?>
					<div class="table-responsive">
						<table class="table table-bordered" id="" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>Id Supplier</th>
									<th>Nama Supplier</th>
									<th>Alamat</th>
									<th>Nomer Telepon</th>
									<?php
									if ($jenisakses == "admin") {
									?>
										<th>Aksi</th>
									<?php
									}
									?>
									<!-- <th>Aksi</th> -->
								</tr>
							</thead>
							<tbody>
								<?php foreach ($tb_supplier as $dtsupplier) : ?>
									<tr>
										<td><?php echo $dtsupplier['id_supplier']; ?></td>
										<td><?php echo $dtsupplier['nama_supplier']; ?></td>
										<td><?php echo $dtsupplier['alamat']; ?></td>
										<td><?php echo $dtsupplier['no_tlp']; ?></td>
										<?php
										if ($jenisakses == "admin") {
										?>
											<td>
												<a href="<?= base_url(); ?><?= $dtsupplier['id_supplier']; ?>/#editsupplierModal" class="btn btn-success btn-sm ml-1" data-toggle="modal" data-target="#editsupplierModal<?php echo $dtsupplier['id_supplier']; ?>">
													Ubah</a>
												<a href="<?= base_url(); ?><?= $dtsupplier['id_supplier']; ?>/#hapussupplierModal" class="btn btn-danger btn-sm ml-1" data-toggle="modal" data-target="#hapussupplierModal<?php echo $dtsupplier['id_supplier']; ?>">Hapus</a>
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
