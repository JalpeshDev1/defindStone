<section class="<?php if (get_sub_field('remove_bottom_margin') != 1): ?>section<?php endif; ?> overflow-hidden">
    <div class="mb-6 text-center px-4 marquee-section">
        <?php the_sub_field('content'); ?>
    </div>
    <div class="marquee lg:px-40">

        <?php if (get_sub_field('use_generic') == 1): ?>
            <?php if (have_rows('logos', 'option')): ?>
                <ul class="space-x-2 marquee-content">
                    <?php while (have_rows('logos', 'option')):
                        the_row(); ?>
                        <li class="p-4 h-[70px] lg:h-[100px]">

                            <?php
                            $img_acf = GetACFImage(get_sub_field('logo'));
                            ?>
                            <?php if ($img_acf) { ?>

                                <img class="w-auto mx-auto !opacity-100 lazy object-contain object-center lazy h-full" width="200"
                                    height="100%" src=" <?php echo esc_url($img_acf->get_src()[0]); ?>"
                                    title="<?php echo esc_attr($img_acf->get_title()); ?>"
                                    srcset="<?php echo esc_attr($img_acf->get_srcset()); ?>"
                                    sizes="<?php echo esc_attr($img_acf->get_srcset_sizes()); ?>"
                                    alt="<?php echo $img_acf->get_alt_text() ?>" />

                            <?php } ?>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php endif; ?>
        <?php else: ?>
            <?php if (have_rows('logos')): ?>
                <ul class="space-x-2 marquee-content">
                    <?php while (have_rows('logos')):
                        the_row(); ?>
                        <li class="p-4 h-[80px] lg:h-[90px]">

                            <?php
                            $img_acf = GetACFImage(get_sub_field('logo'));
                            ?>
                            <?php if ($img_acf) { ?>

                                <img class="w-auto mx-auto grayscale opacity-70 object-contain object-center lazy h-full" width="200"
                                    height="100%" src=" <?php echo esc_url($img_acf->get_src()[0]); ?>"
                                    title="<?php echo esc_attr($img_acf->get_title()); ?>"
                                    srcset="<?php echo esc_attr($img_acf->get_srcset()); ?>"
                                    sizes="<?php echo esc_attr($img_acf->get_srcset_sizes()); ?>"
                                    alt="<?php echo $img_acf->get_alt_text() ?>" />

                            <?php } ?>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php endif; ?>
        <?php endif; ?>

    </div>
</section>
<!--/.Logos/accreditations -->