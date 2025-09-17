{{--
 /**
 * Kobiyim
 * 
 * @version v3.0.0
 */
--}}

{{-- Content --}}
@if (config('layout.content.extended'))
	@yield('content')
@else
	<div class="d-flex flex-column-fluid">
		<div class="@if(config('layout.content.width') == 'fluid') container-fluid @else container @endif">
			@yield('content')
		</div>
	</div>
@endif
