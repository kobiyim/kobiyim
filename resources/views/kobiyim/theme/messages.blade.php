{{--
 /**
 * Kobiyim
 * 
 * @version v3.0.0
 */
--}}

@if(session()->has('message'))
	<div class="alert alert-success">
		{{ session('message') }}
	</div>
@endif