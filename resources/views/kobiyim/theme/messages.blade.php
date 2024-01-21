{{--
 /**
 * Kobiyim
 * 
 * @package kobiyim/kobiyim
 * @since v1.0.0
 */
--}}
@if(session()->has('message'))
	<div class="alert alert-success">
		{{ session('message') }}
	</div>
@endif