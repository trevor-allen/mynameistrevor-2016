<?php
/**
 * Unicode functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Unicode
 */

if (!function_exists('uc_setup')): /**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */ 
    function uc_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Unicode, use a find and replace
         * to change 'uc' to the name of your theme in all the template files.
         */
        load_theme_textdomain('uc', get_template_directory() . '/languages');
        
        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');
        
        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');
        
        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');
        
        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => esc_html__('Primary', 'uc')
        ));
        
        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption'
        ));
        
        /*
         * Enable support for Post Formats.
         * See https://developer.wordpress.org/themes/functionality/post-formats/
         */
        add_theme_support('post-formats', array(
            'aside',
            'image',
            'video',
            'quote',
            'link'
        ));
        
    }
endif;

add_action('after_setup_theme', 'uc_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function uc_content_width()
{
    $GLOBALS['content_width'] = apply_filters('uc_content_width', 640);
}
add_action('after_setup_theme', 'uc_content_width', 0);

/**
 * Enqueue scripts and styles.
 */
function uc_scripts()
{
    wp_enqueue_style('uc-style', get_stylesheet_uri());
    
    wp_enqueue_script('uc-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true);
    
    wp_enqueue_script('uc-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true);
    
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'uc_scripts');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Theme Customizer 
 */

function mytheme_customize_register($wp_customize)
{
    //All our sections, settings, and controls will be added here
    
    //Primary Color
    $wp_customize->add_setting('primary_color', array(
        'default' => '#000000',
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array(
        'label' => __('Primary Color', 'mytheme'),
        'section' => 'colors',
        'settings' => 'primary_color'
    )));
    
    //Site description 
    $wp_customize->add_setting('primary_description', array(
        'default' => 'This is a sample description. If you\'re and admin change this in the Theme Customizer',
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'primary_description', array(
        'label' => __('Primary Description', 'mytheme'),
        'section' => 'title_tagline',
        'settings' => 'primary_description',
        'type' => 'textarea'
    )));
    
    //Google Analytics
    $wp_customize->add_setting('google_analytics', array(
        'default' => null,
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_section('mytheme_analytics_section', array(
        'title' => __('Analytics', 'mytheme'),
        'priority' => 80
    ));
    
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'google_analytics', array(
        'label' => __('Google Analytics ID', 'mytheme'),
        'description' => __('e.g. UA-XXXXX-X', 'mytheme'),
        'section' => 'mytheme_analytics_section',
        'settings' => 'google_analytics',
        'type' => 'text'
    )));
    
    //Mailchimp
    $wp_customize->add_setting('email_subscribe_embed', array(
        'default' => null,
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_setting('email_subscribe_title', array(
        'default' => null,
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_section('mytheme_email_embed_section', array(
        'title' => __('Email Subscribe', 'mytheme'),
        'priority' => 80
    ));
    
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'email_subscribe_title', array(
        'label' => __('Title', 'mytheme'),
        'section' => 'mytheme_email_embed_section',
        'settings' => 'email_subscribe_title',
        'type' => 'text',
        'priority' => 10
    )));
    
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'email_subscribe_embed', array(
        'label' => __('Subscribe embed code', 'mytheme'),
        'description' => __('Copy & paste your embed code. (For MailChimp: Lists -> Embedded forms -> Superslim Form)', 'mytheme'),
        'section' => 'mytheme_email_embed_section',
        'settings' => 'email_subscribe_embed',
        'type' => 'textarea'
    )));
    
    //Removing unneccessary 
    //$wp_customize->remove_control('blogdescription');
    
}

add_action('customize_register', 'mytheme_customize_register');

// Change WordPress Admin footer

function remove_footer_admin()
{
    
    $embedcode = "<a href='https://twitter.com/share' class='twitter-share-button'{count} data-url='http://udarajay.com/themes/unicode' data-text='I use Unicode! An Ultra-Minimal, High-Performance, Premium WordPress Theme that just works!' data-via='UJZEEE' data-related='ujzeee' data-hashtags='unicode'>Tweet</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>";
    
    $followembedcode = "<a href='https://twitter.com/UJZEEE' class='twitter-follow-button' style='display:inline-block;' data-show-count='false'>Follow @UJZEEE</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>";
    
    echo 'Fueled by <a href="http://www.wordpress.org" target="_blank">WordPress</a> | Theme handcrafted by <a href="http://udarajay.com" target="_blank">Udara Jay</a> ' . $followembedcode . ' or ' . $embedcode . '</p>';
    
}

add_filter('admin_footer_text', 'remove_footer_admin');

//Initialize the update checker.
require 'inc/theme-update-checker.php';
$update_checker = new ThemeUpdateChecker('unicode', 'http://udarajay.com/themes/unicode/updates/info.json');
