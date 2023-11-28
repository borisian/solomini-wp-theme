<?php get_header(); ?>


<div id="ttr_content">
    <div class="row mt-5">
        <?php if (have_posts()):
            while (have_posts()):
                the_post(); 
                get_template_part('template-parts/content', 'archive');
                ?>
            <?php endwhile; else: ?>
            <p>
                <?php _e('Sorry, no posts :('); ?>
            </p>
        <?php endif; ?>
    </div>
</div>


<?php get_footer(); ?>