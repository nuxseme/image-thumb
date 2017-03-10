<?php


namespace image\tests;

use image\Thumb;
use image\thumb\GM;
use PHPUnit\Framework\TestCase;

class GMTest extends TestCase
{
    protected function setUp()
    {
        $command = 'gm -version';
        exec($command,$output, $return);
        if ($return) {
            $this->markTestSkipped(
                '未安装GM库'
            );
        }
    }

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