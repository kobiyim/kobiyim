{{--
 /**
 * Kobiyim
 * 
 * @version v2.0.0
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
				@foreach ($errors->all() as $error)
					<span>{{ $error }}</span>
				@endforeach
			</div>
		@endif
		{{ html()->form()->route('password.update')->class('form')->open() }}
			<div class="form-group mb-5">
				{{ html()->text('phone', session('phone', null))->attributes([ 'id' => 'phone', 'class' => 'form-control h-auto form-control-solid py-4 px-8', 'autocomplete' => 'off', 'placeholder' => 'Telefon numaranız']) }}
			</div>
			<div class="form-group mb-5">
				{{ html()->text('code', null)->attributes([ 'class' => 'form-control h-auto form-control-solid py-4 px-8', 'autocomplete' => 'off', 'placeholder' => 'Telefonunuza gelen kod']) }}
			</div>
			<div class="form-group mb-5">
				{{ html()->password('password')->attributes([ 'class' => 'form-control h-auto form-control-solid py-4 px-8', 'placeholder' => 'Şifreniz']) }}
			</div>
			<div class="form-group mb-5">
				{{ html()->password('password_confirmation')->attributes([ 'class' => 'form-control h-auto form-control-solid py-4 px-8', 'placeholder' => 'Şifreniz']) }}
			</div>
			{{ Form::submit('Şifremi Sıfırla', [ 'class' => 'btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4']) }}
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