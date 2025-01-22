{{--
 /**
 * Kobiyim
 * 
 * @version v3.0.0
 */
--}}

<div class="modal fade" id="viewQueryLog" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Sorgu Hareket İnceleme</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i aria-hidden="true" class="ki ki-close"></i>
				</button>
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
				<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Kapat</button>
			</div>
		</div>
	</div>
</div>
