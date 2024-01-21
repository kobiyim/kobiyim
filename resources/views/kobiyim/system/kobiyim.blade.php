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
			<!--begin::Hero-->
<div class="card card-custom overflow-hidden position-relative mb-8">
	<!--begin::SVG-->


	<!--end::SVG-->

	<!--begin::Hero Body-->
	<div class="card-body d-flex justify-content-center flex-column ">
		<!--begin::Heading-->
		<h2 class="text-dark font-weight-bolder">
			Kobiyim
		</h2>
		<!--end::Heading-->

		<!--begin::Form-->
		
		<!--end::Form-->
	</div>
	<!--end::Hero Body-->
</div>
<!--end::Hero-->

<!--begin::Section-->
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
				            <th scope="row">Kobiyim</th>
				            <td class="text-center">{{ vkobiyim() }}</td>
				            <td class="text-center">
				                <span class="label label-inline label-light-success font-weight-bold">
				                    Güncel
				                </span>
				            </td>
				        </tr>
				        <tr>
				            <th scope="row">Laravel</th>
				            <td class="text-center">{{ app()->version() }}</td>
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

</div>
<!--end::Section-->

@endsection

@section('title', 'Sunucudan Erişin')