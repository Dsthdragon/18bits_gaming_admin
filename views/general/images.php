<form id="addImageForm" method="POST" enctype="multipart/form-data" style="display: none" >
    <input type="hidden" value="addImageForm" name="form" form="addImageForm"/>
    <input type="file" name="file_param[]" accept="image/*" form="addImageForm" id="addImageInput" onchange="$('#addImage').click()" multiple/>
    <button class="btn blue" id="addImage" form="addImageForm" type="submit"></button>
</form>
<form id="generalImages" method="post">
    <input type="hidden" value="generalImages" name="form" form="generalImages" />
</form>
<div class="uk-grid">
    <div class="uk-width-1-1">
        <div class="uk-card">
            <div class="uk-card-header">
                <div class="uk-grid">
                    <div class="uk-width-1-2">
                        <span class="card-title">Images ( <?= count($this->images) ?> )</span>
                    </div>
                    <div class="uk-width-1-2 uk-text-right">
                        <button style="display: none;" class="uk-button uk-button-primary imagesEditMode" form="generalImages" name="action" onclick="return confirm('Are you sure')" value="makeBanner" type="submit">
                            Main Site Banner
                        </button>
                        <button style="display: none;" class="uk-button uk-button-danger imagesEditMode" form="generalImages" name="action" onclick="return confirm('Are you sure')" value="delete" type="submit">
                            <span class="fa fa-trash"></span>
                        </button>
                        <button style="display: none;" class="uk-button green white-text imagesEditMode" form="generalImages" name="action" onclick="return confirm('Are you sure')" value="save" type="submit">
                            <span class="fa fa-save"></span>
                        </button>
                        <button class="uk-button purple white-text" onclick="$('#addImageInput').click()">
                            <span class="fa fa-upload"></span>
                        </button>
                        <button class="uk-button uk-button-default" onclick="$('.imagesEditMode').toggle()"><span class="fa fa-edit"></span></button>
                    </div>
                </div>
            </div>
            <div class="uk-card-body">
                <form id="deleteImage" method="POST">
                <?php
                $data = paginator::paginate($this->images, 20, $this->currentPage);
                $count = $data[1];
                $data = $data[0];
                ?>
                <div class="uk-grid" data-uk-lightbox="toggle:a.uk-position-cover" data-uk-grid>
                    <?php foreach($data as $key => $value): ?>
                        <div class="uk-width-1-2 uk-width-1-4">
                            <div class="uk-text-center imagesEditMode" style="display: none;">
                                <input type="text" class="uk-input" name="titles[<?= $value['id']; ?>]" value="<?= $value['title']; ?>" form="generalImages" placeholder="Enter Title" /> 
                            </div>
                            <h6 class="imagesEditMode"><?= ($value['title']) ? $value['title'] : "No Title"; ?></h6>
                            <div class="uk-grid-collapse uk-grid uk-grid-medium uk-flex uk-flex-middle" data-uk-grid>
                                <div class="uk-width-1-1@s uk-width-1-1@m uk-height-1-1">
                                    <div class="uk-inline uk-inline-clip uk-transition-toggle " style="width: 100%">
                                        <img src="<?= $value['thumb']; ?>" alt="" style="width: 100%">
                                        <div class="uk-transition-fade uk-position-cover uk-overlay uk-overlay-primary uk-flex uk-flex-center uk-flex-middle">
                                            <div class="uk-transition-fade uk-position-center">
                                                <span uk-overlay-icon></span>
                                            </div>
                                            <a href="<?= $value['url']; ?>" class="uk-position-cover" data-type="image"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-text-center imagesEditMode" style="display: none;">
                                <input type="checkbox" name="images[<?= $value['id']; ?>]" value="<?= $value['id']; ?>" form="generalImages" /> 
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="uk-text-center uk-padding">
                    <?php paginator::view($count, $this->currentPage, "images", ''); ?>
                </div>
            </div>
        </div>
    </div>
</div>