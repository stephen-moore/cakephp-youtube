<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Core\Configure;

class YoutubeTable extends Table
{
    var $useTable = false;

    public function getSingleVideo($id) {
        $endpoint = Configure::read('YoutubeConfig.endpoint');
        $apiKey = Configure::read('YoutubeConfig.api_key');

        $option = [
            'part' => ['snippet', 'statistics'],
            'id' => $id,
            'key' => $apiKey
        ];

        $url = "$endpoint/videos?".http_build_query($option, 'a', '&');
        $cleanedUrl = preg_replace('/%5B(\d+?)%5D/', '', $url);

        $result = $this->__apiRequest($cleanedUrl);

        return json_decode($result);
    }

    public function getVideos($searchTerm) {
        $endpoint = Configure::read('YoutubeConfig.endpoint');
        $apiKey = Configure::read('YoutubeConfig.api_key');

        $option = [
            'part' => 'snippet',
            'q' => $searchTerm,
            'type' => 'video',
            'relevanceLanguage' => 'en',
            'maxResults' => '12',
            'key' => $apiKey
        ];

        $url = "$endpoint/search?".http_build_query($option, 'a', '&');

        $result = $this->__apiRequest($url);
        return json_decode($result);
    }

    public function getRelatedVideos($id) {
        $endpoint = Configure::read('YoutubeConfig.endpoint');
        $apiKey = Configure::read('YoutubeConfig.api_key');

        $option = [
            'part' => 'snippet',
            'relatedToVideoId' => $id,
            'type' => 'video',
            'relevanceLanguage' => 'en',
            'key' => $apiKey
        ];

        $url = "$endpoint/search?".http_build_query($option, 'a', '&');
        $result = $this->__apiRequest($url);

        return json_decode($result);
    }

    protected function __apiRequest($url){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);

        if(preg_match('/^https:\/\//', $url)) {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        }

        $data = curl_exec($curl);
        curl_close($curl);

        return $data;
    }
}
