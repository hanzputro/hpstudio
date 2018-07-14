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
		'dateday' => '',
		'datemonth' => '',
		'dateyear' => '',
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

	// link
	$Homeurl = get_site_url(null, '', 'https');

	// for repeatable
	$prefix = 'custom_';

	$options = array();

	/* ############################ */
	/* ####### TUTORIAL tab ####### */
	/* ############################ */
	$options[] = array(
		'name' => __( 'Tutorial', 'theme-textdomain' ),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __( 'Header Navigation', 'theme-textdomain' ),
		'type' => 'info',
		'desc' => '- Go to <b>Posts</b> > <b>Add New</b>,<br>
		- Input <b>Title</b> and <b>Content</b>,<br>
		- Check <b>"Navbar"</b> in categories section,<br>
		- Click "<b>Publish</b>" button to publish the navigation content in header,<br>
		- then you can view in header at <a href="../" target="_blank"><b>home page.</b></a>
		<br><br><br>'
	);

	$options[] = array(
		'name' => __( 'Product', 'theme-textdomain' ),
		'type' => 'info',
		'desc' => '- Go to <b>Posts</b> > <b>Add New</b>,<br>
		- Input <b>Title</b> and <b>Content</b>,<br>
		- Check <b>"Product"</b> in categories section,<br>
		- Click "<b>Publish</b>" button to publish the product content in header,<br>
		- then you can view in header at <a href="../" target="_blank"><b>home page.</b></a>
		<br><br><br>'
	);

	$options[] = array(
		'name' => __( 'News', 'theme-textdomain' ),
		'type' => 'info',
		'desc' => '- Go to <b>Posts</b> > <b>Add New</b>,<br>
		- Input <b>Title</b> and <b>Content</b>,<br>
		- Check <b>"News"</b> in categories section,<br>
		- Input thumbnail image for the news, Click "<b>Featured Image</b>" > "<b>Upload</b> > <b>Select Files</b> or pick image in <b>Media Library</b> if already exist",<br>
		- Click "<b>Publish</b>" button to publish the news content,<br>
		- then you can view in <a href="../news" target="_blank"><b>news page</b></a> (left side).
		<br><br><br>'
	);

	$options[] = array(
		'name' => __( 'Special News', 'theme-textdomain' ),
		'type' => 'info',
		'desc' => '- Go to <b>Posts</b> > <b>Add New</b>,<br>
		- Input <b>Title</b> and <b>Content</b>,<br>
		- Check <b>"Special News"</b> in categories section,<br>
		- Input thumbnail image for the news, Click "<b>Featured Image</b>" > "<b>Upload</b> > <b>Select Files</b> or pick image in <b>Media Library</b> if already exist",<br>
		- Click "<b>Publish</b>" button to publish the special news content,<br>
		- then you can view in <a href="../" target="_blank"><b>home page</b></a> or <a href="../news" target="_blank"><b>news page</b></a> (right side).
		<br><br><br>'
	);	

	$options[] = array(
		'name' => __( 'Edit/ Delete Posts', 'theme-textdomain' ),
		'type' => 'info',
		'desc' => '- Go to <b>Posts</b> > <b>All post</b> > <b>Edit</b>/ <b>Trash</b>
		<br><br><br>'
	);

	$options[] = array(
		'name' => __( 'Add/ Edit Category', 'theme-textdomain' ),
		'type' => 'info',
		'desc' => '- Go to <b>Posts</b> > <b>Categories</b>,<br>
		- Add/edit <b>Category</b>,<br>
		- input name, slug, and Choose <b>Parent category</b>,<br>
		- Input thumbnail image for the category, Click "<b>add Category Image</b>" > "<b>Upload</b> > <b>Select Files</b> or pick image in <b>Media Library</b> if already exist",<br>
		- Click "<b>Add New Category</b>" button to add the Category.'
	);


	/* ######################## */
	/* ####### MAIN tab ####### */
	/* ######################## */
	$options[] = array(
		'name' => __( 'Main', 'theme-textdomain' ),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __( 'Logo Header', 'theme-textdomain' ),
		'type' => 'info'
	);
	$options[] = array(
		'name' => __( '', 'theme-textdomain' ),
		'std' => $imagepath . '/logo-dealerhinobekasi.jpg',
		'id' => 'header-logo',
		'type' => 'upload'
	);

	$options[] = array(
		'name' => __( 'More Info', 'theme-textdomain' ),
		'type' => 'info'
	);
	$options[] = array(
		'name' => __( '', 'theme-textdomain' ),
		'id' => 'header-mi',
		'std' => 'Hubungi : 0812 1346 830 (Hafidz)',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Main Banner', 'theme-textdomain' ),
		'type' => 'info'
	);
	$options[] = array(
		'name' => __( '', 'theme-textdomain' ),
		'std' => $imagepath . '/banner.jpg',
		'id' => 'home-banner',
		'type' => 'upload'
	);

	$options[] = array(
		'name' => __( 'Map Link', 'theme-textdomain' ),
		'type' => 'info'
	);
	$options[] = array(
		'name' => __( '', 'theme-textdomain' ),
		'id' => 'sidebar-map',
		'std' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.946090793215!2d107.08665361431369!3d-6.2708200954611835!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698fed5b83298b%3A0x3f8afd0a290aec81!2sPT.HUDAYA+MAJU+MANDIRI!5e0!3m2!1sen!2sid!4v1518844088232',
		'type' => 'textarea'
	);

	$options[] = array(
		'name' => __( 'Copyright Footer', 'theme-textdomain' ),
		'type' => 'info'
	);
	$options[] = array(
		'name' => __( '', 'theme-textdomain' ),
		'id' => 'footer-cc',
		'std' => '© Dealer Hino Jabotabek. All Right Served.',
		'type' => 'text'
	);

	return $options;
}