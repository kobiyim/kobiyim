{{--
 /**
 * Kobiyim
 * 
 * @version v4.0.0
 */
--}}

<footer class="footer footer-transparent d-print-none">
	<div class="container-xl">
		<div class="row text-center align-items-center flex-row-reverse">
			<div class="col-lg-auto ms-lg-auto">
				<ul class="list-inline list-inline-dots mb-0">
					<li class="list-inline-item"><a href="{{ route('kobiyim') }}" class="link-secondary">Kobiyim</a></li>
				</ul>
			</div>
			<div class="col-12 col-lg-auto mt-3 mt-lg-0">
				<ul class="list-inline list-inline-dots mb-0">
					<li class="list-inline-item">
						{{ date("Y") }} &copy;</span> {{ config('kobiyim.name') }}
					</li>
				</ul>
			</div>
		</div>
	</div>
</footer>