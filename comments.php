<section id="comments">
    <?php if(have_comments()): ?>
    <h3>コメント</h3>
    
    <ul>
        <?php wp_list_comments(); ?>
    </ul>
    
    <?php endif; ?>
    
    <?php comment_form(); ?>
    
    <?php if(pings_open()): ?>
    
    <p id="truckback">
        <strong>Truck Back URL : </strong>
        <?php trackback_url(); ?>
    </p>
    
    <?php endif; ?>
</section>
