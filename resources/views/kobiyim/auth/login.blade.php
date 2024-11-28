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
		{{ html()->form()->route('login')->class('form')->open() }}
			<div class="form-group mb-5">
				{{ html()->text('phone', null)->attributes([ 'id' => 'phone', 'class' => 'form-control h-auto form-control-solid py-4 px-8', 'autocomplete' => 'off', 'placeholder' => 'Telefon numaranız', 'autofocus', 'tabindex' => 1 ]) }}
			</div>
			<div class="form-group mb-5">
				{{ html()->password('password')->attributes([ 'class' => 'form-control h-auto form-control-solid py-4 px-8', 'placeholder' => 'Şifreniz', 'tabindex' => 2 ]) }}
			</div>
			<div class="form-group d-flex flex-wrap justify-content-between align-items-center">
				<a href="{{ route('password.request') }}" id="kt_login_forgot" class="text-muted text-hover-primary">Şifremi Unuttum?</a>
			</div>
			{{ html()->submit('Giriş')->attributes([ 'class' => 'btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4', 'tabindex' => 3 ]) }}
		{{ html()->form()->close() }}
		<div class="mt-10">
			<span class="opacity-70 mr-4">Hesabınız yok mu?</span>
			<a href="{{ route('register') }}" class="text-muted text-hover-primary font-weight-bold">Kayıt ol!</a>
		</div>
	</div>
@endsection

@section('scripts')
	<script type="text/javascript">
		$("#phone").inputmask("0 (999) 999 9999");
	</script>
@endsection