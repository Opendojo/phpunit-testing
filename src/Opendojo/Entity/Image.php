<?php

namespace Opendojo\Entity;

class Image {

    private $filename;

    public function setFilename($filename) {
        $this->filename = $filename;
        return $this;
    }

    public function getFilename() {
        return $this->filename;
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
        }
        
    }
}