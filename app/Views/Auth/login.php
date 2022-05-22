<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<div id="app">
	<section class="section">
		<div class="container mt-3">
			<div class="row">
				<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
					<div class="login-brand">
						<img src="https://umpp.ac.id/foto/UMPPcilik.png?1573704036174" alt="logo" width="100">
					</div>

					<div class="card card-primary shadow">
						<div class="card-header">
							<h4>Login</h4>
						</div>

						<div class="card-body">

							<?= view('App\Auth\_message_block') ?>

							<form method="POST" action="<?= route_to('login') ?>" class="needs-validation" novalidate="">
								<?= csrf_field() ?>
								<?php if ($config->validFields === ['email']) : ?>
									<div class="form-group">
										<label for="login"><?= lang('Auth.email') ?></label>
										<input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>">
										<div class="invalid-feedback">
											<?= session('errors.login') ?>
										</div>
									</div>
								<?php else : ?>
									<div class="form-group">
										<label for="login"><?= lang('Auth.emailOrUsername') ?></label>
										<input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
										<div class="invalid-feedback">
											<?= session('errors.login') ?>
										</div>
									</div>
								<?php endif; ?>

								<div class="form-group">
									<div class="d-block">
										<label for="password" class="control-label"><?= lang('Auth.password') ?></label>
										<div class="float-right">
											<?php if ($config->activeResetter) : ?>
												<a class="text-small" href="<?= route_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a>
											<?php endif; ?>
										</div>
									</div>
									<input type="password" name="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" tabindex="2" placeholder="<?= lang('Auth.password') ?>">
									<div class="invalid-feedback">
										<?= session('errors.password') ?>
									</div>
								</div>

								<?php if ($config->allowRemembering) : ?>
									<div class="form-group">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me" <?php if (old('remember')) : ?> checked <?php endif ?>>
											<label class="custom-control-label" for="remember-me">
												<?= lang('Auth.rememberMe') ?>
											</label>
										</div>
									</div>
								<?php endif; ?>

								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
										Login
									</button>
								</div>
							</form>

						</div>
					</div>

					<?php if ($config->allowRegistration) : ?>
						<div class="mt-5 text-muted text-center">
							Don't have an account? <a href="/register">Create One</a>
						</div>
					<?php endif; ?>

					<div class="simple-footer">
						Copyright &copy; Stisla 2018 | <strong>UMPP</strong> ~ <span id="tahunku"></span>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<?= $this->endSection() ?>