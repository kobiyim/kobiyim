{{--
 /**
 * Kobiyim
 * 
 * @version v3.0.6
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
		{{ html()->form()->route('register')->class('form')->open()  }}
			<div class="form-group mb-5">
				{{ html()->text('name', null)->attributes([ 'class' => 'form-control h-auto form-control-solid py-4 px-8', 'autocomplete' => 'off', 'placeholder' => 'Adınız']) }}
			</div>
			<div class="form-group mb-5">
				{{ html()->input('tel', 'phone')->attributes([ 'id' => 'phone', 'class' => 'form-control h-auto form-control-solid py-4 px-8', 'autocomplete' => 'off', 'placeholder' => 'Telefon numaranız']) }}
			</div>
			<div class="form-group mb-5">
				{{ html()->password('password')->attributes([ 'class' => 'form-control h-auto form-control-solid py-4 px-8', 'placeholder' => 'Şifreniz']) }}
			</div>
			<div class="form-group mb-5">
				{{ html()->password('password_confirmation')->attributes([ 'class' => 'form-control h-auto form-control-solid py-4 px-8', 'placeholder' => 'Şifreniz tekrar']) }}
			</div>
			{{ html()->submit('Kayıt ol')->attributes([ 'class' => 'btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4']) }}
		{{ html()->form()->close() }}
		<div class="mt-10">
			<span class="opacity-70 mr-4">Hesabınız var mı?</span>
			<a href="{{ route('login') }}" class="text-muted text-hover-primary font-weight-bold">Giriş yapın!</a>
		</div>
	</div>
@endsection

@section('scripts')
	<script type="text/javascript">
		$("#phone").inputmask("0 (999) 999 9999");
	</script>
@endsection