<?php foreach ($tb_kategori as $dtkategori) : ?>
	<!-- Edit Kategori Modal -->
	<div class="modal fade" id="editkategoriModal<?php echo $dtkategori['id_kategori']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Data Kategori</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="POST" action="<?= base_url(); ?>admin/EditKategori">
						<div class="form-group">
							<label for="id_kategori">Id Kategori</label>
							<input type="text" class="form-control" id="id_kategori" name="id_kategori" value="<?= $dtkategori['id_kategori']; ?>" readonly>
						</div>
						<div class="form-group">
							<label for="namakategori">Nama Kategori</label>
							<input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="<?= $dtkategori['nama_kategori']; ?>">
						</div>
						<!-- <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div> -->
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

<?php foreach ($tb_kategori as $dtkategori) : ?>
	<!-- Hapus Kategori Modal -->
	<div class="modal fade" id="hapuskategoriModal<?php echo $dtkategori['id_kategori']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Hapus Data Kategori</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="POST" action="<?= base_url(); ?>admin/HapusKategori">
						<p>Yakin menghapus data kategori ini yang bernama <?= $dtkategori['nama_kategori']; ?> ? </p>
						<input type="hidden" class="form-control" id="id_kategori" name="id_kategori" value="<?= $dtkategori['id_kategori']; ?>" readonly>
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
				<li class="breadcrumb-item" aria-current="page">Kategori</li>
			</ol>
			<div class="card mb-4">
				<div class="card-header"><i class="fas fa-table mr-1"></i>Tabel Kategori</div>
				<div class="card-body">
					<div class="row">
						<?php
						$jenisakses = $this->session->userdata('jenis_akses');
						if ($jenisakses == "admin") {
						?>
							<a href="#" id="tmbhkategori" data-toggle="modal" data-target="#inptkategoriModal" data-id="" class="btn btn-primary mb-3 ml-3"> Tambah Data Kategori</a>
						<?php } ?>
						<form class="form-inline ml-3 mb-3 mr-3" method="POST">
							<input class="form-control mr-sm-2" placeholder="Cari" name="keyword">
							<button class="btn btn-outline-success m-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
						</form>
					</div>
					<?= $this->session->flashdata('notify'); ?>
					<?php if (empty($tb_kategori)) {
					?>
						<div class="alert alert-danger" role="alert">
							Data Kategori yang dicari tidak ditemukan!!
						</div>
					<?php } ?>
					<div class="table-responsive">
						<table class="table table-bordered" id="" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>Id Kategori</th>
									<th>Nama Kategori</th>
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
								<?php foreach ($tb_kategori as $dtkategori) : ?>
									<tr>
										<td><?php echo $dtkategori['id_kategori']; ?></td>
										<td><?php echo $dtkategori['nama_kategori']; ?></td>
										<?php
										if ($jenisakses == "admin") {
										?>
											<td class="align-middle">
												<a href="<?= base_url(); ?><?= $dtkategori['id_kategori']; ?>/#editkategoriModal" class="btn btn-success btn-sm ml-1" data-toggle="modal" data-target="#editkategoriModal<?php echo $dtkategori['id_kategori']; ?>">
													Ubah</a>
												<a href="<?= base_url(); ?><?= $dtkategori['id_kategori']; ?>/#hapuskategoriModal" class="btn btn-danger btn-sm ml-1" data-toggle="modal" data-target="#hapuskategoriModal<?php echo $dtkategori['id_kategori']; ?>">Hapus</a>
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
