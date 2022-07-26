<?php

function getAdminAsset($asset)
{
    return asset('admin_assests/' . $asset);
}


function clean($string, $replace = '-')
{
    $string = str_replace(' ', $replace, $string); // Replaces all spaces with hyphens.
    $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
}
