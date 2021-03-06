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
          $content .='<li><a href="'.$url.'"><div>'.$thumb.'</div><div><span>'.$name.'</span></div></a></li>';
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


function itstar_search_form( $form ) {
  global $post,$wp_query,$wpdb;
   


      $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
      <div><label class="screen-reader-text" for="s">' . __( 'Search for:','itstar' ) . '</label>
      <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="'.__("Search...","itstar").'"/>
      <i class="fa fa-search" style="display:none;"></i>
      </div>
      </form>';


  return $form;
}

add_filter( 'get_search_form', 'itstar_search_form' );



?>