<?php
/**
 * Created by PhpStorm.
 * User: rainx_000
 * Date: 01.11.2015
 * Time: 12:04
 */

namespace App;


class Noop
{
    public function __get($name)
    {
        return $this;
    }

    public function __set($name, $value)
    {
        return $this;
    }

    public function __call($name, $arguments)
    {
        return $this;
    }
}