<div class="container <?php if (get_sub_field('remove_bottom_margin') != 1): ?> section <?php endif; ?>">

    <div class="max-w-4xl text-center mb-8 mx-auto content-block">
        <?php the_sub_field('content'); ?>
    </div>

    <div>

        <?php if (have_rows('tabs')): ?>
            <dl class="responsive-tabs px-4 max-w-7xl mx-auto">
                <?php $i = 0;
                while (have_rows('tabs')):
                    the_row(); ?>

                    <dt <?php if ($i == 0): ?>class="active" <?php endif; ?>><?php the_sub_field('heading'); ?></dt>
                    <dd class="content-block bg-primary/30 rounded-xl my-6 !px-6">
                        <h3 class="font-semibold"><?php the_sub_field('heading'); ?></h3>
                        <?php the_sub_field('content'); ?>
                    </dd>

                    <?php $i++; endwhile; ?>
            </dl>
        <?php else: ?>
            <?php // no rows found ?>
        <?php endif; ?>


        <?php $button_link = get_sub_field('button'); ?>
        <?php if ($button_link): ?>
            <div class="mt-12 mx-auto lg:w-fit">
                <a href="<?php echo esc_url($button_link['url']); ?>" <?php $button_link['target'] ? 'target="' . esc_attr($button_link['target']) . '"' : ''; ?> class="button button--primary">
                    <?php echo esc_html($button_link['title']); ?>
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>