{{--
 /**
 * Kobiyim
 * 
 * @version v2.0.0
 */
--}}
<div class="modal fade" id="createPermission" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Yeni İzin Ekle</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i aria-hidden="true" class="ki ki-close"></i>
				</button>
			</div>
			<div class="modal-body">
				<form class="form">
					<div class="form-group row">
						<label class="col-lg-3 col-form-label text-right">İzin:</label>
						<div class="col-lg-9">
							{!! html()->text(true, null)->attributes([ 'class' => 'form-control', 'autocomplete' => 'off', 'tabindex' => 1, 'id' => 'name' ]) !!}
							<div class="invalid-feedback" id="nameError"></div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-3 col-form-label text-right">Anahtarı:</label>
						<div class="col-lg-9">
							{!! html()->text(true, null)->attributes([ 'class' => 'form-control', 'autocomplete' => 'off', 'tabindex' => 1, 'id' => 'key' ]) !!}
							<div class="invalid-feedback" id="keyError"></div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Kapat</button>
				<button type="button" class="btn btn-primary font-weight-bold" onclick="store()">Kaydet</button>
			</div>
		</div>
	</div>
</div>