<?php
/**
 * AccessPress Lite Theme Options
 *
 * @package AccesspressLite
 */

if ( is_admin() ) : // Load only if we are viewing an admin page

function accesspress_lite_admin_scripts() {
	wp_enqueue_media();
	wp_enqueue_script( 'accesspresslite_custom_js', get_template_directory_uri().'/inc/admin-panel/js/custom.js', array( 'jquery' ) );
	wp_enqueue_script( 'of-media-uploader', get_template_directory_uri().'/inc/admin-panel/js/media-uploader.js', array( 'jquery' ) );
	
	wp_enqueue_style( 'accesspresslite_admin_style',get_template_directory_uri().'/inc/admin-panel/css/admin.css', '1.0', 'screen' );

}
add_action('admin_print_styles-appearance_page_theme_options', 'accesspress_lite_admin_scripts');



$accesspresslite_options = accesspress_default_setting_value();


add_action( 'admin_init', 'accesspresslite_register_settings' );
add_action( 'admin_menu', 'accesspresslite_theme_options' );

function accesspresslite_register_settings() {
	register_setting( 'accesspresslite_theme_options', 'accesspresslite_options', 'accesspresslite_validate_options' );
}

function accesspresslite_theme_options() {
	// Add theme options page to the addmin menu
	add_theme_page( __( 'Theme Options', 'accesspress-lite' ), __( 'Theme Options', 'accesspress-lite' ), 'edit_theme_options', 'theme_options', 'accesspresslite_theme_options_page' );
}


// Store Posts in array
$accesspresslite_postlist[0] = array(
	'value' => 0,
	'label' =>  __('--choose--','accesspress-lite')
);
$arg = array('posts_per_page'   => -1);
$accesspresslite_posts = get_posts($arg);
foreach( $accesspresslite_posts as $accesspresslite_post ) :
	$accesspresslite_postlist[$accesspresslite_post->ID] = array(
		'value' => $accesspresslite_post->ID,
		'label' => $accesspresslite_post->post_title
	);
endforeach;

// Store Pages in array
$accesspresslite_pagelist[0] = array(
	'value' => 0,
	'label' => __('--choose--','accesspress-lite')
);
$arg = array('posts_per_page'   => -1);
$accesspresslite_pages = get_pages($arg);
foreach( $accesspresslite_pages as $accesspresslite_page ) :
	$accesspresslite_pagelist[$accesspresslite_page->ID] = array(
		'value' => $accesspresslite_page->ID,
		'label' => $accesspresslite_page->post_title
	);
endforeach;

$accesspresslite_pagelist1 = array();
foreach( $accesspresslite_pages as $accesspresslite_page ) :
	$accesspresslite_pagelist1[$accesspresslite_page->ID] = array(
		'value' => $accesspresslite_page->ID,
		'label' => $accesspresslite_page->post_title
	);
endforeach;


$accesspresslite_postpagelist = array_merge($accesspresslite_postlist, $accesspresslite_pagelist1);

// Store categories in array
$accesspresslite_catlist[0] = array(
	'value' => 0,
	'label' => __('--choose--','accesspress-lite')
);
$arg1 = array(
	'hide_empty' => 0,
	'orderby' => 'name',
  	'parent' => 0,
  	);
$accesspresslite_cats = get_categories($arg1);

foreach( $accesspresslite_cats as $accesspresslite_cat ) :
	$accesspresslite_catlist[$accesspresslite_cat->cat_ID] = array(
		'value' => $accesspresslite_cat->cat_ID,
		'label' => $accesspresslite_cat->cat_name
	);
endforeach;
wp_reset_postdata();

// Store slider setting in array
$accesspresslite_slider = array(
	'yes' => array(
		'value' => 'yes',
		'label' => __('show','accesspress-lite')
	),
	'no' => array(
		'value' => 'no',
		'label' => __('hide','accesspress-lite')
	),
);

$accesspresslite_slider_show_pager = array(
	'yes1' => array(
		'value' => 'yes1',
		'label' => __('yes','accesspress-lite')
	),
	'no1' => array(
		'value' => 'no1',
		'label' => __('no','accesspress-lite')
	),
);

$accesspresslite_slider_show_controls = array(
	'yes2' => array(
		'value' => 'yes2',
		'label' => __('yes','accesspress-lite')
	),
	'no2' => array(
		'value' => 'no2',
		'label' => __('no','accesspress-lite')
	),
);

$accesspresslite_slider_auto = array(
	'yes3' => array(
		'value' => 'yes3',
		'label' => __('yes','accesspress-lite')
	),
	'no3' => array(
		'value' => 'no3',
		'label' => __('no','accesspress-lite')
	),
);

$accesspresslite_slider_mode = array(
	'fade' => array(
		'value' => 'fade',
		'label' => __('fade','accesspress-lite')
	),
	'slide' => array(
		'value' => 'slide',
		'label' => __('slide','accesspress-lite')
	),
);

$accesspresslite_slider_caption = array(
	'yes4' => array(
		'value' => 'yes4',
		'label' => __('show','accesspress-lite')
	),
	'no4' => array(
		'value' => 'no4',
		'label' => __('hide','accesspress-lite')
	),
);


// Function to generate options page
function accesspresslite_theme_options_page() {
	global $accesspresslite_options, $accesspresslite_postlist, $accesspresslite_postpagelist, $accesspresslite_slider, $accesspresslite_slider_show_pager, $accesspresslite_slider_show_controls, $accesspresslite_slider_mode, $accesspresslite_slider_auto, $accesspresslite_slider_caption, $accesspresslite_catlist;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false; // This checks whether the form has just been submitted. ?>

	<div class="wrap" id="optionsframework-wrap">

	<div class="accesspresslite-header">
		<div class="accesspresslite-logo">
		<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/admin-panel/images/logo.png" alt="AccessPress Lite" />
		</div>
		<div class="accesspresslite_title"><?php echo esc_html(wp_get_theme());  esc_html_e( ' Theme Options', 'accesspress-lite' )?></div>
	</div>

	<div class="clear"></div>

	<?php 	if ( false !== $_REQUEST['settings-updated'] ) : ?>
	<div class="updated fade"><p><strong><?php esc_html_e( 'Options saved' , 'accesspress-lite' ); ?></strong></p></div>
	<?php endif; // If the form has just been submitted, this shows the notification ?>

	<?php // Shows all the tabs of the theme options ?>
	<div class="nav-tab-wrapper">
	<a id="options-group-1-tab" class="nav-tab nav-tab-active" href="#options-group-1"><?php esc_html_e('Basic Settings','accesspress-lite'); ?></a>
    <a id="options-group-2-tab" class="nav-tab" href="#options-group-2"><?php esc_html_e('Home Page','accesspress-lite'); ?></a>
	<a id="options-group-3-tab" class="nav-tab" href="#options-group-3"><?php esc_html_e('Slider Settings','accesspress-lite'); ?></a>
	<a id="options-group-4-tab" class="nav-tab" href="#options-group-4"><?php esc_html_e('Sidebar','accesspress-lite'); ?></a>
	<a id="options-group-5-tab" class="nav-tab" href="#options-group-5"><?php esc_html_e('Social Links','accesspress-lite'); ?></a>
	<a id="options-group-6-tab" class="nav-tab" href="#options-group-6"><?php esc_html_e('Tools','accesspress-lite'); ?></a>
	<a id="options-group-7-tab" class="nav-tab" href="#options-group-7"><?php esc_html_e('About AccessPress Lite','accesspress-lite'); ?></a>
	</div>

	<div id="optionsframework-metabox" class="metabox-holder clearfix">
		<div id="optionsframework" class="postbox">
			<form id="form_options" method="POST" action="options.php" enctype="multipart/form-data">

			<?php $settings = get_option( 'accesspresslite_options', $accesspresslite_options ); ?>
			
			<?php settings_fields( 'accesspresslite_theme_options' );
			/* This function outputs some hidden fields required by the form,
			including a nonce, a unique number used to ensure the form has been submitted from the admin page
			and not somewhere else, very important for security */ ?>

			<!-- Basic Settings -->
			<div id="options-group-1" class="group">
			<h3><?php esc_html_e('Basic Settings','accesspress-lite'); ?></h3>
				<table class="form-table">
                    <tr><th scope="row"><label for="home_template"><?php esc_html_e('Home Page Template','accesspress-lite'); ?></label></th>
    					<td>
    					<?php $accesspresslite_home_templates = array('template_one' => __('Template One','accesspress-lite'),'template_two' => __('Template Two','accesspress-lite')); ?>
    					<?php
    					foreach ( $accesspresslite_home_templates as $accesspresslite_home_template_key => $accesspresslite_home_template ) : ?>
    						<input type="radio" id="<?php echo esc_attr($accesspresslite_home_template); ?>" name="accesspresslite_options[accesspresslite_home_template]" value="<?php echo esc_attr($accesspresslite_home_template_key); ?>" <?php checked( $settings['accesspresslite_home_template'], $accesspresslite_home_template_key ); ?> />
    						<label for="<?php echo esc_attr($accesspresslite_home_template) ?>"><?php echo esc_attr($accesspresslite_home_template); ?></label><br />
    					<?php endforeach;
    					?>
    					</td>
					</tr>
					<tr>
						<th><label for="footer_copyright"><?php esc_html_e('Disable Responsive Design?','accesspress-lite'); ?></label></th>
						<td>
							<input type="checkbox" id="responsive_design" name="accesspresslite_options[responsive_design]" value="1" <?php checked( true, $settings['responsive_design'] ); ?> />
							<label for="responsive_design"><?php esc_html_e('Check to disable','accesspress-lite'); ?></label>
						</td>
					</tr>

					<tr><th scope="row"><label for="webpage_layouts"><?php esc_html_e('Web Page Layout','accesspress-lite'); ?></label></th>
					<td>
					<?php $accesspresslite_webpage_layouts = array('Fullwidth' => __('Fullwidth','accesspress-lite'),'Boxed' => __('Boxed','accesspress-lite')); ?>
					<?php
					foreach ( $accesspresslite_webpage_layouts as $accesspresslite_webpage_layout_key => $accesspresslite_webpage_layout ) : ?>
						<input type="radio" id="<?php echo esc_attr($accesspresslite_webpage_layout); ?>" name="accesspresslite_options[accesspresslite_webpage_layout]" value="<?php echo esc_attr($accesspresslite_webpage_layout_key); ?>" <?php checked( $settings['accesspresslite_webpage_layout'], $accesspresslite_webpage_layout_key ); ?> />
						<label for="<?php echo esc_attr($accesspresslite_webpage_layout) ?>"><?php echo esc_attr($accesspresslite_webpage_layout); ?></label><br />
					<?php endforeach;
					?>
					</td>
					</tr>
                    
                    <tr>
						<th><label for="show_search"><?php esc_html_e('Show Search in Header?','accesspress-lite') ?></label></th>
						<td>
							<input type="checkbox" id="show_search" name="accesspresslite_options[show_search]" value="1" <?php checked( true, $settings['show_search'] ); ?> />
							<label for="show_search"><?php esc_html_e('Check to enable','accesspress-lite'); ?></label>
						</td>
					</tr>

					<tr>
						<th><label for="accesspresslite_favicon"><?php esc_html_e('Upload Favicon','accesspress-lite'); ?></label></th>
						<td>
							<div class="accesspresslite_fav_icon">
							  <input type="text" name="accesspresslite_options[media_upload]" id="accesspresslite_media_upload" value="<?php if(!empty($settings['media_upload'])){ echo esc_url($settings['media_upload']); }?>" />
							  <input class="button" name="media_upload_button" id="accesspresslite_media_upload_button" value="<?php esc_html_e('Upload','accesspress-lite'); ?>" type="button" /><br />
							  <em class="f13"><?php esc_html_e('Upload favicon(.png) with size of 16px X 16px', 'accesspress-lite'); ?></em>

							  <?php if(!empty($settings['media_upload'])){ ?>
							  <div id="accesspresslite_media_image">
							  <img src="<?php echo esc_url($settings['media_upload']) ?>" id="accesspresslite_show_image">
							  <div id="accesspresslite_fav_icon_remove"><?php esc_html_e('Remove','accesspress-lite'); ?></div>
							  </div>
							  <?php }else{ ?>
							  <div id="accesspresslite_media_image" style="display:none">
							  <img src="<?php if(isset($settings['media_upload'])) { echo esc_url($settings['media_upload']); } ?>" id="accesspresslite_show_image">
							  <a href="javascript:void(0)" id="accesspresslite_fav_icon_remove" title="remove"><?php esc_html_e('Remove','accesspress-lite'); ?></a>
							  </div>
							  <?php	} ?>
							</div>
						</td>
					</tr>

					<tr>
						<th><label for="upload_log"><?php esc_html_e('Upload Logo','accesspress-lite'); ?></label></th>
						<td>
							<a class="button" target="_blank" href="<?php echo esc_url(admin_url('/themes.php?page=custom-header')); ?>"><?php esc_html_e('Upload','accesspress-lite'); ?></a>
						</td>
					</tr>

					<tr>
					<th scope="row"><label for="header_text"><?php esc_html_e('Header Text','accesspress-lite'); ?></label></th>
					<td>
					<textarea id="header_text" name="accesspresslite_options[header_text]" rows="5" cols="30" placeholder="<?php esc_html_e('Example.. Call Us : 985XXX9856XX','accesspress-lite')?>"><?php echo wp_kses_post($settings['header_text']); ?></textarea><br />
                    <em class="f13"><?php esc_html_e('Html content allowed','accesspress-lite'); ?></em> </td>
                    </tr>

					<tr><th scope="row"><label for="menu_alignment"><?php esc_html_e('Menu Alignment','accesspress-lite'); ?></label></th>
					<td>
					<?php $accesspresslite_menu_alignments = array('Left' => __('Left','accesspress-lite'),'Right'=>__('Right','accesspress-lite'),'Center' => __('Center','accesspress-lite')); ?>
					<select id="menu_alignment" name="accesspresslite_options[menu_alignment]">
					<?php
					foreach ( $accesspresslite_menu_alignments as $accesspresslite_menu_alignment_key=>$accesspresslite_menu_alignment ) : ?>
						<option value="<?php echo esc_attr($accesspresslite_menu_alignment_key); ?>" <?php selected( $accesspresslite_menu_alignment_key , $settings['menu_alignment'] ); ?>><?php echo esc_attr($accesspresslite_menu_alignment);?></option>
					<?php
					endforeach;
					?>
					</select>
					</td>
					</tr>
					<tr><td colspan="2" class="seperator">&nbsp;</td></tr>

					<tr><th scope="row"><label for="event_cat"><?php esc_html_e('Select the category to display as Events','accesspress-lite'); ?></label></th>
					<td>
					<select id="event_cat" name="accesspresslite_options[event_cat]">
					<?php
					foreach ( $accesspresslite_catlist as $single_cat ) :
						$label = $single_cat['label']; ?>
						<option value="<?php echo esc_attr($single_cat['value']) ?>" <?php selected( $single_cat['value'], $settings['event_cat'] ); ?>><?php echo esc_attr($label); ?></option>
					<?php 
					endforeach;
					?>
					</select>
					</td>
					</tr>

					<tr><th scope="row"><label for="testimonial_cat"><?php esc_html_e('Select the category to display as Testimonials','accesspress-lite'); ?></label></th>
					<td>
					<select id="testimonial_cat" name="accesspresslite_options[testimonial_cat]">
					<?php
					foreach ( $accesspresslite_catlist as $single_cat ) :
						$label = $single_cat['label']; ?>
						<option value="<?php echo esc_attr($single_cat['value']) ?>" <?php selected( $single_cat['value'], $settings['testimonial_cat'] ); ?>><?php echo esc_attr($label); ?></option>
					<?php 
					endforeach;
					?>
					</select>
					</td>
					</tr>

					<tr><th scope="row"><label for="portfolio_cat"><?php esc_html_e('Select the category to display as Portfolio/Products','accesspress-lite'); ?></label></th>
					<td>
					<select id="portfolio_cat" name="accesspresslite_options[portfolio_cat]">
					<?php
					foreach ( $accesspresslite_catlist as $single_cat ) :
						$label = $single_cat['label']; ?>
						<option value="<?php echo esc_attr($single_cat['value']) ?>" <?php selected( $single_cat['value'], $settings['portfolio_cat'] ); ?>><?php echo esc_attr($label); ?></option>
					<?php 
					endforeach;
					?>
					</select>
					</td>
					</tr>

					<tr>
						<td colspan="2">
							<em><?php esc_html_e('You can show these categories in the menu by configuring','accesspress-lite'); ?> <a target="_blank" href="<?php echo esc_url(admin_url('nav-menus.php')); ?>">Menus</a> <?php esc_html_e('Page.','accesspress-lite'); ?></em>
						</td>
					</tr>

					<tr><td colspan="2" class="seperator">&nbsp;</td></tr>

					<tr>
    					<th scope="row"><label for="footer_copyright"><?php esc_html_e('Footer Copyright Text','accesspress-lite'); ?></label></th>
    					<td>
    					   <input id="footer_copyright" name="accesspresslite_options[footer_copyright]" type="text" value="<?php echo esc_attr($settings['footer_copyright']); ?>" />
    					</td>
					</tr>
				</table>
			</div>
            
            <!-- Home page Settings -->
			<div id="options-group-2" class="group" style="display: none;">
			<h3><?php esc_html_e('Home Page Settings','accesspress-lite'); ?></h3> 
				<table class="form-table">
                    <tr><th scope="row"><label for="home_page_layout"><?php esc_html_e('Home Page Layout','accesspress-lite'); ?></label></th>
					<td>
					<?php $accesspresslite_home_page_layouts = array('Default'=>__('Default','accesspress-lite'),'Layout1' => __('Layout1','accesspress-lite'),'Layout2' => __('Layout2','accesspress-lite') ); ?>
					<?php
					foreach ( $accesspresslite_home_page_layouts as $accesspresslite_home_page_layout_key => $accesspresslite_home_page_layout ) : ?>
                    <div class="layout-img">
						
						<label for="<?php echo esc_attr($accesspresslite_home_page_layout); ?>">
                        <img src="<?php echo esc_url(get_template_directory_uri().'/images/demo/'.$accesspresslite_home_page_layout_key.'.jpg'); ?>"/>
                        <div class="">
                        <input type="radio" id="<?php echo esc_attr($accesspresslite_home_page_layout); ?>" name="accesspresslite_options[accesspresslite_home_page_layout]" value="<?php echo esc_attr($accesspresslite_home_page_layout_key); ?>" <?php checked( $settings['accesspresslite_home_page_layout'], $accesspresslite_home_page_layout_key ); ?> />
                        <?php echo esc_attr($accesspresslite_home_page_layout);?></div>
                        </label>
                    </div>
					<?php endforeach; ?>
					</td>
					</tr>

					<tr><td colspan="2" class="seperator">&nbsp;</td></tr>

					<tr>
						<th><label for="featured_bar"><?php esc_html_e('Call To action','accesspress-lite'); ?></label></th>
					</tr>

					<tr><td colspan="2" class="seperator">&nbsp;</td></tr>

					<tr>
						<th><label for="call_to_action"><?php esc_html_e('Text','accesspress-lite'); ?></label></th>
						<td>
							<textarea rows="4" cols="60" name="accesspresslite_options[action_text]" placeholder="Write Call to Action Text"><?php if(!empty($settings['action_text'])) echo esc_textarea($settings['action_text']); ?></textarea>
						</td>
					</tr>

					<tr>
						<th><label for="call_to_action"><?php esc_html_e('Read More Button Text','accesspress-lite'); ?></label></th>
						<td>
							<input type="text" name="accesspresslite_options[action_btn_text]" value="<?php if(!empty($settings['action_btn_text'])) echo esc_attr($settings['action_btn_text']); ?>">
						</td>
					</tr>

					<tr>
						<th><label for="call_to_action"><?php esc_html_e('Read More Button link','accesspress-lite'); ?></label></th>
						<td>
							<input type="text" name="accesspresslite_options[action_btn_link]" value="<?php if(!empty($settings['action_btn_link'])) echo esc_url($settings['action_btn_link']); ?>">
						</td>
					</tr>

					<tr><td colspan="2" class="seperator">&nbsp;</td></tr>

					<tr><th scope="row"><label for="welcome_post"><?php esc_html_e('Welcome Post','accesspress-lite'); ?></label></th>
					<td>
					<select id="welcome_post" name="accesspresslite_options[welcome_post]">
					<?php
					foreach ( $accesspresslite_postpagelist as $single_post ) :
						$label = $single_post['label']; ?>
						<option value="<?php echo esc_attr($single_post['value']) ?>" <?php selected( $single_post['value'], $settings['welcome_post'] ); ?>><?php echo esc_attr($label); ?></option>
					<?php endforeach;
					?>
					</select>
					</td>
					</tr>

					<tr>
						<th><label for="full_content"><?php esc_html_e('Show Full Content?','accesspress-lite'); ?></label></th>
						<td>
							<input type="checkbox" id="full_content" name="accesspresslite_options[welcome_post_content]" value="1" <?php checked( true, $settings['welcome_post_content'] ); ?> />
							<label for="full_content"><?php esc_html_e('Check to enable','accesspress-lite'); ?></label><br />
						</td>
					</tr>

					<tr>
						<th><label for="welcome_post_char"><?php esc_html_e('Welcome Post Excerpt Character','accesspress-lite'); ?></label></th>
						<td><input id="welcome_post_char" type="text" name="accesspresslite_options[welcome_post_char]" value="<?php if (isset($settings['welcome_post_char'])){ echo esc_attr($settings['welcome_post_char']); } ?>"> <?php esc_html_e('Characters','accesspress-lite'); ?></td>
					</tr>

					<tr>
						<th><label for="welcome_post_readmore"><?php esc_html_e('Read More Text','accesspress-lite'); ?></label></th>
						<td><input id="welcome_post_readmore" type="text" name="accesspresslite_options[welcome_post_readmore]" value="<?php if (isset($settings['welcome_post_readmore'])){ echo esc_attr($settings['welcome_post_readmore']); } ?>"><br /><em class="f13"><?php esc_html_e('Leave blank if you don\'t want to show read more','accesspress-lite'); ?></em></td>
					</tr>

					<tr><td colspan="2" class="seperator">&nbsp;</td></tr>

					<tr>
						<th><label for="show_eventdate"><?php esc_html_e('Disable Event Section?','accesspress-lite'); ?></label></th>
						<td>
							<input type="checkbox" id="disable_event" name="accesspresslite_options[disable_event]" value="1" <?php checked( true, $settings['disable_event'] ); ?> />
							<label for="disable_event"><?php esc_html_e('Check to Disable','accesspress-lite'); ?></label><br />
							<em class="f13"><?php esc_html_e('The welcome post will cover the full width if disabled.','accesspress-lite'); ?></em>
						</td>
					</tr>

					<tr>
						<th><label for="show_event_number"><?php esc_html_e('No of Items to display in Event/News Category(Righ side of Welcome Post)','accesspress-lite'); ?></label></th>
						<td><input id="show_event_number" type="text" name="accesspresslite_options[show_event_number]" value="<?php if (isset($settings['show_event_number'])){ echo esc_attr($settings['show_event_number']); } ?>"></td>
					</tr>

					<tr>
						<th><label for="show_eventdate"><?php esc_html_e('Show Event Date?','accesspress-lite'); ?></label></th>
						<td>
							<input type="checkbox" id="show_eventdate" name="accesspresslite_options[show_eventdate]" value="1" <?php checked( true, $settings['show_eventdate'] ); ?> />
							<label for="show_eventdate"><?php esc_html_e('Check to enable','accesspress-lite'); ?></label>
						</td>
					</tr>

					<tr>
						<td colspan="2"><em><?php esc_html_e('To replace the Event section in homepage, Go to', 'accesspress-lite'); ?> <a href="<?php echo esc_url(admin_url('widgets.php')); ?>" target="blank"><?php esc_html_e('widget','accesspress-lite'); ?></a> <?php esc_html_e('and drag widget item into the Event Sidebar Widget area.', 'accesspress-lite' ); ?></em></td>
					</tr>

					<tr><td colspan="2" class="seperator">&nbsp;</td></tr>

					<tr>
						<th><label for="show_fontawesome"><?php esc_html_e('Show Font Awesome icon for Featured Post?','accesspress-lite'); ?></label></th>
						<td>
							<input type="checkbox" id="show_fontawesome" name="accesspresslite_options[show_fontawesome]" value="1" <?php checked( true, $settings['show_fontawesome'] ); ?> />
							<label for="show_fontawesome"><?php esc_html_e('Check to enable','accesspress-lite'); ?></label><br />
                            <em class="f13"><?php esc_html_e('(If enabled the featured image will be replaced by Font Awesome Icon. For lists of icons click','accesspress-lite'); ?> <a href="<?php echo esc_url('http://fontawesome.io/icons/'); ?>" target="_blank"><?php esc_html_e('here','accesspress-lite'); ?></a>)</em>
						</td>
					</tr>
                    
                    <tr>
						<th><label for="big_icons"><?php esc_html_e('Show Big Font Awesome icon with center aligned','accesspress-lite'); ?></label></th>
						<td>
							<input type="checkbox" id="big_icons" name="accesspresslite_options[big_icons]" value="1" <?php checked( true, $settings['big_icons'] ); ?> />
							<label for="big_icons"><?php esc_html_e('Check to enable','accesspress-lite'); ?></label><br />
						</td>
					</tr>
                    <tr><th scope="row"><label for="featured_post1"><?php esc_html_e('Featured Section Title','accesspress-lite'); ?></label></th>
					<td>
                       <input id="featured_section_title" name="accesspresslite_options[featured_section_title]" type="text" value="<?php if ( isset($settings['featured_section_title'])){echo esc_attr($settings['featured_section_title']); } ?>" placeholder="<?php esc_html_e('Features Section Title','accesspress-lite'); ?>" />
					</td>
					</tr>
					<tr><th scope="row"><label for="featured_post1"><?php esc_html_e('Featured Post 1','accesspress-lite'); ?></label></th>
					<td>
					<select id="featured_post1" name="accesspresslite_options[featured_post1]">
					<?php
					foreach ( $accesspresslite_postpagelist as $single_post ) :
						$label = $single_post['label']; ?>
						<option value="<?php echo esc_attr($single_post['value']) ?>" <?php selected( $single_post['value'], $settings['featured_post1'] ); ?>><?php echo esc_attr($label); ?></option>
					<?php 
					endforeach;
					?>
					</select>
					<input id="featured_post1_icon" name="accesspresslite_options[featured_post1_icon]" type="text" value="<?php echo esc_attr($settings['featured_post1_icon']); ?>" placeholder="<?php esc_html_e('Font Awesome icon name','accesspress-lite'); ?>" /><em class="f13">&nbsp;&nbsp;<?php esc_html_e('Example:','accesspress-lite'); ?> fa-bell</em>
					</td>
					</tr>

					<tr><th scope="row"><label for="featured_post2"><?php esc_html_e('Featured Post 2','accesspress-lite'); ?></label></th>
					<td>
					<select id="featured_post2" name="accesspresslite_options[featured_post2]">
					<?php
					foreach ( $accesspresslite_postpagelist as $single_post ) :
						$label = $single_post['label']; ?>
						<option value="<?php echo esc_attr($single_post['value']) ?>" <?php selected( $single_post['value'], $settings['featured_post2'] ); ?>><?php echo esc_attr($label); ?></option>
					<?php
					endforeach;
					?>
					</select>
					<input id="featured_post2_icon" name="accesspresslite_options[featured_post2_icon]" type="text" value="<?php echo esc_attr($settings['featured_post2_icon']); ?>" placeholder="<?php esc_html_e('Font Awesome icon name','accesspress-lite'); ?>" /><em class="f13">&nbsp;&nbsp;<?php esc_html_e('Example:','accesspress-lite'); ?> fa-bell</em>
					</td>
					</tr>

					<tr><th scope="row"><label for="featured_post3"><?php esc_html_e('Featured Post 3','accesspress-lite'); ?></label></th>
					<td>
					<select id="featured_post3" name="accesspresslite_options[featured_post3]">
					<?php
					foreach ( $accesspresslite_postpagelist as $single_post ) :
						$label = $single_post['label']; ?>
						<option value="<?php echo esc_attr($single_post['value']) ?>" <?php selected( $single_post['value'], $settings['featured_post3'] ); ?>><?php echo esc_attr($label); ?></option>
					<?php 
					endforeach;
					?>
					</select>
					<input id="featured_post3_icon" name="accesspresslite_options[featured_post3_icon]" type="text" value="<?php echo esc_attr($settings['featured_post3_icon']); ?>" placeholder="<?php esc_html_e('Font Awesome icon name','accesspress-lite'); ?>" /><em class="f13">&nbsp;&nbsp;<?php esc_html_e('Example:','accesspress-lite'); ?> fa-bell</em>
					</td>
					</tr>

					<tr>
						<th><label for="featured_post_readmore"><?php esc_html_e('Read More Text','accesspress-lite'); ?></label></th>
						<td><input id="featured_post_readmore" type="text" name="accesspresslite_options[featured_post_readmore]" value="<?php if ( isset($settings['featured_post_readmore'])){echo esc_attr($settings['featured_post_readmore']); } ?>"><br /><em class="f13"><?php esc_html_e('Leave blank if you don\'t want to show read more','accesspress-lite'); ?></em></td>
					</tr>
                    
                    <tr><td colspan="2" class="seperator">&nbsp;</td></tr>
                    
                    <tr>
					<th scope="row"><label for="gallery_code"><?php esc_html_e('Gallery Short Code','accesspress-lite'); ?></label></th>
					<td>
					<textarea id="gallery_code" name="accesspresslite_options[gallery_code]" rows="3" cols="30" placeholder='[gallery link="file" ids="203,204,205,206,207,208"]'><?php echo esc_attr($settings['gallery_code']); ?></textarea>
                    </td>
					</tr>
                    
                    <tr>
                        <td colspan="2">
                        <em><?php esc_html_e('You can replace the gallery and testimonial section of the home page with custom widget','accesspress-lite'); ?> <a href="<?php echo esc_url(admin_url('/widgets.php')); ?>" target="_blank"><?php esc_html_e('here','accesspress-lite'); ?></a></em>
                        </td>
                    </tr>

                    <tr><td colspan="2" class="seperator">&nbsp;</td></tr>

                    <tr>
						<th><label for="featured_bar"><?php esc_html_e('Disable Featured Bar (above footer)','accesspress-lite'); ?></label></th>
						<td>
							<input type="checkbox" id="featured_bar" name="accesspresslite_options[featured_bar]" value="1" <?php checked( true, $settings['featured_bar'] ); ?> />
							<label for="featured_bar"><?php esc_html_e('Check to disable','accesspress-lite'); ?></label><br />
						</td>
					</tr>
                </table>
            </div>


			<!-- Slider Settings-->
			<div id="options-group-3" class="group" style="display: none;">
			<h3><?php esc_html_e('Home Page Slider Settings','accesspress-lite'); ?></h3>
				<table class="form-table">
				<tbody>
					<tr class="slider-options">
						<th>
							<?php esc_html_e('Show','accesspress-lite'); ?>
						</th>
						<td>
						<?php 
						if(!isset($settings['slider_options'])){
							$settings['slider_options']='single_post_slider';
						}
						?>
						<label class="checkbox" id="single_post_slider">
							<input value="single_post_slider" type="radio" name="accesspresslite_options[slider_options]" <?php checked($settings['slider_options'],'single_post_slider'); ?> ><?php esc_html_e('Single Posts as a Slider','accesspress-lite'); ?>
						</label>
						&nbsp;&nbsp;&nbsp;&nbsp;
						<label class="checkbox" id="cat_post_slider">
							<input value="cat_post_slider" name="accesspresslite_options[slider_options]" type="radio" <?php checked($settings['slider_options'],'cat_post_slider'); ?> ><?php esc_html_e('Category Posts as a Slider','accesspress-lite'); ?>
						</label>
						</td>
					</tr>

					<tr><td colspan="2" class="seperator">&nbsp;</td></tr>
					</tbody>

					<tbody class="post-as-slider">
					<tr>
						<td colspan="2"><em class="f13"><?php esc_html_e('Select the post that you want to display as a Slider','accesspress-lite'); ?></em></td>
					</tr>

					<tr>
					
					<th scope="row"><label for="slider1"><?php esc_html_e('Silder 1','accesspress-lite'); ?></label></th>
					<td>
					<select id="slider1" name="accesspresslite_options[slider1]">
					<?php
					foreach ( $accesspresslite_postlist as $single_post ) :
						$label = $single_post['label']; ?>
						<option value="<?php echo esc_attr($single_post['value']); ?>" <?php selected($single_post['value'] , $settings['slider1'] ) ?>><?php echo esc_attr($label); ?></option>
					<?php
					endforeach;
					?>
					</select>
					</td>
					</tr>

					<tr><th scope="row"><label for="slider2"><?php esc_html_e('Silder 2','accesspress-lite'); ?></label></th>
					<td>
					<select id="slider2" name="accesspresslite_options[slider2]">
					<?php
					foreach ( $accesspresslite_postlist as $single_post ) :
						$label = $single_post['label']; ?>
                        <option value="<?php echo esc_attr($single_post['value']); ?>" <?php selected($single_post['value'] , $settings['slider2'] ) ?>><?php echo esc_attr($label); ?></option>
					<?php
					endforeach;
					?>
					</select>
					</td>
					</tr>

					<tr><th scope="row"><label for="slider3"><?php esc_html_e('Silder 3','accesspress-lite'); ?></label></th>
					<td>
					<select id="slider3" name="accesspresslite_options[slider3]">
					<?php
					foreach ( $accesspresslite_postlist as $single_post ) :
						$label = $single_post['label']; ?>
						<option value="<?php echo esc_attr($single_post['value']); ?>" <?php selected($single_post['value'] , $settings['slider3'] ) ?>><?php echo esc_attr($label); ?></option>
					<?php
					endforeach;
					?>
					</select>
					</td>
					</tr>

					<tr>
					<th scope="row"><label for="slider4"><?php esc_html_e('Silder 4','accesspress-lite'); ?></label></th>
					<td>
					<select id="slider4" name="accesspresslite_options[slider4]">
					<?php
					foreach ( $accesspresslite_postlist as $single_post ) :
						$label = $single_post['label']; ?>
						<option value="<?php echo esc_attr($single_post['value']); ?>" <?php selected($single_post['value'] , $settings['slider4'] ) ?>><?php echo esc_attr($label); ?></option>
					<?php
					endforeach;
					?>
					</select>
					</td>
					</tr>
					</tbody>

					<tbody class="cat-as-slider">
					<tr>
					<th><?php esc_html_e('Select the Category','accesspress-lite'); ?></th>
					<td>
					<?php 
					if(!isset($settings['slider_cat'])){
						$settings['slider_cat']=0;
					}
					?>
						<select id="slider_cat" name="accesspresslite_options[slider_cat]">
						<?php
						foreach ( $accesspresslite_catlist as $single_cat ) :
							$label = $single_cat['label']; ?>
							<option value="<?php echo esc_attr($single_cat['value']) ?>" <?php selected( $single_cat['value'] , $settings['slider_cat'] )  ?>><?php echo esc_attr($label); ?></option>
						<?php
						endforeach;
						?>
					</select>
					</td>
					</tr>
					</tbody>
					
					<tbody>
					<tr><td colspan="2" class="seperator">&nbsp;</td></tr>
					
					<tr>
						<td colspan="2"><em class="f13"><?php esc_html_e('Adjust the slider as per your need.','accesspress-lite'); ?></em></td>
					</tr>

					<tr><th scope="row"><?php esc_html_e('Show Slider','accesspress-lite'); ?></th>
					<td>
					<?php foreach( $accesspresslite_slider as $slider ) : ?>
					<input type="radio" id="<?php echo esc_attr($slider['value']); ?>" name="accesspresslite_options[show_slider]" value="<?php echo esc_attr($slider['value']); ?>" <?php checked( $settings['show_slider'], $slider['value'] ); ?> />
					<label for="<?php echo esc_attr($slider['value']); ?>"><?php echo esc_attr($slider['label']); ?></label><br />
					<?php endforeach; ?>
					</td>
					</tr>

					<tr><th scope="row"><?php esc_html_e('Show Slider Pager (Navigation dots)','accesspress-lite'); ?></th>
					<td>
					<?php foreach( $accesspresslite_slider_show_pager as $slider_pager ) : ?>
					<input type="radio" id="<?php echo esc_attr($slider_pager['value']); ?>" name="accesspresslite_options[slider_show_pager]" value="<?php echo esc_attr($slider_pager['value']); ?>" <?php checked( $settings['slider_show_pager'], $slider_pager['value'] ); ?> />
					<label for="<?php echo esc_attr($slider_pager['value']); ?>"><?php echo esc_attr($slider_pager['label']); ?></label><br />
					<?php endforeach; ?>
					</td>
					</tr>

					<tr><th scope="row"><?php esc_html_e('Show Slider Controls (Arrows)','accesspress-lite'); ?></th>
					<td>
					<?php foreach( $accesspresslite_slider_show_controls as $slider_controls ) : ?>
					<input type="radio" id="<?php echo esc_attr($slider_controls['value']); ?>" name="accesspresslite_options[slider_show_controls]" value="<?php echo esc_attr($slider_controls['value']); ?>" <?php checked( $settings['slider_show_controls'], $slider_controls['value'] ); ?> />
					<label for="<?php echo esc_attr($slider_controls['value']); ?>"><?php echo esc_attr($slider_controls['label']); ?></label><br />
					<?php endforeach; ?>
					</td>
					</tr>

					<tr><th scope="row"><?php esc_html_e('Slider Transition - fade/slide','accesspress-lite'); ?></th>
					<td>
					<?php foreach( $accesspresslite_slider_mode as $slider_modes) : ?>
					<input type="radio" id="<?php echo esc_attr($slider_modes['value']); ?>" name="accesspresslite_options[slider_mode]" value="<?php echo esc_attr($slider_modes['value']); ?>" <?php checked( $settings['slider_mode'], $slider_modes['value'] ); ?> />
					<label for="<?php echo esc_attr($slider_modes['value']); ?>"><?php echo esc_attr($slider_modes['label']); ?></label><br />
					<?php endforeach; ?>
					</td>
					</tr>

					<tr><th scope="row"><?php esc_html_e('Slider auto Transition','accesspress-lite'); ?></th>
					<td>
					<?php foreach( $accesspresslite_slider_auto as $slider_autos) : ?>
					<input type="radio" id="<?php echo esc_attr($slider_autos['value']); ?>" name="accesspresslite_options[slider_auto]" value="<?php echo esc_attr($slider_autos['value']); ?>" <?php checked( $settings['slider_auto'], $slider_autos['value'] ); ?> />
					<label for="<?php echo esc_attr($slider_autos['value']); ?>"><?php echo esc_attr($slider_autos['label']); ?></label><br />
					<?php endforeach; ?>
					</td>
					</tr>

					<tr><th scope="row"><?php esc_html_e('Slider Speed','accesspress-lite'); ?></th>
					<td>
					<input id="slider_speed" name="accesspresslite_options[slider_speed]" type="text" value="<?php echo esc_attr($settings['slider_speed']); ?>" />
					</td>
					</tr>

					<tr><th scope="row"><?php esc_html_e('Slider Pause','accesspress-lite'); ?></th>
					<td>
					<input id="slider_pause" name="accesspresslite_options[slider_pause]" type="text" value="<?php echo esc_attr($settings['slider_pause']); ?>" />
					</td>
					</tr>

					<tr><th scope="row"><?php esc_html_e('Show Slider Captions','accesspress-lite'); ?></th>
					<td>
					<?php foreach( $accesspresslite_slider_caption as $slider_captions) : ?>
					<input type="radio" id="<?php echo esc_attr($slider_captions['value']); ?>" name="accesspresslite_options[slider_caption]" value="<?php echo esc_attr($slider_captions['value']); ?>" <?php checked( $settings['slider_caption'], $slider_captions['value'] ); ?> />
					<label for="<?php echo esc_attr($slider_captions['value']); ?>"><?php echo esc_attr($slider_captions['label']); ?></label><br />
					<?php endforeach; ?>
					</td>
					</tr>
					</tbody>
				</table>
			</div>

			<!-- Slider Settings-->
			<div id="options-group-4" class="group" style="display: none;">
			<h3><?php esc_html_e('Sidebar Settings','accesspress-lite'); ?></h3>
				<table class="form-table">
				<tr>
					<td>
						<table>
						<tbody>
						<tr><th colspan="2" class="line"><?php esc_html_e('Left Sidebar Options','accesspress-lite'); ?></th></tr>
						<tr>
							<th><label for="leftsidebar_show_latest_events"><?php esc_html_e('Show Latest Events?','accesspress-lite'); ?></label></th>
							<td>
							<input type="checkbox" id="leftsidebar_show_latest_events" name="accesspresslite_options[leftsidebar_show_latest_events]" value="1" <?php checked( true, $settings['leftsidebar_show_latest_events'] ); ?> />
							<label for="leftsidebar_show_latest_events"><?php esc_html_e('Check to enable','accesspress-lite'); ?></label>
							</td>
						</tr>

						<tr>
							<th><label for="leftsidebar_show_testimonials"><?php esc_html_e('Show Testimonials?','accesspress-lite'); ?></label></th>
							<td>
							<input type="checkbox" id="leftsidebar_show_testimonials" name="accesspresslite_options[leftsidebar_show_testimonials]" value="1" <?php checked( true, $settings['leftsidebar_show_testimonials'] ); ?> />
							<label for="leftsidebar_show_testimonials"><?php esc_html_e('Check to enable','accesspress-lite'); ?></label>
							</td>
						</tr>

						<tr>
							<th colspan="2"><?php esc_html_e('To add Custom widget in Left Sidebar, Click','accesspress-lite'); ?> <a href="<?php echo esc_url(admin_url('/widgets.php')); ?>" target="_blank"><?php esc_html_e('here','accesspress-lite'); ?></a></th>
						</tr>
						</table>

					</td>
					<td>
						<table>
						<tr><th colspan="2" class="line"><?php esc_html_e('Right Sidebar Options','accesspress-lite'); ?></th></tr>
						<tr>
							<th><label for="rightsidebar_show_latest_events"><?php esc_html_e('Show Latest Events?','accesspress-lite'); ?></label></th>
							<td>
							<input type="checkbox" id="rightsidebar_show_latest_events" name="accesspresslite_options[rightsidebar_show_latest_events]" value="1" <?php checked( true, $settings['rightsidebar_show_latest_events'] ); ?> />
							<label for="rightsidebar_show_latest_events"><?php esc_html_e('Check to enable','accesspress-lite'); ?></label>
							</td>
						</tr>

						<tr>
							<th><label for="rightsidebar_show_testimonials"><?php esc_html_e('Show Testimonials?','accesspress-lite'); ?></label></th>
							<td>
							<input type="checkbox" id="rightsidebar_show_testimonials" name="accesspresslite_options[rightsidebar_show_testimonials]" value="1" <?php checked( true, $settings['rightsidebar_show_testimonials'] ); ?> />
							<label for="rightsidebar_show_testimonials"><?php esc_html_e('Check to enable','accesspress-lite'); ?></label>
							</td>
						</tr>

						<tr>
							<th colspan="2"><?php esc_html_e('To add Custom widget in Right Sidebar, Click','accesspress-lite'); ?> <a href="<?php echo esc_url(admin_url('/widgets.php')); ?>" target="_blank"><?php esc_html_e('here','accesspress-lite'); ?></a></th>
						</tr>
						</table>

					</td>
				</tr>
				</tbody>
				<tbody>
					<tr>
						<td colspan="2"><?php esc_html_e('View All Text','accesspress-lite'); ?>&nbsp;&nbsp;
						<input type="text" name="accesspresslite_options[view_all_text]" value="<?php if (isset($settings['view_all_text'])){ echo esc_attr($settings['view_all_text']); } ?>" />&nbsp;&nbsp;<em class="f13"><?php esc_html_e('Leave blank if you don\'t want to show View All Text','accesspress-lite'); ?></em></td>
					</tr>
				</tbody>
				</table>
			</div>

			<!-- Social Settings-->
			<div id="options-group-5" class="group" style="display: none;">
			<h3><?php esc_html_e('Social links - Put your social url','accesspress-lite'); ?></h3>
				<table class="form-table social-urls">
					<tr>
						<td colspan="2"><em class="f13"><?php esc_html_e('Put your social url below.. Leave blank if you don\'t want to show it.','accesspress-lite'); ?></em></td>
					</tr>

					<tr>
						<th><label for="show_social_header"><?php esc_html_e('Disable Social icons in header?','accesspress-lite'); ?></label></th>
						<td>
							<input type="checkbox" id="show_social_header" name="accesspresslite_options[show_social_header]" value="1" <?php checked( true, $settings['show_social_header'] ); ?> />
							<label for="show_social_header"><?php esc_html_e('Check to disable','accesspress-lite'); ?></label>
						</td>
					</tr>

					<tr><th scope="row"><label for="accesspresslite_facebook">Facebook</label></th>
					<td>
					<input id="accesspresslite_facebook" name="accesspresslite_options[accesspresslite_facebook]" type="text" value="<?php echo esc_url($settings['accesspresslite_facebook']); ?>" />
					</td>
					</tr>

					<tr><th scope="row"><label for="accesspresslite_twitter">Twitter</label></th>
					<td>
					<input id="accesspresslite_twitter" name="accesspresslite_options[accesspresslite_twitter]" type="text" value="<?php echo esc_url($settings['accesspresslite_twitter']); ?>" />
					</td>
					</tr>

					<tr><th scope="row"><label for="accesspresslite_gplus">Google plus</label></th>
					<td>
					<input id="accesspresslite_gplus" name="accesspresslite_options[accesspresslite_gplus]" type="text" value="<?php echo esc_url($settings['accesspresslite_gplus']); ?>" />
					</td>
					</tr>

					<tr><th scope="row"><label for="accesspresslite_youtube">Youtube</label></th>
					<td>
					<input id="accesspresslite_youtube" name="accesspresslite_options[accesspresslite_youtube]" type="text" value="<?php echo esc_url($settings['accesspresslite_youtube']); ?>" />
					</td>
					</tr>

					<tr><th scope="row"><label for="accesspresslite_pinterest">Pinterest</label></th>
					<td>
					<input id="accesspresslite_pinterest" name="accesspresslite_options[accesspresslite_pinterest]" type="text" value="<?php echo esc_url($settings['accesspresslite_pinterest']); ?>" />
					</td>
					</tr>

					<tr><th scope="row"><label for="accesspresslite_linkedin">Linkedin</label></th>
					<td>
					<input id="accesspresslite_linkedin" name="accesspresslite_options[accesspresslite_linkedin]" type="text" value="<?php echo esc_url($settings['accesspresslite_linkedin']); ?>" />
					</td>
					</tr>

					<tr><th scope="row"><label for="accesspresslite_flickr">Flickr</label></th>
					<td>
					<input id="accesspresslite_flickr" name="accesspresslite_options[accesspresslite_flickr]" type="text" value="<?php echo esc_url($settings['accesspresslite_flickr']); ?>" />
					</td>
					</tr>

					<tr><th scope="row"><label for="accesspresslite_vimeo">Vimeo</label></th>
					<td>
					<input id="accesspresslite_vimeo" name="accesspresslite_options[accesspresslite_vimeo]" type="text" value="<?php echo esc_url($settings['accesspresslite_vimeo']); ?>" />
					</td>
					</tr>

					<tr><th scope="row"><label for="accesspresslite_stumbleupon">Stumbleupon</label></th>
					<td>
					<input id="accesspresslite_stumbleupon" name="accesspresslite_options[accesspresslite_stumbleupon]" type="text" value="<?php echo esc_url($settings['accesspresslite_stumbleupon']); ?>" />
					</td>
					</tr>

					<tr><th scope="row"><label for="accesspresslite_instagram">Instagram</label></th>
					<td>
					<input id="accesspresslite_instagram" name="accesspresslite_options[accesspresslite_instagram]" type="text" value="<?php if(isset($settings['accesspresslite_instagram'])) { echo esc_url($settings['accesspresslite_instagram']); } ?>" />
					</td>
					</tr>

					<tr><th scope="row"><label for="accesspresslite_sound_cloud">Sound Cloud</label></th>
					<td>
					<input id="accesspresslite_sound_cloud" name="accesspresslite_options[accesspresslite_sound_cloud]" type="text" value="<?php if(isset($settings['accesspresslite_sound_cloud'])) { echo esc_url($settings['accesspresslite_sound_cloud']); } ?>" />
					</td>
					</tr>

					<tr><th scope="row"><label for="accesspresslite_skype">Skype</label></th>
					<td>
					<input id="accesspresslite_skype" name="accesspresslite_options[accesspresslite_skype]" type="text" value="<?php echo esc_attr($settings['accesspresslite_skype']); ?>" />
					</td>
					</tr>

					<tr><th scope="row"><label for="accesspresslite_skype">Tumblr</label></th>
					<td>
					<input id="accesspresslite_tumblr" name="accesspresslite_options[accesspresslite_tumblr]" type="text" value="<?php echo esc_attr($settings['accesspresslite_tumblr']); ?>" />
					</td>
					</tr>

					<tr><th scope="row"><label for="accesspresslite_skype">Myspace</label></th>
					<td>
					<input id="accesspresslite_myspace" name="accesspresslite_options[accesspresslite_myspace]" type="text" value="<?php echo esc_attr($settings['accesspresslite_myspace']); ?>" />
					</td>
					</tr>

					<tr><th scope="row"><label for="accesspresslite_rss">RSS</label></th>
					<td>
					<input id="accesspresslite_rss" name="accesspresslite_options[accesspresslite_rss]" type="text" value="<?php echo esc_url($settings['accesspresslite_rss']); ?>" />
					</td>
					</tr>
				</table>
			</div>

			<!-- Footer-contact -->
			<div id="options-group-6" class="group" style="display: none;">
			<h3><?php esc_html_e('Footer Contact','accesspress-lite'); ?></h3>
				<table class="form-table">
					<tr><th scope="row"><label for="custom_css"><?php esc_html_e('Custom CSS','accesspress-lite'); ?></label></th>
						<td>
						<textarea id="custom_css" name="accesspresslite_options[custom_css]" rows="8" cols="60"><?php if(isset($settings['custom_css'])){ echo esc_textarea($settings['custom_css']); } ?></textarea>
						<p class="f13"><em><?php esc_html_e('Put your custom CSS','accesspress-lite'); ?></em></p>
						</td>
					</tr>
				</table>
			</div>

			<!-- About Accesspress Lite -->
			<div id="options-group-7" class="group" style="display: none;">
			<h3><?php esc_html_e('Know more about AccessPress Themes','accesspress-lite'); ?></h3>
				<table class="form-table">
					<tr>
					<td colspan="2">
						
						<p><?php esc_html_e('For Documentation, click','accesspress-lite'); ?> <a target="_blank" href="<?php echo esc_url('https://accesspressthemes.com/theme-instruction-accesspress-lite/'); ?>"><?php esc_html_e('here','accesspress-lite'); ?></a></p>
						<p><?php esc_html_e('For Video tutorials, click','accesspress-lite'); ?> <a target="_blank" href="<?php echo esc_url('https://www.youtube.com/watch?v=Mi60ORm_VMI&list=PLdSqn2S_qFxEzeboBioXZdAg5P4l32Hm3'); ?>"><?php esc_html_e('here','accesspress-lite'); ?></a></p>
						<p><?php esc_html_e('Live Preview, click','accesspress-lite'); ?> <a target="_blank" href="<?php echo esc_url('https://accesspressthemes.com/theme-demos/?theme=accesspress-lite'); ?>"><?php esc_html_e('here','accesspress-lite'); ?></a></p>
						<hr />

						<h4 class="accesspress-child-theme"><?php esc_html_e('New Child Theme of AccessPress Lite','accesspress-lite'); ?></h4>
						<p class="accesspress-child-theme"><?php esc_html_e('Check Demo Here - ','accesspress-lite'); ?> <a target="_blank" href="<?php echo esc_url('https://accesspressthemes.com/theme-demos/?theme=ap-lite'); ?>"><?php echo esc_url('http://accesspressthemes.com/theme-demos/?theme=ap-lite'); ?></a></p>
						<p class="accesspress-child-theme"><?php esc_html_e('Download Here - ','accesspress-lite'); ?> <a target="_blank" href="<?php echo esc_url('https://wordpress.org/themes/aplite/'); ?>"><?php echo esc_url('https://wordpress.org/themes/aplite/'); ?></a></p>

						<hr />

						<h4><?php esc_html_e('Our other Products','accesspress-lite'); ?></h4>
						<p><?php esc_html_e('Themes - ','accesspress-lite'); ?><a target="_blank" href="<?php echo esc_url('https://accesspressthemes.com/wordpress-themes'); ?>"><?php echo esc_url('https://accesspressthemes.com/wordpress-themes/'); ?></a></p>
						<p><?php esc_html_e('Plugins - ','accesspress-lite'); ?><a target="_blank" href="<?php echo esc_url('https://accesspressthemes.com/plugins'); ?>"><?php echo esc_url('https://accesspressthemes.com/plugins'); ?></a></p>
						<hr />
						<h4><?php esc_html_e('Get in touch','accesspress-lite'); ?></h4>

						<p>
						<?php esc_html_e('If you have any question/feedback regarding theme, please post in our forum','accesspress-lite'); ?><br/>
						<?php esc_html_e('Forum:','accesspress-lite'); ?> <a target="_blank" href="<?php echo esc_url('https://accesspressthemes.com/support/'); ?>"><?php echo esc_url('https://accesspressthemes.com/support/'); ?></a><br/>
						
						<br />

						<?php esc_html_e('For Queries Regading Pro Themes','accesspress-lite'); ?><br/>
						<a href="mailto:support@accesspressthemes.com">support@accesspressthemes.com</a><br/>
                        <input id="template_option_selected" name="accesspresslite_options[template_option_selected]" type="hidden" value="yes" />
						</p>
						</td>
					</tr>
				</table>
			</div>

			<div id="optionsframework-submit">
			<input type="submit" class="button-primary" value="<?php esc_html_e('Save Options','accesspress-lite'); ?>" />
			</div>

			</form>
		</div><!-- #optionsframework -->
		<div class="update-banner">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/admin-panel/images/upgrade-top.jpg">
			<div class="button-link">
				<a href="<?php echo esc_url('http://accesspressthemes.com/theme-demos/?theme=accesspress-pro'); ?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/admin-panel/images/demo-btn.png"></a>
				<a href="<?php echo esc_url('https://accesspressthemes.com/wordpress-themes/accesspress-pro/'); ?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/admin-panel/images/upgrade-btn.png"></a>
			</div>
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/admin-panel/images/upgrade-bottom.jpg">
			<div class="button-link">
				<a href="<?php echo esc_url('http://accesspressthemes.com/theme-demos/?theme=accesspress-pro'); ?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/admin-panel/images/demo-btn.png"></a>
				<a href="<?php echo esc_url('https://accesspressthemes.com/wordpress-themes/accesspress-pro/'); ?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/admin-panel/images/upgrade-btn.png"></a>
			</div>

			<div class="any-question">
				<?php /* translators: %s : contact page link */ echo sprintf(__('Any question!! Click <a href="%s" target="_blank">here</a> for Live Chat.','accesspress-lite'),esc_url('https://accesspressthemes.com/contact/')); ?>
			</div>
		</div>
	</div><!-- #optionsframework-metabox -->
	</div>

	<?php
}


function accesspresslite_validate_options( $input ) {
	global $accesspresslite_options, $accesspresslite_menu_alignments, $accesspresslite_postlist, $accesspresslite_slider, $accesspresslite_slider_show_pager, $accesspresslite_slider_show_controls, $accesspresslite_slider_mode, $accesspresslite_slider_auto, $accesspresslite_slider_caption;

	$settings = get_option( 'accesspresslite_options', $accesspresslite_options );
	
	// We strip all tags from the text field, to avoid vulnerablilties.
    $input['welcome_post'] = wp_filter_nohtml_kses( $input['welcome_post'] );
    $input['slider_options'] = wp_filter_nohtml_kses( $input['slider_options'] );
    $input['featured_section_title'] = sanitize_text_field( $input['featured_section_title'] );
    $input['featured_post1'] = wp_filter_nohtml_kses( $input['featured_post1'] );
    $input['featured_post2'] = wp_filter_nohtml_kses( $input['featured_post2'] );
    $input['featured_post3'] = wp_filter_nohtml_kses( $input['featured_post3'] );
    $input['featured_post1_icon'] = sanitize_text_field( $input['featured_post1_icon'] );
    $input['featured_post2_icon'] = sanitize_text_field( $input['featured_post2_icon'] );
    $input['featured_post3_icon'] = sanitize_text_field( $input['featured_post3_icon'] );
    $input['event_cat'] = wp_filter_nohtml_kses( $input['event_cat'] );
    $input['testimonial_cat'] = wp_filter_nohtml_kses( $input['testimonial_cat'] );
    $input['portfolio_cat'] = wp_filter_nohtml_kses( $input['portfolio_cat'] );
    $input['slider_cat'] = wp_filter_nohtml_kses( $input['slider_cat'] );
    $input['menu_alignment'] = wp_filter_nohtml_kses( $input['menu_alignment'] );
    $input['slider_speed'] = sanitize_text_field( $input['slider_speed'] );
    $input['footer_copyright'] = sanitize_text_field( $input['footer_copyright'] );
    $input['featured_post_readmore'] = sanitize_text_field( $input['featured_post_readmore'] );
    $input['welcome_post_readmore'] = sanitize_text_field( $input['welcome_post_readmore'] );
    $input['view_all_text'] = sanitize_text_field( $input['view_all_text'] );
    $input['action_text'] = sanitize_text_field( $input['action_text'] );
    $input['action_btn_text'] = sanitize_text_field( $input['action_btn_text'] );
    $input['accesspresslite_home_template'] = sanitize_text_field( $input['accesspresslite_home_template'] );
    $input['custom_css'] = wp_filter_nohtml_kses( $input['custom_css'] );
    $input['template_option_selected'] = sanitize_text_field( $input['template_option_selected'] );

    // We select the previous value of the field, to restore it in case an invalid entry has been given
	$prev = $settings['featured_post1'];
	// We verify if the given value exists in the layouts array	
	
	$prev = $settings['show_slider'];
	if ( !array_key_exists( $input['show_slider'], $accesspresslite_slider ) )
		$input['show_slider'] = $prev;

	$prev = $settings['slider_show_pager'];
	if ( !array_key_exists( $input['slider_show_pager'], $accesspresslite_slider_show_pager ) )
		$input['slider_show_pager'] = $prev;

	$prev = $settings['slider_show_controls'];
	if ( !array_key_exists( $input['slider_show_controls'], $accesspresslite_slider_show_controls) )
		$input['slider_show_controls'] = $prev;

	$prev = $settings['slider_mode'];
	if ( !array_key_exists( $input['slider_mode'], $accesspresslite_slider_mode ) )
		$input['slider_mode'] = $prev;

	$prev = $settings['slider_auto'];
	if ( !array_key_exists( $input['slider_auto'], $accesspresslite_slider_auto ) )
		$input['slider_auto'] = $prev;

	$prev = $settings['slider_caption'];
	if ( !array_key_exists( $input['slider_caption'], $accesspresslite_slider_caption ) )
		$input['slider_caption'] = $prev;
        
    if (isset( $input['slider_speed'] ) ){
        if(intval($input['slider_speed'])){
            $input['slider_speed'] = absint($input['slider_speed']);
        }
    }

    if (!isset( $input['slider_pause'] ) || empty( $input['slider_pause'] ) ){
        $input['slider_pause']= "5000";
    }else{
    	if(intval($input['slider_pause'])){
            $input['slider_pause'] = absint($input['slider_pause']);
        }
    }

    if (!isset( $input['welcome_post_char'] ) || empty( $input['welcome_post_char'] ) ){
        $input['welcome_post_char']= "650";
    }else{
    	if(intval($input['welcome_post_char'])){
            $input['welcome_post_char'] = absint($input['welcome_post_char']);
        }
    }

    if (!isset( $input['show_event_number'] ) || empty( $input['show_event_number'] )){
       	$input['show_event_number']= "3";
    }else{
    	 if(intval($input['show_event_number'])){
            $input['show_event_number'] = absint($input['show_event_number']);
        }
    }


	// If the checkbox has not been checked, we void it
	if ( ! isset( $input['responsive_design'] ) )
		$input['responsive_design'] = null;
	// We verify if the input is a boolean value
	$input['responsive_design'] = ( $input['responsive_design'] == 1 ? 1 : 0 );

	if ( ! isset( $input['show_search'] ) )
		$input['show_search'] = null;
	$input['show_search'] = ( $input['show_search'] == 1 ? 1 : 0 );

	if ( ! isset( $input['show_fontawesome'] ) )
		$input['show_fontawesome'] = null;
	$input['show_fontawesome'] = ( $input['show_fontawesome'] == 1 ? 1 : 0 );
    
    if ( ! isset( $input['big_icons'] ) )
		$input['big_icons'] = null;
	$input['big_icons'] = ( $input['big_icons'] == 1 ? 1 : 0 );

	if ( ! isset( $input['disable_event'] ) )
		$input['disable_event'] = null;
	$input['disable_event'] = ( $input['disable_event'] == 1 ? 1 : 0 );

	if ( ! isset( $input['leftsidebar_show_latest_events'] ) )
		$input['leftsidebar_show_latest_events'] = null;
	$input['leftsidebar_show_latest_events'] = ( $input['leftsidebar_show_latest_events'] == 1 ? 1 : 0 );

	if ( ! isset( $input['leftsidebar_show_testimonials'] ) )
		$input['leftsidebar_show_testimonials'] = null;
	$input['leftsidebar_show_testimonials'] = ( $input['leftsidebar_show_testimonials'] == 1 ? 1 : 0 );

	if ( ! isset( $input['leftsidebar_show_social_links'] ) )
		$input['leftsidebar_show_social_links'] = null;
	$input['leftsidebar_show_social_links'] = ( $input['leftsidebar_show_social_links'] == 1 ? 1 : 0 );

	if ( ! isset( $input['rightsidebar_show_latest_events'] ) )
		$input['rightsidebar_show_latest_events'] = null;
	$input['rightsidebar_show_latest_events'] = ( $input['rightsidebar_show_latest_events'] == 1 ? 1 : 0 );

	if ( ! isset( $input['rightsidebar_show_testimonials'] ) )
		$input['rightsidebar_show_testimonials'] = null;
	$input['rightsidebar_show_testimonials'] = ( $input['rightsidebar_show_testimonials'] == 1 ? 1 : 0 );
	
	if ( ! isset( $input['rightsidebar_show_social_links'] ) )
		$input['rightsidebar_show_social_links'] = null;
	$input['rightsidebar_show_social_links'] = ( $input['rightsidebar_show_social_links'] == 1 ? 1 : 0 );

	if ( ! isset( $input['show_social_header'] ) )
		$input['show_social_header'] = null;
	$input['show_social_header'] = ( $input['show_social_header'] == 1 ? 1 : 0 );

	if ( ! isset( $input['featured_bar'] ) )
		$input['featured_bar'] = null;
	$input['featured_bar'] = ( $input['featured_bar'] == 1 ? 1 : 0 );

	if ( ! isset( $input['welcome_post_content'] ) )
		$input['welcome_post_content'] = null;
	$input['welcome_post_content'] = ( $input['welcome_post_content'] == 1 ? 1 : 0 );

	if ( ! isset( $input['show_eventdate'] ) )
		$input['show_eventdate'] = null;
	$input['show_eventdate'] = ( $input['show_eventdate'] == 1 ? 1 : 0 );


	 // data validation for Social Icons
	if( isset( $input[ 'accesspresslite_facebook' ] ) ) {
		$input[ 'accesspresslite_facebook' ] = esc_url_raw( $input[ 'accesspresslite_facebook' ] );
	};
	if( isset( $input[ 'accesspresslite_twitter' ] ) ) {
		$input[ 'accesspresslite_twitter' ] = esc_url_raw( $input[ 'accesspresslite_twitter' ] );
	};
	if( isset( $input[ 'accesspresslite_gplus' ] ) ) {
		$input[ 'accesspresslite_gplus' ] = esc_url_raw( $input[ 'accesspresslite_gplus' ] );
	};
	if( isset( $input[ 'accesspresslite_youtube' ] ) ) {
		$input[ 'accesspresslite_youtube' ] = esc_url_raw( $input[ 'accesspresslite_youtube' ] );
	};
	if( isset( $input[ 'accesspresslite_pinterest' ] ) ) {
		$input[ 'accesspresslite_pinterest' ] = esc_url_raw( $input[ 'accesspresslite_pinterest' ] );
	};
	if( isset( $input[ 'accesspresslite_linkedin' ] ) ) {
		$input[ 'accesspresslite_linkedin' ] = esc_url_raw( $input[ 'accesspresslite_linkedin' ] );
	};
	if( isset( $input[ 'accesspresslite_flickr' ] ) ) {
		$input[ 'accesspresslite_flickr' ] = esc_url_raw( $input[ 'accesspresslite_flickr' ] );
	};
	if( isset( $input[ 'accesspresslite_vimeo' ] ) ) {
		$input[ 'accesspresslite_vimeo' ] = esc_url_raw( $input[ 'accesspresslite_vimeo' ] );
	};
	if( isset( $input[ 'accesspresslite_stumbleupon' ] ) ) {
		$input[ 'accesspresslite_stumbleupon' ] = esc_url_raw( $input[ 'accesspresslite_stumbleupon' ] );
	};
	if( isset( $input[ 'accesspresslite_instagram' ] ) ) {
		$input[ 'accesspresslite_instagram' ] = esc_url_raw( $input[ 'accesspresslite_instagram' ] );
	};
	if( isset( $input[ 'accesspresslite_sound_cloud' ] ) ) {
		$input[ 'accesspresslite_sound_cloud' ] = esc_url_raw( $input[ 'accesspresslite_sound_cloud' ] );
	};
	if( isset( $input[ 'accesspresslite_skype' ] ) ) {
		$input[ 'accesspresslite_skype' ] = esc_attr( $input[ 'accesspresslite_skype' ] );
	};
	if( isset( $input[ 'accesspresslite_tumblr' ] ) ) {
		$input[ 'accesspresslite_tumblr' ] = esc_url_raw( $input[ 'accesspresslite_tumblr' ] );
	};
	if( isset( $input[ 'accesspresslite_myspace' ] ) ) {
		$input[ 'accesspresslite_myspace' ] = esc_url_raw( $input[ 'accesspresslite_myspace' ] );
	};
	if( isset( $input[ 'accesspresslite_rss' ] ) ) {
		$input[ 'accesspresslite_rss' ] = esc_url_raw( $input[ 'accesspresslite_rss' ] );
	};
	if( isset( $input[ 'action_btn_link' ] ) ) {
		$input[ 'action_btn_link' ] = esc_url_raw( $input[ 'action_btn_link' ] );
	};

    if( isset( $input[ 'header_text' ] ) ) {
	   $input[ 'header_text' ] = wp_kses_post( $input[ 'header_text' ] );
    }
    
    if( isset( $input[ 'gallery_code' ] ) ) {
	   $input[ 'gallery_code' ] = wp_kses_post( $input[ 'gallery_code' ] );
	}
	return $input;
}

endif;  // EndIf is_admin()
?>