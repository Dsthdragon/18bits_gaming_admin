<div class="uk-card uk-card-default">
	<div class="uk-card-header">
		<div class="uk-grid">
			<div class="uk-width-1-1@s uk-width-1-3@m">
				BASIC INFO
			</div>
			<div class="uk-width-1-1@s uk-width-2-3@m uk-text-right">
				<div>
					<?php if($this->game['published'] == 0): ?>
						<button title="Update Post" onclick="return confirm('Are you sure')" type="submit" class="uk-button white-text purple editMode"   form="updatePost" style="display: none"> 
							<span class="fa fa-save"></span>
						</button>
						<button title="Toggle Editable" class="uk-button white-text blue lighten-2" onclick="$('.editMode').toggle()">
							<span class="fa fa-edit"></span>
						</button>
					<?php endif; ?>
					<button class="uk-button uk-button-secondary" name="id" form="publishArticle" value="<?= $this->game['id'] ?>"><?= ($this->game['published'] == 0)? "Publish": "Revert To Draft" ?></button>
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
							<?= $this->game['title']; ?>
						</div>
						<div class="uk-width-1-1@s	 editMode" style="display: none" >
							<input value="<?= $this->game['title']; ?>" class="uk-input" type="text" name="title" form="updatePost">
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
									<input  value="<?= $this->game['title']; ?>" type="checkbox" name="changeLink" form="updatePost" class="uk-checkbox">
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
							<?= $this->game['link']; ?>
						</div>

						<div class="uk-width-1-1@s editMode" style="display: none" >
							<input  value="<?= $this->game['link']; ?>" uk-disabled="" class="uk-input" type="text" name="link" form="updatePost">

						</div>
					</div>
				</div>
			</div>
			<div class="uk-width-1-4">
				<img id="imageHolder" src="<?= imagedisplay::display($this->game['img']) ?>"  class="responsive-img" style="width: 100%" />
			</div>
		</div>
		<hr />
		<div class="uk-grid">
			<div class="uk-width-1-1@s">
				<div class="editMode">
					<?= $this->game['description']; ?>
				</div>
				<div class="editMode" style="display: none;">
					<textarea id="post" name="description" form="updatePost" class="editmode"><?= $this->game['description'] ?></textarea>
				</div>
			</div>
		</div>
	</div>
</div>