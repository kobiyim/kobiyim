{{--
 /**
 * Kobiyim
 * 
 * @version v3.0.0
 */
--}}

@extends('kobiyim.theme.default')

@section('content')
	<div class="row">
		<div class="col-xl-12">
			<div class="card card-custom gutter-b">
				<div class="card-header">
					<h3 class="card-title">{{ $get->name }} için İzinler</h3>
				</div>
				{{ html()->form()->open([ 'route' => [ 'user.permission', $get->id ], 'class' => 'form' ]) }}
					<div class="card-body">
						<div class="form-group">
							<div class="checkbox-list">
							@foreach($all as $e)
								<label class="checkbox">
								{{ html()->checkbox('perm' . $e->id)->checked((array_key_exists($e->id, $user)) ? true : false)  }}
								<span></span>{{ $e->name }}</label>
							@endforeach
							</div>
						</div>
					</div>
					<div class="card-footer">
						{{ html()->submit('Kaydet')->attributes([ 'class' => 'btn btn-primary']) }}
					</div>
				{{ html()->form()->close() }}
			</div>
		</div>
	</div>
@endsection

@section('title', $get->name . ' için İzinler')

@section('admin', true)