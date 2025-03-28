<?php if (!defined('ABSPATH')) {
    die('Direct access forbidden.');
}

include_once __DIR__ . '/app/init.php';

if (!current_user_can('manage_options’')) {
    add_filter('show_admin_bar', '__return_false');
}

function add_custom_edit_icon()
{
    // Check if user is logged in and on the front end
    if (is_user_logged_in() && !is_admin()) {
        // Get the ID of the current post or page
        global $post;
        if (isset($post->ID)) {
            $edit_link = get_edit_post_link($post->ID);
            echo '<a href="' . esc_url($edit_link) . '" class="shadow-lg z-[999] custom-edit-icon fixed bottom-3 left-1/2 -translate-x-1/2 flex bg-primary px-12 py-2.5 rounded-full items-center" target="_blank" title="Edit This Page">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                        </svg>
                    <span class="ml-1.5 font-medium text-white">Edit page</span>

                  </a>';
        }
    }
}
add_action('wp_footer', 'add_custom_edit_icon');

function my_project_drawer_scripts()
{
    wp_enqueue_script(
        'project-drawer',
        get_template_directory_uri() . '/resources/js/toggles/drawers.js',
        array(),
        '1.0',
        true
    );

    wp_localize_script('project-drawer', 'ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php'),
    ));
}
add_action('wp_enqueue_scripts', 'my_project_drawer_scripts');

function add_module_attribute($tag, $handle, $src)
{
    if ('project-drawer' === $handle) {
        $tag = '<script type="module" src="' . esc_url($src) . '"></script>';
    }
    return $tag;
}
add_filter('script_loader_tag', 'add_module_attribute', 10, 3);


function get_project_details_callback()
{
    $project_id = isset($_GET['project_id']) ? absint($_GET['project_id']) : 0;

    if (!$project_id) {
        echo 'Project not found.';
        wp_die();
    }

    $post = get_post($project_id);
    if (!$post) {
        echo 'Project not found.';
        wp_die();
    }

    ?>
    <div class="project-details">
        <?php if ($location = get_field('location', $project_id)): ?>
            <p class="mb-20 font-telegraf lg:text-4xl text-primary font-normal">
                <?php echo esc_html($location); ?>
            </p>
        <?php endif; ?>
        <h2 class="lg:text-6xl mb-4 text-primary"><?php echo esc_html(get_the_title($project_id)); ?></h2>

        <?php $gallery_ids = get_field('gallery', $project_id); ?>
        <?php $size = 'full'; ?>
        <?php if ($gallery_ids): ?>
            <div class="swiper-slider project-slider-alt relative mb-8 overflow-x-hidden rounded-2xl">
                <div class="swiper-wrapper !h-auto relative">
                    <?php foreach ($gallery_ids as $gallery_id): ?>
                        <div class="swiper-slide !h-full group">
                            <div class="h-[275px] lg:h-[500px] overflow-hidden relative rounded-2xl">
                                <?php echo wp_get_attachment_image($gallery_id, $size, false, array('class' => 'h-full w-full object-cover rounded-2xl')); ?>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
                <div class="flex space-x-2 absolute bottom-4 right-4 z-40">
                    <div
                        class="size-12 border border-white rounded-full swiper-button-slide-prev hover:bg-white group flex items-center justify-center cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6 group-hover:text-accent text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                        </svg>

                    </div>
                    <div
                        class="size-12 border border-white rounded-full swiper-button-slide-next hover:bg-white flex items-center justify-center group cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6 group-hover:text-accent text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>

                    </div>
                </div>
            </div>

        <?php else:
            if (has_post_thumbnail($project_id)) {
                $image_classes = 'h-[275px] lg:h-[500px] overflow-hidden relative rounded-2xl mb-8';
                $image_size = 'full';
                $image_attr = array(
                    'class' => $image_classes,
                    'alt' => get_the_title($project_id)
                );
                echo get_the_post_thumbnail($project_id, $image_size, $image_attr);
            }
        endif; ?>

        <?php if ($overview = get_field('overview', $project_id)): ?>
            <div class="lg:w-3/4 [&>p]:lg:text-[24px] mb-16 font-telegraf"><?php echo $overview; ?></div>
        <?php endif; ?>

        <?php if ($sector = get_field('sector', $project_id)): ?>
            <div class="flex border-t border-black pt-4 lg:pt-6 pb-2 lg:pb-6">
                <p class="w-1/2 mb-0">Sector:</p>
                <p class="w-1/2 mb-0"><?php echo esc_html($sector); ?></p>
            </div>
        <?php endif; ?>

        <?php if ($architect = get_field('architect', $project_id)): ?>
            <div class="flex border-t border-black pt-4 lg:pt-6 pb-2 lg:pb-6">
                <p class="w-1/2 mb-0">Architect:</p>
                <p class="w-1/2 mb-0"><?php echo esc_html($architect); ?></p>
            </div>
        <?php endif; ?>

        <?php if ($stonemason = get_field('stonemason', $project_id)): ?>
            <div class="flex border-t border-black pt-4 lg:pt-6 pb-2 lg:pb-6">
                <p class="w-1/2 mb-0">Stonemason:</p>
                <p class="w-1/2 mb-0"><?php echo esc_html($stonemason); ?></p>
            </div>
        <?php endif; ?>

        <?php if ($contractor = get_field('contractor', $project_id)): ?>
            <div class="flex border-t border-black pt-4 lg:pt-6 pb-2 lg:pb-6">
                <p class="w-1/2 mb-0">Contractor:</p>
                <p class="w-1/2 mb-0"><?php echo esc_html($contractor); ?></p>
            </div>
        <?php endif; ?>

        <?php if ($products = get_field('products', $project_id)): ?>
            <div class="flex border-t border-black pt-6">
                <p class="w-1/2">Products used:</p>
                <div class="w-1/2">
                    <?php foreach ($products as $post): ?>
                        <?php setup_postdata($post); ?>
                        <p><a href="<?php echo get_permalink($post->ID); ?>"><?php echo get_the_title($post->ID); ?></a></p>
                    <?php endforeach; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            </div>

        <?php endif; ?>


    </div>
    <?php

    wp_die();
}
add_action('wp_ajax_get_project_details', 'get_project_details_callback');
add_action('wp_ajax_nopriv_get_project_details', 'get_project_details_callback');