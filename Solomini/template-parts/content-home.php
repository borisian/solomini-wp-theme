<h1 class="primary-t">
    <?php echo get_bloginfo('name'); ?>
</h1>
<div class="entry-content mt-3">
    <p class="second-t">
        <?php echo get_bloginfo('description'); ?>
        <?php the_content(); ?>
    </p>
</div>

<!--MENU HARDCODED-->
<div class="center_content">
    <?php
    $tags = get_tags();
    $active_class = 'active';
    ?>

    <div id="filter-menu" class="mt-5 mb-4">
        <a class="m-1 ps-2 pe-2 pb-1 rounded text-center <?php echo esc_attr($active_class); ?>" href="#"
            data-tag="all">All</a>

        <?php foreach ($tags as $tag): ?>
            <a class="m-1 ps-2 pe-2 pb-1 rounded text-center" href="#" data-tag="<?php echo esc_attr($tag->slug); ?>">
                <?php echo esc_html($tag->name); ?>
            </a>
        <?php endforeach; ?>
    </div>

    <?php get_search_form(); ?>
    <hr class="m-0"/>

    <div id="article-container">
        <?php
        $allArticles = get_posts(array('post_type' => 'post', 'posts_per_page' => -1, 'orderby' => 'date', 'order' => 'DESC'));
        echo '<div class="article-container d-flex flex-wrap">';

        foreach ($allArticles as $post) {
            setup_postdata($post);

            $tags = get_the_tags($post->ID);

            echo '<div class="post row col-12 mt-5 mb-4" data-tags="';

            if ($tags) {
                $tag_slugs = array();
                foreach ($tags as $tag) {
                    $tag_slugs[] = $tag->slug;
                }
                echo esc_attr(implode(' ', $tag_slugs));
            }

            echo '" onclick="window.location=\'' . esc_url(get_permalink()) . '\'" data-date="' . esc_attr(get_the_date('Y-m-d')) . '">';

            echo '<div class="post-thumbnail col-auto">';
            if (has_post_thumbnail()) {
                the_post_thumbnail('thumbnail', ['class' => 'img-fluid']);
            }
            echo '</div>';

            echo '<div class="post-content col">';
            echo '<div class="tags">';
            if ($tags) {
                foreach ($tags as $tag) {
                    echo '<span class="tag tag-' . esc_html($tag->slug) . ' rounded text-center ps-1 pe-1">' . esc_html($tag->name) . '</span>';
                }
            }

            echo '<h2 class="text-2xl font-semibold mb-2">';
            the_title();
            echo '</h2>';

            echo '<div class="text-sm opacity-70 js-excerpt-limit">';
            the_excerpt();
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
        wp_reset_postdata();
        ?>
    </div>

</div>