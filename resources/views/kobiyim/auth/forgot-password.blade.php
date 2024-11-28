{{--
 /**
 * Kobiyim
 * 
 * @version v3.0.0
 */
--}}

@extends('kobiyim.theme.auth')

@section('content')
	<div class="d-flex flex-center mb-15">
		@include('logo.auth')
	</div>
	<div class="login-signin">
		<div class="mt-10">
			<p>Şifre sıfırlama fonksiyonu geçici olarak devre dışıdır.</br>Lütfen sistem yöneticiniz ile irtibata geçiniz.<p>
			<span class="opacity-70 mr-4">Hesabınız var mı?</span>
			<a href="{{ route('login') }}" class="text-muted text-hover-primary font-weight-bold">Giriş yapın!</a>
		</div>
	</div>
@endsection