<?php

if (! function_exists('convertLinkGoogleDrive')) {
    function convertLinkGoogleDrive($url)
    {
        return preg_replace('/\/view(.*)/', '/preview', $url);

    }
}