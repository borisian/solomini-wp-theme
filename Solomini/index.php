<?php get_header(); ?>

<div id="ttr_content">
    <?php wp_body_open(); ?>
    <?php if (is_page("Home")) : ?>
        <?php  get_template_part('template-parts/content', 'home'); ?>
    <?php endif; ?>
</div>

<?php get_footer(); ?>