<?php

$heading = get_sub_field('heading');
$content = get_sub_field('content');
$remove_bottom_margin = get_sub_field('remove_bottom_margin');
?>

<section
    class="<?php if ($remove_bottom_margin != 1): ?>section <?php endif; ?> relative after:bg-gradient-to-r after:from-black/80 after:to-black/30 after:absolute after:w-full after:h-full after:top-0 after:left-0 after:z-10 overflow-hidden h-[70vh] lg:h-[90vh] flex items-center">

    <div class="absolute bottom-24 left-0 w-full">
        <div class="container relative z-50 gap-4 items-center w-full">
            <div class="md:text-left text-center lg:w-1/2">
                <?php if ($heading): ?>
                    <h1 class="text-5xl lg:text-[60px] min-[1921px]:text-[80px] font-normal mb-2 text-white w-full">
                        <?php echo $heading; ?>
                    </h1>
                <?php endif; ?>

                <?php if ($content): ?>
                    <div class="text-white">
                        <?php echo $content; ?>
                    </div>
                <?php endif; ?>

                <div class="mt-12 flex space-x-8 items-center">
                    <?php $button_link = get_sub_field('button'); ?>
                    <?php if ($button_link): ?>
                        <div class="w-full lg:w-fit mx-auto lg:mx-0">
                            <a href="<?php echo esc_url($button_link['url']); ?>" <?php $button_link['target'] ? 'target="' . esc_attr($button_link['target']) . '"' : ''; ?> class="button button--white">
                                <?php echo esc_html($button_link['title']); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>

    <?php $img_acf = GetACFImage(get_sub_field('image'));
    if ($img_acf) { ?>
        <img class="absolute top-0 left-0 h-full w-full object-cover object-center"
            src="<?php echo esc_url($img_acf->get_src()[0]); ?>" title="<?php echo esc_attr($img_acf->get_title()); ?>"
            data-srcset="<?php echo esc_attr($img_acf->get_srcset()); ?>"
            data-sizes="<?php echo esc_attr($img_acf->get_srcset_sizes()); ?>" alt="<?php echo $img_acf->get_alt_text() ?>"
            height="600" width="1920" fetchpriority="high">
    <?php } ?>

</section>