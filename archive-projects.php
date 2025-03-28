<?php get_header(); ?>

<section
    class="section relative after:bg-gradient-to-r after:from-black/80 after:to-black/30 after:absolute after:w-full after:h-full after:top-0 after:left-0 after:z-10 overflow-hidden h-[70vh] lg:h-[90vh] flex items-center">

    <div class="absolute bottom-24 left-0 w-full">
        <div class="container relative z-50 gap-4 items-center w-full">
            <div class="md:text-left text-center lg:w-1/2">
                <h1 class="text-5xl lg:text-[60px] min-[1921px]:text-[80px] font-normal mb-2 text-white w-full">
                    <?php the_field('project_banner_text', 'option'); ?>
                </h1>

                <div class="mt-12 flex space-x-8 items-center">
                </div>

            </div>
        </div>
    </div>

    <?php $img_acf = GetACFImage(get_field('project_banner_image', 'option'));
    if ($img_acf) { ?>
        <img class="absolute top-0 left-0 h-full w-full object-cover object-center"
            src="<?php echo esc_url($img_acf->get_src()[0]); ?>" title="<?php echo esc_attr($img_acf->get_title()); ?>"
            data-srcset="<?php echo esc_attr($img_acf->get_srcset()); ?>"
            data-sizes="<?php echo esc_attr($img_acf->get_srcset_sizes()); ?>" alt="<?php echo $img_acf->get_alt_text() ?>"
            height="600" width="1920" fetchpriority="high">
    <?php } ?>

</section>

<section class="section">
    <div class="container">
        <div class="lg:w-1/2">
            <div
                class="[&>p]:text-[22px] [&>p]:lg:text-[27px] [&>p]:font-normal leading-[2] text-primary font-telegraf">
                <?php the_field('project_intro', 'option'); ?>
            </div>
        </div>
    </div>
</section>

<section class="<?php if ($remove_bottom_margin != 1): ?>section <?php endif; ?>">


    <div class="overflow-x-hidden">
        <div class="container swiper-slider reviews-slider relative">
            <div class="mb-16 flex justify-between max-sm:items-center">
                <h2 class="text-primary">Key projects</h2>

                <div class="flex space-x-4">
                    <div
                        class="size-10 lg:size-16 border border-primary rounded-full swiper-button-slide-prev hover:bg-primary group flex items-center justify-center cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6 group-hover:text-white">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                        </svg>
                    </div>
                    <div
                        class="size-10 lg:size-16 border border-primary rounded-full swiper-button-slide-next hover:bg-primary flex items-center justify-center group cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6 group-hover:text-white">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="swiper-wrapper !h-auto mb-6">

                <?php if (have_posts()): ?>
                    <?php while (have_posts()):
                        the_post(); ?>
                        <div class="cursor-pointer swiper-slide !h-full project-item" data-project-id="<?php the_ID(); ?>">
                            <div class="h-[250px] lg:h-[300px] xl:h-[350px] overflow-hidden relative mb-4">
                                <?php
                                if (has_post_thumbnail()) {
                                    $image_classes = 'h-full w-full object-cover';
                                    $image_size = 'large';
                                    $image_attr = array(
                                        'class' => $image_classes,
                                        'alt' => get_the_title(),
                                        'title' => 'Click for more details'
                                    );
                                    the_post_thumbnail($image_size, $image_attr);
                                }
                                ?>

                                <div class="absolute top-4 left-4 bg-white px-3 py-1 rounded-full text-sm">
                                    <?php the_field('sector'); ?>
                                </div>

                            </div>
                            <p class="text-primary"><?php the_field('location'); ?></p>
                            <h3 class="text-primary font-telegraf lg:text-[29px]"><?php the_title(); ?></h3>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php else: ?>
                    <p>No projects available at the moment.</p>
                <?php endif; ?>

            </div>


        </div>
    </div>
</section>

<section class="projects-list section">
    <div class="container mx-auto text-primary">
        <?php if (have_posts()): ?>
            <h2 class="text-6xl mb-14">All Projects</h2>
            <div class="[&>p]:uppercase flex mb-12 font-telegraf px-2">
                <div class="lg:w-2/4">
                    <p>NAME</p>
                </div>
                <div class="lg:w-1/4">
                    <p>LOCATION</p>
                </div>
                <div class="lg:w-1/4">
                    <p>SECTOR</p>
                </div>
            </div>
            <?php while (have_posts()):
                the_post(); ?>
                <!-- Wrap the entire item in an anchor with class "link" -->
                <div class="px-2 project-item link project-list relative flex flex-wrap flex-col md:flex-row cursor-pointer py-2 max-sm:border-b max-sm:mb-4 transition-all duration-50 ease-out"
                    data-project-id="<?php the_ID(); ?>">
                    <div class="lg:w-2/4">
                        <p class="lg:text-[22px] mb-0"><?php the_title(); ?></p>
                    </div>
                    <div class="lg:w-1/4">
                        <p class="lg:text-[22px] mb-0"><?php the_field('location'); ?></p>
                    </div>
                    <div class="lg:w-1/4">
                        <p class="lg:text-[22px] mb-0"><?php the_field('sector'); ?></p>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p><?php _e('Sorry, no projects matched your criteria.', 'textdomain'); ?></p>
        <?php endif; ?>
    </div>
</section>

<!-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        const links = document.querySelectorAll('.link');
        const hoverReveals = document.querySelectorAll('.hover-reveal');
        const hiddenImages = document.querySelectorAll('.hidden-img');

        links.forEach((link, index) => {
            link.addEventListener('mousemove', (e) => {
                // Reveal the image and position it relative to the mouse
                hoverReveals[index].style.opacity = 1;
                hoverReveals[index].style.transform = 'translate(-170%, -50%) rotate(5deg)';
                hiddenImages[index].style.transform = 'scale(1, 1)';
                hoverReveals[index].style.left = e.clientX + "px";
            });

            link.addEventListener('mouseleave', () => {
                // Hide the image when the mouse leaves the element
                hoverReveals[index].style.opacity = 0;
                hoverReveals[index].style.transform = 'translate(-50%, -50%) rotate(-5deg)';
                hiddenImages[index].style.transform = 'scale(0.8, 0.8)';
            });
        });
    });

</script> -->


<div class="bg-secondary py-28 section">

    <div class="container">
        <div class="max-w-6xl mx-auto text-center">
            <p class="uppercase mb-12 text-white font-telegraf">
                <?php the_field('project_section_sub_heading', 'option'); ?>
            </p>

            <h2 class="font-telegraf text-white"><?php the_field('project_section_heading', 'option'); ?></h2>
        </div>
    </div>

    <div class="marquee mt-8 container overflow-x-hidden">

        <?php if (have_rows('project_marquee_logos', 'option')): ?>
            <ul class="space-x-2 marquee-content">
                <?php while (have_rows('project_marquee_logos', 'option')):
                    the_row(); ?>
                    <li class="p-4 h-[90px] lg:h-[100px]">

                        <?php
                        $img_acf = GetACFImage(get_sub_field('logo'));
                        ?>
                        <?php if ($img_acf) { ?>

                            <img class="h-full w-full object-contain" width="200" height="100%"
                                src=" <?php echo esc_url($img_acf->get_src()[0]); ?>"
                                title="<?php echo esc_attr($img_acf->get_title()); ?>"
                                srcset="<?php echo esc_attr($img_acf->get_srcset()); ?>"
                                sizes="<?php echo esc_attr($img_acf->get_srcset_sizes()); ?>"
                                alt="<?php echo $img_acf->get_alt_text() ?>" />

                        <?php } ?>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php endif; ?>

    </div>

</div>

<section class=" section ">
    <div class="relative container flex items-center flex-col">

        <img src="/wp-content/uploads/2025/02/Clip-path-group.svg" class="h-20 w-auto mx-auto mb-12">
        <div class="lg:w-3/5 text-center">
            <?php the_field('project_call_to_action', 'option'); ?>

        </div>

        <?php $project_call_to_action_link = get_field('project_call_to_action_link', 'option'); ?>
        <?php if ($project_call_to_action_link): ?>
            <div class="">
                <a href="<?php echo esc_url($project_call_to_action_link['url']); ?>" class="flex mt-8 group">
                    <span
                        class="h-[50px] flex items-center justify-center px-8 bg-primary text-white rounded-full group-hover:bg-white group-hover:border-primary group-hover:border group-hover:text-primary duration-100 ease-in-out"><?php echo esc_html($project_call_to_action_link['title']); ?></span>
                    <div
                        class="size-[50px] border border-primary rounded-full flex items-center justify-center hover:translate-x-2 duration-150 ease-in-out transform rotate-[-45deg] group-hover:rotate-[0deg] group-hover:bg-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor"
                            class="size-6 text-primary group-hover:text-white duration-150 ease-in-out">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3">
                            </path>
                        </svg>
                    </div>

                </a>
            </div>
        <?php endif; ?>

    </div>
</section>

<div id="drawer-overlay" class="fixed top-0 left-0 w-full h-full bg-black opacity-50 hidden z-[999]"></div>

<aside id="project-drawer"
    class="fixed top-0 right-0 h-full w-[95%] md:w-4/5 2xl:w-1/2 bg-white shadow-lg transform translate-x-full transition-transform duration-300 ease-in-out z-[999] overflow-y-auto">
    <button id="close-drawer" class="absolute top-4 right-4 text-black">Close</button>
    <div id="drawer-content" class="p-4 lg:p-10 2xl:p-14 overflow-auto">
    </div>
</aside>

<?php get_footer(); ?>