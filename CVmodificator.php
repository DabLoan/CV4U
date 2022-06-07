<?php

include_once __DIR__ .'/vendor/tinybutstrong/opentbs/demo/tbs_class.php';
include_once __DIR__ .'/vendor/tinybutstrong/opentbs/tbs_plugin_opentbs.php';
include_once __DIR__ .'/CvInterface.php';


class CvCreator implements CV4UInterface{

    public function makeSureExt($photo){
        $extension = strtolower(pathinfo($photo, PATHINFO_EXTENSION));
        $good = array('jpg', 'png', 'jpeg');
        if(in_array($extension,$good)){
            return true;
        }
        else{
            throw new Exception('You did not upload a picture');
        }
    }
    public function createCV($data){
        $data = $data[0]+$data[1]['photo'];
        foreach ($data as $key => $value) {
            $GLOBALS[$key] = $value;
        }
        $TBS = new clsTinyButStrong;
        $TBS->Plugin(TBS_INSTALL, OPENTBS_PLUGIN);
        $TBS->loadTemplate('templateCV/'.$data['nomTemplate'].'.odt', OPENTBS_ALREADY_UTF8);
        // photo processing
        
        $imageContent =$this->getContentImg(file_get_contents($data['tmp_name']));
        $image = base64_decode($imageContent);
        file_put_contents($data['name'],$image);

        $TBS->Show(OPENTBS_FILE, $data['nomFichier'].'.odt');

        // ligne pour avoir le pdf 
        // file_put_contents($data['nomFichier'].".pdf",$this->odtToPdf('./'.$data['nomFichier'].'.odt',$data['nomFichier']));
    }   
    private function getTempDir(){
        $tmpname=tempnam(sys_get_temp_dir(),'php');
        unlink($tmpname);
        mkdir($tmpname);
        return $tmpname;
    }
    private function getContentImg($photo){
        return base64_encode($photo);
    }
    private function odtToPdf($pathToDoc, $outputName){
        $baseurl = getenv("FISCALYSE_DOCUMENTPROCESSOR_URL")?:'http://localhost:3000/';
        $client = new Client();
        $response = $client->request('POST', $baseurl.'CV4U/'.$outputName.'.pdf',[
            'multipart' => [
                [
                    'name'     => 'myFile',
                    'contents' => Psr7\Utils::tryFopen($pathToDoc, 'r')
                ]
            ]
        ]);
        return $response->getBody();
    }
}