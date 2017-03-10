<?php
/**
 * @author nuxseme
 * @license MIT-LICENSE
 * @copyright Copyright (c) 2017.
 */

namespace image\thumb;


/**
 * Class GM
 * @package image\thumb
 */
class GM extends ThumbAbstract
{

    /**
     * 原图片
     * @var
     */
    private $origin;
    /**
     * 目标图片（存储位置）
     * @var
     */
    private $target;
    /**
     * 缩略指定的宽度
     * @var
     */
    private $width;
    /**
     * 缩略指定的高度
     * @var
     */
    private $height;
    /**
     * 缩略指定的质量 默认100
     * @var
     */
    private $quality;

    public function __construct($origin, $target, $width, $height, $quality = 100)
    {
        $this->setOrigin($origin);
        $this->setTarget($target);
        $this->setWidth($width);
        $this->setHeight($height);
        $this->setQuality($quality);
    }

    /**
     * @param mixed $origin
     */
    private function setOrigin($origin)
    {
        if(!is_file($origin)) {
            throw new \InvalidArgumentException("origin [$origin] 参数无效");
        }
        if(!is_readable($origin)){
            throw new \InvalidArgumentException("$origin 文件不可读");
        }
        $this->origin = $origin;
    }

    /**
     * @param mixed $target
     */
    private function setTarget($target)
    {
        $dirname = dirname($target);
        if(!is_dir($dirname)) {
            mkdir($dirname,0775,true);
        }
        if(!is_writeable($dirname)) {
            throw new \InvalidArgumentException('文件目录不可写');
        }
        $this->target = $target;
    }

    /**
     * @param mixed $width
     */
    private function setWidth($width)
    {
        if(!is_numeric($width)) {
            throw new \InvalidArgumentException("width [$width] 参数无效");
        }
        $this->width = intval($width);
    }

    /**
     * @param mixed $height
     */
    private function setHeight($height)
    {
        if(!is_numeric($height)) {
            throw new \InvalidArgumentException("height [$height] 参数无效");
        }
        $this->height = intval($height);
    }

    /**
     * @param mixed $quality
     */
    private function setQuality($quality)
    {

        if(!is_numeric($quality)) {
            throw new \InvalidArgumentException("quality [$quality] 参数无效");
        }
        $this->quality = intval($quality);
    }

    /**
     *  缩略
     */
    public function resize()
    {
        if($this->quality == 100 ){
            $command = "gm convert  -thumbnail ".$this->width."x".$this->height."! $this->origin $this->target";
        }else{
            $command = "gm convert  -thumbnail ".$this->width."x".$this->height."! -quality $this->quality $this->origin $this->target";
        }
        exec($command, $output, $return);
        if($return) {
            throw new \Exception($command. ' exit with '.$return);
        }
    }
}