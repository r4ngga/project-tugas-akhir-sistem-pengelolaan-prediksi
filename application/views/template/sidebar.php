<div id="layoutSidenav">
	<div id="layoutSidenav_nav">
		<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
			<div class="sb-sidenav-menu">
				<div class="nav">
					<?php
					$jenisakses = $this->session->userdata('jenis_akses');
					if ($jenisakses == "admin") {
					?>
						<div class="sb-sidenav-menu-heading">Dashboard</div>
						<a class="nav-link" href="<?= base_url() ?>admin">
							<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
							Home
						</a>
					<?php
					} elseif ($jenisakses == "pengguna") {
					?>
						<div class="sb-sidenav-menu-heading">Dashboard</div>
						<a class="nav-link" href="<?= base_url() ?>pengguna">
							<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
							Home
						</a>
					<?php
					} else {
					?>
						<div class="sb-sidenav-menu-heading">Dashboard</div>
						<a class="nav-link" href="<?= base_url() ?>pemilik">
							<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
							Home
						</a>
					<?php
					}
					?>

					<?php
					if ($jenisakses == "admin") {
					?>
						<div class="sb-sidenav-menu-heading">Data Master</div>
						<a class="nav-link" href="<?= base_url() ?>admin/databarang">
							<div class="sb-nav-link-icon"><i class="fas fa-box-open"></i></div>
							Barang
						</a>
						<a class="nav-link" href="<?= base_url() ?>admin/datakategori">
							<div class="sb-nav-link-icon"><i class="fas fa-bookmark"></i></div>
							Kategori
						</a>
						<a class="nav-link" href="<?= base_url() ?>admin/datasupplier">
							<div class="sb-nav-link-icon"><i class="fas fa-truck"></i></div>
							Supplier
						</a>
						<a class="nav-link" href="<?= base_url() ?>admin/datapembeli">
							<div class="sb-nav-link-icon"><i class="fas fa-shopping-bag"></i></div>
							Pembeli
						</a>
					<?php
					} elseif ($jenisakses == "pengguna") {
					?>
						<div class="sb-sidenav-menu-heading">Data Master</div>
						<a class="nav-link" href="<?= base_url() ?>pengguna/databarang_p">
							<div class="sb-nav-link-icon"><i class="fas fa-box-open"></i></div>
							Barang
						</a><a class="nav-link" href="<?= base_url() ?>pengguna/datakategori_p">
							<div class="sb-nav-link-icon"><i class="fas fa-bookmark"></i></div>
							Kategori
						</a>
						<a class="nav-link" href="<?= base_url() ?>pengguna/datasupplier_p">
							<div class="sb-nav-link-icon"><i class="fas fa-truck"></i></div>
							Supplier
						</a>
						<a class="nav-link" href="<?= base_url() ?>pengguna/datapembeli_p">
							<div class="sb-nav-link-icon"><i class="fas fa-shopping-bag"></i></div>
							Pembeli
						</a>

					<?php
					} else {
					?>

						<div class="sb-sidenav-menu-heading">Data Master</div>
						<a class="nav-link" href="<?= base_url() ?>pemilik/datapengguna_o">
							<div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
							Pengguna
						</a>

					<?php
					}
					?>

					<?php
					if ($jenisakses == "admin") {
					?>
						<div class="sb-sidenav-menu-heading">Transaksi</div>
						<a class="nav-link" href="<?= base_url() ?>admin/datatransaksimasuk">
							<div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
							Barang Masuk
						</a>
					<?php
					} elseif ($jenisakses == "pengguna") {
					?>
						<div class="sb-sidenav-menu-heading">Transaksi</div>
						<a class="nav-link" href="<?= base_url() ?>pengguna/datatransaksikeluar_p">
							<div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
							Barang Keluar
						</a>
						<a class="nav-link" href="<?= base_url() ?>pengguna/datatransaksiretur_p">
							<div class="sb-nav-link-icon"><i class="fas fa-redo"></i></div>
							Retur Barang
						</a>
					<?php
					} else {
					?>
						<div class="sb-sidenav-menu-heading">Transaksi</div>
						<a class="nav-link" href="<?= base_url() ?>pemilik/dataprediksibarang">
							<div class="sb-nav-link-icon"><i class="fas fa-sign-in-alt"></i></div>
							Hitung Prediksi
						</a>
					<?php
					}
					?>

					<?php
					if ($jenisakses == "admin") {
					?>
						<div class="sb-sidenav-menu-heading">Laporan</div>
						<a class="nav-link" href="<?= base_url() ?>admin/datalaporanmasuk">
							<div class="sb-nav-link-icon"><i class="fas fa-clipboard"></i> <i class="fas fa-sign-in-alt"></i></div>
							Barang Masuk
						</a>
					<?php
					} elseif ($jenisakses == "pengguna") {
					?>
						<div class="sb-sidenav-menu-heading">Laporan</div>
						<a class="nav-link" href="<?= base_url() ?>pengguna/datalaporankeluar_p">
							<div class="sb-nav-link-icon"><i class="fas fa-clipboard"></i> <i class="fas fa-sign-out-alt"></i></div>
							Barang Keluar
						</a>
						<a class="nav-link" href="<?= base_url() ?>pengguna/datalaporanrtur_p">
							<div class="sb-nav-link-icon"><i class="fas fa-clipboard"></i> <i class="fas fa-redo"></i></i></div>
							Retur Barang
						</a>
					<?php
					} else {
					?>
						<div class="sb-sidenav-menu-heading">Laporan</div>
						<a class="nav-link" href="<?= base_url() ?>pemilik/datalaporanprediksi">
							<div class="sb-nav-link-icon"><i class="fas fa-clipboard"></i> <i class="fas fa-sign-out-alt"></i></div>
							Hasil Prediksi
						</a>
					<?php
					}
					?>

				</div>
			</div>

		</nav>
	</div>
