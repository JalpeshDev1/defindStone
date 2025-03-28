<?php
$add_bg = get_sub_field('add_bg');
$text_animation = get_sub_field('add_text_animation');
$remove_bottom_margin = get_sub_field('remove_bottom_margin');
?>

<section
    class="relative <?php if ($remove_bottom_margin != 1): ?> section <?php endif; ?> <?php if ($add_bg == 1): ?>bg-gradient-to-br from-primary/50 to-primary/90 py-20 lg:py-24 text-white <?php endif; ?>">
    <div class="container mx-auto content-block">

        <div class="max-w-6xl text-center mx-auto">
            <div
                class="<?php echo $text_animation ? 'paragraph' : ''; ?> [&>p]:lg:text-4xl [&>p]:text-xl [&>p]:font-telegraf [&>p]:leading-[1.6] [&>p]:font-normal">
                <?php the_sub_field('content'); ?>
            </div>
        </div>

        <?php $button_link = get_sub_field('button'); ?>
        <?php if ($button_link): ?>
            <a href="<?php echo esc_url($button_link['url']); ?>" class="flex mt-10 group justify-center"
                title="<?php echo esc_html($button_link['title']); ?>">
                <span
                    class="h-[50px] flex items-center justify-center px-8 bg-accent text-white rounded-full group-hover:bg-white group-hover:border-accent group-hover:border group-hover:text-accent duration-100 ease-in-out"><?php echo esc_html($button_link['title']); ?></span>
                <div
                    class="size-[50px] border-[2px] border-accent rounded-full flex items-center justify-center hover:translate-x-2 duration-150 ease-in-out transform rotate-[-45deg] group-hover:rotate-[0deg] group-hover:bg-accent group-hover:ml-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6 text-primary group-hover:text-white duration-150 ease-in-out">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3">
                        </path>
                    </svg>
                </div>

            </a>
        <?php endif; ?>
    </div>
</section>