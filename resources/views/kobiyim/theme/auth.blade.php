{{--
 /**
 * Kobiyim
 * 
 * @version v4.0.0
 */
--}}

<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
		<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
		<title>@yield('title', $page_title ?? config('kobiyim.name'))</title>
		<!-- CSS files -->
		<link href="{{ asset('css/tabler.min.css') }}" rel="stylesheet"/>
		<link href="{{ asset('css/tabler-flags.min.css') }}" rel="stylesheet"/>
		<link href="{{ asset('css/tabler-payments.min.css') }}" rel="stylesheet"/>
		<link href="{{ asset('css/tabler-vendors.min.css') }}" rel="stylesheet"/>
		<link href="{{ asset('css/demo.min.css') }}" rel="stylesheet"/>
		<style>
			@import url('https://rsms.me/inter/inter.css');
			:root {
			--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
			}
			body {
			font-feature-settings: "cv03", "cv04", "cv11";
			}
		</style>
	</head>
	<body  class=" d-flex flex-column">
		<div class="page page-center">
			@yield('content')
		</div>
		<!-- Libs JS -->
		<!-- Tabler Core -->
		<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
		<script src="{{ asset('js/tabler.min.js') }}" defer></script>
		<script src="{{ asset('js/jquery.inputmask.min.js') }}"></script>

		@yield('scripts')
	</body>
</html>