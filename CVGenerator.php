<?php


include_once __DIR__ .'/CvModificator.php';


class CvGenerator{


    public function createCv($donnees){
        $rapportAd = new CvCreator();
        try{
            $rapportAd->makeSureExt($donnees[1]['photo']['name']);
            $rapportAd->createCV($donnees);
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
}

// 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
