{{--
 /**
 * Kobiyim
 * 
 * @package kobiyim/kobiyim
 * @since v1.0.0
 */
--}}
@extends('kobiyim.theme.auth')

@section('content')
	<div class="d-flex flex-center mb-15">
		<a href="{{ route('dashboard') }}">
			<img src="{{ asset('logo.jpg') }}" class="max-h-75px" alt="" />
		</a>
	</div>
	<div class="login-signin">
		@if ($errors->any())
			<div class="alert alert-danger">
				@foreach ($errors->all() as $error)
					<span>{{ $error }}</span>
				@endforeach
			</div>
		@endif
		{{ Form::open([ 'route' => 'password.send', 'class' => 'form' ]) }}
			<ul class="nav nav-tabs nav-tabs-line justify-content-center">
			    <li class="nav-item">
			        <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_1">Telefon Numarasıyla</a>
			    </li>
			    <li class="nav-item">
			        <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2">Mail Adresiyle</a>
			    </li>
			</ul>
			<div class="tab-content mt-5" id="myTabContent">
			    <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel" aria-labelledby="kt_tab_pane_2">
					<div class="form-group mb-5">
						{{ Form::text('phone', null, [ 'id' => 'phone', 'class' => 'form-control h-auto form-control-solid py-4 px-8', 'autocomplete' => 'off', 'placeholder' => 'Telefon numaranız']) }}
					</div>
			    </div>
			    <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel" aria-labelledby="kt_tab_pane_2">
					<div class="form-group mb-5">
						{{ Form::text('email', null, [ 'id' => 'email', 'class' => 'form-control h-auto form-control-solid py-4 px-8', 'autocomplete' => 'off', 'placeholder' => 'Mail adresiniz']) }}
					</div>
			    </div>
			</div>
			{{ Form::submit('Şifremi Sıfırla', [ 'class' => 'btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4']) }}
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