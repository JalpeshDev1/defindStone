<?php
$remove_bottom_margin = get_sub_field('remove_bottom_margin');
$heading = get_sub_field('heading');
$content = get_sub_field('content');
$pre_heading = get_sub_field('pre_heading');
?>

<section
    class="<?php if ($remove_bottom_margin != 1): ?>section <?php endif; ?> bg-primary py-12 lg:py-32 relative overflow-hidden"
    style="z-index: 1;">
    <div class="container">
        <div class="relative z-50 w-full grid lg:grid-cols-3 gap-4">
            <div class="text-white">
                <?php if ($heading): ?>
                    <div class="flex justify-between">
                        <div class="flex items-baseline mb-12 text-white">
                            <span class="lg:text-xl"><?php echo $pre_heading; ?></span>
                            <h2 class="ml-1.5"><?php echo $heading; ?></h2>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ($content): ?>
                    <div class="[&>div]:mb-12">
                        <?php echo $content; ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="h-full flex items-center">
                <?php $img_acf = GetACFImage(get_sub_field('image'));
                if ($img_acf) { ?>
                    <img class="max-h-[300px] w-auto mx-auto min-[1921px]:max-h-[450px]"
                        src="<?php echo esc_url($img_acf->get_src()[0]); ?>"
                        title="<?php echo esc_attr($img_acf->get_title()); ?>"
                        data-srcset="<?php echo esc_attr($img_acf->get_srcset()); ?>"
                        data-sizes="<?php echo esc_attr($img_acf->get_srcset_sizes()); ?>"
                        alt="<?php echo $img_acf->get_alt_text() ?>" height="600" width="600">
                <?php } ?>
            </div>

            <div>
                <?php if (have_rows('cta')): ?>
                    <?php while (have_rows('cta')):
                        the_row(); ?>
                        <div class="bg-[#848383] mb-6 rounded-xl grid lg:grid-cols-2 min-h-[220px]">
                            <div class="flex justify-between flex-col p-5 max-sm:text-center">
                                <p class="text-3xl font-telegraf text-white leading-[1.2]">
                                    <?php the_sub_field('heading'); ?>
                                </p>
                                <?php $button = get_sub_field('button'); ?>
                                <?php if ($button): ?>
                                    <a href="<?php echo esc_url($button['url']); ?>"
                                        target="<?php echo esc_attr($button['target']); ?>"
                                        class="button button--white leading-[1]"><?php echo esc_html($button['title']); ?></a>
                                <?php endif; ?>
                            </div>
                            <div class="flex flex-col justify-end">
                                <?php $img_acf = GetACFImage(get_sub_field('image'));
                                if ($img_acf) { ?>
                                    <img class="max-sm:max-h-[150px] object-contain max-sm:-mt-4"
                                        src="<?php echo esc_url($img_acf->get_src()[0]); ?>"
                                        title="<?php echo esc_attr($img_acf->get_title()); ?>"
                                        data-srcset="<?php echo esc_attr($img_acf->get_srcset()); ?>"
                                        data-sizes="<?php echo esc_attr($img_acf->get_srcset_sizes()); ?>"
                                        alt="<?php echo $img_acf->get_alt_text() ?>" height="600" width="600">
                                <?php } ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>



                <!-- Video trigger element -->
                <div class="bg-light h-44 rounded-xl relative overflow-hidden min-h-[220px] video-block cursor-pointer">
                    <img src="/wp-content/uploads/2025/01/video.jpg" class="h-full w-full object-cover">
                    <div
                        class="bg-primary/90 size-20 rounded-full absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="size-12 text-white">
                            <path fill-rule="evenodd"
                                d="M4.5 5.653c0-1.427 1.529-2.33 2.779-1.643l11.54 6.347c1.295.712 1.295 2.573 0 3.286L7.28 19.99c-1.25.687-2.779-.217-2.779-1.643V5.653Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>
<div class="video-modal fixed inset-0 flex items-center justify-center bg-black bg-opacity-90 hidden z-[9999]">
    <div class="relative max-w-4xl w-full p-4">
        <button class="modal-close absolute -top-2 -right-2 text-white text-3xl">&times;</button>
        <!-- Responsive video container using Tailwind's aspect-video -->
        <div class="w-full aspect-video bg-black [&>iframe]:h-full [&>iframe]:w-full">
            <?php the_sub_field('video'); ?>
        </div>
    </div>
</div>