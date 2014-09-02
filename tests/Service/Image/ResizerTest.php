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
//            ['square', [$image,60]],
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

    public function testGetAdapterSetter() {
        $adapter = $this->getMock('RTBF\Service\Image\Adapter\AdapterInterface');
        $service = new Resizer();
        $service->setAdapter($adapter);
        $this->assertSame($adapter,$service->getAdapter());
    }

    public function getImageToSquare(){
        return 
        [
            [
                ['x'=>0,'y'=>0,'width'=>120,'height'=>60], ['x'=>0,'y'=>0,'size'=>60]
            ],
            [
                ['x'=>50,'y'=>0,'width'=>200,'height'=>100],['x'=>0,'y'=>0,'size'=>99]
            ],
            [
                ['x'=>0,'y'=>0,'width'=>60,'height'=>120],['x'=>0,'y'=>0,'size'=>25]
            ],
            [
                ['x'=>0,'y'=>50,'width'=>100,'height'=>200],['x'=>0,'y'=>0,'size'=>40]
            ]
        ];
    }

    /**
     * @dataProvider getImageToSquare
     */
    public function testSquareCropImageBasedOnOriginalSize($origHash,$destHash) {
        $image = $this->getMock('Opendojo\Entity\Image');
        $image->expects($this->once())
            ->method('getwidth')
            ->will($this->returnValue($origHash['width']));
        $image->expects($this->once())
            ->method('getHeight')
            ->will($this->returnValue($origHash['height']));

        if($origHash['width']>$origHash['height']) {
            $side = $origHash['height'];
        } else {
            $side = $origHash['width'];
        }

        $adapter = $this->getMock('Opendojo\Service\Image\Adapter\AdapterInterface');
        $adapter->expects($this->once())
            ->method('resample')
            ->with($image,$origHash['x'],$origHash['y'],$side,$side,$destHash['x'],$destHash['y'],$destHash['size'],$destHash['size'])
            ->will($this->returnSelf());

        $resizer = new Resizer();
        $resizer->setAdapter($adapter);
        $resizer->square($image, 60);
    }
}