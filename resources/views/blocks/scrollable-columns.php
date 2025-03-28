<?php
$remove_bottom_margin = get_sub_field('remove_bottom_margin');
$pre_heading = get_sub_field('pre_heading');
$heading = get_sub_field('heading');
$content = get_sub_field('content');
$image_style = get_sub_field('image_style');

$section_classes = isset($background) ? $background : '';
?>

<section
    class="relative <?php echo ($remove_bottom_margin != 1) ? 'section' : ''; ?> columned-layout <?php echo esc_attr($section_classes); ?> bg-accent py-12 lg:py-32">
    <div>
        <div class="container grid lg:grid-cols-3 gap-4 text-white">
            <?php if ($heading): ?>
                <div class="flex items-baseline lg:col-span-2">
                    <span class="lg:text-xl"><?= esc_html($pre_heading); ?></span>
                    <h2 class="ml-1.5"><?= esc_html($heading); ?></h2>
                </div>
            <?php endif; ?>

            <div class="content-block [&>p]:lg:text-[14px] [&>p]:lg:leading-[3]">
                <?php echo $content; ?>
            </div>
        </div>

        <?php
        $row_index = 0;
        if (have_rows('columns')): ?>
            <div class="horizontal-section pt-28 pl-4 lg:pl-20">
                <div class="horizontal-wrapper">
                    <?php while (have_rows('columns')):
                        the_row();

                        $img_acf = GetACFImage(get_sub_field('image'));

                        if ($row_index % 2 === 0) {
                            $text_order = "order-3";
                            $divider_order = "order-2";
                            $image_order = "order-1";
                        } else {
                            $image_order = "order-3";
                            $divider_order = "order-2";
                            $text_order = "order-1";
                        }
                        ?>
                        <div class="panel flex flex-col justify-between relative">

                            <div class="bg-white size-12 rounded-full absolute top-1/2 -left-6 -translate-y-1/2"></div>

                            <div class="<?php echo $image_order; ?> w-3/4 mx-auto">
                                <?php if ($img_acf): ?>
                                    <div class="rounded-3xl overflow-hidden w-full h-[250px] lg:h-[320px] min-[1921px]:h-[400px]">
                                        <img class="w-full h-full object-cover rounded"
                                            src="<?php echo esc_url($img_acf->get_src()[0]); ?>"
                                            title="<?php echo esc_attr($img_acf->get_title()); ?>"
                                            data-srcset="<?php echo esc_attr($img_acf->get_srcset()); ?>"
                                            data-sizes="<?php echo esc_attr($img_acf->get_srcset_sizes()); ?>"
                                            alt="<?php echo esc_attr($img_acf->get_alt_text()); ?>" height="600" width="600">
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="border-t bg-white w-full my-12 <?php echo $divider_order; ?>"></div>

                            <div
                                class="h-[250px] lg:h-[320px] min-[1921px]:h-[400px] overflow-hidden flex-grow text-white text-wrap <?php echo $text_order; ?> border-l border-dashed border-white pl-6">
                                <div class="flex-grow w-3/4 mx-auto">
                                    <h3 class="text-xl lg:text-3xl mb-3 tracking-tighter font-telegraf">
                                        <?php the_sub_field('heading'); ?>
                                    </h3>
                                    <div class="[&>p]:text-[16px] [&>p]:lg:leading-[2.5]">
                                        <?php the_sub_field('content'); ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <?php $row_index++; ?>
                    <?php endwhile; ?>
                </div>
            </div>
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