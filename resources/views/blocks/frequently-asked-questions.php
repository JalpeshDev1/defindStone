<section class="<?php if (get_sub_field('remove_bottom_margin') != 1): ?> section <?php endif; ?> px-4">
    <div class="bg-primary/50 py-12 lg:py-20 lg:mx-20 rounded-2xl">
        <div class="max-w-6xl mx-auto px-4 faq">

            <div class="max-w-2xl text-center mb-8 mx-auto generic-text">
                <?php the_sub_field('content'); ?>
            </div>

            <?php if (have_rows('faqs')): ?>
                <div class="accordian">
                    <?php while (have_rows('faqs')):
                        the_row(); ?>

                        <div class="accordian-item">
                            <div class="accordian-item-header bg-white border rounded-full px-6">
                                <h4><?php the_sub_field('question'); ?></h4>
                            </div>
                            <div class="accordian-item-body px-6">
                                <div class="accordian-item-body-content">
                                    <?php the_sub_field('answer'); ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <?php // no rows found ?>
            <?php endif; ?>

        </div>
    </div>
    </div>

</section>