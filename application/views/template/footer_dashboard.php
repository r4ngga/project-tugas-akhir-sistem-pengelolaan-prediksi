<footer class="py-4 bg-light mt-auto">
	<div class="container-fluid">
		<div class="d-flex align-items-center justify-content-between small">
			<div class="text-muted">Copyright &copy; Your Website <?= date('Y'); ?></div>
			<div>
				<a href="#">Privacy Policy</a>
				&middot;
				<a href="#">Terms &amp; Conditions</a>
			</div>
		</div>
	</div>
</footer>
</div>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Log Out</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Apakah Anda yakin ingin keluar?.</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<a class="btn btn-primary" href="<?= base_url('auth/log_out'); ?>">Logout</a>
			</div>
		</div>
	</div>
</div>



<!-- Input Pengguna Modal -->
<div class="modal fade" id="inptpnggunaModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Data Pengguna</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="<?= base_url(); ?>pemilik/TambahPengguna">

					<div class="form-group" hidden><label class="medium mb-1" for="Nama Pengguna">ID User</label><input class="form-control py-4" id="id_user" name="id_user" type="text" value="USR<?= sprintf("%04s", $id_user) ?>" readonly />
						<?= form_error('id_user', '<small class="text-danger">', '</small>'); ?>
					</div>

					<div class="form-group"><label class="medium mb-1" for="Nama Pengguna">Nama Pengguna</label><input class="form-control py-4" id="nama_pengguna" name="nama_pengguna" type="text" placeholder="Nama Pengguna" />
						<?= form_error('nama_pengguna', '<small class="text-danger">', '</small>'); ?>
					</div>

					<div class="form-group"><label class="medium mb-1" for="Username">Username</label><input class="form-control py-4" id="username" name="username" type="text" placeholder="Username" />
						<?= form_error('username', '<small class="text-danger">', '</small>'); ?>
					</div>

					<div class="form-group"><label class="medium mb-1" for="email">Email</label><input class="form-control py-4" id="email" name="email" type="text" placeholder="Email" />
						<?= form_error('email', '<small class="text-danger">', '</small>'); ?>
					</div>

					<div class="form-row">
						<div class="col-md-6">
							<div class="form-group"><label class="medium mb-1" for="Password">Password</label><input class="form-control py-4" id="password1" name="password1" type="password" placeholder="Enter password" />
								<?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group"><label class="medium mb-1" for="ConfirmPassword">Confirm Password</label><input class="form-control py-4" id="confirm_password" name="confirm_password" type="password" placeholder="Confirm password" />
								<?= form_error('confirm_password', '<small class="text-danger">', '</small>'); ?>
							</div>
						</div>
					</div>
					<div class="form-group"><label class="medium mb-1" for="rolepilih">Jenis Akses</label><select class="form-control" name="jenis_akses" id="roleselect">
							<option>Silahkan Pilih</option>
							<option value="admin">Admin</option>
							<option value="pengguna">Pengguna</option>
						</select>
						<?= form_error('jenis_akses', '<small class="text-danger">', '</small>'); ?>
					</div>
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

<!-- Input Supplier Modal -->
<div class="modal fade" id="inptsupplierModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Data Supplier</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="<?= base_url(); ?>admin/TambahSupplier">
					<div class="form-group">
						<label for="id_supplier">Id Suppllier</label>
						<input type="text" class="form-control" id="id_supplier" name="id_supplier" value="SPP<?= sprintf("%04s", $id_supplier) ?>" readonly>
					</div>
					<div class="form-group">
						<label for="nama_supplier">Nama Supplier</label>
						<input type="text" class="form-control" id="nama_supplier" name="nama_supplier" placeholder="Nama Supplier">
					</div>
					<div class="form-group">
						<label for="alamt">Alamat</label>
						<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
					</div>
					<div class="form-group">
						<label for="no_tlp">No Tlp</label>
						<input type="text" class="form-control" id="no_tlp" name="no_tlp" placeholder="No Tlp" maxlength="" onkeypress="return validasi_notlp(event)">
						<div id="msg-notlp"></div>
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

<script type="text/javascript">
	function validasi_notlp(evt) {
		var valnotlp = document.getElementById('no_tlp').value;
		var batasmax = 12;
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (document.getElementById('no_tlp').value.length == 13) {
			$("#msg-notlp").html('<small class="text-danger">maksimal 13 digit <small>').show().fadeOut(1600);
			return false;
		}
		if (charCode > 31 && (charCode < 48 || charCode > 57)) {
			// alert('masukan harus berupa angka');
			$("#msg-notlp").html('<small class="text-danger">masukan harus berupa angka <small>').show().fadeOut(1600);
			return false;
		}
		return true;
	}
</script>

<!-- Input Kategori Modal -->
<div class="modal fade" id="inptkategoriModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Data Kategori</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="<?= base_url(); ?>admin/TambahKategori">
					<div class="form-group">
						<label for="id_kategori">Id Kategori</label>
						<input type="text" class="form-control" id="id_kategori" name="id_kategori" value="KAT<?= sprintf("%04s", $id_kategori) ?>" readonly>
					</div>
					<div class="form-group">
						<label for="namakategori">Nama Kategori</label>
						<input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Nama Kategori">
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

<!-- Input Pembeli Modal -->
<div class="modal fade" id="inptpembeliModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Data Pembeli</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="<?= base_url(); ?>pengguna/TambahPembeli">
					<div class="form-group">
						<label for="id_pembeli">Id Pembeli</label>
						<input type="text" class="form-control" id="id_pembeli" name="id_pembeli" value="PBL<?= sprintf("%04s", $id_pembeli) ?>" readonly>
					</div>
					<div class="form-group">
						<label for="nama_pembeli">Nama Pembeli</label>
						<input type="text" class="form-control" id="nama_pembeli" name="nama_pembeli" placeholder="Nama Pembeli">
					</div>
					<div class="form-group">
						<label for="alamat_pembeli">Alamat</label>
						<input type="text" class="form-control" id="alamat_pembeli" name="alamat_pembeli" placeholder="Alamat">
					</div>
					<div class="form-group">
						<label for="notlp_pembeli">No Tlp</label>
						<input type="text" class="form-control" id="notlp_pembeli" name="notlp_pembeli" placeholder="No Tlp" maxlength="" onkeypress="return validasi_notlp_pembeli(event)">
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

<!-- Input Barang Modal -->
<div class="modal fade" id="inptbrgModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Data Barang</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="<?= base_url(); ?>admin/TambahBarang ">
					<div class="form-group">
						<label for="id_barang">Id Barang</label>
						<input type="text" class="form-control" id="id_Barang" name="id_barang" placeholder="Id Barang">
					</div>
					<div class="form-group">
						<label for="namabarang">Nama Barang</label>
						<input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang">
					</div>
					<div class="form-group">
						<label for="nama_kategori">Nama Kategori</label>
						<select class="form-control" id="id_kategori" name="id_kategori">
							<option>Pilih Kategori</option>
							<?php foreach ($tb_kategori as $k) { ?>
								<option value="<?php echo $k['id_kategori']; ?>"> <?php echo $k['nama_kategori']; ?> </option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label for="harga_beli">Harga Beli</label>
						<input type="text" id="harga_beli" class="form-control" name="harga_beli" placeholder="Harga Beli" maxlength="" onkeypress="return validasi_angkahrgbeli(event)">
						<div id="msg-hrgb"></div>
					</div>
					<div class="form-group">
						<label for="harga_jual">Harga Jual</label>
						<input type="text" class="form-control" id="harga_jual" name="harga_jual" placeholder="Harga Jual" onkeypress="return validasi_angkahrgjual(event)">
						<div id="msg-hrgj"></div>
					</div>
					<div class="form-group">
						<label for="spesifikasi">Spesifikasi</label>
						<textarea class="form-control" id="spesifikasi" name="spesifikasi" rows="3"></textarea>
					</div>
					<div class="form-group">
						<label for="stok">Stok</label>
						<input type="text" class="form-control" id="stok" name="stok" placeholder="0" value="0" readonly>
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

<script type="text/javascript">
	$(document).ready(function() {
		$('#datatransmsk').DataTable({
			responsive: true
		});
		$('#datatranskeluar').DataTable({
			responsive: true
		});
		$('#datapbl').DataTable({
			responsive: true
		});
		$(document).on('click', '#pilihbrgmsk', function() {
			var idbrgmsk = $(this).data('idbrgm');
			var nmbrgmsk = $(this).data('nmbrgm');
			var nmktgrmsk = $(this).data('nmktgrm');
			var hrgbrgmsk = $(this).data('hrgbelim');
			var stockmsk = $(this).data('stockm');
			$('#id_brg').val(idbrgmsk);
			$('#nm_brg').val(nmbrgmsk);
			$('#nm_ktgr').val(nmktgrmsk);
			$('#hrg_beli').val(hrgbrgmsk);
			$('#stok_awal').val(stockmsk);
			$('#lihatbarangmskModal').modal('hide');
		});

		$(document).on('click', '#pilihbrgkeluar', function() {
			var idbrgkeluar = $(this).data('idbrgklr');
			var nmbrgkeluar = $(this).data('nmbrgklr');
			var hrgbelikeluar = $(this).data('hrgbeliklr');
			var hrgbrgkeluar = $(this).data('hrgjualklr');
			var stokout = $(this).data('stockklr');
			$('#id_brgk').val(idbrgkeluar);
			$('#nm_brgk').val(nmbrgkeluar);
			$('#hrg_belik').val(hrgbelikeluar);
			$('#hrg_jualk').val(hrgbrgkeluar);
			$('#stok_awalk').val(stokout);
			$('#lihatbarangkeluarModal').modal('hide');

		});

		$(document).on('click', '#pilihpembeli', function() {
			var idpbl = $(this).data('idpembeli');
			var nmpbl = $(this).data('nmpembeli');
			$('#id_pbl').val(idpbl);
			$('#nm_pbl').val(nmpbl);
			$('#lihatpembeliModal').modal('hide');
		});

	});
	var valtableklr = document.getElementById('datatranskeluar'),
		rIndex;
	var valtablemsk = document.getElementById('datatransmsk'),
		rIndex;





	function tmbhklrtb_sementara() {}


	function validasi_angkahrgbeli(evt) {
		var valhrgbeli = document.getElementById('harga_beli').value;
		if (document.getElementById('harga_beli').value == "0") {
			//alert('awalan tidak boleh 0');
			$("#msg-hrgb").html('<small class="text-danger">awalan tidak boleh 0 <small>').show().fadeOut(1600);
			return false;
		} else {
			var charCode = (evt.which) ? evt.which : event.keyCode
			if (charCode > 31 && (charCode < 48 || charCode > 57)) {
				// alert('masukan harus berupa angka');
				$("#msg-hrgb").html('<small class="text-danger">masukan harus berupa angka <small>').show().fadeOut(1600);
				return false;
			}
			if (document.getElementById('harga_beli').value.length == 12) {
				$("#msg-hrgb").html('<small class="text-danger">masukan terlalu panjang<small>').show().fadeOut(1600);
				return false;
			}
		}
		return true;
	}

	function validasi_angkahrgjual(evt) {
		var valhrgbeli = document.getElementById('harga_jual').value;
		if (document.getElementById('harga_jual').value == "0") {
			//alert('awalan tidak boleh 0');
			$("#msg-hrgj").html('<small class="text-danger">awalan tidak boleh 0 <small>').show().fadeOut(1600);
			return false;
		} else {
			var charCode = (evt.which) ? evt.which : event.keyCode
			if (charCode > 31 && (charCode < 48 || charCode > 57)) {
				// alert('masukan harus berupa angka');
				$("#msg-hrgj").html('<small class="text-danger">masukan harus berupa angka <small>').show().fadeOut(1600);
				return false;
			}
			if (document.getElementById('harga_jual').value.length == 12) {
				$("#msg-hrgj").html('<small class="text-danger">masukan terlalu panjang<small>').show().fadeOut(1600);
				return false;
			}
		}
		return true;
	}

	function validasi_notlp_pembeli(evt) {
		var valhrgbeli = document.getElementById('notlp_pembeli').value;
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (document.getElementById('notlp_pembeli').value.length == 13) {
			$("#msg-notlp-pembeli").html('<small class="text-danger">maksimal 13 digit <small>').show().fadeOut(1600);
			return false;
		}
		if (charCode > 31 && (charCode < 48 || charCode > 57)) {
			// alert('masukan harus berupa angka');
			$("#msg-notlp-pembeli").html('<small class="text-danger">masukan harus berupa angka <small>').show().fadeOut(1600);
			return false;
		}
		return true;
	}
</script>

<!-- jQuery  -->
<!-- <script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script> -->
<!-- Datatable js -->
<!-- <script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap4.min.js"></script> -->
<!-- Responsive examples -->
<!-- <script src="plugins/datatables/dataTables.responsive.min.js"></script>
<script src="plugins/datatables/responsive.bootstrap4.min.js"></script> -->

<!-- JS Call  -->
<script src="<?= base_url(); ?>assets/dist/js/scripts.js" type="text/javascript"></script>
<!-- jQuery  -->
<script src="<?= base_url(); ?>assets/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>assets/dist/js/datatables.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>assets/dist/js/dataTables.foundation.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>assets/dist/js/dataTables.jqueryui.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>assets/dist/js/jquery.validate.js" type="text/javascript"></script>
<!-- <script type="text/javascript" src="/assets/dist/js/jquery-3.4.1.min.js"></script> -->
<!-- Responsive examples -->
<script src="<?= base_url(); ?>assets/dist/js/dataTables.responsive.min.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>assets/dist/js/responsive.bootstrap4.min.js" type="text/javascript"></script>
<!-- Datatable js -->
<script src="<?= base_url(); ?>assets/dist/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>assets/dist/js/jquery.dataTables.js" charset="utf8" type="text/javascript"></script>
<script src="<?= base_url(); ?>assets/dist/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>assets/dist/js/dataTables.bootstrap.js" type="text/javascript"></script>

<!-- font awesome call -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> -->




<!-- <script src="<? //= base_url(); 
					?>assets/dist/demo/chart-area-demo.js"></script>
<script src="<? //= base_url(); 
				?>assets/dist/demo/chart-bar-demo.js"></script> -->
<!-- <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></!-->
<!-- <script src="<? //= base_url(); 
					?>assets/dist/demo/datatables-demo.js"></script> -->
</body>

</html>
