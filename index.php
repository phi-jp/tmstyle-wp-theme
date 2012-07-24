<!DOCTYPE html>

<html>
    
    <head>
        <?php get_template_part('head'); ?>
    </head>
    
    <body>
        <?php get_header(); ?>
        
        <div id="content">
            
            <!-- #articles start -->
            <section id="articles" class="home">
                
                <!-- パンくず start -->
                <?php if(is_month()): ?>
                <h2>DATE : <?php single_month_title(); ?></h2>
                <?php elseif(is_archive()): ?>
                <h2>CATEGORY : <?php single_cat_title(); ?></h2>
                <?php else: ?>
                <h2 style="display:none;">Home</h2>
                <?php endif; ?>
                <!-- パンくず end -->
                
                <!-- .entry start -->
                <?php if(have_posts()): while(have_posts()): the_post(); ?>
                <article id="entry<?php the_id(); ?>" class="entry">
                    
                    <?php if (is_single()): ?>
                    <script>
                        var Entry = {};
                        Entry.element = document.getElementById("entry<?php the_id(); ?>");
                    </script>
                    <?php endif; ?>
                    
                    <header>
                        <h1>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h1>
                    </header>
                    
                    <div class='content'>
                        <?php the_content('Read More'); ?>
                        <div class="clear"></div>
                    </div>
                    
                    <footer>
                        <div class="category">
                            Category : <?php the_category(', '); ?>
                        </div>
                        
                        <div class="tag">
                            <?php
                            $tags_list = get_the_tag_list('', ', ');
                            if ($tags_list):
                            ?>
                            <span>Tag : </span>
                            <a href="#">
                                <?php echo $tags_list; ?>
                            </a>
                            <?php endif; ?>
                        </div>
                        
                        <?php edit_post_link('Edit', '<div class="edit"><span>', '</span></div>'); ?>
                        <time>
                        <?php the_date("Y年n月j日 l"); ?>
                        </time>
                        
                        
                        <?php if (is_single()): ?>
                        <div class="post-links">
                            <p><?php previous_post_link('<< %link '); ?></p>
                            <p><a href="http://tmlife.net">Home</a></p>
                            <p><?php next_post_link(' %link >>'); ?></p>
                        </div>
                        <?php endif; ?>
                        
                    </footer>
                                        
                </article>
                
                <!-- start sidebar -->
                <?php comments_template(); ?>
                <!-- end sidebar -->
                
                <?php endwhile; endif; ?>
                <!-- .entry end -->
                
                
                <!-- start page navi -->
                <div class="pagenavi">
                <?php global $wp_rewrite;
                $paginate_base = get_pagenum_link(1);
                if (strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()) {
                    $paginate_format = '';
                    $paginate_base = add_query_arg('paged', '%#%');
                } else {
                    $paginate_format = (substr($paginate_base, -1 ,1) == '/' ? '' : '/') .
                    user_trailingslashit('page/%#%/', 'paged');;
                    $paginate_base .= '%_%';
                }
                echo paginate_links( array(
                    'base' => $paginate_base,
                    'format' => $paginate_format,
                    'total' => $wp_query->max_num_pages,
                    'mid_size' => 5,
                    'current' => ($paged ? $paged : 1),
                    'prev_text' => ("<< Prev"),
                    'next_text' => ("Next >>"),
                ));
                ?>
                </div>
                <!-- end page navi -->
                
            </section>
            <!-- #articles end -->
            
            <!-- start sidebar -->
            <?php get_sidebar(); ?>
            <!-- end sidebar -->
            
        </div>
        
        <?php get_footer(); ?>
    </body>
    
<html>
