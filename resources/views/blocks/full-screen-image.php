<?php

$pre_heading = get_sub_field('pre_heading');
$heading = get_sub_field('heading');
$content = get_sub_field('content');
$remove_bottom_margin = get_sub_field('remove_bottom_margin');
?>

<section
    class="<?php if ($remove_bottom_margin != 1): ?>section <?php endif; ?> relative after:bg-gradient-to-r after:from-black/80 after:via-black/30 after:to-black/80 after:absolute after:w-full after:h-full after:top-0 after:left-0 after:z-10 overflow-hidden pt-20 lg:pt-48 pb-12 lg:pb-20 flex items-center">

    <div class="relative z-50 container flex justify-between flex-wrap">
        <div class="gap-4 items-center w-full lg:w-[45%] h-auto">
            <div class="md:text-left text-center h-full flex flex-col justify-between">
                <div>
                    <div class="flex items-baseline text-white mb-16">
                        <span class="lg:text-xl"><?php echo $pre_heading; ?></span>
                        <h2 class="ml-1.5 mb-0"><?php echo $heading; ?></h2>
                    </div>

                    <?php if ($content): ?>
                        <div class="text-white">
                            <?php echo $content; ?>
                        </div>
                    <?php endif; ?>

                    <div class="mt-12 flex space-x-8 items-center">
                        <?php $button_link = get_sub_field('button'); ?>
                        <?php if ($button_link): ?>
                            <div class="w-full lg:w-fit mx-auto lg:mx-0">
                                <a href="<?php echo esc_url($button_link['url']); ?>" <?php $button_link['target'] ? 'target="' . esc_attr($button_link['target']) . '"' : ''; ?>
                                    class="button button--white">
                                    <?php echo esc_html($button_link['title']); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <?php if (have_rows('stats')): ?>
                    <div class="flex w-full lg:space-x-10 flex-wrap max-md:flex-col">
                        <?php while (have_rows('stats')):
                            the_row(); ?>
                            <div class="text-white mb-8">
                                <p class="mb-3 font-telegraf leading-[1] text-2xl lg:text-3xl"><?php the_sub_field('heading'); ?></p>
                                <div class="[&>p]:leading-[1.5] [&>p]:font-semibold [&>p]:text-[28px]">
                                    <?php the_sub_field('content'); ?>
                                </div>

                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>
        <div class="lg:w-[35%]">
            <?php if (have_rows('list')): ?>
                <?php while (have_rows('list')):
                    the_row(); ?>
                    <div class="text-white mb-8">
                        <p class="mb-3 font-telegraf leading-[1] lg:text-3xl"><?php the_sub_field('heading'); ?></p>
                        <div class="[&>p]:leading-[1.5] font-medium">
                            <?php the_sub_field('content'); ?>
                        </div>

                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>

    <?php $img_acf = GetACFImage(get_sub_field('image'));
    if ($img_acf) { ?>
        <img class="absolute top-0 left-0 h-full w-full object-cover object-center"
            src="<?php echo esc_url($img_acf->get_src()[0]); ?>" title="<?php echo esc_attr($img_acf->get_title()); ?>"
            data-srcset="<?php echo esc_attr($img_acf->get_srcset()); ?>"
            data-sizes="<?php echo esc_attr($img_acf->get_srcset_sizes()); ?>" alt="<?php echo $img_acf->get_alt_text() ?>"
            height="600" width="1920">
    <?php } ?>

</section>