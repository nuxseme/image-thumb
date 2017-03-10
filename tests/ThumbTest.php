<?php
/**
 * @author nuxseme
 * @license MIT-LICENSE
 * @copyright Copyright (c) 2017.
 */

namespace image\tests;


use image\Thumb;
use image\thumb\GD;

class ThumbTest extends \PHPUnit_Framework_TestCase
{
    public function testResize()
    {
        $origin = __DIR__.'../../resource/origin/cat.png';
        $target = __DIR__.'../../resource/target/100x100/cat.png';
        $gd = new GD($origin , $target, 100, 100);
        $thumb = new Thumb($gd);
        $thumb->resize();
    }
}