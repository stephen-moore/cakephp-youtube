<div class="main-content">

    <div class="row search-row">
        <div class="col-xs-12 col-md-6"><?= $this->Form->control('search', [
                'label' => false,
                'placeholder' => __('Search'),
                'class' => 'form-control col-xs-4'
            ]); ?>
        </div>
        <div class="col-xs-12 col-md-6"><?= $this->Form->button('Search', [
                'type' => 'submit',
                'id' => 'searchBtn',
                'class' => 'btn btn-info',
            ]); ?>
        </div>
    </div>

    <div class="container row">
        <div class="">
            <?php foreach($results->items as $key => $item) { ?>
                <div class="col-lg-4 col-md-6 col-xs-12 panel">
                    <a href="<?= $this->Url->build([
                        "controller" => "youtube",
                        "action" => "watch",
                        $item->id->videoId
                    ])?>" style="display: contents">
                        <div class="">
                            <img src="<?= __($item->snippet->thumbnails->medium->url) ?>" alt="" class="img-fluid">
                        </div>
                        <div class="">
                            <h3><?= __($item->snippet->title) ?></h3>
                            <p class="text-muted">Published:
                                <?= __(date('d M Y', strtotime($item->snippet->publishTime))) ?></p>
                            <p class=""><?= mb_strimwidth($item->snippet->description, 0, 100, "..."); ?></p>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<script>
    $('document').ready(function(){
        $('#searchBtn').click(function (e) {
            e.preventDefault();
            var searchkey = $('#search').val();
            searchTags( searchkey );
        });

        function searchTags( keyword ){
            var data = keyword;
            if (data)  {
                $.ajax({
                    method: 'get',
                    url : "<?php echo $this->Url->build( [ 'controller' => 'Youtube', 'action' => 'index'] ); ?>",
                    data: {keyword:data},
                    success: function( response )
                    {
                        $( '.main > .container' ).html(response);
                    }
                });
            }
        }

    });
</script>
