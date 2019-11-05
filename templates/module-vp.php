<!-- MODULE VP -->
<div class="modulevp">
    <div class="article-week">
        <?php $article = get_field('arte_articulo'); ?>
        <img src="<?php echo $article['url']; ?>" alt="">
    </div>
    <?php $fondoFrase = get_field('fondo_frase'); ?>
    <div class="instagram-posts" style="background-image: url(<?php echo $fondoFrase['url']; ?>)">
        <div class="instagram-posts-container">
            <div class="instagram-title">
                <h2>Posts Instagram</h2>
            </div>
            <div class="posts-instagram">
                <?php echo do_shortcode('[instagram-feed]'); ?>
            </div>
        </div>
    </div>
</div>