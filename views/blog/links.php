<div class="uk-grid">
    <div class="uk-width-1-1">
        <div class="uk-card">
            <div class="uk-card-header">
                <div class="uk-grid">
                    <span class="uk-width-1-1 uk-width-1-2@m ">Link ( <?= count($this->links) ?> )</span>
                    <div class="uk-width-1-1 uk-width-1-2@m uk-text-right">
                        <button class="uk-button white-text blue" href="#create_link" uk-toggle=""> <span class="fa fa-plus"></span> </button>
                    </div>
                </div>
            </div>
            <div class="uk-card-body">
                <form id="deleteLink" method="POST">
                    <input type="hidden" value="deleteLink" name="form" form="deleteLink" />
                </form>
                <table class="uk-table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Title</th>
                            <th>Link</th>
                            <th>Link Name</th>
                            <th>Navbar</th>
                            <th>icon</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = paginator::paginate($this->links, 10, $this->currentPage);
                        $count = $data[1];
                        $data = $data[0];
                        ?>
                        <?php foreach($data as $key => $value): ?>
                            <tr>
                                <td><?= $value['id'] ?></td>
                                <td><?= $value['title'] ?></td>
                                <td><?= $value['link'] ?></td>
                                <td><?= $value['linkName'] ?></td>
                                <td><span class="fa fa-<?= ($value['navbar']) ? "check green-text"  : "times red-text"  ?>"></span></td>
                                <td><span class="blue-text <?= $value['icon'] ?>"></span></td>
                                <td>
                                    <button class="uk-button uk-button-default red-text" name="id" value="<?= $value['id']; ?>" form="deleteLink">
                                        <span class="fa fa-trash"></span>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot class="uk-card-footer" style="padding: 0;">
                        <tr>
                            <td colspan="5" class="center">
                                <?php paginator::view($count, $this->currentPage, "links", ''); ?>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div uk-modal id="create_link">
    <div class="uk-modal-dialog">
        <div class="uk-modal-header">
            <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
            <h4 class="uk-modal-title" id="myModalLabel">CREATE LINK</h4>
        </div>
        <div class=" uk-modal-body" style="color: black;">
            <div class="uk-padding">
                <form method="post" id="createLink">
                    <input type="hidden" value="createLink" name="form" form="createLink" />
                    <div class="uk-grid">
                        <div class="uk-width-1-1">
                            <div class="uk-grid">
                                <label class="uk-width-2-5" for="categoryTitle">Title</label>
                                <input type="text" required="" name="title" id="categoryTitle" class="uk-input uk-width-3-5" placeholder="Enter Link Title" form="createLink" />
                            </div>
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-1-1">
                            <div class="uk-grid">
                                <label class="uk-width-2-5" for="categoryTitle">Link</label>
                                <input type="text" required="" name="link" id="categoryTitle" class="uk-input uk-width-3-5" placeholder="Enter Link path" form="createLink" />
                            </div>
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-1-1">
                            <div class="uk-grid">
                                <label class="uk-width-2-5"  for="categoryTitle">Link Tag</label>
                                <input type="text" required="" name="linkName" id="categoryTitle" class="uk-input uk-width-3-5" placeholder="Enter Link Tag" form="createLink" />
                            </div>
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-1-1">
                            <div class="uk-grid">
                                <label class="uk-width-2-5" for="categoryTitle">Link Icon</label>
                                <input type="text"  name="icon" id="categoryTitle" class="uk-input uk-width-3-5" placeholder="Enter Link Icon" form="createLink" />
                            </div>
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-1-1">
                            <div class="uk-grid">
                                <label class="uk-width-2-5" for="categoryTitle">Link Group</label>
                                <select name="group" form="createLink" required="" class="uk-select uk-width-3-5">
                                    <option value=""> -- SELECT LINK GROUP --</option>
                                    <?php foreach($this->link_groups as $key => $value): ?>
                                        <option value="<?= $value['id']; ?>"> <?= ucfirst($value['title']) ?> </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-1-1">
                            <div class="uk-grid">
                                <label class="uk-width-2-5" for="categoryTitle">Show On Navbar</label>
                                <div class="uk-width-3-5 uk-text-center">
                                    <input type="checkbox"  name="navbar" id="categoryTitle" class="uk-checkbox" placeholder="Show On Navbar" form="createLink" />
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        <div class="uk-modal-fotter">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
            <button class="uk-button uk-button-primary" type="submit" class="uk-input" class="" form="createLink" onclick="return confirm('Are you sure')">CREATE</button>
        </div>
        </div>
    </div>
</div>
