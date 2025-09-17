{{--
 /**
 * Kobiyim
 * 
 * @version v3.0.0
 */
--}}

<div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Kullanıcı Düzenleme</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i aria-hidden="true" class="ki ki-close"></i>
				</button>
			</div>
			<div class="modal-body">
				<form class="form">
					<div class="form-group row">
						<label class="col-lg-3 col-form-label text-right">Kullanıcı Adı:</label>
						<div class="col-lg-9">
							{!! html()->text(true, $get->name)->attributes([ 'class' => 'form-control', 'autocomplete' => 'off', 'tabindex' => 1, 'id' => 'name' . $get->id ]) !!}
							<div class="invalid-feedback" id="nameError"></div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-3 col-form-label text-right">Şifresi:</label>
						<div class="col-lg-9">
							{!! html()->password('')->attributes([ 'class' => 'form-control', 'autocomplete' => 'off', 'tabindex' => 1, 'id' => 'password' . $get->id ]) !!}
							<div class="invalid-feedback" id="passwordError"></div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-3 col-form-label text-right">Telefon Numarası:</label>
						<div class="col-lg-9">
							{!! html()->text(true, $get->phone)->attributes([ 'class' => 'form-control', 'autocomplete' => 'off', 'tabindex' => 1, 'id' => 'phone' . $get->id ]) !!}
							<div class="invalid-feedback" id="phoneError"></div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-3 col-form-label text-right">Kullanıcı Türü:</label>
						<div class="col-lg-9">
							{!! html()->select(true, config('kobiyim.user_types'), $get->type)->attributes([ 'class' => 'form-control', 'autocomplete' => 'off', 'tabindex' => 1, 'id' => 'type' . $get->id ]) !!}
							<div class="invalid-feedback" id="typeError"></div>
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

<script type="text/javascript">
	$("#phone{!! $get->id !!}").inputmask("0 (999) 999 9999");
</script>