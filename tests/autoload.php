<?php
/**
 * @author nuxseme
 * @license MIT-LICENSE
 * @copyright Copyright (c) 2017.
 */

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