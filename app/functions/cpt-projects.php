<?php 

function create_projectsposttype() {

    $testimonials_icon_value = get_field('testimonials_icon', 'options');
  
  register_post_type( 'projects',

  array(
    'labels' => array(
     'name' => __( 'Projects' ),
     'singular_name' => __( 'Project' )
    ),
    'public' => true,
    'hierarchical' => true,
    'query_var' => true,
    'publicly_queryable'  => true,
    'has_archive' => true,
    'rewrite' => array('slug' => 'projects'),
    'menu_icon' => $testimonials_icon_value,
    'supports' => array( 'title', 'editor', 'thumbnail' ),
   )
  );
}

  add_action( 'init', 'create_projectsposttype' );