<div class="container">

	<!-- Outer Row -->
	<div class="row justify-content-center">

		<div class="col-xl-10 col-lg-12 col-md-9">

			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
						<div class="col-lg-6">
							<div class="p-5 user">
								<div class="text-center">
									<h1 class="h4 text-gray-900">Reset Password for</h1>
									<h5 class="mb-4"><?= $this->session->userdata('reset_email') ?></h5>
								</div>

								<?= $this->session->flashdata('message'); ?>

								<form class="user" method="post" action="<?= base_url('auth/changePassword'); ?>">
									<div class="form-group">
										<input type="password" name="password1" class="form-control form-control-user" id="password1" aria-describedby="emailHelp" placeholder="Enter New Password...">
										<?= form_error('password1', '<small class="text-danger pl-3">', '</small>') ?>
									</div>
									<div class="form-group">
										<input type="password" name="password2" class="form-control form-control-user" id="password2" aria-describedby="emailHelp" placeholder="Confirm Password">
										<?= form_error('password2', '<small class="text-danger pl-3">', '</small>') ?>
									</div>
									<!-- <div class="form-group">
										<div class="custom-control custom-checkbox small">
											<input type="checkbox" class="custom-control-input" id="customCheck">
											<label class="custom-control-label" for="customCheck">Remember Me</label>
										</div>
									</div> -->
									<button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
										Reset Password
									</button>
									<hr>
									<!-- <a href="index.html" class="btn btn-google btn-user btn-block">
										<i class="fab fa-google fa-fw"></i> Login with Google
									</a>
									<a href="index.html" class="btn btn-facebook btn-user btn-block">
										<i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
									</a> -->
								</form>
								<!-- <hr> -->
								<div class="text-center">
									<a class="small" href="<?= base_url('auth') ?>">&larr; Back to Login</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>