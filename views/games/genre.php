<?php $general = new general_model(); ?>
<div class="uk-grid">
    <div class="uk-width-1-1">
        <div class="uk-card uk-card-default">
            <div class="uk-card-header">
                <div class="">
                    <span class="card-title">Genre ( <?= count($this->genres) ?> )</span>
                </div>
                <form id="deleteGenre" method="POST">
                    <input type="hidden" value="deleteGenre" name="form" form="deleteGenre" />
                </form>
            </div>
            <div class="uk-card-body">
                <table class="uk-table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Genre</th>
                            <th>Link</th>
                            <th>Games</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = paginator::paginate($this->genres, 10, $this->currentPage);
                        $count = $data[1];
                        $data = $data[0];
                        ?>
                        <?php foreach($data as $key => $value): ?>
                            <?php $games = $general->getTagPostCount($value['id']); ?>
                            <tr>
                                <td><?= $value['id'] ?></td>
                                <td><?= $value['title'] ?></td>
                                <td><?= $value['link'] ?></td>
                                <td><?= $value['games'] ?></td>
                                <td>
                                    <button class="uk-button uk-button-default red-text" name="id" value="<?= $value['id']; ?>" onclick="return confirm('Are you sure')" form="deleteGenre">
                                        <span class="fa fa-trash"></span>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot style="padding: 0;">
                        <tr>
                            <td colspan="5" class="center">
                                <?php paginator::view($count, $this->currentPage, "genre", ''); ?>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
