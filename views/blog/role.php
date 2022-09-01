<style>
.roleBox{
    border: 2px solid #fff;
    margin: 1rem;
    padding: 1rem;
}
.card-selected-blue {
    border-style: solid;
    border-color: #0275d8;
    border-width: 2px;
}
</style>
<?php $general = new general_model(); ?>

<form id="modifyAccess" method="POST">
</form>
<form id="addAllAccess" method="POST">
</form>
<form id="removeAllAccess" method="POST">
</form>
<div class="uk-grid">
    <div class="uk-width-1-1">
        <div class="uk-card uk-card-default">
            <div class="uk-card-header uk-grid">
                
                <h3 class="uk-card-title uk-width-1-1 uk-width-1-5@m">Access: <?= count($this->access) ?> / <?= count($this->links) ?></h3>
                <div class="uk-width-1-1 uk-width-4-5@m uk-text-right">
                    <button type="submit" name="form" class="uk-button red darken-4 white-text" value="removeAllAccess" form="removeAllAccess">
                        <i class="fa fa-remove"></i> REMOVE ALL
                    </button>
                    <button type="submit" name="form" class="uk-button blue lighten-2 white-text" value="addAllAccess" form="addAllAccess">
                        <i class="fa fa-plus"></i> ADD ALL
                    </button>
                    <button type="submit" name="form" class="uk-button blue white-text" value="modifyAccess" form="modifyAccess">
                        <i class="fa fa-save"></i> UPDATE
                    </button>
                    <button href="#create_filter" class="uk-button red white-text" uk-toggle>
                        <i class="fa fa-plus"></i> REMOVE
                    </button>

                </div>
            </div>
            <div class="uk-card-body">
                <div class="uk-grid">
                    <div class="uk-width-1-1 uk-text-center">

                        <div class="uk-grid">
                            <?php foreach($this->links as $key => $value): ?>
                                <div class="uk-width-1-2 uk-width-1-4@m">
                                    <div class="roleBox" data-id="<?= $value['id']; ?>" >
                                        <input type="checkbox" value="<?= $value['id']; ?>" name="id[]" form="modifyAccess" style="display: none;" id="accessCheck<?= $value['id']; ?>" />
                                        <h5 class="">
                                            <?php if(in_array($value['id'], $this->access)): ?>
                                                <i class="fa fa-eye right text-info"></i>
                                            <?php else: ?>
                                                    <i class="fa fa-eye-slash right text-warning"></i>
                                            <?php endif; ?>
                                            <?= strtoupper($value['title']); ?>
                                        </h5>
                                        <div style="padding: 5px;">
                                            <small>
                                                <hr />
                                                <?= $value['link']; ?>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div uk-modal id="create_filter">
    <div class="uk-modal-dialog">
        <form method="post" id="removeAccess" class="uk-modal-body">
            <div class="uk-modal-header">
                <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
                <h4 class="uk-modal-title">Remove Access</h4>
            </div>
            <div class="uk-grid">
                <div class="uk-with-1-1 uk-text-center">
                    <div class="uk-grid">
                        <?php foreach($this->access as $key => $value): ?>
                            <?php $link = $general->getAccess($value); ?>
                            <div class="uk-width-1-2 uk-width-1-4@m">
                                <div class="roleBox" data-id="<?= $value; ?>remove" >
                                    <input type="checkbox" value="<?= $value; ?>" name="id[]" form="removeAccess" style="display: none;" id="accessCheck<?= $value; ?>remove" />
                                    <?= strtoupper($link['dTitle']); ?>
                                    <div style="padding: 5px;">
                                        <small>
                                            <hr />
                                            <?= $link['dLink']; ?>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </form>
        <div class="uk-modal-footer" >
            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
            <button class="uk-button uk-button-primary" value="removeAccess" type="submit" class="form-control" name="form" form="removeAccess" onclick="return confirm('Are you sure')">REMOVE</button>
        </div>
    </div>
</div>
