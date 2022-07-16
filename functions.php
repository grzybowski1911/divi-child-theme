<?php
function my_theme_enqueue_styles() {
 
    $parent_style = 'parent-style';
 
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ), wp_get_theme()->get('Version'));
    wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/js/custom.js', array( 'jquery' ) ); 
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

// Allow SVG uploads

function allow_svgimg_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'allow_svgimg_types');

// Allow WebP uploads

function allow_webpimg_types($mimes) {
  $mimes['webp'] = 'image/webp+xml';
  return $mimes;
}
add_filter('upload_mimes', 'allow_webpimg_types');


// global options - ben grzybowski 

add_action('admin_menu', 'add_global_custom_options'); 

function add_global_custom_options() {
    add_options_page('Global Custom Options', 'Global Custom Options', 'manage_options', 'functions','global_custom_options');
}

function global_custom_options()
{
?>
    <div class="wrap">
        <h2>Global Custom Options</h2>
        <form method="post" action="options.php">
            <?php wp_nonce_field('update-options') ?>
            <p>Settings for the global options across the site.</p>
            <p><strong>Business Name:</strong><br />
                <input type="text" name="business" size="45" value="<?php echo get_option('business'); ?>" />
            </p>
            <p><strong>Additional Second Menu Content (appears next to phone number and email when secondary nav is active):</strong><br />
                <input type="text" name="top_header_add" size="45" value="<?php echo get_option('top_header_add'); ?>" />
            </p>
            <p><strong>Linkedin Link:</strong><br />
                <input type="text" name="linkedin_link" size="45" value="<?php echo get_option('linkedin_link'); ?>" />
            </p>
            <p><strong>Youtube Link:</strong><br />
                <input type="text" name="youtube_link" size="45" value="<?php echo get_option('youtube_link'); ?>" />
            </p>
            <p><strong>Houzz Link:</strong><br />
                <input type="text" name="houzz_link" size="45" value="<?php echo get_option('houzz_link'); ?>" />
            </p>
            <p><strong>Seak Link:</strong><br />
                <input type="text" name="seak_link" size="45" value="<?php echo get_option('seak_link'); ?>" />
            </p>
            <p><strong>Pinterest Link:</strong><br />
                <input type="text" name="pin_link" size="45" value="<?php echo get_option('pin_link'); ?>" />
            </p>
            <p><strong>Linktree Link:</strong><br />
                <input type="text" name="linktree_link" size="45" value="<?php echo get_option('linktree_link'); ?>" />
            </p>
            <!--- <p><strong>WYSIWYG Content:</strong><br /> -->
            <!---< ?php
                $content = get_option('special_content');
                wp_editor( $content, 'special_content', $settings = array('textarea_rows'=> '10') );
            ?>-->
            <p><input type="submit" name="Submit" value="Save" /></p>
            <input type="hidden" name="action" value="update" />
            <input type="hidden" name="page_options" value="linktree_link,linkedin_link,youtube_link,special_content,business,houzz_link,seak_link,pin_link,top_header_add" />
        </form>
    </div>
<?php
}

// disable gutenberg - ben grzybowski 

add_filter('use_block_editor_for_post', '__return_false', 10);

add_filter('use_block_editor_for_post_type', '__return_false', 10);


// customize login page

function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/site-login-logo.png);
		    height:200px;
		    width:200px;
		    background-size: 200px 200px;
		    background-repeat: no-repeat;
        	padding-bottom: 30px;
        }
        #login a, #login p, .login #nav a, .login #nav p {
            color: white !important;
        }
        .login #login_error, .login .message, .login .success {
            background: rgb(27,28,39) !important;
            border-left: 4px solid #27c9b8 !important;
            color: white !important;
        }
        .login form {
            border-radius: 20px;
            background: rgb(27,28,39) !important;
            color: white !important;
            border: none !important;
        }
        .wp-core-ui .button-primary {
            background: #27c9b8 !important;
            border: none !important;
        }
        .bg-video {
            background-size: cover;
            position: absolute;
            bottom: 0;
            left: 0;
            height: 100%;
            width: 100%;
            z-index: -1;
            overflow: hidden;
        }
    </style>
<?php }

add_action( 'login_enqueue_scripts', 'my_login_logo' );

function new_logo_login_url($url) {
    return 'https://advantagemediapartners.com/';
}

add_filter( 'login_headerurl', 'new_logo_login_url' );

// Display current year 
function year_shortcode() {
    $year = date_i18n('Y');
    return $year; } 
add_shortcode('year', 'year_shortcode');

// customized social icon module 

function custom_social_setup() {
	get_template_part( 'includes/builder/module/customSocialMediaFollowItem' );
	$custom_social = new custom_ET_Builder_Module_Social_Media_Follow_Item;
	remove_shortcode( 'et_pb_social_media_follow_network' );
	add_shortcode( 'et_pb_social_media_follow_network', array( $custom_social, '_render' ) );
}
add_action( 'et_builder_ready', 'custom_social_setup' );

// Practice years
function exp_years_shortcode($atts) {
    $startYear = $atts['start-year'];
    $currentYear = date_i18n('Y');
    $yearsIn = $currentYear - $startYear;
    return $yearsIn; } 
add_shortcode('exp', 'exp_years_shortcode');