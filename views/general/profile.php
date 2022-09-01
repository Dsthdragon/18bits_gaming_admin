<?php $general = new general_model(); ?>
<?php extract($this->profile); ?>
<form method="POST" id="uploadProfileImg" style="display: none" enctype="multipart/form-data">
    <input type="hidden" value="uploadProfileImg" name="form" form="uploadProfileImg"/>
    <input type="file" name="img" accept="image/*" form="uploadProfileImg" id="addImageInput" onchange="$('#addImage').click()" />
    <button class="btn blue" id="addImage" form="uploadProfileImg" type="submit"></button>
</form>
<div class="uk-grid">
    <div class="uk-width-1-1 uk-width-2-5@m">
        <div class="uk-card uk-card-secondary uk-margin-small-bottom">
            <div class="uk-card-header uk-grid">
                <h3 class="uk-width-1-1 uk-width-2-3@m">
                    PROFILE DETAILS
                </h3>
                <div class="uk-width-1-1 uk-width-1-3@m">
                    <button class="uk-text-right uk-button uk-button-primary blue white-text" onclick="$('#addImageInput').click()"><span class="fa fa-upload"></span></button>
                </div>
                <div class="uk-width-1-1 uk-margin-small">
                    <hr />
                </div>
            </div>
            <div class="uk-card-body">
                <div class="uk-grid uk-flex uk-flex-middle" uk-grid>
                    <div class="uk-width-1-1">
                        <img style="width: 100%" src="<?= URL."sendImage/".session::get("uid")."/avatar" ?>" alt="" class="uk-border-circle profile-img">
                    </div>
                </div>
                <div class="uk-text-center">
                    <h4>@<?= $fullname; ?></h4> 
                    <span class="uk-text-meta"><?= $role_title; ?></span>

                </div>
            </div>
        </div>
    </div>
    <div class="uk-width-1-1 uk-width-3-5@m">
        <div class="uk-card uk-card-default uk-margin-small-bottom">
            <div class="uk-card-header">
                <h3>INFORMATION</h3>
                <div class="uk-grid" >
                    <label class="uk-width-2-5">FULLNAME:</label>
                    <div class="uk-width-3-5">
                        <span><?= $fullname; ?></span>
                    </div>
                    <div class="uk-width-1-1">
                        <hr class="" />
                    </div>

                    <label class="uk-width-2-5">EMAIL:</label>
                    <div class="uk-width-3-5">
                        <span><?= $email; ?></span>
                    </div>
                    <div class="uk-width-1-1">
                        <hr class="" />
                    </div>
                    <label class="uk-width-2-5">DATE ADDED:</label>
                    <div class="uk-width-3-5">
                        <span><?= $created_at; ?></span>
                    </div>
                    <div class="uk-width-1-1">
                        <hr class="" />
                    </div>
                    <label class="uk-width-2-5">LAST UPDATED:</label>
                    <div class="uk-width-3-5">
                        <span><?= relative_time::time_stamp($updated_at); ?></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="uk-card uk-card-default uk-margin-small-bottom">
            <div class="uk-card-header">
                <h3>SECURITY DETAILS</h3>
            </div>
            <div class="uk-card-body uk-padding">
                <form class="form-horizontal" method="POST" id="changePassword">
                    <input type="hidden" value="changePassword" name="form" form="changePassword" />
                </form>
                <div class="uk-grid">
                    <div class="uk-width-1-1">
                        <div class="uk-margin">
                            <input type="password" placeholder="PASSWORD" name="password" form="changePassword" class="uk-input" />
                        </div>
                        <div class="uk-margin">
                            <input type="password" name="password1" placeholder="NEW PASSWORD" form="changePassword" class="uk-input" />
                        </div>
                        <div class="uk-margin">
                            <input type="password" name="password2" placeholder="PASSWORD CONFIRMATION" form="changePassword" class="uk-input" />
                        </div>
                        <div class="uk-margin">
                            <button type="submit" class="uk-button uk-button-primary uk-width-1-1" form="changePassword"><i class="fa fa-save"></i> UPDATE</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>