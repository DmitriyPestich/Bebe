<?php
/**
 * Template name: Page with Sidebar
 */
get_header(); global $bebe_options;?>

<div class="content_box">
    <?php if ($bebe_options['bebe_sidebar'] !== '2') {?>
    <div class="sidebar"
        <?php get_sidebar('blogsidebar'); ?>
    </div>
    <?php } ?>
    <div class="content">
<?php while ( have_posts() ) : the_post(); the_content(); endwhile; ?>
    </div>
</div>

<?php get_footer();
