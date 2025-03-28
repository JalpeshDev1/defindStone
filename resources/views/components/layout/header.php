<header class="header border-b border-white">
    <div class="px-3 lg:px-6 py-5 container">
        <div class="row v-center">
            <div class="header-item item-left">
                <div class="logo">
                    <?php $img_acf = GetACFImage(get_field('nav_logo', 'option'));
                    if ($img_acf): ?>

                        <a href="<?php echo get_site_url(); ?>" aria-label="Home Link">
                            <!-- ACF Image START-->
                            <img class='w-auto h-7 lg:h-[34px] 2xl:h-[40px] mx-auto' height="30" width="200"
                                src="<?php echo esc_url($img_acf->get_src()[0]); ?>"
                                title="<?php echo esc_attr($img_acf->get_title()); ?>"
                                srcset="<?php echo esc_attr($img_acf->get_srcset()); ?>"
                                sizes="<?php echo esc_attr($img_acf->get_srcset_sizes()); ?>"
                                alt="<?php echo $img_acf->get_alt_text() ?>" />
                            <!-- ACF Image END -->
                        </a>
                    <?php endif; ?>


                </div>
            </div>
            <div class="header-item item-center 2xl:px-4">
                <div class="menu-overlay"></div>
                <nav class="menu">
                    <div class="mobile-menu-head">
                        <div class="go-back bg-light flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                            </svg>

                        </div>
                        <div class="current-menu-title"></div>
                        <div class="mobile-menu-close bg-primary flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>

                        </div>
                    </div>
                    <ul class="menu-main 2xl:flex items-center">
                        <?php if (have_rows('flexible_menu', 'option')): ?>
                            <?php while (have_rows('flexible_menu', 'option')):
                                the_row(); ?>

                                <?php if (get_row_layout() == 'basic_link'): ?>
                                    <?php $menu_link = get_sub_field('menu_link'); ?>
                                    <?php if ($menu_link): ?>
                                        <li>
                                            <a href="<?php echo esc_url($menu_link['url']); ?>"
                                                target="<?php echo esc_attr($menu_link['target']); ?>" class="">
                                                <?php echo esc_html($menu_link['title']); ?>
                                            </a>
                                        </li>

                                    <?php endif; ?>

                                <?php elseif (get_row_layout() == 'mega_menu'): ?>

                                    <li class="menu-item-has-children">

                                        <?php $top_level = get_sub_field('top_level'); ?>
                                        <?php if ($top_level): ?>
                                            <div class="flex items-center sub-menu-container">
                                                <a href="<?php echo esc_url($top_level['url']); ?>"
                                                    target="<?php echo esc_attr($top_level['target']); ?>"
                                                    class=""><?php echo esc_html($top_level['title']); ?>
                                                </a>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="ml-1 w-3 h-3">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                                </svg>
                                            </div>

                                        <?php endif; ?>
                                        <?php
                                        $cols = get_sub_field('number_columns');
                                        ?>
                                        <div class="sub-menu mega-menu mega-menu-column-<?php echo $cols; ?>">

                                            <?php if (have_rows('columns')): ?>
                                                <?php while (have_rows('columns')):
                                                    the_row(); ?>
                                                    <div class="list-item">
                                                        <?php if (get_sub_field('heading')): ?>
                                                            <div class="border-b lg:border-none">
                                                                <p class="lg:text-xl font-medium mb-2 lg:mb-4">
                                                                    <?php the_sub_field('heading'); ?>
                                                                </p>
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php $img_acf = GetACFImage(get_sub_field('image'));
                                                        if ($img_acf) { ?>

                                                            <img class='pointer-events-none !w-auto h-[30px] lg:h-[40px]'
                                                                src="<?php echo esc_url($img_acf->get_src()[0]); ?>"
                                                                title="<?php echo esc_attr($img_acf->get_title()); ?>"
                                                                data-srcset="<?php echo esc_attr($img_acf->get_srcset()); ?>"
                                                                data-sizes="<?php echo esc_attr($img_acf->get_srcset_sizes()); ?>"
                                                                alt="<?php echo $img_acf->get_alt_text() ?>" height="600" width="600">


                                                        <?php } ?>
                                                        <ul>
                                                            <?php if (have_rows('nav_links')): ?>
                                                                <?php while (have_rows('nav_links')):
                                                                    the_row(); ?>
                                                                    <?php $nav_link = get_sub_field('nav_link'); ?>
                                                                    <?php if ($nav_link): ?>

                                                                        <?php $img_acf = GetACFImage(get_sub_field('image'));

                                                                        if ($img_acf): ?>
                                                                            <a href="<?php echo esc_url($nav_link['url']); ?>"
                                                                                target="<?php echo esc_attr($nav_link['target']); ?>">
                                                                                <div class="w-full h-[250px]">
                                                                                    <img class="h-full w-full object-cover" height="250" width="400"
                                                                                        src="<?php echo esc_url($img_acf->get_src()[0]); ?>"
                                                                                        title="<?php echo esc_attr($img_acf->get_alt_text()); ?>"
                                                                                        srcset="<?php echo esc_attr($img_acf->get_srcset()); ?>"
                                                                                        sizes="<?php echo esc_attr($img_acf->get_srcset_sizes()); ?>"
                                                                                        alt="<?php echo $img_acf->get_alt_text() ?>" />
                                                                                </div>
                                                                            </a>
                                                                        <?php else: ?>
                                                                            <li class="!mb-3"><a href="<?php echo esc_url($nav_link['url']); ?>"
                                                                                    target="<?php echo esc_attr($nav_link['target']); ?>">
                                                                                    <?php echo esc_html($nav_link['title']); ?>
                                                                                </a>
                                                                            </li>
                                                                        <?php endif; ?>



                                                                    <?php endif; ?>
                                                                <?php endwhile; ?>
                                                            <?php endif; ?>
                                                        </ul>


                                                    </div>
                                                <?php endwhile; ?>
                                            <?php endif; ?>


                                        </div>
                                    </li>

                                <?php endif; ?>

                            <?php endwhile; ?>
                        </ul>
                    <?php else: ?>
                        <p class="mb-0">&nbsp;</p>

                    <?php endif; ?>

                    <div class="absolute bottom-4 left-4 w-full sm:hidden">
                        <img src="/wp-content/uploads/2025/02/Clip-path-group.svg" class="h-16 mb-6">
                        <div>
                            <p class="font-telegraf font-normal mb-0">Phone</p>

                            <p><a href="tel:01382 370220" class="max-sm:text-[14px]">01382 370220</a></p>
                        </div>
                        <div>
                            <p class="font-telegraf font-normal mb-0">Email</p>

                            <p><a href="mailto:sales@denfindstone.co.uk"
                                    class="max-sm:text-[14px]">sales@denfindstone.co.uk</a></p>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="header-item item-right">

                <a href="/contact-us/"
                    class="button--white text-center py-2.5 px-4 lg:px-9 font-telegraf block ml-auto rounded-full leading-[1] text-[14px] lg:text-[15px]">Contact</a>

                <div class="c-hamburger c-hamburger--shelf mobile-menu-trigger" id="navtoggle">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6">
                        <path
                            d="M 3 5 A 1.0001 1.0001 0 1 0 3 7 L 21 7 A 1.0001 1.0001 0 1 0 21 5 L 3 5 z M 3 11 A 1.0001 1.0001 0 1 0 3 13 L 21 13 A 1.0001 1.0001 0 1 0 21 11 L 3 11 z M 3 17 A 1.0001 1.0001 0 1 0 3 19 L 21 19 A 1.0001 1.0001 0 1 0 21 17 L 3 17 z" />
                    </svg>
                </div>



            </div>
        </div>
    </div>
</header>