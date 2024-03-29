<?php

namespace OpendojoTest\Entity;

use org\bovigo\vfs\vfsStream;
use Opendojo\Entity\Image;
use Opendojo\Entity\Exception;

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
        vfsStream::setup();
        $rootDir = vfsStream::copyFromFileSystem(__DIR__.'/../_files/images/', null, 10000000);
        return [
            [$rootDir->url().'/image.jpg', 'image/jpeg'],
            [$rootDir->url().'/image.png', 'image/png'],
            [$rootDir->url().'/image.gif', 'image/gif']
        ];
    }

    /**
     * @dataProvider getImagesExceptions
     * @expectedException \Opendojo\Entity\Exception
     * @expectedExceptionCode \Opendojo\Entity\Exception::INVALID_EXTENSION
     */
    public function testImageTypeGetterThrowsExceptionForInvalidFilename($filename) {
        $image = new Image();
        $image->setFilename($filename);
        $image->getType();
    }

    public function getImagesExceptions(){
        return [
            ['image.bmp'],
            ['image.vnd'],
            ['image']
        ];        
    }
}