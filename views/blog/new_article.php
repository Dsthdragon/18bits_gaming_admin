<div class="row">
    <div class="uk-card uk-card-default">
        <div class="uk-card-header">
            <div class="">
                <div class="pull-right">
                    Publishing as <?= $_SESSION['fullname']; ?> - <label class="selecteImageText">No Image Selected</label>
                    <button class="uk-button  pink white-text" id="selectImage" style="margin-left: 1rem;">
                        <span class="fa fa-image"></span>
                    </button>
                    <button class="uk-button  blue white-text" type="submit" name="form" value="newArticle" form="newArticle" style="margin-left: 1rem;">
                        <span class="fa fa-save"></span> save
                    </button>
                </div>
                <span class="card-title">New Article</span>
                <hr style="clear: both" />
            </div>
        </div>
        <div class="uk-card-body">
            <form class="" method="POST" id="newArticle">
                <input type="hidden" value="" id="articleImg" name="image" form="newArticle">
                <div class="row">
                    <div class="input-field col s12 m5">
                        <input  id="room_type" type="text" required="" name="title" form="newArticle" class="validate">
                        <label for="room_type">Title</label>
                    </div>
                    <div class="input-field col s12 m5">
                        <select name="category" form="newArticle" class="validate">
                            <?php foreach($this->categories as $key => $value): ?>
                                <option value="<?= $value['id'] ?>"><?= $value['title'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <label>Select Category</label>
                    </div>
                    <div class="input-field col s12 m2">
                        <p>
                            <label>
                                <input type="checkbox" name="top" value="1" form="newArticle" />
                                <span>Top News</span>
                            </label>
                        </p>
                    </div>
                    <div class="input-field col s12">
                        <textarea id="abstract" required="" class="materialize-textarea" name="abstract" form="newArticle"></textarea>
                        <label for="abstract">Abstract</label>
                    </div>
                    <div class="col s12">
                        <textarea id="post"  name="post" form="newArticle"></textarea>
                    </div>
                </div>
            </form>
        </div>      
    </div>
</div>
</div>

<!-- Modal Structure -->
<div id="selectImageModal" class="modal">
    <div class="modal-content">
        <div id="myManagerContainer">

        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
</div>
