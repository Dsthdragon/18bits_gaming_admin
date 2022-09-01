<?php $general = new general_model(); ?>
<form id="updatePost" method="post">
	<input type="hidden" value="updatePost" name="form" form="updatePost" />
	<input type="hidden" value="<?= $this->article['image']; ?>" data-article="<?= $this->article['id']; ?>" id="selectedImg" data-page="article" name="image" form="updatePostd">
</form>
<form id="publishArticle" method="post">
	<input type="hidden" value="publishArticle" name="form" form="publishArticle" />
</form>

<!-- END UPLOAD ISH -->
<div class="uk-card uk-card-default">
	<div class="uk-card-header">
		<div class="uk-grid">
			<div class="uk-width-1-1@s uk-width-1-3@m">
				<?= $this->article['title']; ?>
			</div>
			<div class="uk-width-1-1@s uk-width-2-3@m">
				<div>
					Published as <?= $this->article['fullname']; ?>
					<?php if($this->article['published'] == 0): ?>
						<button title="Set Thumbnail" class="uk-button white-text pink white-text editMode" id="selectImage" style="margin-left: 1rem;display: none">
							<span class="fa fa-image"></span>
						</button>
						<button data-url="<?= URL ?>getTags/<?= $this->article['id']; ?>" title="Tags" class="uk-button white-text green white-text editMode" id="selectTags" style="display: none">
							<span class="fa fa-tags"></span>
						</button>
						<button title="Update Post" onclick="return confirm('Are you sure')" type="submit" class="uk-button white-text purple editMode"   form="updatePost" style="display: none"> 
							<span class="fa fa-save"></span>
						</button>
						<button title="Toggle Editable" class="uk-button white-text blue lighten-2" onclick="$('.editMode').toggle()">
							<span class="fa fa-edit"></span>
						</button>
					<?php endif; ?>
					<button class="uk-button grey" name="id" form="publishArticle" value="<?= $this->article['id'] ?>"><?= ($this->article['published'] == 0)? "Publish": "Revert To Draft" ?></button>
				</div>

			</div>
		</div>
	</div>
	<div class="uk-card-body">
		<div class="uk-grid">
			<div class="uk-width-3-4@m">
				<div class="uk-grid">
					<div style="padding-top: 7px" class="uk-width-1-4@m uk-text-right">
						Title:
					</div>
					<div class="uk-width-3-4@m">
						<div  class="editMode">
							<?= $this->article['title']; ?>
						</div>
						<div class="uk-width-1-1@s	 editMode" style="display: none" >
							<input value="<?= $this->article['title']; ?>" class="uk-input" type="text" name="title" form="updatePost">
						</div>
					</div>
				</div>
				<div class="uk-grid editMode" style="display: none" >
					<div style="padding-top: 7px" class="uk-width-1-4@m uk-text-right">
						Create Link:
					</div>
					<div class="uk-width-3-4@s">
						<div class="uk-width-1-1@s editMode" style="display: none" >

							<p>
								<label>
									<input  value="<?= $this->article['title']; ?>" type="checkbox" name="changeLink" form="updatePost" class="uk-checkbox">
									<span></span>
								</label>
							</p>
						</div>
					</div>
				</div>
				<div class="uk-grid">
					<div style="padding-top: 7px" class="uk-width-1-4@m uk-text-right">
						Link:
					</div>
					<div class="uk-width-3-4@s">
						<div style="padding-top: 7px" class="editMode">
							<?= $this->article['link']; ?>
						</div>

						<div class="uk-width-1-1@s editMode" style="display: none" >
							<input  value="<?= $this->article['link']; ?>" uk-disabled="" class="uk-input" type="text" name="link" form="updatePost">

						</div>
					</div>
				</div>
				<div class="uk-grid">
					<div style="padding-top: 7px" class="uk-width-1-4@m uk-text-right">
						Top News:
					</div>
					<div class="uk-width-3-4@s">
						<div style="padding-top: 7px" class="editMode">
							<?= ($this->article['top'] == 1)? 'Top' : 'Regular'; ?>
						</div>
						<div class="uk-width-1-1@s editMode" style="display: none" >

							<p>
								<label>
									<input <?= ($this->article['top'] == 1)? 'checked=""' : '' ?>  value="<?= $this->article['title']; ?>" type="checkbox" name="top" form="updatePost" class="uk-checkbox">
									<span></span>
								</label>
							</p>
						</div>
					</div>
				</div>
				<div class="uk-grid">
					<div style="padding-top: 7px" class="control-div uk-width-1-4@m uk-text-right" >
						Category:
					</div>
					<div class="uk-width-3-4@s">
						<div style="padding-top: 7px" class="editMode">
							<?= $this->article['category_title']; ?>
						</div>

						<div class="uk-width-1-1@s editMode" style="display: none" >
							<select name="category" form="updatePost" class="uk-select" >						
								<?php foreach($this->categories as $key => $value): ?>
									<option value="<?= $value['id']; ?>" <?= ($value['id']== $this->article['category']) ? "selected=''" : '' ?>>
										<?= $value['title']; ?>
									</option>
								<?php endforeach; ?>
							</select>

						</div>
					</div>
				</div>
				<div class="uk-grid">
					<div style="padding-top: 7px" class="uk-width-1-4@m uk-text-right">
						Abstract:
					</div>
					<div class="uk-width-3-4@s">
						<div style="padding-top: 7px" class="editMode">
							<?= $this->article['abstract']; ?>
						</div>
						<div class="uk-width-1-1@s editMode" style="display: none" >
							<textarea type="text" name="abstract" form="updatePost"  class="uk-textarea"><?= $this->article['abstract']; ?></textarea>
						</div>
					</div>
				</div>
			</div>
			<div class="uk-width-1-4">
				<img id="imageHolder" src="<?= imagedisplay::display($this->article['img']) ?>"  class="responsive-img" style="width: 100%" />
			</div>
		</div>
		<hr />
		<div class="uk-grid">
			<div class="uk-width-1-1@s">
				<div class="editMode">
					<?= $this->article['post']; ?>
				</div>
				<div class="editMode" style="display: none;">
					<textarea id="post" name="post" form="updatePost" class="editmode"><?= $this->article['post'] ?></textarea>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Structure -->
<div id="selectImageModal" uk-modal>

    <div class="uk-modal-dialog uk-modal-body">
		<div id="myManagerContainer">

		</div>
        <button class="uk-button uk-button-default uk-modal-close" type="button">CLOSE</button>
    </div>
</div>

<!-- Modal Structure -->
<div id="addTagModal" uk-modal>
	 <div class="uk-modal-dialog uk-modal-body">

		<form id="addTagForm" method="POST">
			<div class="uk-grid">
				<div class="uk-width-2-3@s" style="" >
					<input type="text" id="TagText" class="uk-input" name="tag" data-url="<?= URL ?>checkTags/" data-post="<?= $this->article['id']; ?>" form="addTagForm" />
				</div>
				<div class="uk-width-1-3@s">
					<button style="width: 100%;" class="uk-button blue white-text" id="AddTag" data-url="<?= URL ?>addTag/<?= $this->article['id']; ?>" form="Blah">ADD</button>
				</div>

				<div class="uk-width-1-1@s" id="_titleBox" style="display: none;">
					<ul id="_titleList" class="collection">

					</ul>
					<div id="_titleCon"></div>
					<hr />
					<a onclick="$('#_titleBox').hide()" class="uk-button uk-button-default">X</a>
				</div>
			</div>
		</form>
		<div id="myTagsContainer">

		</div>
        <button class="uk-button uk-button-default uk-modal-close" type="button">CLOSE</button>
	</div>
</div>
