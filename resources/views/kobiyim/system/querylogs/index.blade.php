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
				<h3 class="card-label">Sistem Sorgu Hareketleri</h3>
			</div>
		</div>
		<div class="card-body pt-4 table-responsive">
			<table class="table table-bordered table-hover" id="datatable">
				<thead>
					<tr>
						<th>#</th>
						<th>İşlem Türü</th>
						<th>İşlemi Yapan</th>
						<th>Tablo</th>
						<th>Tablo ID</th>
						<th width="5%">İşlemler</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
@endsection

@section('datatable', true)

@section('admin', true)

@section('title', 'Sistem Sorgu Hareketleri')

@section('scripts')
	@include('kobiyim.js.system.querylogs')
@endsection
