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
        return '60';
    }

    public function getType() {
        switch(pathinfo($this->filename,PATHINFO_EXTENSION)) {
            case 'jpg':
                return 'image/jpeg';
                break;
            case 'png':
                return 'image/png';
                break;
            case 'gif':
                return 'image/gif';
                break;
            default:
                throw new \Opendojo\Entity\Exception('Invalid Image Name',\Opendojo\Entity\Exception::INVALID_EXTENSION);
        }
        
    }
}