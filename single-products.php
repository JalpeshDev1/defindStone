<?php 

/**
 * The Template for displaying all single products.
 *
 * This template can be overridden by copying it to yourtheme/single-product.php.
 *
 * @package WordPress
 * @subpackage Denfind
 */

get_header();

$post_id = get_the_ID();

while (have_posts()) 
{ 
    the_post(); ?>
    <section class="section hero-section relative after:bg-gradient-to-r after:from-black/80 after:to-black/30 after:absolute after:w-full after:h-full after:top-0 after:left-0 after:z-10 overflow-hidden h-[70vh] lg:h-[90vh] flex items-center">
        <div class="absolute bottom-24 left-0 w-full">
            <div class="max-w-container mx-auto px-6 relative z-50 gap-4 items-center w-full">
                <div class="md:text-left text-center">
                    <h1 class="text-5xl md:text-[65px] lg:text-[95px] font-normal mb-2 text-white w-full">
                        <div class="line hero-text">
                            <span><?php the_title(); ?></span>
                        </div>
                    </h1>
                    <?php $product_sub_title = get_field('product_sub_title', get_the_ID()); ?>
                    <?php if (!empty($product_sub_title)) { ?>
                        <div class="text-white">
                            <p class="md:text-left text-center text-[25px]">
                                <?php echo $product_sub_title; ?>
                            </p>
                            </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php

        $BannerImg_acf = GetACFImage(get_field('single_product_banner_image', 'option'));

        if ($BannerImg_acf) 
        { 
            ?>
            <img class="absolute top-0 left-0 h-full w-full object-cover object-center" src="<?php echo esc_url($BannerImg_acf->get_src()[0]); ?>" title="<?php echo esc_attr($BannerImg_acf->get_title()); ?>" data-srcset="<?php echo esc_attr($BannerImg_acf->get_srcset()); ?>" data-sizes="<?php echo esc_attr($BannerImg_acf->get_srcset_sizes()); ?>"  alt="<?php echo $BannerImg_acf->get_alt_text() ?>" height="600" width="1920" fetchpriority="high">
            <?php 
        } 
        ?>
    </section>
   
    <div class="max-w-12xl mx-auto">
        <div class="max-w-container px-6 w-full mx-auto">
            <!-- About the Product -->
            <div class="mt-12 flex gap-[52px] lg:gap-[152px] md:flex-row flex-col about-product-wrapper">
                <div>
                    <span class="font-[telegraf] mr-[10px] font-[400] text-[21px] text-[#475362]">01.</span>
                        <h3 class="text-[35px] inline-block md:text-[55px] text-[#475362] mb-4">
                                <?php echo __('About the Product','o-sc'); ?>
                        </h3>
                        <div class="mb-[30px] md:mb-[82px] leading-relaxed text-[#475362] md:max-w-[549px] w-full text-[21px] pl-0 lg:pl-[41px] flex flex-col gap-[40px]">
                            <?php the_content(); ?>
                        </div>

                    <div class="mt-4 flex gap-[20px] lg:gap-[50px] flex-col xs:flex-row items-start pl-0 lg:pl-[41px]">
                        <?php 
                        if ($pdf_url = get_field('view_pdf_button')) 
                        { 
                            ?>
                            <a href="<?php echo esc_url($pdf_url); ?>" target="_blank" class="inline-block text-white text-[17px] max-w-[222px] w-full text-center bg-[#475362] px-6 py-[12.6px] rounded-[18px]">
                                <?php echo __('View product PDF','o-sc'); ?>
                            </a>
                            <?php 
                        } 
                        ?>
                        <a href="<?php echo get_site_url();?>/contact-us/" class="inline-block border-b border-gray-900 text-gray-900 py-2"><?php echo __('Get in Touch','o-sc'); ?></a>
                    </div>
                </div>
                
                <!-- Product Strength Details -->
                <?php 
                if ($details = get_field('product_extra_details')) 
                { 
                    ?>
                    <div class="md:ml-auto mr-0 lg:mr-[42px] space-y-4">
                        <?php 
                        foreach ($details as $key => $value) 
                        {
                            if (!empty($value)) 
                            { 
                                ?>
                                <div class="md:max-w-[406px] w-full p-4 bg-white py-[35px] px-[30px] rounded-[0.6px] border-[#00000099] shadow border flex flex-col justify-between min-h-[250px]">
                                    <h4 class="text-[25px] text-black text-gray-800 capitalize mb-2">
                                        <?php echo str_replace('_', ' ', ucfirst($key)); ?>
                                    </h4>
                                    <div class="text-[#67575B] font-extralight text-[49px] sm:text-[69px] font-telegraf leading-[46px]">
                                        <?php echo esc_html($value); ?>
                                    </div>
                                </div>
                                <?php 
                            }
                        } 
                        ?>
                    </div>
                    <?php 
                } 
                ?>
            </div>
        </div>

        <!-- Product Variations (Accordion) -->
        <?php 
        if ($variations = get_field('product_variations')) 
        { 
            ?>
            <div class="my-16 max-w-container px-6 w-full mx-auto">
                <h3 class="text-42 text-[#475362] font-normal mb-[30px] sm:mb-77">
                    <?php echo __('Product Variations','o-sc'); ?>
                </h3>
                <div class="space-y-4">
                    <?php 
                    foreach ($variations as $variation) 
                    { 
                        ?>
                        <details class="border-[#47536] border-t-[0.6px] px-0 pt-4 group">
                            <summary class="text-27 text-primary cursor-pointer flex justify-between items-center">
                                <?php echo esc_html($variation['variation_title']); ?>
                                <span class="mr-0 sm:mr-26px  transition-transform group-open:rotate-45">
                                    <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <line x1="12.8904" y1="1.09279e-08" x2="12.8904" y2="25.2809" stroke="#475362" stroke-width="0.5"/>
                                        <line x1="25.2809" y1="12.8904" x2="-1.09279e-08" y2="12.8904" stroke="#475362" stroke-width="0.5"/>
                                    </svg>
                                </span>
                            </summary>
                            <p class="text-primary font-normal mt-2 text-[18px] md:text-[21px]"><?php echo esc_html($variation['variation_content']); ?></p>
                        </details>
                        <?php 
                    }
                    ?>
                </div>
            </div>
            <?php 
        }
        ?>

        <!-- Angus Sandstone Section -->
     
        <?php 
        if ($angus_sandstone = get_field('ngus_sandstone')) 
        {
            $angusStoneImg = GetACFImage(get_field('stone_aesthetic_bg_image', 'option'));
            $angusOverImg = GetACFImage(get_field('stone_aesthetic_overlay_image', 'option'));
            ?>
            <div class="fade-section relative my-12 w-full py-12 sm:h-[80svh] overflow-hidden lg:h-[90svh] bg-cover bg-center text-white flex items-center" <?php if (!empty($angusStoneImg) && !empty($angusStoneImg->get_src()[0])) : ?> style="background-image: url('<?php echo esc_url($angusStoneImg->get_src()[0]); ?>');" <?php endif; ?>>

                <!-- Gradient Overlay -->
                <div class="absolute inset-0 bg-gradient-to-r from-black via-black/50 to-transparent"></div>

                <!-- Side Image Overlay -->
                <?php if( !empty($angusOverImg->get_src()[0]) ) { ?>
                    <img src="<?php echo esc_url($angusOverImg->get_src()[0]); ?>" class="absolute left-auto right-[20px] md:top-[-40px] top-auto  bottom-0 h-auto md:h-[632px] lg:h-[800px]  pointer-events-none" alt="Decorative Overlay">
                <?php } ?>

                <div class="max-w-container px-6 mx-auto w-full">
                    <div class="relative z-10 w-full md:max-w-[493px] mr-auto md:pr-6">
                        <!-- Title Image -->
                        <img src="<?php echo get_site_url();?>/wp-content/uploads/2025/03/image-1-1.png"  class="w-[449px]  sm:mb-[71px] mb-[30px] " alt="Angus Sandstone">

                        <div class="mb-[39px] font-normal font-[19px] flex flex-col gap-[30px]">
                            <?php echo wp_kses_post($angus_sandstone['ngus_description']); ?>    
                        </div>
                        
                        <?php 
                        if (!empty($angus_sandstone['find_more_button'])) 
                        { 
                            ?>
                            <a href="<?php echo esc_url($angus_sandstone['find_more_button']['url']); ?>"  class="inline-block bg-accent text-white text-xs px-6 py-3 rounded-[29px] hover:bg-primary shadow-md hover:bg-gray-200 transition"> <?php echo esc_html($angus_sandstone['find_more_button']['title']); ?></a>
                            <?php 
                        }
                        ?>
                    </div>
                </div>     
            </div>
            <?php 
        } 
        ?>

        <!-- Stone Aesthetic Section -->
        <?php 
        if ($stone_aesthetic = get_field('stone_aesthetic')) 
        { 
            ?>
            <div class="max-w-container px-6 mx-auto w-full">
                <div class="my-12 flex lg:flex-row flex-col justify-center gap-[52px] md:gap-[152px] stone-aesthetic-wrapper">
                    <div class="lg:max-w-[549px] mr-auto w-full">
                        <span class="font-[telegraf] mr-[10px] text-[21px] font-normal text-primary"><?php echo __('01.','o-sc');?></span>
                        <h3 class="text-[35px] inline-block sm:text-[55px] text-primary font-normal mb-[30px] md:mb-[51px]">
                            <?php echo __('Stone Aesthetic','o-sc'); ?>
                        </h3>
                        <div class="pl-0 md:pl-[41px]">
                            <div class="text-primary mb-[59px] flex flex-col gap-[40px]">
                                <?php 
                                echo wp_kses_post($stone_aesthetic['stone_aesthetic_description']); 
                                ?>
                            </div>

                            <!-- Displaying Stone Aesthetic Colour Options -->
                            <?php 
                            if (!empty($stone_aesthetic['stone_color'])) 
                            { 
                                ?>
                                <div class="flex gap-[23px] items-center mt-4">
                                    <?php 
                                    foreach ($stone_aesthetic['stone_color'] as $color) 
                                    {
                                        ?>
                                        <div class="w-[54px] h-[54px] md:w-[94px] md:h-[94px] rounded-[3px]" style="background-color: <?php echo $color['color_picker']; ?>;">
                                        </div>
                                        <?php
                                    } 
                                    ?>
                                </div>
                                <?php 
                            } 
                            ?>
                        </div>
                    </div>
                    <!-- Side Image -->
                    <?php 
                    if (!empty($stone_aesthetic['side_image'])) 
                    { 
                        ?>
                        <img src="<?php echo esc_url($stone_aesthetic['side_image']['url']); ?>" alt="<?php echo esc_attr($stone_aesthetic['side_image']['alt']); ?>" class="md:max-w-[392px] h-auto mx-auto w-full rounded-[7px] shadow-lg shadow-stone reveal">
                        <?php 
                    } 
                    ?>
                </div>
             </div>
            <?php 
        } 
        ?>
    </div>
    <?php 
}
?>
<?php wp_reset_postdata(); 

$args = array(
    'post_type' => 'products',
    'posts_per_page' => 6,
    'post__not_in' => array($post_id),
);
$post_query = new WP_Query($args);
?>

<section class="section relative">
    <div class="overflow-x-hidden">
        <div class="max-w-container px-6 mx-auto swiper-slider product-case-slider relative">
            <div class="mb-16 flex justify-between max-sm:items-center">
                <h2 class="text-primary text-[35px] md:text-42"><?php echo __('Product case studies', 'o-sc'); ?></h2>
            </div>

            <div class="swiper-wrapper !h-auto mb-6">
                <?php if ($post_query->have_posts()): ?>
                    <?php while ($post_query->have_posts()): $post_query->the_post(); ?>
                        <div class="cursor-pointer  swiper-slide !h-full project-item" data-project-id="<?php the_ID(); ?>">
                            <div class="h-[250px] lg:h-[449px] overflow-hidden relative mb-4">
                                <?php if (has_post_thumbnail()): ?>
                                    <div class="relative">
                                        <?php
                                        $image_classes = 'h-full w-full object-cover';
                                        $image_size = 'large';
                                        $image_attr = array(
                                            'class' => $image_classes,
                                            'alt' => get_the_title(),
                                            'title' => 'Click for more details'
                                        );
                                        the_post_thumbnail($image_size, $image_attr);
                                        ?>
                                    </div>
                                <?php endif; ?>

                                <div class="absolute max-w-[130px] w-full text-center text-xs top-4 left-4 bg-white px-3 py-1 rounded-full "><?php echo __('Residential','o-sc'); ?>
                                </div>
                            </div>
                            <h3 class="text-primary font-telegraf lg:text-[29px]">
                                <?php the_title(); ?>
                            </h3>
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


<?php
get_footer();
