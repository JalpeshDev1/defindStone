<?php
$heading = get_sub_field('heading');
$pre_heading = get_sub_field('pre_heading');

$testimonial_query = new WP_Query([
    'post_type' => 'products',
    'posts_per_page' => -1, // Adjust as needed
    'post_status' => 'publish',
]);
?>

<div class="swiper-slider product-slider relative overflow-hidden">
    <div class="flex justify-between">
        <div class="flex items-baseline mb-12 text-white">
        <span class="lg:text-xl"><?php echo $pre_heading; ?></span>
        <h2 class="ml-1.5"><?php echo $heading; ?></h2>
        </div>

    </div>

    <div class="swiper-wrapper !h-auto">

        <?php if ($testimonial_query->have_posts()): ?>
            <?php while ($testimonial_query->have_posts()):
                $testimonial_query->the_post(); ?>
                <div class="swiper-slide !h-full group relative overflow-hidden rounded-2xl">
                    <div class="h-full flex flex-wrap flex-col p-4 rounded-2xl bg-white overflow-hidden">
                        <div class="[&>p]:leading-[1] bg-primary px-6 py-2 rounded-full absolute bottom-4 left-4 z-40">
                            <p class="!mb-0 text-white font-telegraf">
                                <?php the_title(); ?>
                            </p>
                        </div>

                        <div class="h-1/2 overflow-hidden rounded-lg">
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
                        </div>

                        <div class="mt-6">
                            <p>Angus sandstone is naturally flat bedded and ideal for dry stone dykes.</p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php else: ?>
            <p>No products available at the moment.</p>
        <?php endif; ?>


    </div>
    <div class="z-40 flex space-x-4 mt-6 justify-center">
        <div
            class="size-10 lg:size-16 border border-primary rounded-full swiper-button-slide-prev hover:bg-primary group flex items-center justify-center cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6 group-hover:text-white">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
            </svg>

        </div>
        <div
            class="size-10 lg:size-16 border border-primary rounded-full swiper-button-slide-next hover:bg-primary flex items-center justify-center group cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6 group-hover:text-white">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
            </svg>

        </div>
    </div>
</div>