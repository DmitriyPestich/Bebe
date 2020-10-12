<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "bebe_options";


    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => false,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Bebe Options', 'bebe' ),
        'page_title'           => __( 'Theme Options for Bebe', 'bebe' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => false,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => true,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => false,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
    );

    Redux::setArgs( $opt_name, $args );


    // -> START Basic Fields
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Header&Footer', 'bebe' ),
        'id'               => 'basic',
        'desc'             => __( 'Data to be displayed in Header', 'bebe' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-home'
    ) );

        Redux::setSection( $opt_name, array(
            'title'            => __( 'Logo Data', 'bebe' ),
            'desc'             => __( 'Upload the logo and specify the slogan', 'bebe' ),
            'id'               => 'site_logos',
            'subsection'       => true,
            'customizer_width' => '700px',
            'fields'           => array(
                array(
                    'id'       => 'bebelogo',
                    'type'     => 'media',
                    'url'      => true,
                    'title'    => __( 'Logo', 'bebe' ),
                    'subtitle' => __( 'Upload here your logo', 'bebe' ),
                    'desc'     => __( 'Recommended size: 320px-110px', 'bebe' ),
                    'default'  => '',
                ),
                array(
                    'id'       => 'bebelogosmall',
                    'type'     => 'media',
                    'url'      => true,
                    'title'    => __( 'Logo Small', 'bebe' ),
                    'subtitle' => __( 'Upload here your logo', 'bebe' ),
                    'desc'     => __( 'Recommended size: 200px-70px', 'bebe' ),
                    'default'  => '',
                ),
                array(
                    'id'       => 'bebelogofooter',
                    'type'     => 'media',
                    'url'      => true,
                    'title'    => __( 'Logo footer', 'bebe' ),
                    'subtitle' => __( 'Upload here your logo', 'bebe' ),
                    'desc'     => __( 'Recommended size: 80px-40px', 'bebe' ),
                    'default'  => '',
                ),
                array(
                    'id'       => 'bebeslogan',
                    'type'     => 'text',
                    'title'    => __( 'Slogan', 'bebe' ),
                    'desc'     => __( 'Type here tour Slogan', 'bebe' ),
                    'subtitle' => __( 'Your Slogan', 'bebe' ),
                    'default'  => 'Slogan Text here'
                ),

            )
        ) );
        Redux::setSection( $opt_name, array(
            'title'            => __( 'Social links', 'bebe' ),
            'desc'             => __( 'Type here social links', 'bebe' ),
            'id'               => 'social_links',
            'subsection'       => true,
            'customizer_width' => '700px',
            'fields'           => array(
                array(
                    'id'       => 'fb',
                    'type'     => 'text',
                    'title'    => __( 'Facebook link', 'bebe' ),
                    'subtitle' => __( 'Type here your link', 'bebe' ),
                    'desc'     => __( 'Your Profile Link', 'bebe' ),
                    'default'  => '',
                ),
                array(
                    'id'       => 'ins',
                    'type'     => 'text',
                    'title'    => __( 'Instagram link', 'bebe' ),
                    'subtitle' => __( 'Type here your link', 'bebe' ),
                    'desc'     => __( 'Your Profile Link', 'bebe' ),
                    'default'  => '',
                ),
                array(
                    'id'       => 'pin',
                    'type'     => 'text',
                    'title'    => __( 'Pinterest link', 'bebe' ),
                    'subtitle' => __( 'Type here your link', 'bebe' ),
                    'desc'     => __( 'Your Profile Link', 'bebe' ),
                    'default'  => '',
                ),
                array(
                    'id'       => 'twi',
                    'type'     => 'text',
                    'title'    => __( 'Twitter link', 'bebe' ),
                    'subtitle' => __( 'Type here your link', 'bebe' ),
                    'desc'     => __( 'Your Profile Link', 'bebe' ),
                    'default'  => '',
                ),
                array(
                    'id'       => 'yt',
                    'type'     => 'text',
                    'title'    => __( 'YouTube link', 'bebe' ),
                    'subtitle' => __( 'Type here your link', 'bebe' ),
                    'desc'     => __( 'Your Profile Link', 'bebe' ),
                    'default'  => '',
                ),

            )
        ) );
        Redux::setSection( $opt_name, array(
            'title'            => __( 'Home Slider', 'bebe' ),
            'desc'             => __( 'Upload data for your slider', 'bebe' ),
            'id'               => 'home_slider',
            'subsection'       => true,
            'customizer_width' => '700px',
            'fields'           => array(
                    array(
                        'id'          => 'homepageslider',
                        'type'        => 'slides',
                        'title'       => __( 'Slides Options', 'bebe' ),
                        'subtitle'    => __( 'Unlimited slides with drag and drop sortings.', 'bebe' ),
                        'desc'        => __( 'This field will store all slides values into a multidimensional array to use into a foreach loop.', 'bebe' ),
                        'placeholder' => array(
                            'title'       => __( 'This is a title', 'bebe' ),
                            'description' => __( 'Description Here', 'bebe' ),
                            'url'         => __( 'Give us a link!', 'bebe' ),
                        ),
                    ),
            )
        ) );
        Redux::setSection( $opt_name, array(
            'title'            => __( 'Footer Data', 'bebe' ),
            'desc'             => __( 'Type here info for footer', 'bebe' ),
            'id'               => 'footer_data',
            'subsection'       => true,
            'customizer_width' => '700px',
            'fields'           => array(
                array(
                    'id'       => 'bebephone',
                    'type'     => 'text',
                    'title'    => __( 'Site Phone', 'bebe' ),
                    'subtitle' => __( 'Type here your phone', 'bebe' ),
                    'desc'     => __( 'The phone number', 'bebe' ),
                    'default'  => '',
                ),
                array(
                    'id'       => 'bebeemail',
                    'type'     => 'text',
                    'title'    => __( 'Site Email', 'bebe' ),
                    'subtitle' => __( 'Type here your email', 'bebe' ),
                    'desc'     => __( 'The Email Address', 'bebe' ),
                    'validate' => 'email',
                    'msg'      => __('Wrong email'),
                    'default'  => '',
                ),
                array(
                    'id'       => 'bebeaddress',
                    'type'     => 'text',
                    'title'    => __( 'Site Address', 'bebe' ),
                    'subtitle' => __( 'Type here your address', 'bebe' ),
                    'desc'     => __( 'The Address', 'bebe' ),
                    'default'  => '',
                ),
                array(
                    'id'       => 'bebeformshortcode',
                    'type'     => 'text',
                    'title'    => __( 'Form Shortcode', 'bebe' ),
                    'subtitle' => __( 'Type here the form shortcode', 'bebe' ),
                    'desc'     => __( 'Type the Shortcode from CF7 plugins or other', 'bebe' ),
                    'default'  => '',
                ),
                array(
                    'id'       => 'copyrights',
                    'type'     => 'editor',
                    'title'    => __( 'Copyrights', 'bebe' ),
                    'subtitle' => __( 'Type here some copirights', 'bebe' ),
                    'default'  => 'BEBE. All rights reserved',
                ),
            )
        ) );

Redux::setSection( $opt_name, array(
    'title'            => __( 'Post Type Settings', 'bebe' ),
    'id'               => 'posttypesettings_page',
    'desc'             => __( 'Specify the count on archives', 'bebe' ),
    'customizer_width' => '400px',
    'icon'             => 'el el-asl',
    'fields'           => array(
        array(
            'id'          => 'roomscount',
            'type'        => 'text',
            'validate' => 'numeric',
            'title'       => __( 'Posts per Page', 'bebe' ),
            'subtitle'    => __( 'On Rooms Post Type', 'bebe' ),
            'desc'        => __( 'How meny posts you want to show on the Rooms Archive Page', 'bebe' ),
            'default'     => '6',
        ),
        array(
            'id'          => 'width',
            'type'        => 'text',
            'validate' => 'numeric',
            'title'       => __( 'Width', 'bebe' ),
            'subtitle'    => __( '.....', 'bebe' ),
            'desc'        => __( '.....', 'bebe' ),
            'default'     => '',
        ),
        array(
            'id'       => 'bebe_sidebar',
            'type'     => 'button_set',
            'title'    => __( 'Button Set Option', 'redux-framework-demo' ),
            'subtitle' => __( 'No validation can be done on this field type', 'redux-framework-demo' ),
            'desc'     => __( 'This is the description field, again good for additional info.', 'redux-framework-demo' ),
            //Must provide key => value pairs for radio options
            'options'  => array(
                '1' => 'Left sidebar',
                '2' => 'No sidebar',
                '3' => 'Right sidebar'
            ),
            'default'  => '2'
        ),
    ),
) );
