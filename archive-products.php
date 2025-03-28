<?php get_header(); ?>

<section
  class="section relative after:bg-gradient-to-r after:from-black/80 after:to-black/30 after:absolute after:w-full after:h-full after:top-0 after:left-0 after:z-10 overflow-hidden h-[70vh] lg:h-[90vh] flex items-center">

  <div class="absolute bottom-24 left-0 w-full">
    <div class="container relative z-50 gap-4 items-center w-full">
      <div class="md:text-left text-center lg:w-1/2">
        <h1 class="text-5xl lg:text-[65px] min-[1921px]:text-[80px] font-normal mb-2 text-white w-full">
          <?php the_field('product_banner_text', 'option'); ?>
        </h1>
      </div>
    </div>
  </div>

  <?php $img_acf = GetACFImage(get_field('product_banner_image', 'option'));
  if ($img_acf) { ?>
    <img class="absolute top-0 left-0 h-full w-full object-cover object-center"
      src="<?php echo esc_url($img_acf->get_src()[0]); ?>" title="<?php echo esc_attr($img_acf->get_title()); ?>"
      data-srcset="<?php echo esc_attr($img_acf->get_srcset()); ?>"
      data-sizes="<?php echo esc_attr($img_acf->get_srcset_sizes()); ?>" alt="<?php echo $img_acf->get_alt_text() ?>"
      height="600" width="1920" fetchpriority="high">
  <?php } ?>

  <img src="/wp-content/uploads/2025/02/link.svg" class="absolute -bottom-40 right-0 w-auto h-[120%] z-[50]" alt="">

</section>

<section class="section ">
  <div class="container relative z-30">
    <div class="grid lg:grid-cols-2 gap-4 ">
      <div class=" pb-10 lg:pb-0 relative flex flex-col h-full justify-between">
        <div class="flex items-baseline text-primary mb-12 container">
          <img src="/wp-content/uploads/2025/02/interlink.svg" class="h-20 w-auto">
        </div>

        <div class="text-primary [&>p]:text-base">
          <?php the_field('products_intro', 'option'); ?>

        </div>

      </div>
      <div class="content-block relative z-20 lg:pl-16">
        <div class="">

          <div class="text-primary font-telegraf [&>p]:text-3xl [&>p]:lg:text-5xl [&>p]:font-normal">
            <p><?php the_field('products_heading', 'option'); ?></p>
          </div>

          <?php $button_link = get_field('products_intro_link', 'option'); ?>
          <?php if ($button_link): ?>
            <a href="<?php echo esc_url($button_link['url']); ?>" class="flex mt-10 group"
              title="<?php echo esc_html($button_link['title']); ?>">
              <span
                class="h-[50px] flex items-center justify-center px-8 bg-accent text-white rounded-full group-hover:bg-white group-hover:border-accent group-hover:border group-hover:text-accent duration-100 ease-in-out"><?php echo esc_html($button_link['title']); ?></span>
              <div
                class="size-[50px] border-[2px] border-accent rounded-full flex items-center justify-center hover:translate-x-2 duration-150 ease-in-out transform rotate-[-45deg] group-hover:rotate-[0deg] group-hover:bg-accent group-hover:ml-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="size-6 text-primary group-hover:text-white duration-150 ease-in-out">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3">
                  </path>
                </svg>
              </div>

            </a>
          <?php endif; ?>

        </div>


      </div>
    </div>

  </div>


</section>

<?php $products_display_products = get_field('products_display_products', 'option'); ?>
<?php if ($products_display_products): ?>
  <section class="section">
    <div class="container relative">
      <div class="grid lg:grid-cols-3 gap-4">
        <?php foreach ($products_display_products as $post): ?>
          <?php setup_postdata($post); ?>
          <div class="">
            <div class="item h-[350px] lg:h-[400px] xl:h-[550px] overflow-hidden relative mb-4 rounded-lg shadow-lg">
              <?php
              if (has_post_thumbnail()) {
                $image_classes = 'h-full w-full object-cover';
                $image_size = 'large';
                $image_attr = array(
                  'class' => $image_classes,
                  'alt' => get_the_title()
                );
                the_post_thumbnail($image_size, $image_attr);
              }
              ?>

              <div
                class="absolute top-0 left-0 w-full bg-primary/70 bg-gradient-to-b from:bg-primary/90 to:bg-primary-30 p-6">
                <h3 class="text-white max-sm:text-3xl text-center"><?php the_title(); ?></h3>
              </div>

            </div>
          </div>
        <?php endforeach; ?>
        <?php wp_reset_postdata(); ?>
      </div>
    </div>
  </section>
<?php endif; ?>

<div class="container section" id="tabs-wrapper">
  <!-- <section class="section-tab">

    <?php if (have_posts()): ?>

      <?php $i = 1;
      while (have_posts()):
        the_post(); ?>
        <div class="cursor-pointer tab-title <?php echo ($i === 1) ? 'active' : ''; ?>">

          <div class="flex justify-between title-container w-full rounded-lg items-center">
            <div class="w-[12%] md:w-1/5 shrink-0">
              <img src="/wp-content/uploads/2025/02/interlink.svg" class="h-8 w-auto">
            </div>
            <h4 class="w-[78%] md:w-3/5 font-telegraf text-2xl lg:text-[28px]"><?php the_title(); ?></h4>
            <div class="w-[10%] md:w-1/5 flex justify-end">
              <div class="svg-icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="size-3 lg:size-6 group-hover:text-white">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                </svg>
              </div>
            </div>
          </div>

        </div>
        <div class="tab-content">
          <?php
          if (has_post_thumbnail()) {
            $image_classes = 'lg:h-[325px] h-[250px] w-full object-cover rounded-lg shadow mb-6';
            $image_size = 'full';
            $image_attr = array(
              'class' => $image_classes,
              'alt' => get_the_title(),
            );
            the_post_thumbnail($image_size, $image_attr);
          }
          ?>
          <?php the_content(); ?>
        </div>
        <?php $i++; endwhile; ?>
      <?php wp_reset_postdata(); ?>
    <?php else: ?>
      <p>No projects available at the moment.</p>
    <?php endif; ?>

  </section> -->
  <section class="section-tab">
    <?php if (have_posts()): ?>
        <?php $i = 1;
        while (have_posts()):
            the_post(); ?>
            <div class="cursor-pointer tab-title <?php echo ($i === 1) ? 'active' : ''; ?>">

                <div class="flex justify-between title-container w-full rounded-lg items-center">
                    <div class="w-[12%] md:w-1/5 shrink-0">
                        <img src="/wp-content/uploads/2025/02/interlink.svg" class="h-8 w-auto">
                    </div>
                    <h4 class="w-[78%] md:w-3/5 font-telegraf text-2xl lg:text-[28px]">
                        <a href="<?php the_permalink(); ?>" class="hover:underline">
                            <?php the_title(); ?>
                        </a>
                    </h4>
                    <div class="w-[10%] md:w-1/5 flex justify-end">
                        <div class="svg-icon">
                            <a href="<?php the_permalink(); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="size-3 lg:size-6 group-hover:text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-content">
                <?php if (has_post_thumbnail()): ?>
                    <a href="<?php the_permalink(); ?>">
                        <?php 
                        $image_classes = 'lg:h-[325px] h-[250px] w-full object-cover rounded-lg shadow mb-6';
                        the_post_thumbnail('full', ['class' => $image_classes, 'alt' => get_the_title()]);
                        ?>
                    </a>
                <?php endif; ?>
                <?php the_content(); ?>
            </div>
            <?php $i++; endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php else: ?>
        <p>No products available at the moment.</p>
    <?php endif; ?>
</section>

</div>

<?php $products_portfolio_items = get_field('products_portfolio_items', 'option'); ?>
<?php if ($products_portfolio_items): ?>
  <section class="section fade-section">
    <div class="bg-dark">
      <div class="swiper-slider project-slider-alt relative">
        <div class="swiper-wrapper !h-auto">
          <?php foreach ($products_portfolio_items as $post): ?>
            <?php setup_postdata($post); ?>
            <div class="swiper-slide !h-full group">

              <div
                class="h-[80vh] overflow-hidden relative cursor-pointer after:bg-gradient-to-r after:from-black/80 after:to-black/30 after:absolute after:w-full after:h-full after:top-0 after:left-0 after:z-10">
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

                <div class="absolute bottom-32 left-0 lg:bottom-24 z-40 w-full">
                  <div class="container">
                    <p class="!mb-8 text-4xl lg:text-6xl text-white leading-[1.2] lg:w-1/2">
                      <?php the_title(); ?>
                    </p>

                    <?php
                    $products = get_field('products');
                    $content = get_field('overview');
                    ?>
                    <?php if ($products): ?>
                      <div class="flex mb-8 flex-wrap">
                        <?php
                        $displayProducts = array_slice($products, 0, 2);
                        foreach ($displayProducts as $post):
                          setup_postdata($post); ?>
                          <a href="<?php the_permalink(); ?>"
                            class="bg-primary px-6 py-2 rounded-full text-white lg:mr-2 max-md:text-sm">
                            <?php the_title(); ?>
                          </a>
                        <?php endforeach; ?>

                        <?php
                        $totalProducts = count($products);
                        if ($totalProducts > 2):
                          $moreCount = $totalProducts - 2; ?>
                          <span
                            class="bg-gray-200 px-4 py-2 rounded-full text-dark max-md:text-sm">+<?= esc_html($moreCount); ?></span>
                          <?php
                        endif;
                        wp_reset_postdata();
                        ?>
                      </div>
                    <?php endif; ?>
                    <div class="text-white lg:w-[40%]">
                      <?php
                      $excerpt = wp_html_excerpt($content, 150, '...');
                      echo $excerpt;
                      ?>
                    </div>
                    <div class="mt-8">
                      <a href="#" class="button button--white max-md:mx-0">View All Projects</a>
                    </div>
                  </div>
                </div>



              </div>
            </div>
          <?php endforeach; ?>
          <?php wp_reset_postdata(); ?>
        </div>
        <div
          class="flex space-x-4 absolute bottom-8 max-lg:left-1/2 max-lg:-translate-x-1/2 lg:bottom-24 lg:right-24 z-40">
          <div
            class="size-10 lg:size-16 border border-white rounded-full swiper-button-slide-prev hover:bg-white group flex items-center justify-center cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="size-6 group-hover:text-accent text-white">
              <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
            </svg>

          </div>
          <div
            class="size-10 lg:size-16 border border-white rounded-full swiper-button-slide-next hover:bg-white flex items-center justify-center group cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="size-6 group-hover:text-accent text-white">
              <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
            </svg>

          </div>
        </div>
      </div>
    </div>
  </section>

<?php endif; ?>

<section class=" section ">
  <div class="relative container flex items-center flex-col">

    <img src="/wp-content/uploads/2025/02/Clip-path-group.svg" class="h-20 w-auto mx-auto mb-12">
    <div class="lg:w-3/5 text-center">
      <h3 class="lg:text-6xl">
        Have a question?<br>
        Want to utilise our stone in your next project?
      </h3>

    </div>
    <div class="">
      <a href="#" class="flex mt-8 group">
        <span
          class="h-[50px] flex items-center justify-center px-8 bg-primary text-white rounded-full group-hover:bg-white group-hover:border-primary group-hover:border group-hover:text-primary duration-100 ease-in-out">Get
          in
          touch</span>
        <div
          class="size-[50px] border border-primary rounded-full flex items-center justify-center hover:translate-x-2 duration-150 ease-in-out transform rotate-[-45deg] group-hover:rotate-[0deg] group-hover:bg-primary">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-6 text-primary group-hover:text-white duration-150 ease-in-out">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3">
            </path>
          </svg>
        </div>

      </a>
    </div>
  </div>
</section>


<?php get_footer(); ?>