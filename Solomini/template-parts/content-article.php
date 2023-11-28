<div class="container">
    <header class="content-header">
        <div class="meta mb-3">
            <h1>
                <?php the_title(); ?>
            </h1>
            <div>
                <?php the_excerpt(); ?>
            </div>
        </div>
    </header>
    <div class="sm-divider"></div>
    <div class="post-page-content">
        <?php
        the_content();
        ?>
    </div>
</div>