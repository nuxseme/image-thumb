image-thumb [![Build Status](https://travis-ci.org/nuxseme/image-thumb.svg?branch=master)](https://travis-ci.org/nuxseme/image-thumb)

    $origin = __DIR__.'/../resource/origin/cat.png';
    $target = __DIR__.'/../resource/target/gd/100x100/cat.png';
    $gd = new \image\thumb\GD($origin , $target, 100, 100);
    //$gm = new \image\thumb\GM($origin , $target, 100, 100);
    $thumb = new \image\Thumb($gd);
    $thumb->resize();