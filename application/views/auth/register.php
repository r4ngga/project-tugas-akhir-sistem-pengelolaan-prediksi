<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">
                                <img src="<?= base_url(); ?>/assets/images/logo1.jpg" class="img-fluid rounded mx-auto d-block" sizes="16x16" alt="logo">
                                <h3 class="text-center font-weight-light my-4">Register Akun</h3>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="<?= base_url(); ?>auth/register">

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
                                    <div class="form-group mt-4 mb-0">
                                        <button type="submit" class="btn btn-primary btn-block">
                                            Register Account
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center">
                                <div class="small"><a href="<?= base_url(); ?>">Have an account? Go to login</a></div>
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