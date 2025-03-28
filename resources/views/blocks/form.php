<?php
$layout = get_sub_field('alt_layout');
$removeMargin = get_sub_field('remove_bottom_margin');

?>

<?php if ($layout == 1): ?>

    <section class="<?php if ($removeMargin != 1): ?>section <?php endif; ?>">
        <div class="container relative z-20 form-block">
            <div class="flex flex-wrap items-center justify-center">

                <div class="w-full lg:w-[60%]">
                    <div class="mb-8">
                        <?php the_sub_field('content'); ?>
                    </div>

                    <div class="">
                        <?php the_sub_field('form'); ?>
                    </div>

                    <?php $button_link = get_sub_field('button'); ?>
                    <?php if ($button_link): ?>
                        <div class="mt-8">
                            <a href="<?php echo esc_url($button_link['url']); ?>" <?php $button_link['target'] ? 'target="' . esc_attr($button_link['target']) . '"' : ''; ?> class="button button--primary">
                                <?php echo esc_html($button_link['title']); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>

    </section>


<?php else: ?>

    <section class="<?php if ($removeMargin != 1): ?>section <?php endif; ?> relative">
        <div class="relative z-20 form-block">
            <div class="flex flex-wrap items-center">

                <div class="w-full lg:w-[67%] pb-12 lg:pb-0 relative">
                    <div class="w-2/3 mx-auto grid grid-cols-2 gap-8 lg:gap-10">
                        <div class="[&>h1]:font-normal [&>p]:!text-sm [&>p]:mt-20">
                            <?php the_sub_field('content'); ?>
                        </div>
                        <div class="grid grid-cols-2 gap-4 lg:gap-10">
                            <div>
                                <p class="font-telegraf font-normal">Phone</p>

                                <p><a href="tel:01382 370220">01382 370220</a></p>
                            </div>
                            <div>
                                <p class="font-telegraf font-normal">Email</p>

                                <p><a href="mailto:sales@denfindstone.co.uk">sales@denfindstone.co.uk</a></p>
                            </div>

                            <div>
                                <p class="font-telegraf font-normal">Location</p>
                                <p>Pitairlie Quarry
                                    Denfind Farm
                                    Monikie
                                    Angus, DD5 3PZ</p>
                            </div>

                            <div>
                                <p class="font-telegraf font-normal">Socials</p>

                                <p><a href="">Facebook</a></p>
                                <p><a href="">Instagram</a></p>
                                <p><a href="">LinkedIn</a></p>
                            </div>
                        </div>

                    </div>
                </div>



                <div class="w-full lg:w-[33%] pb-6 lg:pb-0 lg:pl-20 content-block">
                    <?php $img_acf = GetACFImage(get_sub_field('image'));
                    if ($img_acf) { ?>
                        <img class="max-h-[650px]" src="<?php echo esc_url($img_acf->get_src()[0]); ?>"
                            title="<?php echo esc_attr($img_acf->get_title()); ?>"
                            data-srcset="<?php echo esc_attr($img_acf->get_srcset()); ?>"
                            data-sizes="<?php echo esc_attr($img_acf->get_srcset_sizes()); ?>"
                            alt="<?php echo $img_acf->get_alt_text() ?>" height="600" width="1920">
                    <?php } ?>
                </div>

            </div>
        </div>

        <div class="container max-w-7xl mx-auto relative z-20 form-block">
            <div class="flex flex-wrap items-center">

                <div class="w-full lg:w-[45%] pb-12 lg:pb-0 relative">
                    <div class="">
                        <?php

                        $form = get_sub_field('form');
                        echo $form;
                        ?>
                    </div>
                </div>

                <div class="w-full lg:w-[55%] pb-6 lg:pb-0 lg:pl-20 xl:pl-36 content-block">
                    <?php $button_link = get_sub_field('button'); ?>
                    <?php if ($button_link): ?>
                        <div class="mt-8">
                            <a href="<?php echo esc_url($button_link['url']); ?>" <?php $button_link['target'] ? 'target="' . esc_attr($button_link['target']) . '"' : ''; ?> class="button button--primary">
                                <?php echo esc_html($button_link['title']); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <div class="bg-accent grid grid-cols-2 rounded-xl">
                        <div class=" p-8">
                            <p class="text-white font-telegraf text-[28px]">Interested in joining the Denfind team?</p>
                        </div>
                        <div class="pt-4">
                            <img src="http://denfind/wp-content/uploads/2025/02/join.png" class="max-h-[200px] lg:ml-auto">
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>

<?php endif; ?>