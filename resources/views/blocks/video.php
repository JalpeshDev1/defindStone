<?php
$remove_bottom_margin = get_sub_field('remove_bottom_margin');
$pre_heading = get_sub_field('pre_heading');
$heading = get_sub_field('heading');
$content = get_sub_field('content');
?>

<section class="<?php if ($remove_bottom_margin != 1): ?> section<?php endif; ?> py-20 lg:py-32 bg-primary">

    <div class="container grid lg:grid-cols-2 gap-4 mb-12 lg:mb-24">
        <?php if ($heading): ?>
            <div class="flex items-baseline text-white">
                <span class="lg:text-xl"><?= esc_html($pre_heading); ?></span>
                <h2 class="ml-1.5 w-1/2"><?= esc_html($heading); ?></h2>
            </div>
        <?php endif; ?>

        <div class="content-block text-white">
            <?php the_sub_field('content'); ?>
        </div>
    </div>



    <div class="container relative">
        <div class="absolute -left-20 top-0 lg:-mt-48 -mt-40 size-60 lg:size-[330px]">
        <svg class="stroke-white fill-none h-full w-full">
            <use xlink:href="#interlink" />
        </svg>
        </div>

        <iframe class="w-full aspect-video rounded-lg overflow-hidden" src="<?php the_sub_field('video'); ?>"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>

</section>
<!--/Video embed -->