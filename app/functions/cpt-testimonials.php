<?php 

function create_posttype() {

    $testimonials_icon_value = get_field('testimonials_icon', 'options');
  
  register_post_type( 'testimonials',

  array(
    'labels' => array(
     'name' => __( 'Testimonials' ),
     'singular_name' => __( 'Testimonials' )
    ),
    'public' => true,
    'hierarchical' => true,
    'query_var' => true,
    'publicly_queryable'  => false,
    'has_archive' => false,
    'rewrite' => array('slug' => 'testimonials'),
    'menu_icon' => $testimonials_icon_value,
   )
  );
}

  add_action( 'init', 'create_posttype' );