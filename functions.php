<?php

/*
Theme Name: CCW (Creative City Worship)
Description: A responsive theme
Version: 1
Author: hanzputro (Hanif Putra)
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Tags: ccw, Creative City Worship, wordpress theme
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
   wp_register_script('jquery2', get_template_directory_uri().'/assets/vendor/jquery/jquery-1.11.3.min.js', '', '') ;
   // wp_register_script('plugins', get_template_directory_uri().'/dist/js/plugins.js', '', '') ;
   // wp_register_script('base', get_template_directory_uri().'/dist/js/scripts.js', '', '') ;

   // wp_enqueue_script( array('jquery', 'jquery2', 'plugins', 'base'));
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
/*                 Form Contact Setup                   */
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

add_theme_support('category-thumbnails');

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