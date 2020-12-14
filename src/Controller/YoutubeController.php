<?php
declare(strict_types=1);

namespace App\Controller;

class YoutubeController extends AppController
{
    public function index() {
        $query = $this->request->getQuery('keyword');
        $results = $this->Youtube->getVideos($query);

        $this->set('results', $results);
    }

    /**
     * @param $id
     */
    public function watch($id)
    {
        $video = $this->Youtube->getSingleVideo($id);
        $related = $this->Youtube->getRelatedVideos($id);

        $this->set(compact('video', 'related'));

    }
}
