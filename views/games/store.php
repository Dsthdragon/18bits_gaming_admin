<div class="uk-grid">
    <div class="uk-width-1-1">
        <div class="uk-card">
            <div class="uk-card-header">
                <div class="uk-grid">
                    <div class="uk-width-1-2">
                        <span class="card-title">Store ( <?= count($this->stores) ?> )</span>
                    </div>
                    <div class="uk-width-1-2 uk-text-right">
                        <button class="uk-button uk-button-primary " uk-toggle href="#addStore"> <span class="fa fa-plus"></span> </button>
                    </div>
                </div>
            </div>
            <div class="uk-card-body">
                <form id="deleteStore" method="POST">
                    <input type="hidden" value="deleteStore" name="form" form="deleteStore" />
                </form>
                <table class="uk-table">
                    <thead>
                        <tr>
                            <th>Logo</th>
                            <th>Title</th>
                            <th>link</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = paginator::paginate($this->stores, 10, $this->currentPage);
                        $count = $data[1];
                        $data = $data[0];
                        ?>
                        <?php foreach($data as $key => $value): ?>
                            <tr>
                                <td><img width="50" src="<?= URL.$value['logo'] ?>" /></td>
                                <td><?= $value['title'] ?></td>
                                <td><?= $value['link'] ?>"</td>
                                <td>
                                    <button onclick="return confirm('Are you sure!')" class="uk-button uk-button-default red-text" name="id" value="<?= $value['id']; ?>" form="deleteStore">
                                        <span class="fa fa-trash"></span>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot style="padding: 0;">
                        <tr>
                            <td colspan="4" class="center">
                                <?php paginator::view($count, $this->currentPage, "store", ''); ?>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Modal Structure -->
<div id="addStore" uk-modal>
    <div class="uk-modal-dialog">
        <div class="uk-modal-header">
            <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
            <h4 class="uk-modal-title">Add Store</h4>
        </div>
        <div class="uk-modal-body">
            <div class="uk-grid">
                <form class="uk-width-1-1" method="POST" id="createStore">
                    <div class="uk-grid">
                        <div class="uk-grid uk-width-1-1">
                            <label for="room_type" class="uk-width-1-4">Title</label>
                            <input  id="room_type" type="text" name="title" form="createStore" class="uk-width-3-4 uk-input">
                        </div>
                        <div class="uk-grid uk-width-1-1">
                            <label for="room_type" class="uk-width-1-4">Link</label>
                            <input  id="room_type" type="text" name="link" form="createStore" class="uk-width-3-4 uk-input">
                        </div>
                        <div class="uk-grid uk-width-1-1">
                            <label for="room_type" class="uk-width-1-4">Logo</label>
                            <input  id="room_type" type="text" name="logo" form="createStore" class="uk-width-3-4 uk-input">
                        </div>
                    </div>
                </form>
            </div>
        </div>
            <div class="uk-modal-footer">
                <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                <button class="uk-button uk-button-primary" type="submit" name="form" value="createStore" form="createStore" >
                    <span class="fa fa-edit"></span> ADD
                </button>
            </div>
    </div>
</div>