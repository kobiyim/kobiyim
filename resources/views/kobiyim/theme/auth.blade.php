{{--
 /**
 * Kobiyim
 * 
 * @package kobiyim/kobiyim
 * @since v1.0.0
 */
--}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" {{ Metronic::printAttrs('html') }} {{ Metronic::printClasses('html') }}>
	<head>
		<meta charset="utf-8"/>

		{{-- Title Section --}}
		<title>@yield('title', $page_title ?? config('kobiyim.name'))</title>

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

		{{-- Includable CSS --}}
		<link href="{{ asset('css/pages/login/classic/login-4.css') }}" rel="stylesheet" type="text/css" />

		@yield('styles')
	</head>

	<body {{ Metronic::printAttrs('body') }} {{ Metronic::printClasses('body') }}>

		@if (config('layout.page-loader.type') != '')
			@include('kobiyim.theme.layout.partials._page-loader')
		@endif

		<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
				<div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('{{ asset('media/bg/bg-3.jpg') }}');">
					<div class="login-form text-center p-7 position-relative overflow-hidden">
						@yield('content')
					</div>
				</div>
			</div>
			<!--end::Login-->
		</div>

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
		@yield('scripts')

	</body>
</html>