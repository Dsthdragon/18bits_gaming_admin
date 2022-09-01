<div class="uk-grid">
    <div class="uk-width-1-1">
        <div class="uk-card">
            <div class="uk-card-header">
                <div class="uk-grid">
                    <div class="uk-width-1-2">
                        <span class="card-title">Platform ( <?= count($this->platforms) ?> )</span>
                    </div>
                    <div class="uk-width-1-2 uk-text-right">
                        <button class="uk-button uk-button-primary " uk-toggle href="#addPlatform"> <span class="fa fa-plus"></span> </button>
                    </div>
                </div>
            </div>
            <div class="uk-card-body">
                <form id="deletePlatform" method="POST">
                    <input type="hidden" value="deletePlatform" name="form" form="deletePlatform" />
                </form>
                <table class="uk-table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Title</th>
                            <th>Logo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = paginator::paginate($this->platforms, 10, $this->currentPage);
                        $count = $data[1];
                        $data = $data[0];
                        ?>
                        <?php foreach($data as $key => $value): ?>
                            <tr>
                                <td><?= $value['id'] ?></td>
                                <td><?= $value['title'] ?></td>
                                <td><span class="<?= $value['logo'] ?>"></span></td>
                                <td>
                                    <button onclick="return confirm('Are you sure!')" class="uk-button uk-button-default red-text" name="id" value="<?= $value['id']; ?>" form="deletePlatform">
                                        <span class="fa fa-trash"></span>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot style="padding: 0;">
                        <tr>
                            <td colspan="5" class="center">
                                <?php paginator::view($count, $this->currentPage, "platform", ''); ?>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Modal Structure -->
<div id="addPlatform" uk-modal>
    <div class="uk-modal-dialog">
        <div class="uk-modal-header">
            <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
            <h4 class="uk-modal-title">Add Platform</h4>
        </div>
        <div class="uk-modal-body">
            <div class="uk-grid">
                <form class="uk-width-1-1" method="POST" id="createPlatform">
                    <div class="uk-grid">
                        <div class="uk-grid uk-width-1-1">
                            <label for="room_type" class="uk-width-1-4">Title</label>
                            <input  id="room_type" type="text" name="title" form="createPlatform" class="uk-width-3-4 uk-input">
                        </div>
                        <div class="uk-grid uk-width-1-1">
                            <label for="room_type" class="uk-width-1-4">Logo</label>
                            <input  id="room_type" type="text" name="logo" form="createPlatform" class="uk-width-3-4 uk-input">
                        </div>
                    </div>
                </form>
            </div>
        </div>
            <div class="uk-modal-footer">
                <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                <button class="uk-button uk-button-primary" type="submit" name="form" value="createPlatform" form="createPlatform" >
                    <span class="fa fa-edit"></span> ADD
                </button>
            </div>
    </div>
</div>