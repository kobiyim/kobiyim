{{--
 /**
 * Kobiyim
 * 
 * @version v2.0.0
 */
--}}
@extends('kobiyim.theme.default')

@section('content')
<div class="row">
	<div class="col-lg-3">
		<div class="card card-custom gutter-b">
			<div class="card-header">
				<div class="card-title">
					<h3 class="card-label">Versiyon Detayları</h3>
				</div>
			</div>
			<div class="card-body">
				<table class="table">
				    <tbody>
				    	<tr>
				    		<th scope="row" colspan="2">Kobiyim Erişim</th>
				            <td class="text-center">
				                <span class="label label-inline label-light-success font-weight-bold">
				                    Başarılı
				                </span>
				            </td>
				        <tr>
				            <th scope="row">Kobiyim</th>
				            <td class="text-center">{!! app()->version() !!}</td>
				            <td class="text-center">
				                <span class="label label-inline label-light-success font-weight-bold">
				                    Güncel
				                </span>
				            </td>
				        </tr>
				        <tr>
				            <th scope="row">Laravel</th>
				            <td class="text-center">{!! vLaravel() !!}</td>
				            <td class="text-center">
				                <span class="label label-inline label-light-success font-weight-bold">
				                    Güncel
				                </span>
				            </td>
				        </tr>
				        <tr>
				            <th scope="row">PHP</th>
				            <td class="text-center">{{ phpversion() }}</td>
				            <td class="text-center">
				                <span class="label label-inline label-light-danger font-weight-bold">
				                    Bekleniyor
				                </span>
				            </td>
				        </tr>
				    </tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col-lg-9">
		<div class="card card-custom gutter-b">
		    <div class="card-header card-header-tabs-line">
		        <div class="card-title">
		            <h3 class="card-label">Kobiyim Sistem Durumu</h3>
		        </div>
		        <div class="card-toolbar">
		            <ul class="nav nav-tabs nav-bold nav-tabs-line">
		                <li class="nav-item">
		                    <a class="nav-link active" data-toggle="tab" href="#system">{{ env('KOBIYIM_NAME') }}</a>
		                </li>
		                <li class="nav-item">
		                    <a class="nav-link" data-toggle="tab" href="#kobiyim">Kobiyim Güncellemeleri</a>
		                </li>
		                <li class="nav-item">
		                    <a class="nav-link" data-toggle="tab" href="#usage">Kullanımlar</a>
		                </li>
		            </ul>
		        </div>
		    </div>
		    <div class="card-body">
		        <div class="tab-content">
		            <div class="tab-pane fade show active" id="system" role="tabpanel" aria-labelledby="kt_tab_pane_2">
						<div class="timeline timeline-2">
						    <div class="timeline-bar"></div>
						    <div class="timeline-item">
						        <div class="timeline-badge"></div>
						        <div class="timeline-content d-flex align-items-center justify-content-between">
						            <span class="mr-3">
						                <a href="#">12 new users registered and pending for activation</a> <span class="label label-light-success font-weight-bolder">8</span>
						            </span>
						            <span class="text-muted text-right">3 hrs ago</span>
						        </div>
						    </div>
						    <div class="timeline-item">
						        <span class="timeline-badge bg-success"></span>
						        <div class="timeline-content d-flex align-items-center justify-content-between">
						            <span class="mr-3">
						                Scheduled system reboot completed.
						                <span class="label label-inline label-light-primary font-weight-bolder">new</span>
						                <span class="label label-inline label-light-danger font-weight-bolder">hot</span>
						            </span>
						            <span class="text-muted font-italic text-right">6 hrs ago</span>
						        </div>
						    </div>
						    <div class="timeline-item">
						        <span class="timeline-badge"></span>
						        <div class="timeline-content d-flex align-items-center justify-content-between">
						            <span class="mr-3">
						                New order has been placed and pending for processing.
						            </span>
						            <span class="text-muted text-right">2 days ago</span>
						        </div>
						    </div>
						    <div class="timeline-item">
						        <span class="timeline-badge bg-danger"></span>
						        <div class="timeline-content d-flex align-items-center justify-content-between">
						            <span class="mr-3">
						                Database server overloaded 80% and requires quick reboot <span class="label label-inline label-danger font-weight-bolder">pending</span>
						            </span>
						            <span class="text-muted text-right">3 days ago</span>
						        </div>
						    </div>
						    <div class="timeline-item">
						        <span class="timeline-badge bg-warning"></span>
						        <div class="timeline-content d-flex align-items-center justify-content-between">
						            <span class="mr-3">
						                System error occured and hard drive has been shutdown.
						            </span>
						            <span class="text-muted font-italic text-right">5 days ago</span>
						        </div>
						    </div>
						    <div class="timeline-item">
						        <span class="timeline-badge bg-success"></span>
						        <div class="timeline-content d-flex align-items-center justify-content-between">
						            <span class="mr-3">
						                Production server is rebooting.
						            </span>
						            <span class="text-muted text-right">1 month ago</span>
						        </div>
						    </div>
						</div>
		            </div>
		            <div class="tab-pane fade" id="kobiyim" role="tabpanel" aria-labelledby="kt_tab_pane_2">
						<div class="timeline timeline-2">
						    <div class="timeline-bar"></div>
						    @foreach( json_decode(json_decode(kobiyimUpdates(), true)['updates'], true) as $e )
							    <div class="timeline-item">
							        <span class="timeline-badge bg-success"></span>
							        <div class="timeline-content d-flex align-items-center justify-content-between">
							            <span class="mr-3">
							                {{ $e['message'] }}
							            </span>
							            <span class="text-muted text-right">{{ floor(now()->parse($e['created_at'])->diffInDays(now())) }} gün önce</span>
							        </div>
							    </div>
							@endforeach
						</div>

		            </div>
		            <div class="tab-pane fade" id="usage" role="tabpanel" aria-labelledby="kt_tab_pane_3">
								<div class="row">
									<div class="col-xl-4">
										<!--begin: Stats Widget 19-->
										<div class="card card-custom bg-light-success card-stretch gutter-b">
											<!--begin::Body-->
											<div class="card-body my-3">
												<a href="#" class="card-title font-weight-bolder text-success text-hover-state-dark font-size-h6 mb-4 d-block">Kullanıcı Sayısı</a>
												<div class="font-weight-bold text-muted font-size-sm">
												<span class="text-dark-75 font-size-h2 font-weight-bolder mr-2">{{ $kullaniciSayisi }}</span>Toplam</div>
											</div>
											<!--end:: Body-->
										</div>
										<!--end: Stats:Widget 19-->
									</div>
									<div class="col-xl-4">
										<!--begin: Stats Widget 19-->
										<div class="card card-custom bg-light-success card-stretch gutter-b">
											<!--begin::Body-->
											<div class="card-body my-3">
												<a href="#" class="card-title font-weight-bolder text-success text-hover-state-dark font-size-h6 mb-4 d-block">İşlem Sayısı</a>
												<div class="font-weight-bold text-muted font-size-sm">
												<span class="text-dark-75 font-size-h2 font-weight-bolder mr-2">{{ $islemSayisi }}</span>Toplam</div>
											</div>
											<!--end:: Body-->
										</div>
										<!--end: Stats:Widget 19-->
									</div>
									<div class="col-xl-4">
										<!--begin: Stats Widget 19-->
										<div class="card card-custom bg-light-success card-stretch gutter-b">
											<!--begin::Body-->
											<div class="card-body my-3">
												<a href="#" class="card-title font-weight-bolder text-success text-hover-state-dark font-size-h6 mb-4 d-block">Yedekleme Boyutu</a>
												<div class="font-weight-bold text-muted font-size-sm">
												<span class="text-dark-75 font-size-h2 font-weight-bolder mr-2">{{ $yedeklemeBoyutu }}</span>Toplam MB</div>
											</div>
											<!--end:: Body-->
										</div>
										<!--end: Stats:Widget 19-->
									</div>
								</div>
		            </div>
		        </div>
		    </div>
		</div>

	</div>
</div>

@endsection

@section('title', 'Sunucudan Erişin')