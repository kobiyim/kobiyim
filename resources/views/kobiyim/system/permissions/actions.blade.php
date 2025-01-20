{{--
 /**
 * Kobiyim
 * 
 * @version v4.0.0
 */
--}}

<div class="btn-group" role="group" aria-label="Basic example">
	<button onclick="loadModal({ 'key' : 'editPermission', 'id' : {{ $id }}}, true)" class="btn btn-sm btn-clean btn-icon mr-2">
		<i class="ti ti-edit"></i>
	</button>
	<button onclick="delete_({{ $id }})" class="btn btn-sm btn-clean btn-icon mr-2">
		<i class="ti ti-trash"></i>
	</button>
</div>