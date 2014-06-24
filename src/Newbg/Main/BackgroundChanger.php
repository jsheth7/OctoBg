<?php

namespace Newbg\Main;
use Goutte\Client;

class BackgroundChanger {

    protected $crawler;
    protected $baseUrl;
    protected $downloadFolder;
    protected $randomImageInfo;

    public function __construct($downloadFolder = '/tmp/octobg'){
        $this->initDloadFolder($downloadFolder);
        $this->init();
    }

    /**
     * Main function that downloads a random Octocat, caches it,
     * and switched the background
     */
    public function go(){
        $this->crawler = $this->client->request('GET', $this->baseUrl);

        $this->randomImageInfo = $this->getRandomImageInfo();
        $localFile = $this->fetchAndSaveImage();
        $this->switchBg($localFile);
    }

    /**
     * Initialize download folder
     * @param $downloadFolder
     */
    protected function initDloadFolder($downloadFolder){
        if(! is_dir($downloadFolder) ){
            mkdir($downloadFolder);
        }

        $imageFolder = $downloadFolder . '/images';
        if(! is_dir($imageFolder) ){
            mkdir($imageFolder );
        }

        $this->downloadFolder = $downloadFolder;
    }

    protected function init(){
        $this->client = new Client();
        $this->baseUrl = 'https://octodex.github.com/';

    }

    /**
     * @return array
     */
    protected function getRandomImageInfo(){
        $images = array();

        // Get the latest post in this category and display the titles
        $this->crawler->filter('div.shell img')->each(function ($node) use(&$images) {
            $image = $node->attr('data-src');
            //echo  $image . "\n";
            $images[] = $image;
        });

        //print_r($images);

        $randImgKey = array_rand($images, 1);
        $partialImgPath = $images[$randImgKey];

        $randomImageUrl = rtrim($this->baseUrl, "/")  . $partialImgPath;
        return array('partial' => $partialImgPath, 'full' => $randomImageUrl);
    }

    protected function fetchAndSaveImage(){
        $localFile = $this->downloadFolder . $this->randomImageInfo['partial'];

        if( file_exists($localFile) ){
            echo "cached file exists: $localFile\n";
        }
        else{
            echo "Downloading {$this->randomImageInfo['full']}\n";
            $randomImageBinary = file_get_contents($this->randomImageInfo['full']);
            file_put_contents($localFile, $randomImageBinary);
            echo "Wrote file to $localFile\n";
        }

        return $localFile;
    }

    /**
     * FIXME - only works on Mac
     * @param $localFile
     */
    protected function switchBg($localFile){
        echo "Switching background to $localFile\n";
        exec('/usr/bin/osascript -e \'tell app "Finder" to set desktop picture to POSIX file "' . $localFile . '"\'');
    }

} 