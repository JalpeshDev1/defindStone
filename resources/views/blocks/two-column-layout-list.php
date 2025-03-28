<?php
$heading = get_sub_field('heading');
$pre_heading = get_sub_field('pre_heading');
$remove_bottom_margin = get_sub_field('remove_bottom_margin');
$reverse_column_order = get_sub_field('reverse_column_order');
$content = get_sub_field('content');
?>

<section class="<?= ($remove_bottom_margin != 1 ? 'section ' : '') ?>relative bg-tertiary py-20 lg:py-32">
    <div>
        <div class="relative z-30 container mx-auto">
            <?php if ($heading): ?>
                <div class="flex items-baseline text-white mb-12">
                    <span class="lg:text-xl"><?= esc_html($pre_heading); ?></span>
                    <h2 class="ml-1.5"><?= esc_html($heading); ?></h2>
                </div>
            <?php endif; ?>

            <?php if ($content): ?>
                <div
                    class="mb-12 content-block [&>p]:font-normal [&>p]:text-xl [&>p]:lg:text-3xl [&>p]:leading-[1.6] text-white">
                    <?php the_sub_field('content'); ?>
                </div>
            <?php endif; ?>

            <div class="grid lg:grid-cols-5 items-center">

                <div
                    class="lg:col-span-2 pb-6 lg:pb-0 relative <?= ($reverse_column_order == 1 ? 'lg:order-last' : ''); ?>">
                    <?php
                    $img_acf = GetACFImage(get_sub_field('image'));
                    if ($img_acf):
                        ?>
                        <div class="overflow-hidden rounded-3xl">
                            <div class="reveal mx-auto overflow-hidden relative z-10 h-[350px] lg:h-[550px] rounded-3xl">
                                <img class="pointer-events-none w-full h-full <?= isset($positionClass) ? $positionClass : '' ?>"
                                    src="<?= esc_url($img_acf->get_src()[0]); ?>"
                                    title="<?= esc_attr($img_acf->get_title()); ?>"
                                    data-srcset="<?= esc_attr($img_acf->get_srcset()); ?>"
                                    data-sizes="<?= esc_attr($img_acf->get_srcset_sizes()); ?>"
                                    alt="<?= esc_attr($img_acf->get_alt_text()); ?>" height="600" width="600">
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <div
                    class="lg:col-span-3 relative z-20 w-full <?= ($reverse_column_order == 1 ? 'lg:pr-12' : 'lg:pl-12') ?> pt-10 lg:pt-0">
                    <div class="grid md:grid-cols-2 gap-5">
                        <?php if (have_rows('list')): ?>
                            <?php while (have_rows('list')):
                                the_row(); ?>
                                <div class="border rounded-3xl w-full flex items-center p-4 lg:py-7 lg:px-5 bg-white">
                                    <div
                                        class="bg-primary/40 size-20 rounded flex items-center justify-center flex-shrink-0 text-dark">
                                        <?php
                                        $list_img = GetACFImage(get_sub_field('image'));
                                        if ($list_img):
                                            ?>
                                            <img class="h-12 w-4/5 object-contain" src="<?= esc_url($list_img->get_src()[0]); ?>"
                                                title="<?= esc_attr($list_img->get_title()); ?>"
                                                data-srcset="<?= esc_attr($list_img->get_srcset()); ?>"
                                                data-sizes="<?= esc_attr($list_img->get_srcset_sizes()); ?>"
                                                alt="<?= esc_attr($list_img->get_alt_text()); ?>" height="100" width="100">
                                        <?php endif; ?>
                                    </div>
                                    <div class="relative overflow-hidden z-20 ml-5">
                                        <div>
                                            <h3 class="!mb-0 lg:mb-0 text-lg lg:text-xl font-semibold">
                                                <?php the_sub_field('heading'); ?>
                                            </h3>
                                            <p class="mb-0 leading-[1.5] text-[14px]"><?php the_sub_field('text'); ?></p>
                                        </div>
                                        <?php $link = get_sub_field('link'); ?>
                                        <?php if ($link): ?>
                                            <a href="<?= esc_url($link['url']); ?>" title="<?= esc_attr($link['title']); ?>"
                                                class="mt-6 flex items-center bg-secondary text-dark py-2 px-4 w-full">
                                                <span><?= esc_html($link['title']); ?></span>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ml-2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                                                </svg>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>

                    <?php
                    $button_link = get_sub_field('button');
                    if ($button_link):
                        ?>
                        <div class="mt-12">
                            <a href="<?= esc_url($button_link['url']); ?>" <?= !empty($button_link['target']) ? 'target="' . esc_attr($button_link['target']) . '"' : ''; ?> class="button button--primary">
                                <?= esc_html($button_link['title']); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>