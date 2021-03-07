<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
			<h1 class="mt-4">Dashboard</h1>
			<ol class="breadcrumb mb-4">
				<li class="breadcrumb-item active"><a href="<?= base_url() ?>pemilik">Dashboard</a> </li>
				<li class="breadcrumb-item" aria-current="page">Home</li>
			</ol>
			<div class="row">
				<!-- isi content -->
				<div class="card ml-3" style="width: 18rem;">
					<div class="card-body">
						<h5 class="card-title"> <?= $tb_pengguna['nama_pengguna']; ?></h5>
						<h6 class="card-subtitle mb-2 text-muted"> <?= $tb_pengguna['id_user']; ?></h6>
						<p class="card-text">Username = <?= $tb_pengguna['username']; ?>.</p>
						<p class="card-text">Jenis Akses = <?= $tb_pengguna['jenis_akses']; ?>.</p>

					</div>
				</div>
			</div>
		</div>

		<div class="container-fluid mt-4">
			<div class="table-responsive">
				<h5>
					Daftar barang yang persediaannya sudah habis
				</h5>
				<table class="table table-sm table-bordered" id="" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Id Barang</th>
							<th>Nama Barang</th>
							<th>Kategori</th>
							<th>Harga Beli</th>
							<th>Harga Jual</th>
							<th>Stok</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($tb_barang as $brg) {

						?>
							<tr>
								<td><?= $brg['id_barang']; ?></td>
								<td><?= $brg['nama_barang']; ?></td>
								<td><?= $brg['nama_kategori']; ?></td>
								<td><?= $brg['harga_beli']; ?></td>
								<td><?= $brg['harga_jual']; ?></td>
								<td><?= $brg['stok']; ?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</main>
	<!-- isi div id="layoutSidenav_content" terdapat pada footer -->
