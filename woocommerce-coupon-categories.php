<?php

/*------------------------------------------------------------------*/
/*	Add a Category Taxonomy to default WooCommerce Coupons post_type
/*	Usage: just add to functions.php in your active theme
/*------------------------------------------------------------------*/

// Hook into the init action and call create_coupon_taxonomies when it fires
add_action( 'init', 'custom_create_coupons_hierarchical_taxonomy', 0 );

// Create a custom taxonomy for shop_coupon
function custom_create_coupons_hierarchical_taxonomy() {
  
  // Check if WooCommerce is active
  if ( class_exists( 'WooCommerce' ) ) {
    
    // Labels for the taxonomy
    $labels = array(
      'name' => _x( 'Coupon Category', 'taxonomy general name' ),
      'singular_name' => _x( 'Category', 'taxonomy singular name' ),
      'search_items' => __( 'Search Categories' ),
      'all_items' => __( 'All Categories' ),
      'parent_item' => __( 'Parent Category' ),
      'parent_item_colon' => __( 'Parent Category:' ),
      'edit_item' => __( 'Edit Category' ), 
      'update_item' => __( 'Update Category' ),
      'add_new_item' => __( 'Add New Category' ),
      'new_item_name' => __( 'New Category Name' ),
      'menu_name' => __( 'Categories' ),
    );    
    
    // Register the taxonomy for coupons
    register_taxonomy('coupon_cats', array('shop_coupon'), array(
      'hierarchical' => true,
      'labels' => $labels,
      'publicly_queryable' => false,
      'show_ui' => true,
      'show_in_rest' => false,
      'show_in_nav_menus' => false,
      'show_admin_column' => true,
      'query_var' => false,
      'rewrite' => array( 'slug' => 'custom-coupon-category' ),
    ));
  }
}
