<?php

use PHPUnit\Framework\TestCase;

include_once __DIR__ .'/CvModificator.php';

class CVModificatorTest extends TestCase{
    public function testExtJPG(){
        $testRapport = new CvCreator();
        $test = $testRapport->makeSureExt("photo.jpg");
        $this->assertEquals(true, $test,"Bon format");
    }
    public function testExtJPEG(){
        $testRapport = new CvCreator();
        $test = $testRapport->makeSureExt("photo.jpeg");
        $this->assertEquals(true, $test,"Bon format");
    }
    public function testExtPNG(){
        $testRapport = new CvCreator();
        $test = $testRapport->makeSureExt("photo.png");
        $this->assertEquals(true, $test,"Bon format");
    }
}

?>