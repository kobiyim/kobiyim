{{--
 /**
 * Kobiyim
 * 
 * @version v2.0.0
 */
--}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" {{ Metronic::printAttrs('html') }} {{ Metronic::printClasses('html') }}>
	<head>
		<meta charset="utf-8"/>

		{{-- Title Section --}}
		<title>@yield('title', $page_title ?? '') | {{ config('kobiyim.name', 'KOBİYİM') }}</title>

		{{-- Meta Data --}}
		<meta name="description" content="@yield('page_description', $page_description ?? '')"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

		{{-- Favicon --}}
		<link rel="shortcut icon" href="{{ asset('media/logos/favicon.ico') }}" />

		{{-- Fonts --}}
		{{ Metronic::getGoogleFontsInclude() }}

		{{-- Global Theme Styles (used by all pages) --}}
		@foreach(config('layout.resources.css') as $style)
			<link href="{{ config('layout.self.rtl') ? asset(Metronic::rtlCssPath($style)) : asset($style) }}" rel="stylesheet" type="text/css"/>
		@endforeach

		{{-- Layout Themes (used by all pages) --}}
		@foreach (Metronic::initThemes() as $theme)
			<link href="{{ config('layout.self.rtl') ? asset(Metronic::rtlCssPath($theme)) : asset($theme) }}" rel="stylesheet" type="text/css"/>
		@endforeach

		@hasSection('datatable')
			<link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
		@endif

		{{-- Includable CSS --}}
		@yield('styles')
	</head>

	<body {{ Metronic::printAttrs('body') }} {{ Metronic::printClasses('body') }} data-scrolltop="off">

		@if (config('layout.page-loader.type') != '')
			@include('kobiyim.theme.partials._page-loader')
		@endif

		@include('kobiyim.theme.base._layout')

		<div id="modals"></div>

		<script>var HOST_URL = "{{ url('/') }}";</script>

		{{-- Global Config (global config for global JS scripts) --}}
		<script>
			var KTAppSettings = {!! json_encode(config('layout.js'), JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES) !!};
		</script>

		{{-- Global Theme JS Bundle (used by all pages)  --}}
		@foreach(config('layout.resources.js') as $script)
			<script src="{{ asset($script) }}" type="text/javascript"></script>
		@endforeach

		{{-- Includable JS --}}
		@hasSection('datatable')
			<script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
		@endif

		@hasSection('admin')
			@include('kobiyim.js.admin')
		@else
			@include('kobiyim.js.main')
		@endif

		@if(isset($update))
			<div class="modal fade" id="changelog" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeLg" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">{{ $update['title'] }}</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<i aria-hidden="true" class="ki ki-close"></i>
							</button>
						</div>
						<div class="modal-body">
							{!! $update['message'] !!}
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary font-weight-bold" data-dismiss="modal">Kapat</button>
						</div>
					</div>
				</div>
			</div>
			<script type="text/javascript">
				$(document).ready(function() {
				    setTimeout(function() {
				        openModal('changelog');
				    }, 
				    1000);
				});
			</script>
		@endif

		@yield('scripts')

	</body>
</html>
