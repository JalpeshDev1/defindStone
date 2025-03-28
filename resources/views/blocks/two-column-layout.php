<?php

$imagePosition = get_sub_field('image_position');
$colOrder = get_sub_field('reverse_column_order');

$heading = get_sub_field('heading');
$sub_heading = get_sub_field('sub_heading');

$positionClass = ($imagePosition === 'Contain') ? 'object-contain' : 'object-cover';
$uspPosition = ($colOrder === 1) ? '' : 'object-cover';
$remove_bottom_margin = get_sub_field('remove_bottom_margin');

?>

<section class="<?php if ($remove_bottom_margin != 1): ?>section <?php endif; ?> relative">
    <div class="relative">
        <?php if ($heading): ?>
            <div class="flex items-baseline text-primary mb-12 container">
                <span class="lg:text-xl"><?= esc_html($sub_heading); ?></span>
                <h2 class="ml-1.5"><?= esc_html($heading); ?></h2>
            </div>
        <?php endif; ?>

        <div class="container relative z-30">
            <div class="grid lg:grid-cols-2 gap-4 items-center">
                <div
                    class="<?php if (get_sub_field('reverse_column_order') == 1): ?>lg:order-last lg:pl-16<?php else: ?>lg:pr-16<?php endif; ?> pb-10 lg:pb-0 relative">

                    <div class="text-primary overflow-hidden rounded-lg">
                        <?php $img_acf = GetACFImage(get_sub_field('image'));
                        if ($img_acf) { ?>
                            <div
                                class="reveal mx-auto relative z-10 <?php if (get_sub_field('add_border') == 1): ?>border<?php endif; ?>">
                                <img class='pointer-events-none <?php echo $positionClass; ?>'
                                    src="<?php echo esc_url($img_acf->get_src()[0]); ?>"
                                    title="<?php echo esc_attr($img_acf->get_title()); ?>"
                                    data-srcset="<?php echo esc_attr($img_acf->get_srcset()); ?>"
                                    data-sizes="<?php echo esc_attr($img_acf->get_srcset_sizes()); ?>"
                                    alt="<?php echo $img_acf->get_alt_text() ?>" height="600" width="600">
                            </div>

                        <?php } ?>
                    </div>

                </div>
                <div class="content-block relative z-20">
                    <div class="pt-6 lg:pt-0">

                        <div class="text-primary font-telegraf">
                            <?php the_sub_field('content'); ?>
                        </div>

                        <?php $button_link = get_sub_field('button'); ?>
                        <?php if ($button_link): ?>
                            <div class="mt-8">
                                <a href="<?php echo esc_url($button_link['url']); ?>" <?php $button_link['target'] ? 'target="' . esc_attr($button_link['target']) . '"' : ''; ?>
                                    class="button button--primary">
                                    <?php echo esc_html($button_link['title']); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>


                </div>
            </div>

        </div>

    </div>

</section>
<!--/Two column text with image -->