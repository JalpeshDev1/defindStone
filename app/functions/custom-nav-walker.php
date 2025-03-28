<?php

class WPDocs_Walker_Nav_Menu extends Walker_Nav_Menu {
 
    public function start_lvl(&$output, $depth = 0, $args = array())
    {

        $megamenu = get_field('has_mega_menu', 'option');

        // Depth-dependent classes.
        $indent = ($depth > 0 ? str_repeat("\t", $depth) : '');
        $display_depth = ($depth + 1);
        $classes = array(
            'sub-menu',
            ($display_depth >= 2 ? 'sub-sub-menu' : ''),
            ($display_depth == 1 && !$megamenu ? 'mt-4 text-sm xl:invisible xl:absolute duration-500 ease-in-out transition-all xl:translate-y-10 xl:opacity-0 xl:z-50 xl:bg-white xl:p-5 xl:ml-0 xl:mt-0 xl:text-base xl:overflow-hidden hidden' : ''),
            'menu-depth-' . $display_depth,
            ($display_depth == 1 && $megamenu ? 'mega-menu mt-4 text-sm xl:invisible left-0 right-0 max-w-full xl:flex justify-center xl:w-screen xl:absolute duration-500 ease-in-out transition-all xl:translate-y-10 xl:opacity-0 xl:z-50 xl:bg-white xl:p-5 xl:ml-0 xl:mt-0 xl:text-base xl:overflow-hidden hidden' : ''),
            ($display_depth == 2 && !$megamenu ? 'xl:left-full xl:top-0 xl:invisible xl:absolute xl:duration-500 xl:ease-in-out xl:transition-all xl:-translate-x-5 xl:opacity-0 xl:z-40 xl:bg-white xl:p-5 xl:ml-0 xl:mt-0 xl:text-base' : ''),
            ($display_depth == 2 && $megamenu ? 'xl:!p-0 mt-4 xl:!ml-0 hidden xl:block' : ''),

        );
        $class_names = implode(' ', $classes);

        // Build HTML for output.
        $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
    }

    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        global $wp_query;
        $indent = ($depth > 0 ? str_repeat("\t", $depth) : ''); // code indent

        // Depth-dependent classes.
        $depth_classes = array(
            ($depth == 0 ? 'main-menu-item' : 'sub-menu-item'),
            ($depth >= 2 ? 'sub-sub-menu-item' : ''),
            ($depth == 2 && $megamenu ? 'sub-sub-menu-item lg:text-sm' : ''),
            ($depth == 2 && !$megamenu ? 'lg:text-base' : ''),
            'menu-item-depth-' . $depth,
        );
        $depth_class_names = esc_attr(implode(' ', $depth_classes));

        // Passed classes.
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $class_names = esc_attr(implode(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item)));

        // Build HTML.
        $output .= $indent . '<li id="nav-menu-item-' . $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';

        // Link attributes.
        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
        $attributes .= ' class="menu-link ' . ($depth > 0 ? 'sub-menu-link' : 'main-menu-link') . '"';

        // Build HTML output and pass through the proper filter.
        $item_output = sprintf('%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
            $args->before,
            $attributes,
            $args->link_before,
            apply_filters('the_title', $item->title, $item->ID),
            $args->link_after,
            $args->after
        );
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}