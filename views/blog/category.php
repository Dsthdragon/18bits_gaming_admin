<div class="uk-grid">
    <div class="uk-width-1-1">
        <div class="uk-card">
            <div class="uk-card-header">
                <div class="uk-grid">
                    <div class="uk-width-1-2">
                        <button class="uk-button uk-button-primary " uk-toggle href="#addCategory"> <span class="fa fa-plus"></span> </button>
                    </div>
                    <div class="uk-width-1-2 uk-text-right">
                        <span class="uk-card-title">Category ( <?= count($this->categories) ?> )</span>
                    </div>
                </div>
            </div>
            <div class="uk-card-body">
                <form id="deleteCategory" method="POST">
                    <input type="hidden" value="deleteCategory" name="form" form="deleteCategory" />
                </form>
                <table class="uk-table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Title</th>
                            <th>Link</th>
                            <th>Parent</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = paginator::paginate($this->categories, 10, $this->currentPage);
                        $count = $data[1];
                        $data = $data[0];
                        ?>
                        <?php foreach($data as $key => $value): ?>
                            <tr>
                                <td><?= $value['id'] ?></td>
                                <td><?= $value['title'] ?></td>
                                <td><?= $value['link'] ?></td>
                                <td><?= $value['parent_name'] ?></td>
                                <td>
                                    <button onclick="return confirm('Are you sure!')" class="uk-button uk-button-default red-text" name="id" value="<?= $value['id']; ?>" form="deleteCategory">
                                        <span class="fa fa-trash"></span>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot style="padding: 0;">
                        <tr>
                            <td colspan="5" class="center">
                                <?php paginator::view($count, $this->currentPage, "category", ''); ?>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Modal Structure -->
<div id="addCategory" uk-modal>
    <div class="uk-modal-dialog">
        <div class="uk-modal-body">
            <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
            <h4 class="uk-modal-title">Add Category</h4>
            <hr />
            <div class="uk-grid">
                <form class="uk-width-1-1" method="POST" id="addCategoryForm">
                    <div class="uk-grid">
                        <div class="uk-grid uk-width-1-1">
                            <label for="room_type" class="uk-width-1-4">Title</label>
                            <input  id="room_type" type="text" name="title" form="addCategoryForm" class="uk-width-3-4 uk-input">
                        </div>
                        <div class="uk-grid uk-width-1-1">
                            <label class="uk-width-1-4">Select Category</label>
                            <select name="parent" form="addCategoryForm" class="uk-width-3-4 uk-select">
                                <option value="">NONE</option>
                                <?php foreach($this->categories as $key => $value): ?>
                                    <option value="<?= $value['id'] ?>"><?= $value['title'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="uk-margin-small-top">
                <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                <button class="uk-button uk-button-primary" type="submit" name="form" value="addCategoryForm" form="addCategoryForm" >
                    <span class="fa fa-edit"></span> ADD
                </button>
            </div>
        </div>
    </div>
</div>