<?php
/**
 * Plugin Name: schooletics Core
 * Plugin URI: https://schooletics.com/
 * Description: Core functionality for schooletics theme including custom post types and shortcodes
 * Version: 1.0.0
 * Author: Amazon Q
 * Author URI: https://schooletics.com/
 * Text Domain: schooletics-core
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Define plugin constants
define('schooletics_CORE_VERSION', '1.0.0');
define('schooletics_CORE_PATH', plugin_dir_path(__FILE__));
define('schooletics_CORE_URL', plugin_dir_url(__FILE__));

/**
 * Register Custom Post Types
 */
function schooletics_register_post_types() {
    // Services CPT
    register_post_type('service', array(
        'labels' => array(
            'name'               => __('Services', 'schooletics-core'),
            'singular_name'      => __('Service', 'schooletics-core'),
            'add_new'            => __('Add New', 'schooletics-core'),
            'add_new_item'       => __('Add New Service', 'schooletics-core'),
            'edit_item'          => __('Edit Service', 'schooletics-core'),
            'new_item'           => __('New Service', 'schooletics-core'),
            'view_item'          => __('View Service', 'schooletics-core'),
            'search_items'       => __('Search Services', 'schooletics-core'),
            'not_found'          => __('No services found', 'schooletics-core'),
            'not_found_in_trash' => __('No services found in trash', 'schooletics-core'),
        ),
        'public'              => true,
        'has_archive'         => true,
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon'           => 'dashicons-awards',
        'menu_position'       => 5,
        'show_in_rest'        => true,
        'rewrite'             => array('slug' => 'services'),
    ));
    
    // Projects/Works CPT
    register_post_type('project', array(
        'labels' => array(
            'name'               => __('Projects', 'schooletics-core'),
            'singular_name'      => __('Project', 'schooletics-core'),
            'add_new'            => __('Add New', 'schooletics-core'),
            'add_new_item'       => __('Add New Project', 'schooletics-core'),
            'edit_item'          => __('Edit Project', 'schooletics-core'),
            'new_item'           => __('New Project', 'schooletics-core'),
            'view_item'          => __('View Project', 'schooletics-core'),
            'search_items'       => __('Search Projects', 'schooletics-core'),
            'not_found'          => __('No projects found', 'schooletics-core'),
            'not_found_in_trash' => __('No projects found in trash', 'schooletics-core'),
        ),
        'public'              => true,
        'has_archive'         => true,
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon'           => 'dashicons-portfolio',
        'menu_position'       => 6,
        'show_in_rest'        => true,
        'rewrite'             => array('slug' => 'projects'),
    ));
    
    // Team Members CPT
    register_post_type('team', array(
        'labels' => array(
            'name'               => __('Team', 'schooletics-core'),
            'singular_name'      => __('Team Member', 'schooletics-core'),
            'add_new'            => __('Add New', 'schooletics-core'),
            'add_new_item'       => __('Add New Team Member', 'schooletics-core'),
            'edit_item'          => __('Edit Team Member', 'schooletics-core'),
            'new_item'           => __('New Team Member', 'schooletics-core'),
            'view_item'          => __('View Team Member', 'schooletics-core'),
            'search_items'       => __('Search Team Members', 'schooletics-core'),
            'not_found'          => __('No team members found', 'schooletics-core'),
            'not_found_in_trash' => __('No team members found in trash', 'schooletics-core'),
        ),
        'public'              => true,
        'has_archive'         => true,
        'supports'            => array('title', 'editor', 'thumbnail'),
        'menu_icon'           => 'dashicons-groups',
        'menu_position'       => 7,
        'show_in_rest'        => true,
        'rewrite'             => array('slug' => 'team'),
    ));
    
    // Testimonials CPT
    register_post_type('testimonial', array(
        'labels' => array(
            'name'               => __('Testimonials', 'schooletics-core'),
            'singular_name'      => __('Testimonial', 'schooletics-core'),
            'add_new'            => __('Add New', 'schooletics-core'),
            'add_new_item'       => __('Add New Testimonial', 'schooletics-core'),
            'edit_item'          => __('Edit Testimonial', 'schooletics-core'),
            'new_item'           => __('New Testimonial', 'schooletics-core'),
            'view_item'          => __('View Testimonial', 'schooletics-core'),
            'search_items'       => __('Search Testimonials', 'schooletics-core'),
            'not_found'          => __('No testimonials found', 'schooletics-core'),
            'not_found_in_trash' => __('No testimonials found in trash', 'schooletics-core'),
        ),
        'public'              => true,
        'has_archive'         => false,
        'supports'            => array('title', 'editor', 'thumbnail'),
        'menu_icon'           => 'dashicons-format-quote',
        'menu_position'       => 8,
        'show_in_rest'        => true,
        'rewrite'             => array('slug' => 'testimonials'),
    ));
}
add_action('init', 'schooletics_register_post_types');

/**
 * Register Custom Taxonomies
 */
function schooletics_register_taxonomies() {
    // Service Categories
    register_taxonomy('service_category', 'service', array(
        'labels' => array(
            'name'              => __('Service Categories', 'schooletics-core'),
            'singular_name'     => __('Service Category', 'schooletics-core'),
            'search_items'      => __('Search Service Categories', 'schooletics-core'),
            'all_items'         => __('All Service Categories', 'schooletics-core'),
            'parent_item'       => __('Parent Service Category', 'schooletics-core'),
            'parent_item_colon' => __('Parent Service Category:', 'schooletics-core'),
            'edit_item'         => __('Edit Service Category', 'schooletics-core'),
            'update_item'       => __('Update Service Category', 'schooletics-core'),
            'add_new_item'      => __('Add New Service Category', 'schooletics-core'),
            'new_item_name'     => __('New Service Category Name', 'schooletics-core'),
            'menu_name'         => __('Categories', 'schooletics-core'),
        ),
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'show_in_rest'      => true,
        'rewrite'           => array('slug' => 'service-category'),
    ));
    
    // Project Categories
    register_taxonomy('project_category', 'project', array(
        'labels' => array(
            'name'              => __('Project Categories', 'schooletics-core'),
            'singular_name'     => __('Project Category', 'schooletics-core'),
            'search_items'      => __('Search Project Categories', 'schooletics-core'),
            'all_items'         => __('All Project Categories', 'schooletics-core'),
            'parent_item'       => __('Parent Project Category', 'schooletics-core'),
            'parent_item_colon' => __('Parent Project Category:', 'schooletics-core'),
            'edit_item'         => __('Edit Project Category', 'schooletics-core'),
            'update_item'       => __('Update Project Category', 'schooletics-core'),
            'add_new_item'      => __('Add New Project Category', 'schooletics-core'),
            'new_item_name'     => __('New Project Category Name', 'schooletics-core'),
            'menu_name'         => __('Categories', 'schooletics-core'),
        ),
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'show_in_rest'      => true,
        'rewrite'           => array('slug' => 'project-category'),
    ));
    
    // Team Member Roles
    register_taxonomy('team_role', 'team', array(
        'labels' => array(
            'name'              => __('Team Roles', 'schooletics-core'),
            'singular_name'     => __('Team Role', 'schooletics-core'),
            'search_items'      => __('Search Team Roles', 'schooletics-core'),
            'all_items'         => __('All Team Roles', 'schooletics-core'),
            'parent_item'       => __('Parent Team Role', 'schooletics-core'),
            'parent_item_colon' => __('Parent Team Role:', 'schooletics-core'),
            'edit_item'         => __('Edit Team Role', 'schooletics-core'),
            'update_item'       => __('Update Team Role', 'schooletics-core'),
            'add_new_item'      => __('Add New Team Role', 'schooletics-core'),
            'new_item_name'     => __('New Team Role Name', 'schooletics-core'),
            'menu_name'         => __('Roles', 'schooletics-core'),
        ),
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'show_in_rest'      => true,
        'rewrite'           => array('slug' => 'team-role'),
    ));
}
add_action('init', 'schooletics_register_taxonomies');

/**
 * Register Meta Boxes
 */
function schooletics_register_meta_boxes() {
    // Service Meta Box
    add_meta_box(
        'service_details',
        __('Service Details', 'schooletics-core'),
        'schooletics_service_meta_box_callback',
        'service',
        'normal',
        'high'
    );
    
    // Project Meta Box
    add_meta_box(
        'project_details',
        __('Project Details', 'schooletics-core'),
        'schooletics_project_meta_box_callback',
        'project',
        'normal',
        'high'
    );
    
    // Team Member Meta Box
    add_meta_box(
        'team_details',
        __('Team Member Details', 'schooletics-core'),
        'schooletics_team_meta_box_callback',
        'team',
        'normal',
        'high'
    );
    
    // Testimonial Meta Box
    add_meta_box(
        'testimonial_details',
        __('Testimonial Details', 'schooletics-core'),
        'schooletics_testimonial_meta_box_callback',
        'testimonial',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'schooletics_register_meta_boxes');

/**
 * Service Meta Box Callback
 */
function schooletics_service_meta_box_callback($post) {
    wp_nonce_field('schooletics_service_meta_box', 'schooletics_service_meta_box_nonce');
    
    $icon = get_post_meta($post->ID, '_schooletics_service_icon', true);
    $short_description = get_post_meta($post->ID, '_schooletics_service_short_description', true);
    
    ?>
    <p>
        <label for="schooletics_service_icon"><?php _e('Service Icon (Font Awesome class)', 'schooletics-core'); ?></label><br>
        <input type="text" id="schooletics_service_icon" name="schooletics_service_icon" value="<?php echo esc_attr($icon); ?>" class="widefat">
        <span class="description"><?php _e('Enter Font Awesome icon class (e.g., fa-basketball-ball)', 'schooletics-core'); ?></span>
    </p>
    <p>
        <label for="schooletics_service_short_description"><?php _e('Short Description', 'schooletics-core'); ?></label><br>
        <textarea id="schooletics_service_short_description" name="schooletics_service_short_description" class="widefat" rows="3"><?php echo esc_textarea($short_description); ?></textarea>
    </p>
    <?php
}

/**
 * Project Meta Box Callback
 */
function schooletics_project_meta_box_callback($post) {
    wp_nonce_field('schooletics_project_meta_box', 'schooletics_project_meta_box_nonce');
    
    $client = get_post_meta($post->ID, '_schooletics_project_client', true);
    $location = get_post_meta($post->ID, '_schooletics_project_location', true);
    $completion_date = get_post_meta($post->ID, '_schooletics_project_completion_date', true);
    
    ?>
    <p>
        <label for="schooletics_project_client"><?php _e('Client', 'schooletics-core'); ?></label><br>
        <input type="text" id="schooletics_project_client" name="schooletics_project_client" value="<?php echo esc_attr($client); ?>" class="widefat">
    </p>
    <p>
        <label for="schooletics_project_location"><?php _e('Location', 'schooletics-core'); ?></label><br>
        <input type="text" id="schooletics_project_location" name="schooletics_project_location" value="<?php echo esc_attr($location); ?>" class="widefat">
    </p>
    <p>
        <label for="schooletics_project_completion_date"><?php _e('Completion Date', 'schooletics-core'); ?></label><br>
        <input type="date" id="schooletics_project_completion_date" name="schooletics_project_completion_date" value="<?php echo esc_attr($completion_date); ?>" class="widefat">
    </p>
    <?php
}

/**
 * Team Member Meta Box Callback
 */
function schooletics_team_meta_box_callback($post) {
    wp_nonce_field('schooletics_team_meta_box', 'schooletics_team_meta_box_nonce');
    
    $position = get_post_meta($post->ID, '_schooletics_team_position', true);
    $email = get_post_meta($post->ID, '_schooletics_team_email', true);
    $facebook = get_post_meta($post->ID, '_schooletics_team_facebook', true);
    $twitter = get_post_meta($post->ID, '_schooletics_team_twitter', true);
    $linkedin = get_post_meta($post->ID, '_schooletics_team_linkedin', true);
    $instagram = get_post_meta($post->ID, '_schooletics_team_instagram', true);
    
    ?>
    <p>
        <label for="schooletics_team_position"><?php _e('Position', 'schooletics-core'); ?></label><br>
        <input type="text" id="schooletics_team_position" name="schooletics_team_position" value="<?php echo esc_attr($position); ?>" class="widefat">
    </p>
    <p>
        <label for="schooletics_team_email"><?php _e('Email', 'schooletics-core'); ?></label><br>
        <input type="email" id="schooletics_team_email" name="schooletics_team_email" value="<?php echo esc_attr($email); ?>" class="widefat">
    </p>
    <p>
        <label for="schooletics_team_facebook"><?php _e('Facebook URL', 'schooletics-core'); ?></label><br>
        <input type="url" id="schooletics_team_facebook" name="schooletics_team_facebook" value="<?php echo esc_url($facebook); ?>" class="widefat">
    </p>
    <p>
        <label for="schooletics_team_twitter"><?php _e('Twitter URL', 'schooletics-core'); ?></label><br>
        <input type="url" id="schooletics_team_twitter" name="schooletics_team_twitter" value="<?php echo esc_url($twitter); ?>" class="widefat">
    </p>
    <p>
        <label for="schooletics_team_linkedin"><?php _e('LinkedIn URL', 'schooletics-core'); ?></label><br>
        <input type="url" id="schooletics_team_linkedin" name="schooletics_team_linkedin" value="<?php echo esc_url($linkedin); ?>" class="widefat">
    </p>
    <p>
        <label for="schooletics_team_instagram"><?php _e('Instagram URL', 'schooletics-core'); ?></label><br>
        <input type="url" id="schooletics_team_instagram" name="schooletics_team_instagram" value="<?php echo esc_url($instagram); ?>" class="widefat">
    </p>
    <?php
}

/**
 * Testimonial Meta Box Callback
 */
function schooletics_testimonial_meta_box_callback($post) {
    wp_nonce_field('schooletics_testimonial_meta_box', 'schooletics_testimonial_meta_box_nonce');
    
    $client_name = get_post_meta($post->ID, '_schooletics_testimonial_client_name', true);
    $client_position = get_post_meta($post->ID, '_schooletics_testimonial_client_position', true);
    $rating = get_post_meta($post->ID, '_schooletics_testimonial_rating', true);
    
    ?>
    <p>
        <label for="schooletics_testimonial_client_name"><?php _e('Client Name', 'schooletics-core'); ?></label><br>
        <input type="text" id="schooletics_testimonial_client_name" name="schooletics_testimonial_client_name" value="<?php echo esc_attr($client_name); ?>" class="widefat">
    </p>
    <p>
        <label for="schooletics_testimonial_client_position"><?php _e('Client Position/Company', 'schooletics-core'); ?></label><br>
        <input type="text" id="schooletics_testimonial_client_position" name="schooletics_testimonial_client_position" value="<?php echo esc_attr($client_position); ?>" class="widefat">
    </p>
    <p>
        <label for="schooletics_testimonial_rating"><?php _e('Rating (1-5)', 'schooletics-core'); ?></label><br>
        <select id="schooletics_testimonial_rating" name="schooletics_testimonial_rating" class="widefat">
            <option value="5" <?php selected($rating, '5'); ?>>5 Stars</option>
            <option value="4.5" <?php selected($rating, '4.5'); ?>>4.5 Stars</option>
            <option value="4" <?php selected($rating, '4'); ?>>4 Stars</option>
            <option value="3.5" <?php selected($rating, '3.5'); ?>>3.5 Stars</option>
            <option value="3" <?php selected($rating, '3'); ?>>3 Stars</option>
            <option value="2.5" <?php selected($rating, '2.5'); ?>>2.5 Stars</option>
            <option value="2" <?php selected($rating, '2'); ?>>2 Stars</option>
            <option value="1.5" <?php selected($rating, '1.5'); ?>>1.5 Stars</option>
            <option value="1" <?php selected($rating, '1'); ?>>1 Star</option>
        </select>
    </p>
    <?php
}

/**
 * Save Meta Box Data
 */
function schooletics_save_meta_box_data($post_id) {
    // Check if our nonce is set for each post type
    if (isset($_POST['schooletics_service_meta_box_nonce'])) {
        if (!wp_verify_nonce($_POST['schooletics_service_meta_box_nonce'], 'schooletics_service_meta_box')) {
            return;
        }
        
        if (isset($_POST['schooletics_service_icon'])) {
            update_post_meta($post_id, '_schooletics_service_icon', sanitize_text_field($_POST['schooletics_service_icon']));
        }
        
        if (isset($_POST['schooletics_service_short_description'])) {
            update_post_meta($post_id, '_schooletics_service_short_description', sanitize_textarea_field($_POST['schooletics_service_short_description']));
        }
    }
    
    if (isset($_POST['schooletics_project_meta_box_nonce'])) {
        if (!wp_verify_nonce($_POST['schooletics_project_meta_box_nonce'], 'schooletics_project_meta_box')) {
            return;
        }
        
        if (isset($_POST['schooletics_project_client'])) {
            update_post_meta($post_id, '_schooletics_project_client', sanitize_text_field($_POST['schooletics_project_client']));
        }
        
        if (isset($_POST['schooletics_project_location'])) {
            update_post_meta($post_id, '_schooletics_project_location', sanitize_text_field($_POST['schooletics_project_location']));
        }
        
        if (isset($_POST['schooletics_project_completion_date'])) {
            update_post_meta($post_id, '_schooletics_project_completion_date', sanitize_text_field($_POST['schooletics_project_completion_date']));
        }
    }
    
    if (isset($_POST['schooletics_team_meta_box_nonce'])) {
        if (!wp_verify_nonce($_POST['schooletics_team_meta_box_nonce'], 'schooletics_team_meta_box')) {
            return;
        }
        
        if (isset($_POST['schooletics_team_position'])) {
            update_post_meta($post_id, '_schooletics_team_position', sanitize_text_field($_POST['schooletics_team_position']));
        }
        
        if (isset($_POST['schooletics_team_email'])) {
            update_post_meta($post_id, '_schooletics_team_email', sanitize_email($_POST['schooletics_team_email']));
        }
        
        if (isset($_POST['schooletics_team_facebook'])) {
            update_post_meta($post_id, '_schooletics_team_facebook', esc_url_raw($_POST['schooletics_team_facebook']));
        }
        
        if (isset($_POST['schooletics_team_twitter'])) {
            update_post_meta($post_id, '_schooletics_team_twitter', esc_url_raw($_POST['schooletics_team_twitter']));
        }
        
        if (isset($_POST['schooletics_team_linkedin'])) {
            update_post_meta($post_id, '_schooletics_team_linkedin', esc_url_raw($_POST['schooletics_team_linkedin']));
        }
        
        if (isset($_POST['schooletics_team_instagram'])) {
            update_post_meta($post_id, '_schooletics_team_instagram', esc_url_raw($_POST['schooletics_team_instagram']));
        }
    }
    
    if (isset($_POST['schooletics_testimonial_meta_box_nonce'])) {
        if (!wp_verify_nonce($_POST['schooletics_testimonial_meta_box_nonce'], 'schooletics_testimonial_meta_box')) {
            return;
        }
        
        if (isset($_POST['schooletics_testimonial_client_name'])) {
            update_post_meta($post_id, '_schooletics_testimonial_client_name', sanitize_text_field($_POST['schooletics_testimonial_client_name']));
        }
        
        if (isset($_POST['schooletics_testimonial_client_position'])) {
            update_post_meta($post_id, '_schooletics_testimonial_client_position', sanitize_text_field($_POST['schooletics_testimonial_client_position']));
        }
        
        if (isset($_POST['schooletics_testimonial_rating'])) {
            update_post_meta($post_id, '_schooletics_testimonial_rating', sanitize_text_field($_POST['schooletics_testimonial_rating']));
        }
    }
}
add_action('save_post', 'schooletics_save_meta_box_data');

/**
 * Register Shortcodes
 */

// Services Shortcode
function schooletics_services_shortcode($atts) {
    $atts = shortcode_atts(array(
        'count' => 6,
        'category' => '',
        'columns' => 3,
    ), $atts);
    
    $args = array(
        'post_type' => 'service',
        'posts_per_page' => $atts['count'],
    );
    
    if (!empty($atts['category'])) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'service_category',
                'field' => 'slug',
                'terms' => explode(',', $atts['category']),
            ),
        );
    }
    
    $services = new WP_Query($args);
    
    ob_start();
    
    if ($services->have_posts()) :
        echo '<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-' . esc_attr($atts['columns']) . ' gap-8">';
        
        while ($services->have_posts()) : $services->the_post();
            $icon = get_post_meta(get_the_ID(), '_schooletics_service_icon', true);
            $short_description = get_post_meta(get_the_ID(), '_schooletics_service_short_description', true);
            ?>
            <div class="service-card bg-white rounded-lg shadow-md overflow-hidden">
                <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>" class="w-full h-48 object-cover">
                <?php endif; ?>
                <div class="p-6">
                    <?php if ($icon) : ?>
                        <div class="service-icon text-blue-600 mb-4">
                            <i class="fas <?php echo esc_attr($icon); ?>"></i>
                        </div>
                    <?php endif; ?>
                    <h3 class="text-xl font-bold mb-3"><?php the_title(); ?></h3>
                    <?php if ($short_description) : ?>
                        <p class="text-gray-700 mb-4"><?php echo esc_html($short_description); ?></p>
                    <?php else : ?>
                        <p class="text-gray-700 mb-4"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                    <?php endif; ?>
                    <a href="<?php the_permalink(); ?>" class="text-blue-600 font-semibold hover:text-blue-800">Learn More <i class="fas fa-arrow-right ml-1"></i></a>
                </div>
            </div>
            <?php
        endwhile;
        
        echo '</div>';
    endif;
    
    wp_reset_postdata();
    
    return ob_get_clean();
}
add_shortcode('schooletics_services', 'schooletics_services_shortcode');

// Projects Shortcode
function schooletics_projects_shortcode($atts) {
    $atts = shortcode_atts(array(
        'count' => 6,
        'category' => '',
        'columns' => 3,
    ), $atts);
    
    $args = array(
        'post_type' => 'project',
        'posts_per_page' => $atts['count'],
    );
    
    if (!empty($atts['category'])) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'project_category',
                'field' => 'slug',
                'terms' => explode(',', $atts['category']),
            ),
        );
    }
    
    $projects = new WP_Query($args);
    
    ob_start();
    
    if ($projects->have_posts()) :
        echo '<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-' . esc_attr($atts['columns']) . ' gap-6">';
        
        while ($projects->have_posts()) : $projects->the_post();
            $client = get_post_meta(get_the_ID(), '_schooletics_project_client', true);
            ?>
            <div class="work-item rounded-lg overflow-hidden shadow-md">
                <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>" class="w-full h-64 object-cover">
                <?php endif; ?>
                <div class="work-overlay p-6">
                    <div class="text-center text-white">
                        <h3 class="text-xl font-bold mb-2"><?php the_title(); ?></h3>
                        <?php if ($client) : ?>
                            <p class="mb-4"><?php echo esc_html($client); ?></p>
                        <?php endif; ?>
                        <a href="<?php the_permalink(); ?>" class="inline-block bg-white text-blue-600 font-bold py-2 px-4 rounded-lg hover:bg-blue-100 transition duration-300">View Details</a>
                    </div>
                </div>
            </div>
            <?php
        endwhile;
        
        echo '</div>';
    endif;
    
    wp_reset_postdata();
    
    return ob_get_clean();
}
add_shortcode('schooletics_projects', 'schooletics_projects_shortcode');

// Team Members Shortcode
function schooletics_team_shortcode($atts) {
    $atts = shortcode_atts(array(
        'count' => 4,
        'role' => '',
        'columns' => 4,
    ), $atts);
    
    $args = array(
        'post_type' => 'team',
        'posts_per_page' => $atts['count'],
    );
    
    if (!empty($atts['role'])) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'team_role',
                'field' => 'slug',
                'terms' => explode(',', $atts['role']),
            ),
        );
    }
    
    $team = new WP_Query($args);
    
    ob_start();
    
    if ($team->have_posts()) :
        echo '<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-' . esc_attr($atts['columns']) . ' gap-8">';
        
        while ($team->have_posts()) : $team->the_post();
            $position = get_post_meta(get_the_ID(), '_schooletics_team_position', true);
            $facebook = get_post_meta(get_the_ID(), '_schooletics_team_facebook', true);
            $twitter = get_post_meta(get_the_ID(), '_schooletics_team_twitter', true);
            $linkedin = get_post_meta(get_the_ID(), '_schooletics_team_linkedin', true);
            $instagram = get_post_meta(get_the_ID(), '_schooletics_team_instagram', true);
            ?>
            <div class="team-member bg-white rounded-lg shadow-md overflow-hidden">
                <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>" class="w-full h-64 object-cover">
                <?php endif; ?>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-1"><?php the_title(); ?></h3>
                    <?php if ($position) : ?>
                        <p class="text-blue-600 mb-3"><?php echo esc_html($position); ?></p>
                    <?php endif; ?>
                    <p class="text-gray-700 mb-4"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                    <div class="social-links flex space-x-3">
                        <?php if ($facebook) : ?>
                            <a href="<?php echo esc_url($facebook); ?>" class="text-gray-400 hover:text-blue-600"><i class="fab fa-facebook-f"></i></a>
                        <?php endif; ?>
                        <?php if ($twitter) : ?>
                            <a href="<?php echo esc_url($twitter); ?>" class="text-gray-400 hover:text-blue-400"><i class="fab fa-twitter"></i></a>
                        <?php endif; ?>
                        <?php if ($linkedin) : ?>
                            <a href="<?php echo esc_url($linkedin); ?>" class="text-gray-400 hover:text-blue-600"><i class="fab fa-linkedin-in"></i></a>
                        <?php endif; ?>
                        <?php if ($instagram) : ?>
                            <a href="<?php echo esc_url($instagram); ?>" class="text-gray-400 hover:text-pink-600"><i class="fab fa-instagram"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php
        endwhile;
        
        echo '</div>';
    endif;
    
    wp_reset_postdata();
    
    return ob_get_clean();
}
add_shortcode('schooletics_team', 'schooletics_team_shortcode');

// Testimonials Shortcode
function schooletics_testimonials_shortcode($atts) {
    $atts = shortcode_atts(array(
        'count' => 3,
        'columns' => 3,
    ), $atts);
    
    $args = array(
        'post_type' => 'testimonial',
        'posts_per_page' => $atts['count'],
    );
    
    $testimonials = new WP_Query($args);
    
    ob_start();
    
    if ($testimonials->have_posts()) :
        echo '<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-' . esc_attr($atts['columns']) . ' gap-8">';
        
        while ($testimonials->have_posts()) : $testimonials->the_post();
            $client_name = get_post_meta(get_the_ID(), '_schooletics_testimonial_client_name', true);
            $client_position = get_post_meta(get_the_ID(), '_schooletics_testimonial_client_position', true);
            $rating = get_post_meta(get_the_ID(), '_schooletics_testimonial_rating', true);
            ?>
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center mb-4">
                    <?php if (has_post_thumbnail()) : ?>
                        <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="<?php echo esc_attr($client_name); ?>" class="w-16 h-16 rounded-full object-cover mr-4">
                    <?php endif; ?>
                    <div>
                        <h4 class="text-lg font-bold"><?php echo esc_html($client_name); ?></h4>
                        <?php if ($client_position) : ?>
                            <p class="text-blue-600"><?php echo esc_html($client_position); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if ($rating) : ?>
                    <div class="text-yellow-400 mb-3">
                        <?php
                        $full_stars = floor($rating);
                        $half_star = ($rating - $full_stars) >= 0.5;
                        
                        for ($i = 1; $i <= 5; $i++) {
                            if ($i <= $full_stars) {
                                echo '<i class="fas fa-star"></i>';
                            } elseif ($i == $full_stars + 1 && $half_star) {
                                echo '<i class="fas fa-star-half-alt"></i>';
                            } else {
                                echo '<i class="far fa-star"></i>';
                            }
                        }
                        ?>
                    </div>
                <?php endif; ?>
                <p class="text-gray-700 italic"><?php the_content(); ?></p>
            </div>
            <?php
        endwhile;
        
        echo '</div>';
    endif;
    
    wp_reset_postdata();
    
    return ob_get_clean();
}
add_shortcode('schooletics_testimonials', 'schooletics_testimonials_shortcode');

/**
 * Add Shortcode Button to TinyMCE
 */
function schooletics_add_shortcode_button() {
    if (current_user_can('edit_posts') && current_user_can('edit_pages')) {
        add_filter('mce_external_plugins', 'schooletics_add_shortcode_plugin');
        add_filter('mce_buttons', 'schooletics_register_shortcode_button');
    }
}
add_action('admin_init', 'schooletics_add_shortcode_button');

function schooletics_add_shortcode_plugin($plugin_array) {
    $plugin_array['schooletics_shortcodes'] = schooletics_CORE_URL . 'js/shortcodes-button.js';
    return $plugin_array;
}

function schooletics_register_shortcode_button($buttons) {
    array_push($buttons, 'schooletics_shortcodes');
    return $buttons;
}

/**
 * Enqueue admin scripts and styles
 */
function schooletics_admin_scripts() {
    wp_enqueue_style('schooletics-admin-style', schooletics_CORE_URL . 'css/admin-style.css', array(), schooletics_CORE_VERSION);
    wp_enqueue_script('schooletics-admin-script', schooletics_CORE_URL . 'js/admin-script.js', array('jquery'), schooletics_CORE_VERSION, true);
}
add_action('admin_enqueue_scripts', 'schooletics_admin_scripts');

/**
 * Create required directories and files on plugin activation
 */
function schooletics_plugin_activation() {
    // Create directories if they don't exist
    $directories = array(
        schooletics_CORE_PATH . 'css',
        schooletics_CORE_PATH . 'js',
    );

    foreach ($directories as $directory) {
        if (!file_exists($directory)) {
            wp_mkdir_p($directory);
        }
    }
    
    // Create admin CSS file
    $admin_css = schooletics_CORE_PATH . 'css/admin-style.css';
    if (!file_exists($admin_css)) {
        $css_content = "/**\n * schooletics Core Admin Styles\n */\n\n.schooletics-meta-box label {\n    font-weight: bold;\n}\n\n.schooletics-meta-box .description {\n    font-style: italic;\n    color: #666;\n}";
        file_put_contents($admin_css, $css_content);
    }
    
    // Create admin JS file
    $admin_js = schooletics_CORE_PATH . 'js/admin-script.js';
    if (!file_exists($admin_js)) {
        $js_content = "/**\n * schooletics Core Admin Scripts\n */\n\njQuery(document).ready(function($) {\n    // Admin scripts here\n});";
        file_put_contents($admin_js, $js_content);
    }
    
    // Create shortcodes button JS file
    $shortcodes_js = schooletics_CORE_PATH . 'js/shortcodes-button.js';
    if (!file_exists($shortcodes_js)) {
        $js_content = "/**\n * schooletics Core Shortcodes Button\n */\n\n(function() {\n    tinymce.create('tinymce.plugins.schooleticsShortcodes', {\n        init: function(ed, url) {\n            ed.addButton('schooletics_shortcodes', {\n                title: 'schooletics Shortcodes',\n                icon: 'icon dashicons-awards',\n                onclick: function() {\n                    ed.windowManager.open({\n                        title: 'Insert schooletics Shortcode',\n                        body: [\n                            {\n                                type: 'listbox',\n                                name: 'shortcode',\n                                label: 'Select Shortcode',\n                                values: [\n                                    {text: 'Services', value: 'schooletics_services count=\"6\" columns=\"3\"'},\n                                    {text: 'Projects', value: 'schooletics_projects count=\"6\" columns=\"3\"'},\n                                    {text: 'Team Members', value: 'schooletics_team count=\"4\" columns=\"4\"'},\n                                    {text: 'Testimonials', value: 'schooletics_testimonials count=\"3\" columns=\"3\"'}\n                                ]\n                            }\n                        ],\n                        onsubmit: function(e) {\n                            ed.insertContent('[' + e.data.shortcode + ']');\n                        }\n                    });\n                }\n            });\n        },\n        createControl: function(n, cm) {\n            return null;\n        },\n    });\n    tinymce.PluginManager.add('schooletics_shortcodes', tinymce.plugins.schooleticsShortcodes);\n})();";
        file_put_contents($shortcodes_js, $js_content);
    }
}
register_activation_hook(__FILE__, 'schooletics_plugin_activation');