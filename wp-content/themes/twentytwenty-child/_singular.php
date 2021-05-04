<?php
/**
 * The template for displaying single posts and pages.
 */

/*
if ( is_front_page() ) {                        // si c'est la "front-page", va chercher le template header-front
    get_header( 'front' );
} elseif ( is_single('service') ) {             // si c'est la page "test", va chercher le template header-test       
    get_header( 'test' );
} elseif ( is_page( 2 ) ) {                     // si c'est la page avec l'id 2 va chercher le template header-page 
    get_header( 'page' );
} else {                                        // sinon, va chercher le template header (fallback)
    get_header();
}
*/

get_header();

?>


<main id="site-content" role="main">

	<?php
    
    if ( have_posts() ) :                       // s'il y a du contenu
        //echo get_post_type();                 //page
        get_template_part( 'template-parts/content', get_post_type() );
    ?>

        <article>
        
            <div class="wrapper">

        <?php


        while ( have_posts() ) : the_post();    // affiche le contenu tant qu'il y a du contenu
        ?>
            <?php if( ! empty( $post->post_title ) ) :      // s'il y un titre ?>           
                <h2 class="title title--small"><?php the_title(); ?></h2>
            <?php endif; ?>  

            <?php if( ! empty( $post->post_content ) ) :     // s'il y du contenu wysiwyg (éditeur WordPress)
                
                //echo get_post_type();
                get_template_part( 'template-parts/content'); 
                //get_template_part( 'template-parts/content', get_post_type() );
                
             endif;
             
            ?>

        <?php
        endwhile; 
        ?>

            </div>
        </article>
        
        <?php
    endif; 

    ?>
    

</main><!-- #site-content -->

<?php // get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>