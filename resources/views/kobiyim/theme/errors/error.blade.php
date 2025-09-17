{{--
 /**
 * Kobiyim
 * 
 * @version v3.0.11
 */
--}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" {{ Metronic::printAttrs('html') }} {{ Metronic::printClasses('html') }}>
	<!--begin::Head-->
	<head>
		<meta charset="utf-8" />
		<title>@yield('title', $page_title ?? '') | {{ config('app.name') }}</title>
		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="canonical" href="https://keenthemes.com/metronic" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Custom Styles(used by this page)-->
		<link href="{!! asset('css/pages/error/error-6.css') !!}" rel="stylesheet" type="text/css" />
		<!--end::Page Custom Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="{!! asset('plugins/global/plugins.bundle.css') !!}" rel="stylesheet" type="text/css" />
		<link href="{!! asset('plugins/custom/prismjs/prismjs.bundle.css') !!}" rel="stylesheet" type="text/css" />
		<link href="{!! asset('css/style.bundle.css') !!}" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<link href="{!! asset('css/themes/layout/header/base/light.css') !!}" rel="stylesheet" type="text/css" />
		<link href="{!! asset('css/themes/layout/header/menu/light.css') !!}" rel="stylesheet" type="text/css" />
		<link href="{!! asset('css/themes/layout/brand/dark.css') !!}" rel="stylesheet" type="text/css" />
		<link href="{!! asset('css/themes/layout/aside/dark.css') !!}" rel="stylesheet" type="text/css" />
		<!--end::Layout Themes-->
		<link rel="shortcut icon" href="{!! asset('media/logos/favicon.ico') !!}" />
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Error-->
			<div class="error error-6 d-flex flex-row-fluid bgi-size-cover bgi-position-center" style="background-image: url({!! asset('media/error/bg6.jpg') !!});">
				<!--begin::Content-->
				<div class="d-flex flex-column flex-row-fluid text-center">
					<h1 class="error-title font-weight-boldest text-white mb-12" style="margin-top: 12rem;">HATA ...</h1>
					<p class="display-4 font-weight-bold text-white">Ters gitti bi'şeyler.</p>
				</div>
				<!--end::Content-->
			</div>
			<!--end::Error-->
		</div>
		<!--end::Main-->
		<script>var HOST_URL = "{{ url('/') }}";</script>

		{{-- Global Config (global config for global JS scripts) --}}
		<script>
			var KTAppSettings = {!! json_encode(config('layout.js'), JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES) !!};
		</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="{!! asset('plugins/global/plugins.bundle.js') !!}"></script>
		<script src="{!! asset('plugins/custom/prismjs/prismjs.bundle.js') !!}"></script>
		<script src="{!! asset('js/scripts.bundle.js') !!}"></script>
		<!--end::Global Theme Bundle-->
	</body>
	<!--end::Body-->
</html>