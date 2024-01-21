{{--
 /**
 * Kobiyim
 * 
 * @package kobiyim/kobiyim
 * @since v1.0.0
 */
--}}
@php
	$direction = config('layout.extras.quick-panel.offcanvas.direction', 'right');
@endphp
<div id="kt_quick_panel" class="offcanvas offcanvas-{{ $direction }} pt-5 pb-10">
	<div class="offcanvas-header offcanvas-header-navs d-flex align-items-center justify-content-between mb-5">
		<ul class="nav nav-bold nav-tabs nav-tabs-line nav-tabs-line-3x nav-tabs-primary flex-grow-1 px-10" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab" href="#kt_quick_panel_logs" >Laminoks</a>
			</li>
		</ul>
		<div class="offcanvas-close mt-n1 pr-5">
			<a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_panel_close">
			<i class="ki ki-close icon-xs text-muted"></i>
			</a>
		</div>
	</div>

	<div class="offcanvas-content px-10">
		<div class="tab-content">
			<div class="tab-pane fade show pt-3 pr-5 mr-n5 active" id="kt_quick_panel_logs" role="tabpanel">
				<div class="navi navi-icon-circle navi-spacer-x-0" id="laminoks-notification">

				</div>
			</div>
		</div>
	</div>
</div>
