{{--
 /**
 * Kobiyim
 * 
 * @package kobiyim/kobiyim
 * @since v1.0.0
 */
--}}
	<div class="list-icons">
		<a href="{{ route('system.user.edit', $id) }}" class="list-icons-item">
			<i class="icon-pencil7"></i>
		</a>
		<a href="{{ route('system.user.permissions', $id) }}" class="list-icons-item">
			<i class="icon-accessibility"></i>
		</a>
		<a onclick="loadModal('deleteUser', {{ $id }});" class="list-icons-item">
			<i class="icon-trash"></i>
		</a>
	</div>