<?php

// Template Name: Contact Us

get_header(); ?>

<section class="relative max-sm:pt-32 max-sm:pb-12 lg:h-[75dvh] flex items-center">
    <div class="relative z-20 form-block container">
        <div class="flex flex-wrap items-center">

            <div class="w-full lg:w-[75%] min-[1921px]:w-[67%] lg:pb-0 relative">
                <div class="grid lg:grid-cols-2 gap-8 lg:gap-6 2xl:gap-10">
                    <div class="[&>h1]:font-normal [&>p]:!text-sm [&>p]:lg:mt-20 [&>p]:mt-6 text-primary">
                        <h1>Contact Us</h1>
                        <p>Want to find out more about our products and how we produce? &#8211; Leave us a message and
                            we'll get right back to you</p>
                    </div>
                    <div class="grid grid-cols-2 gap-2 lg:gap-10">
                        <div>
                            <p class="font-telegraf font-normal">Phone</p>

                            <p><a href="tel:01382 370220" class="max-sm:text-[14px]">01382 370220</a></p>
                        </div>
                        <div>
                            <p class="font-telegraf font-normal">Email</p>

                            <p><a href="mailto:sales@denfindstone.co.uk"
                                    class="max-sm:text-[14px]">sales@denfindstone.co.uk</a></p>
                        </div>

                        <div>
                            <p class="font-telegraf font-normal">Location</p>
                            <p class="max-sm:text-[14px]">Pitairlie Quarry
                                Denfind Farm
                                Monikie
                                Angus, DD5 3PZ</p>
                        </div>

                        <div>
                            <p class="font-telegraf font-normal">Socials</p>

                            <p><a href="" class="max-sm:text-[14px]">Facebook</a></p>
                            <p><a href="" class="max-sm:text-[14px]">Instagram</a></p>
                            <p><a href="" class="max-sm:text-[14px]">LinkedIn</a></p>
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>
    <div class="w-full lg:w-[25%] min-[1921px]:w-[33%] h-full absolute right-0 bottom-0 hidden lg:block">
        <img class="h-full w-full object-cover" src="/wp-content/uploads/2025/02/Lunga-1.jpg"
            title="Lunga 1"
            data-srcset="/wp-content/uploads/2025/02/Lunga-1.jpg 422w, /wp-content/uploads/2025/02/Lunga-1-178x300.jpg 178w"
            data-sizes="(max-width: 422px) 100vw, 422px" alt="" height="600" width="1920">
    </div>
</section>
<img class="lg:hidden max-h-[300px] object-cover mb-8" src="/wp-content/uploads/2025/02/Lunga-1.jpg"
    title="Lunga 1"
    data-srcset="/wp-content/uploads/2025/02/Lunga-1.jpg 422w, /wp-content/uploads/2025/02/Lunga-1-178x300.jpg 178w"
    data-sizes="(max-width: 422px) 100vw, 422px" alt="" height="600" width="1920">

<section class="section">
    <div class="container  mx-auto relative z-20 form-block">
        <div class="grid lg:grid-cols-2">

            <div class="w-full pb-12 lg:pb-0 relative">
                <div class="">
                    <?php echo do_shortcode('[contact-form-7 id="2c81da7" title="Contact form 1"]'); ?>

                </div>
            </div>

            <div class="w-full pb-6 lg:pb-0 lg:pl-20 xl:pl-36 flex flex-col justify-end">

                <div class="bg-accent grid grid-cols-1 md:grid-cols-3 rounded-xl">
                    <div class="px-6 pb-6 pt-2 lg:p-8 flex flex-col justify-between md:col-span-2 max-sm:order-last">
                        <p class="text-white font-telegraf text-[28px] max-sm:text-center leading-[1.3]">Interested in joining the
                            Denfind team?</p>
                        <div class="flex">
                            <a href="#" class="button button--white text-sm !px-4 leading-[1]">Get in touch</a>
                            <a href="mailto:sales@denfindstone.co.uk" class="button button--outlinewhite text-sm !px-4 ml-1">Submit your CV</a>
                        </div>
                    </div>
                    <div class="pt-4">
                        <img src="/wp-content/uploads/2025/02/join.png"
                            class="max-h-[150px] lg:max-h-[200px] max-sm:mx-auto lg:ml-auto">
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<div class="lg:h-[500px] h-[275px]">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2200.5634572170175!2d-2.814884823069279!3d56.52694417338054!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48865fdf2b363bdf%3A0x56b639f5db45c46!2sDenfind%20Stone%20Ltd!5e0!3m2!1sen!2suk!4v1740344454846!5m2!1sen!2suk"
        class="h-full w-full" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
</div>



<?php get_footer(); ?>