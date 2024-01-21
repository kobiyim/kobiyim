{{--
 /**
 * Kobiyim
 * 
 * @package kobiyim/kobiyim
 * @since v1.0.0
 */
--}}
@extends('kobiyim.layout.auth')

@section('content')
	<!-- Login form -->
	{{ Form::open([ 'route' => 'login', 'class' => 'login-form'])}}
		<div class="card mb-0">
			<div class="card-body">
				<div class="text-center mb-3">
					<div class="d-inline-flex align-items-center justify-content-center mb-4 mt-2">
						<img src="{{ asset('images') }}/logo_icon.svg" class="h-48px" alt="">
					</div>
					<h5 class="mb-0">{{ strtoupper(config('kobiyim.name')) }}</h5>
					<span class="d-block text-muted">Hesabınıza giriş yapın</span>
				</div>
				<div class="mb-3">
					<label class="form-label">Telefon numaranız</label>
					<div class="form-control-feedback form-control-feedback-start">
						{{ Form::tel('phone', null, [ 'class' => 'form-control', 'placeholder' => '0 (500) 000 0000', 'id' => 'phone' ]) }}
						<div class="form-control-feedback-icon">
							<i class="ph-phone text-muted"></i>
						</div>
					</div>
				</div>
				<div class="mb-3">
					<label class="form-label">Şifreniz</label>
					<div class="form-control-feedback form-control-feedback-start">
						{{ Form::password('password', [ 'class' => 'form-control', 'placeholder' => '••••••••']) }}
						<div class="form-control-feedback-icon">
							<i class="ph-lock text-muted"></i>
						</div>
					</div>
					<div class="text-end mt-1">
						<a href="{{ route('password.request') }}">Şifremi unuttum?</a>
					</div>
				</div>
				<div class="mb-3">
					{{ Form::submit('Giriş', [ 'class' => 'btn btn-primary w-100']) }}
				</div>
				<div class="text-center">
					<span class="text-muted">Hesabınız yok mu?</span> <a href="{{ route('register') }}">Kayıt Ol</a>
				</div>

			</div>
		</div>
	{{ Form::close() }}
	<!-- /login form -->
@endsection

@section('scripts')
	<script>
		$("#phone").inputmask('0 (999) 999 9999');
	</script>
@endsection