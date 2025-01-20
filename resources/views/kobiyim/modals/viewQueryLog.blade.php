{{--
 /**
 * Kobiyim
 * 
 * @version v4.0.0
 */
--}}

<div class="modal modal-blur fade" id="viewQueryLog" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Sorgu Hareket İnceleme</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<table class="table">
					@foreach(json_decode($get->subject_detail, true) as $key => $value)
						<tr>
							<th>{{ $key }}</th>
							<td>{{ $value }}</td>
						</tr>
					@endforeach
				</table> 
			</div>
			<div class="modal-footer">
				<button type="button" class="btn me-auto" data-bs-dismiss="modal">Kapat</button>
			</div>
		</div>
	</div>
</div>