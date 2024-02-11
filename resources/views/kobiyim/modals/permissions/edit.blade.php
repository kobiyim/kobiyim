{{--
 /**
 * Kobiyim
 * 
 * @package kobiyim/kobiyim
 * @since v1.0.18
 */
--}}
<div class="modal fade" id="editPermission" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">İzin Düzenleme</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i aria-hidden="true" class="ki ki-close"></i>
				</button>
			</div>
			<div class="modal-body">
				<form class="form">
					<div class="form-group row">
						<label class="col-lg-3 col-form-label text-right">İzin:</label>
						<div class="col-lg-9">
							{!! Form::text('', $get->name, [ 'class' => 'form-control', 'autocomplete' => 'off', 'tabindex' => 1, 'id' => 'name' . $get->id ]) !!}
							<div class="invalid-feedback" id="nameError"></div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-3 col-form-label text-right">Anahtarı:</label>
						<div class="col-lg-9">
							{!! Form::text('', $get->key, [ 'class' => 'form-control', 'autocomplete' => 'off', 'tabindex' => 1, 'id' => 'key' .  $get->id ]) !!}
							<div class="invalid-feedback" id="keyError"></div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Kapat</button>
				<button type="button" class="btn btn-primary font-weight-bold" onclick="update({!! $get->id !!});">Güncelle</button>
			</div>
		</div>
	</div>
</div>