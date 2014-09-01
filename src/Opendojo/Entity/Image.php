<?php

namespace Opendojo\Entity;

class Image {

    private $filename;

    public function setFileName($filename) {
        $this->filename = $filename;
        return $this;
    }
}