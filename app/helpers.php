<?php
//create rundom directories
if (!function_exists('rand_path')) {
    function rand_path()
    {
        $hash = Illuminate\Support\Str::random(4);

        $dir1 = substr($hash, 0, 2);
        $dir2 = substr($hash, 2, 2);

        return strtolower($dir1 . DIRECTORY_SEPARATOR . $dir2);
    }
}