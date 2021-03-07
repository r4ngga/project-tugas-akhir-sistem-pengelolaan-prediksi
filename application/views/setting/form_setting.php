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
				} else {
				?>
					<li class="breadcrumb-item active"><a href="<?= base_url() ?>pemilik">Dashboard</a> </li>
				<?php
				}
				?>
				<li class="breadcrumb-item" aria-current="page">Pengaturan</li>
			</ol>
			<div class="card mb-4">
				<?= $this->session->flashdata('notify'); ?>
				<div class="card-body">

					<form method="POST" <?php
										if ($jenisakses == "admin") {
										?> action="<?= base_url() ?>admin/editsettpengguna" <?php
																						} elseif ($jenisakses == "pengguna") { ?> action="<?= base_url() ?>pengguna/editsettpengguna_p" <?php } elseif ($jenisakses == "pemilik") {
																																														?> action="<?= base_url() ?>pemilik/editsettpengguna_o" <?php
																																																											}
																																																												?>>
						<!-- <div class=" row"> -->
						<div class="form-group row" hidden>
							<label for="staticID" class="col-sm-2 col-form-label">Id Pengguna</label>
							<div class="col-sm-5">
								<input type="text" readonly class="form-control-plaintext" id="iduser" name="id_user" value="<?= $tb_pengguna['id_user']; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="staticUsername" class="col-sm-2 col-form-label">Username</label>
							<div class="col-sm-5">
								<input type="text" readonly class="form-control-plaintext" id="username" name="username" value="<?= $tb_pengguna['username']; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="staticNama" class="col-sm-2 col-form-label">Nama</label>
							<div class="col-sm-5">
								<input type="text" class="form-control-plaintext" id="namapengguna" name="nama_pengguna" value="<?= $tb_pengguna['nama_pengguna']; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
							<div class="col-sm-5">
								<input type="email" class="form-control-plaintext" id="email" name="email" value="<?= $tb_pengguna['email']; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputPassword" class="col-sm-2 col-form-label">Jenis Akses</label>
							<div class="col-sm-5">
								<label for="inputJenisAkses"> <?= $tb_pengguna['jenis_akses']; ?> </label>
							</div>
						</div>
						<div class="form-group row">
							<label for="staticEmail" class="col-sm-2 col-form-label">Ganti Password</label>
							<div class="col-sm-5">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
							<div class="col-sm-5">
								<input type="password" class="form-control" id="Password1" name="pasword" value="">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputPassword" class="col-sm-2 col-form-label">Ulangi Password</label>
							<div class="col-sm-5">
								<input type="password" class="form-control" id="Password" value="">
							</div>
						</div>
						<div class="form-group row">
							<button type="submit" class="btn btn-primary">Simpan Perubahan</button>
						</div>
					</form>

				</div>
			</div>
		</div>
	</main>
	<script type="text/javascript">

	</script>
	<!-- isi div id="layoutSidenav_content" terdapat pada footer -->
