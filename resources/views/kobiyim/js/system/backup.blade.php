{{--
 /**
 * Kobiyim
 * 
 * @version v4.0.0
 */
--}}

<script type="text/javascript">
	"use strict";

	var table = $('#datatable');

	// begin first b
	table.DataTable({
		fixedHeader: true,
		processing: true,
		serverSide: true,
		ordering: false,
		ajax: {
			url: '{{ route('system.backup.json') }}'
		},
		columns: [
			{data: 'filename', name: 'filename'},
			{data: 'dir', name: 'dir'},
			{data: 'type', name: 'type'},
			{data: 'is_loaded', name: 'is_loaded'},
			{data: 'size', name: 'size'},
			{data: 'created_at', name: 'created_at'}
		],
		language: {
			"url": "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Turkish.json"
		},
		columnDefs: [
			{ targets: [ -1 ], orderable: false}
		]
	});

</script>