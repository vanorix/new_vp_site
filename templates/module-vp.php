<!-- MODULE VP -->
<div class="modulevp">
    <div class="article-week">
        <?php $article = get_field('arte_articulo'); ?>
        <img src="<?php echo $article['url']; ?>" alt="">
    </div>
    <?php $fondoFrase = get_field('fondo_frase'); ?>
    <div class="instagram-posts">
        <div class="instagram-posts-container">
            <div class="instagram-title">
                <h2>Posts Instagram</h2>
                <a href="https://www.instagram.com/vicerdo/">@Vicerdo</a>
            </div>
            <div id="instafeed">
            </div>
        </div>
    </div>
</div>