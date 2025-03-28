<?php

if (function_exists('acf_add_options_page')) {

    acf_add_options_sub_page(
        array(
            'page_title' => 'Global Settings',
            'menu_title' => 'Global',
        )
    );

    acf_add_options_sub_page(
        array(
            'page_title' => 'Header Settings',
            'menu_title' => 'Header',
        )
    );

    acf_add_options_sub_page(
        array(
            'page_title' => 'Archive Settings',
            'menu_title' => 'Archives',
        )
    );

    // acf_add_options_sub_page(
    //     array(
    //         'page_title' => 'Footer Settings',
    //         'menu_title' => 'Footer',
    //     )
    // );

}

?>