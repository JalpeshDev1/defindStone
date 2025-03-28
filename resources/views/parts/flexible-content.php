<?php
    $id = get_the_ID();
 
    if ( have_rows( 'flexible_content', $id ) ) :
 
    while ( have_rows( 'flexible_content', $id ) ) : the_row();
 
        get_template_part( 'resources/views/blocks/' . get_row_layout() );
 
    endwhile;
  
    endif;
