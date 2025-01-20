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
						<h3 class="card-title">Yedeklemeler</h3>
					</div>
					<div class="card-body">
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
			</div>
		</div>
	</div>
@endsection

@section('datatable', true)

@section('title', 'Yedeklemeler')

@section('scripts')
	@include('kobiyim.js.system.backup')
@endsection
