<?php $general = new general_model(); ?>
<div class="uk-grid">
    <div class="uk-width-1-1">
        <div class="uk-card uk-card-default">
            <div class="uk-card-header">
                <div class="">
                    <div class="right">

                    </div>
                    <span class="card-title">Tags ( <?= count($this->tags) ?> )</span>
                </div>
                <form id="deleteTag" method="POST">
                    <input type="hidden" value="deleteTag" name="form" form="deleteTag" />
                </form>
            </div>
            <div class="uk-card-body">
                <table class="uk-table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Tag</th>
                            <th>Link</th>
                            <th>Posts</th>
                            <th>Series</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = paginator::paginate($this->tags, 10, $this->currentPage);
                        $count = $data[1];
                        $data = $data[0];
                        ?>
                        <?php foreach($data as $key => $value): ?>
                            <?php $posts = $general->getTagPostCount($value['id']); ?>
                            <tr>
                                <td><?= $value['id'] ?></td>
                                <td><?= $value['tag'] ?></td>
                                <td><?= $value['link'] ?></td>
                                <td><?= $posts ?></td>
                                <td>
                                    <span class="fa fa-<?= ($value['series']) ? "check green-text"  : "close red-text"  ?>"></span>
                                </td>
                                <td>
                                    <button class="uk-button uk-button-default red-text" name="id" value="<?= $value['id']; ?>" onclick="return confirm('Are you sure')" form="deleteTag">
                                        <span class="fa fa-trash"></span>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot style="padding: 0;">
                        <tr>
                            <td colspan="5" class="center">
                                <?php paginator::view($count, $this->currentPage, "tags", ''); ?>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
