<?php

$textAlign = get_sub_field('text_align');

?>

<section class="relative<?php if (get_sub_field('remove_bottom_margin') != 1): ?> section <?php endif; ?>">
    <div class="max-w-7xl mx-auto px-4">

        <div class="max-w-3xl text-center mb-12 mx-auto">
            <?php the_sub_field('content'); ?>
        </div>

        <?php if (have_rows('columns')): ?>
            <div class="grid lg:grid-cols-2 gap-8">
                <?php while (have_rows('columns')):
                    the_row(); ?>
                    <div
                        class="item overflow-hidden flex flex-col justify-between text-<?php echo $textAlign; ?>">
                        <?php $img_acf = GetACFImage(get_sub_field('image'));
                        if ($img_acf) { ?>

                            <div
                                class="mb-4 w-full h-[200px] lg:h-[300px] <?php if($textAlign =='center') :?> mx-auto <?php endif; ?>">
                                <img class='w-full h-full object-cover'
                                    src="<?php echo esc_url($img_acf->get_src()[0]); ?>"
                                    title="<?php echo esc_attr($img_acf->get_title()); ?>"
                                    data-srcset="<?php echo esc_attr($img_acf->get_srcset()); ?>"
                                    data-sizes="<?php echo esc_attr($img_acf->get_srcset_sizes()); ?>"
                                    alt="<?php echo $img_acf->get_alt_text() ?>" height="600" width="600">
                            </div>


                        <?php } ?>

                        <div class="flex-grow">
                            <div class="flex-grow">
                                <h3 class="text-xl lg:text-3xl mb-3 tracking-tighter font-playfair"><?php the_sub_field('heading'); ?></h3>
                                <?php the_sub_field('content'); ?>
                            </div>

                        </div>

                        <?php $button_link = get_sub_field('link'); ?>
                        <?php if ($button_link): ?>
                            <div class="mx-auto lg:mx-0 w-full text-center lg:text-left mt-4">
                                <a href="<?php echo esc_url($button_link['url']); ?>" <?php $button_link['target'] ? 'target="' . esc_attr($button_link['target']) . '"' : ''; ?>
                                    class="button button--primary !inline-block !w-fit">
                                    <?php echo esc_html($button_link['title']); ?>
                                </a>
                            </div>
                        <?php endif; ?>


                    </div>

                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <?php // no rows found  ?>
        <?php endif; ?>

        <?php $button_link = get_sub_field('button'); ?>
        <?php if ($button_link): ?>
            <div class="mt-12 mx-auto lg:w-fit">
                <a href="<?php echo esc_url($button_link['url']); ?>" <?php $button_link['target'] ? 'target="' . esc_attr($button_link['target']) . '"' : ''; ?> class="button button--primary">
                    <?php echo esc_html($button_link['title']); ?>
                </a>
            </div>
        <?php endif; ?>
    </div>

</section>