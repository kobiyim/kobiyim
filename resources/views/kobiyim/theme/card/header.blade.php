{{--
 /**
 * Kobiyim
 * 
 * @package kobiyim/kobiyim
 * @since v1.0.0
 */
--}}
<div class="card-header align-items-center border-0">
	<div class="card-title">
		<span class="card-icon">
			<i class="{{ isset($icon) ? $icon : 'la la-industry' }}"></i>
		</span>
		<h3 class="card-label">{!! $title !!}</h3>
	</div>
	@if(isset($toolbar))
		<div class="card-toolbar">
			{!! $toolbar !!}
		</div>
	@endif
</div>