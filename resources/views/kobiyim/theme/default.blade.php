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
		<title>@yield('title', $page_title ?? '') | {{ config('kobiyim.name', 'KOBİYİM') }}</title>
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
		<link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.css" />
  
		{{-- Favicon --}}
		<link rel="shortcut icon" href="{{ asset('media/logos/favicon.ico') }}" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

		@yield('styles')
	</head>
	<body class="layout-fluid">
		<script src="{{ asset('js/demo-theme.min.js') }}"></script>
		<div class="page">
			<!-- Navbar -->
			@include('kobiyim.theme.base._header')
			<div class="page-wrapper">
				<!-- Page body -->
				<div class="page-body">
					<div class="container-xl">
						<div class="row row-deck row-cards">
							@yield('content')
						</div>
					</div>
				</div>
				@include('kobiyim.theme.base._footer')
			</div>
		</div>

		<div id="modals"></div>
		<!-- Libs JS -->
		<!-- Tabler Core -->
		
		<script src="{{ asset('js/tabler.min.js') }}" defer></script>
		<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

		@hasSection('admin')
			@if(request()->is('system/*'))
				@include('kobiyim.js.admin')
			@endif
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
		
		<script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/@tabler/icons@1.74.0/icons-react/dist/index.umd.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

		@yield('scripts')

	</body>
</html>
