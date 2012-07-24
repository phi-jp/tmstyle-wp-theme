<header id="header">
    <hgroup>
        <h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?><!--HOME--></a></h1>
        <h2><?php bloginfo('description'); ?></h2>
    </hgroup>
    
    <nav id="nav">
        <?php
            wp_nav_menu(array(
                'menu_class' => 'menu clearfix'
            ));
        ?>
    </nav>
</header>
