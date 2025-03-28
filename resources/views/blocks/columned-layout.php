<?php
$remove_bottom_margin = get_sub_field('remove_bottom_margin');
$pre_heading = get_sub_field('pre_heading');
$heading = get_sub_field('heading');
$content = get_sub_field('content');
$image_style = get_sub_field('image_style');
$number_of_cols = get_sub_field('number_of_columns');
$text_align = get_sub_field('text_align');
$section_classes = isset($background) ? $background : '';
$additiional_content = get_sub_field('additional_content');
?>

<section
    class="relative <?php echo ($remove_bottom_margin != 1) ? 'section' : ''; ?> columned-layout <?php echo esc_attr($section_classes); ?>">
    <div class="<?php echo ($number_of_cols == 4) ? 'container' : 'max-w-7xl mx-auto px-4'; ?> rounded-3xl">
        <div class="container grid lg:grid-cols-2 gap-4 mb-8 lg:mb-12">
            <?php if ($heading): ?>
                <div class="flex items-baseline text-primary">
                    <span class="lg:text-xl"><?= esc_html($pre_heading); ?></span>
                    <h2 class="ml-1.5"><?= esc_html($heading); ?></h2>
                </div>
            <?php endif; ?>

            <div class="content-block text-primary [&>p]:font-normal">
                <?php echo $content; ?>
            </div>
        </div>

        <?php if (have_rows('columns')): ?>
            <div class="grid md:grid-cols-2 lg:grid-cols-<?php echo intval($number_of_cols); ?> gap-4">
                <?php while (have_rows('columns')):
                    the_row();

                    $img_acf = GetACFImage(get_sub_field('image'));
                    $sub_text = get_sub_field('sub_text');
                    $heading = get_sub_field('heading');
                    $background = get_sub_field(selector: 'background');
                    ?>
                    <div
                        class="overflow-hidden <?php echo $background; ?> rounded-xl border flex flex-col justify-between  <?php echo $img_acf ? 'p-4 lg:p-5' : 'p-6 lg:p-10'; ?> text-<?php echo esc_attr($text_align); ?>">
                        <?php

                        if ($img_acf):
                            ?>
                            <div class="rounded mb-6 overflow-hidden 
                                <?php
                                echo ($image_style == 1)
                                    ? 'h-[50px] lg:h-[60px] w-auto'
                                    : 'w-full h-[300px] lg:h-[350px]';
                                echo ($text_align == 'center') ? ' mx-auto' : '';
                                ?>">
                                <img class="<?php echo ($image_style == 1)
                                    ? 'h-full w-auto object-contain'
                                    : 'w-full h-full object-cover rounded'; ?>"
                                    src="<?php echo esc_url($img_acf->get_src()[0]); ?>"
                                    title="<?php echo esc_attr($img_acf->get_title()); ?>"
                                    data-srcset="<?php echo esc_attr($img_acf->get_srcset()); ?>"
                                    data-sizes="<?php echo esc_attr($img_acf->get_srcset_sizes()); ?>"
                                    alt="<?php echo esc_attr($img_acf->get_alt_text()); ?>" height="600" width="600">
                            </div>
                        <?php endif; ?>

                        <div
                            class="text-<?php echo esc_attr($text_align); ?> flex-grow <?php echo ($background == 'bg-white') ? 'text-primary' : 'text-white'; ?>">
                            <div class="flex-grow">
                                <?php if ($heading): ?>
                                    <h3 class="text-xl lg:text-3xl mb-3 tracking-tighter font-telegraf text-white">
                                        <?php echo $heading; ?>
                                    </h3>
                                <?php endif; ?>
                                <?php if ($sub_text): ?>
                                    <div class="bg-white px-6 py-1 5 rounded-full text-primary w-fit">
                                        <p class="mb-0 text-base font-medium"><?php echo $sub_text; ?></p>
                                    </div>
                                <?php endif; ?>
                                <?php the_sub_field('content'); ?>
                            </div>
                        </div>

                        <?php
                        $button_link = get_sub_field('link');
                        if ($button_link):
                            ?>
                            <div class="mx-auto text-center mt-4">
                                <a href="<?php echo esc_url($button_link['url']); ?>" <?php echo ($button_link['target']) ? 'target="' . esc_attr($button_link['target']) . '"' : ''; ?>
                                    class="button button--primary !inline-block !w-full">
                                    <?php echo esc_html($button_link['title']); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>

        <?php if ($additiional_content == 1): ?>
            <?php if (have_rows('addiitonal_group')): ?>
                <?php while (have_rows('addiitonal_group')):
                    the_row();
                    $link = get_sub_field('link');
                    ?>

                    <div class="flex mt-14 flex-wrap flex-col md:flex-row max-md:space-y-4">
                        <div class="w-full md:w-1/3 [&>p]:text-[18px] [&>p]:leading-[1.6] lg:pr-4 font-medium max-sm:text-center">
                            <?php the_sub_field('content'); ?>
                        </div>

                        <div class="group w-full md:w-1/3">
                            <a href="<?php echo esc_url($link['url']); ?>"
                                class="bg-[#848383] p-5 w-full lg:w-4/5 text-white rounded-xl relative group-hover:bg-primary duration-150 ease-in-out cursor-pointer block">
                                <div class="w-4/5 [&>p]:mb-0">
                                    <h3 class="text-xl min-[1921px]:text-3xl"><?php echo esc_html($link['title']); ?></h3>
                                    <p class="text-[14px] min-[1921px]:text-xl"> <?php the_sub_field('link_text'); ?>
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
                            </a>
                        </div>
                    </div>

                <?php endwhile; ?>
            <?php endif; ?>
        <?php endif; ?>

    </div>
    <?php
    $button_link = get_sub_field('button');
    if ($button_link):
        ?>
        <div class="mt-6 mx-auto lg:w-fit">
            <a href="<?php echo esc_url($button_link['url']); ?>" <?php echo ($button_link['target']) ? 'target="' . esc_attr($button_link['target']) . '"' : ''; ?> class="button button--primary">
                <?php echo esc_html($button_link['title']); ?>
            </a>
        </div>
    <?php endif; ?>
</section>