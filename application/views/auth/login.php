<div id="layoutAuthentication">
	<div id="layoutAuthentication_content">
		<main>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-5">
						<div class="card shadow-lg border-0 rounded-lg mt-5">
							<div class="card-header">
								<img src="<?= base_url(); ?>/assets/images/logo1.jpg" class="img-fluid rounded mx-auto d-block" sizes="16x16" alt="logo">
								<h3 class="text-center font-weight-light my-4">Login</h3>
							</div>
							<?= $this->session->flashdata('notify'); ?>
							<div class="card-body">
								<form method="POST" action="<?= base_url('auth'); ?>">
									<div class="form-group"><label class="small mb-1" for="username">Username</label><input class="form-control py-4" id="username" name="username" type="text" placeholder="Username" /></div>
									<div class="form-group"><label class="small mb-1" for="password">Password</label><input class="form-control py-4" id="password" name="password" type="password" placeholder="Password" /></div>
									<div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0"><a class="small" href="<?= base_url(); ?>auth/forgotpassword">Forgot Password?</a>
										<button type="submit" class="btn btn-primary">Login</button></div>
								</form>
							</div>
							<div class="card-footer text-center">
								<div class="small"><a href="<?= base_url(); ?>auth/register">Need an account? Sign up!</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
	</div>
	<br>
	<div id="layoutAuthentication_footer">
		<footer class="py-4 bg-dark mt-auto">
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
</div>
