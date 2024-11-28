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
			url: '{{ route('permission.json') }}'
		},
		columns: [
			{data: 'name', name: 'name'},
			{data: 'key', name: 'key'},
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
			text: "İzni silmek istediğinize emin misiniz? Bu durum izin kullanımında sıkıntılara yol açabilir.",
			type: "warning",
			showCancelButton: !0,
			confirmButtonText: "Sil!",
			cancelButtonText: "İptal!",
			reverseButtons: 0
		}).then(function(e) {
			if(e.value == true) {
				rsp = deleteData('{{ route('permission.index') }}/' + id, {});

				if(rsp.status == 'success') {
					showSuccessMessage(rsp.message);

					$("#datatable").DataTable().draw( false );
				}
			}
		});
	}

	function store()
	{
		rsp = postData("{!! route('permission.store') !!}", {
			name : $("#name").val(),
			key : $("#key").val()
		});

		$("#name").removeClass('is-invalid');
		$("#key").removeClass('is-invalid');

		if(rsp.status == 'error') {
			var i;
			for (i = 0; i < rsp["messages"].length; i++) {
				 $("#" + rsp["messages"][i].key).addClass('is-invalid');
				 $("#" + rsp["messages"][i].key + "Error").html(rsp["messages"][i].message);
			}
		}

		if(rsp.status == 'success') {
			showSuccessMessage(rsp.message);

			$("#createPermission").modal('hide');

			$("#datatable").DataTable().draw( false );
		}
	}

	function update(id)
	{
		rsp = putData("{!! route('permission.index') !!}/" + id, {
			name : $("#name" + id).val(),
			key : $("#key" + id).val()
		});

		if(rsp.status == 'error') {
			var i;
			for (i = 0; i < rsp["messages"].length; i++) {
				 $("#" + rsp["messages"][i].key + id).addClass('is-invalid');
				 $("#" + rsp["messages"][i].key + "Error").html(rsp["messages"][i].message);
			}
		}

		if(rsp.status == 'success') {
			showSuccessMessage(rsp.message);

			$("#editPermission").modal('hide');

			$("#datatable").DataTable().draw( false );

		}
	}

</script>