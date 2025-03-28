<?php

$heading = get_sub_field('heading');
$content = get_sub_field('content');
$remove_bottom_margin = get_sub_field('remove_bottom_margin');
?>

<section
    class="<?php if ($remove_bottom_margin != 1): ?>section <?php endif; ?> relative after:bg-gradient-to-r after:from-black/80 after:to-black/30 after:absolute after:w-full after:h-full after:top-0 after:left-0 after:z-10 overflow-hidden min-h-[95vh] flex flex-col lg:flex-row items-center max-lg:justify-center py-28">

    <div class="container lg:-mt-10">
        <div class="relative z-50 gap-4 items-center w-full">
            <div class="">
                <h1 class="text-5xl lg:text-7xl min-[1921px]:text-[80px] font-normal mb-2 text-white w-full">
                    <?php echo $heading; ?>
                </h1>

                <div class="mt-12 flex lg:space-x-8 items-center flex-col lg:flex-row max-lg:space-y-4">
                    <?php $button_link = get_sub_field('button'); ?>
                    <?php if ($button_link): ?>
                        <div class="w-full lg:w-fit mx-auto lg:mx-0">
                            <a href="<?php echo esc_url($button_link['url']); ?>" <?php $button_link['target'] ? 'target="' . esc_attr($button_link['target']) . '"' : ''; ?> class="button button--white">
                                <?php echo esc_html($button_link['title']); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <?php $secondary_link = get_sub_field('secondary_link'); ?>
                    <?php if ($secondary_link): ?>
                        <a href="<?php echo esc_url($secondary_link['url']); ?>" class="underline text-white"
                            target="<?php echo esc_attr($secondary_link['target']); ?>"><?php echo esc_html($secondary_link['title']); ?></a>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>

    <div class="lg:absolute lg:bottom-32 lg:left-1/2 lg:-translate-x-1/2 w-full z-20 max-md:mt-8">
        <div class="container z-50 grid lg:grid-cols-2 gap-4 lg:gap-16 items-center">
            <div class="lg:pr-24">
                <div class="lg:text-left text-center">

                    <div
                        class="[&>p]:text-lg [&>p]:md:text-xl [&>p]:min-[1921px]:text-3xl [&>p]:leading-[1.8] w-fit mx-auto text-white">
                        <?php echo $content; ?>
                    </div>
                </div>
            </div>

            <?php if (have_rows('cta')): ?>
                <?php while (have_rows('cta')):
                    the_row(); ?>
                    <div class="group relative">
                        <div
                            class="bg-[#848383] p-5 w-[90%] lg:w-2/3 mx-auto lg:ml-auto text-white rounded-xl relative group-hover:bg-primary duration-150 ease-in-out cursor-pointer">
                            <div class="w-[90%] lg:w-4/5 [&>p]:mb-0">
                                <h3 class="text-lg min-[1921px]:text-3xl"><?php the_sub_field('heading'); ?></h3>
                                <p class="min-[1921px]:text-xl"><?php the_sub_field('content'); ?>
                                </p>
                            </div>
                            <div
                                class="size-[30px] bg-white rounded-full absolute top-5 right-5 flex items-center justify-center group-hover:transform group-hover:rotate-[45deg] duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="size-4 text-primary">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                                </svg>
                            </div>
                        </div>
                        <?php $link = get_sub_field('link'); ?>
                        <?php if ($link): ?>
                            <a href="<?php echo esc_url($link['url']); ?>" title="<?php echo esc_html($link['title']); ?>"
                                class="absolute top-0 left-0 h-full w-full"><span
                                    class="sr-only"><?php echo esc_html($link['title']); ?></span></a>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>

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