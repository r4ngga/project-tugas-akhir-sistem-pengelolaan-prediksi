<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
	<?php $jenisakses = $this->session->userdata('jenis_akses');
	if ($jenisakses == "admin") {
	?>
		<a class="navbar-brand" href="<?= base_url() ?>admin">On Computer</a>
	<?php
	} elseif ($jenisakses == "pengguna") {
	?>
		<a class="navbar-brand" href="<?= base_url() ?>pengguna">On Computer</a>
	<?php
	} else {
	?>
		<a class="navbar-brand" href="<?= base_url() ?>pemilik">On Computer</a>
	<?php
	}
	?>
	<button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#">
		<i class="fas fa-bars"></i></button>
	<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">

	</form>
	<!-- Navbar-->
	<ul class="navbar-nav ml-auto ml-md-0">


		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<?= $tb_pengguna['nama_pengguna']; ?> <i class="fas fa-user fa-fw"></i></a>
			<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
				<?php
				if ($jenisakses == "admin") {
				?>
					<a class="dropdown-item" href="<?= base_url() ?>admin/settingpengguna">Settings</a>
				<?php
				} elseif ($jenisakses == "pengguna") {
				?>
					<a class="dropdown-item" href="<?= base_url() ?>pengguna/settingpengguna_p">Settings</a>
				<?php
				} elseif ($jenisakses == "pemilik") {
				?>
					<a class="dropdown-item" href="<?= base_url() ?>pemilik/settingpengguna_o">Settings</a>
				<?php
				}
				?>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
			</div>
		</li>
	</ul>
</nav>
