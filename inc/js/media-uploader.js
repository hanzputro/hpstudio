jQuery(document).ready(function($){

	var optionsframework_upload;
	var optionsframework_selector;

	/* ######################################################### */
	/* ################### Add Single Image #################### */
	/* ######################################################### */
	function optionsframework_add_file(event, selector) {

		var upload = $(".uploaded-file"), frame;
		var $el = $(this);
		optionsframework_selector = selector;

		event.preventDefault();

		// If the media frame already exists, reopen it.
		if ( optionsframework_upload ) {
			optionsframework_upload.open();
		} else {
			// Create the media frame.
			optionsframework_upload = wp.media.frames.optionsframework_upload =  wp.media({
				// Set the title of the modal.
				title: $el.data('choose'),

				// Customize the submit button.
				button: {
					// Set the text of the button.
					text: $el.data('update'),
					// Tell the button not to close the modal, since we're
					// going to refresh the page when the image is selected.
					close: false
				}
			});

			// When an image is selected, run a callback.
			optionsframework_upload.on( 'select', function() {
				// Grab the selected attachment.
				var attachment = optionsframework_upload.state().get('selection').first();
				optionsframework_upload.close();
				optionsframework_selector.find('.upload').val(attachment.attributes.url);
				if ( attachment.attributes.type == 'image' ) {
					optionsframework_selector.find('.screenshot').empty().hide().append('<img src="' + attachment.attributes.url + '"><a class="remove-image">Remove</a>').slideDown('fast');
				}
				optionsframework_selector.find('.upload-button').unbind().addClass('remove-file').removeClass('upload-button').val(optionsframework_l10n.remove);
				optionsframework_selector.find('.of-background-properties').slideDown();
				optionsframework_selector.find('.remove-image, .remove-file').on('click', function() {
					optionsframework_remove_file( $(this).parents('.section') );
				});
			});

		}

		// Finally, open the modal.
		optionsframework_upload.open();
	}

	function optionsframework_remove_file(selector) {
		selector.find('.remove-image').hide();
		selector.find('.upload').val('');
		selector.find('.of-background-properties').hide();
		selector.find('.screenshot').slideUp();
		selector.find('.remove-file').unbind().addClass('upload-button').removeClass('remove-file').val(optionsframework_l10n.upload);
		// We don't display the upload button if .upload-notice is present
		// This means the user doesn't have the WordPress 3.5 Media Library Support
		if ( $('.section-upload .upload-notice').length > 0 ) {
			$('.upload-button').remove();
		}
		selector.find('.upload-button').on('click', function(event) {
			optionsframework_add_file(event, $(this).parents('.section'));
		});
	}

	$('.remove-image, .remove-file').on('click', function() {
		optionsframework_remove_file( $(this).parents('.section') );
    });

    $('.upload-button').click( function( event ) {
    	optionsframework_add_file(event, $(this).parents('.section'));
    });




	/* ######################################################### */
	/* ################## Add Multiple Image ################### */
	/* ######################################################### */
	function optionsframework_add_multiple_image(event, selector) {

		var upload = $(".uploaded-file"), frame;
		var $el = $(this);
		optionsframework_selector = selector;

		event.preventDefault();

		// If the media frame already exists, reopen it.
		if ( optionsframework_upload ) {
			optionsframework_upload.open();
		} else {
			// Create the media frame.
			optionsframework_upload = wp.media.frames.optionsframework_upload =  wp.media({
				// Set the title of the modal.
				title: $el.data('choose'),

				// Customize the submit button.
				button: {
					// Set the text of the button.
					text: $el.data('update'),
					// Tell the button not to close the modal, since we're
					// going to refresh the page when the image is selected.
					close: false
				},

				multiple: true //allowing for multiple image selection
			});

			// When an image is selected, run a callback.
			optionsframework_upload.on( 'select', function() {
				// Grab the selected attachment.
				var attachments = optionsframework_upload.state().get('selection').map( function( attachment ) {                 
	                attachment.toJSON();
	                return attachment;
	            });
				optionsframework_upload.close();				
				// console.log(attachments);

				var loop = optionsframework_selector;					
	            var thisBtn = loop.find('.of-repeat-loop .multiple-upload');
	            var count = (loop.find('.of-repeat-loop .multiple-each').length) - 1;

				//loop through the array and do things with each attachment
				for (var i = 0; i < attachments.length; ++i) {	                
		            // the group for get value of data-rel
		            var group = loop.find('.of-repeat-loop .multiple-each.to-copy');
		            
		            var img = group.find('img');
		            var input = group.find('input');
		            var img_name = img.attr('data-rel');
		        	var input_name = input.attr('data-rel');

		        	if (count < 1){
		        		optionsframework_selector.find('.of-repeat-loop').append('<div class="multiple-each">'+
		                	'<img name="'+ input_name +'['+ i +']" src="' + attachments[i].attributes.url + '" >'+
		                	'<input type="hidden" name="'+ input_name +'['+ i +']"  value="'+ attachments[i].attributes.url +'">'+
		                	'<a class="multiple-remove">Remove</a></div>' );
		        	}else{		        		
		        		optionsframework_selector.find('.of-repeat-loop').append('<div class="multiple-each">'+
		                	'<img name="'+ input_name +'['+ count +']" src="' + attachments[i].attributes.url + '" >'+
		                	'<input type="hidden" name="'+ input_name +'['+ count +']"  value="'+ attachments[i].attributes.url +'">'+
		                	'<a class="multiple-remove">Remove</a></div>' );

		        		count++;
		        	}
				}
			});

		}
		// Finally, open the modal.
		optionsframework_upload.open();
	}

	$('.controls').on('click','.multiple-remove', function() {
		$(this).parent().remove();
    });

    $('.multiple-upload').click( function( event ) {
    	optionsframework_add_multiple_image(event, $(this).parents('.section'));
    });





    /* ######################################################### */
	/* ################## Add Gallery Image ################### */
	/* ######################################################### */
	function optionsframework_add_gallery_image(event, selector, selector2) {

		var upload = $(".uploaded-file"), frame;
		var $el = $(this);
		optionsframework_selector = selector;
		thisBtnUpload = selector2;

		event.preventDefault();

		// If the media frame already exists, reopen it.
		if ( optionsframework_upload ) {
			optionsframework_upload.open();
		} else {
			// Create the media frame.
			optionsframework_upload = wp.media.frames.optionsframework_upload =  wp.media({
				// Set the title of the modal.
				title: $el.data('choose'),

				// Customize the submit button.
				button: {
					// Set the text of the button.
					text: $el.data('update'),
					// Tell the button not to close the modal, since we're
					// going to refresh the page when the image is selected.
					close: false
				},

				multiple: false //allowing for multiple image selection
			});

			// When an image is selected, run a callback.
			optionsframework_upload.on( 'select', function() {
				// Grab the selected attachment.
				var attachment = optionsframework_upload.state().get('selection').first();
				optionsframework_upload.close();

				if ( attachment.attributes.type == 'image' ) {
		   			thisBtnUpload.parent().find('img').attr('src', attachment.attributes.url );
		   			thisBtnUpload.parent().find('.fieldimage').attr('value', attachment.attributes.url );
				}

			});

		}
		// Finally, open the modal.
		optionsframework_upload.open();
	}

	// $('.controls').on('click','.multiple-remove', function() {
	// 	$(this).parent().remove();
 //    });

    $('.controls').on('click', '.gallery-upload', function( event ) {
    	optionsframework_add_gallery_image(event, $(this).parent('.section'), $(this));
    });


});