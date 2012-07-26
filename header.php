<header id="header">
    <hgroup>
        <h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?><!--HOME--></a></h1>
        <h2><?php bloginfo('description'); ?></h2>
    </hgroup>
    
    <div class="links">
        <ul>
            <li><a href="https://twitter.com/phi_jp" class="twitter" alt="Twitter"></a></li>
            <li><a href="https://plus.google.com/113051166787856683749" class="gplus" alt="Goolge Plus"></a></li>
            <li><a href="https://github.com/phi1618" class="github" alt="GitHub"></a></li>
            <li><a href="http://tmlife.net/feed" class="rss" alt="RSS"></a></li>
        </ul>
    </div>
    
    <nav id="nav">
        <?php
            wp_nav_menu(array(
                'menu_class' => 'menu clearfix'
            ));
        ?>
    </nav>
</header>
