{{--
 /**
 * Kobiyim
 * 
 * @package kobiyim/kobiyim
 * @since v1.0.0
 */
--}}
@if (config('layout', 'extras/user/dropdown/style') == 'light')
	{{-- Header --}}
	<div class="d-flex align-items-center p-8 rounded-top">
		{{-- Symbol --}}
		<div class="symbol symbol-md bg-light-primary mr-3 flex-shrink-0">
			<img src="{{ asset('media/users/300_21.jpg') }}" alt=""/>
		</div>

		{{-- Text --}}
		<div class="text-dark m-0 flex-grow-1 mr-3 font-size-h5">{{ Auth::user()->name }}</div>
		<span class="label label-light-success label-lg font-weight-bold label-inline">3 messages</span>
	</div>
	<div class="separator separator-solid"></div>
@else
	{{-- Header --}}
	<div class="d-flex align-items-center justify-content-between flex-wrap p-8 bgi-size-cover bgi-no-repeat rounded-top" style="background-image: url('{{ asset('media/misc/bg-1.jpg') }}')">
		<div class="d-flex align-items-center mr-2">
			{{-- Symbol --}}
			<div class="symbol bg-white-o-15 mr-3">
				<span class="symbol-label text-success font-weight-bold font-size-h4">{{ Auth::user()->name[0] }}</span>
			</div>

			{{-- Text --}}
			<div class="text-white m-0 flex-grow-1 mr-3 font-size-h5">{{ Auth::user()->name }}</div>
		</div>
		<a href="{{ route('logout') }}" class="btn btn-light-primary font-weight-bold" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Çıkış</a>

		<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
			@csrf
		</form>
	</div>
@endif
