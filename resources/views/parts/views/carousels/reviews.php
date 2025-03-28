<?php

$heading = get_sub_field('heading');
$pre_heading = get_sub_field('pre_heading');


$testimonial_query = new WP_Query([
    'post_type' => 'testimonials',
    'posts_per_page' => -1,
    'post_status' => 'publish',
]);
?>

<div class="swiper-slider reviews-slider relative container">
    <div class="flex justify-between max-sm:items-center mb-12">
        <div class="flex items-baseline text-primary">
            <span class="lg:text-xl"><?= esc_html($pre_heading); ?></span>
            <h2 class="ml-1.5"><?= esc_html($heading); ?></h2>
        </div>
        <div class="flex space-x-4">
            <div
                class="size-10 lg:size-16 border border-primary rounded-full swiper-button-slide-prev hover:bg-primary group flex items-center justify-center cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6 group-hover:text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
            </div>
            <div
                class="size-10 lg:size-16 border border-primary rounded-full swiper-button-slide-next hover:bg-primary flex items-center justify-center group cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6 group-hover:text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                </svg>
            </div>
        </div>
    </div>

    <div class="swiper-wrapper !h-auto">
        <?php if ($testimonial_query->have_posts()): ?>
            <?php while ($testimonial_query->have_posts()):
                $testimonial_query->the_post(); ?>
                <div class="swiper-slide !h-full group">
                    <div
                        class="h-full flex flex-wrap flex-col p-4 lg:p-8 xl:p-10 rounded-2xl bg-white border border-primary group-hover:bg-[#848383] group-hover:border-[#848383] group-hover:text-white duration-200 ease-in-out">
                        <div class="flex items-center">
                            <div>
                                <?php
                                $img_acf = GetACFImage(get_field('image'));
                                if ($img_acf):
                                    ?>
                                    <div class="w-full flex-shrink-0 pr-6">
                                        <img class="aspect-square rounded-2xl h-[80px] w-[80px] lg:h-[113px] lg:w-[113px]"
                                            src="<?= esc_url($img_acf->get_src()[0]); ?>"
                                            title="<?= esc_attr($img_acf->get_title()); ?>"
                                            data-srcset="<?= esc_attr($img_acf->get_srcset()); ?>"
                                            data-sizes="<?= esc_attr($img_acf->get_srcset_sizes()); ?>"
                                            alt="<?= esc_attr($img_acf->get_alt_text()); ?>" height="100" width="100">
                                    </div>
                                <?php else: ?>
                                    <div class="w-full flex-shrink-0 pr-6">
                                        <div
                                            class="flex items-center justify-center aspect-square rounded-full h-[80px] w-[80px] bg-primary text-center">
                                            <span class="text-2xl font-bold"><?= esc_html(substr(get_the_title(), 0, 2)); ?></span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="[&>p]:leading-[1]">
                                <p class="!mb-1 text-3xl lg:text-4xl text-primary font-telegraf group-hover:text-white">
                                    <?php the_title(); ?>
                                </p>
                                <p class="mb-0.5 text-lg font-light"><?php the_field('role'); ?></p>
                                <p class="mb-0 text-lg font-light"><?php the_field('company'); ?></p>
                            </div>
                        </div>

                        <div class="pt-4 lg:pt-6 w-full">
                            <p class="text-[15px]"><?php the_field('review'); ?></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php else: ?>
            <p>No testimonials available at the moment.</p>
        <?php endif; ?>
    </div>
</div>