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
				<h3 class="card-label">Yedeklemeler</h3>
			</div>
		</div>
		<div class="card-body pt-4 table-responsive">
			<table class="table table-bordered table-hover" id="datatable">
				<thead>
					<tr>
						<th>Dosya Adı</th>
						<th>Dizin</th>
						<th>Uzantısı</th>
						<th>Yüklenme Durumu</th>
						<th>Dosya Boyutu</th>
						<th>Oluşturulma</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
@endsection

@section('datatable', true)

@section('title', 'Yedeklemeler')

@section('scripts')
	@include('kobiyim.js.system.backup')
@endsection
