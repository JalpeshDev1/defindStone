<?php

$heading = get_sub_field('heading');
$content = get_sub_field('content');
$remove_bottom_margin = get_sub_field('remove_bottom_margin');
?>

<section
    class="<?php if ($remove_bottom_margin != 1): ?>section <?php endif; ?> relative after:bg-gradient-to-r after:from-black/80 after:to-black/30 after:absolute after:w-full after:h-full after:top-0 after:left-0 after:z-10 overflow-hidden h-[75dvh] lg:h-[80dvh] flex items-center hotspot-section">

    <div class="absolute bottom-24 left-0 w-full">
        <div class="container relative z-50 gap-4 items-center w-full">
            <div class="md:text-left text-center lg:w-1/3">
                <?php if ($heading): ?>
                    <h2 class="text-5xl lg:text-[60px] min-[1921px]:text-[80px] font-normal mb-2 text-white w-full">
                        <?php echo $heading; ?>
                    </h2>
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
            height="600" width="1920">
    <?php } ?>

    <?php if (have_rows('hotspots')): ?>
        <?php while (have_rows('hotspots')):
            the_row(); ?>
            <div class="absolute z-40 flex flex-wrap items-center" style="top:<?php the_sub_field('top'); ?>; left:<?php the_sub_field('left'); ?>;">
                <div class="border-white border size-12 rounded-full flex items-center justify-center">
                    <div class="bg-white size-4 rounded-full"></div>

                </div>
                <div class="bg-primary px-4 py-2 rounded-lg shadow-md ml-2">
                    <p class="text-white mb-0 font-telegraf leading-[1] max-sm:text-sm"><?php the_sub_field('label'); ?></p>

                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>

  <svg class="connecting-line" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 100 100" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; z-index: 30;">
    <line x1="64" y1="22.5" x2="60.5" y2="79" stroke="#fff" stroke-width="0.1" stroke-linecap="round" pathLength="100" />
  </svg>

</section>