<?php

namespace Eyuva\Camcorder;


class Camcorder
{
    protected $fps;

    public function __construct()
    {
        $this->fps = config('camcorder.fps',25);
    }

    public function addImage($path, $duration = 1){
        //
    }

    public function addAudio($path)
    {
        //
    }

    public function generate()
    {
        //
    }
}