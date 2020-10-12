<?php get_header(); ?>

    <!-- Rooms -->
    <article class="rooms">
        <?php global $bebe_options;?>
        <?php

            $posts_per_page= '6';
            if(isset($bebe_options['roomscount'])){
                $posts_per_page = $bebe_options['roomscount'];
            }
            $rooms = new WP_Query(array('post_type'=>'rooms', 'posts_per_page' => $posts_per_page));
            $i = '0';
        ?>
        <!-- -->
        <div class="line cf">
            <?php if ( $rooms -> have_posts() ) : while ( $rooms -> have_posts() ) : $rooms -> the_post(); $i++; ?>
            <div class="col-6">
                <div class="col-6 text">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <?php the_excerpt(); ?>
                    <a class="more" href="<?php the_permalink(); ?>">More ></a>
                </div>
                <div class="col-6 img">
                    <?php echo get_the_post_thumbnail(get_the_ID(),'room_photo'); ?>
                </div>
            </div>

                <?php $count = $rooms->found_posts;
                    if ($i < $count and ($i % 2) === 0){
                echo '</div><div class="line cf">';
                }?>

            <?php endwhile; endif; ?>
        </div>

    </article>


    <!-- Pagination -->
    <article class="pagination">
        <?php
        $settings = array(
            'prev_next'    => false,
        );
        echo paginate_links( $settings );?>
    </article>

<?php get_footer();