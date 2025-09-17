{{--
 /**
 * Kobiyim
 * 
 * @version v3.0.0
 */
--}}

<script type="text/javascript">
	var webUri = "{{ url('') }}/";
	var tokenn = "{{ csrf_token() }}";
	var postResult;
	var rsp;

	function postData(uri, data = {}, token = true, success = null) {
		if (token) data._token = tokenn;
		var postApiResult = '';
		$.ajax({
			type: 'POST',
			url: uri.includes(webUri) ? uri : (webUri + uri),
			data: data,
			dataType: "json",
			async: false,
			success: function (rsp, textStatus, xhr) {
				postApiResult = rsp;
				if(typeof success == 'function') success();
			},
			error: function (rsp, textStatus) {
				if (rsp.status == 419) {
					swal.fire({
						"title": "Oturum Süresi Doldu",
						"text": "Bi süre hareketsiz kaldınız. Sisteme giriş sayfasına yönlendiriliyorsunuz.",
    					"showConfirmButton": false
					});

				    window.setTimeout(function(){

				        window.location.href = "{{ route('dashboard') }}";

				    }, 3000);
				}
			}
		});
		return postApiResult;
	}

	function putData(uri, data = {}, token = true, success = null) {
		if (token) data._token = tokenn;
		data.method = 'PUT';
		var postApiResult = '';
		$.ajax({
			type: 'PUT',
			url: uri.includes(webUri) ? uri : (webUri + uri),
			data: data,
			dataType: "json",
			async: false,
			success: function (rsp) {
				postApiResult = rsp;
				if(typeof success == 'function') success();
			},
			error: function () {
				swal.fire({
					"title": "HATA.",
					"text": "İstekte hata oluştu. En kısa sürede bu durum gidirilecek size bilgi verilecektir.",
					"type": "error",
					"confirmButtonClass": "btn btn-secondary"
				});
			}
		});
		return postApiResult;
	}

	function getData(uri) {
		return $.ajax({
			type: 'GET',
			url: uri.includes(webUri) ? uri : (webUri + uri),
			async:false
		}).responseText;
	}

	function loadModal(dataa = {}, open = null) {
		if(open == true) {
			if ($("#" + dataa.key).length == 1) {
				$("#" + dataa.key).replaceWith(postData('{{ route('kobiyim.modals') }}', dataa, true).data);
			} else {
				$("#modals").append(postData('{{ route('kobiyim.modals') }}', dataa, true).data);
			}
			openModal(dataa.key);
		} else if(open != null) {
			if ($("#" + open).length == 1) {
				$("#" + open).replaceWith(postData('{{ route('kobiyim.modals') }}', dataa, true).data);
			} else {
				$("#modals").append(postData('{{ route('kobiyim.modals') }}', dataa, true).data);
			}
			openModal(open);
		}
	}

	function openModal(modalId) {
		(function($){
			$("#" + modalId).modal('show');
		})(jQuery);
	}

	function deleteData(uri, data = {}, token = true, success = null) {
		if (token) data._token = tokenn;
		var postApiResult = '';
		$.ajax({
			type: 'DELETE',
			url: uri.includes(webUri) ? uri : (webUri + uri),
			data: data,
			dataType: "json",
			async: false,
			success: function (rsp) {
				postApiResult = rsp;
				if(typeof success == 'function') success();
			},
			error: function () {
				swal.fire({
					"title": "HATA.",
					"text": "İstekte hata oluştu. En kısa sürede bu durum gidirilecek size bilgi verilecektir.",
					"type": "error",
					"confirmButtonClass": "btn btn-secondary"
				});
			}
		});
		return postApiResult;
	}

	function swalSuccess(message, time = 2000) {
		swal.fire({
			position: "top-right",
			type: 'success',
			title: message,
			showConfirmButton: !1,
			timer: time
		});
	}

	function swalError(message, time = 2000) {
		swal.fire({
			position: "top-right",
			type: 'error',
			title: message,
			showConfirmButton: !1,
			timer: time
		});
	}

	function showSuccessMessage(message)
	{
		toastr.options = {
		  "closeButton": false,
		  "debug": false,
		  "newestOnTop": false,
		  "progressBar": false,
		  "positionClass": "toast-top-right",
		  "preventDuplicates": false,
		  "onclick": null,
		  "showDuration": "300",
		  "hideDuration": "1000",
		  "timeOut": "5000",
		  "extendedTimeOut": "1000",
		  "showEasing": "linear",
		  "hideEasing": "linear",
		  "showMethod": "fadeIn",
		  "hideMethod": "fadeOut"
		};

		toastr.success(message);
	}

	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	});
</script>