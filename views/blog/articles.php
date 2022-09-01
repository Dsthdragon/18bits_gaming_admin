<?php $general = new general_model(); ?>

<form id="deleteArticle" method="post">
	<input type="hidden" value="deleteArticle" name="form" form="deleteArticle" />
</form>
<form id="publishArticle" method="post">
	<input type="hidden" value="publishArticle" name="form" form="publishArticle" />
</form>
<form id="editAll" method="post">
	<input type="hidden" value="editAll" name="form" form="editAll" />
</form>
<div class="uk-grid" >
	<div class="uk-width-1-1@s" >
		<div class="uk-card uk-card-default" >
			<div class="uk-card-header">
				<p style="font-size: 2rem"><?= $this->pageTitle ?></p>
			</div>
			<div class="uk-card-body">
				<div class="uk-grid">
					<div class="uk-width-1-1@s uk-width-1-3@m">
						
						<a href="<?= URL ?>articles" class="uk-button-flat <?= ($this->type != "published" && $this->type != "top") ? "" : "blue-text" ?>">All</a> | 
						<a href="<?= URL ?>articles/published" class="uk-button-flat <?= ($this->type == "published") ? "" : "blue-text" ?>">Published</a> | 
						<a href="<?= URL ?>articles/draft" class="uk-button-flat <?= ($this->type == "draft") ? "" : "blue-text" ?>">Draft</a> | 
						<a href="<?= URL ?>articles/top" class="uk-button-flat <?= ($this->type == "top") ? "" : "blue-text" ?>">Top</a>
					</div>
					<div class="uk-width-1-1@s uk-width-2-3@m uk-text-right  white-text" >
						<button title="Check all boxes" class="uk-button green" onclick="$('.myCheckBoxes').prop('checked', true)"><i class="fa fa-plus"></i></button>
						<button title="Uncheck all boxes" class="uk-button yellow" onclick="$('.myCheckBoxes').prop('checked', false)"><i class="fa fa-minus"></i></button>
						<button onclick="return confirm('Are you sure')"  class="uk-button red" form="editAll" name="action" value="delete"><i class="fa fa-trash"></i></button>
						<button  onclick="return confirm('Are you sure')" class="uk-button blue" form="editAll" name="action" value="publish">Publish</button>
						<button onclick="return confirm('Are you sure')"  class="uk-button orange" form="editAll" name="action" value="draft">Revert To Draft</button>
					</div>
				</div>
				<div class="uk-grid">
					<table class="uk-table">
						<tbody>
							<?php
							$data = paginator::paginate($this->articles, 10, $this->currentPage);
							$count = $data[1];
							$data = $data[0];
							?>
							<?php foreach($data  as $key => $value): ?>
								<tr>
									<td>
										<p>
											<label>
												<input type="checkbox" class="form-control myCheckBoxes" name="articles[]" value="<?= $value['id']; ?>" form="editAll">
												<span></span>
											</label>
										</p>
									</td>
									<td>
										<?= $value['title']; ?><hr />
										<a href="<?= URL; ?>article/<?= $value['id'] ?>" class="uk-button blue white-text">view</a>
										<button onclick="return confirm('Are you sure')" class="uk-button red white-text" name="id" form="deleteArticle" value="<?= $value['id']; ?>">delete</button> 
										<button onclick="return confirm('Are you sure')" class="uk-button grey white-text" name="id" form="publishArticle" value="<?= $value['id'] ?>"><?= ($value['published'] == 0)? "Publish": "Revert To Draft" ?></button>
									</td>
									<td><?= $value['fullname']; ?></td>
									<td><?= $value['category_title']; ?></td>
									<td><i class="fa fa-eye"></i> <?= $general->getViews($value['id']); ?></td>
									<td><?= relative_time::wordmonth($value['created_at']); ?></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
						<tfoot>
							<tr>
								<td colspan="6" class="center-align">
									<?php paginator::view($count, $this->currentPage, "articles", $this->type); ?>
								</td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>