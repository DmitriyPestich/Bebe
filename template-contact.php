<?php
/**
 * Template name: Contact Template
 */
get_header(); ?>

<?php while ( have_posts() ) : the_post();?>

    <!-- Contacts -->
    <article class="contacts">

        <div class="info-line cf">
            <div class="map">
                <?php

                    $address = get_post_meta(get_the_ID(), 'bebe_address', true);
                    $api_kay_googlemap = get_post_meta(get_the_ID(), 'bebe_googleapi', true);

                    echo do_shortcode('[pw_map address="'.esc_attr($address).'" width="490px" height="340px" key="'.esc_attr($api_kay_googlemap).'"]');
                ?>


            </div>

            <p>
                <?php the_content();?>
            </p>

            <div class="contactos">
                <?php if(get_post_meta(get_the_ID(), 'bebe_address', true)) { ?>
                    <div class="adress">
                        <div class="icon"></div>
                        <h3><?php echo esc_attr(get_post_meta(get_the_ID(), 'bebe_address_label', true));?></h3>
                        <p><?php echo esc_attr(get_post_meta(get_the_ID(), 'bebe_address', true));?></p>
                    </div>
                <?php }?>
                <?php if(get_post_meta(get_the_ID(), 'bebe_address', true)) { ?>
                    <div class="phone">
                        <div class="icon"></div>
                        <h3><?php echo esc_attr(get_post_meta(get_the_ID(), 'bebe_phone_label', true));?></h3>
                        <p><?php echo esc_attr(get_post_meta(get_the_ID(), 'bebe_phone', true));?></p>
                    </div>
                <?php }?>
                <?php if(get_post_meta(get_the_ID(), 'bebe_address', true)) { ?>
                    <div class="email">
                        <div class="icon"></div>
                        <h3><?php echo esc_attr(get_post_meta(get_the_ID(), 'bebe_email_label', true));?></h3>
                        <p><?php echo esc_attr(get_post_meta(get_the_ID(), 'bebe_email', true));?></p>
                    </div>
                <?php }?>
            </div>


        </div>

        <!-- -->

        <div class="respond">
            <div class="top"> <h2><?php esc_html_e('Get in touch with us','bebe');?></h2> </div>

            <form class="cf" method="post" id="respond-form">
                <?php echo do_shortcode(get_post_meta(get_the_id(),'bebe_contactformshortcode', true))?>
            </form>

        </div>

    </article>
<?php endwhile;?>

<?php get_footer();
