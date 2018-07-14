<?php

/*!
Theme Name: HanifPutra
Description: Website themes
Version: 2018
Author: hanzputro (Hanif Putra)
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Tags: Hanif Putra, Front end Developer, Designer, Web Developer, Wordpress Developer, Freelancer, My name hanif putra. Live in bekasi, Indonesia. Iam freelance designer, front-end developer, and web developer. 
*/

/*********************************************************/
/*                      theme setup                      */
/*********************************************************/
function theme_setup() {
   wp_enqueue_style( 'style-name', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'theme_setup' );

function js_setup() {
    wp_register_script( 'jquery','','');
    wp_register_script('jquery2', get_template_directory_uri().'/assets/vendor/jquery/jquery-1.11.3.min.js', '', '');
    // wp_register_script('plugins', get_template_directory_uri().'/dist/js/plugins.js', '', '');
    // wp_register_script('base', get_template_directory_uri().'/dist/js/base.js', '', '');  

    wp_enqueue_script( array('jquery', 'jquery2'));   
}
add_action('wp_enqueue_scripts', 'js_setup');

/*
 * Loads the Options Panel
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
require_once dirname( __FILE__ ) . '/inc/options-framework.php';

// Loads options.php from child or parent theme
$optionsfile = locate_template( 'options.php' );
load_template( $optionsfile );

/*
 * This is an example of how to add custom scripts to the options panel.
 * This one shows/hides the an option when a checkbox is clicked.
 *
 * You can delete it if you not using that option
 */
add_action( 'optionsframework_custom_scripts', 'optionsframework_custom_scripts' );

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function() {

	jQuery('#example_showhidden').click(function() {
  		jQuery('#section-example_text_hidden').fadeToggle(400);
	});

	if (jQuery('#example_showhidden:checked').val() !== undefined) {
		jQuery('#section-example_text_hidden').show();
	}

});
</script>

<?php
}



/**
* Add Google captcha field to Comment form
* By Hanzputro
*/
/*********************************************************/
/*                create excerpt custom                  */
/*********************************************************/
class Excerpt {

  // Default length (by WordPress)
  public static $length = 55;

  // So you can call: my_excerpt('short');
  public static $types = array(
      'short' => 25,
      'regular' => 55,
      'long' => 100
    );

  /**
   * Sets the length for the excerpt,
   * then it adds the WP filter
   * And automatically calls the_excerpt();
   *
   * @param string $new_length 
   * @return void
   * @author Baylor Rae'
   */
  public static function length($new_length = 55) {
    Excerpt::$length = $new_length;

    add_filter('excerpt_length', 'Excerpt::new_length');

    Excerpt::output();
  }

  // Tells WP the new length
  public static function new_length() {
    if( isset(Excerpt::$types[Excerpt::$length]) )
      return Excerpt::$types[Excerpt::$length];
    else
      return Excerpt::$length;
  }

  // Echoes out the excerpt
  public static function output() {
    the_excerpt();
  }

}

// An alias to the class
function my_excerpt($length = 55) {
  Excerpt::length($length);
}

// change [...] from excerpt
function new_excerpt_more( $more ) {
    return '...'; // replace the normal [.....] with a empty string
 }   
 add_filter('excerpt_more', 'new_excerpt_more');



/*********************************************************/
/*             add featured image on post                */
/*********************************************************/
add_theme_support( 'post-thumbnails' );



/*********************************************************/
/*                 numeric pagination                    */
/*********************************************************/
the_posts_pagination( array( 'mid_size'  => 2 ) ); 



/*********************************************************/
/*             category-thumbnails Plugins               */
/*********************************************************/
add_theme_support('category-thumbnails');



// Try change the pre_get_posts filter.
function namespace_add_custom_types( $query ) {
  if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
    $query->set( 'post_type', array(
              'post', 'page'
            ));
    return $query;
   }
}
add_filter( 'pre_get_posts', 'namespace_add_custom_types' );



/*********************************************************/
/*                 Form Contact Setup                    */
/*********************************************************/
// response generation function
$response = "";
$humanValue = $_COOKIE['cookieName'];

//function to generate response
function my_contact_form_generate_response($type, $message){
    global $response;

    if($type == "success"){
      $response = "<div class='field info-success'>{$message}</div>";
    }
    else{
      $response = "<div class='field info-error'>{$message}</div>";
    }
}

//response messages
$not_human       = "Please, I need human.";
$missing_content = "Please supply all information.";
$email_invalid   = "Email Address Invalid.";
$message_unsent  = "Message was not sent. Try Again.";
$message_sent    = "Thanks! Your message has been sent.";

//user posted variables
$name = $_POST['message_name'];
$email = $_POST['message_email'];
$phone = $_POST['phone'];
$message = $_POST['message_text'];
// $human = $_POST['message_human'];

//php mailer variables
$to = get_option('admin_email');
$subject = $name." sent a message from ".get_bloginfo('name');
$content_email = "Phone:" . $phone  . "\r\n" . $message . "\r\n";
$headers = 'From: '. $email . "\r\n" . 'Reply-To: ' . $email . "\r\n";

if (isset($_POST['send--button'])){
    if(empty($name) || empty($message) || empty($email) || empty($phone)){
        my_contact_form_generate_response("error", $missing_content);
    }
    else{
        if($humanValue == 1 ){
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                my_contact_form_generate_response("error", $email_invalid);
            }
            else{
                if(!empty($name) || !empty($message) || !empty($email) || !empty($phone)){
                    $sent = wp_mail($to, $subject, strip_tags($content_email), $headers);
                    if($sent){
                        my_contact_form_generate_response("success", $message_sent); //message sent!
                    } 
                    else{
                        my_contact_form_generate_response("error", $message_unsent); //message wasn't sent
                    }   
                }                
            }     
        }
        else{            
            my_contact_form_generate_response("error", $not_human);
        }
    }
}?>