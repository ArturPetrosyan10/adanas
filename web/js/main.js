$.noConflict();

function addChild(id) {
	jQuery('.standardSelect').val(id).trigger("chosen:updated");
	jQuery('#addnew').modal('show');
}

function editeCategory(id) {
	if (id) {
		jQuery.ajax({
			url: "/admin/category-edite?id=" + id,
			success: function(result) {
				jQuery(".modals").html(result);
			}
		});
	}
}
function editeText(id) {
	if (id) {
		jQuery.ajax({
			url: "/admin/text-edite?id=" + id,
			success: function(result) {
				jQuery(".modals").html(result);
			}
		});
	}
}
function editeBrand(id) {
	if (id) {
		jQuery.ajax({
			url: "/admin/brand-edite?id=" + id,
			success: function(result) {
				jQuery(".modals").html(result);
			}
		});
	}
}
function editeManager(id) {
	if (id) {
		jQuery.ajax({
			url: "/manager/manager-edite?id=" + id,
			success: function(result) {
				jQuery(".modals").html(result);
			}
		});
	}
}

function disableManager(id) {
	if (id) {
		jQuery.ajax({
			url: "/manager/manager-disable?id=" + id,
			success: function(result) {
				window.location.reload();
			}
		});
	}
}
function disableCategory(id) {
	if (id) {
		jQuery.ajax({
			url: "/admin/category-disable?id=" + id,
			success: function(result) {
				window.location.reload();
			}
		});
	}
}
function disableBrand(id) {
	if (id) {
		jQuery.ajax({
			url: "/admin/brand-disable?id=" + id,
			success: function(result) {
				window.location.reload();
			}
		});
	}
}
function changeOrderStat(id,state) {
	if (id) {
		jQuery.ajax({
			url: "/admin/order-change?id=" + id+"&state="+state,
			success: function(result) {

			}
		});
	}
}

function disableStore(id) {
	if (id) {
		jQuery.ajax({
			url: "/admin/store-disable?id=" + id,
			success: function(result) {
				window.location.reload();
			}
		});
	}
}
function disablePartner(id) {
	if (id) {
		jQuery.ajax({
			url: "/admin/partner-disable?id=" + id,
			success: function(result) {
				window.location.reload();
			}
		});
	}
}

function disablePage(id) {
	if (id) {
		jQuery.ajax({
			url: "/admin/page-disable?id=" + id,
			success: function(result) {
				window.location.reload();
			}
		});
	}
}
function disableBlog(id) {
	if (id) {
		jQuery.ajax({
			url: "/admin/blog-disable?id=" + id,
			success: function(result) {
				window.location.reload();
			}
		});
	}
}
function copyCategory(id) {
	if (id) {
		jQuery.ajax({
			url: "/admin/category-copy?id=" + id,
			success: function(result) {
				jQuery(".modals").html(result);
			}
		});
	}
}
function copyBrand(id) {
	if (id) {
		jQuery.ajax({
			url: "/admin/brand-copy?id=" + id,
			success: function(result) {
				jQuery(".modals").html(result);
			}
		});
	}
}
function copyPartner(id) {
	if (id) {
		jQuery.ajax({
			url: "/admin/partner-copy?id=" + id,
			success: function(result) {
				jQuery(".modals").html(result);
			}
		});
	}
}

function copyPage(id) {
	if (id) {
		jQuery.ajax({
			url: "/admin/page-copy?id=" + id,
			success: function(result) {
				jQuery(".modals").html(result);
			}
		});
	}
}
function copyBlog(id) {
	if (id) {
		jQuery.ajax({
			url: "/admin/blog-copy?id=" + id,
			success: function(result) {
				jQuery(".modals").html(result);
			}
		});
	}
}
function editeParams(id) {
	if (id) {
		jQuery.ajax({
			url: "/admin/params-edite?id=" + id,
			success: function(result) {
				jQuery(".modals").html(result);
			}
		});
	}
}
function editePartner(id) {
	if (id) {
		jQuery.ajax({
			url: "/admin/partner-edite?id=" + id,
			success: function(result) {
				jQuery(".modals").html(result);
			}
		});
	}
}

function editeStore(id) {
	if (id) {
		jQuery.ajax({
			url: "/admin/store-edite?id=" + id,
			success: function(result) {
				jQuery(".modals").html(result);
			}
		});
	}
}

function copyStore(id) {
	if (id) {
		jQuery.ajax({
			url: "/admin/store-copy?id=" + id,
			success: function(result) {
				jQuery(".modals").html(result);
			}
		});
	}
}
function editeUser(id) {
	if (id) {
		jQuery.ajax({
			url: "/admin/user-edite?id=" + id,
			success: function(result) {
				jQuery(".modals").html(result);
			}
		});
	}
}

function copyUser(id) {
	if (id) {
		jQuery.ajax({
			url: "/admin/user-copy?id=" + id,
			success: function(result) {
				jQuery(".modals").html(result);
			}
		});
	}
}
function disableUser(id) {
	if (id) {
		jQuery.ajax({
			url: "/admin/user-disable?id=" + id,
			success: function(result) {
				window.location.reload();
			}
		});
	}
}
function editePage(id) {
	if (id) {
		jQuery.ajax({
			url: "/admin/page-edite?id=" + id,
			success: function(result) {
				jQuery(".modals").html(result);
			}
		});
	}
}
function editeBlog(id) {
	if (id) {
		jQuery.ajax({
			url: "/admin/blog-edite?id=" + id,
			success: function(result) {
				jQuery(".modals").html(result);
			}
		});
	}
}
function editeBanner(id) {
	if (id) {
		jQuery.ajax({
			url: "/admin/banner-edite?id=" + id,
			success: function(result) {
				jQuery(".modals").html(result);
			}
		});
	}
}

function disableParams(id) {
	if (id) {
		jQuery.ajax({
			url: "/admin/params-disable?id=" + id,
			success: function(result) {
				window.location.reload();
			}
		});
	}
}

function disableBanner(id) {
	if (id) {
		jQuery.ajax({
			url: "/admin/banner-disable?id=" + id,
			success: function(result) {
				window.location.reload();
			}
		});
	}
}

function copyParams(id) {
	if (id) {
		jQuery.ajax({
			url: "/admin/params-copy?id=" + id,
			success: function(result) {
				jQuery(".modals").html(result);
			}
		});
	}
}

function copyBanner(id) {
	if (id) {
		jQuery.ajax({
			url: "/admin/banner-copy?id=" + id,
			success: function(result) {
				jQuery(".modals").html(result);
			}
		});
	}
}

function editeMeasurement(id) {
	if (id) {
		jQuery.ajax({
			url: "/admin/measurement-edite?id=" + id,
			success: function(result) {
				jQuery(".modals").html(result);
			}
		});
	}
}

function disableMeasurement(id) {
	if (id) {
		jQuery.ajax({
			url: "/admin/measurement-disable?id=" + id,
			success: function(result) {
				window.location.reload();
			}
		});
	}
}

function copyMeasurement(id) {
	if (id) {
		jQuery.ajax({
			url: "/admin/measurement-copy?id=" + id,
			success: function(result) {
				jQuery(".modals").html(result);
			}
		});
	}
}

function editeProduct(id) {
	if (id) {
		jQuery.ajax({
			url: "/admin/product-edite?id=" + id,
			success: function(result) {
				jQuery(".modals").html(result);
			}
		});
	}
}
function editeOrder(id) {
	if (id) {
		jQuery.ajax({
			url: "/admin/order-edite?id=" + id,
			success: function(result) {
				jQuery(".modals").html(result);
			}
		});
	}
}

function disableProduct(id) {
	if (id) {
		jQuery.ajax({
			url: "/admin/product-disable?id=" + id,
			success: function(result) {
				window.location.reload();
			}
		});
	}
}

function copyProduct(id) {
	if (id) {
		jQuery.ajax({
			url: "/admin/product-copy?id=" + id,
			success: function(result) {
				jQuery(".modals").html(result);
			}
		});
	}
}
jQuery(document).ready(function($) {

	"use strict";
	[].slice.call(document.querySelectorAll('select.cs-select')).forEach(function(el) {
		new SelectFx(el);
	});
	jQuery('.selectpicker').selectpicker;

	$('body').on('change', '#category', function() {
		let id = $(this).val();
		var atg__ = $(this).find(':selected').attr('data-atg');
		atg__ = atg__.replace(0,'\\0')
		atg__ = atg__.replace(9,'\\9');
		// atg__ = atg__.replace('\\','\\\\');

		// jQuery('.atg_').mask('+38 (999) 999-99-99');
		// jQuery('.atg_').text(atg__);
		Inputmask(atg__+'999999999').mask(".atg_");
		if (id) {
			jQuery.ajax({
				url: "/admin/get-props?id=" + id,
				success: function(result) {
					jQuery("#showProps").html(result);
				}
			});
		}
	});


	$('body').on('change', '#category_edite', function() {
		let id = $(this).val();
		if (id) {
			jQuery.ajax({
				url: "/admin/get-props?id=" + id,
				success: function(result) {
					jQuery("#showProps__").html(result);
				}
			});
		}
	});
	$('body').on('change', '#type', function(event) {
		if ($(this).val() == 'select') {
			var cl = $('.clone').clone().removeClass('clone').css('display', 'block');
			$('.clone').parent().append(cl);
			var cl_ru = $('.clone_ru').clone().removeClass('clone_ru').css('display', 'block');
			$('.clone_ru').parent().append(cl_ru);
			var cl_en = $('.clone_en').clone().removeClass('clone_en').css('display', 'block');
			$('.clone_en').parent().append(cl_en);
		}
	});
	$('body').on('change', '.count_', function(event) {
		if ($(this).val()) {
			$(this).closest('tr').find('.ck').attr('checked','checked');
		}
	});
	$('body').on('change', '.colorSel', function(event) {
		if ($(this).val()) {
			var price = $(this).find(':selected').attr('data-price')
			$(this).closest('tr').find('.ck').attr('data-price',price);
			$(this).closest('tr').find('.ck').attr('data-variation',$(this).val());
			$(this).closest('tr').find('.pr_').html(price);
		}
	});
	$('body').on('click', '#add', function(event) {
		var id = $('.sortable li.active').attr('data-id');
		addChild(id);
	});
	$('body').on('click', '#prop_procent', function(event) {
		if ($(this).is(':checked')) {
			$('.tax-block').removeClass('hide');
		} else {
			$('.tax-block').addClass('hide');
		}
	});

	$('body').on('click', '.saveitems', function(event) {
		var tempData = [];
		$('.ck').each(function(){
			if ($(this).is(':checked')) {
				var id =$(this).attr('data-id');
				var name =$(this).attr('data-name');
				var price =$(this).attr('data-price');
				var atg =$(this).attr('data-atg');
				var variation =$(this).attr('data-variation');
				var count_ =$(this).closest('tr').find('.count_').val();
				$('.tbodyUpdate').append(`<tr>
                                        <th scope="col">`+id+`</th>
                                        <th scope="col">`+name+`</th>
                                        <th scope="col">
                                        <input type="hidden" name="pid[]" value="`+id+`">
                                        <input type="hidden" name="price[]" value="`+price+`">
                                        <input type="hidden" name="variation[]" value="`+variation+`">
                                        <input type="number" name="count[]"  class="form-control changeCount" value="`+count_+`"></th>
                                        <th scope="col">`+price+` դր․</th>
                                        <th scope="col">`+(price*count_)+` դր․</th>
                                        <th scope="col">`+atg+`</th>
                                        <th scope="col">
                                          <button class="btn btn-sm btn-danger deletProduct" data-id=""><i class="fa fa-trash"></i></button>
                                         </th>
                                    </tr>`);
			}
		});
		$('#addnew').modal('hide');

	});
	$('body').on('click', '#prop_anim', function(event) {
		if ($(this).is(':checked')) {
			$('.anim-block').removeClass('hide');
		} else {
			$('.anim-block').addClass('hide');
		}
	});
	$('body').on('click', '.deletProduct', function(event) {
		$(this).closest('tr').remove();
	});
	$('body').on('click', '#edite', function(event) {
		var id = $('.sortable li.active').attr('data-id');
		editeCategory(id);
	});
	$('body').on('click', '.sendForm', function(event) {
		var formDt = new FormData(document.getElementById("Categories_"));
		jQuery.ajax('/admin/categories', {
			type: 'POST', // http method
			data: formDt, // data to submit
			cache: false,
			contentType: false,
			processData: false,
			complete: function(data) {
				jQuery('.info-bl').html(`<div class="alert alert-success alert-dismissible fade show" style="margin-top:10px;" role="alert">
				  <strong>Հաջողությամբ գրանցված է</strong>
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>`);

				jQuery("#addnew").on("hidden.bs.modal", function() {
					window.location.reload();
				});
			}
		});
	});

	$('body').on('click', '.sendFormMs', function(event) {
		console.log(444);
		var formDt = new FormData(document.getElementById("Measurments_"));
		formDt.append("add", "true");
		jQuery.ajax('/admin/measurement', {
			type: 'POST', // http method
			data: formDt, // data to submit
			cache: false,
			contentType: false,
			processData: false,
			complete: function(data) {
				jQuery('.info-bl').html(`<div class="alert alert-success alert-dismissible fade show" style="margin-top:10px;" role="alert">
				  <strong>Հաջողությամբ գրանցված է</strong>
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>`);

				jQuery("#addnew").on("hidden.bs.modal", function() {
					window.location.reload();
				});
				jQuery("#edite-meas").on("hidden.bs.modal", function() {
					window.location.reload();
				});

			}
		});
	});

	$('body').on('click', '.sendFormMsEdite', function(event) {
		var formDt = new FormData(document.getElementById("Measurments_edite"));
		formDt.append("edite", "true");
		jQuery.ajax('/admin/measurement', {
			type: 'POST', // http method
			data: formDt, // data to submit
			cache: false,
			contentType: false,
			processData: false,
			complete: function(data) {
				jQuery('.info-bl').html(`<div class="alert alert-success alert-dismissible fade show" style="margin-top:10px;" role="alert">
				  <strong>Հաջողությամբ գրանցված է</strong>
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>`);

				jQuery("#addnew").on("hidden.bs.modal", function() {
					window.location.reload();
				});
				jQuery("#edite-meas").on("hidden.bs.modal", function() {
					window.location.reload();
				});

			}
		});
	});
	$('body').on('click', '.sendFormPartner', function(event) {
		var formDt = new FormData(document.getElementById("Partners_"));
		formDt.append("add", "true");
		jQuery.ajax('/admin/partners', {
			type: 'POST', // http method
			data: formDt, // data to submit
			cache: false,
			contentType: false,
			processData: false,
			complete: function(data) {
				jQuery('.info-bl').html(`<div class="alert alert-success alert-dismissible fade show" style="margin-top:10px;" role="alert">
				  <strong>Հաջողությամբ գրանցված է</strong>
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>`);

				jQuery("#addnew").on("hidden.bs.modal", function() {
					window.location.reload();
				});
				jQuery("#editenew").on("hidden.bs.modal", function() {
					window.location.reload();
				});

			}
		});
	});
	$('body').on('click', '.sendFormProduct', function(event) {
		var formDt = new FormData(document.getElementById("Product_"));
		formDt.append("add", "true");
		jQuery.ajax('/admin/products', {
			type: 'POST', // http method
			data: formDt, // data to submit
			cache: false,
			contentType: false,
			processData: false,
			complete: function(data) {
				jQuery('.info-bl').html(`<div class="alert alert-success alert-dismissible fade show" style="margin-top:10px;" role="alert">
				  <strong>Հաջողությամբ գրանցված է</strong>
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>`);

				jQuery("#addnew").on("hidden.bs.modal", function() {
					window.location.reload();
				});
				jQuery("#editenew").on("hidden.bs.modal", function() {
					window.location.reload();
				});

			}
		});
	});
	$('body').on('click', '.sendFormProductEdite', function(event) {
		var formDt = new FormData(document.getElementById("Product_edite"));
		formDt.append("edite", "true");
		jQuery.ajax('/admin/products', {
			type: 'POST', // http method
			data: formDt, // data to submit
			cache: false,
			contentType: false,
			processData: false,
			complete: function(data) {
				jQuery('.info-bl').html(`<div class="alert alert-success alert-dismissible fade show" style="margin-top:10px;" role="alert">
				  <strong>Հաջողությամբ գրանցված է</strong>
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>`);

				jQuery("#addnew").on("hidden.bs.modal", function() {
					window.location.reload();
				});
				jQuery("#edite-product").on("hidden.bs.modal", function() {
					window.location.reload();
				});

			}
		});
	});
	$('body').on('click', '.sendFormCopyEdite', function(event) {
		var formDt = new FormData(document.getElementById("Categories_ec"));
		jQuery.ajax('/admin/category-update', {
			type: 'POST', // http method
			data: formDt, // data to submit
			cache: false,
			contentType: false,
			processData: false,
			complete: function(data) {
				jQuery('.info-bl-ec').html(`<div class="alert alert-success alert-dismissible fade show" style="margin-top:10px;" role="alert">
				  <strong>Հաջողությամբ գրանցված է</strong>
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>`);
				jQuery("#edite-category").on("hidden.bs.modal", function() {
					window.location.reload();
				});
			}
		});
	});
	$('body').on('click', '.sendFormPartnerEdite', function(event) {
		var formDt = new FormData(document.getElementById("Partners_ed"));
		formDt.append("edite", "true");
		jQuery.ajax('/admin/partners', {
			type: 'POST', // http method
			data: formDt, // data to submit
			cache: false,
			contentType: false,
			processData: false,
			complete: function(data) {
				jQuery('.info-bl-ec').html(`<div class="alert alert-success alert-dismissible fade show" style="margin-top:10px;" role="alert">
				  <strong>Հաջողությամբ գրանցված է</strong>
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>`);
				jQuery("#editenew").on("hidden.bs.modal", function() {
					window.location.reload();
				});
			}
		});
	});
	$('body').on('click', '#copy', function(event) {
		var id = $('.sortable li.active').attr('data-id');
		copyCategory(id);
	});
	$('body').on('click', '.addParam', function(event) {
		var cl = $('.clone').first().clone().removeClass('clone').css('display', 'block');
		$('.clone').parent().append(cl);
		var cl_ru = $('.clone_ru').first().clone().removeClass('clone_ru').css('display', 'block');
		$('.clone_ru').parent().append(cl_ru);
		var cl_en = $('.clone_en').first().clone().removeClass('clone_en').css('display', 'block');
		$('.clone_en').parent().append(cl_en);

	});
	$('body').on('click', '#disable', function(event) {
		var id = $('.sortable li.active').attr('data-id');
		disableCategory(id);
	});
	$('body').on('click', '#editeMeasurement', function(event) {
		var id = $('.sortable li.active').attr('data-id');
		editeMeasurement(id);
	});
	$('body').on('click', '#copyMeasurement', function(event) {
		var id = $('.sortable li.active').attr('data-id');
		copyMeasurement(id);
	});
	$('body').on('click', '#copyProduct', function(event) {
		var id = $('.sortableTable tr.active').attr('data-id');
		copyProduct(id);
	});
	$('body').on('click', '#editeOrder', function(event) {
		var id = $('.sortableTable tr.active').attr('data-id');
		editeOrder(id);
	});
	$('body').on('click', '#editeBrand', function(event) {
		var id = $('.sortableTable tr.active').attr('data-id');
		editeBrand(id);
	});
	$('body').on('click', '#editeText', function(event) {
		var id = $('.sortableTable tr.active').attr('data-id');
		editeText(id);
	});
	$('body').on('click', '#editeProduct', function(event) {
		var id = $('.sortableTable tr.active').attr('data-id');
		editeProduct(id);
	});
	$('body').on('click', '#editePage', function(event) {
		var id = $('.sortableTable tr.active').attr('data-id');
		editePage(id);
	});
	$('body').on('click', '#editeBlog', function(event) {
		var id = $('.sortableTable tr.active').attr('data-id');
		editeBlog(id);
	});
	$('body').on('click', '#editeManager', function(event) {
		var id = $('.sortableTable tr.active').attr('data-id');
		editeManager(id);
	});
	$('body').on('click', '#editeBanner', function(event) {
		var id = $('.sortableTable tr.active').attr('data-id');
		editeBanner(id);
	});
	$('body').on('click', '#copyPage', function(event) {
		var id = $('.sortableTable tr.active').attr('data-id');
		copyPage(id);
	});
	$('body').on('click', '#copyBlog', function(event) {
		var id = $('.sortableTable tr.active').attr('data-id');
		copyBlog(id);
	});
	$('body').on('click', '#copyBrand', function(event) {
		var id = $('.sortableTable tr.active').attr('data-id');
		copyBrand(id);
	});
	$('body').on('click', '#copyBanner', function(event) {
		var id = $('.sortableTable tr.active').attr('data-id');
		copyBanner(id);
	});
	$('body').on('click', '#disableProduct', function(event) {
		var id = $('.sortableTable tr.active').attr('data-id');
		disableProduct(id);
	});
	$('body').on('click', '#disableManager', function(event) {
		var id = $('.sortableTable tr.active').attr('data-id');
		disableManager(id);
	});
	$('body').on('click', '#disableBrand', function(event) {
		var id = $('.sortableTable tr.active').attr('data-id');
		disableBrand(id);
	});
	$('body').on('click', '#disablePage', function(event) {
		var id = $('.sortableTable tr.active').attr('data-id');
		disablePage(id);
	});
	$('body').on('click', '#disableBlog', function(event) {
		var id = $('.sortableTable tr.active').attr('data-id');
		disableBlog(id);
	});
	$('body').on('click', '#disableBanner', function(event) {
		var id = $('.sortableTable tr.active').attr('data-id');
		disableBanner(id);
	});
	$('body').on('click', '#disableParams', function(event) {
		var id = $('.sortable li.active').attr('data-id');
		disableParams(id);
	});
	$('body').on('click', '#editeParams', function(event) {
		var id = $('.sortable li.active').attr('data-id');
		editeParams(id);
	});
	$('body').on('click', '#copyParams', function(event) {
		var id = $('.sortable li.active').attr('data-id');
		copyParams(id);
	});
	$('body').on('click', '#disableStore', function(event) {
		var id = $('.sortableTable  tr.active').attr('data-id');
		disableStore(id);
	});
	$('body').on('click', '#editeStore', function(event) {
		var id = $('.sortableTable  tr.active').attr('data-id');
		editeStore(id);
	});
	$('body').on('click', '#copyStore', function(event) {
		var id = $('.sortableTable  tr.active').attr('data-id');
		copyStore(id);
	});
	$('body').on('click', '#disableUser', function(event) {
		var id = $('.sortableTable  tr.active').attr('data-id');
		disableUser(id);
	});
	$('body').on('click', '#disablePartner', function(event) {
		var id = $('.sortableTable  tr.active').attr('data-id');
		disablePartner(id);
	});
	$('body').on('click', '#editeUser', function(event) {
		var id = $('.sortableTable  tr.active').attr('data-id');
		editeUser(id);
	});
	$('body').on('click', '#editePartner', function(event) {
		var id = $('.sortableTable  tr.active').attr('data-id');
		editePartner(id);
	});
	$('body').on('click', '#copyUser', function(event) {
		var id = $('.sortableTable  tr.active').attr('data-id');
		copyUser(id);
	});
	$('body').on('click', '#copyPartner', function(event) {
		var id = $('.sortableTable  tr.active').attr('data-id');
		copyPartner(id);
	});
	$('body').on('click', '#disableMeasurement', function(event) {
		var id = $('.sortable li.active').attr('data-id');
		disableMeasurement(id);
	});
	$('.search-trigger').on('click', function(event) {
		event.preventDefault();
		event.stopPropagation();
		$('.search-trigger').parent('.header-left').addClass('open');
	});
	$('.search-close').on('click', function(event) {
		event.preventDefault();
		event.stopPropagation();
		$('.search-trigger').parent('.header-left').removeClass('open');
	});
	$('.equal-height').matchHeight({
		property: 'max-height'
	});


	// Counter Number
	$('.count').each(function() {
		$(this).prop('Counter', 0).animate({
			Counter: $(this).text()
		}, {
			duration: 3000,
			easing: 'swing',
			step: function(now) {
				$(this).text(Math.ceil(now));
			}
		});
	});
	// Menu Trigger
	$('#menuToggle').on('click', function(event) {
		var windowWidth = $(window).width();
		if (windowWidth < 1010) {
			$('body').removeClass('open');
			if (windowWidth < 760) {
				$('#left-panel').slideToggle();
			} else {
				$('#left-panel').toggleClass('open-menu');
			}
		} else {
			$('body').toggleClass('open');
			$('#left-panel').removeClass('open-menu');
		}

	});
	$(".menu-item-has-children.dropdown").each(function() {
		$(this).on('click', function() {
			var $temp_text = $(this).children('.dropdown-toggle').html();
			$(this).children('.sub-menu').prepend('<li class="subtitle">' + $temp_text + '</li>');
		});
	});

	// Load Resize
	$(window).on("load resize", function(event) {
		var windowWidth = $(window).width();
		if (windowWidth < 1010) {
			$('body').addClass('small-device');
		} else {
			$('body').removeClass('small-device');
		}

	});


});
