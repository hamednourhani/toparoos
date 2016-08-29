<?php
/*
Author: Eddie Machado
URL: http://themble.com/itstar/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

// LOAD itstar CORE (if you remove this, the theme will break)
require_once( 'library/itstar.php' );

//setup Kirki plugin for customizing theme
if( class_exists("Kirki") ){
    Kirki::add_config( 'toparoos', array(
        'capability'    => 'edit_theme_options',
        'option_type'   => 'theme_mod',
    ) );
    require_once('library/kirki_options.php');
}

//Include and setup custom metaboxes and fields.
//if( !class_exists("CMB2") ){
//    require_once( dirname(__FILE__)."/library/cmb/init.php" );
//}
    require_once( 'library/cmb-functions.php' );

// CUSTOMIZE THE WORDPRESS ADMIN (off by default)
 //require_once( 'library/admin.php' );

/*********************
LAUNCH itstar
Let's get everything up and running.
*********************/

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Itstar
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once get_template_directory() . '/library/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'itstar_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function itstar_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin bundled with a theme.
		array(
			'name'               => 'Image Widget Plugin', // The plugin name.
			'slug'               => 'image-widget', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/plugins/image-widget.4.2.2.zip', // The plugin source.
			'required'           => true
			),
		array(
			'name'               => 'Kirki', // The plugin name.
			'slug'               => 'kirki', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/plugins/kirki.2.3.6.zip', // The plugin source.
			'required'           => true
			),
//		array(
//			'name'               => 'Redux Framework', // The plugin name.
//			'slug'               => 'redux-framework', // The plugin slug (typically the folder name).
//			'source'             => get_template_directory() . '/plugins/redux-framework.3.6.1.zip', // The plugin source.
//			'required'           => true
//			),
        array(
			'name'               => 'CMB2', // The plugin name.
			'slug'               => 'cmb2', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/plugins/cmb2.zip', // The plugin source.
			'required'           => true
			),


//		array(
//			'name'               => 'TGM Example Plugin', // The plugin name.
//			'slug'               => 'tgm-example-plugin', // The plugin slug (typically the folder name).
//			'source'             => get_template_directory() . '/plugins/tgm-example-plugin.zip', // The plugin source.
//			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
//			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
//			'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
//			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
//			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
//			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
//		),

		// This is an example of how to include a plugin from an arbitrary external source in your theme.
//		array(
//			'name'         => 'TGM New Media Plugin', // The plugin name.
//			'slug'         => 'tgm-new-media-plugin', // The plugin slug (typically the folder name).
//			'source'       => 'https://s3.amazonaws.com/tgm/tgm-new-media-plugin.zip', // The plugin source.
//			'required'     => true, // If false, the plugin is only 'recommended' instead of required.
//			'external_url' => 'https://github.com/thomasgriffin/New-Media-Image-Uploader', // If set, overrides default API URL and points to an external URL.
//			'required'           => false,
//		),
//
//		// This is an example of how to include a plugin from a GitHub repository in your theme.
//		// This presumes that the plugin code is based in the root of the GitHub repository
//		// and not in a subdirectory ('/src') of the repository.
//		array(
//			'name'      => 'Adminbar Link Comments to Pending',
//			'slug'      => 'adminbar-link-comments-to-pending',
//			'source'    => 'https://github.com/jrfnl/WP-adminbar-comments-to-pending/archive/master.zip',
//			'required'  => false,
//		),
//
//		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'Regenerate Thumbnails',
			'slug'      => 'regenerate-thumbnails',
			'required'  => false,
		),
//
//		// This is an example of the use of 'is_callable' functionality. A user could - for instance -
//		// have WPSEO installed *or* WPSEO Premium. The slug would in that last case be different, i.e.
//		// 'wordpress-seo-premium'.
//		// By setting 'is_callable' to either a function from that plugin or a class method
//		// `array( 'class', 'method' )` similar to how you hook in to actions and filters, TGMPA can still
//		// recognize the plugin as being installed.
//		array(
//			'name'        => 'WordPress SEO by Yoast',
//			'slug'        => 'wordpress-seo',
//			'is_callable' => 'wpseo_init',
//			'required'  => false,
//		),

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'itstar',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		/*
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'itstar' ),
			'menu_title'                      => __( 'Install Plugins', 'itstar' ),
			/* translators: %s: plugin name. * /
			'installing'                      => __( 'Installing Plugin: %s', 'itstar' ),
			/* translators: %s: plugin name. * /
			'updating'                        => __( 'Updating Plugin: %s', 'itstar' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'itstar' ),
			'notice_can_install_required'     => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'itstar'
			),
			'notice_can_install_recommended'  => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'itstar'
			),
			'notice_ask_to_update'            => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'itstar'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				/* translators: 1: plugin name(s). * /
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'itstar'
			),
			'notice_can_activate_required'    => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'itstar'
			),
			'notice_can_activate_recommended' => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'itstar'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'itstar'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'itstar'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'itstar'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'itstar' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'itstar' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'itstar' ),
			/* translators: 1: plugin name. * /
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'itstar' ),
			/* translators: 1: plugin name. * /
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'itstar' ),
			/* translators: 1: dashboard link. * /
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'itstar' ),
			'dismiss'                         => __( 'Dismiss this notice', 'itstar' ),
			'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'itstar' ),
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'itstar' ),

			'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),
		*/
	);

	tgmpa( $plugins, $config );
}

function itstar_ahoy() {

  //Allow editor style.
  //add_editor_style( get_stylesheet_directory_uri() . '/library/css/editor-style.css' );

  // let's get language support going, if you need it
  load_theme_textdomain( 'itstar', get_template_directory() . '/languages' );

  // USE THIS TEMPLATE TO CREATE CUSTOM POST TYPES EASILY
  require_once( 'library/custom-post-type.php' );

  // launching operation cleanup
  add_action( 'init', 'itstar_head_cleanup' );
  // A better title
  add_filter( 'wp_title', 'rw_title', 10, 3 );
  // remove WP version from RSS
  add_filter( 'the_generator', 'itstar_rss_version' );
  // remove pesky injected css for recent comments widget
  add_filter( 'wp_head', 'itstar_remove_wp_widget_recent_comments_style', 1 );
  // clean up comment styles in the head
  add_action( 'wp_head', 'itstar_remove_recent_comments_style', 1 );
  // clean up gallery output in wp
  add_filter( 'gallery_style', 'itstar_gallery_style' );

  // enqueue base scripts and styles
  add_action( 'wp_enqueue_scripts', 'itstar_scripts_and_styles', 998 );
  // ie conditional wrapper

  // launching this stuff after theme setup
  itstar_theme_support();

  // adding sidebars to Wordpress (these are created in functions.php)
  add_action( 'widgets_init', 'itstar_register_sidebars' );

  // cleaning up random code around images
  add_filter( 'the_content', 'itstar_filter_ptags_on_images' );
  // cleaning up excerpt
  add_filter( 'excerpt_more', 'itstar_excerpt_more' );

  remove_filter('template_redirect', 'redirect_canonical'); 
} /* end itstar ahoy */

// let's get this party started
add_action( 'after_setup_theme', 'itstar_ahoy' );


/************* OEMBED SIZE OPTIONS *************/

// if ( ! isset( $content_width ) ) {
//  $content_width = 640;
// }

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'slider', 960, 500, array( 'center', 'center' ) );
add_image_size( 'video-thumb', 150, 80, array( 'center', 'center' ) );
add_image_size( 'video-larg-thumb', 400, 200, array( 'center', 'center' ) );
add_image_size( 'page-thumb', 200, 200, array( 'center', 'center' ) );
add_image_size( 'post-thumb', 150, 150, array( 'center', 'center' ) );
add_image_size( 'post-banner', 960, 300, array( 'center', 'center' ) );
add_image_size( 'item-thumb', 80, 80, array( 'center', 'center' ) );


add_filter( 'image_size_names_choose', 'itstar_custom_image_sizes' );

function itstar_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'slider' => __('960px by 500px'),
        'video-thumb' => __('150px by 100px'),
        'video-larg-thumb' => __('240px by 180px'),
        'page-thumb' => __('200px by 200px'),
        'post-thumb' => __('150px by 150px'),
        'post-banner' => __('960px by 300px'),
        'item-thumb' => __('80px by 80px'),

    ) );
}


/************* THEME CUSTOMIZE *********************/


function itstar_theme_customizer($wp_customize) {
}

add_action( 'customize_register', 'itstar_theme_customizer' );

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function itstar_register_sidebars() {
  register_sidebar(array(
    'id' => 'sidebar',
    'name' => __( 'Sidebar', 'itstar' ),
    'description' => __( 'The first (primary) sidebar.', 'itstar' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));
  register_sidebar(array(
    'id' => 'footer-first',
    'name' => __( 'Footer First', 'itstar' ),
    'description' => __( 'The first footer widget area', 'itstar' ),
    'before_widget' => '<aside id="%1$s" class="footer-first widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));
  register_sidebar(array(
    'id' => 'footer-first-col2',
    'name' => __( 'Footer First Col2', 'itstar' ),
    'description' => __( 'The first footer widget area', 'itstar' ),
    'before_widget' => '<aside id="%1$s" class="footer-first widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));
  register_sidebar(array(
    'id' => 'footer-first-col3',
    'name' => __( 'Footer First Col3', 'itstar' ),
    'description' => __( 'The first footer widget area', 'itstar' ),
    'before_widget' => '<aside id="%1$s" class="footer-first widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));
  register_sidebar(array(
    'id' => 'footer-first-col4',
    'name' => __( 'Footer First Col4', 'itstar' ),
    'description' => __( 'The first footer widget area', 'itstar' ),
    'before_widget' => '<aside id="%1$s" class="footer-first widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));
  register_sidebar(array(
    'id' => 'ad-sidebar',
    'name' => __( 'Ad Sidebar', 'itstar' ),
    'description' => __( 'sidebar for ads', 'itstar' ),
    'before_widget' => '<aside id="%1$s" class="top-ad widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));

}


/************* COMMENT LAYOUT *********************/

// Comment Layout
function itstar_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
  <div id="comment-<?php comment_ID(); ?>" <?php comment_class('cf'); ?>>
    <article  class="cf">
      <header class="comment-author vcard">
        <?php
        /*
          this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
          echo get_avatar($comment,$size='32',$default='<path_to_url>' );
        */
        ?>
        <?php // custom gravatar call ?>
        <?php
          // create variable
          $bgauthemail = get_comment_author_email();
        ?>
        <img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=40" class="load-gravatar avatar avatar-48 photo" height="40" width="40" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
        <?php // end custom gravatar call ?>
        <?php printf(__( '<cite class="fn">%1$s</cite> %2$s', 'itstar' ), get_comment_author_link(), edit_comment_link(__( '(Edit)', 'itstar' ),'  ','') ) ?>
        <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'itstar' )); ?> </a></time>

      </header>
      <?php if ($comment->comment_approved == '0') : ?>
        <div class="alert alert-info">
          <p><?php _e( 'Your comment is awaiting moderation.', 'itstar' ) ?></p>
        </div>
      <?php endif; ?>
      <section class="comment_content cf">
        <?php comment_text() ?>
      </section>
      <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </article>
  <?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!


function itstar_pagination(){
  global $wp_query;

    if($wp_query->max_num_pages > 1){
        if('item' !== get_post_type() ){
            $big = 999999999;
            echo /*__('Page : ','itstar').*/paginate_links( array(
              'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
              'format' => '?paged=%#%',
              'current' => max( 1, get_query_var('paged') ),
              'total' => $wp_query->max_num_pages,
              'prev_text'    => __('<i class="fa fa-angle-double-left"></i>','itstar'),
              'next_text'    => __('<i class="fa fa-angle-double-right"></i>','itstar')
            ) );
        } else {
             $big = 999999999;
            echo /*__('Page : ','itstar').*/paginate_links( array(
              'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
              'format' => '?paged=%#%',
              'current' => max( 1, get_query_var('paged') ),
              'total' => $wp_query->max_num_pages,
              'prev_text'    => __('<i class="fa fa-angle-double-left"></i>','itstar'),
              'next_text'    => __('<i class="fa fa-angle-double-right"></i>','itstar')
            ) );
        }
     }
}


function itstar_SearchFilter($query) {
    if ($query->is_search) {
      $query->set('post_type', array('post','item'));
    }
    return $query;
    }

add_filter('pre_get_posts','itstar_SearchFilter');

function itstar_add_query_vars_filter( $vars ){
  $vars[] = "sub_id";
  return $vars;
}
add_filter( 'query_vars', 'itstar_add_query_vars_filter' );



// Enable support for HTML5 markup.
  add_theme_support( 'html5', array(
    'comment-list',
    'search-form',
    'comment-form'
  ) );



/* DON'T DELETE THIS CLOSING TAG */ 
/*---------------Widgets----------------------*/

// Creating the widget 
class last_video_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
        // Base ID of your widget
        'last_video_widget',

        // Widget name will appear in UI
        __('Last video Widget', 'itstar'),

        // Widget description
        array( 'description' => __( 'Display Last Products', 'itstar' ), ) 
        );
    }

    // Creating widget front-end
    // This is where the action happens
    public function widget( $args, $instance ) {
        global $wp_query;

        $title = apply_filters( 'widget_title', $instance['title'] );
        $number = $instance['number'];
        $term = get_term($instance['cat'],'video_cat');

        //var_dump($instance);
        $videos = get_posts(array(
            'post_type' => 'video',
            'posts_per_page' => $number,
            'video_cat'         => $term->slug,
            )
        );
//        var_dump($term);
        $category_link = get_category_link( $term->term_id );

        $content = '<ul class="widget-list">';
        foreach($videos as $video) : setup_postdata( $video );
//          $url = get_the_permalink($video->ID);
          $url = get_post_meta($video->ID,'_itstar_video_link')[0];
          $thumb = get_the_post_thumbnail($video->ID,'video-thumb');
          $name = $video->post_title;
          $content .='<li><a href="'.$url.'">'.$thumb.'<span>'.$name.'</span></a></li>';
        endforeach;
        $content .= '</ul>';
        $content .='<a class="more-video" href="'.$category_link.'">';
        $content .= __("more videos","itstar").'<i class="fa fa-angle-double-left" aria-hidden="true"></i></a>';


      
       

        
        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        
        if ( ! empty( $title ) )
          echo $args['before_title'] . $title . $args['after_title'];
          echo $content;
        // This is where you run the code and display the output
          echo $args['after_widget'];
    }
        
    // Widget Backend 
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }else {
            $title = __( 'Last Video', 'itstar' );
        }
        if ( isset( $instance[ 'number' ] ) ) {
            $number = $instance[ 'number' ];
        }else {
            $number = 5;
        }
        if ( isset( $instance[ 'cat' ] ) ) {
            $cat = $instance[ 'cat' ];
        }else {
            $cat ="";
        }
        // Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
         <p>
            <label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'video Numbers :','itstar' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'cat' ); ?>"><?php _e( 'video Category :','itstar' ); ?></label>
           <?php wp_dropdown_categories(array(
                  'name'               => $this->get_field_name( 'cat' ),
                  'id'                 => $this->get_field_id( 'cat' ),
                  'class'              => 'widefat',
                  'taxonomy'           => 'video_cat',
                  'echo'               => '1',
                  'selected'          =>esc_attr( $cat ),
            )); ?>


        </p>
        
        <?php 
    }
      
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['number'] = ( ! empty( $new_instance['number'] ) ) ? strip_tags( $new_instance['number'] ) : '';
        $instance['cat'] = ( ! empty( $new_instance['cat'] ) ) ? strip_tags( $new_instance['cat'] ) : '';
        //var_dump($instance);
        return $instance;
    }
} // Class wpb_widget ends here

class last_posts_by_cat_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
        // Base ID of your widget
        'last_posts_by_cat_widget', 

        // Widget name will appear in UI
        __('Last Posts By Category Widget', 'itstar'), 

        // Widget description
        array( 'description' => __( 'Display Last Posts in Category', 'itstar' ), ) 
        );
    }

    // Creating widget front-end
    // This is where the action happens
    public function widget( $args, $instance ) {
        global $wp_query;

        $title = apply_filters( 'widget_title', $instance['title'] );
        $number = $instance['number'];
        $cat = get_category($instance['cat']);

      
        $posts = get_posts(array(
            'post_type' => 'post',
            'posts_per_page' => $number,
            'category'         => $cat->term_id,
            )
        );
        
       
        $content = '<ul class="widget-list">';
        foreach($posts as $post) : setup_postdata( $post );
          $url = get_the_permalink($post->ID);
          $thumb = get_the_post_thumbnail($post->ID,'product-thumb');
          $name = $post->post_title;
          $content .='<li><a href="'.$url.'">'.$thumb.'<span>'.$name.'</span></a><li>';
        endforeach;
        $content .= '</ul>';

      
       

        
        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        
        if ( ! empty( $title ) )
          echo $args['before_title'] . $title . $args['after_title'];
          echo $content;
        // This is where you run the code and display the output
          echo $args['after_widget'];
    }
        
    // Widget Backend 
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }else {
            $title = __( 'Last Posts', 'itstar' );
        }
        if ( isset( $instance[ 'number' ] ) ) {
            $number = $instance[ 'number' ];
        }else {
            $number = 5;
        }
        if ( isset( $instance[ 'cat' ] ) ) {
            $cat = $instance[ 'cat' ];
        }else {
            $cat = "";
        }
        // Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
         <p>
            <label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Post Numbers :','itstar' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
        <p>
        <label for="<?php echo $this->get_field_id( 'cat' ); ?>"><?php _e( 'Post Category :','itstar' ); ?></label> 
        <?php wp_dropdown_categories(array(
                  'name'               => $this->get_field_name( 'cat' ),
                  'id'                 => $this->get_field_id( 'cat' ),
                  'class'              => 'widefat',
                  'taxonomy'           => 'category',
                  'echo'               => '1',
                  'selected'           => esc_attr($cat ),
            )); ?>
        </p>
        <?php 
    }
      
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['number'] = ( ! empty( $new_instance['number'] ) ) ? strip_tags( $new_instance['number'] ) : '';
        $instance['cat'] = ( ! empty( $new_instance['cat'] ) ) ? strip_tags( $new_instance['cat'] ) : '';
        return $instance;
    }
} // Class wpb_widget ends here
class simple_button_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
        // Base ID of your widget
        'simple_button_widget',

        // Widget name will appear in UI
        __('Simple Button Widget', 'itstar'),

        // Widget description
        array( 'description' => __( 'make simple button', 'itstar' ), )
        );
    }

    // Creating widget front-end
    // This is where the action happens
    public function widget( $args, $instance ) {
        global $wp_query;

        $title = apply_filters( 'widget_title', $instance['title'] );
        $text = $instance['text'];
        $link = $instance['link'];

        $content = '<a class="advance-search-button" href='.$link.'>'.$text.'</a>';

        // before and after widget arguments are defined by themes
        echo $args['before_widget'];

        if ( ! empty( $title ) )
          echo $args['before_title'] . $title . $args['after_title'];
          echo $content;
        // This is where you run the code and display the output
          echo $args['after_widget'];
    }

    // Widget Backend
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }else {
            $title = '';
        }
        if ( isset( $instance[ 'text' ] ) ) {
            $text = $instance[ 'text' ];
        }else {
            $text = __("Advance Search Button","itstar");
        }
        if ( isset( $instance[ 'link' ] ) ) {
            $link = $instance[ 'link' ];
        }else {
            $link = "";
        }
        // Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
         <p>
            <label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Button Title :','itstar' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>" type="text" value="<?php echo esc_attr( $text ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'link' ); ?>"><?php _e( 'Button Link :','itstar' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>

        <?php
    }

    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['text'] = ( ! empty( $new_instance['text'] ) ) ? strip_tags( $new_instance['text'] ) : '';
        $instance['link'] = ( ! empty( $new_instance['link'] ) ) ? strip_tags( $new_instance['link'] ) : '';
        return $instance;
    }
} // Class wpb_widget ends here

// Register and load the widget
function itstar_widget() {
  register_widget( 'last_video_widget' );
  register_widget( 'last_posts_by_cat_widget' );
  register_widget( 'simple_button_widget' );
}
add_action( 'widgets_init', 'itstar_widget' );

function itstar_get_image_src($src="" , $size=""){
    $path_info = pathinfo($src);
    return $path_info['dirname'].'/'.$path_info['filename'].'-'.$size.'.'.$path_info['extension'];
}

//-----------Menu Walker------------------------

class Viradeco_walker_nav_menu extends Walker_Nav_Menu {
  
// add classes to ul sub-menus
function start_lvl( &$output, $depth = 0, $args = array() ) {
    // depth dependent classes
    $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
    $display_depth = ( $depth + 1); // because it counts the first submenu as 0
    $classes = array(
        'sub-menu',
        ( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
        ( $display_depth >=2 ? 'sub-sub-menu' : '' ),
        'menu-depth-' . $display_depth
        );
    $class_names = implode( ' ', $classes );
  
    // build html
    $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
}
  
// add main/sub classes to li's and links
 function start_el(  &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    global $wp_query;
    $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
  
    // depth dependent classes
    $depth_classes = array(
        ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
        ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
        ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
        'menu-item-depth-' . $depth
    );
    $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );
  
    // passed classes
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
  
    // build html
    $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';
  
    // link attributes
    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
    $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';
  
    $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
        $args->before,
        $attributes,
        $args->link_before,
        apply_filters( 'the_title', $item->title, $item->ID ),
        $args->link_after,
        $args->after
    );
  
    // build html
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
}
}

class Menu_With_Image extends Walker_Nav_Menu {
  function start_el(&$output, $item, $depth = '0', $args = array(), $id = '0') {
    global $wp_query;

    $class_names = $value = '';
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    
    global $sub_wrapper_before;
    $sub_wrapper_before = "";
    global $sub_wrapper_after;
    $sub_wrapper_after = '';
    
    if(in_array('mega-menu',$classes)){
      $sub_wrapper_before = '<div class="sub-menu-wrap">';
      $sub_wrapper_after = '</div>';
    }


    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
    $output .= "\n$indent\n";
    
    $menu_thumb = "";
    if($item->object == 'project' || $item->object == 'product'){
       $menu_thumb = get_the_post_thumbnail($item->object_id , 'product-thumb');
       //var_dump($menu_thumb);
    }
    $products = array();
    $sub_content = "";
    
    if($item->object == 'product_cat'){
        $term = get_term($item->object_id,'product_cat');
        
        //var_dump($instance);
        $products = get_posts(array(
            'post_type' => 'product',
            'posts_per_page' => -1,
            'product_cat'         => $term->slug,
            )
        );
        //var_dump($products);
        $sub_content = '<ul class="sub-menu">'.$sub_wrapper_before;
        foreach($products as $product) : setup_postdata( $product );
          //var_dump($product);
          $url = get_the_permalink($product->ID);
          $thumb = get_the_post_thumbnail($product->ID,'product-thumb');
          $name = $product->post_title;
          $sub_content .='<li id="menu-item-'.$product->ID.'" class="menu-item product-item menu-item-type-post_type menu-item-object-product"><a href="'.$url.'">'.$thumb.$name.'</a></li>';
        endforeach;
        $sub_content .= '</ul>';

    }
    
   

    

    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
    $class_names = ' class="' . esc_attr( $class_names ) . '"';
    
    $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
    $attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
    $attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
    $attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';
    $item_output = $args->before;
    $item_output .= '<a'. $attributes .'>';
    $item_output .= $args->link_before .$menu_thumb. apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
    //$item_output .= '<br /><span class="sub">' . $item->description . '</span>';
    $item_output .= '</a>';
     //$item_output .= ;
    //show posts of product cat  
     $item_output .= $sub_content;

    $item_output .= $args->after;
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }

  function start_lvl( &$output, $depth = 0, $args = array() ) {
    // depth dependent classes
    global $sub_wrapper_before;
    $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
    $display_depth = ( $depth + 1); // because it counts the first submenu as 0
    $classes = array(
        'sub-menu',
        ( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
        ( $display_depth >=2 ? 'sub-sub-menu' : '' ),
        'menu-depth-' . $display_depth
        );
    $class_names = implode( ' ', $classes );
  
    // build html
    $output .= "\n" . $indent . '<ul class="' . $class_names . '">' .$sub_wrapper_before. "\n";
  }

}



// vira club id


function itstar_create_account(){
    //You may need some data validation here
    
      global $wpdb;
      global $user_errors;
      $user_errors = new WP_Error();
      
        
        $fname = esc_attr(( isset($_POST['fname']) ? $_POST['fname'] : '' ));
        $lname = esc_attr(( isset($_POST['lname']) ? $_POST['lname'] : '' ));
        $user = esc_attr(( isset($_POST['uname']) ? $_POST['uname'] : '' ));
        $birthday = esc_attr(( isset($_POST['birthday']) ? $_POST['birthday'] : '' ));
        $birthmonth = esc_attr(( isset($_POST['birthmonth']) ? $_POST['birthmonth'] : '' ));
        $birthyear = esc_attr(( isset($_POST['birthyear']) ? $_POST['birthyear'] : '' ));
        $job = esc_attr(( isset($_POST['job']) ? $_POST['job'] : '' ));
        $phone = esc_attr(( isset($_POST['phone']) ? $_POST['phone'] : '' ));
        $pass = esc_attr(( isset($_POST['upass']) ? $_POST['upass'] : '' ));
        $email = esc_attr(( isset($_POST['uemail']) ? $_POST['uemail'] : '' ));
        $aspam = esc_attr(( isset($_POST['aspam']) ? $_POST['aspam'] : '' ));
        $aspam_result = esc_attr(( isset($_POST['aspam_result']) ? $_POST['aspam_result'] : '' ));
        $submited = esc_attr(( isset($_POST['submited']) ? $_POST['submited'] : '' ));

        


        if($email && $pass && $user){

          // if( $birthday && (!is_int($birthday) || $birthday < 1 || $birthday > 31)){
          //   $user_errors->add( 'birthday',__('Birth Day must be a number between 1 & 31','itstar'),$birthday );         
          //   var_dump(is_int($birthday));
             
          // }
          // if($birthmonth && (!is_int($birthmonth) || $birthmonth < 1 || $birthmonth > 12)){
          //   $user_errors->add( 'birthmonth',__('Birth Month must be a number between 1 & 31','itstar'),$birthmonth );         
          //   var_dump(is_int($birthmonth));
             
          // }
          // if($birthyear && !is_int($birthyear)){
          //   $user_errors->add( 'birthyear',__('Birth Year must be Number','itstar'),$birthyear );         
          //  var_dump(is_int($birthyear));
             
          // }
          // if($phone && !is_int($phone)){
          //   $user_errors->add( 'phone',__('Phone must be a Number','itstar'),$phone );         
          //    var_dump(is_int($phone));
          // }
         
            if($aspam == $aspam_result){
              if ( !username_exists( $user )  && !email_exists( $email ) && 1 > count($user_errors->get_error_messages()) ) {

                 $user_id = wp_create_user( $user, $pass, $email );
                     
                     if( !is_wp_error($user_id) ) {
                         //user has been created
                         $user = new WP_User( $user_id );
                         $user->set_role( 'subscriber' );

                         
                        
                        update_user_meta( $user_id, 'first_name', $fname );
                        update_user_meta( $user_id, 'last_name', $lname );
                        update_user_meta( $user_id, 'birthday', $birthday );
                        update_user_meta( $user_id, 'birthmonth', $birthmonth );
                        update_user_meta( $user_id, 'birthyear', $birthyear );
                        update_user_meta( $user_id, 'phone', $phone );
                        update_user_meta( $user_id, 'job', $job );

                        if(current_user_can('edit_posts')){
                          $firstid = 1999;
                        }else{
                          $firstid = 2999;
                        }
                        $latestid=$wpdb->get_var("SELECT meta_value from $wpdb->usermeta where meta_key='viraclub' order by meta_value DESC limit 1;");
                        $latestid = ($latestid)?($latestid):($firstid);
                        update_user_meta( $user_id, 'viraclub', $latestid+1 );
                         //Redirect
                         //wp_redirect( 'URL_where_you_want_redirect' );
                         //exit;
                         

                        itstar_send_registration_admin_email($user_id);
                        itstar_user_registration_welcome_email($user_id);

                        log_me_the_f_in( $user_id );
                     } else {
                        
                         var_dump($user_id->get_error_message());
                     }
              } else {
                 $user_errors->add( 'userexists',__('Another user have been registered by this User Name or Email','itstar') );

              }
            } else {
                $user_errors->add( 'aspam',__('Anti Spam is Not correct!','itstar') );         
            }

          } elseif($submited == "true") {
            $user_errors->add( 'requiredfields',__('Please fill the required fields : User Name - Email - Password','itstar') );         
        }
    

}
//add_action('init','itstar_create_account');


// registration and login form shortcode
function itstar_user_register( $atts, $content = null ) {
    $a = shortcode_atts( array(
        'attr_1' => 'attribute 1 default',
        'attr_2' => 'attribute 2 default',
        // ...etc
    ), $atts );

    global $user_errors;
      
        $form_display = "";
      if(count($user_errors->get_error_messages())>0){
        $form_display = "form-display";
      }
      
      $required = $user_errors->get_error_messages('requiredfields');
          $required = (!empty($required))?$required:array('');

      $spam_error = $user_errors->get_error_messages('aspam');
          $spam_error = (!empty($spam_error))?$spam_error:array('');

      $userexists = $user_errors->get_error_messages('userexists');
          $userexists = (!empty($userexists))?$userexists:array('');
      // $birthday = $user_errors->get_error_messages('birthday');
      //     $birthday = (!empty($birthday))?$birthday:array('');
      // $birthmonth = $user_errors->get_error_messages('birthmonth');
      //     $birthmonth = (!empty($birthmonth))?$birthmonth:array('');
      // $birthyear = $user_errors->get_error_messages('birthyear');
      //     $birthyear = (!empty($birthyear))?$birthyear:array('');
      $phone = $user_errors->get_error_messages('birthyearphone');
          $phone = (!empty($phone))?$phone:array('');
      
      $anti_no1 = rand(3,12);
      $anti_no2 = rand(4,16);
      $anti_spam = $anti_no1+$anti_no2;

    
    $register_form = '';
    $register_form .= '<div class="forms_buttons"><a href="#" id="register-show" class="register-show">'.__('Vira Club Registeration','itstar').'</a>';
    $register_form .= '<a href="#" id="login-show" class="login-show">'.__('Login to Site','itstar').'</a></div>';
    $register_form .= '<div class="register-container '.$form_display.' ">';
        $register_form .= '<label class="form_error">'.$required[0].'</label>';
        $register_form .= '<label class="form_error">'.$spam_error[0].'</label>';
        $register_form .= '<label class="form_error">'.$userexists[0].'</label>';
        $register_form .= '<form method="post" class="register_form" name="registerForm">';
           $register_form .='<table>';
               $register_form .= '<tr><th>'.__('First Name','itstar').'</th><td>'.'<input id="fname" type="text"  name="fname" />'.'</td></tr>';
                $register_form .='<tr><th>'. __('Last Name','itstar').'</th><td>'. '<input id="lname" type="text" name="lname" />'.'</td></tr>';
                $register_form .= '<tr><th>'.__('UserName','itstar').'</th><td>'. '<input id="uname" type="text" name="uname" />'.'</td></tr>';
                $register_form .= '<tr><th>'.__('Birthday','itstar').'</th><td>'. '<input id="birthday" type="number" name="birthday" min="1" max="31"/>'.'</td></tr>';
                    
                $register_form .= '<tr><th>'.__('Birth Month','itstar').'</th><td>'. '<input id="birthmonth" type="number" name="birthmonth" min="1" max="12"/>'.'</td></tr>';
                   
                $register_form .='<tr><th>'. __('Birth Year','itstar').'</th><td>'. '<input id="birthyear" type="number" name="birthyear" min="1300"/>'.'</td></tr>';
                    
                $register_form .= '<tr><th>'.__('Job','itstar').'</th><td>'. '<input id="job" type="text" name="job" />'.'</td></tr>';
                $register_form .= '<tr><th>'.__('Phone','itstar').'</th><td>'. '<input id="phone" type="number" min="1111"  name="phone" />'.'</td></tr>';
                    
                $register_form .= '<tr><th>'.__('Email','itstar').'</th><td>'. '<input id="email" type="text" name="uemail" />'.'</td></tr>';
                $register_form .= '<tr><th>'.__('Password','itstar').'</th><td>'.'<input type="password" pattern=".{6,}"  name="upass" />'.'</td></tr>';
                $register_form .= '<tr><th></th><td><small>'.__('At least 6 character.','itstar').'</small></td></tr>';
                $register_form .= '<tr><th>Anti Spam</th><td>'.$anti_no1 .' + '. $anti_no2.' = '.'<input id="anti_spam" type="number" min="1" max="40" name="aspam" />'.'<input value="'.$anti_spam.'" type="hidden"  name="aspam_result" />'.'</td></tr>';
                $register_form .= '<tr><input value="true" type="hidden"  name="submited" /></tr>';
                $register_form .= '<tr><td>'.'<input type="submit" value="'.__('Submit','itstar').'" />'.'</td></tr>';
            $register_form .= '</table>';
        $register_form .= '</form>';
    $register_form .= '</div>';
    if ( !is_user_logged_in() ) {
        return $register_form;
    }
}
//add_shortcode( 'vira_register', 'itstar_user_register' );

//user login shortcode
function itstar_user_login(){
  $args = array('echo'=>false);
  if ( !is_user_logged_in() ) {
      return '<div class="login-container">'.wp_login_form( $args ).'</div>';
  }
}
//add_shortcode( 'vira_login', 'itstar_user_login' );


// user profile shortcode
function itstar_user_profile( $atts, $content = null ) {
    // $a = shortcode_atts( array(
    //     'attr_1' => 'attribute 1 default',
    //     'attr_2' => 'attribute 2 default',
    //     // ...etc
    // ), $atts );
    $user_profile = "";
    if ( is_user_logged_in() ) {
      $current_user = wp_get_current_user();
    /**
     * @example Safe usage: $current_user = wp_get_current_user();
     * if ( !($current_user instanceof WP_User) )
     *     return;
     */
      $user_profile .= '<div  class="article-title"><h3>'.__('User Profile','itstar').'</h3></div>';
       $user_profile .=  '<div class="avatar-container">'.get_avatar($current_user->ID).'</div>';
       $user_profile .=  '<div class="profile-container">';
       
      $user_profile .= '<strong>'.__('first name: ','itstar') .'</strong>'. $current_user->user_firstname . '<br />';
       $user_profile .= '<strong>'.__('last name: ','itstar') .'</strong>'. $current_user->user_lastname . '<br />';
       $user_profile .= '<strong>'.__('Username: ','itstar') .'</strong>'. $current_user->user_login . '<br />';
      
        $user_profile .= '<strong>'.__('Birthday: ','itstar') .'</strong>'.get_user_meta($current_user->ID , 'birthday',true).' - '.get_user_meta($current_user->ID , 'birthmonth',true) .' - '.get_user_meta($current_user->ID , 'birthyear',true). '<br />';
        $user_profile .= '<strong>'.__('Phone: ','itstar') .'</strong>'.get_user_meta($current_user->ID , 'phone',true) . '<br />';
         $user_profile .= '<strong>'.__('Email: ','itstar') .'</strong>'. $current_user->user_email . '<br />';
        $user_profile .= '<strong>'.__('Job: ','itstar') .'</strong>'.get_user_meta($current_user->ID , 'job',true) . '<br />';
       if(!current_user_can('edit_posts')){
           $user_profile .= '<strong>'.__('Vira Club ID: ','itstar') .'</strong>'.'<span class="viraid">V'.get_user_meta($current_user->ID , 'viraclub',true) . '</span><br />';
          
      }
       $user_profile .= '<br />'.'<a class="vira_logout" href="'.wp_logout_url( get_permalink() ).'">'.__('Logout','itstar').'</a>';
       $user_profile .=  '</div>';


       
      
    } 

    return $user_profile;
}
//add_shortcode( 'vira_profile', 'itstar_user_profile' );

function itstar_projects_in_cat( $atts, $content = null ) {
   global $wp_query;
    $a = shortcode_atts( array(
        'cat' => '',
        'qty' => -1,
        // ...etc
    ), $atts );

$projects = get_posts(array(
                            'post_type' => 'project',
                            'posts_per_page' => $a['qty'],
                            'project_cat'         => $a['cat'],
                            )
                        );

  
  if(!empty($projects)){ ?>
    
    <ul class="projects-list">
      <li><span><?php echo __('Title','itstar'); ?></span></li>
     <?php foreach($projects as $project){
        setup_postdata( $project ) ;
        $project_date = get_post_meta($project->ID,'_itstar_project_date',1);?>
        
        <li class="project-link">
          <a href="<?php echo get_the_permalink($project->ID); ?>">
            <span><?php echo esc_html($project_date).' - '; ?></span>
            <span><?php echo $project->post_title; ?></span>
          </a>
          
        </li>
      <?php } ?>
    </ul>
  <?php } 
  wp_reset_postdata();
}
//add_shortcode( 'projects', 'itstar_projects_in_cat' );


/*-----------Vira Products in Cat-------------------------------*/
function itstar_products_in_cat( $atts, $content = null ) {
   global $wp_query;
    $a = shortcode_atts( array(
        'cat' => '',
        'title' => '',
        'qty' => -1,
        // ...etc
    ), $atts );

$products = get_posts(array(
                            'post_type' => 'product',
                            'posts_per_page' => $a['qty'],
                            'product_cat'         => $a['cat'],
                            )
                        ); ?>

  <section class="layout">
    <div class="single-cat-title">
      <h2><?php echo $a['title'] ?></h2>
    </div>  
  </section>
  <?php if(!empty($products)){ ?>
    
    
  <section class="layout">
     <?php foreach($products as $product){
        setup_postdata( $product ) ; ?>
        
          <article class="hentry">
             
              <header class="article-title">
                <a href="<?php echo get_post_permalink($product->ID); ?>">
                  <h3><?php echo $product->post_title; ?></h3>
                </a>
              </header>
              <div class="featured-image single-image">
                  <a href="<?php echo get_post_permalink($product->ID); ?>">
                    <?php echo get_the_post_thumbnail($product->ID); ?>
                  </a>
                </div>
              
              <main class="article-body">

                <?php 
                      global $post;  
                      $save_post = $post;
                      $post = get_post($product->ID);
                      $excerpt = get_the_excerpt();
                      echo $excerpt;
                      $post = $save_post;

                ?>
                
              </main>
            </article>
      <?php } ?>
    </section>
  <?php } 
  wp_reset_postdata();
}
//add_shortcode( 'products', 'itstar_products_in_cat' );
//--------------------- user extra fields ----------------------
//add_action( 'show_user_profile', 'itstar_extra_user_profile_fields' );
//add_action( 'edit_user_profile', 'itstar_extra_user_profile_fields' );
function itstar_extra_user_profile_fields( $user ) {
?>
  <h3><?php _e("Extra profile information", "itstar"); ?></h3>
  <table class="form-table">
    <tr>
      <th><label for="birthday"><?php echo __("birthday",'itstar'); ?></label></th>
      <td>
        <input type="text" name="birthday" id="Birth Day" class="regular-text" 
            value="<?php echo esc_attr( get_user_meta( $user->ID,'birthday' ,true) ); ?>" /><br />
        <span class="description"><?php echo __("Please enter your Birthday.","itstar"); ?></span>
    </td>
    </tr>
    <tr>
      <th><label for="birthmonth"><?php echo __("Birth Month",'itstar'); ?></label></th>
      <td>
        <input type="text" name="birthmonth" id="birthmonth" class="regular-text" 
            value="<?php echo esc_attr( get_user_meta( $user->ID,'birthmonth' ,true) ); ?>" /><br />
        <span class="description"><?php echo __("Please enter your Birth Month.","itstar"); ?></span>
    </td>
    </tr>
    <tr>
      <th><label for="birthyear"><?php echo __("Birth Year",'itstar'); ?></label></th>
      <td>
        <input type="text" name="birthyear" id="birthyear" class="regular-text" 
            value="<?php echo esc_attr( get_user_meta( $user->ID,'birthyear' ,true) ); ?>" /><br />
        <span class="description"><?php echo __("Please enter your Birth Year.","itstar"); ?></span>
    </td>
    </tr>
    <tr>
      <th><label for="phone"><?php echo __("Phone",'itstar'); ?></label></th>
      <td>
        <input type="text" name="phone" id="phone" class="regular-text" 
            value="<?php echo esc_attr( get_user_meta(  $user->ID ,'phone',true) ); ?>" /><br />
        <span class="description"><?php echo __("Please enter your phone.","itstar"); ?></span>
    </td>
    </tr>
    <tr>
      <th><label for="job"><?php echo __("Job",'itstar'); ?></label></th>
      <td>
        <input type="text" name="job" id="job" class="regular-text" 
            value="<?php echo esc_attr( get_user_meta( $user->ID ,'job',true) ); ?>" /><br />
        <span class="description"><?php echo __("Please enter your Job.","itstar"); ?></span>
    </td>
    </tr>
    <tr>
      <th><label for="viraclub"><?php __("Vira club ID",'itstar'); ?></label></th>
      <td>
        <input type="text" disabled name="viraclub" id="viraclub" class="regular-text" 
            value="<?php echo 'V'.esc_attr( get_user_meta( $user->ID,'viraclub' ,true) ); ?>" /><br />
        
    </td>
    </tr>
  </table>
<?php
}

//add_action( 'personal_options_update', 'itstar_save_extra_user_profile_fields' );
//add_action( 'edit_user_profile_update', 'itstar_save_extra_user_profile_fields' );
function itstar_save_extra_user_profile_fields( $user_id ) {
  $saved = false;
  if ( current_user_can( 'edit_user', $user_id ) ) {
    update_user_meta( $user_id, 'birthday', $_POST['birthday'] );
    update_user_meta( $user_id, 'birthmonth', $_POST['birthmonth'] );
    update_user_meta( $user_id, 'birthyear', $_POST['birthyear'] );
    update_user_meta( $user_id, 'phone', $_POST['phone'] );
    update_user_meta( $user_id, 'job', $_POST['job'] );
    $saved = true;
  }
  return true;
}


// auto login user after registration
function log_me_the_f_in( $user_id ) {
    $user = get_user_by('id',$user_id);
    $username = $user->user_nicename;
    $user_id = $user->ID;
    wp_set_current_user($user_id, $username);
    wp_set_auth_cookie($user_id);
    do_action('wp_login', $username, $user);
}


function itstar_send_registration_admin_email($user_id){
  // $hash = md5( $random_number );
  // add_user_meta( $user_id, 'hash', $hash );
  
  

  $message = '';
  $user_info = get_userdata($user_id);
  $to = get_option('admin_email');           
  $un = $user_info->display_name;           
  $pw = $user_info->user_pass;
  $viraclub_id = get_user_meta( $user_id, 'viraclub', 1);

  $subject = __('New User Have Registered ','itstar').get_option('blogname'); 
  
  $message .= __('Username: ','itstar').$un;
  $message .= "\n";
  $message .= __('Password: ','itstar').$pw;
  $message .= "\n\n";
  $message .= __('ViraClub ID: ','itstar').'V'.$viraclub_id;

    
  //$message .= 'Please click this link to activate your account:';
  // $message .= home_url('/').'activate?id='.$un.'&key='.$hash;
  $headers = 'From: <info@itstar.com>' . "\r\n";           
  wp_mail($to, $subject, $message); 
}
//add_action( 'user_register', 'itstar_send_registration_admin_email' );


function itstar_user_registration_welcome_email($user_id){
  // $hash = md5( $random_number );
  // add_user_meta( $user_id, 'hash', $hash );
  
  $admin_email = get_option('admin_email');

  $user_info = get_userdata($user_id);
  $to = $user_info->user_email;           
  $un = $user_info->display_name;           
  $pw = $user_info->user_pass;
  $viraclub_id = get_user_meta( $user_id, 'viraclub', 1);

  $subject = __('Welcome to ','itstar').get_option('blogname'); 
  $message = __('Hello,','itstar').$un;
  $message .= "\n\n";
  $message .= __('Welcome to Our Site','itstar');
  $message .= "\n\n";
  $message .= __('Username: ','itstar').$un;
  $message .= "\n";
  $message .= __('Password: ','itstar').$pw;
  $message .= "\n\n";
  $message .= __('ViraClub ID: ','itstar').'V'.$viraclub_id;
  //$message .= 'Please click this link to activate your account:';
  // $message .= home_url('/').'activate?id='.$un.'&key='.$hash;
  $headers = 'From: <info@itstar.com>'."\r\n";           
  wp_mail($to, $subject, $message); 
}
//add_action( 'user_register', 'itstar_user_registration_welcome_email' );


//add columns to User panel list page
function Viradeco_add_user_columns($column) {
    $column['viraclub'] = __('ViraClub ID','itstar');
    $column['phone'] = __('Phone','itstar');
    $column['email'] = __('Email','itstar');
    
    return $column;
}
//add_filter( 'manage_users_columns', 'itstar_add_user_columns' );

//add the data
function itstar_add_user_column_data( $val, $column_name, $user_id ) {
    

    switch ($column_name) {
        case 'viraclub' :
            return 'V'.get_user_meta($user_id,'viraclub',true);
            break;
        case 'phone' :
            return get_user_meta($user_id,'phone',true);
            break;
        case 'email' :
            return get_user_meta($user_id,'uemail',true);
            break;
        default:
    }
    return;
}
//add_filter( 'manage_users_custom_column', 'itstar_add_user_column_data', 10, 3 );

function itstar_viraclub_id($user_id){
  global $wpdb;

  $user = new WP_User( $user_id );

  // Set your role
    
  $firstid = 2999;
    
                        
  $latestid=$wpdb->get_var("SELECT meta_value from $wpdb->usermeta where meta_key='viraclub' order by meta_value DESC limit 1;");
  $latestid = ($latestid)?($latestid):($firstid);
  update_user_meta( $user_id, 'first_name', $latestid+1 );

  // Destroy user object
  unset( $user );
}

//add_action( 'user_register', 'itstar_viraclub_id' );
function vira_login_redirect( $redirect_to, $request, $user ) {
  //is there a user to check?
  global $user;
  if ( isset( $user->roles ) && is_array( $user->roles ) ) {
    //check for admins
    if ( in_array( 'administrator', $user->roles ) ) {
      // redirect them to the default place
      return $redirect_to;
    } else {
      return home_url();
    }
  } else {
    return $redirect_to;
  }
}

//add_filter( 'login_redirect', 'vira_login_redirect', 10, 3 );


function itstar_search_form( $form ) {
  global $post,$wp_query,$wpdb;
   

  if(ICL_LANGUAGE_CODE == 'en' || ICL_LANGUAGE_CODE == 'it'){
      $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
      <div><label class="screen-reader-text" for="s">' . __( 'Search for:','itstar' ) . '</label>
      <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder'.__("Search...","itstar").'/>
      <input type="hidden" name="lang" value="'.ICL_LANGUAGE_CODE.'"/>
      </div>
      </form>';
  } else {
      $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
      <div><label class="screen-reader-text" for="s">' . __( 'Search for:','itstar' ) . '</label>
      <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="'.__("Search...","itstar").'"/>
      <i class="fa fa-search" style="display:none;"></i>
      </div>
      </form>';
  }

  return $form;
}

add_filter( 'get_search_form', 'itstar_search_form' );

if ( ICL_LANGUAGE_CODE=='it' || ICL_LANGUAGE_CODE=='en'){ 
  
        remove_filter('the_title', 'ztjalali_persian_num');
        remove_filter('the_content', 'ztjalali_persian_num');
        remove_filter('the_excerpt', 'ztjalali_persian_num');
        remove_filter('comment_text', 'ztjalali_persian_num');
    // change arabic characters
        remove_filter('the_content', 'ztjalali_ch_arabic_to_persian');
        remove_filter('the_title', 'ztjalali_ch_arabic_to_persian');
        remove_filter('the_excerpt', 'ztjalali_ch_arabic_to_persian');
        remove_filter('comment_text', 'ztjalali_ch_arabic_to_persian');
    


}

function itstar_user_only( $atts, $content = null ){
if( null != $content && current_user_can('read') ){
return $content;
} else {
$mylink = get_permalink();
return '<p>'.__(' -- Only registered Users can Download the Catalog -- ','itstar').'</p>';
}
}
//add_shortcode('onlyusers', 'itstar_user_only');

?>