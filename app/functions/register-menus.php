<?php

function wpb_custom_new_menu()
{
    register_nav_menu('header', __('Main navigation'));
    register_nav_menu('footer', 'Footer Menu');
    register_nav_menu('quick-links', 'Quick Links');
    register_nav_menu('support', 'Support');

}
add_action('init', 'wpb_custom_new_menu');

// add_action('thesis_hook_footer', 'custom_footer_menu');

// class sublevel_walker extends Walker_Nav_Menu
// {
//     function start_lvl(&$output, $depth = 0, $args = array())
//     {
//         $indent = str_repeat("\t", $depth);
//         $output .= "\n$indent<div class='sm-container'><ul class='sub-menu'>\n";
//     }
//     function end_lvl(&$output, $depth = 0, $args = array())
//     {
//         $indent = str_repeat("\t", $depth);
//         $output .= "$indent</ul></div>\n";
//     }
// }

// // add the filter 
// add_filter('lwpamf_wp_nav_menu_args', ' luckywp_output', 3);

?>