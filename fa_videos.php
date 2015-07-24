<?php

/*
Plugin Name: FA Videos
Plugin URI: http://www.fullyaccountable.com
Description: This plugin is for embedding video playlists from Youtube or Wistia.
Author: Michael Miller
Author URI: http://michael-miller.org/
Version: 0.0.1

FA Video WordPress Plugin
Copyright (C) 2015 Michael Miller (millermichael76@gmail.com)

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
define('FA_VIDEOS_DIR', plugin_dir_path(__FILE__));
define('FA_VIDEOS_DIR', plugin_dir_url(__FILE__));

function fa_videos_load(){
    if(is_admin()){
        require_once(FA_VIDEOS_DIR.'includes/admin.php');
    }

    require_once(FA_VIDEOS_DIR.'includes/core.php');
}

fa_videos_load();

function get_youtube_playlist($play_list_id) {

    $auth_key = '';
    $play_list_id = 'PLgKXmNKiHvpWsB3Hjch2yBsN4WLQuw-S9';
    $max_results = '3'; //integer between 0 and 50

    $ch = cur_init('https://www.google.com/youtube/v3/playlistItems?part=snippet&maxResults='.$maxResults.'&playlistId='.$play_list_id.'fields=items%2CnextPageToken%2CprevPageToken&key='.$auth_key);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $results = curl_exec($ch);
    if(curl_errno($ch)) {
        throw new Exception(curl_error($ch));
    }
    return $result;
}

function fa_youtube_playlist(){
    //do something here.
    try{
        $results = json_decode(get_youtube_playlist());
    } catch(Exception $e) {
        
    }


    $results = json_decode($results);

    $nextPage = $results['nextPageToken'];
    $items = $results
}


/* shortcodes here*/
add_shortcode('youtube_playlist', 'fa_youtube_playlist');