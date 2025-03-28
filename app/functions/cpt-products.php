<?php 

function create_productsposttype() {

    $testimonials_icon_value = get_field('testimonials_icon', 'options');
  
  register_post_type( 'products',

  array(
    'labels' => array(
     'name' => __( 'Products' ),
     'singular_name' => __( 'Product' )
    ),
    'public' => true,
    'hierarchical' => true,
    'query_var' => true,
    'publicly_queryable'  => true,
    'has_archive' => true,
    'rewrite' => array('slug' => 'products'),
    'menu_icon' => $testimonials_icon_value,
    'supports' => array( 'title', 'editor', 'thumbnail' ),
   )
  );
}

  add_action( 'init', 'create_productsposttype' );