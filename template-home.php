<?php
/**
 * Template name: Homepage Template
 */

get_header();
?>

    <!-- About Us -->
    <article class="about-us-home cf">
        <aside class="about cf">
            <div class="img">
                <?php if(get_post_meta(get_the_ID(), 'bebe_about_photo', true)){ ?>
                    <img src="<?php echo esc_url(get_post_meta(get_the_ID(), 'bebe_about_photo', true)); ?>" alt=""/>
                <?php }?>
            </div>
            <div class="text">
                <?php if(get_post_meta(get_the_ID(), 'bebe_about_title', true)){ ?>
                    <h2><?php echo esc_attr(get_post_meta(get_the_ID(), 'bebe_about_title', true)); ?></h2>
                <?php }?>
                <?php if(get_post_meta(get_the_ID(), 'bebe_about_desc', true)){ ?>
                <p>
                    <?php echo esc_attr(get_post_meta(get_the_ID(), 'bebe_about_desc', true)); ?>
                </p>
                <?php }?>
                <?php if(get_post_meta(get_the_ID(), 'bebe_about_link', true)){ ?>
                    <a class="more" href="<?php echo esc_url(get_post_meta(get_the_ID(), 'bebe_about_link', true)); ?>">More ></a>
                <?php }?>
            </div>
        </aside>
        <aside class="list">
            <ul>
                <li class="cf">
                    <div class="icon i1"></div>
                    <?php if(get_post_meta(get_the_ID(), 'bebe_info_title_1', true)){ ?>
                        <a href="" class="caption"><?php echo esc_attr(get_post_meta(get_the_ID(), 'bebe_info_title_1', true)); ?></a>
                    <?php }?>
                    <?php if(get_post_meta(get_the_ID(), 'bebe_info_Description_1', true)){ ?>
                        <p><?php echo esc_attr(get_post_meta(get_the_ID(), 'bebe_info_Description_1', true)); ?></p>
                    <?php }?>
                </li>
                <li class="cf">
                    <div class="icon i2"></div>
                    <?php if(get_post_meta(get_the_ID(), 'bebe_info_title_2', true)){ ?>
                        <a href="" class="caption"><?php echo esc_attr(get_post_meta(get_the_ID(), 'bebe_info_title_2', true)); ?></a>
                    <?php }?>
                    <?php if(get_post_meta(get_the_ID(), 'bebe_info_Description_2', true)){ ?>
                        <p><?php echo esc_attr(get_post_meta(get_the_ID(), 'bebe_info_Description_2', true)); ?></p>
                    <?php }?>
                </li>
                <li class="cf">
                    <div class="icon i3"></div>
                    <?php if(get_post_meta(get_the_ID(), 'bebe_info_title_3', true)){ ?>
                        <a href="" class="caption"><?php echo esc_attr(get_post_meta(get_the_ID(), 'bebe_info_title_3', true)); ?></a>
                    <?php }?>
                    <?php if(get_post_meta(get_the_ID(), 'bebe_info_Description_3', true)){ ?>
                        <p><?php echo esc_attr(get_post_meta(get_the_ID(), 'bebe_info_Description_3', true)); ?></p>
                    <?php }?>
                </li>
            </ul>
        </aside>
    </article>

    <!-- Recent From Blog -->
    <article class="recent-blog-home">
        <h2 class="title">Recent from blog</h2>

        <div class="items cf">
        <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => '4'
        );
        $home_post = new WP_Query($args);

        while ( $home_post->have_posts() ) : $home_post->the_post();?>

            <div class="col-3">
                <a href="<?php the_permalink(); ?>">
                    <?php echo get_the_post_thumbnail(get_the_ID(),'post-front'); ?>
                </a>
                <div class="info cf">
                    <div class="time"><?php echo get_the_date(); ?></div>
                    <a href="<?php the_permalink()?>" class="comments"><?php echo comments_number(); ?></a>
                </div>
                <div class="text">
                    <a href="<?php the_permalink(); ?>" class="caption"><?php the_title(); ?></a>
                    <p>
                        <?php the_excerpt(); ?>
                    </p>
                </div>
            </div>

           <?php endwhile;

            wp_reset_postdata();
        ?>

        </div>
    </article>
    </section>

    <!-- Photo Gallery -->
    <div class="center-align photo-gallery">
        <div class="top">
            <h2><?php esc_html_e('Photo Gallery','bebe'); ?></h2>
        </div>

        <div id="photo-gallery">
        <?php
            $args = array(
            'post_type' => 'gallery',
            'posts_per_page' => '10'
            );

            $home_galleries = new WP_Query($args); ?>
            <ul class="slides">
                <!-- -->
                <li>
                    <div class="items1">
                        <?php $i=0; while ( $home_galleries->have_posts() ) : $home_galleries->the_post(); $i++;?>
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

                        <?php if ($i == 5) {?>
                        </div>
                        </li>

                        <li>
                        <div class="items2">
                        <?php }?>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                </li>

            </ul>
        </div>

        <div class="back"></div>
        <div class="bottom"></div>
        <div class="anchor"></div>
    </div>

<?php get_footer();
