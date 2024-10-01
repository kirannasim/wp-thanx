<?php
/**
 * Customizer addtions
 * 
 */


if ( ! function_exists( 'thanx_widgets_init' ) ) :

	/**
	 * Initializes themes widgets.
	 */
	function thanx_widgets_init() {
		register_sidebar(
			array(
				'name'          => __( 'Footer 1', 'thanx' ),
				'id'            => 'footer1',
				'description'   => __( 'Footer widget 1', 'thanx' ),
				'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
				'after_widget'  => '</div><!-- .footer-widget -->',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
        );
        
        register_sidebar(
			array(
				'name'          => __( 'Footer 2', 'thanx' ),
				'id'            => 'footer2',
				'description'   => __( 'Footer widget 2', 'thanx' ),
				'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
				'after_widget'  => '</div><!-- .footer-widget -->',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);


        register_sidebar(
			array(
				'name'          => __( 'Footer 3', 'thanx' ),
				'id'            => 'footer3',
				'description'   => __( 'Footer widget 3', 'thanx' ),
				'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
				'after_widget'  => '</div><!-- .footer-widget -->',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
    }
    
    add_action( 'widgets_init', 'thanx_widgets_init' );

endif;


if ( ! function_exists( 'remove_parent_theme_excerpts_get_more_link_filter' ) ) :

    /**
     * Remove the filter of the parent theme to get more link 
     * 
     */
    function remove_parent_theme_excerpts_get_more_link_filter() {
        remove_filter( 'wp_trim_excerpt', 'understrap_all_excerpts_get_more_link' );
        add_post_type_support( 'page', 'excerpt' );
    }

    add_action( 'after_setup_theme', 'remove_parent_theme_excerpts_get_more_link_filter' );

endif;


if ( ! function_exists( 'thanx_register_menu' ) ) :

	/**
     * Register menu 
     * 
     */
	function thanx_register_menu() {
		register_nav_menu( 'episodes_primary_menu', __( 'Episodes Primary Menu', 'thanx' ) );
		register_nav_menu( 'episodes_secondary_menu', __( 'Episodes Secondary Menu', 'thanx' ) );
	}

	add_action( 'after_setup_theme', 'thanx_register_menu' );

endif;


if ( ! function_exists( 'thanx_register_custom_post_types' ) ) :    

    /**
     * Register custom post type
     */
    function thanx_register_custom_post_types() {

        // register post types
        $post_types = array(            
            'food_fighter'  => array(
                'name'          => 'Food Fighters',
                'singular_name' => 'Food Fighter',
                'icon'          => 'dashicons-food',
                'slug'          => 'food-fighters-podcast',
				'has_archive'   => true,
				'supports'      => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail' ),
            ),
            'external_link' => array(
                'name'          => 'External Links',
                'singular_name' => 'External Link',
                'icon'          => 'dashicons-admin-links',
                'slug'          => 'external_link',
				'has_archive'   => false,
				'supports'      => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
            ),
            'inspiration'   => array(
                'name'          => 'Inspirations',
                'singular_name' => 'Inspiration',
                'icon'          => 'dashicons-format-status',
                'slug'          => 'resources/inspiration',
				'has_archive'   => true,
				'supports'      => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
            ),
            // 'blog'          => array(
            //     'name'          => 'Blogs',
            //     'singular_name' => 'Blog',
            //     'icon'          => 'dashicons-admin-post',
            //     'slug'          => 'resources/blog',
				// 'has_archive'   => true,
            // ),
            'customer'          => array(
                'name'          => 'Customers',
                'singular_name' => 'Customer',
                'icon'          => 'dashicons-admin-post',
				'slug'          => 'customers',
				'has_archive'   => false,
				'supports'      => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail' ),
            ),
            'case_studies'  => array(
                'name'          => 'Playbooks',
                'singular_name' => 'Playbook',
                'icon'          => 'dashicons-welcome-learn-more',
                'slug'          => 'emerge-stronger',
				'has_archive'   => false,
				'supports'      => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail' ),
            ),
            'guides'        => array(
                'name'          => 'Guides',
                'singular_name' => 'Guide',
                'icon'          => 'dashicons-text-page',
                'slug'          => 'resources/guides',
				'has_archive'   => true,
				'supports'      => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail' ),
            ),
            'webinars'      => array(
                'name'          => 'Webinars',
                'singular_name' => 'Webinar',
                'icon'          => 'dashicons-admin-site-alt3',
                'slug'          => 'resources/webinars',
				'has_archive'   => true,
				'supports'      => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail' ),
            ),
            'infographics'  => array(
                'name'          => 'Infographics',
                'singular_name' => 'Infographic',
                'icon'          => 'dashicons-admin-customizer',
                'slug'          => 'resources/infographics',
				'has_archive'   => true,
				'supports'      => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail' ),
            ),
            'videos'        => array(
                'name'          => 'Videos',
                'singular_name' => 'Video',
                'icon'          => 'dashicons-format-video',
                'slug'          => 'resources/videos',
				'has_archive'   => true,
				'supports'      => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail' ),
            ),
        );

        foreach ( $post_types as $post_name => $post_type ) {
            $name = $post_type['name'];
            $singular_name = $post_type['singular_name'];
            $icon = $post_type['icon'];
            $slug = $post_type['slug'];
            $has_archive = $post_type['has_archive'];
            $supports = $post_type['supports'];

            $labels = array(
                'name'                      => __( $name, 'thanx' ),
                'singular_name'             => __( $singular_name, 'thanx' ),
                'all_items'                 => __( 'All ' . $name, 'thanx' ),
                'add_new_item'              => __( 'Add New ' . $singular_name, 'thanx' ),
                'add_new'                   => __( 'Add New ' . $singular_name, 'thanx' ),
                'new_item'                  => __( 'New ' . $singular_name, 'thanx' ),
                'edit_item'                 => __( 'Edit ' . $singular_name, 'thanx' ),
                'update_item'               => __( 'Update ' . $singular_name, 'thanx' ),
                'view_item'                 => __( 'View ' . $singular_name, 'thanx' ),
                'view_items'                => __( 'View ' . $name, 'thanx' ),
                'search_items'              => __( 'Search ' . $singular_name, 'thanx' ),
                'insert_into_item'          => __( 'Insert into ' . $singular_name, 'thanx' ),
                'uploaded_to_this_item'     => __( 'Uploaded to this ' . $singular_name, 'thanx' ),
                'items_list'                => __( $name . ' List', 'thanx' ),
                'items_list_navigation'     => __( $name . ' List Navigation', 'thanx' ),
                'filter_items_list'         => __( 'Filter ' . $name . ' list', 'thanx' ),
            );
    
            register_post_type( $post_name,
                array(
                    'labels'                => $labels,
                    'public'                => true,
                    'show_ui'               => true,
                    'show_in_menu'          => true,
                    'show_in_nav_menus'     => true,
                    'show_in_admin_bar'     => true,
                    'menu_icon'             => $icon,
                    'menu_position'         => 30,
                    'hierarchical'          => true,
                    'supports'              => $supports,
                    'has_archive'           => $has_archive,
                    'rewrite'               => $slug == null ? false : array( 'slug' => $slug ),
                    'exclude_from_search'   => true,
                    'query_var'             => true,
                    'show_in_rest'          => true,
                )
            );
        }        
    }

    add_action( 'init', 'thanx_register_custom_post_types', 0 );
    
endif;


if ( ! function_exists( 'thanx_register_custom_taxonomy' ) ) :    

    /**
     * Register custom taxonomy
     */
    function thanx_register_custom_taxonomy() {
        // taxonomies
        $taxonomies = array(
            'channels'   => array(
                'post_name'     => 'inspiration',
                'name'          => 'Channels',
                'singular_name' => 'Channel',
                'slug'          => false,
            ),
            'industries'   => array(
                'post_name'     => 'inspiration',
                'name'          => 'Industries',
                'singular_name' => 'Industry',
                'slug'          => false,
            ),
            'merchants'   => array(
                'post_name'     => 'inspiration',
                'name'          => 'Merchants',
                'singular_name' => 'Merchant',
                'slug'          => false,
            ),
            'campaigns'   => array(
                'post_name'     => 'inspiration',
                'name'          => 'Campaigns',
                'singular_name' => 'Campaign',
                'slug'          => false,
            ),
            'link_category'   => array(
                'post_name'     => 'external_link',
                'name'          => 'Link Categories',
                'singular_name' => 'Link Category',
                'slug'          => false,
            ),
            'customer_stories'  => array(
                'post_name'     => 'customer',
                'name'          => 'Customer Stories',
                'singular_name' => 'Customer Story',
                'slug'          => false,
            ),
        );

        foreach ( $taxonomies as $tax_name => $taxonomy ) {
            $post_name = $taxonomy['post_name'];
            $name = $taxonomy['name'];
            $singular_name = $taxonomy['singular_name'];
            $slug = $taxonomy['slug'];

            $labels = array(
                'name'                          => __( $name, 'thanx' ),
                'singular_name'                 => __( $singular_name, 'thanx' ),
                'search_items'                  => __( 'Search ' . $name, 'thanx' ),
                'popular_items'                 => __( 'Popular ' . $name, 'thanx' ),
                'all_items'                     => __( 'All ' . $name, 'thanx' ),
                'parent_item'                   => __( 'Parent ' . $singular_name, 'thanx' ),
                'parent_item_colon'             => __( 'Parent ' . $singular_name . ':', 'thanx' ),
                'edit_item'                     => __( 'Edit ' . $singular_name, 'thanx' ), 
                'update_item'                   => __( 'Update ' . $singular_name, 'thanx' ),
                'add_new_item'                  => __( 'Add New ' . $singular_name, 'thanx' ),
                'new_item_name'                 => __( 'New ' . $singular_name . ' Name', 'thanx' ),
                'separate_items_with_commas'    => __( 'Separate ' . $name . ' with commas', 'thanx' ),
                'add_or_remove_items'           => __( 'Add or remove ' . $name, 'thanx' ),
                'choose_from_most_used'         => __( 'Choose from the most used ' . $name, 'thanx' ),
                'menu_name'                     => __( $name, 'thanx' ),
            ); 
        
            register_taxonomy( $tax_name, $post_name, array(
                'hierarchical'       => true,
                'labels'             => $labels,
                'show_ui'            => true,
                'show_in_rest'       => true,
                'show_admin_column'  => true,
				'query_var'          => true,
				'publicly_queryable' => false,
                'rewrite'            => $slug == null ? false : array( 'slug' => $slug ),
            ));
        }
    }

    add_action( 'init', 'thanx_register_custom_taxonomy', 0 );

endif;


if ( ! function_exists( 'thanx_permalink_for_external_link_post' ) ) :

    /**
     * Override the permalink of a CPT with an ACF field
     */
    function thanx_permalink_for_external_link_post( $permalink, $post ) {
        if ( 'external_link' == $post->post_type ) {
			$permalink = get_field( 'visit_link', $post->ID );
		}

		if ( 'guides' == $post->post_type || 'webinars' == $post->post_type ) {
			$permalink = $permalink .= '?g';
		}
		return $permalink;
    }

    add_filter( 'post_type_link', 'thanx_permalink_for_external_link_post', 10, 2 );

endif;


if ( ! function_exists( 'get_archive_post_type' ) ) :

    /**
     * Get the post type of the archive
     */
    function get_archive_post_type() {
        return is_archive() ? get_queried_object()->name : false;
    }

endif;


// if ( ! function_exists( 'thanx_remove_default_post_type' ) ) :

//     /**
//      * Remove side menu
//      */
//     function thanx_remove_default_post_type() {
//         remove_menu_page( 'edit.php' );
//     }

//     add_action( 'admin_menu', 'thanx_remove_default_post_type' );

// endif;


// if ( ! function_exists( 'thanx_remove_default_post_type_menu_bar' ) ) :

//     /**
//      * Remove +New post in top Admin Menu Bar
//      */ 
//     function thanx_remove_default_post_type_menu_bar( $wp_admin_bar ) {
//         $wp_admin_bar->remove_node( 'new-post' );
//     }

//     add_action( 'admin_bar_menu', 'thanx_remove_default_post_type_menu_bar', 999 );

// endif;


if ( ! function_exists( 'thanx_remove_draft_widget' ) ) :

    /**
     * Remove Quick Draft Dashboard Widget
     */
    function thanx_remove_draft_widget(){
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
    }

    add_action( 'wp_dashboard_setup', 'thanx_remove_draft_widget', 999 );

endif;


if ( ! function_exists( 'thanx_get_tag_ID' ) ) :

    /**
     * Get the tag id by tag name
     */
    function thanx_get_tag_ID( $tag_name ) {
        $tag = get_term_by( 'name', $tag_name, 'post_tag' );

        if ( $tag ) {
            return $tag->term_id;
        }
        
        return 0;
    }

endif;