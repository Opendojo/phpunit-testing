<?php

namespace Opendojo\Service;
use Opendojo\Entity\Image;

class Resizer {
    protected $adapter;

    public function setAdapter($adapter) {
        $this->adapter = $adapter;
        return $this;
    }

    public function square(Image $image, $size){
        $width = $image->getWidth();
        return $this;
    }
}