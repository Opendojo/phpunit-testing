<?php

namespace Opendojo\Service;
use Opendojo\Entity\Image;
use Opendojo\Entity\Image\Adapter\AdapterInterface;

class Resizer {
    protected $adapter;

    public function setAdapter($adapter) {
        $this->adapter = $adapter;
        return $this;
    }

    public function getAdapter() {
        return $this->adapter;
    }

    public function square(Image $image, $size){
        $origWidth = $image->getWidth();
        $origHeight = $image->getHeight();
        // Landscape
        if($origWidth > $origHeight) {
            $this->getAdapter()->resample($image, ($origWidth-$origHeight)/2, 0, $origHeight, $origHeight, 0, 0, $size, $size);    
        } else {
            $this->getAdapter()->resample($image, 0, ($origHeight-$origWidth)/2, $origWidth, $origWidth, 0, 0, $size, $size);
        }
        return $this;
    }
}