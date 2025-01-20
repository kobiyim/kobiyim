{{--
 /**
 * Kobiyim
 * 
 * @version v4.0.0
 */
--}}

@extends('kobiyim.theme.auth')

@section('content')
	<div class="container container-tight py-4">
		@include('logo.auth')
		<div class="card card-md">
			<div class="card-body">
				{{ html()->form()->route('register')->class('form')->open()  }}
					<div class="mb-2">
						{{ html()->text('name', null)->attributes([ 'class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Adınız', 'tabindex' => 1, 'autofocus']) }}
					</div>
					<div class="mb-2">
						{{ html()->input('tel', 'phone')->attributes([ 'id' => 'phone', 'class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Telefon numaranız', 'tabindex' => 2]) }}
					</div>
					<div class="mb-2">
						{{ html()->password('password')->attributes([ 'class' => 'form-control', 'placeholder' => 'Şifreniz', 'tabindex' => 3]) }}
					</div>
					<div class="mb-2">
						{{ html()->password('password_confirmation')->attributes([ 'class' => 'form-control', 'placeholder' => 'Şifreniz Tekrar', 'tabindex' => 4]) }}
					</div>
					<div class="form-footer">
						{{ html()->submit('Kayıt Ol')->attributes([ 'class' => 'btn btn-primary w-100', 'tabindex' => 5 ]) }}
					</div>
				{{ html()->form()->close() }}
			</div>
		</div>
		<div class="text-center text-secondary mt-3">
			Hesabınız var mı? <a href="{{ route('login') }}" tabindex="-1">Giriş Yapın!</a>
		</div>
	</div>
@endsection

@section('scripts')
	<script type="text/javascript">
		$("#phone").inputmask("0 (999) 999 9999");
	</script>
@endsection

@section('title', 'Kayıt Ol')