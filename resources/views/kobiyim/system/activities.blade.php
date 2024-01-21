{{--
 /**
 * Kobiyim
 * 
 * @package kobiyim/kobiyim
 * @since v1.0.0
 */
--}}
@extends('theme.default')

@section('content')
	<div class="card card-custom">
		<div class="card-header align-items-center border-0">
			<div class="card-title">
				<span class="card-icon">
					<i class="la la-industry"></i>
				</span>
				<h3 class="card-label">Kullanıcılar</h3>
			</div>
		</div>
		<div class="card-body pt-4 table-responsive">
			<table class="table table-bordered table-hover" id="datatable">
				<thead>
					<tr>
						<th>Kullanıcı Adı</th>
						<th>Telefon</th>
						<th width="10%"></th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
@endsection

@section('datatable', true)

@section('title', 'Kullanıcılar')

@section('scripts')
	<script type="text/javascript">
		"use strict";

		var table = $('#datatable');

		// begin first table
		table.DataTable({
			fixedHeader: true,
			processing: true,
			serverSide: true,
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
@endsection
