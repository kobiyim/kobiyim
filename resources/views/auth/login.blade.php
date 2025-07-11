<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">
	<head>
		<meta charset="utf-8" />
		<title>Sign In | Velzon - Admin & Dashboard Template</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
		<meta content="Themesbrand" name="author" />
		<meta name="robots" content="noindex, nofollow">
		<!-- App favicon -->
		<link rel="shortcut icon" href="assets/images/favicon.ico">
		<!-- Layout config Js -->
		<script src="{{ asset('js/layout.js') }}"></script>
		<!-- Bootstrap Css -->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<!-- Icons Css -->
		<link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
		<!-- App Css-->
		<link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
		<!-- custom Css-->
		<link href="assets/css/custom.min.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div class="auth-page-wrapper pt-5">
			<!-- auth page bg -->
			<div class="auth-one-bg-position auth-one-bg" id="auth-particles">
				<div class="bg-overlay"></div>
				<div class="shape">
					<svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
						<path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
					</svg>
				</div>
			</div>
			<!-- auth page content -->
			<div class="auth-page-content">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="text-center mt-sm-5 mb-4 text-white-50">
								<div>
									<a href="index.html" class="d-inline-block auth-logo">
									<img src="{{ asset('images/logo-light.png') }}" alt="" height="20">
									</a>
								</div>
							</div>
						</div>
					</div>
					<!-- end row -->
					<div class="row justify-content-center">
						<div class="col-md-8 col-lg-6 col-xl-5">
							<div class="card mt-4 card-bg-fill">
								<div class="card-body p-4">
									@if ($errors->any())
										<div class="alert alert-danger">
											<span>{!! implode('</br>', array_values($errors->all())) !!}</span>
										</div>
									@endif
									@if (session('message'))
									    <div class="alert alert-success">
									        {{ session('message') }}
									    </div>
									@endif
									<div class="p-2 mt-2">
										{{ html()->form()->route('login')->class('form')->open() }}
											<div class="mb-3">
												<label for="username" class="form-label">Telefon Numarası</label>
												{{ html()->input('tel', 'phone')->attributes([ 'id' => 'phone', 'class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Telefon numaranız', 'autofocus', 'tabindex' => 1 ]) }}
											</div>
											<div class="mb-3">
												<label class="form-label" for="password-input">Şifre</label>
												{{ html()->password('password')->attributes([ 'class' => 'form-control', 'placeholder' => 'Şifreniz', 'tabindex' => 2 ]) }}
											</div>
											<div class="mb-3">
												<a href="{{ route('password.request') }}" class="text-muted text-hover-primary">Şifremi Unuttum?</a>
											</div>
											<div class="mt-4">
												{{ html()->submit('Giriş')->attributes([ 'class' => 'btn btn-success w-100', 'tabindex' => 3 ]) }}
											</div>
										{{ html()->form()->close() }}
									</div>
								</div>
								<!-- end card body -->
							</div>
							<!-- end card -->
							<div class="mt-4 text-center">
								<p class="mb-0">Hesabınız yok mu? <a href="{{ route('register') }}" class="fw-semibold text-primary text-decoration-underline"> Kayıt ol! </a> </p>
							</div>
						</div>
					</div>
					<!-- end row -->
				</div>
				<!-- end container -->
			</div>
			<!-- end auth page content -->
			<!-- footer -->
			<footer class="footer">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="text-center">
								<p class="mb-0 text-muted">
									&copy;
									<script>document.write(new Date().getFullYear())</script> Velzon. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand
								</p>
							</div>
						</div>
					</div>
				</div>
			</footer>
			<!-- end Footer -->
		</div>
		<!-- end auth-page-wrapper -->
		<!-- JAVASCRIPT -->
		<script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
		<script src="{{ asset('libs/simplebar/simplebar.min.js') }}"></script>
		<script src="{{ asset('libs/node-waves/waves.min.js') }}"></script>
		<script src="{{ asset('libs/feather-icons/feather.min.js') }}"></script>
		<script src="{{ asset('js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
		<script src="{{ asset('js/plugins.js') }}"></script>
		<!-- particles js -->
		<script src="{{ asset('libs/particles.js/particles.js') }}"></script>
		<!-- particles app js -->
		<script src="{{ asset('js/pages/particles.app.js') }}"></script>
		<!-- password-addon init -->
		<script src="{{ asset('js/pages/password-addon.init.js') }}"></script>
	</body>
</html>