<style>
    #related, #comments, #track-back-url, #comment-form {
        margin: 2em 0em 4em;
    }
    #related h1, #comments h1, #track-back-url h1, #comment-form h3 {
        margin: 1em 0em;
        border-bottom: 1px solid hsl(100, 40%, 50%);
        font-size: 25px;
        color: hsl(100, 40%, 50%);
        line-height: 1.25em;
        text-shadow: 2px 2px 4px hsl(60, 50%, 50%);
    }
    
    
    
    #related ul, #related ol {
        padding-left: 25px;
    }
    
    
    
    #comment-list {
        list-style: none;
    }
    
    #comment-list .comment {
        margin: 1em 0em;
        padding: 5px 10px;
        border-left: 1px solid #eee;
        border-top: 1px solid #eee;
        border-top-left-radius: 10px;
        border-bottom-right-radius: 10px;
        box-shadow: 2px 2px 5px 0px hsl(120, 0%, 40%);
    }
    #comment-list .comment:nth-child(odd) {
        background-color: hsl(120, 50%, 90%);
    }
    #comment-list .comment:nth-child(even) {
        background-color: hsl(120, 0%, 90%);
    }
    #comment-list .comment-body {
        margin: 5px;
    }
    #comment-list .comment-body p {
        margin: 0.8em 0em;
    }
    
    
    
    #track-back-url .track-back-url-form {
        display: block;
        padding: 5px 10px;
        width: 100%;
        box-shadow: 0px 0px 4px 0px #aaa;
    }
    
    
    
    #comment-form p {
        margin: 0.8em 0em;
    }
    #comment-form input, #comment-form textarea {
        display: block;
    }
    #comment-form input {
        padding: 1px;
    }
    #comment-form input[type="submit"] {
        padding: 1px 6px;
    }
    #comment-form input[type="text"]{
        width: 400px;
    }
    #comment-form label:before {
        content: '〠';
        padding-right: 5px;
    }
    #comment-form textarea {
        width: 100%;
    }
    #comment-form .required {
        color: hsl(0, 50%, 50%);
    }
</style>

<?php if(function_exists('related_posts')): ?>
<section id="related">
    <?php related_posts(); ?>
</section>
<?php endif; ?>


<?php if(pings_open()): ?>
<section id="track-back-url">
    <h1>TRACK BACK URL</h1>
    <div>
        <input class="track-back-url-form" value="<?php trackback_url(); ?>" onclick="this.select();" />
    </div>
</section>
<?php endif; ?>


<section id="comment-form">
    <?php
    comment_form(array(
        'title_reply' => __('POST COMMENT')
    ));
    ?>
</section>


<?php if(have_comments()): ?>
<section id="comments">
    <h1>COMMENT</h1>
    <ul id="comment-list">
        <?php wp_list_comments(); ?>
    </ul>
</section>
<?php endif; ?>



















