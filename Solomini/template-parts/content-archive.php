<div class="container mt-3 mb-3">
    <h3><?php the_title(); ?></h3>

    <div class="intro">
        <?php
        the_excerpt();
        ?>
    </div>

    <a href="<?php the_permalink(); ?>" class="more-link">read more &rarr;</a>
</div>