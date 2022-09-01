<div class="uk-grid">
    <div class="uk-width-1-1">
        <div class="uk-card uk-card-default">
            <div class="uk-card-header">
                <div class="pull-right">
                    <button uk-toggle href="#create_linkgroup" class="uk-button uk-button-primary">
                        <i class="fa fa-plus"></i> ADD
                    </button>
                </div>
                <h3>Link Groups (<?= count($this->link_groups) ?>)</h3>
            </div>
            <div class="uk-card-boby">
                <form id="deleteLinkGroup" method="POST">
                    <input type="hidden" value="deleteLinkGroup" name="form" form="deleteLinkGroup">
                </form>
                <table class="uk-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Group</th>
                            <th>Icon</th>
                            <th>Links</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = paginator::paginate($this->link_groups, 10, $this->currentPage);
                        $count = $data[1];
                        $data = $data[0];
                        ?>
                        <?php foreach($data  as $key => $value): ?>
                            <tr>
                                <td><?= $value['id']; ?></td>
                                <td><?= $value['title']; ?></td>
                                <td><span class="<?= $value['icon']; ?>"></span></td>
                                <td><?= $value['links'] ?></td>
                                <td><?= $value['created_at']; ?></td>
                                <td>
                                    <button class="uk-button uk-button-danger" onclick="return confirm('Are you sure you want to delete')" value="<?= $value['id']; ?>" name="id" type="submit" form="deleteLinkGroup">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot style="padding: 0">
                        <tr>
                            <td colspan="5" class="text-right">
                                <?php paginator::view($count, $this->currentPage, "link_group", ''); ?>
                            </td>
                        </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div uk-modal id="create_linkgroup">
    <div class="uk-modal-dialog" role="document">
        <div class="uk-modal-body" style="color: black;">
                <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
                <h4 class="" id="myModalLabel">CREATE LINK GROUP</h4>
            <div class=" ">
                <form method="post" id="createLinkGroup">
                    <input type="hidden" value="createLinkGroup" name="form" form="createLinkGroup" />
                    <div class="uk-grid">
                        <div class="uk-width-1-1">
                            <div class="uk-grid">
                                <label class="uk-width-1-4" for="categoryTitle">Title</label>
                                <input type="text" required="" name="group"  class="uk-width-3-4 uk-input" placeholder="Enter Link Group" form="createLinkGroup" />
                            </div>
                        </div>
                        <div class="uk-width-1-1">
                            <div class="uk-grid">
                                <label class="uk-width-1-4" for="categoryTitle">Icon</label>
                                <input type="text" required="" name="icon"  class="uk-width-3-4 uk-input" placeholder="Enter Link Group Icon" form="createLinkGroup" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="uk-margin-top" >
                <hr />
                <button class="uk-modal-close uk-button-default uk-button" type="button">CLOSE</button>
                <button class="uk-button uk-button-primary" type="submit" class="form-control" class="" form="createLinkGroup" onclick="return confirm('Are you sure')">CREATE</button>
            </div>
        </div>
    </div>
</div>
