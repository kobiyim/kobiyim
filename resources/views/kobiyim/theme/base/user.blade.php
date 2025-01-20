{{--
 /**
 * Kobiyim
 * 
 * @version v4.0.0
 */
--}}

<div class="nav-item dropdown">
	<a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
		<span class="avatar avatar-sm rounded">{{ Auth::user()->name[0] }}</span>
		<div class="d-none d-xl-block ps-2">
			<div>{{ Auth::user()->name }}</div>
		</div>
	</a>
	<div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
		<a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Çıkış</a>

		<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
			@csrf
		</form>
	</div>
</div>