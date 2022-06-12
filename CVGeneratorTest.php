<?php

use PHPUnit\Framework\TestCase;

include_once __DIR__ .'/CvGenerator.php';

class CVGeneratorTest extends TestCase{
    public function testCv(){
        $test = new CvGenerator();
        $donnees["nom"] = "Loan";
        $try = $test->startCv($donnees);
        $this->assertEquals(null, $try);
    }
}

?>