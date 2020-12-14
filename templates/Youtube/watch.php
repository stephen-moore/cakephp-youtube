<div class="container">
        <div class="row">
            <div class="col-xs-8">
                <div class="card" style="width: 100%">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe src="https://www.youtube.com/embed/<?= $video->items[0]->id ?>" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="card-body">
                        <div class="col-xs-12">
                            <h1><?= $video->items[0]->snippet->title ?></h1>
                        </div>
                        <div class="col-md-6">
                            <p class="text-secondary">
                                <?= $video->items[0]->statistics->viewCount . ' Views | ' ?>
                                <?= date('d M Y', strtotime($video->items[0]->snippet->publishedAt)) ?>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <?= $video->items[0]->statistics->likeCount . ' Likes | '; ?>
                            <?= $video->items[0]->statistics->dislikeCount . ' Dislikes' ;?>
                        </div>
                        <div class="col-xs-12">
                            <hr>
                            <p><?= nl2br($video->items[0]->snippet->description) ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-4">
                <div>
                        <?php foreach($related->items as $key => $item) {
                            if (empty($item->snippet)) {
                                continue;
                            }?>

                        <div class="col-xs-12">
                            <a href="<?= $this->Url->build([
                                "controller" => "youtube",
                                "action" => "watch",
                                $item->id->videoId
                            ])?>">
                                <div class="card mb-4">
                                    <img src="<?= $item->snippet->thumbnails->medium->url ?>" alt="">
                                    <div class="card-body">
                                        <h5><?= $item->snippet->title ?></h5>
                                    </div>
                                    <div class="card-footer text-muted">
                                        Published: <?= date('d M Y', strtotime($item->snippet->publishTime)) ?>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php } ?>
                </div>
            </div>
        </div>
    </div>
