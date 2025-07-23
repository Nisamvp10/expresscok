<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "home";
$route['about'] = "home/about";
$route['tracking'] = "home/tracking";
$route['tracking/(:any)'] = "home/tracking/$1";

$route['trackingnew'] = "home/trackingnew";
$route['pricing'] = "home/pricing";
$route['documents'] = "home/documents";
$route['services'] = "home/services";
$route['international'] = "home/international";
$route['parcel'] = "home/parcel";
$route['food'] = "home/food";
$route['cargo'] = "home/cargo";
$route['baggage'] = "home/baggage";
$route['medicine'] = "home/medicine";
$route['warehousing'] = "home/warehousing";
$route['airsea'] = "home/airsea";

$route['contact'] = "home/contact";
$route['join'] = "home/join";
$route['join/send-message'] = "home/send_join_message";
$route['tools'] = "home/tools";
$route['track_order']="home/track_id";
$route['track_order_home']="home/track_id_home";
$route['track_order1']="home/track_id_about";
$route['contact/send-message'] = "home/send_message";

$route['contact/send'] = "home/send_message";
$route['order/(:any)'] = "order/index/$1";



//seo
$route['sitemap\.xml'] = "seo/sitemap";

//admin start

$route['admin/user-login'] = "admin/user";
$route['admin'] = "admin/user";
$route['admin/dashboard'] = "admin/admin_index";
$route['admin/settings/users'] = "admin/admin_index/users";
$route['admin/settings/user/save'] = "admin/admin_index/save_user";
$route['admin/settings/users/edit'] = "admin/admin_index/edit_user";
$route['admin/settings/user/edit'] = "admin/admin_index/edit_user_save";
$route['admin/settings/users/delete'] = "admin/admin_index/delete_user";
$route['admin/settings/users/bulk-action'] = "admin/admin_index/user_bulk_action";
$route['admin/settings/users/status'] = "admin/admin_index/user_status";
$route['admin/settings/profile'] = "admin/admin_index/profile";
$route['admin/settings/profile/save-changes'] = "admin/admin_index/update_profile";
$route['admin/check-authentication'] = "admin/user/check_authentication";
$route['admin/user-logout'] = "admin/user/logout";
$route['admin/forgot-password'] = "admin/user/forgot_password";
$route['admin/check-user'] = "admin/user/check_user";
$route['admin/password-recovery/(:any)'] = "admin/user/password_recovery";
$route['admin/reset-password-submit'] = "admin/user/reset_password_submit";
$route['admin/reset-password']="admin/user/re_set_me";
$route['admin/slider-settings/slides'] = "admin/admin_index/media_controller/media_library/slides";
$route['admin/slider-settings/slides/(:num)'] = "admin/admin_index/media_controller/media_library/slides";
$route['admin/slider-settings/slides/save-slide-image'] = "admin/admin_index/media_save/media_library/slides";
$route['admin/posts/delete'] = "admin/admin_index/delete_post/posts";
$route['admin/slider-settings/slides/edit/(:num)'] = "admin/admin_index/edit_media/media_library/slides";
$route['admin/slider-settings/slides/edit-slide-image'] = "admin/admin_index/update_media/media_library/slides";
$route['admin/slider-settings/sliders'] = "admin/admin_index/sliders";
$route['admin/slider-settings/sliders/(:num)'] = "admin/admin_index/sliders";
$route['admin/slider-settings/sliders/save-slider'] = "admin/admin_index/save_sliders";
$route['admin/slider-settings/sliders/status'] = "admin/admin_index/post_status/posts";
$route['admin/slider-settings/sliders/edit'] = "admin/admin_index/edit_slider";
$route['admin/slider-settings/sliders/edit/update-slider'] = "admin/admin_index/update_slider/posts";
$route['admin/category/save'] = "admin/admin_index/save_category";
$route['admin/category/edit'] = "admin/admin_index/edit_category";
$route['admin/category/update'] = "admin/admin_index/update_category";


$route['admin/news_scroll/save'] = "admin/admin_index/save_news";
$route['admin/news_scroll/edit'] = "admin/admin_index/edit_news";
$route['admin/news_scroll/update'] = "admin/admin_index/update_news";
$route['admin/news_scroll/news'] = "admin/admin_index/news/news_scroll";
$route['admin/news_scroll/news/(:num)'] = "admin/admin_index/category/news_scroll";



$route['admin/category/sub-category/save'] = "admin/admin_index/save_subcategory";
$route['admin/category/sub-category/edit'] = "admin/admin_index/edit_subcategory";
$route['admin/category/sub-category/update'] = "admin/admin_index/update_subcategory";
$route['admin/products/category/status'] = "admin/admin_index/post_status/posts";
$route['admin/posts/bulk-action'] = "admin/admin_index/bulk_action/posts";
$route['admin/remove-image/(:any)'] = "admin/admin_index/remove_image/$1/$2";
$route['admin/bulk-action/(:any)'] = "admin/admin_index/bulk_action/$1";
$route['admin/content-editor/upload'] = "admin/admin_index/editor_upload";
$route['admin/web-settings/slider/(:any)'] = "admin/admin_index/save_home_slider";
$route['admin/library/data'] = "admin/admin_index/get_lib_data";
$route['admin/library/data/(:num)'] = "admin/admin_index/get_lib_data";
$route['admin/get-media-file'] = "admin/admin_index/get_media_file";
$route['admin/update-media-file'] = "admin/admin_index/update_media_file";
$route['admin/delete-media-file'] = "admin/admin_index/delete_media_file";
$route['admin/web-settings/(:any)'] = "admin/admin_index/save_page_settings";
$route['admin/seo-settings/(:any)'] = "admin/admin_index/seo_page_settings/$1/$2/$3";
$route['admin/global-seo-settings/posts/(:any)'] = "admin/admin_index/global_seo_settings/$1/$2/$3";
$route['admin/global-seo-settings/products/(:any)'] = "admin/admin_index/global_seo_settings/$1/$2/$3";

// products

$route['admin/products/category'] = "admin/admin_index/category/products";
$route['admin/products/category/(:num)'] = "admin/admin_index/category/products";


$route['admin/products/settings']="admin/admin_index/page_settings/products/home-settings/slider/products";



$route['admin/products/products'] = "admin/products/custom/products/products/products";
$route['admin/products/products/(:num)'] = "admin/products/custom/products/products/products";
$route['admin/products/products/save'] = "admin/products/custom_save/products/products/products";
$route['admin/products/delete'] = "admin/admin_index/delete_post/products";
$route['admin/products/products/status'] = "admin/admin_index/post_status/products";
$route['admin/products/products/display'] = "admin/admin_index/post_display/products/display";

$route['admin/products/products/edit'] = "admin/products/edit_custom/products/products/products";
$route['admin/products/products/category/(:num)'] = "admin/products/custom/products/products/products/$1";
$route['admin/products/products/category/(:num)/(:num)'] = "admin/products/custom/products/products/products/$1";
$route['admin/products/products/code/(:num)'] = "admin/products/custom/products/products/products/$1";
$route['admin/products/products/code/(:num)/(:num)'] = "admin/products/custom/products/products/products/$1";
$route['admin/products/products/name/(:any)'] = "admin/products/custom/products/products/products/$1";
$route['admin/products/products/name/(:any)/(:num)'] = "admin/products/custom/products/products/products/$1";
$route['admin/products/products/order_details/(:any)'] = "admin/products/order_details/$1/$2";
$route['admin/products/order_details/save'] = "admin/products/order_details_save/order_details";
$route['admin/products/order_details/edit'] = "admin/products/order_details_edit/$1";
$route['admin/products/order_details/edit_save'] = "admin/products/order_details_edit_save/order_details";


$route['admin/order_details/delete'] = "admin/admin_index/delete_post/order_details";




$route['admin/products/products/update-details'] = "admin/products/update_details";
$route['admin/products/products/update-images'] = "admin/products/update_p_img/products/products";
$route['admin/products/products/delete-image'] = "admin/products/delete_p_img/products/products";
$route['admin/products/products/update-author'] = "admin/products/update_author";

$route['admin/products/package'] = "admin/products/custom/products/package/package";
$route['admin/products/package/(:num)'] = "admin/products/package";
$route['admin/products/package/save'] = "admin/products/save_package";
$route['admin/package/delete'] = "admin/admin_index/delete_post/package";
$route['admin/products/package/status'] = "admin/admin_index/post_status/package";
$route['admin/products/package/edit'] = "admin/products/edit_custom/products/package/package";
$route['admin/products/package/get_all_products'] = "admin/products/get_all_products";


$route['admin/order'] = "admin/products/order";
$route['franchise'] = "home/franchise";

// End of products

/***************************** ADMIN END HERE   ******************************************************* ADMIN END HERE *******************************************************************/
/************************************ ADMIN END HERE   ************************************************ ADMIN END HERE *******************************************************************/
/********************************* ADMIN END HERE   *************************************************** ADMIN END HERE *******************************************************************/
/******************************* ADMIN END HERE   ***************************************************** ADMIN END HERE *******************************************************************/
/********************************* ADMIN END HERE   *************************************************** ADMIN END HERE *******************************************************************/
/********************************* ADMIN END HERE   *************************************************** ADMIN END HERE *******************************************************************/
/******************************** ADMIN END HERE   **************************************************** ADMIN END HERE *******************************************************************/


$route['images/(:any)'] = "home/images";
$route['admin/(:any)'] = 'admin/admin_index/nt_override';
//$route['(:any)'] = "home/frntend_404";
$route['404_override'] = 'home/frntend_404';



/* End of file routes.php */
/* Location: ./application/config/routes.php */