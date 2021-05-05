<?php 

    
    function theme_enqueue_styles() {
        wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    }
    add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );



    /**
     *   Cette function ajoute une zone de menu.
     */
    function ttc_menus() {
        register_nav_menus(
            array(
                'extra-menu' => __( 'Extra Menu' )
            )
        );
    }
    add_action( 'init', 'ttc_menus', 15 );


    // Remove Post Type Pages' Gutenberg editor
    function ttc_remove_page_editor() {
        remove_post_type_support( 'page', 'editor' );
    }
    add_action( 'init', 'ttc_remove_page_editor', 15 );

    //Import Google Font
    function wpb_add_google_fonts() {
        wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Playfair+Display|Space+Mono|Stint+Ultra+Expanded&display=swap', false );
    }
    add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );


    /**
     *   Cette function ajoute une section et un contrôle dans le panneau Customizer
     */
    
    function ttc_customizer_options( $wp_customize ) {
        
        $wp_customize->add_setting( 
            'couleur_du_header', 
            array(
                'default'   => '#000000',
                'transport' => 'refresh',
            ) 
        );

        
        $wp_customize->add_section( 
            'ttc_control_section', 
            array(
                 'title'      => __( 'Contrôle du thème enfant', 'twentytwenty-child' ),
                 'priority'   => 30,
            ) 
        );

        $wp_customize->add_control( 
            new WP_Customize_Color_Control( 
                $wp_customize,
                'link_color',
                array(
                    'label'      => __( 'Couleur du Header', 'twentytwenty-child' ),
                    'section'    => 'ttc_control_section',
                    'settings'   => 'couleur_du_header',
                ) 
            ) 
        );
    }
    add_action('customize_register','ttc_customizer_options');



    /**
     *   Cette injecte la valeur saisi du nouveau contrôle dans le head du site
     */
        
    function monthemeenfant_customize_css() {
    ?>
        <style type="text/css">
            .site-title { color: <?php echo get_theme_mod('couleur_du_header', '#000000'); ?>; }
        </style>
    <?php
    }
    add_action( 'wp_head', 'monthemeenfant_customize_css');



?>