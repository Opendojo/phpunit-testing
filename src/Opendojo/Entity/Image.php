<?php

namespace Opendojo\Entity;
use Exception;

class Image {

    private $filename;

    public function setFilename($filename) {
        $this->filename = $filename;
        return $this;
    }

    public function getFilename() {
        return $this->filename;
    }

    public function getWidth() {
        return '120';
    }

    public function getHeight() {
        return '60';
    }

    public function getType() {
        $fileInfo = new \SplFileInfo($this->filename);
        return $fileInfo->getFileInfo();        
    }
}