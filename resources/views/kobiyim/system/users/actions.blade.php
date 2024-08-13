{{--
 /**
 * Kobiyim
 * 
 * @version v2.0.0
 */
--}}
<div class="btn-group" role="group">
	<button onclick="loadModal({ 'key' : 'editUser', 'id' : {{ $id }}}, true)" class="btn btn-sm btn-clean btn-icon mr-2">
		<i class="la la-edit"></i>
	</button>
	<button onclick="delete_({{ $id }})" class="btn btn-sm btn-clean btn-icon mr-2">
		<i class="la la-trash"></i>
	</button>
	<a href="{{ route('user.permission', $id) }}" class="btn btn-sm btn-clean btn-icon mr-2">
		<i class="la la-leaf"></i>
	</a>
</div>