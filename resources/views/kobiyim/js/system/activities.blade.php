{{--
 /**
 * Kobiyim
 * 
 * @package kobiyim/kobiyim
 * @since v1.0.19
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
		ordering: false,
		ajax: {
			url: '{{ route('activity.json') }}'
		},
		columns: [
			{data: 'description', name: 'description'},
			{data: 'causer_id', name: 'causer_id'},
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