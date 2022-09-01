<form id="generalVideos" method="post">
    <input type="hidden" value="generalVideos" name="form" form="generalVideos" />
</form>
<form id="addVideo" method="POST">
</form>
<div class="uk-grid">
    <div class="uk-width-1-1">
        <div class="uk-card">
            <div class="uk-card-header">
                <div class="uk-grid">
                    <div class="uk-width-1-2">
                        <span class="card-title">Videos ( <?= count($this->videos) ?> )</span>
                    </div>
                    <div class="uk-width-1-2 uk-text-right">
                        <button style="display: none;" class="uk-button uk-button-primary videosEditMode" form="generalVideos" name="action" onclick="return confirm('Are you sure')" value="makeBannerVideo" type="submit">
                            Main Site Banner
                        </button>
                        <button style="display: none;" class="uk-button uk-button-danger videosEditMode" form="generalVideos" name="action" onclick="return confirm('Are you sure')" value="delete" type="submit">
                            <span class="fa fa-trash"></span>
                        </button>
                        <button class="uk-button uk-button-primary" href="#addVideoModal" uk-toggle>
                            <span class="fa fa-plus"></span>
                        </button>
                        <button class="uk-button uk-button-default" onclick="$('.videosEditMode').toggle()"><span class="fa fa-edit"></span></button>
                    </div>
                </div>
            </div>
            <div class="uk-card-body">
                <form id="deleteImage" method="POST">
                    <?php
                    $data = paginator::paginate($this->videos, 20, $this->currentPage);
                    $count = $data[1];
                    $data = $data[0];
                    ?>
                    <div class="uk-grid" data-uk-lightbox="toggle:a.uk-position-cover" data-uk-grid>
                        <?php foreach($data as $key => $value): ?>
                            <div class="uk-width-1-2 uk-width-1-4">
                                <div class="uk-grid-collapse uk-grid uk-grid-medium uk-flex uk-flex-middle" data-uk-grid>
                                    <div class="uk-width-1-1@s uk-width-1-1@m uk-height-1-1">
                                        <div class="uk-inline uk-inline-clip uk-transition-toggle " style="width: 100%">
                                            <img src="<?= loadmedia::youtubeThumb($value['youtube_id']) ?>" alt="" style="width: 100%">
                                            <div class="uk-transition-fade uk-position-cover uk-overlay uk-overlay-primary uk-flex uk-flex-center uk-flex-middle">
                                                <div class="uk-transition-fade uk-position-center">
                                                    <span uk-overlay-icon></span>
                                                </div>
                                                <a href="<?= loadmedia::youtubeEmbed($value['youtube_id']) ?>" class="uk-position-cover" data-type="iframe"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-text-center videosEditMode" style="display: none;">
                                    <input type="checkbox" name="videos[]" value="<?= $value['id']; ?>" form="generalVideos" /> 
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="uk-text-center uk-padding">
                        <?php paginator::view($count, $this->currentPage, "videos", ''); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>



<div id="addVideoModal" uk-modal="">
    <div class="uk-modal-dialog">
        <div class="uk-modal-header">
            <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
            <h4 class="uk-modal-title">Add Videos</h4>
        </div>
        <div class="uk-modal-body">
                <div class="uk-grid">
                    <label class="uk-width-2-5">Youtube Video Title:</label>
                    <input type="text" name="title" form="addVideo" class="uk-input uk-width-3-5"/>
                </div>
                <div class="uk-grid">
                    <label class="uk-width-2-5">Youtube Video Link:</label>
                    <input type="text" name="link" form="addVideo" class="uk-input uk-width-3-5"/>
                </div>
        </div>
        <div class="uk-modal-footer">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
            <button class="uk-button uk-button-primary" type="submit" name="form" value="addVideo" form="addVideo" >
                <span class="fa fa-save"></span> ADD
            </button>
        </div>
    </div>
</div>