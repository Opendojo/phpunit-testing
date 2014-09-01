<?php

namespace OpendojoTest\Service\Image;

use Opendojo\Service\Resizer;
use Opendojo\Entity\Image;
use Opendojo\Service\Image\Adapter\AdapterInterface;

class ResizeTest extends \PHPUnit_Framework_TestCase {

    public function getCalls() {
        $image = $this->getMock('Opendojo\Entity\Image');
        $adapter = $this->getMock('Opendojo\Service\Image\Adapter\AdapterInterface');
        return [
            ['square', [$image,60]],
            ['setAdapter', [$adapter]]
        ];
    }
    /**
     * @dataProvider getCalls
     */
    public function testFluentInterface($method, $args) {
        $resizer = new Resizer();
        $this->assertSame($resizer, call_user_func_array([$resizer, $method], $args));
    }

    public function testAdapterSetter() {
        $adapter = $this->getMock('RTBF\Service\Image\Adapter\AdapterInterface');
        $service = new Resizer();
        $service->setAdapter($adapter);
        $this->assertAttributeEquals($adapter,'adapter',$service);
    }

    public function testSquareCropImageBasedOnOriginalSize() {
        $image = $this->getMock('Opendojo\Entity\Image');
        $image->expects($this->once())
            ->method('getwidth')
            ->will($this->returnValue(120));
        $resizer = new Resizer();
        $resizer->square($image, 60);
    }
}