{{--
 /**
 * Kobiyim
 * 
 * @version v4.0.0
 */
--}}

@if(can('system-menusu'))
	<li class="nav-item dropdown @if(request()->routeIs('system.*')) active @endif ">
		<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
			<span class="nav-link-title">
				Sistem
			</span>
		</a>
		<div class="dropdown-menu">
			<a class="dropdown-item @if(request()->routeIs('system.activity')) active @endif" href="{{ url('system/activity') }}">
				Aktiviteler
			</a>
			<a class="dropdown-item @if(request()->routeIs('system.querylog')) active @endif" href="{{ url('system/querylog') }}">
				Sorgu Takibi
			</a>
			<a class="dropdown-item @if(request()->routeIs('system.user.*')) active @endif" href="{{ url('system/user') }}">
				Kullanıcılar
			</a>
			<a class="dropdown-item @if(request()->routeIs('system.permission.*')) active @endif" href="{{ url('system/permission') }}">
				İzinler
			</a>
			<a class="dropdown-item @if(request()->routeIs('system.backup')) active @endif" href="{{ url('system/backup') }}">
				Yedeklemeler
			</a>
		</div>
	</li>
@endif