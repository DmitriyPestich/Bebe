<?php
/**
 * Template name: About Template
 */

get_header();
?>
<?php while ( have_posts() ) : the_post();?>

<!-- About Us -->
<article class="about-us cf">
    <div class="col-6 text">
        <?php the_content()?>
    </div>

    <div class="col-6 slider">
        <?php $about_slides = get_post_meta(get_the_ID(), 'ale_gallery_id', true); ?>
        <?php if($about_slides){?>
        <div id="about-slider">
            <ul class="slides">
                <?php foreach($about_slides as $slide){ ?>
                <li>
                    <?php echo wp_get_attachment_image($slide, 'full')?>
                </li>
                <?php }?>
            </ul>
        </div>
        <?php }?>
    </div>
</article>

<!-- -->
<div class="dotted-line"></div>

<!-- Our Teachers -->
<article class="our-teachers cf">
    <h2 class="title"><?php if(get_post_meta(get_the_ID(), 'bebe_about_teacher', true)){ echo esc_attr(get_post_meta(get_the_ID(), 'bebe_about_teacher', true));} else { echo 'Teachers'; } ?></h2>

    <div class="teachers">
        <?php $teachers = new WP_Query(array('post_type' => 'teachers', 'post_per_page' => -1)); ?>

    <?php if ( $teachers -> have_posts() ) : while ( $teachers -> have_posts() ) : $teachers -> the_post();?>

        <div class="col-4">
            <div class="back-frame">
                <div class="image">
                    <?php echo get_the_post_thumbnail(get_the_ID(),'teacher_photo'); ?>
                    <ul>
                        <?php if(!empty(get_post_meta(get_the_ID(), 'bebe_fb_link', true))) {?><li class="facebook"><a href=""></a></li><?php }?>
                        <?php if(!empty(get_post_meta(get_the_ID(), 'bebe_pin_link', true))) {?><li class="pinterest"><a href=""></a></li><?php }?>
                        <?php if(!empty(get_post_meta(get_the_ID(), 'bebe_twi_link', true))) {?><li class="twitter"><a href=""></a></li><?php }?>
                    </ul>
                </div>

                <!-- -->
                <h3><?php the_title() ?></h3>

                <!-- -->
                <?php the_excerpt() ?>
            </div>
        </div>
    <?php endwhile; endif; ?>
    </div>

</article>
<?php endwhile;?>
<?php get_footer();