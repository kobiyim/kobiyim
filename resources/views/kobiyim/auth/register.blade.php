{{--
 /**
 * Kobiyim
 * 
 * @package kobiyim/kobiyim
 * @since v1.0.7
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
				<ul style="margin-bottom: 0px;">
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		{{ Form::open([ 'route' => 'register', 'class' => 'form' ]) }}
			<div class="form-group mb-5">
				{{ Form::text('name', null, [ 'class' => 'form-control h-auto form-control-solid py-4 px-8', 'autocomplete' => 'off', 'placeholder' => 'Adınız']) }}
			</div>
			<div class="form-group mb-5">
				{{ Form::text('phone', null, [ 'id' => 'phone', 'class' => 'form-control h-auto form-control-solid py-4 px-8', 'autocomplete' => 'off', 'placeholder' => 'Telefon numaranız']) }}
			</div>
			<div class="form-group mb-5">
				{{ Form::password('password', [ 'class' => 'form-control h-auto form-control-solid py-4 px-8', 'placeholder' => 'Şifreniz']) }}
			</div>
			<div class="form-group mb-5">
				{{ Form::password('password_confirmation', [ 'class' => 'form-control h-auto form-control-solid py-4 px-8', 'placeholder' => 'Şifreniz tekrar']) }}
			</div>
			{{ Form::submit('Kayıt ol', [ 'class' => 'btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4']) }}
		{{ Form::close() }}
		<div class="mt-10">
			<span class="opacity-70 mr-4">Hesabınız var mı?</span>
			<a href="{{ route('login') }}" class="text-muted text-hover-primary font-weight-bold">Giriş yapın!</a>
		</div>
	</div>
@endsection

@section('scripts')
	<script type="text/javascript">
		$("#phone").inputmask("0 (999) 999 9999");
		$("#email").inputmask("email");
	</script>
@endsection