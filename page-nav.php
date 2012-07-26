<style>

    .page-nav {
        text-align: center;
    }
    .page-nav .page-numbers {
        margin: 2px;
        padding: 4px 5px;
        background-color: black;
        border: 1px solid #aaa;
        
        color: #aaa;
    }
    .page-nav .current {
        background-color: #fff;
        border: 1px solid black;
        
        color: black;
    }
    
</style>
<div class="page-nav">
    <?php
    $paginate_base = get_pagenum_link(1);
    
    if (strpos($paginate_base, '?')) {
        $paginate_base = add_query_arg('paged', '%#%');
        $paginate_format = '';
    }
    else {
        $paginate_format = (substr($paginate_base, -1, 1) == '/' ? '' : '/').user_trailingslashit('page/%#%/', 'paged');
        $paginate_base .= '%_%';
    }
    
    echo paginate_links(array(
        'base' => $paginate_base,
        'format' => $paginate_format,
        'total' => $wp_query->max_num_pages,
        'mid_size' => 3,
        'current' => ($paged ? $paged : 1),
        'prev_text' => ("<< Prev"),
        'next_text' => ("Next >>"),
    ));
    ?>
</div>