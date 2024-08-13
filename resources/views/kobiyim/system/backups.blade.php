{{--
 /**
 * Kobiyim
 * 
 * @version v2.0.0
 */
--}}
@extends('kobiyim.theme.default')

@section('content')
	<div class="card card-custom">
		<div class="card-header align-items-center border-0">
			<div class="card-title">
				<h3 class="card-label">Sistem Hareketleri</h3>
			</div>
		</div>
		<div class="card-body pt-4 table-responsive">
			<table class="table table-bordered table-hover" id="datatable">
				<thead>
					<tr>
						<th>İşlem</th>
						<th>Yapan Kullanıcı</th>
						<th width="10%">Tarih</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
@endsection

@section('datatable', true)

@section('title', 'Sistem Hareketleri')

@section('scripts')
	@include('kobiyim.js.system.activities')
@endsection
