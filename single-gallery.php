<?php get_header(); ?>

    <!-- Gallery -->
    <?php while ( have_posts() ) : the_post();?>
    <article class="gallery-opened">
    <?php $gallery_slides = get_post_meta(get_the_ID(), 'ale_gallery_id', true); ?>
    <?php if($gallery_slides){?>
        <!-- Slider -->
        <div id="gallery-slider">
            <ul class="slides">
                <?php foreach($gallery_slides as $slide){ ?>
                    <li>
                        <?php echo wp_get_attachment_image($slide, 'full')?>
                    </li>
                <?php }?>
            </ul>
        </div>
    <?php }?>

        <!-- Comments -->
        <h2 class="title"><?php the_title() ;?></h2>

        <?php the_content() ;?>

        <!-- -->
        <div class="dotted-line"></div>

        <!-- -->
        <div class="info cf">
            <?php
            $gallery_cats = get_the_terms(get_the_ID(), 'gallery-category');
            //var_dump ($gallery_cats);
            ?>
            <h4 class="categ">
                Date: <?php echo get_the_date();?>
                / Category:
                <?php if(!empty($gallery_cats)){
                    foreach($gallery_cats as $cat){?>
                        <a href="<?php echo get_tag_link($cat->term_id); ?>"><?php echo $cat->name;?></a>
                   <?php }
                }?>
            </h4>
            <div class="share">
                <h4>Share:  </h4>
                <ul>
                    <li class="facebook"><a onclick="window.open(this.href, 'Share on Facebook', 'width=600,height=300'); return false" href="<?php echo ale_get_share('fb',get_the_permalink(), get_the_title()); ?>"></a></li>
                    <li class="pinterest"><a onclick="window.open(this.href, 'Share on Pinterest', 'width=600,height=300'); return false" href="<?php echo ale_get_share('pin',get_the_permalink(), get_the_title()); ?>"></a></li>
                    <li class="twitter"><a onclick="window.open(this.href, 'Share on Twitter', 'width=600,height=300'); return false" href="<?php echo ale_get_share('twi',get_the_permalink(), get_the_title()); ?>"></a></li>
                </ul>
            </div>
        </div>

    </article>
    <?php endwhile; ?>

<?php get_footer();