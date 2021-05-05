<?php
/**
 * The template for displaying single posts and pages.
 */
                            
get_header();

$postType = get_post_type( get_the_ID() );

?>

<main id="site-content" role="main">
    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

            <?php 
                //get_field($field-name) is in Custom Fields on Dashboard
                $accueil_image_bg = get_field('accueil_image_bg'); 
            ?>
            <?php if( $accueil_image_bg ): ?>
                <div id="slogan-img" style="background-image:url('<?php echo $accueil_image_bg['url']; ?>');">
            <?php else: ?>
                <div id="slogan-img" style="background-image:url('http://localhost:8888/creation-web-2-tp2/wp-content/uploads/2020/08/le-creuset-bg-par-defaut.jpg');">
            <?php endif; ?>    
            <?php $accueil_slogan = get_field('accueil_slogan'); ?>
            <?php if( $accueil_slogan ): ?>
                <h2 class="slogan-text"><?php the_field('accueil_slogan'); ?></h2>
            <?php endif; ?>
                </div>
            
            <div id="intro-section">
                <?php $accueil_introduction = get_field('accueil_introduction'); ?>
                <?php if( $accueil_introduction ): ?>
                    <p><?php echo $accueil_introduction ?></p>
                <?php endif; ?>
            </div>   

    </article>


    <!--Display a grid of clickable tiles of items-->             
    <div id="tuiles-articles"> 

        <?php
            $args = array(
                'post_type'			=> 'articles',
                'posts_per_page'	=> -1
            );
            //The Query
            $the_query = new WP_Query( $args );
        ?>

        <?php 
            //The Loop: see if there are any posts to show
            if( $the_query->have_posts() ): 
        ?>

        <?php $nbpost = 4; ?> 
        <h3 class="tuiles-title">Service</h3>
        <div class="container">
            <div class="row">
                        <?php $x=1; while( ($the_query->have_posts())&& ($x <= $nbpost)) : $the_query->the_post(); ?>

                                        <?php $article_categorie = get_field('article_categorie'); ?>
                                    
                                            <?php if( $article_categorie == 'Service' && get_field('article_actif') == 1): ?>
                                               
                                                <div class="col-sm">
                                                    <a href="<?php the_permalink(); ?>">

                                                        <p><?php //echo $article_categorie; ?></p>
                                                        <p><?php //echo get_field('article_actif'); ?></p>

                                                        <?php $article_image = get_field('article_image'); ?>
                                                        <?php if( $article_image ): ?>
                                                            <div class="card gallery_articles_image">
                                                                <img class="card-img-top" src="<?php echo $article_image['url']; ?>" alt="<?php the_title(); ?>" />
                                                                <div class="card-body">
                                                                    <h6 class="card-text"><?php the_title(); ?></h6>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>

                                                    </a>
                                                </div>
                                            <?php $x++; endif; ?>
                                    
                            <?php endwhile; ?>
            </div>
        </div>

           <h3 class="tuiles-title">Vaisselle</h3>
           <div class="container">
             <div class="row">
              <?php $x=1; while( ($the_query->have_posts())&& ($x <= $nbpost))  : $the_query->the_post(); ?>

                            <?php $article_categorie = get_field('article_categorie'); ?>
                           
                                <?php if( $article_categorie == 'Vaisselle' && get_field('article_actif') == 1): ?>
                                    <div class="col-sm">
                    
                                        <a href="<?php the_permalink(); ?>">

                                            <p><?php //echo $article_categorie; ?></p>
                                            <p><?php //echo get_field('article_actif'); ?></p>

                                            <?php $article_image = get_field('article_image'); ?>
                                            <?php if( $article_image ): ?>
                                                <div class="card gallery_articles_image">
                                                    <img class="card-img-top" src="<?php echo $article_image['url']; ?>" alt="<?php the_title(); ?>" />
                                                    <div class="card-body">
                                                        <h6 class="card-text"><?php the_title(); ?></h6>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                        </a>
                                    </div>
                                    <?php $x++; endif; ?>
                   
                <?php endwhile; ?>
             </div>
            </div> 
               
        <?php //end if($the_query->have_posts()) ?>
        <?php endif; ?>
    </div>


    <?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>


</main>

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>
<?php get_footer(); ?>