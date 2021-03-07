<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
			<h1 class="mt-4">Dashboard</h1>
			<ol class="breadcrumb mb-4">
				<li class="breadcrumb-item active"><a href="<?= base_url() ?>admin">Dashboard</a> </li>
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
			<div class="table-responsive mb-2">
				<h5>
					5 Transaksi Terakhir Barang yang Masuk ke persediaan
				</h5>
				<table class="table table-bordered" id="" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Urutan Masuk</th>
							<th>Tanggal</th>
							<th>Id Barang</th>
							<th>Nama Barang</th>
							<th>Harga Beli</th>
							<th>Banyak Barang</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($tb_brg_msk as $brgmsk) {

						?>
							<tr>
								<td><?= $brgmsk['no_urut_masuk']; ?></td>
								<td><?= $brgmsk['tgl_masuk']; ?></td>
								<td><?= $brgmsk['id_barang']; ?></td>
								<td><?= $brgmsk['nama_barang']; ?></td>
								<td><?= $brgmsk['harga_beli']; ?></td>
								<td><?= $brgmsk['jumlah_brgmsk']; ?></td>
								<td><?= $brgmsk['total_harga_beli']; ?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>

		</div>
	</main>
	<!-- isi div id="layoutSidenav_content" terdapat pada footer -->
