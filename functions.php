<?php

/**
 * 
 */
add_action( 'after_setup_theme', 'setup_theme' );

function setup_theme()
{
    /**
     *  rss setting
     */
    add_theme_support('automatic-feed-links');
    
    /**
     * nav menu
     */
    register_nav_menus();
    
    /**
     *  sidebar setting
     */
    register_sidebar(array(
        'id' => 'side-widget',
        'name' => 'Side Widget',
        'description' => 'SideBar 1',
        'before_title' => '<h1>',
        'after_title' => '</h1><div class="contents">',
        'before_widget' => '<section class="side-box">',
        'after_widget' => '</div></section>'
    ));
    
    /**
     *  sidebar setting
     */
    register_sidebar(array(
        'id' => 'footer-widget00',
        'name' => 'Footer Widget 00',
        'description' => 'Footer Widget 00',
        'before_title' => '<h1>',
        'after_title' => '</h1><div class="contents">',
        'before_widget' => '<section class="side-box">',
        'after_widget' => '</div></section>'
    ));
    
    /**
     *  sidebar setting
     */
    register_sidebar(array(
        'id' => 'footer-widget01',
        'name' => 'Footer Widget 01',
        'description' => 'Footer Widget 01',
        'before_title' => '<h1>',
        'after_title' => '</h1><div class="contents">',
        'before_widget' => '<section class="side-box">',
        'after_widget' => '</div></section>'
    ));
    
    /**
     *  sidebar setting
     */
    register_sidebar(array(
        'id' => 'footer-widget02',
        'name' => 'Footer Widget 02',
        'description' => 'Footer Widget 02',
        'before_title' => '<h1>',
        'after_title' => '</h1><div class="contents">',
        'before_widget' => '<section class="side-box">',
        'after_widget' => '<div></section>'
    ));
    
}

?>