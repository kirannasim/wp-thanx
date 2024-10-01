
(function($) {

	var wpcf7Elm = document.querySelectorAll( '.wpcf7' );

	// Set a sessionId in localStorage
	if (!localStorage.getItem('TAP-id')) {
		const sid = Math.random().toString(36).substr(2, 9);
		localStorage.setItem('TAP-id', sid);
	}
	
	// Track Page View
	const nonce = $("[data-nonce]").data('nonce');
	let sessionId = localStorage.getItem('TAP-id');
	if (sessionId.indexOf('_') === 0) sessionId = sessionId.substring(1);
	const fields = {sessionId: sessionId, url: window.location.href};
	const settings = {action: "autopilot_track", nonce: nonce};
	const data = {...fields, ...settings};
	$.ajax({
		type : "post",
		dataType : "json",
		url : thanxAjax.ajaxurl,
		data : data,
		done: function(response) {
			console.log("AP Tracked", response); 
		}
	});
	
	if (wpcf7Elm) {
		wpcf7Elm.forEach((wpcf7Form) => {
			// Send to AP on form submit
			wpcf7Form.addEventListener( 'wpcf7mailsent', function( event ) {
				console.log("Submitted");
				var form = $(event.target);
				if (form.find('[name="enable-autopilot"]').length > 0) {
					// console.log('AP FORM DETECTED');
					ap_submit(form);

				}
				if (form.find('[name="gate-identifier"]').length > 0) {
			
					// Remove stuff
					$('#cf7-gate').hide();
					$('.cta-box').show();
					$('.guides').removeClass( 'guide-gated' );

				}

			}, false );
		});
	}
	
	$("form").not(".wpcf7-form").submit(function(e) {
		ap_submit($(this), e);
	});
	
	function domainBlock(email) {
		const domainList = [
			'gmail.com',
			'yahoo.com',
			'hotmail.com',
			'msn.com',
			'icloud.com',
			'outlook.com',
		];
	
		let dirty = false;
	
		for (let d = 0; d < domainList.length; d++) {
			if (email.indexOf(domainList[d]) > -1) {
				dirty = true;
			}
		}
	
		return dirty;
	}
	
	$('input[type=email].domainBlock').each((i, e) => {
		const field = $(e);
		field.blur(() => {
			const email = field.val();
			if (domainBlock(email)) {
				field.after('<span class="wpcf7-not-valid-tip" role="alert" aria-hidden="true">Please use your company email address</span>');
			}
		});
		field.focus(() => {
			field.next('span').remove();
		})
	});
	
	function ap_submit(form, event) {
		// const btn = form.find('input[type=submit]');
		// console.log("Submitting", form.find('[name="enable-autopilot"]').length, $("[data-nonce]").length);
		if (form.find('[name="enable-autopilot"]').length > 0 && $("[data-nonce]").length > 0) {
			if (event) event.preventDefault();
			// btn.data('originalValue', btn.val());
			// btn.val("Sending...").addClass('disabled').attr('disabled', 'disabled');
			// console.log("Override form!");
			const nonce = $("[data-nonce]").data('nonce');
			const fieldsOutput = form.serializeArray();
			const fields = {};
			for (var i = 0; i < fieldsOutput.length; i++){
				if (fieldsOutput[i]['name'].indexOf('_wpcf7') === -1) {
					fields[fieldsOutput[i]['name']] = fieldsOutput[i]['value'];
				}
			}
			fields['sessionId'] = localStorage.getItem('TAP-id');
			if (fields['sessionId'].indexOf('_') === 0) fields['sessionId'] = fields['sessionId'].substring(1);
			const settings = {action: "autopilot", nonce: nonce};
			const data = {...fields, ...settings};
			// console.log(data);
			$.ajax({
				type : "post",
				dataType : "json",
				url : thanxAjax.ajaxurl,
				data : data,
				complete: function(response) {
					// console.log(response);
					if (response.status === 200) {
						form.find("label.focus").removeClass( 'focus' );
						form.find("div.item-padding").hide();
						dataLayer.push({'event':'submitForm', 'Event_Value':window.location.href});
						form.find(".wpcf7-response-output").animate({'opacity': 1}, 300);
					}
				}
			});
			return false;
		}
	}
	
})( jQuery );




/*
 *  Content gates
 */
(function($) {
    if ($("[data-thanx-gate]").length === 1) {
        var container = $("[data-thanx-gate]");
        var contain_class = container.data('tg-contain');
        var gate_title = container.data('tg-title');
        var form_name = container.data("tg-elqformname");
        var campaign_id = container.data("tg-campaignid");
        var thank_you_title = container.data("tg-thank-you-title");
        var thank_you_text = container.data("tg-thank-you-text");
        var pdf_override = container.data("tg-pdf-override");
        var disable_pdf = container.data("tg-disable-pdf");
        var gate_title_bg = "";
        if (container.data('tg-image')) gate_title_bg = ' style="background-image: url('+container.data('tg-image')+');"';
        var gate_btn_label = container.data('tg-btnlabel');
		var ap_trigger_id = container.data('ap-trigger-id');
		
		// Populate details
		$("input[name=gate-identifier").val(form_name);
		if ( ap_trigger_id ) {
			var $input = $("<input>", {
				'type': 'hidden',
				'name': 'enable-autopilot',
				'value': '1'
			});
			$('#cf7-gate form').append($input);
			var $input = $("<input>", {
				'type': 'hidden',
				'name': 'trigger-id',
				'value': ap_trigger_id
			});
			$('#cf7-gate form').append($input);
		}

        // wrap required elements
        // var items = container.find('.'+contain_class).not(":first-of-type");
        // items.wrapAll('<div id="gate-blur"></div>');
        // // add gate to blurred area
        // var blur = $("#gate-blur");
        // items.wrapAll('<div class="blur"></div>');
        // // add form surround
        // blur.append('<div id="gate-form"></div>');
        // var gateForm = $("#cf7-gate");
        // add content
        // gateForm.load("/wp-content/themes/thanx-new/_lib/gate-form.php", function() {
            
        //     gateForm.prepend('<div class="title"'+gate_title_bg+'>'+gate_title+'</div>');
        //     $(this).find("button.btn").text(gate_btn_label);
        //     $(this).find("input[type=submit].btn").val(gate_btn_label);
        //     $(this).find("#_tg-thank-you-title").text(thank_you_title);
        //     $(this).find("#_tg-thank-you-text").text(thank_you_text);
        //     if (typeof(pdf_override) !== 'undefined') {
        //         $("#gateSuccess").children("div.pdf-version").children('.btn').remove();
        //         $("#gateSuccess").children("div.pdf-version").append("<a href='"+pdf_override+"' class='btn btn-2 close-gate disable-click' style='min-width: 150px;' target='_blank'>View PDF</a>");
        //     }
        //     if (typeof(disable_pdf) !== 'undefined') {
        //         $("#gateSuccess").children("div.pdf-version").children('.btn-4').remove();
        //     }
            
        //     // Populate details
        //     $("input[name=gate-identifier").val(form_name);

        //     // Submit listener relocated to CF7 functionality
        // });
             
        // $(window).scroll(function() {
        //     var fixed_line_top = blur.offset().top;
        //     var fixed_line_bottom = fixed_line_top + blur.outerHeight() - 40;
        //     var top = $(this).scrollTop() + $("#header").height();
        //     var gate_top = gateForm.offset().top;
        //     var gate_bottom = gateForm.offset().top + gateForm.outerHeight();
            
        //     if (top >= fixed_line_top && !gateForm.hasClass('fixed') && !gateForm.hasClass('stuck')) {
        //         gateForm.addClass('fixed');
        //     } else if (top < fixed_line_top && gateForm.hasClass('fixed')) {
        //         gateForm.removeClass('fixed');
        //     } else if (gate_bottom >= fixed_line_bottom && !gateForm.hasClass('stuck')) {
        //         gateForm.addClass('stuck').removeClass('fixed');
        //     } else if (gate_top > (top + 40) && gateForm.hasClass('stuck')) {
        //         gateForm.removeClass('stuck').addClass('fixed');
        //     }
        // });
    }
})(jQuery);
