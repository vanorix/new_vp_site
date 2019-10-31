<?php 
$prev_link = get_previous_posts_link();
$next_link = get_next_posts_link();
// as suggested in comments
if ($prev_link || $next_link) { ?>
  <div class="pagination">
    <?php seiel_pagination(); ?>
  </div>
<?php } ?>
