<?php
  if( function_exists('have_rows') ) :
    if( have_rows('components') ): ?>
    <div class="components">
      <?php while ( have_rows('components') ) : the_row();
        if( get_row_layout() == 'call_to_action' ): 
          get_template_part( 'components/component', 'cta' );
        elseif( get_row_layout() == 'text_block' ): 
          get_template_part( 'components/component', 'text-block' );
        elseif( get_row_layout() == 'promotions' ): 
          get_template_part( 'components/component', 'promotions' );
        elseif( get_row_layout() == 'gallery' ): 
          get_template_part( 'components/component', 'gallery' );
        elseif( get_row_layout() == 'articles' ): 
          get_template_part( 'components/component', 'articles' );
        endif;
      endwhile; ?>
      </div>
    <?php endif;
  endif;
?>