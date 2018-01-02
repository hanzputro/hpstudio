<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
function optionsframework_option_name() {
	// Change this to use your theme slug
	return 'options-framework-theme';
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'theme-textdomain'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __( 'One', 'theme-textdomain' ),
		'two' => __( 'Two', 'theme-textdomain' ),
		'three' => __( 'Three', 'theme-textdomain' ),
		'four' => __( 'Four', 'theme-textdomain' ),
		'five' => __( 'Five', 'theme-textdomain' )
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __( 'French Toast', 'theme-textdomain' ),
		'two' => __( 'Pancake', 'theme-textdomain' ),
		'three' => __( 'Omelette', 'theme-textdomain' ),
		'four' => __( 'Crepe', 'theme-textdomain' ),
		'five' => __( 'Waffle', 'theme-textdomain' )
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '12px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Gallery Defaults
	$gallery_defaults = array(
		'input' => '',
		'textarea' => '',
		'input2' => '',
		'input3' => '',
		'date' => '',
		'time' => '',
		'image' => '' 
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages( 'sort_column=post_parent,menu_order' );
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/dist/images';

	// for repeatable
	$prefix = 'custom_';

	$options = array();


	/* ######################## */
	/* ####### HOME tab ####### */
	/* ######################## */

	// main

	$options[] = array(
		'name' => __( 'Main', 'theme-textdomain' ),
		'type' => 'heading'
	);

	// $options[] = array(
	// 	'name' => __( 'HEADER', 'theme-textdomain' ),
	// 	'type' => 'info'
	// );

	// $options[] = array(
	// 	'name' => __( 'Logo', 'theme-textdomain' ),
	// 	'std' => $imagepath . '/logo-ccw-black.png',
	// 	'id' => 'logo',
	// 	'type' => 'upload'
	// );

	$options[] = array(
		'name' => __( 'FOOTER', 'theme-textdomain' ),
		'type' => 'info'
	);
	$options[] = array(
		'name' => __( 'Creative Community Link', 'theme-textdomain' ),
		'id' => 'footer-cc-link',
		'std' => '',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'Services Link', 'theme-textdomain' ),
		'id' => 'footer-s-link',
		'std' => '',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'Get Connected Link', 'theme-textdomain' ),
		'id' => 'footer-gc-link',
		'std' => '',
		'type' => 'text'
	);

	// section 1	

	$options[] = array(
		'name' => __( 'Home', 'theme-textdomain' ),
		'type' => 'heading'
	);
	$options[] = array(
		'name' => __( 'SECTION 1', 'theme-textdomain' ),
		'type' => 'info'
	);
	$options[] = array(
		'name' => __( 'Background', 'theme-textdomain' ),
		'std' => $imagepath . '/home/bg-section1.jpg',
		'id' => 'home-sec1-bg',
		'type' => 'upload'
	);

	// section 2
	$options[] = array(
		'name' => __( 'SECTION 2', 'theme-textdomain' ),
		'type' => 'info'
	);
	$options[] = array(
		'name' => __( 'Title', 'theme-textdomain' ),
		'id' => 'home-sec2-title',
		'std' => 'Come As You Are',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'Image', 'theme-textdomain' ),
		'std' => $imagepath . '/home/section2-thumb.jpg',
		'id' => 'home-sec2-img',
		'type' => 'upload'
	);
	$options[] = array(
		'name' => __( 'Description', 'theme-textdomain' ),
		'id' => 'home-sec2-desc',		
		'std' => 'Pastor Walter is our lead pastor. Creative City Worship lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.',
		'type' => 'textarea'
	);

	// section 3
	$options[] = array(
		'name' => __( 'SECTION 3', 'theme-textdomain' ),
		'type' => 'info'
	);	
	$options[] = array( 
		'name' => __( 'News Slider', 'theme-textdomain' ),
		'id' => "home-sec3-newsslider",
		'std' => $gallery_defaults,
		'type' => 'gallery'
	);

	// section 4
	$options[] = array(
		'name' => __( 'SECTION 4', 'theme-textdomain' ),
		'type' => 'info'
	);
	$options[] = array(
		'name' => __( 'Title', 'theme-textdomain' ),
		'id' => 'home-sec4-title',
		'std' => 'Upcoming Events',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'Description', 'theme-textdomain' ),
		'id' => 'home-sec4-desc',
		'std' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.',
		'type' => 'textarea'
	);
	$options[] = array(
		'name' => __( 'News', 'theme-textdomain' ),
		'id' => "home-sec4-news",
		'std' => $gallery_defaults,
		'type' => 'gallery'
	);

	// section 5
	$options[] = array(
		'name' => __( 'SECTION 5', 'theme-textdomain' ),
		'type' => 'info'
	);
	$options[] = array(
		'name' => __( 'Title', 'theme-textdomain' ),
		'id' => 'home-sec5-title',
		'std' => 'Upcoming Events',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'Description', 'theme-textdomain' ),
		'id' => 'home-sec5-desc',
		'std' => 'ARTOTEL - Thamrin
JL. Sunda No.3,
Jakarta Pusat

creativecityworship@gmail.com
@creativecityworship',
		'type' => 'textarea'
	);


	/* ########################### */
	/* ####### SERVICE tab ####### */
	/* ########################### */
	$options[] = array(
		'name' => __( 'Service', 'theme-textdomain' ),
		'type' => 'heading'
	);
	$options[] = array(
		'name' => __( 'OUR SERVICE', 'theme-textdomain' ),
		'type' => 'info'
	);
	$options[] = array(
		'name' => __( 'Title', 'theme-textdomain' ),
		'id' => 'service-title1',
		'std' => 'Our Services',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'Description', 'theme-textdomain' ),
		'id' => 'service-desc1',
		'std' => 'Kami punya ibadah hari minggu, Ibadah anak-anak atau Creative Kids dan Creative Community',
		'type' => 'textarea'
	);
	$options[] = array(
		'name' => __( 'SUNDAY SERVICE', 'theme-textdomain' ),
		'type' => 'info'
	);
	$options[] = array(
		'name' => __( 'Title', 'theme-textdomain' ),
		'id' => 'service-title2',
		'std' => 'Sunday Service',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'Description', 'theme-textdomain' ),
		'id' => 'service-desc2',
		'std' => 'Pastor Walter is our lead pastor. Creative City Worship lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.',
		'type' => 'textarea'
	);
	$options[] = array(
		'name' => __( 'Gallery', 'theme-textdomain' ),
		'id' => 'service-image',
		'type' => 'repeat_upload'
	);	



	/* ############################## */
	/* ####### WHO WE ARE tab ####### */
	/* ############################## */
	$options[] = array(
		'name' => __( 'Who We Are', 'theme-textdomain' ),
		'type' => 'heading'
	);
	$options[] = array(
		'name' => __( 'WHO WE ARE', 'theme-textdomain' ),
		'type' => 'info'
	);
	$options[] = array(
		'name' => __( 'Title', 'theme-textdomain' ),
		'id' => 'whoweare-title',
		'std' => 'Creative City Worship',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'Title', 'theme-textdomain' ),
		'id' => 'whoweare-minititle',
		'std' => 'WHO WE ARE',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'Background', 'theme-textdomain' ),
		'std' => $imagepath . '/home/section2-thumb.jpg',
		'id' => 'whoweare-img',
		'type' => 'upload'
	);
	$options[] = array(
		'name' => __( 'Description', 'theme-textdomain' ),
		'id' => 'whoweare-desc',
		'std' => 'Pastor Walter is our lead pastor. Creative City Worship started with a bunch of people who are passionate about God and passionate to serve others. We strongly believe that our God-given talents should be used to serve the city we are in, so that people can come to know who Jesus is and can worship Him in spirit and in truth.

		We started our first Creative City Worship service on November 10th, 2013 with only 12 members. Having only a small amount of volunteers meant that everyone had to multi-task, and on every Sunday one person could have up to 3 ministries! But this has caused us to grow closer to one another and Sunday service became more than just an ordinary church service - it became our extended family gathering to worship God and rejoice in His presence.

		Ever since then we have had tremendous miracles in the house of God - new members were added, many volunteered to serve, and we have even been given the opportunity to dedicate 4 young children to God and to baptize our first member on Easter Sunday, 20 April 2014.',
		'type' => 'textarea'
	);
	$options[] = array(
		'name' => __( 'OUR VISION', 'theme-textdomain' ),
		'type' => 'info'
	);
	$options[] = array(
		'name' => __( 'Background', 'theme-textdomain' ),
		'std' => $imagepath . '/bg-whoweare.jpg',
		'id' => 'whoweare-bg2',
		'type' => 'upload'
	);
	$options[] = array(
		'name' => __( 'Title', 'theme-textdomain' ),
		'id' => 'whoweare-title2',
		'std' => 'Our Vision',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'Title', 'theme-textdomain' ),
		'id' => 'whoweare-desc2',
		'std' => 'Discovering and Maximizing Our God-Given TALENTS to Serve The CITY We Are In, and to Bring People to WORSHIP God in Spirit and in Truth',
		'type' => 'textarea'
	);
	$options[] = array(
		'name' => __( 'OUR MISSION', 'theme-textdomain' ),
		'type' => 'info'
	);
	$options[] = array(
		'name' => __( 'Title', 'theme-textdomain' ),
		'id' => 'whoweare-title3',
		'std' => 'Our Mission',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'Title', 'theme-textdomain' ),
		'id' => 'whoweare-desc3',
		'std' => 'Love God and Love People',
		'type' => 'textarea'
	);


	/* ############################### */
	/* ####### THE LEADERS tab ####### */
	/* ############################### */
	$options[] = array(
		'name' => __( 'The Leaders', 'theme-textdomain' ),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __( 'The Leaders', 'theme-textdomain' ),
		'type' => 'info'
	);

	// $options[] = array(
	// 	'name' => __( 'Title', 'theme-textdomain' ),
	// 	'id'	=> 'repeat_text',
	// 	'std' => 'Test Multiple',
	// 	'type' => 'repeat_text'
	// );

	$options[] = array(
		'name' => __( 'Title', 'theme-textdomain' ),
		'id' => 'theleaders-title',
		'std' => 'The Leaders',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'Description', 'theme-textdomain' ),
		'id' => 'theleaders-desc',
		'std' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque interdum lorem a volutpat euismod.',
		'type' => 'textarea'
	);

	$options[] = array( 
		'name' => __( 'Commitee Gallery', 'theme-textdomain' ),
		'id' => "service-gallery-commitee",
		'std' => $gallery_defaults,
		'type' => 'gallery'
	);

	$options[] = array( 
		'name' => __( 'Head Of Department Gallery', 'theme-textdomain' ),
		'id' => "service-gallery-hod",
		'std' => $gallery_defaults,
		'type' => 'gallery'
	);



	/* ################################## */
	/* ########## MINISTRY tab ########## */
	/* ################################## */
	$options[] = array(
		'name' => __( 'Ministry', 'theme-textdomain' ),
		'type' => 'heading'
	);
	$options[] = array(
		'name' => __( 'Get Involved', 'theme-textdomain' ),
		'type' => 'info'
	);
	$options[] = array(
		'name' => __( 'Title', 'theme-textdomain' ),
		'id' => 'ministry-gi-title',
		'std' => 'Get Involved',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'Description', 'theme-textdomain' ),
		'id' => 'ministry-gi-desc',
		'std' => "We believe the church is not somewhere you go, it's something you are. We know that God is moving through His church, and we want you to be a part of it. There are several ways you can get involved at Creative City Worship.",
		'type' => 'textarea'
	);
	$options[] = array(
		'name' => __( 'Volunteers', 'theme-textdomain' ),
		'type' => 'info'
	);
	$options[] = array(
		'name' => __( 'Title', 'theme-textdomain' ),
		'id' => 'ministry-v-title',
		'std' => 'Volunteers',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'Description', 'theme-textdomain' ),
		'id' => 'ministry-v-desc',
		'std' => "We believe the church is not somewhere you go, it's something you are. We know that God is moving through His church, and we want you to be a part of it. There are several ways you can get involved at Creative City Worship.",
		'type' => 'textarea'
	);
	$options[] = array(
		'name' => __( 'Background', 'theme-textdomain' ),
		'std' => $imagepath . '/ministry/banner.jpg',
		'id' => 'ministry-v-bg',
		'type' => 'upload'
	);
	$options[] = array(
		'name' => __( 'Media', 'theme-textdomain' ),
		'type' => 'info'
	);
	$options[] = array( 
		'name' => __( 'Ministry Gallery', 'theme-textdomain' ),
		'id' => "ministry-gallery",
		'std' => $gallery_defaults,
		'type' => 'gallery'
	);

	
	/* ############################### */
	/* ########## MEDIA tab ########## */
	/* ############################### */
	$options[] = array(
		'name' => __( 'Media', 'theme-textdomain' ),
		'type' => 'heading'
	);
	$options[] = array(
		'name' => __( 'Media', 'theme-textdomain' ),
		'type' => 'info'
	);
	$options[] = array( 
		'name' => __( 'Media Gallery', 'theme-textdomain' ),
		'id' => "media-gallery",
		'std' => $gallery_defaults,
		'type' => 'gallery'
	);



	/* ############################### */
	/* ######### CONTACT tab ######### */
	/* ############################### */
	$options[] = array(
		'name' => __( 'Contact', 'theme-textdomain' ),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __( 'Contact', 'theme-textdomain' ),
		'type' => 'info'
	);

	$options[] = array(
		'name' => __( 'Title', 'theme-textdomain' ),
		'id' => 'contact-title',
		'std' => 'Creative City Worship',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'Description', 'theme-textdomain' ),
		'id' => 'contact-desc',
		'std' => 'Artotel-Thamrin
Every Sunday at 10AM',
		'type' => 'textarea'
	);

	return $options;
}