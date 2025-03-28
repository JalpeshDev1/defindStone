<footer class="main-footer relative bg-primary border-t">
    <div class="container flex flex-col flex-wrap md:flex-row justify-between pt-16 pb-16 lg:pb-24">
        <div class="text-white max-md:mb-6 max-md:w-full">
            <h3 class="lg:text-6xl">Join our newsletter</h3>
            <p class="lg:text-xl">Leave your email address and we'll be in touch</p>
        </div>
        <div class="news-letter max-md:w-full [&>form]:max-md:w-full w-1/2 flex justify-end">
            <?php echo do_shortcode('[contact-form-7 id="470d711" title="Newsletter"]'); ?>
        </div>
    </div>
    <div class="container relative z-20 lg:pb-24">
        <div class="grid grid-cols-2 lg:grid-cols-3 gap-4 max-lg:pb-12">
            <div class="">
                <h4 class="font-prompt text-lg mb-6 font-semibold">Quick Links</h4>

                <?php wp_nav_menu([
                    'container' => 'nav',
                    'container_class' => 'nav',
                    'theme_location' => 'quick-links',
                ]); ?>
            </div>

            <div class="max-md:col-span-2 text-center max-md:order-first max-md:mb-8">

                <svg class="block mx-auto mb-6 lg:mb-16 lg:-mt-14 h-[106px] w-[118px] fill-white">
                    <use xlink:href="#denfind-emblem" />
                </svg>

                <div class="flex-nav">

                    <?php wp_nav_menu([
                        'container' => 'nav',
                        'container_class' => 'nav-flex',
                        'theme_location' => 'footer',
                    ]); ?>

                </div>


            </div>

            <div class="lg:text-right">
                <h4 class="font-prompt text-lg mb-6 font-semibold">Social Accounts</h4>

                <?php wp_nav_menu([
                    'container' => 'nav',
                    'container_class' => 'nav',
                    'theme_location' => 'support',
                ]); ?>

            </div>
        </div>


    </div>
    <div class="text-center py-10 border-t">
        <a href="#" target="_blank" rel="noopener" class="!text-white" title="">
            Designed &amp; Powered by
            JustChillSocial
        </a>
    </div>
</footer>


<?php get_template_part('resources/views/components/icons'); ?>