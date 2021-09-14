$(function() {
    "use strict";
	
	
	// Navigation
	! function(n, e, i, a) {
		n.navigation = function(t, s) {
			var o = {
					responsive: !0,
					mobileBreakpoint:992,
					showDuration: 300,
					hideDuration: 300,
					showDelayDuration: 0,
					hideDelayDuration: 0,
					submenuTrigger: "hover",
					effect: "fade",
					submenuIndicator: !0,
					hideSubWhenGoOut: !0,
					visibleSubmenusOnMobile: !1,
					fixed: !1,
					overlay: !0,
					overlayColor: "rgba(0, 0, 0, 0.5)",
					hidden: !1,
					offCanvasSide: "left",
					onInit: function() {},
					onShowOffCanvas: function() {},
					onHideOffCanvas: function() {}
				},
				u = this,
				r = Number.MAX_VALUE,
				d = 1,
				f = "click.nav touchstart.nav",
				l = "mouseenter.nav",
				c = "mouseleave.nav";
			u.settings = {};
			var t = (n(t), t);
			n(t).find(".nav-menus-wrapper").prepend("<span class='nav-menus-wrapper-close-button'>✕</span>"), n(t).find(".nav-search").length > 0 && n(t).find(".nav-search").find("form").prepend("<span class='nav-search-close-button'>✕</span>"), u.init = function() {
				u.settings = n.extend({}, o, s), "right" == u.settings.offCanvasSide && n(t).find(".nav-menus-wrapper").addClass("nav-menus-wrapper-right"), u.settings.hidden && (n(t).addClass("navigation-hidden"), u.settings.mobileBreakpoint = 99999), v(), u.settings.fixed && n(t).addClass("navigation-fixed"), n(t).find(".nav-toggle").on("click touchstart", function(n) {
					n.stopPropagation(), n.preventDefault(), u.showOffcanvas(), s !== a && u.callback("onShowOffCanvas")
				}), n(t).find(".nav-menus-wrapper-close-button").on("click touchstart", function() {
					u.hideOffcanvas(), s !== a && u.callback("onHideOffCanvas")
				}), n(t).find(".nav-search-button").on("click touchstart", function(n) {
					n.stopPropagation(), n.preventDefault(), u.toggleSearch()
				}), n(t).find(".nav-search-close-button").on("click touchstart", function() {
					u.toggleSearch()
				}), n(t).find(".megamenu-tabs").length > 0 && y(), n(e).resize(function() {
					m(), C()
				}), m(), s !== a && u.callback("onInit")
			};
			var v = function() {
				n(t).find("li").each(function() {
					n(this).children(".nav-dropdown,.megamenu-panel").length > 0 && (n(this).children(".nav-dropdown,.megamenu-panel").addClass("nav-submenu"), u.settings.submenuIndicator && n(this).children("a").append("<span class='submenu-indicator'><span class='submenu-indicator-chevron'></span></span>"))
				})
			};
			u.showSubmenu = function(e, i) {
				g() > u.settings.mobileBreakpoint && n(t).find(".nav-search").find("form").slideUp(), "fade" == i ? n(e).children(".nav-submenu").stop(!0, !0).delay(u.settings.showDelayDuration).fadeIn(u.settings.showDuration) : n(e).children(".nav-submenu").stop(!0, !0).delay(u.settings.showDelayDuration).slideDown(u.settings.showDuration), n(e).addClass("nav-submenu-open")
			}, u.hideSubmenu = function(e, i) {
				"fade" == i ? n(e).find(".nav-submenu").stop(!0, !0).delay(u.settings.hideDelayDuration).fadeOut(u.settings.hideDuration) : n(e).find(".nav-submenu").stop(!0, !0).delay(u.settings.hideDelayDuration).slideUp(u.settings.hideDuration), n(e).removeClass("nav-submenu-open").find(".nav-submenu-open").removeClass("nav-submenu-open")
			};
			var h = function() {
					n("body").addClass("no-scroll"), u.settings.overlay && (n(t).append("<div class='nav-overlay-panel'></div>"), n(t).find(".nav-overlay-panel").css("background-color", u.settings.overlayColor).fadeIn(300).on("click touchstart", function(n) {
						u.hideOffcanvas()
					}))
				},
				p = function() {
					n("body").removeClass("no-scroll"), u.settings.overlay && n(t).find(".nav-overlay-panel").fadeOut(400, function() {
						n(this).remove()
					})
				};
			u.showOffcanvas = function() {
				h(), "left" == u.settings.offCanvasSide ? n(t).find(".nav-menus-wrapper").css("transition-property", "left").addClass("nav-menus-wrapper-open") : n(t).find(".nav-menus-wrapper").css("transition-property", "right").addClass("nav-menus-wrapper-open")
			}, u.hideOffcanvas = function() {
				n(t).find(".nav-menus-wrapper").removeClass("nav-menus-wrapper-open").on("webkitTransitionEnd moztransitionend transitionend oTransitionEnd", function() {
					n(t).find(".nav-menus-wrapper").css("transition-property", "none").off()
				}), p()
			}, u.toggleOffcanvas = function() {
				g() <= u.settings.mobileBreakpoint && (n(t).find(".nav-menus-wrapper").hasClass("nav-menus-wrapper-open") ? (u.hideOffcanvas(), s !== a && u.callback("onHideOffCanvas")) : (u.showOffcanvas(), s !== a && u.callback("onShowOffCanvas")))
			}, u.toggleSearch = function() {
				"none" == n(t).find(".nav-search").find("form").css("display") ? (n(t).find(".nav-search").find("form").slideDown(), n(t).find(".nav-submenu").fadeOut(200)) : n(t).find(".nav-search").find("form").slideUp()
			};
			var m = function() {
					u.settings.responsive ? (g() <= u.settings.mobileBreakpoint && r > u.settings.mobileBreakpoint && (n(t).addClass("navigation-portrait").removeClass("navigation-landscape"), D()), g() > u.settings.mobileBreakpoint && d <= u.settings.mobileBreakpoint && (n(t).addClass("navigation-landscape").removeClass("navigation-portrait"), k(), p(), u.hideOffcanvas()), r = g(), d = g()) : k()
				},
				b = function() {
					n("body").on("click.body touchstart.body", function(e) {
						0 === n(e.target).closest(".navigation").length && (n(t).find(".nav-submenu").fadeOut(), n(t).find(".nav-submenu-open").removeClass("nav-submenu-open"), n(t).find(".nav-search").find("form").slideUp())
					})
				},
				g = function() {
					return e.innerWidth || i.documentElement.clientWidth || i.body.clientWidth
				},
				w = function() {
					n(t).find(".nav-menu").find("li, a").off(f).off(l).off(c)
				},
				C = function() {
					if (g() > u.settings.mobileBreakpoint) {
						var e = n(t).outerWidth(!0);
						n(t).find(".nav-menu").children("li").children(".nav-submenu").each(function() {
							n(this).parent().position().left + n(this).outerWidth() > e ? n(this).css("right", 0) : n(this).css("right", "auto")
						})
					}
				},
				y = function() {
					function e(e) {
						var i = n(e).children(".megamenu-tabs-nav").children("li"),
							a = n(e).children(".megamenu-tabs-pane");
						n(i).on("click.tabs touchstart.tabs", function(e) {
							e.stopPropagation(), e.preventDefault(), n(i).removeClass("active"), n(this).addClass("active"), n(a).hide(0).removeClass("active"), n(a[n(this).index()]).show(0).addClass("active")
						})
					}
					if (n(t).find(".megamenu-tabs").length > 0)
						for (var i = n(t).find(".megamenu-tabs"), a = 0; a < i.length; a++) e(i[a])
				},
				k = function() {
					w(), n(t).find(".nav-submenu").hide(0), navigator.userAgent.match(/Mobi/i) || navigator.maxTouchPoints > 0 || "click" == u.settings.submenuTrigger ? n(t).find(".nav-menu, .nav-dropdown").children("li").children("a").on(f, function(i) {
						if (u.hideSubmenu(n(this).parent("li").siblings("li"), u.settings.effect), n(this).closest(".nav-menu").siblings(".nav-menu").find(".nav-submenu").fadeOut(u.settings.hideDuration), n(this).siblings(".nav-submenu").length > 0) {
							if (i.stopPropagation(), i.preventDefault(), "none" == n(this).siblings(".nav-submenu").css("display")) return u.showSubmenu(n(this).parent("li"), u.settings.effect), C(), !1;
							if (u.hideSubmenu(n(this).parent("li"), u.settings.effect), "_blank" == n(this).attr("target") || "blank" == n(this).attr("target")) e.open(n(this).attr("href"));
							else {
								if ("#" == n(this).attr("href") || "" == n(this).attr("href")) return !1;
								e.location.href = n(this).attr("href")
							}
						}
					}) : n(t).find(".nav-menu").find("li").on(l, function() {
						u.showSubmenu(this, u.settings.effect), C()
					}).on(c, function() {
						u.hideSubmenu(this, u.settings.effect)
					}), u.settings.hideSubWhenGoOut && b()
				},
				D = function() {
					w(), n(t).find(".nav-submenu").hide(0), u.settings.visibleSubmenusOnMobile ? n(t).find(".nav-submenu").show(0) : (n(t).find(".nav-submenu").hide(0), n(t).find(".submenu-indicator").removeClass("submenu-indicator-up"), u.settings.submenuIndicator ? n(t).find(".submenu-indicator").on(f, function(e) {
						return e.stopPropagation(), e.preventDefault(), u.hideSubmenu(n(this).parent("a").parent("li").siblings("li"), "slide"), u.hideSubmenu(n(this).closest(".nav-menu").siblings(".nav-menu").children("li"), "slide"), "none" == n(this).parent("a").siblings(".nav-submenu").css("display") ? (n(this).addClass("submenu-indicator-up"), n(this).parent("a").parent("li").siblings("li").find(".submenu-indicator").removeClass("submenu-indicator-up"), n(this).closest(".nav-menu").siblings(".nav-menu").find(".submenu-indicator").removeClass("submenu-indicator-up"), u.showSubmenu(n(this).parent("a").parent("li"), "slide"), !1) : (n(this).parent("a").parent("li").find(".submenu-indicator").removeClass("submenu-indicator-up"), void u.hideSubmenu(n(this).parent("a").parent("li"), "slide"))
					}) : k())
				};
			u.callback = function(n) {
				s[n] !== a && s[n].call(t)
			}, u.init()
		}, n.fn.navigation = function(e) {
			return this.each(function() {
				if (a === n(this).data("navigation")) {
					var i = new n.navigation(this, e);
					n(this).data("navigation", i)
				}
			})
		}
	}
	(jQuery, window, document), $(document).ready(function() {
		$("#navigation").navigation()
	});
	
	$(window).scroll(function() {    
		var scroll = $(window).scrollTop();

		if (scroll >= 50) {
			$(".header").addClass("header-fixed");
		} else {
			$(".header").removeClass("header-fixed");
		}
	});
	
	
	// Search Form Guest Script
	$('.select-guests-dropdown .btn-minus').click(function(e) {
		e.stopPropagation();
		let type = $(this).attr('data-input'), ttype = type == "children" ? "kids" : type;
		
		var parent = $(this).closest('.form-select-guests');
		let input = $(`#landing-search-${ttype}`);
		
		var min = parseInt(input.attr('min'));
		var old = parseInt(input.val());
		console.log("minus");
		console.log("old: ",old);
		console.log("min: ",min);
		if (old <= min) {
			return;
		}
		input.val(old - 1);
		$(this).next().html(old - 1);
		updateGuestCountText(parent);
		
	});
	$('.select-guests-dropdown .btn-add').click(function(e) {
		e.stopPropagation();
		let type = $(this).attr('data-input'), ttype = type == "children" ? "kids" : type;
		
		var parent = $(this).closest('.form-select-guests');
		let input = $(`#landing-search-${ttype}`);
		var max = parseInt(input.attr('max'));
		var old = parseInt(input.val());
		console.log("plus");
		console.log("old: ",old);
		console.log("max: ",max);
		if (old >= max) {
			return;
		}
		input.val(old + 1);
		$(this).prev().html(old + 1);
		updateGuestCountText(parent);
	});

	function updateGuestCountText(parent) {
		//var adults = parseInt(parent.find('[name=adults]').val());
		//var children = parseInt(parent.find('[name=children]').val());
		let adults = $(`#landing-search-adults`).val(), children = $(`#landing-search-kids`).val();
		var adultsHtml = parent.find('.render .adults .multi').data('html');
		console.log(parent, adultsHtml);
		parent.find('.render .adults .multi').html(adultsHtml.replace(':count', adults));
		var childrenHtml = parent.find('.render .children .multi').data('html');
		parent.find('.render .children .multi').html(childrenHtml.replace(':count', children));
		if (adults > 1) {
			parent.find('.render .adults .multi').removeClass('d-none');
			parent.find('.render .adults .one').addClass('d-none');
		} else {
			parent.find('.render .adults .multi').addClass('d-none');
			parent.find('.render .adults .one').removeClass('d-none');
		}
		if (children > 1) {
			parent.find('.render .children .multi').removeClass('d-none');
			parent.find('.render .children .one').addClass('d-none');
		} else {
			parent.find('.render .children .multi').addClass('d-none');
			parent.find('.render .children .one').removeClass('d-none').html(parent.find('.render .children .one').data('html').replace(':count', children));
		}
	}
	
	// Adult & Child Number Script
	$(document).ready(function() {

	  var guestAmount = $('#guestNo');

	  $('#cnt-up').click(function() {
		guestAmount.val(Math.min(parseInt($('#guestNo').val()) + 1, 20));
	  });
	  $('#cnt-down').click(function() {
		guestAmount.val(Math.max(parseInt($('#guestNo').val()) - 1, 1));
	  });

	});
	
	$(document).ready(function() {

	  var guestAmount = $('#kidsNo');

	  $('#kcnt-up').click(function() {
		guestAmount.val(Math.min(parseInt($('#kidsNo').val()) + 1, 20));
	  });
	  $('#kcnt-down').click(function() {
		guestAmount.val(Math.max(parseInt($('#kidsNo').val()) - 1, 0));
	  });
	});
	
	// Adult & Child Number Script
	$(document).ready(function() {

	  var guestAmount = $('#roomNo');

	  $('#rom-up').click(function() {
		guestAmount.val(Math.min(parseInt($('#roomNo').val()) +1, 20));
	  });
	  $('#rom-down').click(function() {
		guestAmount.val(Math.max(parseInt($('#roomNo').val()) - 1, 0));
	  });

	});
	
	$(document).ready(function() {

	  var guestAmount = $('#kidsroomNo');

	  $('#krom-up').click(function() {
		guestAmount.val(Math.min(parseInt($('#kidsroomNo').val()) + 1, 20));
	  });
	  $('#krom-down').click(function() {
		guestAmount.val(Math.max(parseInt($('#kidsroomNo').val()) - 1, 0));
	  });
	});

	// Guests Dropdown Script
	$(".form-content").on("click", function () {
	  $(".select-guests-dropdown").slideToggle();
	});
	
	// Daterange Script
	$('input[name="dates"]').daterangepicker();
	
	// Check In & Check Out Daterange Script
	$(function() {
	  $('input[name="checkout"]').daterangepicker({
		singleDatePicker: true,
	  });
		//$('input[name="checkout"]').val('');
		$('input[name="checkout"]').attr("placeholder","Check Out");
	});
	
	$(function() {
	  $('input[name="checkin"]').daterangepicker({
		singleDatePicker: true,
		
	  });
		//$('input[name="checkin"]').val('');
		$('input[name="checkin"]').attr("placeholder","Check In");
	});
	
	// Range Slider
	$('input[type="range"].distance-radius').rangeslider({
		polyfill: false,
		onInit: function () {
			this.output = $(".distance-title span").html(this.$element.val());
		},
		onSlide: function (
			position, value) {
			this.output.html(value);
		}
	});
	
	// 
	$('#tour-category').select2({
		placeholder: "Tour Category",
		allowClear: true
	});
	
	
	// Bottom To Top Scroll Script
	$(window).on('scroll', function() {
		var height = $(window).scrollTop();
		if (height > 100) {
			$('#back2Top').fadeIn();
		} else {
			$('#back2Top').fadeOut();
		}
	});
	
	// Dropdown
	$(".drp-select a").on('click', function(){

		$(this).parents(".dropdown").find('.selection').text($(this).text());
		$(this).parents(".dropdown").find('.selection').val($(this).text());

	});
	
	$("#back2Top").on('click', function(event) {
		event.preventDefault();
		$("html, body").animate({ scrollTop: 0 }, "slow");
		return false;
	});
	
	// Filter Search Option
	$("#guest").click(function(){
		$("#g-showing").slideToggle("slow");
	});
	
	// Filter Search Option

	
	// smart-textimonials
	$('#smart-textimonials').slick({
	  slidesToShow:1,
	  arrows: false,
	  autoplay:true,
	  responsive: [
		{
		  breakpoint: 768,
		  settings: {
			arrows: false,
			slidesToShow:1
		  }
		},
		{
		  breakpoint: 480,
		  settings: {
			arrows: false,
			slidesToShow:1
		  }
		}
	  ]
	});
	
	// Property Slide
	$('.testi-slide').slick({
	  slidesToShow:2,
	  arrows: false,
	  autoplay:true,
	  responsive: [
		{
		  breakpoint: 1023,
		  settings: {
			arrows: false,
			slidesToShow:1
		  }
		},
		{
		  breakpoint: 768,
		  settings: {
			arrows: false,
			slidesToShow:1
		  }
		},
		{
		  breakpoint: 480,
		  settings: {
			arrows: false,
			slidesToShow:1
		  }
		}
	  ]
	});
	
	$('#lists-slide').owlCarousel({
		loop:true,
		margin:20,
		dots:true,
		center: true,
		autoplay:true,
		autoplayTimeout:3000,
		stagePadding:0,
		nav:false,
		responsiveClass:true,
		responsive:{
			0:{
				items:1,
				nav:false
			},
			600:{
				items:2,
				nav:false
			},
			1000:{
				items:3,
				nav:false,
				loop:true
			},
			1199:{
				items:3,
				nav:false,
				dots:true,
				loop:true
			}
		}
	});
	
	// Featured Slick Slider
	$('.featured-slick-slide').slick({
		//centerMode: true,
		//centerPadding: '80px',
		//slidesToShow:1,
		autoplay: true,
        autoplaySpeed: 2000,
		responsive: [
		{
		breakpoint: 768,
		settings: {
		arrows:true,
		//centerMode: true,
		//centerPadding: '60px',
		//slidesToShow:1,
		autoplay: true,
        autoplaySpeed: 2000,
		}
		},
		{
		breakpoint: 480,
		settings: {
		arrows: false,
		//centerMode: true,
		//centerPadding: '40px',
		//slidesToShow: 1,
		autoplay: true,
        autoplaySpeed: 2000,
		}
		}
		]
	});
	
	$('#categorie-slide').owlCarousel({
		loop:true,
		margin:0,
		autoplay:true,
		autoplayTimeout:3000,
		dots:true,
		nav:false,
		responsiveClass:true,
		responsive:{
			0:{
				items:1,
				nav:false
			},
			600:{
				items:3,
				nav:false
			},
			1000:{
				items:3,
				nav:false,
				loop:false
			},
			1199:{
				items:5,
				nav:false,
				dots:true,
				loop:true
			}
		}
	});
	
	$('#ab-categorie-slide').owlCarousel({
		loop:true,
		margin:0,
		autoplay:true,
		autoplayTimeout:3000,
		dots:true,
		nav:false,
		responsiveClass:true,
		responsive:{
			0:{
				items:1,
				nav:false
			},
			600:{
				items:3,
				nav:false
			},
			1000:{
				items:3,
				nav:false,
				loop:false
			},
			1199:{
				items:4,
				nav:false,
				dots:true,
				loop:true
			}
		}
	});
	
	// Select Category
	$('#list-category').select2({
		placeholder: "Choose Category",
		allowClear: true
	});
	
	// Select Rooms
	$('#country').select2({
		placeholder: "Country",
		allowClear: true
	});
	
	// Select Cities
	$('#choose-city').select2({
		placeholder: "Select City",
		allowClear: true
	});
	
	// Home Slider
	$('.home-slider').slick({
	  centerMode:false,
	  slidesToShow:1,
	  responsive: [
		{
		  breakpoint: 768,
		  settings: {
			arrows:true,
			slidesToShow:1
		  }
		},
		{
		  breakpoint: 480,
		  settings: {
			arrows: false,
			slidesToShow:1
		  }
		}
	  ]
	});
	
	$('.click').slick({
	  slidesToShow:1,
	  slidesToScroll: 1,
	  autoplay:false,
	  autoplaySpeed: 2000,
	});
	
	// Add Pricing
	function newMenuItem() {
		var newElem = $('tr.pricing-list-item.pattern').first().clone();
		newElem.find('input').val('');
		newElem.appendTo('table#price-list-wrap');
	}
	if ($("table#price-list-wrap").is('*')) {
		$('.add-pr-item-btn').on('click', function(e) {
			e.preventDefault();
			newMenuItem();
		});
		$(document).on("click", "#price-list-wrap .delete", function(e) {
			e.preventDefault();
			$(this).parent().parent().remove();
		});
		$('.add-cat-btn').on('click', function(e) {
			e.preventDefault();
			var newElem = $('' +
				'<tr class="pricing-list-item pricing-submenu">' +
				'<td>' +
				'<div class="box-move"><i class="ti-move"></i></div>' +
				'<div class="box-input"><input type="text" class="frm-control" placeholder="Category Title" /></div>' +
				'<div class="box-close"><a class="delete" href="#"><i class="ti-close"></i></a></div>' +
				'</td>' +
				'</tr>');
			newElem.appendTo('table#price-list-wrap');
		});
		$('table#price-list-wrap tbody').sortable({
			forcePlaceholderSize: true,
			forceHelperSize: false,
			placeholder: 'sortableHelper',
			zIndex: 999990,
			opacity: 0.6,
			tolerance: "pointer",
			start: function(e, ui) {
				ui.placeholder.height(ui.helper.outerHeight());
			}
		});
	}
	var fieldUnit = $('.pr-price').children('input').attr('data-unit');
	$('.pr-price').children('input').before('<i class="data-unit">' + fieldUnit + '</i>');
	$("a.close").removeAttr("href").on('click', function() {
		function slideFade(elem) {
			var fadeOut = {
				opacity: 0,
				transition: 'opacity 0.5s'
			};
			elem.css(fadeOut).slideUp();
		}
		slideFade($(this).parent());
	});
	$(".price-add-wrapper").each(function() {
		var switcherSection = $(this);
		var switcherInput = $(this).find('.switch input');
		if (switcherInput.is(':checked')) {
			$(switcherSection).addClass('switch-on');
		}
		switcherInput.change(function() {
			if (this.checked === true) {
				$(switcherSection).addClass('switch-on');
			} else {
				$(switcherSection).removeClass('switch-on');
			}
		});
	});
	
	// Advance Single Slider
	$(function() { 
	// Card's slider
	  var $carousel = $('.slider-for');

	  $carousel
		.slick({
		  slidesToShow: 1,
		  slidesToScroll: 1,
		  arrows: false,
		  fade: true,
		  adaptiveHeight: true,
		  asNavFor: '.slider-nav'
		})
		.magnificPopup({
		  type: 'image',
		  delegate: 'a:not(.slick-cloned)',
		  closeOnContentClick: false,
		  tLoading: 'Загрузка...',
		  mainClass: 'mfp-zoom-in mfp-img-mobile',
		  image: {
			verticalFit: true,
			tError: '<a href="%url%">Фото #%curr%</a> не загрузилось.'
		  },
		  gallery: {
			enabled: true,
			navigateByImgClick: true,
			tCounter: '<span class="mfp-counter">%curr% из %total%</span>', // markup of counte
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		  },
		  zoom: {
			enabled: true,
			duration: 300
		  },
		  removalDelay: 300, //delay removal by X to allow out-animation
		  callbacks: {
			open: function() {
			  //overwrite default prev + next function. Add timeout for css3 crossfade animation
			  $.magnificPopup.instance.next = function() {
				var self = this;
				self.wrap.removeClass('mfp-image-loaded');
				setTimeout(function() { $.magnificPopup.proto.next.call(self); }, 120);
			  };
			  $.magnificPopup.instance.prev = function() {
				var self = this;
				self.wrap.removeClass('mfp-image-loaded');
				setTimeout(function() { $.magnificPopup.proto.prev.call(self); }, 120);
			  };
			  var current = $carousel.slick('slickCurrentSlide');
			  $carousel.magnificPopup('goTo', current);
			},
			imageLoadComplete: function() {
			  var self = this;
			  setTimeout(function() { self.wrap.addClass('mfp-image-loaded'); }, 16);
			},
			beforeClose: function() {
			  $carousel.slick('slickGoTo', parseInt(this.index));
			}
		  }
		});
	  $('.slider-nav').slick({
		slidesToShow:6,
		slidesToScroll:1,
		asNavFor: '.slider-for',
		dots: false,
		centerMode: false,
		focusOnSelect: true
	  });
	  
	  
	});

	
	// MagnificPopup
	$('body').magnificPopup({
		type: 'image',
		delegate: 'a.mfp-gallery',
		fixedContentPos: true,
		fixedBgPos: true,
		overflowY: 'auto',
		closeBtnInside: false,
		preloader: true,
		removalDelay: 0,
		mainClass: 'mfp-fade',
		gallery: {
			enabled: true
		}
	});
	
});