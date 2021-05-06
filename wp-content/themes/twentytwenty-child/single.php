<?php
    /**
     * The template for displaying single posts and pages.
     * 
     */

    get_header();
?>

<main id="site-content" role="main">

    <?php
        // Determine the post type
        $postType = get_post_type( get_the_ID() );
        
        if ( have_posts() ) : 
    ?>

    <div class="wrapper">

        <?php
            while ( have_posts() ) : the_post(); 
    
                switch($postType) {
                    case 'articles' :
                        get_template_part( 'template-parts/article',get_post_type() );
                        break;
                    default:
                        get_template_part( 'template-parts/content', get_post_type() ); 
                        break;
                }
		?>

        <?php endwhile; ?>

    </div>
        
    <?php endif; ?>


</main>

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>