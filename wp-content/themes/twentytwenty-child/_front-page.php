<?php
/**
 * The template for displaying single posts and pages.
 */
                            
get_header();

$postType = get_post_type( get_the_ID() );
echo "Page d'accueil, post_type: ". $postType;

?>

<main id="site-content" role="main">
    <!--contenue de premième partie de page d'accueil-->
    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

            <!--<h2><?php //the_title(); ?></h2>-->
            
            <?php //$accueil_image_bg = get_field('accueil_image_bg'); ?>
            <?php //if( $accueil_image_bg ): ?>
                <div>
                    <img src="<?php //echo $accueil_image_bg['url']; ?>" alt="<?php //the_title(); ?>" />
                </div>
            <?php //endif; ?>


            <div style="position:relative;width:auto;height:auto;z-index:1;">

                <?php $accueil_image_bg = get_field('accueil_image_bg'); ?>
                <?php if( $accueil_image_bg ): ?>
                    <div>
                        <img src="<?php echo $accueil_image_bg['url']; ?>" alt="<?php the_title(); ?>" />
                    </div>
                <?php endif; ?>

                <?php $accueil_slogan = get_field('accueil_slogan'); ?>
                <?php if( $accueil_slogan ): ?>
                    <h2 style="position:absolute;z-indent:2;color:#ffffff;top:40%;left:50%;transform:translate(-50%,-50%);"><?php the_field('accueil_slogan'); ?></h2>
                <?php endif; ?>
            </div>
            
            <div style="margin: 10vh 22vh 10vh 22vh;">
                <?php $accueil_introduction = get_field('accueil_introduction'); ?>
                <?php if( $accueil_introduction ): ?>
                    <p><?php echo $accueil_introduction ?></p>
                <?php endif; ?>
            </div>   

    </article>

    <!--affichage de list des articles start-->                
    <!--<div class="list-articles">-->
    <div style="background-color:#fcded4;padding-top:5vh;padding-bottom:5vh;"> 

        <div class="block_service_vaisselle">
            <h3 style="padding-left:8vw;">Service</h3>
        </div>





    <?php
    
    $args = array(
        'post_type'			=> 'articles',
        'posts_per_page'	=> -1
    );

    // query
    $the_query = new WP_Query( $args );

    ?>

    <?php if( $the_query->have_posts() ): ?>

        <div class="gallery gallery--4">

            <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>

                <article class="gallery_articles">
                    <a href="<?php the_permalink(); ?>">

                            <?php $article_categorie = get_field('article_categorie'); ?>
                            <!--boucle pour la condition de Service-->
                            <div>
                            <?php if( $article_categorie == 'Service'): ?>
                                <p>Service test</p>

                                <?php $article_image = get_field('article_image'); ?>
                                <?php if( $article_image ): ?>
                                <div class="gallery_articles_image">
                                    <img src="<?php echo $article_image['url']; ?>" alt="<?php the_title(); ?>" />
                                </div>
                                <?php endif; ?>

                                <div>
                                    <h6 style="color:black;text-align:center;margin-top:0em;margin-bottom:0.5em;"><?php the_title(); ?></h6>
                                </div>


                            <?php endif; ?>
                            </div>
                        


                            <!--boucle pour la condition de Vaisselle-->
                            <div>
                            <?php if( $article_categorie == 'Vaisselle'): ?>
                                <p>Vaisselle test</p>

                                <?php $article_image = get_field('article_image'); ?>
                                <?php if( $article_image ): ?>
                                <div class="gallery_articles_image">
                                    <img src="<?php echo $article_image['url']; ?>" alt="<?php the_title(); ?>" />
                                </div>
                                <?php endif; ?>

                                <div>
                                    <h6 style="color:black;text-align:center;margin-top:0em;margin-bottom:0.5em;"><?php the_title(); ?></h6>
                                </div>
                            <?php endif; ?>
                            </div>
                
                    </a>
                </article>

            <?php endwhile; ?>

        </div>
       

    <?php endif; ?>
    </div>
    <?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>



   <!-- </div>-->
    <!--affichage de list des articles end-->




</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>