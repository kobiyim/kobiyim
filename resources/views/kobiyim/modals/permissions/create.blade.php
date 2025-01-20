{{--
 /**
 * Kobiyim
 * 
 * @version v4.0.0
 */
--}}

<div class="modal modal-blur fade" id="createPermission" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Yeni İzin Ekle</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="mb-3">
					<label class="form-label">İzin:</label>
					{!! html()->text(true, null)->attributes([ 'class' => 'form-control', 'autocomplete' => 'off', 'tabindex' => 1, 'id' => 'name' ]) !!}
				</div>
				<div class="mb-2">
					<label class="form-label">Anahtarı:</label>
					{!! html()->text(true, null)->attributes([ 'class' => 'form-control', 'autocomplete' => 'off', 'tabindex' => 1, 'id' => 'key' ]) !!}
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn me-auto" data-bs-dismiss="modal">Kapat</button>
				<button type="button" class="btn btn-primary" onclick="store()">Kaydet</button>
			</div>
		</div>
	</div>
</div>