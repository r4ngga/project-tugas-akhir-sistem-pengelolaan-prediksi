<?php foreach ($tb_pembeli as $dtp) : ?>
	<!-- Edit Data Pembeli Modal -->
	<div class="modal fade" id="editpembeliModal<?php echo $dtp['id_pembeli']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Data Pembeli</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="POST" action="<?= base_url(); ?>pengguna/EditPembeli">
						<div class="form-group">
							<label for="id_Pembeli">Id Pembeli</label>
							<input type="text" class="form-control" id="id_pembeli" name="id_pembeli" value="<?= $dtp['id_pembeli']; ?>" readonly>
						</div>
						<div class="form-group">
							<label for="namapembeli">Nama Pembeli</label>
							<input type="text" class="form-control" id="nama_pembeli" name="nama_pembeli" value="<?= $dtp['nama_pembeli']; ?>">
						</div>
						<div class="form-group">
							<label for="alamat_pembeli">Alamat</label>
							<input type="text" class="form-control" id="alamat_pembeli" name="alamat_pembeli" value="<?= $dtp['alamat_pembeli'] ?>">
						</div>
						<div class="form-group">
							<label for="notlp_pembeli">No Tlp</label>
							<input type="text" class="form-control" id="notlp_pembeli" name="notlp_pembeli" value="<?= $dtp['notlp_pembeli']; ?>" maxlength="" onkeypress="return validasi_notlp_pembeli(event)">
							<div id="msg-notlp-pembeli"></div>
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

<?php foreach ($tb_pembeli as $dtp) : ?>
	<!-- Hapus Data Pembeli Modal -->
	<div class="modal fade" id="hapuspembeliModal<?php echo $dtp['id_pembeli']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Hapus Data Pembeli</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="POST" action="<?= base_url(); ?>pengguna/HapusPembeli">
						<p>Yakin menghapus data pembeli ini yang bernama <?= $dtp['nama_pembeli']; ?> ? </p>
						<input type="hidden" class="form-control" id="id_pembeli" name="id_pembeli" value="<?= $dtp['id_pembeli']; ?>" readonly>
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
				<li class="breadcrumb-item" aria-current="page">Pembeli</li>
			</ol>
			<div class="card mb-4">
				<div class="card-header"><i class="fas fa-table mr-1"></i>Tabel Pembeli / Konsumen</div>
				<div class="card-body">
					<div class="row">
						<?php
						$jenisakses = $this->session->userdata('jenis_akses');
						if ($jenisakses == "pengguna") {
						?>
							<a href="#" id="tmbhpembeli" data-toggle="modal" data-target="#inptpembeliModal" data-id="" class="btn btn-primary ml-3 mb-3"> Tambah Data Pembeli</a>
						<?php } ?>
						<form class="form-inline mb-3 mr-3 ml-3" method="POST">
							<input class="form-control mr-sm-2" placeholder="Cari" name="keyword">
							<button class="btn btn-outline-success m-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
						</form>
					</div>
					<?= $this->session->flashdata('notify'); ?>
					<?php if (empty($tb_pembeli)) {
					?>
						<div class="alert alert-danger" role="alert">
							Data Pembeli yang dicari tidak ditemukan!!
						</div>
					<?php } ?>
					<div class="table-responsive">
						<table class="table table-bordered" id="" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>No</th>
									<th>Id Pembeli</th>
									<th>Nama Pembeli</th>
									<th>Alamat</th>
									<th>Nomer Telepon</th>
									<?php
									if ($jenisakses == "pengguna") {
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
								foreach ($tb_pembeli as $dtp) : ?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td><?php echo $dtp['id_pembeli']; ?></td>
										<td><?php echo $dtp['nama_pembeli']; ?></td>
										<td><?php echo $dtp['alamat_pembeli']; ?></td>
										<td><?php echo $dtp['notlp_pembeli']; ?></td>
										<?php
										if ($jenisakses == "pengguna") {
										?>
											<td>
												<a href="<?= base_url(); ?><?= $dtp['id_pembeli']; ?>/#editpembeliModal" class="btn btn-success btn-sm ml-1" data-toggle="modal" data-target="#editpembeliModal<?php echo $dtp['id_pembeli']; ?>">
													Ubah</a>
												<a href="<?= base_url(); ?><?= $dtp['id_pembeli']; ?>/#hapuspembeliModal" class="btn btn-danger btn-sm ml-1" data-toggle="modal" data-target="#hapuspembeliModal<?php echo $dtp['id_pembeli']; ?>">Hapus</a>
											</td>
										<?php
										}
										?>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
						<div class="center-align">
							<?php echo $this->pagination->create_links(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<!-- isi div id="layoutSidenav_content" terdapat pada footer -->
