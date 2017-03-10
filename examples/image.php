<?php

spl_autoload_register(
    function($class) {
        static $classes = null;
        if ($classes === null) {
            $classes = array(
                'image\\thumb' => '/src/Thumb.php',
                'image\\thumb\\gd' => '/src/thumb/GD.php',
                'image\\thumb\\gm' => '/src/thumb/GM.php',
                'image\\thumb\\thumbabstract' => '/src/thumb/ThumbAbstract.php',
            );
        }
        $cn = strtolower($class);
        if (isset($classes[$cn])) {
            require __DIR__ .'/..'. $classes[$cn];
        }
    },
    true,
    false
);
require '../vendor/autoload.php';

$origin = __DIR__.'/../resource/origin/cat.png';
$target = __DIR__.'/../resource/target/gd/100x100/cat.png';
$gd = new \image\thumb\GD($origin , $target, 100, 100);
//$gm = new \image\thumb\GM($origin , $target, 100, 100);
$thumb = new \image\Thumb($gd);
$thumb->resize();
