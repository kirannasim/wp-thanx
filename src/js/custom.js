(function($) {

    $(window).load(function(e) {
        // Check for hash in URL
		if ( window.location.hash ) {
            // void some browsers issue
            // setTimeout(function() { window.scrollTo(0, 0); }, 1);

			if ( $(window.location.hash).is('.tab-pane') ){
				$('.platform-tabs li.active').removeClass('active');
				var wr = '#link-' + window.location.hash.replace('#','');
                $(wr).addClass('active');

				$('#tabs-dropdown-select').val(window.location.hash);

                $('.tab-pane.active').removeClass('active');
                $(window.location.hash).addClass('active');
			}
            
            if ( $(window.location.hash).is('.why-thanx-page .section') ) {
                $('.sub-nav-scroll a[href="' + window.location.hash + '"]').parent().addClass('active');
                $('#tabs-scroll-select').val(window.location.hash);
            }

            controller.scrollTo(window.location.hash);
			// $('html, body').scrollTop( $(window.location.hash).offset().top );
		}
    });

    $(document).on('ready', function () {
	
		$("[href*='#contact_wrapper']").on('click', function(){
			$('select').val('Merchant support').trigger( 'change' );
			console.log('merchant support');
		});

		$(".nav-link.dropdown-toggle").on('click', function(e){
			if ( $( document ).width() < 768 ) {
				e.preventDefault();
				$('.navbar-nav').find('.dropdown-menu').hide();
				$(this).next('.dropdown-menu').show();
				return false;
			}			
		});

		$('#dm-contact-form .close').on('click', function (e) {
			$('#dm-contact-form').find('.wpcf7-response-output').html('');
		});

        $('#dm-assessment-form .close').on('click', function (e) {
			$('#dm-assessment-form').find('.wpcf7-response-output').html('');
		});

		$(".navbar-toggler").on('click', function(e){
			$( 'body' ).toggleClass( 'mobile-header-active' );
		});


		// $("[href*='#rewards-loyalty-modal']").on('click', function(){
		// 	$('#rewards-loyalty-modal').modal('show');
		// });

		// Logic for hiding the cookie
        function clearCalculatedHeaderSpace() {
            if ($("body.header-banner-shown.header-type-transparent .hero").length > 0) {
                $("body.header-banner-shown.header-type-transparent .hero").removeAttr('style');
            }

            if ($('body.header-banner-shown.header-type-transparent .page-header').length > 0) {
                $("body.header-banner-shown.header-type-transparent .page-header").removeAttr('style');
            }
        }

		$('.header-banner .close').on('click', function(){
			setCookie( 'thanxHeaderBanner', 'true', 365 );
            clearCalculatedHeaderSpace();
			$('body').removeClass('header-banner-shown');
		});

		if ( 'true' != getCookie( 'thanxHeaderBanner' ) ) {
			$('.header-banner').show();
			$('body').addClass('header-banner-shown');
		}

		// Home page carousel.
		function homeCarouselNext(){
			var slide = $('[data-carousel-slide]').data('carousel-slide');
			var next = slide + 1;
			$('#home-hero-slide-' + slide ).hide();
			if ( $( '#home-hero-slide-' + next ).length > 0 ){
				$( '#home-hero-slide-' + next ).show();
				$('[data-carousel-slide]').data('carousel-slide', next);
			} else {
				$( '#home-hero-slide-0' ).show();
				$('[data-carousel-slide]').data('carousel-slide', 0);
			}
			// $('[data-carousel-slide]').removeClass('transition').addClass('transition');
		}
		if ( $('.front-page' ).length > 0 ) {

			$("[data-carousel-slide]").on('click', homeCarouselNext );

			// $(window).on('scroll', function(){	
			// 	var bottom = $('.front-page > .hero').scrollTop() + $('.front-page > .hero').innerHeight();
			// 	var current = $(window).scrollTop() + $(window).innerHeight();
			// 	if( bottom >= current) {
			// 		$('.home-hero-slide-bg').css({"bottom": "0", "position":"fixed", "top":"auto"});
			// 	} else {
			// 		$('.home-hero-slide-bg').css({"bottom": "0px", "position":"absolute", "top":"auto"});
			// 	}
			// });

			// On load.
			// $('[data-carousel-slide]').removeClass('transition').addClass('transition');
			// setInterval(function(){
			// 	homeCarouselNext();
			// }, 10000);
		}


		// Toggle Label Active
		$('input, textarea').on( 'focus', function() {
            var name = $(this).attr('name');
            $("label[for='" + name + "']").addClass( 'focus' );
			// $(this).parents(".form-group").find("label[for='" + $(this).attr('name') + "']").addClass( 'focus' );
		});
        
		$('input, textarea').on( 'focusout', function() {
            var name = $(this).attr('name');
			if ( ! $(this).val() ) {
                $("label[for='" + name + "']").removeClass( 'focus' );
				// $(this).parents(".form-group").find("label[for='" + $(this).attr('name') + "']").removeClass( 'focus' );
			}
		});


		//////////////////////////////////////////////////
        // Dropdown Filter
        //////////////////////////////////////////////////
        $('.dropdown-filter').on('change', function() {
            var $self = $(this);
            var link = $self.val();

            if (link != '')
                window.location.href = link;

            return false;
        });

        if ($('.dropdown-filter').length)	{
            $('.dropdown-filter').each( function(){
				var $self = $(this);
                var $actived = $self.find('option.active');

                if ($actived.length)
                    $self.val($actived.attr('value'));
			});            
        }


        //////////////////////////////////////////////////
        // Hash link
        //////////////////////////////////////////////////
        $('.hash-links a, #get_support .btn, .hash-link').on('click', function(event) {    
            if (this.hash !== "") {
                // Prevent default anchor click behavior
                event.preventDefault();
            
                // Store hash
                var hash = this.hash;

                controller.scrollTo(hash);
                window.location.hash = hash;
                
				// $('html, body').scrollTop( $(hash).offset().top );
                // $('html, body').animate({
                //     scrollTop: $(hash).offset().top
                // }, 800, 'linear', function() {    
                //     window.location.hash = hash;
                // });
            }
		});

        $('.sub-nav-scroll a').on('click', function(event) {
            if (this.hash !== "") {
                // Prevent default anchor click behavior
                event.preventDefault();                
            
                // Store hash
                var hash = this.hash;      

                // setTimeout(function() { 
                //     window.scrollTo(0, 0); 
                // }, 1);

                // controller.scrollTo(hash);
                // setTimeout(function() {
                // $('html, body').scrollTop( $(hash).offset().top );
                setTimeout(function() {
                    $('html, body').scrollTop( $(hash).offset().top );
                }, 100);
                
                window.location.hash = hash;
                // }, 100);

                $('.sub-nav-scroll li.active').removeClass('active');
                $(this).parent().addClass('active');

                $('#tabs-scroll-select').val(hash);
            }
        });
		
		$('#tabs-scroll-select').on('change', function() {
			// Store hash
			var hash = $(this).val();
			$('html, body').scrollTop( $(hash).offset().top );
            
            $('.sub-nav-scroll li.active').removeClass('active');
            $('.sub-nav-scroll a[href="' + hash + '"]').parent().addClass('active');
			//  $('html, body').animate({
			// 	scrollTop: $(hash).offset().top
			// }, 800, 'linear', function() {    
			// 	window.location.hash = hash;
			// });
		});
		
		// $(window).on('hashchange', function(e){
		// 	e.preventDefault();
		// 	return false;
		// });
	
		function resizeCards(){
			$('.grid-posts .post-thumbnail').each( function(){
				$(this).height( this.clientWidth * .5 );
			});
			$('.additional-resources .resource-thumbnail').each( function(){
				$(this).height( this.clientWidth * .5 );
			});
		}
		resizeCards();
		$(window).on('resize', resizeCards);	


        //////////////////////////////////////////////////
        // Sticky header when scroll the page
        //////////////////////////////////////////////////
        var previousScroll = 0;
        $(window).on('scroll', function () {
            var currentScroll = $(this).scrollTop();
            if (currentScroll < 72) {
                $('#header-wrapper').addClass('header-init').removeClass('is-visible scrolling is-hidden');
            } else if (currentScroll > 0 && currentScroll < $(document).height() - $(window).height()) {
                $('#header-wrapper').addClass('scrolling');
                if (currentScroll > previousScroll) {
                    hideNav();
                } else {
                    showNav();
                }
                previousScroll = currentScroll;
            }
        });        
    
        function hideNav() {
            $('#header-wrapper').removeClass('is-visible').addClass('is-hidden');
        }
    
        function showNav() {
            $('#header-wrapper').removeClass('is-hidden header-init').addClass('is-visible');
        }    
		
		if ( $(window).scrollTop() > 72) {
			$('#header-wrapper').addClass('scrolling');
		}
        
        //////////////////////////////////////////////////
        // Load More button on the grid posts
        //////////////////////////////////////////////////
        if ( $('.load_more').length ) {

            $('.load_more').on('click', function() {
                var parent = $(this).attr('data-parent');
                var $grid = $(this).closest('.' + parent);
                var $elem = $grid.find('.grid-item.d-none').first();

                if ($elem.length) {
                    for (var i=0; i<6; i++) {
                        $elem.removeClass('d-none');
                        $elem = $elem.next();

                        // Remove Load More Button
                        if ($elem.length == 0) {
                            var $load_more_wrapper = $('.load-more-wrapper');
                            $load_more_wrapper.remove();
                        }
                    }

                    if (parent == 'masonry-section') {
                        $('.masonry-grid-images').isotope({
                            itemSelector: '.masonry-grid-item',
                            layoutMode: 'masonry'
                        });
                    }
                }   
				resizeCards();
				var $elem = $grid.find('.grid-item.d-none');
				// Remove Load More Button
				if ($elem.length == 0) {
					var $load_more_wrapper = $('.load-more-wrapper');
					$load_more_wrapper.remove();
				} 
                
            });
        }        

        // if ( $('.post-filters').length ) {
        //     $('.post-filters li a').on('click', function(e) {
        //         e.preventDefault();

        //         var $self = $(this);
        //         var filter_category = $self.attr('data-category');
                
        //         $('.post-filters li.active').removeClass('active');
        //         $self.parent().addClass('active');

        //         $('.grid-item').hide();
        //         $('.grid-item.' + filter_category).show();
        //     });
        // }

        //////////////////////////////////////////////////
        // Load full transcript Button on the FF page
        //////////////////////////////////////////////////
        if ( $('.btn-load-transcript').length ) {
            $('.btn-load-transcript').on('click', function() {
                var $self = $(this);
                var $parent = $self.parent();
                var $transcript = $parent.find('.transcript');

                $transcript.addClass('full-text');

                $self.remove();
            });
        }

        //////////////////////////////////////////////////
        // magnific popup init
        //////////////////////////////////////////////////
        $('.popup-with-contact-form > a').magnificPopup({
            type: 'inline',
            preloader: false,
            modal: true
        });

        $('.btn-contact-form').magnificPopup({
            type: 'inline',
            preloader: false,
            modal: true
		}); 

        $("[href*='#rewards-loyalty-modal']").magnificPopup({
            type: 'inline',
            preloader: false,
            modal: true
        });            

        $("[href*='#dm-contact-form']").magnificPopup({
            type: 'inline',
            preloader: false,
            modal: true
        });  
        
        $("[href*='#dm-assessment-form']").magnificPopup({
            type: 'inline',
            preloader: false,
            modal: true
        }); 

        //////////////////////////////////////////////////
        // Close button click on the magnific popup
        //////////////////////////////////////////////////
        $('.modal').on('click', '.close', function(e) {
            e.preventDefault();
            $.magnificPopup.close();
        });


        //////////////////////////////////////////////////
        // Tabs on the platform pages
        //////////////////////////////////////////////////
        if ( $('.platform-tabs').length ) {
            $('.platform-tabs a').on('click', function(e) {
                e.preventDefault();

                var $self = $(this);
                var id = $self.attr('href');

                $('.platform-tabs li.active').removeClass('active');
                $self.parent().addClass('active');

                $('.tab-pane.active').removeClass('active');
                $(id).addClass('active');

				window.location.hash = id;
				$('html, body').scrollTop( $(id).offset().top );
				// setTimeout(function() {
				// 	$('html, body').animate({
				// 		scrollTop: $(id).offset().top - 150
				// 	}, 800, function() {    
				// 		window.location.hash = id;
				// 	});
				// }, 500);

				return false;
            });
				
			$('#tabs-dropdown-select').on('change', function(){
				// Store hash
                var $self = $(this);
                var id = $self.val();

                $('.platform-tabs li.active').removeClass('active');
                $self.parent().addClass('active');

                $('.tab-pane.active').removeClass('active');
                $(id).addClass('active');

				window.location.hash = id;
				
				$('html, body').scrollTop( $(id).offset().top );
				// setTimeout(function() {
				// 	$('html, body').animate({
				// 		scrollTop: $(id).offset().top - 150
				// 	}, 800, function() {    
				// 		window.location.hash = id;
				// 	});
				// }, 500);

				return false;
			});            
        }		

        //////////////////////////////////////////////////
        // Customers Filter
        //////////////////////////////////////////////////        
        if ( $('.customers-filter').length ) {
            $('.customers-filter a').on('click', function(e) {
                e.preventDefault();

                var $self = $(this);
                var $parent = $self.parent();
                var filter = $self.attr('data-filter');

                $('.customers-filter li.active').removeClass('active');
                $parent.addClass('active');

                $('.customer-stories .grid-item').removeClass('filtered');
                $('.customer-stories .grid-item' + filter).addClass('filtered');                
            });
        }

        //////////////////////////////////////////////////
        // Custom Scroll Bar
        //////////////////////////////////////////////////
        // if ( $('.thanx-scroll').length )  {
        //     $('.thanx-scroll').jScrollPane({
        //         'animateScroll': true,
        //         'animateDuration': 200,
        //         'alwaysShowHScroll': true,
        //     });
        // }
        
        var $guides_content = $('.single-wrapper .post.guides .entry-content');
        if ( $guides_content.length ) {
            var guides_content_height = $guides_content.outerHeight();

            if ( guides_content_height > 644 ) {
                $guides_content.addClass('blur');
            }
        }

        //////////////////////////////////////////////////
        // Header Banner Close
        //////////////////////////////////////////////////
        if ( $('.close').length ) {
            $('.close').on('click', function(e) {
                e.preventDefault();

                var $self = $(this);
                var $dismiss = $($self.attr('data-dismiss'));

                $dismiss.remove();
            });
        }

        //////////////////////////////////////////////////
        // Not link Click event
        //////////////////////////////////////////////////
        if ( $('[data-url]').length ) {
            $('[data-url]').on('click', function(e) {
                e.stopPropagation();

                var url = $(this).attr('data-url');

                if (url != '')
                    window.location.href = url; 
            });
        }

        //////////////////////////////////////////////////
        // Tooltip init
        //////////////////////////////////////////////////
        $('[data-toggle="tooltip"]').tooltip();

        //////////////////////////////////////////////////
        // Dynamically define header space
        //////////////////////////////////////////////////
        function calculateHeaderSpace() {
            const height = $("#header-wrapper").height() < 145 ? 145 : $("#header-wrapper").height();
            
            if ($("body.header-banner-shown.header-type-transparent .hero").length > 0) {
                $("body.header-banner-shown.header-type-transparent .hero").css({'padding-top': height});
            }

            if ($('body.header-banner-shown.header-type-transparent .page-header').length > 0) {
                $("body.header-banner-shown.header-type-transparent .page-header").css({'padding-top': height});
            }
        }

        calculateHeaderSpace();

        $(window).resize(() => {
            calculateHeaderSpace();
        });
    });

    $(window).load(function() {

		//////////////////////////////////////////////////
        // Inspiration popup with magnific
        //////////////////////////////////////////////////

        if ( $('.inspiration-popup').length ) {
            $('.inspiration-popup').magnificPopup({
                type: 'image',
				closeOnContentClick: false,
                mainClass: 'mfp-img-mobile',
                image: {
					verticalFit: false,
					markup: '<div class="mfp-figure">'+
						'<div class="mfp-close"></div>'+
						'<div class="mfp-bottom-bar">'+
						'<div class="mfp-title"></div>'+
						'<div class="mfp-counter"></div>'+
						'</div>'+
						'<div class="mfp-img"></div>'+
					'</div>',
					// titleSrc: function(item) {
					// 	return '<span>' + item.el.attr('title').replace( /,/g, '</span><span>' ) + '</span>';
					// }
                }                
            });
        }

        //////////////////////////////////////////////////
        // Init & Filter Masonry grid items using Isotope
        //////////////////////////////////////////////////

        if ( $('.masonry-grid-images').length ) {

            var $grid = $('.masonry-grid-images').isotope({
                itemSelector: '.masonry-grid-item',
                layoutMode: 'masonry'
			});

            var iso = $grid.data('isotope');

			$('body').on( 'click', '.filter-span', function() {
				var slug = $(this).data('insp-filt');
				var tax = $(this).data('insp-tax');
				console.log(slug, tax);
				$('.filter-select').val('').trigger('change');
				$('.filter-select[data-filter="' + tax + '"]').val( slug ).trigger('change');
				$.magnificPopup.close();
			});

            $('.filter-select').on('change', inspFiltersChange );

			function inspFiltersChange() {
				var filter = '';
                var filter_by_channels = $('.filter-select[data-filter="channels"]').val();
                var filter_by_industries = $('.filter-select[data-filter="industries"]').val();
                var filter_by_merchants = $('.filter-select[data-filter="merchants"]').val();
                var filter_by_campaigns = $('.filter-select[data-filter="campaigns"]').val();
                var $grid_wrapper = $('.masonry-grid-wrapper');

                if ($grid_wrapper.hasClass('masonry-grid-no-images'))
                    $grid_wrapper.removeClass('masonry-grid-no-images');

                if (filter_by_channels != '')
                    filter += '.' + filter_by_channels;

                if (filter_by_industries != '')
                    filter += '.' + filter_by_industries;

                if (filter_by_merchants != '')
                    filter += '.' + filter_by_merchants;

                if (filter_by_campaigns != '')
                    filter += '.' + filter_by_campaigns;

                // filter = filter.slice(0, -1);

                $grid.isotope({ filter: filter });

                var filtered_count = iso.filteredItems.length;

                if (filtered_count == 0) {
                    $grid_wrapper.addClass('masonry-grid-no-images');
                }
			}
	

			//****************************
			// Isotope Load more button
			//****************************
			var initShow = 10; //number of items loaded on init & onclick load more button
			var counter = initShow; //counter for load more button
			var iso = $grid.data('isotope'); // get Isotope instance

			loadMore(initShow); //execute function onload

			function loadMore(toShow) {
				$grid.find(".hidden").removeClass("hidden");

				var hiddenElems = iso.filteredItems.slice(toShow, iso.filteredItems.length).map(function(item) {
					return item.element;
				});
				$(hiddenElems).addClass('hidden');
				$grid.isotope('layout');

				//when no more to load, hide show more button
				if ($('.masonry-grid-images').find(".hidden").length == 0) {
					$('.insp_load_more').hide();
				} else {
					$('.insp_load_more').show();
				};

			}

			//when load more button clicked
			$('.insp_load_more').on('click', function() {
				if ($('.filter-select').data('clicked')) {
					//when filter button clicked, set initial value for counter
					counter = initShow;
					$('.filter-select').data('clicked', false);
				} else {
					counter = counter;
				};

				counter = counter + initShow;

				loadMore(counter);
			});

			//when filter button clicked
			$(".filter-select").on('change', function() {
				$(this).data('clicked', true);

				loadMore(initShow);
			});

            // Reset Filters
            $('#reset_filters').on('click', function(e) {
                e.preventDefault();

                $('.filter-select[data-filter="channels"]').val('');
                $('.filter-select[data-filter="industries"]').val('');
                $('.filter-select[data-filter="merchants"]').val('');
                $('.filter-select[data-filter="campaigns"]').val('');

                inspFiltersChange();
                loadMore(initShow);
            });

        }

    });

}(jQuery));


// Generic cookie functions
function setCookie(cname, cvalue, exdays) {
	var d = new Date();
	d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
	var expires = "expires="+d.toUTCString();
	document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
	var name = cname + "=";
	var ca = document.cookie.split(';');
	for(var i = 0; i < ca.length; i++) {
	var c = ca[i];
	while (c.charAt(0) == ' ') {
		c = c.substring(1);
	}
	if (c.indexOf(name) == 0) {
		return c.substring(name.length, c.length);
	}
	}
	return "";
}
  