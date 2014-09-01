<?php

namespace OpendojoTest\Entity;

class ImageTest extends \PHPUnit_Framework_TestCase {
    public function setUp() {

    }

    public function tearDown() {

    }

    public function testFienameSetterSetProperty() {
        $image = new Image();
        # fixture
        $filename = 'image.jpg';

        $image->setFilename($filename);
        $this->assertAttributeEquals($filename, 'filename', $image);
    }
}