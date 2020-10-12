<?php get_header(); ?>

    <!-- Gallery -->
    <article class="gallery">



        <div class="items1 cf">
            <?php $i=0; while ( have_posts() ) : the_post(); $i++;?>
                <?php if ($i == 1 or $i == 6) {?>
                    <a class="<?php echo $i?>" href="<?php the_permalink(); ?>">
                        <?php echo get_the_post_thumbnail(get_the_ID(), 'gallery_one'); ?>
                    </a>
                <?php } else if ($i == 2 or $i == 5 or $i == 7 or $i == 10) { ?>
                    <a class="<?php echo $i?>" href="<?php the_permalink(); ?>">
                        <?php echo get_the_post_thumbnail(get_the_ID(), 'gallery_two'); ?>
                    </a>
                <?php } else if ($i == 3 or $i == 4 or $i == 8 or $i == 9) { ?>
                    <a class="<?php echo $i?>" href="<?php the_permalink(); ?>">
                        <?php echo get_the_post_thumbnail(get_the_ID(), 'gallery_three'); ?>
                    </a>
                <?php } ?>

            <?php if ($i == 5) {?> </div> <div class="items2 cf"> <?php }?>

            <?php endwhile; wp_reset_postdata(); ?>
        </div>


    </article>

    <!-- Pagination -->
    <article class="pagination gall">
        <?php
        $settings = array(
            'prev_next'    => false,
        );
        echo paginate_links( $settings );?>
    </article>

<?php get_footer();
