<div class="uk-grid">
    <div class="uk-width-1-1">
        <div class="uk-card uk-card-header">
            <div class="uk-card-header">
                <div class="">
                    <div class="pull-right">
                        <button class="uk-button uk-button-primary" uk-toggle href="#addUser"> <span class="fa fa-plus"></span> </button>
                    </div>
                    <span class="uk-card-title">Users ( <?= count($this->users) ?> )</span>
                </div>
            </div>
            <div class="uk-card-body">
                <form id="deleteUser" method="POST">
                    <input type="hidden" value="deleteUser" name="form" form="deleteUser" />
                </form>
                <table class="uk-table">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Fullname</th>
                            <th>Role</th>
                            <th>Last Login</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = paginator::paginate($this->users, 10, $this->currentPage);
                        $count = $data[1];
                        $data = $data[0];
                        ?>
                        <?php foreach($data as $key => $value): ?>
                            <tr>
                                <td><?= $value['username'] ?></td>
                                <td><?= $value['email'] ?></td>
                                <td><?= $value['fullname'] ?></td>
                                <td><?= $value['role_name'] ?></td>
                                <td><?= relative_time::time_stamp($value['last_login']) ?></td>
                                <td>
                                    <button onclick="return confirm('Are you sure!')" class="uk-button uk-button-default red-text" name="id" value="<?= $value['id']; ?>" form="deleteUser">
                                        <span class="fa fa-trash"></span>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot style="padding: 0;">
                        <tr>
                            <td colspan="5" class="center">
                                <?php paginator::view($count, $this->currentPage, "users", ''); ?>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Modal Structure -->
<div id="addUser" uk-modal>
    <div class="uk-modal-dialog">
        <div class="uk-modal-body">
            <div class="uk-modal-header">
                <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
                <h4 class="uk-modal-title">Add User</h4>
            </div>
            <div class="uk-margin-small-top uk-grid">
                <form class="uk-width-1-1" method="POST" id="addUserForm">
                    <div class="uk-grid">
                        <div class="uk-width-1-1 uk-grid">
                            <label for="user_email" class="uk-width-1-4">Email</label>
                            <input  id="user_email" type="text" name="email" form="addUserForm" class="uk-input uk-width-3-4">
                        </div>
                        <div class="uk-width-1-1 uk-grid">
                            <label class="uk-width-1-4" for="user_fullname">Fullname</label>
                            <input  id="user_fullname" type="text" name="fullname" form="addUserForm" class="uk-input uk-width-3-4">
                        </div>
                        <div class="uk-width-1-1 uk-grid">
                            <label class="uk-width-1-4">Roles</label>
                            <select name="role" form="addUserForm" class="uk-select uk-width-3-4">
                                <?php foreach($this->roles as $key => $value): ?>
                                    <option value="<?= $value['id'] ?>"><?= $value['role'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="uk-modal-footer">
                <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                <button class="uk-button uk-button-primary white-text" type="submit" name="form" value="addUserForm" form="addUserForm" >
                    <span class="fa fa-edit"></span> ADD
                </button>
        </div>
    </div>
</div>