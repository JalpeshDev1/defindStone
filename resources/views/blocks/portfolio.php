<?php
$heading = get_sub_field('heading');
$pre_heading = get_sub_field('pre_heading');
$introContent = get_sub_field('content');
$full_screen = get_sub_field('full_screen');
$fade_section = get_sub_field('fade_section');
$remove_bottom_margin = get_sub_field('remove_bottom_margin');

$project_query = new WP_Query([
    'post_type' => 'projects',
    'posts_per_page' => -1,
    'post_status' => 'publish',
]);

$projects = get_posts(array(
    'post_type' => 'projects',
    'posts_per_page' => -1,
    'fields' => 'ids',
));

$sectors = array();

if ($projects) {
    foreach ($projects as $project_id) {
        $sector = get_field('sector', $project_id);
        if ($sector && !in_array($sector, $sectors, true)) {
            $sectors[] = $sector;
        }
    }
}

sort($sectors);
?>

<?php if ($full_screen == 1): ?>

    <section
        class="<?php if ($remove_bottom_margin != 1): ?>section <?php endif; ?> <?php if ($fade_section == 1): ?>fade-section <?php endif; ?>">
        <div class="bg-dark">

            <div class="swiper-slider project-slider-alt relative">

                <div class="swiper-wrapper !h-auto">

                    <?php if ($project_query->have_posts()): ?>
                        <?php while ($project_query->have_posts()):
                            $project_query->the_post(); ?>
                            <div class="swiper-slide !h-full group">

                                <div
                                    class="h-[80vh] overflow-hidden relative cursor-pointer after:bg-gradient-to-r after:from-black/80 after:to-black/30 after:absolute after:w-full after:h-full after:top-0 after:left-0 after:z-10">
                                    <?php
                                    if (has_post_thumbnail()) {
                                        $image_classes = 'h-full w-full object-cover';
                                        $image_size = 'large';
                                        $image_attr = array(
                                            'class' => $image_classes,
                                            'alt' => get_the_title(),
                                            'title' => 'Click for more details'
                                        );
                                        the_post_thumbnail($image_size, $image_attr);
                                    }
                                    ?>

                                    <div class="absolute bottom-32 left-0 lg:bottom-24 z-40 w-full">
                                        <div class="container">
                                            <p class="!mb-8 text-4xl lg:text-6xl text-white leading-[1.2] lg:w-1/2 font-telegraf">
                                                <?php the_title(); ?>
                                            </p>

                                            <?php
                                            $products = get_field('products');
                                            $content = get_field('overview');
                                            ?>
                                            <?php if ($products): ?>
                                                <div class="flex mb-8 flex-wrap">
                                                    <?php
                                                    $displayProducts = array_slice($products, 0, 2);
                                                    foreach ($displayProducts as $post):
                                                        setup_postdata($post); ?>
                                                        <a href="<?php the_permalink(); ?>"
                                                            class="bg-primary px-6 py-2 rounded-full text-white lg:mr-2 max-md:text-sm">
                                                            <?php the_title(); ?>
                                                        </a>
                                                    <?php endforeach; ?>

                                                    <?php
                                                    $totalProducts = count($products);
                                                    if ($totalProducts > 2):
                                                        $moreCount = $totalProducts - 2; ?>
                                                        <span
                                                            class="bg-gray-200 px-4 py-2 rounded-full text-dark max-md:text-sm">+<?= esc_html($moreCount); ?></span>
                                                        <?php
                                                    endif;
                                                    wp_reset_postdata();
                                                    ?>
                                                </div>
                                            <?php endif; ?>
                                            <div class="text-white lg:w-[40%]">
                                                <?php
                                                $excerpt = wp_html_excerpt($content, 150, '...');
                                                echo $excerpt;
                                                ?>
                                            </div>
                                            <div class="mt-8">
                                                <a href="/projects/" class="button button--white max-md:mx-0">View All Projects</a>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php else: ?>
                        <p>No projects available at the moment.</p>
                    <?php endif; ?>

                </div>

                <div
                    class="flex space-x-4 absolute bottom-8 max-lg:left-1/2 max-lg:-translate-x-1/2 lg:bottom-24 lg:right-24 z-40">
                    <div
                        class="size-10 lg:size-16 border border-white rounded-full swiper-button-slide-prev hover:bg-white group flex items-center justify-center cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6 group-hover:text-accent text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                        </svg>

                    </div>
                    <div
                        class="size-10 lg:size-16 border border-white rounded-full swiper-button-slide-next hover:bg-white flex items-center justify-center group cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6 group-hover:text-accent text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>

                    </div>
                </div>
            </div>

        </div>
    </section>

<?php else: ?>

    <section
        class="<?php if ($remove_bottom_margin != 1): ?>section <?php endif; ?> bg-accent py-12 lg:py-32 relative <?php if ($fade_section == 1): ?>fade-section <?php endif; ?>">
        <div class="bg-accent absolute top-0 left-0 z-30 w-1/4 h-full hidden lg:block">&nbsp;</div>

        <div class="max-w-3xl text-center mb-8 mx-auto relative z-40">
            <?php echo $introContent; ?>
        </div>

        <div class="container relative z-40">
            <div class="flex items-baseline text-white mb-16">
                <span class="lg:text-xl"><?php echo $pre_heading; ?></span>
                <h2 class="ml-1.5"><?php echo $heading; ?></h2>
            </div>
        </div>

        <div class="container flex flex-wrap">
            <div class="w-full lg:w-1/5 text-white  flex-col justify-between relative z-50 h-auto bg-accent">
                <ul class="mb-8 space-y-3">
                    <li class="sector-filter cursor-pointer active" data-sector="all">All</li>
                    <?php foreach ($sectors as $sector): ?>
                        <li class="sector-filter cursor-pointer" data-sector="<?php echo esc_attr($sector); ?>">
                            <?php echo esc_html($sector); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <p class="text-[14px]">Our diverse portfolio highlights the versatility of Angus sandstone, featuring
                    projects from historic conservation to modern architecture. From residential properties to large-scale
                    infrastructure, each project showcases the timelessness. beauty and sustainability.
                </p>
            </div>
            <div class="w-full lg:w-4/5 lg:pl-12">
                <div class="swiper-slider project-slider relative">

                    <div class="swiper-wrapper !h-auto mb-6">

                        <?php if ($project_query->have_posts()): ?>
                            <?php while ($project_query->have_posts()):
                                $project_query->the_post(); ?>
                                <?php $sector = get_field('sector'); ?>
                                <div class="swiper-slide !h-full group" data-sector="<?php echo esc_attr($sector); ?>">

                                    <div
                                        class="h-[300px] lg:h-[485px] xl:h-[500px] overflow-hidden rounded-xl relative cursor-pointer">
                                        <?php
                                        if (has_post_thumbnail()) {
                                            $image_classes = 'h-full w-full object-cover';
                                            $image_size = 'large';
                                            $image_attr = array(
                                                'class' => $image_classes,
                                                'alt' => get_the_title(),
                                                'title' => 'Click for more details'
                                            );
                                            the_post_thumbnail($image_size, $image_attr);
                                        }
                                        ?>

                                        <div
                                            class="absolute top-0 left-0 h-full w-full bg-primary/70 text-center flex items-center justify-center opacity-0 group-hover:opacity-100 duration-200 ease-in-out">
                                            <div class="[&>p]:leading-[1]">
                                                <p class="!mb-1 text-4xl text-primary font-telegraf group-hover:text-white">
                                                    <?php the_title(); ?>
                                                </p>
                                                <a href="/projects/" class="underline text-white">View project</a>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        <?php else: ?>
                            <p>No projects available at the moment.</p>
                        <?php endif; ?>

                    </div>

                    <div class="flex space-x-4">
                        <div
                            class="size-16 border border-white rounded-full swiper-button-slide-prev hover:bg-white group flex items-center justify-center cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6 group-hover:text-accent text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                            </svg>

                        </div>
                        <div
                            class="size-16 border border-white rounded-full swiper-button-slide-next hover:bg-white flex items-center justify-center group cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6 group-hover:text-accent text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                            </svg>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>

<?php endif; ?>