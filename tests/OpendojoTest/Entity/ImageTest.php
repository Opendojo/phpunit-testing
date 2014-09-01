<?php

namespace OpendojoTest\Entity;

use \Opendojo\Entity\Image;

class ImageTest extends \PHPUnit_Framework_TestCase {
    public function setUp() {

    }

    public function tearDown() {

    }

    public function testFluentInterfaceOnSetFileNameSetter() {
        $image = new Image();
        # fixture
        $filename = 'image.jpg';
        $this->assertSame($image,$image->setFilename($filename));
    }

    public function testFienameSetterSetProperty() {
        $image = new Image();
        # fixture
        $filename = 'image.jpg';

        $image->setFilename($filename);
        $this->assertAttributeEquals($filename, 'filename', $image);
    }

    
}