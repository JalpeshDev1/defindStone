<?php

$colOrder = get_sub_field('reverse_column_order');

$heading = get_sub_field('heading');
$sub_heading = get_sub_field('sub_heading');
$remove_bottom_margin = get_sub_field('remove_bottom_margin');


?>

<section class="<?php if ($remove_bottom_margin != 1): ?>section <?php endif; ?> relative">
    <div class="relative">


        <div class="container relative z-30">
            <div class="grid lg:grid-cols-2 gap-4 ">
                <div
                    class="<?php if ($colOrder == 1): ?>lg:order-last<?php endif; ?> pb-10 lg:pb-0 relative flex flex-col h-full justify-between">
                    <?php if ($heading): ?>
                        <div class="flex items-baseline text-primary mb-12 container">
                            <span class="lg:text-xl"><?= esc_html($sub_heading); ?></span>
                            <h2 class="ml-1.5"><?= esc_html($heading); ?></h2>
                        </div>
                    <?php endif; ?>

                    <div class="text-primary [&>p]:text-base">
                        <?php the_sub_field('content'); ?>
                    </div>

                </div>
                <div
                    class="content-block relative z-20 <?php if ($colOrder == 1): ?>lg:pr-16<?php else: ?>lg:pl-16<?php endif; ?>">
                    <div class="">

                        <div class="text-primary font-telegraf [&>p]:text-base [&>p]:lg:text-5xl [&>p]:font-normal">
                            <?php the_sub_field('content_2'); ?>
                        </div>

                        <?php $button_link = get_sub_field('button'); ?>
                        <?php if ($button_link): ?>
                            <a href="<?php echo esc_url($button_link['url']); ?>" class="flex mt-10 group"
                                title="<?php echo esc_html($button_link['title']); ?>">
                                <span
                                    class="h-[50px] flex items-center justify-center px-8 bg-accent text-white rounded-full group-hover:bg-white group-hover:border-accent group-hover:border group-hover:text-accent duration-100 ease-in-out"><?php echo esc_html($button_link['title']); ?></span>
                                <div
                                    class="size-[50px] border-[2px] border-accent rounded-full flex items-center justify-center hover:translate-x-2 duration-150 ease-in-out transform rotate-[-45deg] group-hover:rotate-[0deg] group-hover:bg-accent group-hover:ml-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="size-6 text-primary group-hover:text-white duration-150 ease-in-out">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3">
                                        </path>
                                    </svg>
                                </div>

                            </a>
                        <?php endif; ?>
                    </div>


                </div>
            </div>

        </div>

    </div>

</section>
<!--/Two column text with image -->