
<style>
    #breadcrumb {
        margin: 10px 10px 0px;
        padding: 10px 10px 0px;
    }
    #breadcrumb div {
        display: inline;
    }
</style>

<div id="breadcrumb">
    <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
        <a href="<?php echo home_url(); ?>" itemprop="url">
            <span itemprop="title"><?php bloginfo('name'); ?></span>
        </a>
        »
    </div>
    
    <?php $postcat = get_the_category(); ?>
    <?php $catid = $postcat[0]->cat_ID; ?>
    <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
        <a href="<?php echo get_category_link($catid); ?>" itemprop="url">
            <span itemprop="title">
                <?php echo get_cat_name($catid); ?>
            </span>
        </a>
        »
    </div>
    
    <div>
        <?php the_title(); ?>
    </div>
</div>
