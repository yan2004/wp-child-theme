<div class="wysiwyg">
    <?php the_content(); ?>
    <h2><?php //the_title(); ?></h2>
</div>

<?php
    get_header();

    $postType = get_post_type( get_the_ID() );
    echo the_title().": ". $postType;
?>

<main id="site-content" role="main">

    <!--contenue de premième partie de page-->
    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

        <!--contenue de header: image et introduction-->
        <div style="position:relative;text-align:left;height:40vh;">
            <?php $v_s_image_bg = get_field('v_s_image_bg'); ?>
            <?php if( $v_s_image_bg ): ?>
                <img src="<?php echo $v_s_image_bg['url']; ?>" alt="<?php the_title(); ?>" />
            <?php endif; ?>
            <span style="position:absolute;top:30%;left:8%;right:54%;font-size:1.4em;color:#535754;line-height:1.4;"><?php the_field('v_s_introduction'); ?></span>
        </div>

    </article>

     <!--affichage de list des articles start-->
     <?php if( $post->post_title == 'Service' || $post->post_title == 'Vaisselle'): ?>                
     <div style="background-color:#b3b3b3;padding-top:5vh;padding-bottom:5vh;"> 
        <?php
            $args = array(
                'post_type'			=> 'articles',
                'posts_per_page'	=> -1
            );

            // query
            $the_query = new WP_Query( $args );
        ?>

        <?php if( $the_query->have_posts() ): ?>
            <?php if( $post->post_title == 'Service'): ?>
            <h3 style="padding-left:7vw;padding-top:3vw;"><?php the_title(); ?></h3>
               <!--Vérifier le titre de page-->
               
                <div class ="gallery gallery--3">
                <?php while($the_query->have_posts()): $the_query->the_post(); ?>

                    <?php $article_categorie = get_field('article_categorie'); ?>
                    <?php if( $article_categorie == 'Service' && get_field('article_actif') == 1): ?>
                        <article class="gallery_articles">

                            <a href="<?php the_permalink(); ?>">
                            <p><?php echo $article_categorie; ?></p>
                            <p><?php echo get_field('article_actif'); ?></p>

                            <?php $article_image = get_field('article_image'); ?>
                            <?php if( $article_image ): ?>
                            <div class="gallery_articles_image">
                                <img src="<?php echo $article_image['url']; ?>" alt="<?php the_title(); ?>" />
                            </div>
                            <?php endif; ?>

                            <div>
                                <h6 style="color:black;text-align:center;margin-top:0em;margin-bottom:0.5em;"><?php the_title(); ?></h6>
                            </div>
                            </a>

                        </article>
                    <?php endif; ?>
                <?php endwhile; ?>
                </div>
            <?php endif; ?>

            <!--Vérifier le titre de page-->
            <?php if( $post->post_title == 'Vaisselle'): ?>
                <h3 style="padding-left:7vw;padding-top:3vw;"><?php the_title(); ?></h3>
                <div class ="gallery gallery--3">
                <?php while($the_query->have_posts()): $the_query->the_post(); ?>

                    <?php $article_categorie = get_field('article_categorie'); ?>
                    <?php if( $article_categorie == 'Vaisselle' && get_field('article_actif') == 1): ?>
                        <article class="gallery_articles">

                            <a href="<?php the_permalink(); ?>">
                            <p><?php echo $article_categorie; ?></p>
                            <p><?php echo get_field('article_actif'); ?></p>

                            <?php $article_image = get_field('article_image'); ?>
                            <?php if( $article_image ): ?>
                            <div class="gallery_articles_image">
                                <img src="<?php echo $article_image['url']; ?>" alt="<?php the_title(); ?>" />
                            </div>
                            <?php endif; ?>

                            <div>
                                <h6 style="color:black;text-align:center;margin-top:0em;margin-bottom:0.5em;"><?php the_title(); ?></h6>
                            </div>
                            </a>

                        </article>
                    <?php endif; ?>
                <?php endwhile; ?>
                </div>
            <?php endif; ?>

            
            
        <?php endif; ?>
     </div>
     <?php endif; ?>

    <!--Vérifier la page de à propos-->
    <?php if( $post->post_title == 'À propos'): ?>
        
        <?php $a_propos_editeur = get_field('a_propos_editeur'); ?>
        <?php if( $a_propos_editeur ): ?>
            <div class="wysiwyg"><?php echo $a_propos_editeur; ?></div>
        <?php endif; ?>

    <?php endif; ?>

</main><!-- #site-content -->
