{{--
 /**
 * Kobiyim
 * 
 * @package kobiyim/kobiyim
 * @since v1.0.7
 */
--}}
{{-- Header --}}
<div id="kt_header" class="header {{ Metronic::printClasses('header', false) }}" {{ Metronic::printAttrs('header') }}>

	{{-- Container --}}
	<div class="container-fluid d-flex align-items-center justify-content-between">
		@if (config('layout.header.self.display'))

			{{-- Header Menu --}}
			<div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
				@if(config('layout.aside.self.display') == false)
					@include('logo.dashboard')
				@endif

				<div id="kt_header_menu" class="header-menu header-menu-mobile {{ Metronic::printClasses('header_menu', false) }}" {{ Metronic::printAttrs('header_menu') }}>
					<ul class="menu-nav {{ Metronic::printClasses('header_menu_nav', false) }}">
						{{ Menu::renderHorMenu(array_merge(config('menu_header.items'), systemMenu())) }}
					</ul>
				</div>
			</div>

		@else
			<div></div>
		@endif

		@include('kobiyim.theme.partials.extras._topbar')
	</div>
</div>
