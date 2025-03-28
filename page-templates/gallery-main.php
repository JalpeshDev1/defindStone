<?php

// Template Name: Gallery Main

get_header(); ?>

<section
    class="relative after:bg-gradient-to-r after:from-black/80 after:to-black/30 after:absolute after:w-full after:h-full after:top-0 after:left-0 after:z-10 overflow-hidden h-[50vh] lg:h-[70vh] flex items-center">

    <div class="absolute bottom-10 left-0 w-full">
        <div class="container relative z-50 gap-4 items-center w-full">
            <a href="/gallery/commercial/" class="md:text-left text-center lg:w-1/3">
                <div class="mb-2 flex space-x-6 items-center text-white lg:justify-start justify-center">
                    <p class="mb-0 text-lg font-telegraf">View all</p>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                    </svg>

                </div>
                <h1 class="text-5xl lg:text-[60px] min-[1921px]:text-[80px] font-normal mb-2 text-white w-full">
                    <div class="line"><span>Commercial</span></div>
                    <div class="line"><span>Projects</span></div>
                </h1>

            </a>
        </div>
    </div>

    <img class="absolute top-0 left-0 h-full w-full object-cover object-center"
        src="/wp-content/uploads/2025/03/st-andrews.jpg" title="st-andrews"
        data-srcset="/wp-content/uploads/2025/03/st-andrews.jpg 2160w, /wp-content/uploads/2025/03/st-andrews-300x143.jpg 300w, /wp-content/uploads/2025/03/st-andrews-1024x489.jpg 1024w, /wp-content/uploads/2025/03/st-andrews-768x367.jpg 768w, /wp-content/uploads/2025/03/st-andrews-1536x733.jpg 1536w, /wp-content/uploads/2025/03/st-andrews-2048x978.jpg 2048w"
        data-sizes="(max-width: 2160px) 100vw, 2160px" alt="commercial projects" height="600" width="1920"
        fetchpriority="high">

</section>

<section
    class="relative after:bg-gradient-to-r after:from-black/80 after:to-black/30 after:absolute after:w-full after:h-full after:top-0 after:left-0 after:z-10 overflow-hidden h-[50vh] lg:h-[70vh] flex items-center">

    <div class="absolute bottom-10 left-0 w-full">
        <div class="container relative z-50 gap-4 items-center w-full">
            <a href="/gallery/residential/" class="lg:text-right text-center lg:w-1/3 lg:ml-auto">
                <div class="mb-2 flex space-x-6 items-center text-white lg:justify-end justify-center">
                    <p class="mb-0 text-lg font-telegraf">View all</p>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                    </svg>


                </div>
                <h2 class="text-5xl lg:text-[60px] min-[1921px]:text-[80px] font-normal mb-2 text-white w-full">
                    Residential</br>
                    Projects

                </h2>

            </a>
        </div>
    </div>

    <img class="absolute top-0 left-0 h-full w-full object-cover object-center"
        src="/wp-content/uploads/2025/01/hero.jpeg" title="hero"
        data-srcset="/wp-content/uploads/2025/01/hero.jpeg 2000w, /wp-content/uploads/2025/01/hero-300x173.jpeg 300w, /wp-content/uploads/2025/01/hero-1024x590.jpeg 1024w, /wp-content/uploads/2025/01/hero-768x442.jpeg 768w, /wp-content/uploads/2025/01/hero-1536x885.jpeg 1536w"
        data-sizes="(max-width: 2000px) 100vw, 2000px" alt="residentail projects" height="600" width="1920">

</section>


<?php get_footer(); ?>