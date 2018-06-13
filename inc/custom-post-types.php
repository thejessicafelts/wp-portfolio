<?php

/* /////////////////////////////////////////////////////////////////////////////
//                                                                            //
//    Custom Post Types                                                       //
//                                                                            //
///////////////////////////////////////////////////////////////////////////// */

/* =============================================================================
    Projects
============================================================================= */

function create_projects(){
  $labels = array(
    'name'                        => __( 'Projects'                             ),
    'singular_name'               => __( 'Project'                              ),
    'menu_name'                   => __( 'Projects'                             ),
    'name_admin_bar'              => __( 'Projects'                             ),
    'archives'                    => __( 'Project Archives'                     ),
    'attributes'                  => __( 'Project Attributes'                   ),
    'parent_item_colon'           => __( 'Projects:'                            ),
    'all_items'                   => __( 'All Projects'                         ),
    'add_new_item'                => __( 'Add New Project'                      ),
    'add_new'                     => __( 'Add New Project'                      ),
    'new_item'                    => __( 'New Project'                          ),
    'edit_item'                   => __( 'Edit Project'                         ),
    'update_item'                 => __( 'Update Project'                       ),
    'view_item'                   => __( 'View Project'                         ),
    'view_items'                  => __( 'View Project'                         ),
    'search_items'                => __( 'Search Projects'                      ),
    'not_found'                   => __( 'No Projects Found'                    ),
    'not_found_in_trash'          => __( 'No Projects Found in Trash'           ),
    'featured_image'              => __( 'Featured Image'                       ),
    'set_featured_image'          => __( 'Set Featured Image'                   ),
    'remove_featured_image'       => __( 'Remove Featured Image'                ),
    'use_featured_image'          => __( 'Use as Featured Image'                ),
    'insert_into_item'            => __( 'Insert into Project'                  ),
    'uploaded_to_this_item'       => __( 'Upload to this Project'               ),
    'items_list'                  => __( 'Projects List'                        ),
    'items_list_navigation'       => __( 'Projects List Navigation'             ),
    'filter_items_list'           => __( 'Filter Projects List'                 ),
  );
  $args = array(
    'label'                       => __( 'Projects'                             ),
    'description'                 => __( 'List of Projects'                     ),
    'labels'                      => $labels,
    'supports'                    => array(
                                      'title',
                                      'page-attributes',
                                      'thumbnail'
                                    ),
    'taxonomies'                  => array(),
    'hierarchical'                => false,
    'public'                      => true,
    'show_ui'                     => true,
    'show_in_menu'                => true,
    'menu_icon'                   => 'dashicons-edit',
    'show_in_admin_bar'           => true,
    'show_in_nav_menus'           => true,
    'can_export'                  => true,
    'has_archive'                 => true,
    'exclude_from_search'         => false,
    'publically_queryable'        => true,
    'rewrite'                     => array(
      'slug'                      => 'projects',
    ),
    'capability_type'             => 'post',
  );
  register_post_type('projects', $args);
}
add_action('init', 'create_projects', 0);

add_action('acf/init', 'add_projects_field_group');
function add_projects_field_group() {

  // Project Information
  acf_add_local_field_group(
  array(
    'key'                         => 'projects_post-information',
    'title'                       => 'Project Information',
    'fields'                      => array(

      // Project Title
      array(
        'key'                     => 'project_title',
        'label'                   => 'Title',
        'name'                    => 'project_title',
        'type'                    => 'text',
        'instructions'            => '',
        'required'                => 0,
        'conditional_logic'       => 0,
        'wrapper'                 => array(
          'width'                 => '',
          'class'                 => '',
          'id'                    => '',
        ),
        'default_value'           => '',
        'placeholder'             => '',
        'prepend'                 => '',
        'append'                  => '',
        'maxlength'               => '',
        'readonly'                => 0,
        'disabled'                => 0,
      ),

      // Project Summary
      array(
        'key'                     => 'project_summary',
        'label'                   => 'Summary',
        'name'                    => 'project_summary',
        'type'                    => 'textarea',
        'instructions'            => 'Tweetable Summary<br>Limited to 211 characters',
        'required'                => 1,
        'conditional_logic'       => 0,
        'wrapper'                 => array(
          'width'                 => '',
          'class'                 => '',
          'id'                    => '',
        ),
        'default_value'           => '',
        'placeholder'             => '',
        'maxlength'               => 211,
        'rows'                    => 2,
        'new_lines'               => 'wpautop', // Also accepts 'br' and ''
        'readonly'                => 0,
        'disabled'                => 0,
      ),

    ),
    'location'                    => array(
      array(
        array(
          'param'                 => 'post_type',
          'operator'              => '==',
          'value'                 => 'projects',
        ),
      ),
    ),
    'menu_order'                  => 1,
    'position'                    => 'normal',
    'style'                       => 'default',
    'label_placement'             => 'left',
    'instruction_placement'       => 'label',
    'hide_on_screen'              => '',
    'active'                      => 1,
    'description'                 => '',
  ));

}

?>
