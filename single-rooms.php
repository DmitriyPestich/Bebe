<?php get_header(); ?>

    <!-- Rooms Opened -->
<?php while ( have_posts() ) : the_post(); ?>
    <article class="rooms-opened cf">
    <?php $rooms_slides = get_post_meta(get_the_ID(), 'ale_gallery_id', true); ?>
    <?php if($rooms_slides){?>
        <div id="room-slider">
            <ul class="slides">
                <?php foreach($rooms_slides as $slide){ ?>
                    <li>
                        <?php echo wp_get_attachment_image($slide, 'rooms_slider')?>
                    </li>
                <?php }?>
            </ul>
        </div>
    <?php }?>

        <?php the_content() ?>

    </article>
<?php endwhile; ?>

    <!-- Other Rooms -->
    <article class="rooms opened">
        <h2 class="title">Other Rooms</h2>
        <div class="line cf">
            <?php
            $args = array(
                'post_type' => 'rooms',
                'posts_per_page' => 2,
                'orderby'   =>  'rand',
            );

            $similar_rooms = new WP_Query($args); ?>
            <?php if ( $similar_rooms -> have_posts() ) : while ( $similar_rooms -> have_posts() ) : $similar_rooms -> the_post();; ?>
            <div class="col-6">
                <div class="col-6 text">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
                    <p>
                        <?php the_excerpt();?>
                    </p>
                    <a class="more" href="<?php the_permalink(); ?>">More ></a>
                </div>
                <div class="col-6 img">
                    <?php echo get_the_post_thumbnail(get_the_ID(),'room_photo'); ?>
                </div>
            </div>
            <?php endwhile; endif; ?>

        </div>

    </article>



<?php get_footer();
