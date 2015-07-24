<?php
/*register menu items */

function fa_videos_admin_menu_setup(){

    add_submenu_page(
        'options-general.php',
        'FA Video Playlists Settings',
        'Video Playlists',
        'manage_options',
        'fa_videos',
        'fa_videos_admin_page_screen'
        );
}

add_action('admin_menu', 'fa_videos_admin_menu_setup');

/* display page content */
function fa_videos_admin_page_screen() {
    global $submenu;

    $page_data = array();
    foreach($submenu['options-general.php'] as $i => $menu_item) {
        if($submenu['options-general.php'][$i][2] == 'fa_videos'){
            $page_data = $submenu['options-general.php'][$i];
        }
    }

?>
<div class="wrap">
<?php screen_icon(); ?>
<h2><?php echo $page_data[3]  ?></h2> 
<form id="fa_videos_options" action="options.php" method="post">
    <?php
        settings_fields('fa_videos_options');
        do_settings_sections('fa_videos');
        submit_button('Save Options', 'primary', 'fa_videos_options_submit');
      ?>
</form>
</div>
<?php 

} 

/* settings link in plugin management screen */

function fa_videos_settings_link($actions, $file) {
    if(false !== strpos($file, 'fa-videos')){
        $actions['settings'] = '<a href="options-general.php?page=fa_videos">Settings </a>';
    }
    return $actions;
}

add_filter('plugin_action_links', 'fa_videos_settings_link', 2,2);

?>