{{--
 /**
 * Kobiyim
 * 
 * @version v3.0.0
 */
--}}

@extends('kobiyim.theme.default')

@section('content')
	<div class="card card-custom">
		<div class="card-header align-items-center border-0">
			<div class="card-title">
				<h3 class="card-label">İzinler</h3>
			</div>
			<div class="card-toolbar">
				<a class="btn btn-sm btn-primary mr-2" onclick="loadModal({ 'key': 'createPermission' }, true)">
					Yeni
				</a>
			</div>
		</div>
		<div class="card-body pt-4 table-responsive">
			<table class="table table-bordered table-hover" id="datatable">
				<thead>
					<tr>
						<th>İzin</th>
						<th>Anahtarı</th>
						<th class="text-center" width="10%">İşlemler</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
@endsection

@section('datatable', true)

@section('admin', true)

@section('title', 'İzinler')

@section('scripts')
	@include('kobiyim.js.system.permissions.index')
@endsection
