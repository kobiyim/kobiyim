{{--
 /**
 * Kobiyim
 * 
 * @version v4.0.0
 */
--}}

<div class="btn-group" role="group">
	<button onclick="loadModal({ 'key' : 'editUser', 'id' : {{ $id }}}, true)" class="btn btn-sm btn-clean btn-icon mr-2">
		<i class="ti ti-edit"></i>
	</button>
	<button onclick="delete_({{ $id }})" class="btn btn-sm btn-clean btn-icon mr-2">
		<i class="ti ti-trash"></i>
	</button>
	<a href="{{ route('system.user.permission', $id) }}" class="btn btn-sm btn-clean btn-icon mr-2">
		<i class="ti ti-license"></i>
	</a>
</div>