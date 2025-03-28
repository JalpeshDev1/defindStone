<div class="swiper-slider reviews-slider relative container">
    <div class="swiper-wrapper !h-auto">
        <?php if (have_rows( 'carousel' )) : ?>
            <?php while ( have_rows( 'carousel' ) ) : the_row();?>
                <div class="swiper-slide !h-auto relative after:w-20 after:h-[2px] after:bg-tertiary after:top-1/2 after:-translate-y-1/2 after:absolute after:-right-20 after:z-20">
                    <div class="h-full flex flex-wrap flex-col p-4 lg:p-8 xl:p-10 rounded-2xl bg-tertiary border border-tertiary text-white duration-200 ease-in-out">
                        <div class="flex items-center">
                            <div>
                                <?php
                                $img_acf = GetACFImage(get_field('image'));
                                if ($img_acf) :
                                ?>
                                    <div class="w-full flex-shrink-0 pr-6">
                                        <img class="aspect-square rounded-2xl h-[80px] w-[80px] lg:h-[113px] lg:w-[113px]"
                                             src="<?= esc_url($img_acf->get_src()[0]); ?>"
                                             title="<?= esc_attr($img_acf->get_title()); ?>"
                                             data-srcset="<?= esc_attr($img_acf->get_srcset()); ?>"
                                             data-sizes="<?= esc_attr($img_acf->get_srcset_sizes()); ?>"
                                             alt="<?= esc_attr($img_acf->get_alt_text()); ?>"
                                             height="100" width="100">
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="[&>p]:leading-[1]">
                                <p class="!mb-1 text-4xl font-telegraf"><?php the_sub_field( 'heading' ); ?></p>
                            </div>
                        </div>

                        <div class="pt-4 lg:pt-6 w-full">
                            <p class="text-[15px]"><?php the_sub_field( 'content' ); ?></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p>No carousel items available at the moment.</p>
        <?php endif; ?>
    </div>
    <div class="flex space-x-4 justify-between mt-12">
            <div class="size-16 border border-white rounded-full swiper-button-slide-prev hover:bg-white group flex items-center justify-center cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="size-6 group-hover:text-accent">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
            </div>
            <div class="size-16 border border-white rounded-full swiper-button-slide-next hover:bg-white flex items-center justify-center group cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="size-6 group-hover:text-accent">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                </svg>
            </div>
        </div>
</div>
