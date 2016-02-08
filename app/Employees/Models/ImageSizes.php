<?php
/**
 * Created by PhpStorm.
 * User: rainx_000
 * Date: 16.11.2015
 * Time: 21:26
 */

namespace App\Employees\Models;

class ImageSizes
{
    static public $possibleSizes = [
        '640x480',
        '1024x768',
        '1280x960',
        '1680x1050',
        '1920x1080',
    ];
    private $size;
    private $sizeArr;

    public function __construct($size)
    {
        if ( !in_array($size, self::$possibleSizes) ) {
            throw new \Exception('Wrong sizes parameters');
        }
        $this->size    = $size;
        $this->sizeArr = explode('x', $size);

    }

    public function getWidth()
    {
        if ( isset($this->sizeArr[0]) ) {
            return $this->sizeArr[0];
        }

        return false;
    }

    public function getHeight()
    {
        if ( isset($this->sizeArr[1]) ) {
            return $this->sizeArr[1];
        }

        return null;
    }

    public function __toString()
    {
        return $this->getWidth().'x'.$this->getHeight();
    }
}