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
				@if ($errors->any())
					<div class="alert alert-danger">
						{!! implode('</br>', array_values($errors->all())) !!}
					</div>
				@endif
				@if (session('message'))
				    <div class="alert alert-success">
				        {{ session('message') }}
				    </div>
				@endif
				{{ html()->form()->route('login')->class('form')->open() }}
					<div class="mb-2">
						{{ html()->input('tel', 'phone')->attributes([ 'id' => 'phone', 'class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Telefon numaranız', 'autofocus', 'tabindex' => 1 ]) }}
					</div>
					<div class="mb-2">
						{{ html()->password('password')->attributes([ 'class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Şifreniz', 'tabindex' => 2 ]) }}
					</div>
					<div class="form-footer">
						{{ html()->submit('Giriş')->attributes([ 'class' => 'btn btn-primary w-100', 'tabindex' => 3 ]) }}
					</div>
				{{ html()->form()->close() }}
			</div>
		</div>
		<div class="text-center text-secondary mt-3">
			Hesabınız yok mu? <a href="{{ route('register') }}" tabindex="-1">Kayıt ol!</a>
		</div>
	</div>
@endsection

@section('scripts')
	<script type="text/javascript">
		$("#phone").inputmask("0 (999) 999 9999");
	</script>
@endsection

@section('title', 'Hesabınıza Giriş Yapın')