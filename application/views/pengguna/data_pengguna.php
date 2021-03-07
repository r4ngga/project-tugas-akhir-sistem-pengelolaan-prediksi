<?php foreach ($tb_pengguna as $dtpengguna) : ?>
	<!-- Edit Pengguna Modal -->
	<div class="modal fade" id="editpnggunaModal<?php echo $dtpengguna['id_user']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Data Pengguna</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="POST" action="<?= base_url(); ?>pemilik/EditPengguna">

						<div class="form-group"><label class="medium mb-1" for="id_user">ID User</label><input class="form-control py-4" id="id_user" name="id_user" type="text" value="<?= $dtpengguna['id_user']; ?>" readonly />
						</div>

						<div class="form-group"><label class="medium mb-1" for="nama_pengguna">Nama Pengguna</label><input class="form-control py-4" id="nama_pengguna" name="nama_pengguna" type="text" value="<?= $dtpengguna['nama_pengguna']; ?>" />
						</div>

						<div class="form-group"><label class="medium mb-1" for="username">Username</label><input class="form-control py-4" id="username" name="username" type="text" value="<?= $dtpengguna['username']; ?>" />
						</div>

						<div class="form-group"><label class="medium mb-1" for="email">Email</label><input class="form-control py-4" id="email" name="email" type="text" value="<?= $dtpengguna['email']; ?>" />
						</div>

						<div class="form-group"><label class="medium mb-1" for="jenisakses">Jenis Akses</label>
							<select class="form-control" id="jenis_akses" name="jenis_akses">
								<!-- <option>Pilih Jenis Akses</option> -->
								<?php if ($dtpengguna['jenis_akses'] == "admin") { ?>
									<option value="<?php echo $dtpengguna['jenis_akses']; ?>"> <?php echo $dtpengguna['jenis_akses']; ?> </option>
									<option value="pengguna">pengguna</option>
								<?php } elseif ($dtpengguna['jenis_akses'] == "pengguna") {
								?>
									<option value="<?php echo $dtpengguna['jenis_akses']; ?>"> <?php echo $dtpengguna['jenis_akses']; ?> </option>
									<option value="admin">admin</option>
								<?php
								} ?>
							</select>
						</div>

						<div class="form-row">
							<button type="submit" class="btn btn-primary mr-1">Submit</button>
							<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<!-- isi modal footer -->
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>

<?php foreach ($tb_pengguna as $dtpengguna) : ?>
	<!-- Hapus Pengguna Modal -->
	<div class="modal fade" id="hapuspnggunaModal<?php echo $dtpengguna['id_user']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Hapus Data Pengguna</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="POST" action="<?= base_url(); ?>pemilik/HapusPengguna">
						<p>Yakin menghapus data pengguna ini yang bernama <?= $dtpengguna['nama_pengguna']; ?>, atau
							username <?= $dtpengguna['username']; ?> ? </p>
						<input type="hidden" class="form-control" id="id_user" name="id_user" value="<?= $dtpengguna['id_user']; ?>" readonly>
						<button type="submit" class="btn btn-primary mr-1">Submit</button>
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
				<li class="breadcrumb-item active"><a href="<?= base_url() ?>pemilik">Dashboard</a> </li>
				<li class="breadcrumb-item active" aria-current="page">Data Master</li>
				<li class="breadcrumb-item" aria-current="page">Pengguna</li>
			</ol>
			<div class="card mb-4">
				<div class="card-header"><i class="fas fa-table mr-1"></i>Tabel Pengguna</div>
				<div class="card-body">
					<div class="row">
						<a href="#" id="tmbhpengguna" data-toggle="modal" data-target="#inptpnggunaModal" data-id="" class="btn btn-primary ml-3 mb-3"> Tambah Data Pengguna</a>
						<form class="form-inline mb-3 mr-3 ml-3" method="POST">
							<input class="form-control mr-sm-2" placeholder="Cari" name="keyword">
							<button class="btn btn-outline-success m-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
						</form>
					</div>
					<?= $this->session->flashdata('notify'); ?>
					<?php if (empty($tb_pengguna)) {
					?>
						<div class="alert alert-danger" role="alert">
							Data Pengguna yang dicari tidak ditemukan!!
						</div>
					<?php } ?>
					<div class="table-responsive">
						<table class="table table-bordered" id="" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>No</th>
									<th>Id Pengguna</th>
									<th>Nama</th>
									<th>Username</th>
									<th>Email</th>
									<th>Jenis Akses</th>
									<?php
									$jenisakses = $this->session->userdata('jenis_akses');
									if ($jenisakses == "pemilik") {
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
								foreach ($tb_pengguna as $dtpengguna) {
									if ($dtpengguna['jenis_akses'] != "pemilik") {
								?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo $dtpengguna['id_user']; ?></td>
											<td><?php echo $dtpengguna['nama_pengguna']; ?></td>
											<td><?php echo $dtpengguna['username']; ?></td>
											<td><?php echo $dtpengguna['email']; ?></td>
											<td><?php echo $dtpengguna['jenis_akses']; ?></td>
											<?php
											if ($jenisakses == "pemilik") {
											?>
												<td>
													<a href="<?= base_url(); ?><?= $dtpengguna['id_user']; ?>/#editpnggunaModal" class="btn btn-success btn-sm ml-1" data-toggle="modal" data-target="#editpnggunaModal<?php echo $dtpengguna['id_user']; ?>">
														Ubah</a>
													<a href="<?= base_url(); ?><?= $dtpengguna['id_user']; ?>/#hapuspnggunaModal" class="btn btn-danger btn-sm ml-1" data-toggle="modal" data-target="#hapuspnggunaModal<?php echo $dtpengguna['id_user']; ?>">Hapus</a>
												</td>
											<?php
											}
											?>
										</tr>
								<?php }
								} ?>
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

	<script type="text/javascript">



	</script>
