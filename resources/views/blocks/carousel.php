<?php
$heading = get_sub_field('heading') ?? '';
$pre_heading = get_sub_field('pre_heading') ?? '';
$carousel_type = get_sub_field('carousel_type');
$remove_bottom_margin = get_sub_field('remove_bottom_margin');
$content = get_sub_field('content') ?? '';
$background = get_sub_field('background') ?? '';
$bg_classes = '';

if ($carousel_type === 'Use block carousel') {
    switch ($background) {
        case 'Sand':
            $bg_classes = 'bg-accent py-20 lg:py-32 text-white';
            break;
        case 'White':
            $bg_classes = 'bg-white text-primary';
            break;
        case 'Primary':
            $bg_classes = 'bg-primary py-20 lg:py-32 text-white';
            break;
        default:
            $bg_classes = '';
            break;
    }
} elseif ($carousel_type === 'Product') {
    $bg_classes = 'bg-tertiary pt-20';
}
?>

<section class="<?php echo ($remove_bottom_margin != 1 ? 'section ' : '') . 'relative ' . $bg_classes; ?>">
    <div class="container relative z-10">

        <?php if ($carousel_type == 'Use block carousel' && $heading): ?>
            <div class="mb-20 lg:w-[40%] mx-auto text-center">
                <div class="flex flex-col text-center justify-center mb-8">
                    <span class="lg:text-xl"><?= esc_html($pre_heading); ?></span>
                    <h2 class="mb-0"><?= esc_html($heading); ?></h2>
                </div>
                <?php the_sub_field('content'); ?>
            </div>
        <?php endif; ?>


        <?php
        switch ($carousel_type) {
            case 'Reviews':
                get_template_part('resources/views/parts/views/carousels/reviews');
                break;

            case 'Product':
                get_template_part('resources/views/parts/views/carousels/products');
                break;

            case 'Use block carousel':
                get_template_part('resources/views/parts/views/carousels/block-carousel');
                break;
        }
        ?>

    </div>
</section>