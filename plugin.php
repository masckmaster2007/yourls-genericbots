<?php
/*
Plugin Name: GenericBots
Plugin URI: https://github.com/masckmaster2007/yourls-genericbots
Description: Allows URLs with a maximum of 4 numbers at the end. Others are sus requests...
Version: 1.0
Author: DimisAIO
Author URI: https://dimisaio.x10.mx
*/

// Hook into the 'shunt_add_new_link' filter
yourls_add_filter('shunt_add_new_link', 'check_custom_url_regex');

function check_custom_url_regex($false, $url, $keyword) {
    // Extract the custom URL (short URL) from the full URL
    $short_url = YOURLS_SITE . '/' . $keyword;

    // The regex pattern to allow custom URLs with a maximum of 4 numbers at the end
    $regex_pattern = "/\d{5,}\b/m";

    // Check if the custom URL matches the regex pattern
    if (!preg_match_all($regex_pattern, $short_url)) {
        return $false;
} else {
        return array(
            'status' => 'fail',
            'code' => 'error:spam',
            'message' => 'Beep Boop ntm',
            'errorCode' => '403',
        );
}
}
