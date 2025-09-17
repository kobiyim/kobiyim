@extends('kobiyim.theme.auth')

@section('content')
	{{ html()->form()->route('login')->class('form w-100')->open() }}
		<div class="text-center mb-11">
			<h1 class="text-gray-900 fw-bolder mb-3">Sign In</h1>
			<div class="text-gray-500 fw-semibold fs-6">Your Social Campaigns</div>
		</div>
		<div class="fv-row mb-8">
			{{ html()->input('tel', 'phone')->attributes([ 'id' => 'phone', 'class' => 'form-control bg-transparent', 'autocomplete' => 'off', 'placeholder' => 'Telefon numaranız', 'autofocus', 'tabindex' => 1 ]) }}
		</div>
		<div class="fv-row mb-3">
			{{ html()->password('password')->attributes([ 'class' => 'form-control bg-transparent', 'placeholder' => 'Şifreniz', 'tabindex' => 2 ]) }}
		</div>
		<div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
			<div></div>
			<a href="{{ route('password.request') }}" class="link-primary">Şifremi unuttum?</a>
		</div>
		<div class="d-grid mb-10">
			{{ html()->submit('Giriş')->attributes([ 'class' => 'btn btn-primary', 'tabindex' => 3 ]) }}
		</div>
		<div class="text-gray-500 text-center fw-semibold fs-6">Hesabınız yok mu? 
		<a href="{{ route('register') }}" class="link-primary">Kayıt ol!</a></div>
	{{ html()->form()->close() }}
@endsection

@section('scripts')
	<script type="text/javascript">
		$("#phone").inputmask("0 (999) 999 9999");
	</script>
@endsection