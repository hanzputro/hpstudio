/**
 * Custom scripts needed for the colorpicker, image button selectors,
 * and navigation tabs.
 */

jQuery(document).ready(function($) {

	// Loads the color pickers
	$('.of-color').wpColorPicker();

	// Image Options
	$('.of-radio-img-img').click(function(){
		$(this).parent().parent().find('.of-radio-img-img').removeClass('of-radio-img-selected');
		$(this).addClass('of-radio-img-selected');
	});

	$('.of-radio-img-label').hide();
	$('.of-radio-img-img').show();
	$('.of-radio-img-radio').hide();

	// Loads tabbed sections if they exist
	if ( $('.nav-tab-wrapper').length > 0 ) {
		options_framework_tabs();
	}

	function options_framework_tabs() {

		var $group = $('.group'),
			$navtabs = $('.nav-tab-wrapper a'),
			active_tab = '';

		// Hides all the .group sections to start
		$group.hide();

		// Find if a selected tab is saved in localStorage
		if ( typeof(localStorage) != 'undefined' ) {
			active_tab = localStorage.getItem('active_tab');
		}

		// If active tab is saved and exists, load it's .group
		if ( active_tab != '' && $(active_tab).length ) {
			$(active_tab).fadeIn();
			$(active_tab + '-tab').addClass('nav-tab-active');
		} else {
			$('.group:first').fadeIn();
			$('.nav-tab-wrapper a:first').addClass('nav-tab-active');
		}

		// Bind tabs clicks
		$navtabs.click(function(e) {

			e.preventDefault();

			// Remove active class from all tabs
			$navtabs.removeClass('nav-tab-active');

			$(this).addClass('nav-tab-active').blur();

			if (typeof(localStorage) != 'undefined' ) {
				localStorage.setItem('active_tab', $(this).attr('href') );
			}

			var selected = $(this).attr('href');

			$group.hide();
			$(selected).fadeIn();

		});
	}


    function datetime(){
        // datetimepciker only date
        jQuery('.fielddate').datetimepicker({
            timepicker:false,
            format:'d/M/Y'
        });

        // datetimepciker only time
        jQuery('.fieldtime').datetimepicker({
            datepicker:false,
            format:'H:i'
        });
    }
    datetime();


	// repeat field
	jQuery(function($){
        $(".docopy").on("click", function(e){

            // the loop object
            $loop = $(this).parent();

            // the group to copy
            $group = $loop.find('.to-copy').clone().insertBefore($(this)).removeClass('to-copy');

            // the new input
            $input = $group.find('input');            
            count = $loop.children('.of-repeat-group').not('.to-copy').length;

        	input_name = $input.attr('data-rel');
        	$input.attr('name', input_name + '[' + ( count - 1 ) + ']');

        });

        $(".controls").on("click", ".dodelete", function(e){
            $(this).parent('.of-repeat-group').remove();
        });
    });

    // repeat gallery
	jQuery(function($){
        $(".gallery-add").on("click", function(e){

            // the loop object
            $loop = $(this).parent();

            // the group to copy
            $group = $loop.find('.to-copy').clone().insertBefore($(this)).removeClass('to-copy');

            // the new input
            $input = $group.find('.fieldinput');
            $textarea = $group.find('.fieldtextarea');
            $input2 = $group.find('.fieldinput2');
            $input3 = $group.find('.fieldinput3');
            $date = $group.find('.fielddate');
            $time = $group.find('.fieldtime');
            $image = $group.find('.fieldimage');

            count = $loop.children('.gallery-each').not('.to-copy').length;

        	input_name = $input.attr('data-rel');
        	textarea_name = $textarea.attr('data-rel');
        	input2_name = $input2.attr('data-rel');
            input3_name = $input3.attr('data-rel');
            date_name = $date.attr('data-rel');
            time_name = $time.attr('data-rel');
            image_name = $image.attr('data-rel');

        	$input.attr('name', input_name + '[' + ( count - 1 ) + ']');
        	$textarea.attr('name', textarea_name + '[' + ( count - 1 ) + ']');
        	$input2.attr('name', input2_name + '[' + ( count - 1 ) + ']');
            $input3.attr('name', input3_name + '[' + ( count - 1 ) + ']');
            $date.attr('name', date_name + '[' + ( count - 1 ) + ']');
            $time.attr('name', time_name + '[' + ( count - 1 ) + ']');
            $image.attr('name', image_name + '[' + ( count - 1 ) + ']');

            datetime();

        });

        $(".controls").on("click", ".gallery-remove", function(e){

            var toCopy = $(this).parents().find('.to-copy');
        	var input_name = toCopy.find('.fieldinput').attr('data-rel');
        	var textarea_name = toCopy.find('.fieldtextarea').attr('data-rel');
        	var input2_name = toCopy.find('.fieldinput2').attr('data-rel');
            var input3_name = toCopy.find('.fieldinput3').attr('data-rel');
            var date_name = toCopy.find('.fielddate').attr('data-rel');
            var time_name = toCopy.find('.fieldtime').attr('data-rel');
            var image_name = toCopy.find('.fieldimage').attr('data-rel');

            var notCopy = $(this).parents('of-repeat-loop').find('.gallery-each').not('.to-copy');            

            var eachwrapper = $(this).parents('of-repeat-loop');
            var toeach = $(this).parent().attr('class');

        	var count = $(this).parents('.of-repeat-loop').find('.gallery-each').not('.to-copy, .is-delete').length-1;
        	$(this).parent().addClass('is-delete').find('.fieldinput').attr('name', input_name + '[' +count+ ']');

        	var i=0;
            $(this).parents('.of-repeat-loop').find('.gallery-each').not('.to-copy, .is-delete').each(function(){
            		$(this).find('.fieldinput').attr('name', input_name + '[' + i + ']');
            		$(this).find('.fieldtextarea').attr('name', textarea_name + '[' + i + ']');
            		$(this).find('.fieldinput2').attr('name', input2_name + '[' + i + ']');
                    $(this).find('.fieldinput3').attr('name', input3_name + '[' + i + ']');
                    $(this).find('.fielddate').attr('name', date_name + '[' + i + ']');
                    $(this).find('.fieldtime').attr('name', time_name + '[' + i + ']');
                    $(this).find('.fieldimage').attr('name', image_name + '[' + i + ']');
            		// console.log(this);
            		// console.log(i);
            	i++
            });			

           	if( count > 1 ){
           	 	$(this).parent('.gallery-each').remove();        		
           	}else{
           		$(this).parent('.gallery-each').remove();
                $('.gallery-remove').remove();
           	}

        });
    });


});