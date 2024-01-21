{{--
 /**
 * Kobiyim
 * 
 * @package kobiyim/kobiyim
 * @since v1.0.0
 */
--}}
@extends('kobiyim.theme.main')

@section('content')
<div class="d-flex align-items-start flex-column flex-md-row">
	<!-- Left content -->
	<div class="w-100 overflow-auto order-2 order-md-1">
		<!-- Task overview -->
				<!-- Basic datatable -->
			<div class="card">
				<div class="card-body">
					<table class="table datatable-header-basic">
						<thead>
							<tr>
								<th>Telefon Numarası</th>
								<th>Adı</th>
								<th class="text-center" width="10%">İşlemler</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>

			</div>
	</div>
		<!-- /task overview -->
	<!-- /left content -->
	<!-- Right sidebar component -->
	<div class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-right wmin-350 border-0 shadow-0 order-1 order-md-2 sidebar-expand-md">
		<!-- Sidebar content -->
		<div class="sidebar-content">
			<!-- Latest comments -->
			<div class="card">
				<div class="card-header bg-transparent header-elements-inline">
					<span class="card-title font-weight-semibold">İşlemler</span>
					<div class="header-elements">
						<div class="list-icons">
							<a class="list-icons-item" data-action="collapse"></a>
						</div>
					</div>
				</div>
				@include('.system.menu')
			</div>
			<!-- /latest comments -->
			<!-- Task details -->
			<div class="card">
				<div class="card-header bg-transparent header-elements-inline">
					<span class="card-title font-weight-semibold">Bugün Web Üzerindeki İşlemler</span>
					<div class="header-elements">
						<div class="list-icons">
							<a class="list-icons-item" data-action="collapse"></a>
						</div>
					</div>
				</div>
				<table class="table table-borderless table-xs my-2">
					<tbody>
						<tr>
							<td><i class="icon-briefcase mr-2"></i> Kullanıcı Giriş Sayısı:</td>
							<td class="text-right"><a href="#">Singular app</a></td>
						</tr>
						<tr>
							<td><i class="icon-circles2 mr-2"></i> Eklenen Toplam Emir:</td>
							<td class="text-right">
								<div class="btn-group">
									<a href="#" class="badge bg-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Blocker</a>
									<div class="dropdown-menu dropdown-menu-right" x-placement="top-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(59px, -2px, 0px);">
										<a href="#" class="dropdown-item active"><span class="badge badge-mark mr-2 bg-danger border-danger"></span> Blocker</a>
										<a href="#" class="dropdown-item"><span class="badge badge-mark mr-2 bg-orange border-orange"></span> High priority</a>
										<a href="#" class="dropdown-item"><span class="badge badge-mark mr-2 bg-success border-success"></span> Normal priority</a>
										<a href="#" class="dropdown-item"><span class="badge badge-mark mr-2 bg-grey-300 border-grey-300"></span> Low priority</a>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td><i class="icon-history mr-2"></i> Toplam Düzenleme:</td>
							<td class="text-right">29</td>
						</tr>
						<tr>
							<td><i class="icon-file-check mr-2"></i> Toplam Tamamlanan Emir:</td>
							<td class="text-right">Published</td>
						</tr>
						<tr>
							<td><i class="icon-file-plus mr-2"></i> En Çok Ekleme:</td>
							<td class="text-right"><a href="#">Winnie</a></td>
						</tr>
						<tr>
							<td><i class="icon-alarm-add mr-2"></i> En Çok Güncelleme:</td>
							<td class="text-right text-muted">12 May, 2015</td>
						</tr>
						<tr>
							<td><i class="icon-alarm-check mr-2"></i> Kullanılan API Erişimi:</td>
							<td class="text-right text-muted">25 Feb, 2015</td>
						</tr>
					</tbody>
				</table>
			</div>
			<!-- /task details -->
		</div>
		<!-- /sidebar content -->
	</div>
	<!-- /right sidebar component -->
</div>
@endsection

@section('first', 'muhasebe')

@section('second', 'companies')

@section('datatable', true)

@section('toolbar')
	<a href="{{ route('system.user.create') }}" class="btn btn-link btn-float text-default">
		<i class="text-primary icon-plus3"></i>
		<span>Yeni</span>
	</a>
@endsection
@section('title', 'Kullanıcılar')
@section('js')
	@include('kobiyim.js.main')
	<script type="text/javascript">


		// Setting datatable defaults
		$.extend( $.fn.dataTable.defaults, {
			autoWidth: false,
			columnDefs: [{ 
				width: 100,
			}],
			dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
			language: {
				search: '<span>Filter:</span> _INPUT_',
				searchPlaceholder: 'Type to filter...',
				lengthMenu: '<span>Show:</span> _MENU_',
				paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
			}
		});


		// Basic initialization
		var table_basic = $('.datatable-header-basic').DataTable({
			processing: true,
			serverSide: true,
			ajax: {
				url: '{{ route('system.logs.json') }}'
			},
			columns: [
				{data: 'username', name: 'username'},
				{data: 'name', name: 'name'},
				{data: 'islemler', name: 'islemler', sortable: false, className: 'text-center'}
			]
		});

	</script>
@endsection