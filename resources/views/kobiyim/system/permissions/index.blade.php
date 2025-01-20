{{--
 /**
 * Kobiyim
 * 
 * @version v4.0.0
 */
--}}

@extends('kobiyim.theme.default')

@section('content')
	<div class="page-wrapper">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">İzinler</h3>
						<div class="card-actions">
							<a class="btn btn-primary" onclick="loadModal({ 'key': 'createPermission' }, true)">
								Yeni
							</a>
						</div>
					</div>
					<div class="card-body">
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
			</div>
		</div>
	</div>
@endsection

@section('datatable', true)

@section('admin', true)

@section('title', 'İzinler')

@section('scripts')
	@include('kobiyim.js.system.permissions.index')
@endsection
