
<?php 
    $article_image = get_field('article_image');
    $article_categorie = get_field('article_categorie');
    $article_description = get_field('article_description');
    $article_prix = get_field('article_prix');
    $article_actif = get_field('article_actif');
?>


<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

    <h2><?php the_title(); ?></h2>
        
    <div class="container">
        <div class="row">
            <div class="col-4">
                <?php if( $article_image ): ?>
                    <img src="<?php echo $article_image['url'] ?>" alt="<?php the_title(); ?>">
                <?php endif; ?>
            </div>
            <div class="col-8">
                <div class="row article-description-column">
                    <div class="col-md-12">
                        <?php if( $article_categorie ): ?>
                            <p><?php echo $article_categorie ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-12">
                        <?php if( $article_description ): ?>
                            <h5>Description</h5>
                            <p><?php echo $article_description ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-12">
                        <?php if( $article_prix ): ?>
                            <h5><?php echo $article_prix; ?> $</h5>
                        <?php endif; ?>
                    </div>
                </div>
            </div><!--Right column-->
        </div><!--row-->
    </div><!--Container-->

</article>


