<form id="generalGameImage" method="post" action="<?= URL ?>game/<?= $this->game['id']; ?>/images">
	<input type="hidden" value="generalGameImage" name="form" form="generalGameImage" />
</form>
<input type="hidden" value="<?= URL ?>addToGameGallery/<?= $this->game['id']; ?>/" id="addToGameGallery">

<div class="right">
	<form id="addImageForm" method="POST" enctype="multipart/form-data" style="display: none" action="<?= URL ?>game/<?= $this->game['id']; ?>/images">
		<input type="hidden" value="addImageForm" name="form" form="addImageForm"/>
		<input type="file" name="file_param" accept="image/*" form="addImageForm" id="addImageInput" onchange="$('#addImage').click()" />
		<button class="btn blue" id="addImage" form="addImageForm" type="submit"></button>
	</form>
</div>
<div class="uk-card uk-card-default">
	<div class="uk-card-header">
		<div class="uk-grid">
			<div class="uk-width-1-1@s uk-width-1-3@m">
				IMAGES
			</div>
			<div class="uk-width-1-1@s uk-width-2-3@m uk-text-right">
				<button style="display: none;" class="uk-button uk-button-primary imagesEditMode" form="generalGameImage" name="action" value="makeMain" type="submit">
					Make Main
				</button>
				<button style="display: none;" class="uk-button uk-button-danger imagesEditMode" form="generalGameImage" name="action" value="delete" type="submit">
					<span class="fa fa-trash"></span>
				</button>
				<button class="uk-button purple white-text" onclick="$('#addImageInput').click()">
					<span class="fa fa-upload"></span>
				</button>
				<button class="uk-button yellow white-text" id="openGameGalleryModal">
					<span class="fa fa-images"></span>
				</button>
				<button class="uk-button uk-button-default" onclick="$('.imagesEditMode').toggle()"><span class="fa fa-edit"></span></button>
			</div>
		</div>
	</div>
	<div class="uk-card-body">
		<div class="uk-grid" data-uk-lightbox="toggle:a.uk-position-cover" data-uk-grid>
			<?php foreach($this->images as $key => $value): ?>
				<div class="uk-width-1-2 uk-width-1-4">
					<div class="uk-grid-collapse uk-grid uk-grid-medium uk-flex uk-flex-middle" data-uk-grid>
						<div class="uk-width-1-1@s uk-width-1-1@m uk-height-1-1">
							<div class="uk-inline uk-inline-clip uk-transition-toggle " style="width: 100%">
								<img src="<?= URL . $value['thumb']; ?>" alt="" style="width: 100%">
								<div class="uk-transition-fade uk-position-cover uk-overlay uk-overlay-primary uk-flex uk-flex-center uk-flex-middle">
									<div class="uk-transition-fade uk-position-center">
										<span uk-overlay-icon></span>
									</div>
									<a href="<?= URL . $value['url']; ?>" class="uk-position-cover" data-type="image"></a>
								</div>
							</div>
						</div>
					</div>
					<div class="uk-text-center imagesEditMode" style="display: none;">
						<?= ($value['main'] == 1) ? "MAIN" : "" ?> <input type="checkbox" name="images[]" value="<?= $value['gid']; ?>" form="generalGameImage" /> 
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>

<div id="gameGalleryModal" uk-modal>
	<div class="uk-modal-dialog">
		<div class="uk-modal-header">
            <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
            <h4 class="uk-modal-title">Available</h4>
        </div>
		<div class="uk-modal-body" id="gameGalleryContainer">
			
		</div>
		<div class="uk-modal-footer">
			<a href="<?= URL ?>game/<?= $this->game['id']; ?>/images" class="uk-button uk-button-default ">CLOSE</a>
		</div>
	</div>
</div>