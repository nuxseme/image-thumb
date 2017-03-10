<?php


namespace image\tests;

use image\Thumb;
use image\thumb\GM;

class GMTest extends \PHPUnit_Framework_TestCase
{
    public function testResize()
    {
        $origin = __DIR__.'/../resource/origin/cat.png';
        $target = __DIR__.'/../resource/target/gm/100x100/cat.png';
        $gd = new GM($origin , $target, 100, 100);
        $thumb = new Thumb($gd);
        $thumb->resize();
        $this->assertFileExists($target);
    }
}