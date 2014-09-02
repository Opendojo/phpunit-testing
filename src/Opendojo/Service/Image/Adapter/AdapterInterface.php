<?php

namespace Opendojo\Service\Image\Adapter;

use Opendojo\Entity\Image;

interface AdapterInterface {
    public function resample(Image $image, $origX, $origY, $origWidth, $origHeight, $newX, $newY, $newWidth, $newHeight);
}