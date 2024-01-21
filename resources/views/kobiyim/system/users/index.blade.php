{{--
 /**
 * Kobiyim
 * 
 * @package kobiyim/kobiyim
 * @since v1.0.0
 */
--}}
@extends('kobiyim.theme.default')

@section('content')
	<div class="card card-custom">
		<div class="card-header align-items-center border-0">
			<div class="card-title">
				<span class="card-icon">
					<i class="la la-industry"></i>
				</span>
				<h3 class="card-label">Kullanıcılar</h3>
			</div>
			<div class="card-toolbar">
				<a class="btn btn-sm btn-primary mr-2" onclick="loadModal({ 'key': 'createUser' }, true)">
					Yeni
				</a>
			</div>
		</div>
		<div class="card-body pt-4 table-responsive">
			<table class="table table-bordered table-hover" id="datatable">
				<thead>
					<tr>
						<th>Kullanıcı Adı</th>
						<th>Telefon</th>
						<th>Email</th>
						<th class="text-center" width="10%">İşlemler</th>
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
	@include('js.system.users.index')
@endsection
