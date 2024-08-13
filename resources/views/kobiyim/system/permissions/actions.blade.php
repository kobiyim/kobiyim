{{--
 /**
 * Kobiyim
 * 
 * @version v2.0.0
 */
--}}
<div class="btn-group" role="group" aria-label="Basic example">
	<button onclick="loadModal({ 'key' : 'editPermission', 'id' : {{ $id }}}, true)" class="btn btn-sm btn-clean btn-icon mr-2">
		<i class="la la-edit"></i>
	</button>
	<button onclick="delete_({{ $id }})" class="btn btn-sm btn-clean btn-icon mr-2">
		<i class="la la-trash"></i>
	</button>
</div>