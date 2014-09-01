<?php

namespace OpendojoTest\Entity;

use \Opendojo\Entity\Image;

class ImageTest extends \PHPUnit_Framework_TestCase {
    public function setUp() {

    }

    public function tearDown() {

    }

    /**
     */
    public function testFluentInterfaceOnSetFileNameSetter() {
        $image = new Image();
        # fixture
        $filename = 'image.jpg';
        $this->assertSame($image,$image->setFilename($filename));
    }

    /**
     */
    public function testFilenameSetterSetProperty() {
        $image = new Image();
        # fixture
        $filename = 'image.jpg';

        $image->setFilename($filename);
        $this->assertAttributeEquals($filename, 'filename', $image);
    }

    public function testFilenameGetterGetProperty() {
        $image = new Image();
        # fixture
        $filename = 'image.jpg';

        $image->setFilename($filename);
        $this->assertEquals($filename,$image->getFileName());
    }

    /**
     * @dataProvider getImages
     * @param $filename string
     * @param $type string
     */
    public function testImageTypeGetter($filename, $type) {
        $image = new Image();
        $image->setFilename($filename);
        $this->assertEquals($type,$image->getType());   
    }

    public function getImages() {
        return [
            ['image.jpg', 'image/jpeg'],
            ['image.png', 'image/png'],
            ['image.gif', 'image/gif'],
            ['image.bmp', null]
        ];
    }
}