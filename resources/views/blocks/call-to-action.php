<?php
$remove_bottom_margin = get_sub_field('remove_bottom_margin');
$alt_style = get_sub_field('alt_style');
$button_link = get_sub_field('button');
$sub_heading = get_sub_field('sub_heading') ?? '';
$heading = get_sub_field('heading');
$content = get_sub_field('content');
?>

<section class="<?php if (get_sub_field('remove_bottom_margin') != 1): ?> section <?php endif; ?> text-primary">

    <?php if ($alt_style == 1): ?>

        <div class="relative container flex items-center flex-col">


            <img src="/wp-content/uploads/2025/02/Clip-path-group.svg" class="h-20 w-auto mx-auto mb-12">
            <div class="lg:w-3/5 text-center">
                <h3 class="text-4xl lg:text-6xl">
                    <?php echo $heading; ?>
                </h3>

            </div>
            <div class="">
                <?php if ($button_link): ?>
                    <a href="<?php echo esc_url($button_link['url']); ?>" class="flex mt-8 group"
                        title="<?php echo esc_html($button_link['title']); ?>">
                        <span
                            class="h-[50px] flex items-center justify-center px-8 bg-primary text-white rounded-full group-hover:bg-white group-hover:border-primary group-hover:border group-hover:text-primary duration-100 ease-in-out"><?php echo esc_html($button_link['title']); ?></span>
                        <div
                            class="size-[50px] border border-primary rounded-full flex items-center justify-center hover:translate-x-2 duration-150 ease-in-out transform rotate-[-45deg] group-hover:rotate-[0deg] group-hover:bg-primary group-hover:ml-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor"
                                class="size-6 text-primary group-hover:text-white duration-150 ease-in-out">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3">
                                </path>
                            </svg>
                        </div>

                    </a>
                <?php endif; ?>

            </div>


        </div>

    <?php else: ?>

        <div class="relative container flex items-center lg:flex-row flex-col">


            <div class="md:w-1/5 text-center">
                <p class="mb-0"><?php echo $sub_heading; ?></p>
            </div>
            <div class="md:w-3/5 text-center">
                <h3>
                    <?php echo $heading; ?>
                </h3>
                <div class="max-w-xl h-[1px] bg-primary mx-auto my-4"></div>
                <div class="text-lg">
                    <?php echo $content; ?>
                </div>
            </div>
            <div class="w-1/5 flex justify-end">

                <?php if ($button_link): ?>
                    <a href="<?php echo esc_url($button_link['url']); ?>" title="<?php echo esc_html($button_link['title']); ?>"
                        class="size-[50px] bg-primary rounded-full flex items-center justify-center hover:translate-x-2 duration-150 ease-in-out">
                        <span class="sr-only"><?php echo esc_html($button_link['title']); ?></span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5 md:size-8 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </a>
                <?php endif; ?>

            </div>


        </div>

    <?php endif; ?>

</section>