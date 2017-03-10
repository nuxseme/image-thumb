<?php
/**
 * @author nuxseme
 * @license MIT-LICENSE
 * @copyright Copyright (c) 2017.
 */

namespace image;


use image\thumb\ThumbAbstract;

/**
 * Class Thumb
 * @package image
 */
class Thumb
{
    /**
     * @var ThumbAbstract
     */
    private $thumb;

    /**
     * Thumb constructor.
     * @param ThumbAbstract $thumb
     */
    public function __construct(ThumbAbstract $thumb)
    {
        $this->thumb = $thumb;
    }

    /**
     * 缩略
     */
    public function resize()
    {
        $this->thumb->resize();
    }
}