{{--
 /**
 * Kobiyim
 * 
 * @package kobiyim/kobiyim
 * @since v1.0.22
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
		{{ html()->form()->route('password.send')->class('form')->open()  }}
			<div class="form-group mb-5">
				{{ html()->text('phone', null,)->attributes([ 'id' => 'phone', 'class' => 'form-control h-auto form-control-solid py-4 px-8', 'autocomplete' => 'off', 'placeholder' => 'Telefon numaranız']) }}
			</div>
			{{ html()->submit('Şifremi Sıfırla')->attributes([ 'class' => 'btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4']) }}
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