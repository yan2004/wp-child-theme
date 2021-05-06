<div class="wysiwyg">
    <?php //the_content(); ?>
</div>

<?php
    get_header();
    $postType = get_post_type( get_the_ID() );
?>

<main id="site-content" role="main">

    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
        <?php $v_s_image_bg = get_field('v_s_image_bg'); ?>
        <?php if( $v_s_image_bg ): ?>
            <div class="v_s_img" style="background-image:url('<?php echo $v_s_image_bg['url']; ?>');">
        <?php endif; ?> 
        <?php //$v_s_introduction = the_field('v_s_introduction'); ?>
        <?php $v_s_introduction = get_field('v_s_introduction'); ?>
        <?php if( $v_s_introduction ): ?>
            <div class="v_s_introduction"><?php echo $v_s_introduction; ?></div>
        <?php endif; ?>
            </div>
    </article>

    <?php if( $post->post_title == 'Service' || $post->post_title == 'Vaisselle'): ?>                
     <div class="v_s_lists"> 
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
            <h3 class="tuiles-title"><?php the_title(); ?></h3>
               <div class="container">
                   <div class="row flex">
                   
                        <?php while($the_query->have_posts()): $the_query->the_post(); ?>

                            <?php $article_categorie = get_field('article_categorie'); ?>
                            <?php if( $article_categorie == 'Service' && get_field('article_actif') == 1): ?>
                                
                                    <div class="col-lg-4 col-sm-6">
                                        <a href="<?php the_permalink(); ?>">
                                        <?php $article_image = get_field('article_image'); ?>
                                        <?php if( $article_image ): ?>
                                            <div class="card gallery_articles_image">
                                                <img src="<?php echo $article_image['url']; ?>" alt="<?php the_title(); ?>" />
                                                <div class="card-body">
                                                    <h6 class="card-text"><?php the_title(); ?></h6>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        </a>
                                    </div>
                            
                            <?php endif; ?>
                        <?php endwhile; ?>
               
                   </div>
                </div>
            <?php endif; ?>

         
            <?php if( $post->post_title == 'Vaisselle'): ?>
                <h3 class="tuiles-title"><?php the_title(); ?></h3>
                <div class="container">
                   <div class="row flex">
                        <?php while($the_query->have_posts()): $the_query->the_post(); ?>

                            <?php $article_categorie = get_field('article_categorie'); ?>
                            <?php if( $article_categorie == 'Vaisselle' && get_field('article_actif') == 1): ?>
                                
                                <div class="col-lg-4 col-sm-6">

                                    <a href="<?php the_permalink(); ?>">
                                    <?php $article_image = get_field('article_image'); ?>
                                    <?php if( $article_image ): ?>
                                        <div class="card gallery_articles_image">
                                            <img src="<?php echo $article_image['url']; ?>" alt="<?php the_title(); ?>" />
                                            <div class="card-body">
                                                <h6 class="card-text"><?php the_title(); ?></h6>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    </a>
                                </div>
                            <?php endif; ?>

                        <?php endwhile; ?>
                    </div>
                </div>
            <?php endif; ?>

        <?php endif; ?>
     </div>
     <?php endif; ?>

    <!--Determine if ABOUT page-->
    <?php if( $post->post_title == 'About'): ?>
        
        <?php $a_propos_editeur = get_field('a_propos_editeur'); ?>
        <?php if( $a_propos_editeur ): ?>
            <div class="wysiwyg"><?php echo $a_propos_editeur; ?></div>
        <?php endif; ?>

    <?php endif; ?>

</main>
