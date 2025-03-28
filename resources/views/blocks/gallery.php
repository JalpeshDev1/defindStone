<?php
?>

<section class="relative <?php if (get_sub_field('remove_bottom_margin') != 1): ?> section <?php endif; ?>">
    <div class="container content-block">

        <div
            class="lg:w-1/2 [&>p]:text-[22px] [&>p]:lg:text-[27px] [&>p]:font-normal leading-[2] text-primary font-telegraf mb-10 lg:mb-16">
            <?php the_sub_field('content'); ?>
        </div>

        <div id="content">
            <div id="animated-thumbnail">
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mt-8">

                    <?php $gallery_images = get_sub_field('gallery'); ?>
                    <?php if ($gallery_images): ?>
                        <?php foreach ($gallery_images as $gallery_image): ?>
                            <a href="<?php echo esc_url($gallery_image['url']); ?>" imageanchor="1" style=""
                                class="h-[150px] lg:h-[300px] relative block w-full card">
                                <img src="<?php echo esc_url($gallery_image['sizes']['large']); ?>" width="640" height="360"
                                    class="h-full w-full object-cover relative" data-original-width="1600"
                                    data-original-height="900" />
                            </a>
                        <?php endforeach; ?>
                    <?php endif; ?>


                </div>
            </div>

        </div>
    </div>
</section>