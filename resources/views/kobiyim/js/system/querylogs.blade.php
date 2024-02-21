{{--
 /**
 * Kobiyim
 * 
 * @package kobiyim/kobiyim
 * @since v1.0.20
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
			url: '{{ route('querylog.json') }}'
		},
		columns: [
			{data: 'id', name: 'id'},
			{data: 'type', name: 'type'},
			{data: 'causer_id', name: 'causer_id'},
			{data: 'subject_type', name: 'subject_type'},
			{data: 'subject_id', name: 'subject_id'},
			{data: 'islemler', name: 'islemler'},
		],
		language: {
			"url": "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Turkish.json"
		}
	});

</script>