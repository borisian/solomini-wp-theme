<?php get_header(); ?>

<div id="ttr_content">
<a href="<?php echo esc_url(home_url('/')); ?>" class="back-link"><i class="bi bi-caret-left-fill"></i> All posts</a>
    <div class="row mt-5">
    <div <?php post_class(); ?> style="background-color: #202020;">
        <?php if (have_posts()):
            while (have_posts()):
                the_post(); 
                get_template_part('template-parts/content', 'article');
                ?>
            <?php endwhile; else: ?>
            <p>
                <?php _e('Sorry, no posts :('); ?>
            </p>
        <?php endif; ?>
    </div>
</div>

<!-- end main -->
</div>

<?php get_footer(); ?>