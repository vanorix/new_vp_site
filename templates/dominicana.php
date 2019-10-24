<!-- Dominicana en Breve -->
<?php $bg = get_field('bg_dominicana'); ?>
<div class="seccion-dominicana" style="background-image:url('<?php echo $bg['url']; ?>')">
    <div class="bg-color">
        <div class="section-title">
            <h1>Dominicana en Breve</h1>
        </div>
        <div class="dominicana-container">
            <div class="seccion-item">
                <h1><?php the_field('mujeres_congreso_valor'); ?></h1>
                <p><?php the_field('mujeres_congreso_texto'); ?></p>
            </div>
            <div class="seccion-item">
                <h1><?php the_field('pobreza_valor'); ?></h1>
                <p><?php the_field('pobreza_texto'); ?></p>
            </div>
            <div class="seccion-item">
                <h1><?php the_field('desigualdad_valor'); ?></h1>
                <p><?php the_field('desigualdad_texto'); ?></p>
            </div>
            <div class="seccion-item">
                <h1><?php the_field('desarrollo_valor'); ?></h1>
                <p><?php the_field('desarrollo_texto'); ?></p>
            </div>
        </div>
    </div>
</div>