{{--
 /**
 * Kobiyim
 * 
 * @version v2.0.0
 */
--}}
<script type="text/javascript">
	"use strict";

	var table = $('#datatable');

	// begin first table
	table.DataTable({
		fixedHeader: true,
		processing: true,
		serverSide: true,
		ajax: {
			url: '{{ route('user.json') }}'
		},
		columns: [
			{data: 'name', name: 'name'},
			{data: 'phone', name: 'phone'},
			{data: 'type', name: 'type'},
			{data: 'islemler', name: 'islemler', sortable: false, className: 'text-center'}
		],
		language: {
			"url": "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Turkish.json"
		},
		columnDefs: [
			{ targets: [ -1 ], orderable: false}
		]
	});

	function delete_(id, hide) {
		swal.fire({
			title: "Onaylama",
			text: "Kullanıcının aktiflik durumunu değiştirmek istediğinize emin misiniz?",
			type: "warning",
			showCancelButton: !0,
			confirmButtonText: "Değiştir!",
			cancelButtonText: "İptal!",
			reverseButtons: 0
		}).then(function(e) {
			if(e.value == true) {
				rsp = deleteData('{{ route('user.index') }}/' + id, {});

				if(rsp.status == 'success') {
					showSuccessMessage(rsp.message);

					$("#datatable").DataTable().draw( false );
				}
			}
		});
	}

	function store()
	{
		rsp = postData("{!! route('user.store') !!}", {
			name : $("#name").val(),
			phone : $("#phone").val(),
			password : $("#password").val(),
			type	: $("#type").val()
		});

		$("#name").removeClass('is-invalid');
		$("#phone").removeClass('is-invalid');
		$("#password").removeClass('is-invalid');
		$("#type").removeClass('is-invalid');

		if(rsp.status == 'error') {
			var i;
			for (i = 0; i < rsp["messages"].length; i++) {
				 $("#" + rsp["messages"][i].key).addClass('is-invalid');
				 $("#" + rsp["messages"][i].key + "Error").html(rsp["messages"][i].message);
			}
		}

		if(rsp.status == 'success') {
			showSuccessMessage(rsp.message);

			$("#createUser").modal('hide');

			$("#datatable").DataTable().draw( false );
		}
	}

	function update(id)
	{
		rsp = putData("{!! route('user.index') !!}/" + id, {
			name : $("#name" + id).val(),
			phone : $("#phone" + id).val(),
			password : $("#password" + id).val(),
			type	: $("#type" + id).val()
		});

		$("#name").removeClass('is-invalid');
		$("#phone").removeClass('is-invalid');
		$("#password").removeClass('is-invalid');
		$("#type").removeClass('is-invalid');

		if(rsp.status == 'error') {
			var i;
			for (i = 0; i < rsp["messages"].length; i++) {
				 $("#" + rsp["messages"][i].key + id).addClass('is-invalid');
				 $("#" + rsp["messages"][i].key + "Error").html(rsp["messages"][i].message);
			}
		}

		if(rsp.status == 'success') {
			showSuccessMessage(rsp.message);

			$("#editUser").modal('hide');

			$("#datatable").DataTable().draw( false );

		}
	}


</script>