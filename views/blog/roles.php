<div class="uk-grid">
    <div class="uk-width-1-1">
        <div class="uk-card uk-card-default">
            <div class="uk-card-header">
                <div class="">
                    <div class="pull-right">
                        <button class="uk-button uk-button-primary" uk-toggle href="#addRole"> <span class="fa fa-plus"></span> </button>
                    </div>
                    <span class="card-title">Roles ( <?= count($this->roles) ?> )</span>
                </div>
            </div>
            <div class="uk-card-body">
                <form id="deleteRole" method="POST">
                    <input type="hidden" value="deleteRole" name="form" form="deleteRole" />
                </form>
                <table class="uk-table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Role</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = paginator::paginate($this->roles, 10, $this->currentPage);
                        $count = $data[1];
                        $data = $data[0];
                        ?>
                        <?php foreach($data as $key => $value): ?>
                            <tr>
                                <td><?= $value['id'] ?></td>
                                <td><?= $value['role'] ?></td>
                                <td><?= $value['description'] ?></td>
                                <td>
                                    <button class="uk-button uk-button-default red-text" onclick="return confirm('Are you sure')" name="id" value="<?= $value['id']; ?>" form="deleteRole">
                                        <span class="fa fa-trash"></span>
                                    </button>
                                    <a class="uk-button uk-button-default blue-text" href="<?= URL ?>role/<?= $value['id']; ?>"><span class="fa fa-arrow-right"></span></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot style="padding: 0;">
                        <tr>
                            <td colspan="5" class="center">
                                <?php paginator::view($count, $this->currentPage, "roles", ''); ?>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Modal Structure -->
<div id="addRole" uk-modal>
    <div class="uk-modal-dialog">
        <div class="uk-modal-header">
            <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
            <h4 class="uk-modal-title">Add Role</h4>
        </div>
        <div class="uk-modal-body">
            <div class="uk-grid">
                <form class="uk-width-1-1" method="POST" id="addRoleForm">
                    <div class="uk-grid">
                        <div class="uk-width-1-1 uk-grid">
                            <label class="uk-width-1-4" for="room_type">Enter Title</label>
                            <input  id="room_type" type="text" name="role" form="addRoleForm" class="uk-width-3-4 uk-input">
                        </div>

                        <div class="uk-width-1-1">
                            <label class="" for="description">Enter Description</label><br />
                            <textarea id="description" class="uk-textarea" name="description" form="addRoleForm" row="5"></textarea>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="uk-modal-footer">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
            <button class="uk-button uk-button-primary" type="submit" name="form" value="addRoleForm" form="addRoleForm" >
                <span class="fa fa-edit"></span> ADD
            </button>
        </div>
    </div>
</div>