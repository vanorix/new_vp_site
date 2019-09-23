<!-- MODULE VP -->
<div class="modulevp">
    <div class="article-week">
        <?php $article = get_field('arte_articulo'); ?>
        <img src="<?php echo $article['url']; ?>" alt="">
    </div>
    <?php $fondoFrase = get_field('fondo_frase'); ?>
    <div class="frasevp" style="background-image: url(<?php echo $fondoFrase['url']; ?>)">
        <div class="frase-container">
            <div class="section-title">
                <h1>Frase</h1>
                <span>de la doctora</span>
            </div>
            <div class="frase-text">
                <p><?php the_field('frase'); ?></p>
            </div>
            <div class="frase-name">
                <?php the_field('nombre_autora'); ?>
            </div>
        </div>
    </div>
</div>