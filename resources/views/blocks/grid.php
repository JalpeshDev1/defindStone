<?php

$textAlign = get_sub_field('text_align');

?>

<section class="relative<?php if (get_sub_field('remove_bottom_margin') != 1): ?> section <?php endif; ?>">
    <div class="max-w-6xl mx-auto px-4 relative">

        <div class="max-w-3xl text-center mb-12 mx-auto content-block">
            <?php the_sub_field('content'); ?>
        </div>

        <?php if (have_rows('grid_item')): ?>
            <div class="grid lg:grid-cols-2 gap-3">
                <?php while (have_rows('grid_item')):
                    the_row(); ?>
                    <div
                        class="item rounded-2xl overflow-hidden relative bg-yellow-100 flex flex-col justify-between text-<?php echo $textAlign; ?>">
                        <?php $img_acf = GetACFImage(get_sub_field('image'));
                        if ($img_acf) { ?>

                            <div
                                class="w-full h-[300px] lg:h-[420px] <?php if ($textAlign == 'center'): ?> mx-auto <?php endif; ?>">
                                <img class='w-full h-full object-cover' src="<?php echo esc_url($img_acf->get_src()[0]); ?>"
                                    title="<?php echo esc_attr($img_acf->get_title()); ?>"
                                    data-srcset="<?php echo esc_attr($img_acf->get_srcset()); ?>"
                                    data-sizes="<?php echo esc_attr($img_acf->get_srcset_sizes()); ?>"
                                    alt="<?php echo $img_acf->get_alt_text() ?>" height="600" width="600">
                            </div>

                        <?php } ?>

                        <div class="p-4 lg:p-6 absolute bottom-0 left-0">
                            <div class="flex-grow bg-white pl-4 pr-20 rounded-xl py-3 relative">
                                <h3 class="text-xl lg:text-3xl relative z-10 tracking-tight font-medium mb-0">
                                    <?php the_sub_field('heading'); ?>
                                </h3>
                                <svg fill="#ffffff" class="absolute size-16 left-3 -top-6" viewBox="0 0 256 256" id="Flat"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M208.35352,132.82324A57.99826,57.99826,0,0,0,196.93994,128a58.016,58.016,0,0,0,11.41406-4.82324,36,36,0,1,0-36.00048-62.35352,58.00132,58.00132,0,0,0-9.88331,7.47266A58.01937,58.01937,0,0,0,164,56a36,36,0,0,0-72,0,58.01145,58.01145,0,0,0,1.52979,12.29541A58.01465,58.01465,0,0,0,83.646,60.82227a36.00017,36.00017,0,0,0-35.99952,62.35449A57.99826,57.99826,0,0,0,59.06006,128,58.016,58.016,0,0,0,47.646,132.82324a36,36,0,0,0,36.00048,62.35352,58.00132,58.00132,0,0,0,9.88331-7.47266A58.01937,58.01937,0,0,0,92,200a36,36,0,0,0,72,0,58.01145,58.01145,0,0,0-1.52979-12.29541,58.01465,58.01465,0,0,0,9.88379,7.47314,36.00017,36.00017,0,0,0,35.99952-62.35449ZM128,152a24,24,0,1,1,24-24A24.02687,24.02687,0,0,1,128,152Z" />
                                </svg>
                            </div>

                        </div>
                        <?php
                        $button_link = get_sub_field('link');
                        if ($button_link): ?>
                            <a href="<?php echo esc_url($button_link['url']); ?>"
                                title="<?php echo esc_html($button_link['title']); ?>"
                                class="absolute top-0 left-0 h-full w-full z-50">
                            </a>
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