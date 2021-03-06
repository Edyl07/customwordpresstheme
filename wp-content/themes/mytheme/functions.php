<?php
   namespace App;

    function theme_support(){
        add_theme_support("title-tag");
        add_theme_support('post-thumbnails');
    }

    /**
     * Registers a stylesheet
     */
    function register_assets(){
        wp_register_style('bootstrap',
            'https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css', []);

        wp_register_script('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js',
            ['popper', 'jquery'], false, true);

        wp_register_script('popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js',
        [], false, true);

        wp_deregister_script('jquery');
        wp_register_script('jquery', 'https://code.jquery.com/jquery-3.2.1.slim.min.js', [], false, true);

        wp_enqueue_style('bootstrap');
        wp_enqueue_script('bootstrap');
    }


    function themeTitleSeparator($title){
        return '|';
    }

   /* function themeDocumentTitlePart($title){
        $title['demo'] = 'salut';
        return $title;
    }*/

    add_action('after_setup_theme', 'App\theme_support');

    /**
     * Register a stylesheet
     */
    add_action('wp_enqueue_scripts', 'App\register_assets');

    add_filter('document_title_separator', 'App\themeTitleSeparator');

    //add_filter('document_title_parts', 'App\themeDocumentTitlePart');