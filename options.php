<?php
function optionsframework_option_name() {
	return 'options-framework-theme';
	}
function optionsframework_options() {
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}
	$options_posts = array();
	$options_posts_obj = get_posts('sort_column=post_parent,menu_order');
	$options_posts[''] = 'Select a post:';
	foreach ($options_posts_obj as $post) {
		$options_posts[$post->ID] = $post->post_title;
	}
	$imagepath =  get_template_directory_uri() . '/inc/images/';
	
	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress' )
	);
	
	$options = array();
	
	$options[] = array(
		'name' => __('General Settings', 'options_framework_theme'),
		'type' => 'heading');
	
	$options[] = array(
		'name' => __('Logo', 'options_framework_theme'),
		'desc' => __('Upload your logo max 213X76 px', 'options_framework_theme'),
		'id' => 'theme_logo',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('Inner pages need slider', 'options_framework_theme'),
		'id' => 'theme_slider_cond',
		'std' => 'No',
		'type' => 'radio',
		'options' => array('Yes' => 'Yes', 'No' => 'No'));
	$options[] = array(
		'name' =>  __('Copyrights', 'options_framework_theme'),
		'id' => 'theme_copy',
		'std' => '',
		'type' => 'text' );
		
	$options[] = array(
		'name' => __('Contact Settings', 'options_framework_theme'),
		'type' => 'heading');
	$options[] = array(
		'name' =>  __('Phone', 'options_framework_theme'),
		'id' => 'theme_phone',
		'std' => '',
		'type' => 'text' );
		
	$options[] = array(
		'name' => __('Home Settings', 'options_framework_theme'),
		'type' => 'heading' );
	
	$options[] = array(
		'name' => __('Welcome Content', 'options_framework_theme'),
		'id' => 'theme_welcome',
		'type' => 'editor',
		'settings' => $wp_editor_settings );
	
	return $options;
}