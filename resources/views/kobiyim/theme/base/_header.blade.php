{{--
 /**
 * Kobiyim
 * 
 * @version v4.0.0
 */
--}}

<header class="navbar navbar-expand-md d-print-none" >
	<div class="container-xl">
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
			@include('logo.dashboard')
		</h1>
		<div class="navbar-nav flex-row order-md-last">
			@include('kobiyim.theme.base.user')
		</div>
		<div class="collapse navbar-collapse" id="navbar-menu">
			<div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
				<ul class="navbar-nav">
					@include('kobiyim.theme.base.menu')
				</ul>
			</div>
		</div>
	</div>
</header>